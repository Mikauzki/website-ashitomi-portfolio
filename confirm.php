<?php
// POSTされたデータの取得
$name = $_POST['name'];
$address = $_POST['address'];
$title = $_POST['title'];
$message = $_POST['message'];

// 入力内容のチェック
$errors = [];

// 名前が未入力の場合
if ($name === '') {
	$errors[] = '名前を入力してください。';
}

// メールアドレスが未入力の場合
if ($address === '') {
	$errors[] = 'メールアドレスを入力してください。';
}
// メールアドレスの形式チェック
if (!filter_var($address, FILTER_VALIDATE_EMAIL)) {
	$errors[] = 'メールアドレスの形式が正しくありません。';
}

// メッセージが未入力の場合
if ($message === '') {
	$errors[] = 'お問い合わせ内容を入力してください。';
}

// エラーがある場合
if (count($errors) > 0) {
	// エラーがある場合は入力画面に戻る
	$_SESSION['errors'] = $errors;
	header('Location: index.php');
	exit();
}
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
	<title>お問い合わせ内容の確認</title>
	<meta name="keywords" content="コーディング,ウェブ制作,動画編集,SNS運用,EC運用,ウェブ広告,SEO対策,バナー制作,理学療法士" />
	<meta name="description" content="あしとみかずきと申します。Webのお仕事をさせてもらっています。Webサイトのフロントコーディングがメインですが、広告やSEO、SNS運用など幅広く経験しております。お仕事の依頼やお問い合わせにつきましてはフォームからお願いいたします。" />
</head>

<body class="form_body">
	<h1 class="form_title">確認画面</h1>
	<p class="form_text">以下の内容でよろしければ「送信する」ボタンをクリックしてください。</p>
	<search>
		<form class="form" method="post" action="thanks.php">
			<label>name<span>*</span></label>
			<p class="form_text"><?php echo htmlspecialchars($name, ENT_QUOTES); ?></p>
			<label>address<span>*</span></label>
			<p class="form_text"><?php echo htmlspecialchars($address, ENT_QUOTES); ?></p>
			<label>title</label>
			<p class="form_text"><?php echo htmlspecialchars($title, ENT_QUOTES); ?></p>
			<div>
				<label>message<span>*</span></label>
				<p class="form_text"><?php echo nl2br(htmlspecialchars($message, ENT_QUOTES)); ?></p>
			</div>
			<input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">
			<input type="hidden" name="address" value="<?php echo htmlspecialchars($address, ENT_QUOTES); ?>">
			<input type="hidden" name="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES); ?>">
			<input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES); ?>">
			<button class="btn back_btn" type="button" onclick="history.back()">戻る</button>
			<button class="btn send_btn" type="submit">送信する</button>
		</form>
	</search>
</body>

</html>