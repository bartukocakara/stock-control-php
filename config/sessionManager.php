<?php 

class sessionManager extends model
{

    static function createSession($array = [])
    {
        foreach ($array as $key => $value)
        {
            $_SESSION[$key] = helper::cleaner($value);
        }
    }

    static function deleteSession($key)
    {
        unset($_SESSION[$key]);
    }

    static function allSessionDelete()
    {
        session_destroy();
    }

    public function isLogged()
    {
        if(isset($_SESSION['email']) AND isset($_SESSION['password']))
        {
            $email = $_SESSION["email"];
            $password = $_SESSION['password'];

            $sql = "select * from users where email=? and password=?";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$email, $password]);

            if($stmt->rowCount() != 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            false;
        }
    }

    public function getUserInfo()
    {
        if($this->isLogged())
        {
            $email = $_SESSION["email"];
            $password = $_SESSION["password"];
            $sql = "select * from users where email=? and password=?";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$email, $password]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }

    } 


}


?>