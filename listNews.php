<!DOCTYPE html>
<html lang="en,ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>listNews</title>
</head>
<body>
<a href="addNews.php">Назад</a>
    <?php
        require_once('NewsClass.php');
        $ClassNews = new News();
        $ClassNews->getNews();
    ?>
<script src="js/main.js"></script>
</body>
</html>