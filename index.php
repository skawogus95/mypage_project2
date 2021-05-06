<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/css/common.css">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/css/main.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" helper></script>
    <script src="http://<?=$_SERVER["HTTP_HOST"]?>/mypage_project2/js/common.js" defer></script>
    <title>Health Community</title>
</head>

<body>
    <header>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/mypage_project2/header.php"; ?>
    </header>

    <section>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/mypage_project2/main.php"; ?>
    </section>

    <footer>
        <?php include_once $_SERVER['DOCUMENT_ROOT']."/mypage_project2/footer.php"; ?>
    </footer>

</body>
</html>