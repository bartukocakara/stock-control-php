<?php

class customer extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }
        
        $data = $this->model('customerModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('customer/index', ['data' => $data]);
        $this->render('site/footer');
    }
    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("customer/create");
        $this->render("site/footer");
    }
    
    public function send()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        if($_POST)
        {   
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            $name = helper::cleaner($_POST['name']);
            $surname = helper::cleaner($_POST['surname']);
            $email = helper::cleaner($_POST['email']);
            $phone = helper::cleaner($_POST['phone']);
            $address = helper::cleaner($_POST['address']);
            $tc = helper::cleaner($_POST['tc']);
            $note = helper::cleaner($_POST['name']);
            $company = helper::cleaner($_POST['company']);
            if($name != "" and $surname != "")
            {
                $insert = $this->model('customerModel')->create($name, $surname, $email, $phone, $address, $tc, $note, $company);
                if($insert)
                {
                    helper::flashData("status", "Customer added successfully");
                    helper::redirect(SITE_URL."/customer/create");
                }
                else
                {
                    helper::flashData("status", "Customer could't added");
                    helper::redirect(SITE_URL."/customer/create");
                }
            }
            else
            {
                helper::flashData("status", "Please fill the name");
                helper::redirect(SITE_URL."/customer/create");
            }
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $data = $this->model('customerModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('customer/edit', ['data' => $data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }
        
        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);
            $surname = helper::cleaner($_POST['surname']);
            $email = helper::cleaner($_POST['email']);
            $phone = helper::cleaner($_POST['phone']);
            $address = helper::cleaner($_POST['address']);
            $tc = helper::cleaner($_POST['tc']);
            $note = helper::cleaner($_POST['name']);
            $company = helper::cleaner($_POST['company']);

            if($name != "" and $surname != "")
            {
                $edit = $this->model('customerModel')->updateData($name, $surname, $email, $phone, $address, $tc, $note, $company, $id);
                if($edit)
                {
                    helper::flashData("status", "Customer edited successfully");
                    helper::redirect(SITE_URL."/customer/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "Customer couldn't edited");
                    helper::redirect(SITE_URL."/customer/edit/".$id);
                }
            }
            else
            {
                helper::flashData("status", "Please fill the blanks");
                helper::redirect(SITE_URL."/customer/edit/".$id);
            }
        }
        
        
    }

    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $delete = $this->model('customerModel')->deleteData($id);
        
        helper::redirect(SITE_URL."/customer");
    }
}

?>