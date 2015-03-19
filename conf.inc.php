<?php
/**
 * 設定ファイル
 *
 * @author Fumiaki Saito
 * @date 2014/02/27
 */
// 本ツールのURL
define('TOOL_URL', 'http://hoge/wkhtmltoimage');

// キャプチャ画像ファイル保存URL
define('IMAGE_URL', TOOL_URL. '/result/image');

// 本ツールの絶対パス
define('TOOL_DIR', dirname(__FILE__));

// HTMLの画像変換コマンド名
define('HTMLTOIMAGE_CMD', TOOL_DIR. '/lib/wkhtmltoimage-i386');

// URL設定ファイル名
define('URL_FILENAME', TOOL_DIR. '/urls.txt');

// 結果HTMLファイル名
define('RESULT_HTML', TOOL_DIR. '/result/result.html');

// キャプチャ画像保存ディレクトリ
define('IMAGE_DIR', TOOL_DIR. '/result/image');
