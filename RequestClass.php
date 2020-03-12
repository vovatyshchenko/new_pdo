<?php

class Request
{
    private $errors = [];

	public function isPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	} 

	public function required($nameInput)
	{
		$inputData = $_POST[$nameInput] ?? '';
		$data = $this->clearData($inputData);

		if(empty($data))
		{
            $this->errors[$nameInput][] = 'Поле обазятельно к заполнению';
            return false;
        }
        return true;
    }
    
	public function getErrors()
	{
		return $this->errors;
	}

	public function clearData($text)
	{
		$text = trim(strip_tags(htmlspecialchars($text)));
		return $text;
	}
	
	public function getData($data)
    {
		if (isset($data)) {
			foreach ($data as $key=>$value){
				$arr[$key]=$this->clearData($value);
			}
		}
		return $arr;
    }
}