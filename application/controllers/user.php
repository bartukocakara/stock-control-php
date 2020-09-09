<?php 

class user extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }
        
        $data = $this->model('userModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('user/index', ['data' => $data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }
        
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('user/create', ['data' => $data]);
        $this->render('site/footer');
    }

    public function send()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);
            $email = helper::cleaner($_POST['email']);
            $password = md5($_POST['password']);
            $permission = $_POST['permission'];

            if(isset($name) and isset($email) and isset($password))
            {
                $add = $this->model('userModel')->create($name, $email, $password, implode(', ', $permission));
                if($add)
                {
                    helper::flashData("status", "User added succesfully");
                    helper::redirect(SITE_URL."/user/create");
                }
                else
                {
                    helper::flashData("status", "User couldn't added.");
                    helper::redirect(SITE_URL."/user/create");
                }
            }
            else
            {
                helper::flashData("status", "Please fill the blanks");
                    helper::redirect(SITE_URL."/user/create");
            }
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }
        
        $data = $this->model('userModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('user/edit', ['data' => $data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);
            $email = helper::cleaner($_POST['email']);
            $password = helper::cleaner($_POST['password']);
            $permission = $_POST['permission'];

            if($name != "" and $email != "")
            {
                if($password == "")
                {   
                    $data = $this->model('userModel')->getData($id);
                    $password = $data['password'];
                }
                else
                {
                    $password = md5($password);
                }
                
                $edit = $this->model('userModel')->updateData($id ,$name, $email, md5($password), implode(',', $permission));

                if($edit)
                {
                    helper::flashData("status", "User edited succesfully");
                    helper::redirect(SITE_URL."/user/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "User couldn't edited");
                    helper::redirect(SITE_URL."/user/edit/".$id);
                }
                
            }
            else
            {
                helper::flashData("status", "Please fill the blanks");
                helper::redirect(SITE_URL."/user/edit/".$id); 
            }
        }
    }

    public function delete()
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        $this->model('userModel')->deleteData($id);

        helper::redirect(SITE_URL."/user");
    }
}


?>