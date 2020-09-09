<?php 

class helper
{
    static function redirect($url)
    {
        if($url)
        {
            if(!headers_sent())
            {
                header("location:".$url);
            }
            else
            {
                echo '<script>location.href="'.$url.'"</script>';
            }
        }
    }
    static function cleaner($text)
    {
        $array = array("insert", "update", "union", "select", "*");
        $text = str_replace($array, "", $text); //clean Sql injections
        $text = strip_tags($text); //clean html and php tags
        $text = trim($text); //clean white spacese from beginning to end
        return $text;
    }

    // static function flashData($key, $value)
    // {
    //     $_SESSION[$key] = $value;
    // }

    static function flashDataView($key)
    {
        if(isset($_SESSION[$key]))
        {
            $sonuc = $_SESSION[$key];
            unset($_SESSION[$key]);
            echo $sonuc;
        }
    }
}

?>