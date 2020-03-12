<?php

 class Config 
 {
     public $config = [
         'host' => 'localhost',
         'user' => 'root',
         'password' => '',
         'db' => 'test_db',
         'charset' => 'utf8',
         'pdo' => null
     ];
 }

 class Connect extends Config
    {

        public function __construct()
        {
            $dsn = "mysql:host={$this->config['host']};dbname={$this->config['db']};charset={$this->config['charset']}";
            $opt = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $this->pdo = new PDO($dsn, $this->config['user'], $this->config['password'], $opt);
        }
    }

    class Db extends Connect
    {
        public $table_name = '';

         /**
     * добавление записи в таблицу
     * @param array $data массив данных для сохранения
     * @return Boolen
     */
    public function insert($data)
    {
        $data['created_at'] = Date('Y-m-d H:i:s');
        $fields = $this->set_fields($data);
        $sql = "INSERT INTO `{$this->table_name}` SET ".$fields;
        $stmt = $this->pdo->prepare( $sql );

        return $stmt->execute($data);
    }

    public function update($data)
    {
        $fields = $this->set_fields($data);
        $sql = "UPDATE `{$this->table_name}` SET ".$fields.' WHERE id=:id';

        $stmt = $this->pdo->prepare( $sql );
        return $stmt->execute($data);
    }

    public function set_fields( $items, $delimiter = "," ){
        $str = array();
        if(empty($items)) return "";
        foreach ($items as $key=>$item){
            $str[] = "`".$key."`=:".$key;
        }
        return implode($delimiter, $str );
    }

    public function get_count( $where = array() )
    {

        $sql = "SELECT count(*) FROM {$this->table_name}";
        if( count( $where) > 0 ){
            $fields = $this->set_fields($where, " AND ");
            $sql .= " WHERE ".$fields;
        }

        $smtp = $this->pdo->prepare($sql);
        $smtp->execute($where);
        $result = $smtp->fetch( PDO::FETCH_NUM );

        return (int)$result[0];
    }

    public function get_all($order = "id asc")
    {
        $sql = "SELECT * FROM `{$this->table_name}` ORDER BY $order";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        return $result;
    }

    /**
     * (new City())->get_one(['id' => 5])
     */
    public function get_one($where = [], $order = "id asc")
    {
        $sql = "SELECT * FROM `{$this->table_name}`";
        if( count( $where) > 0 ){
            $fields = $this->set_fields($where, " AND ");

            $sql .= " WHERE ".$fields;
        }
        $sql .= " ORDER BY $order";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($where);
        $result = $stmt->fetch();
        return $result;
    }

}
