<?php
/**
 * キャプチャ結果クラス
 *
 * @author Fumiaki Saito
 * @date 2014/02/27
 */
class Results
{
	// 成功結果
	private $successes;

	// 失敗結果
	private $errors;


	public function __construct() {
		$this->successes = array();
		$this->errors = array();
	}


	/**
	 * 成功結果を保存
	 * @param $url      ページURL
	 * @param $filename 保存ファイル名
	 * @param $fileurl  保存ファイルアクセスURL
	 */
	public function addSuccessResult($url, $filename, $fileurl) {
		$this->successes[] = array('url' => $url, 'filename' => $filename, 'fileurl' => $fileurl);
	}


	/**
	 * 失敗結果を保存
	 * @param $url      ページURL
	 * @param $filename 保存ファイル名
	 */
	public function addErrorResult($url, $filename) {
		$this->errors[] = array('url' => $url, 'filename' => $filename);
	}


	/**
	 * 成功結果を取得
	 */
	public function getSuccesses() {
		return $this->successes;
	}


	/**
	 * 失敗結果を取得
	 */
	public function getErrors() {
		return $this->errors;
	}
}