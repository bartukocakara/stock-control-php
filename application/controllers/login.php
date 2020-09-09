<?php 

class login extends controller
{
    public function index()
    {
        $this->render('login');
    }

    public function send()
    {

        if(isset($_POST))
        {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            $email = helper::cleaner($_POST['email']);
            $password = helper::cleaner($_POST['password']);

            if($email != "" and $password != "")
            {
                $control = $this->model('userModel')->control($email, md5($password));
                
                if($control == 0)
                {
                    helper::flashData("status", "Böyle bir kullanıcı yok");
                    helper::redirect(SITE_URL."/login");
                }
                else
                {
                    sessionManager::createSession(["email" => $email, "password" => md5($password)]);
                    helper::redirect(SITE_URL);
                }
            }
            else
            {
                helper::flashData("status", "Lütfen tüm alanları doldurunuz");
                helper::redirect(SITE_URL."/login");
            }
        }
        else
        {
            exit("Hatalı Giriş");
        }
    }
}


?>