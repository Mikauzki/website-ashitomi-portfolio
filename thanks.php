<?php
// フォームから送信されたデータを変数に格納する
$name = $_POST['name'];
$address = $_POST['address'];
$title = $_POST['title'];
$message = $_POST['message'];

// メールの送信先アドレス
$to = 'kazuki0213.a@icloud.com';

// 件名
$subject = 'お問い合わせがありました';
// 本文
$body = 'お名前：' . $name . "\n" .
	'メールアドレス：' . $address . "\n" .
	'件名：' . $title . "\n" .
	'お問い合わせ内容：' . "\n" . $message;
// ヘッダー
$header = 'From: ' . $address . "\r\n" .
	'Reply-To: ' . $address . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
// メール送信
$result = mail($to, $subject, $body, $header);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="preconnect" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.min.css" />
	<title>お問い合わせありがとうございました。</title>
	<meta name="keywords" content="コーディング,ウェブ制作,動画編集,SNS運用,EC運用,ウェブ広告,SEO対策,バナー制作,理学療法士" />
	<meta name="description" content="あしとみかずきと申します。Webのお仕事をさせてもらっています。Webサイトのフロントコーディングがメインですが、広告やSEO、SNS運用など幅広く経験しております。お仕事の依頼やお問い合わせにつきましてはフォームからお願いいたします。" />
</head>
<body class="form_body">
<?php
// メール送信の成功・失敗を確認
if ($result) {
	echo '<h1 class="form_title">お問い合わせありがとうございました。</h1>';
	echo '<p class="form_text">改めてご連絡差し上げます</p>';
} else {
	echo 'メールの送信に失敗しました';
}
?>
	<a class="btn send_btn" href="/">topへ</a>
</body>
</html>