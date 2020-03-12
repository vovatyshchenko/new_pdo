<?php
require_once('NewsClass.php');

    class Delete extends News
    {

        public function isGet()
        {
            return $_SERVER['REQUEST_METHOD'] == 'GET';
        }

        public function getId()
        {
            if (empty($_GET['id']))
            {
                return "";
            }
            return $id = trim(strip_tags(htmlspecialchars($_GET['id'])));
        }

        public function Del()
        {
            $arr = ['id' => $this->getId()];
            $sql = ("DELETE FROM `{$this->table_name}` WHERE `id` = :id");
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($arr);
            header("Location: /db/listNews.php");
        }
    }

    $deleteClass = new Delete();

    if( $deleteClass->isGet() )
    {
        $deleteClass->Del();
    }
    