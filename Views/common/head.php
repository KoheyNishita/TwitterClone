<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="<?php echo HOME_URL; ?>Views/img/logo-twitterblue.svg">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>Views/css/style.css">
<!-- 複数のCSSファイルを読み込んだ際に干渉すると、後のものが優先される -->
<!-- JS jQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
<!-- JavaScript Bundle with Popper  これは上のJS jQueryに依存しているのでその下に書く-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>
<!-- いいね！ボタンのJS -->
<script src="<?php echo HOME_URL; ?>Views/js/likes.js" defer></script>
<!-- JSのファイルにdefer属性を指定すると、JSの読み込みを遅らせる→HTML全体の読み込みが優先され、ページが早く読み込まれる -->
<!-- 通常読み込まれるScriptが、deferありのScriptに依存しているとエラーが起こる場合アリ -->