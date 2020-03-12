<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once('RequestClass.php');
$requestClass = new Request();

	if($requestClass->isPost()){

		$requestClass->required('name');
		$requestClass->required('news_text');
        $errors = $requestClass->getErrors();
	    echo json_encode($errors);
        
		if ( ($requestClass->required('name')) && ($requestClass->required('news_text')) ){

			require_once('NewsClass.php');
            $newsClass = new News();

			$result = $newsClass->insert($requestClass->getData($_POST));

			$status = 'error';
			if($result)
			{
				$status = 'ok';
			}
            echo json_encode(['status' => $status]);
		}

	} else{
        header("Location: /");
    }

