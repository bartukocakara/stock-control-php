<?php 

class safe extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $data = $this->model('safeModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('safe/index', ['data' => $data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('safe/create');
        $this->render('site/footer');
    }

    public function send()
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);

            if($name != "")
            {
                $insert = $this->model('safeModel')->create($name);

                if($insert)
                {
                    helper::flashData("status", "Safe added succesfully");
                    helper::redirect(SITE_URL."/safe/create");
                }
                else
                {
                    helper::flashData("status", "Safe couldn't added");
                    helper::redirect(SITE_URL."/safe/create");
                }
                
            }
            else
            {
                helper::flashData("status", "Please fill the name");
                helper::redirect(SITE_URL."/safe/create"); 
            }
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        $data = $this->model('safeModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('safe/edit', ['data' => $data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);

            if($name != "")
            {
                $edit = $this->model('safeModel')->updateData($id ,$name);

                if($edit)
                {
                    helper::flashData("status", "Safe edited succesfully");
                    helper::redirect(SITE_URL."/safe/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "Safe couldn't edited");
                    helper::redirect(SITE_URL."/safe/edit/".$id);
                }
                
            }
            else
            {
                helper::flashData("status", "Please fill the name");
                helper::redirect(SITE_URL."/safe/edit/".$id); 
            }
        }
    }

    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        $this->model('safeModel')->deleteData($id);

        helper::redirect(SITE_URL."/safe");
    }  
}

?>