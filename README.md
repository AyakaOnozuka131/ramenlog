# 口コミレビューサイト ラーメンログ（サンプルWebサービス）

<img width="1004" alt="スクリーンショット 2021-12-05 14 03 22" src="https://user-images.githubusercontent.com/66758087/144734403-0ba90ee9-1a81-4ac7-9e40-95f7d6974033.png">


## 使用フレームワーク
- Laravel 6.x
- Vue.js 2.x

## デモサイト
[https://gunma-ramenlog.herokuapp.com/](https://gunma-ramenlog.herokuapp.com/)

## 概要
ラーメンが好きでよく食べに行くので、群馬県内に特化したラーメン店の口コミサイトを制作しました。  
このWebサービスではラーメン店の登録と、店舗に対しての口コミを5段階評価とコメントで投稿できます。  
店舗登録と口コミは会員登録が必要ですが、投稿された口コミは会員登録していないユーザーでも閲覧することができます。


## こだわったポイント
飲食店クチコミサイトの食べログ・ラーメンの口コミのみ登録できるラーメンデータベースなどの実際にあるWebサービスを参考にしました。  
機能の洗い出しからデザイン・HTMLコーディング・DB設計・Laravel+Vue.jsでの実装を行い、Herokuでデプロイまで行いました。  
特に苦労した点はHerokuのデプロイです。  
Herokuがデフォルトで使用しているPostgreSQLではなく、MySQLを使用したかったため設定方法に苦労しました。  
Laravelデプロイ後もエラーがあり、なぜエラーが出ているかエラー文の調査・解消していった点も制作していて難しかった点の1つです。  
今後つまづく事もあると思い、デプロイ方法の記事を自身のブログでまとめました。  
https://ayaka-weblog.com/programming/laravel/laravel-heroku/


## 機能
- ユーザー登録・編集・退会
- ログイン・ログアウト
- パスワードリマインダー
- マイページ
- 店舗登録・編集・削除
- 口コミ登録・編集・削除
- キーワード・カテゴリー絞り込み検索
- お気に入り登録
- ページネーション


## 使用環境

### ローカル環境
- VirtualBox
- Vagrant
- Homestead
- Composer
- MySQL


### 本番環境
Herokuを使用
- MySQL


## DB設計
以下スプレッドシートにまとめました。  
https://docs.google.com/spreadsheets/d/1moh5kbqm7_G0Dcjt2c4WPN4I_cw1D0yLh-sS7xlHc-o/edit?usp=sharing


## 制作期間
- 135h（91日）
