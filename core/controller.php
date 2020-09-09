<?php

class controller
{
    public $sessionManager;
    public $myuserInfo;

    public function __construct()
    {
        $this->sessionManager = new sessionManager();
        $this->myuserInfo = $this->sessionManager->getUserInfo();
    }


    public function render($file,$params = [])
    {
        if(file_exists(VIEWS_PATH."/".$file.".php"))
        {
            // extract($params);
            require_once VIEWS_PATH."/".$file.".php";
        }
        else
        {
            exit($file." Görüntü Dosyası bulunamadı");
        }
    }

    public function model($file)
    {
        if(file_exists(MODELS_PATH."/".$file.".php"))
        {
            require_once MODELS_PATH."/".$file.".php";
            if(class_exists($file))
            {
                return new $file;
            }
            else
            {
                exit($file." bir class degil");
            }
        }
        else
        {
            exit($file." Model Dosyası bulunamadı");
        }
    }
}



?>