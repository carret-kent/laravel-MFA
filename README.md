# MFA検証
## 構成
検証環境はLaravel-sailで構成。  
`make sail-up`  

## フロント
Laravel uiのBootstrapで構成
```
/login  認証画面
/register   登録画面
/home   認証後画面
/check  認証コード確認画面
```


## 利用方法
1. /registerで、ユーザを登録しログインを完了させる
2. homeでQRが表示されるため、Authenticatorで読み込みを行う
3. homeでコードを検証
  
## 注意事項
QRはInline表示機能を利用。MFAのコード確認が目的のためSession管理等は実装していない。  
registerで、秘密鍵は生成しUserテーブルに格納している。
