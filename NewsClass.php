<?php

require_once('DbClass.php');

Class News extends Db
{
	public $table_name = 'news';

	public function getNews($order = "id DESC")
        {
        echo '<ul>';
        $sql = $this->pdo->query("SELECT * FROM `{$this->table_name}` ORDER BY $order");
        while ($row = $sql->fetch(PDO::FETCH_OBJ))
        {
            echo '<li>'.'<a href="news.php?id='.$row->id.'">'.$row->name.'</a>'.'<br>'.'Дата: '.$row->created_at.'<a href="delete.php?id='.$row->id.'"><button type="button">Удалить</button></a>'.'</li>';
        }
        echo '</ul>';
		}
		
}
