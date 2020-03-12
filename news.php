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
<a href="listNews.php">Назад</a>
<a href="addNews.php">Добавить новую новост</a>
    <?php
        require_once('NewsClass.php');
        $ClassNews = new News();
        $news = $ClassNews->get_one(['id'=>$_GET['id']]);
        echo '<ul>';
        echo '<li>'.'<h3>'.$news['name'].'</h3>'.'<br>'.$news['news_text'].'<br>'.'Автор: '.$news['author'].'<br>'.'Категоря: '.$news['category'].'</li>';
        echo '</ul>';
    ?>
<script src="js/main.js"></script>
</body>
</html>