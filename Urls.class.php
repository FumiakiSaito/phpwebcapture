<?php
/**
 * キャプチャ取得URLクラス
 *
 * @author Fumiaki Saito
 * @date 2014/02/27
 */
class Urls
{
	private $urls;
	private $current;
	private $url_maxcnt;


	/**
	 * URLファイルを読み込む
	 *
	 * @param $filename URL一覧ファイル名
	 */
	public function __construct($filename) {
		$this->urls = array();

		$fp = fopen($filename, 'r');
		while ($buffer = fgets($fp, 4096)) {
			$url = trim($buffer);
			if (!empty($url)) {
				$this->urls[] = $url;
			}
		}
		fclose($fp);

		$this->url_maxcnt = count($this->urls);
		$this->current = 0;
	}


	/**
	 * 現在位置のURLを取得
	 */
	public function getCurrentUrl() {
		return $this->urls[$this->current];
	}


	/**
	 * 次のURLに進む
	 */
	public function nextUrl() {
		$this->current++;
	}


	/**
	 * 最後のURLか調べる
	 */
	public function isLastUrl() {
		if ($this->current >= $this->url_maxcnt) {
			return true;
		}
		return false;
	}


	/**
	 * 現在位置を返す
	 */
	public function getCurrent() {
		return $this->current;
	}
}