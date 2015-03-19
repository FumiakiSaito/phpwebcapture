<?php
/**
 * キャプチャ取得実行スクリプト
 *
 * @author Fumiaki Saito
 * @date 2014/02/27
 */
require_once 'conf.inc.php';
require_once 'Urls.class.php';
require_once 'Results.class.php';
require_once 'Html.class.php';


$urls = new Urls(URL_FILENAME);
$results = new Results();

while (!$urls->isLastUrl()) {

	// キャプチャを取得するURLを取得
	$url = $urls->getCurrentUrl();
	if (empty($url)) {
		continue;
	}

	// 画像ファイル名設定(ファイル名は連番.jpgとする)
	$image_filename = sprintf('%s/%s.jpg', IMAGE_DIR, $urls->getCurrent());
	$image_fileurl  = sprintf('%s/%s.jpg', IMAGE_URL, $urls->getCurrent());

	// キャプチャ取得コマンド実行
	$cmd = sprintf('%s "%s" %s', HTMLTOIMAGE_CMD, $url, $image_filename);
	exec($cmd, $output, $return_var);
	@chmod($image_filename, 0777);

	if ($return_var == 0) {
		// 成功結果保存
		$results->addSuccessResult($url, $image_filename, $image_fileurl);
	} else {
		// 失敗結果保存
		$results->addErrorResult($url, $image_filename);
	}
	$urls->nextUrl();
}

// 結果HTML保存
$html = new Html($results);
$html->save(RESULT_HTML);


echo '実行完了！';
