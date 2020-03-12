<!DOCTYPE html>
<html lang="en,ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>addNews</title>
</head>
<body>
<a href="listNews.php">Список новостей</a>
<form action="server.php" method="POST" id="form_news" onsubmit="return false;">
    <p>Добавление новости:</p>
    <div>
        <label for="news">Название новости</label>
        <input type="text" name="name" id="name_news">
        <div class="invalid_data"></div>
    </div>
    <div>
        <p>Статус:</p>
        <label for="news_radio_draft">Черновик</label>
        <input type="radio" name="status" id="news_radio_draft" value="Черновик" checked >
        <label for="news_radio_public">Опубликована</label>
        <input type="radio" name="status" id="news_radio_public" value="Опубликована">
    </div>
    <div>
        <label for="news_category">Раздел новости</label>
        <select id="news_category" name="category">
            <option>Выберите раздел новости</option>
            <option value="Спорт">Спорт</option>
            <option value="Культура">Культура</option>
            <option value="Политика">Политика</option>
            <option value="Наука">Наука</option>
            <option value="Финансы">Финансы</option>
        </select>
</div>
    <div>
        <textarea name="news_text" id="news_text" cols="30" rows="10" placeholder="Введите текс новости..."></textarea>
        <div class="invalid_data"></div>
    </div>
   <div>
        <label for="news_author">Автор</label>
        <input type="text" id="news_author" name="author">
   </div>
    <input type="submit">
</form>
<script src="js/main.js"></script>
</body>
</html>