<?php
/**
 * キャプチャ結果HTMLクラス
 *
 * @author Fumiaki Saito
 * @date 2014/02/27
 */
class Html
{
	private $results;

	/**
	 * コンストラクタ
	 *
     * @param $result 結果クラスのオブジェクト
	 */
	public function __construct(Results $results) {
		$this->results = $results;
	}


	/**
	 * 結果HTMLを保存
	 *
	 * @param $filename 保存ファイル名
	 */
	public function save($filename) {
		file_put_contents($filename, $this->outputHeader());
		file_put_contents($filename, $this->outputContents(), FILE_APPEND);
		file_put_contents($filename, $this->outputFooter(), FILE_APPEND);
		@chmod($filename, 0777);
	}


	/**
	 * ヘッダ部を出力
	 */
	private function outputHeader() {
		$html =
			'<html>'.
			'<body>'.
			'<head>'.
			'<meta http-equiv="content-type" content="text/html; charset=UTF-8">'.
			'</head>';
		return $html;
	}


	/**
	 * コンテンツ部を出力
	 */
	private function outputContents() {

		$html = '';

		$errores = $this->results->getErrors();
		if (!empty($errores)) {
			$html .= '<p style="color:red;">下記URLのキャプチャに失敗しました！</p>'.
			$html .= '<ul>';
			foreach ($errores as $error) {
				$html .= '<li><a href="'. $error['url']. '" target="_blank">'. $error['url']. '</li></a>';
			}
			$html .= '</ul><br><hr>';
		}

		$successes = $this->results->getSuccesses();
		if (!empty($successes)) {
			$html  .= '<p style="color:blue;">下記URLのキャプチャに成功しました！</p>';
			$html .= '<ul>';
			foreach ($successes as $success) {
				$html .= '<li>';
				$html .= '<a href="'. $success['url']. '" target="_blank">'. $success['url']. '<br></a>';
				//$html .= $success['filename']. '<br>';
				$html .= '<a href="'. $success['fileurl']. '" target="_blank"><img src="'. $success['fileurl']. '"></a>';
				$html .= '</li>';
				$html .= '<hr><br>';
			}
			$html .= '</ul>';
		}

		return $html;
	}

	/**
	 * フッタ部を出力
	 */
	private function outputFooter() {
		$html =
			'</body>'.
			'</html>';
		return $html;
	}

}