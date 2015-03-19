##概要
設定したURLのキャプチャを取得し結果htmlとして出力するツールです。

内部的にwkhtmltoimageというコマンドツールを使用しています。  


###設置手順
* 必須ライブラリインストール

```
yum install libXrender.so.1 libXext libXrender
yum install libfontconfig.so.1 fontconfig
yum install libXrender.i686 fontconfig.i686 libXext.i686 libstdc++47.i686
yum install libz.so.1
```

* 本ツールをドキュメントルート以下に置く

* コマンド(lib/wkhtmltoimage-i386)に実行権限を与える(555とか？)

* 結果保存ディレクトリ(resultとresult/image)の権限を777にする

* 設定ファイル(conf.inc.php)に適切な値を設定
   →基本的には定数のTOOL_URLだけ変えればOKかと思います。

* urls.txtにキャプチャを取得したいURLを記述する

* run.phpを実行する(コマンドでもブラウザからでもOK)
   →コマンドの場合：php run.php
   →ブラウザの場合：http://xxxxx/run.php

* ブラウザから結果html(result/result.html)にアクセスする

