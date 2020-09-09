<?php 

class category extends controller
{

    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $data = $this->model('categoryModel')->lists();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render('category/index', ['data' => $data]);
        $this->render("site/footer");

    }


    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("category/create");
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

            if($name != "")
            {
                $add = $this->model('categoryModel')->create($name);
                if($add) {
                    
                    helper::flashData("status", "Category added successfully");
                    helper::redirect(SITE_URL."/category/create");
                }
                else
                {
                    helper::flashData("status", "Category couldn't added");
                    helper::redirect(SITE_URL."/category/create");
                }
            }
            else
            {
                helper::flashData("status", "Please fill all the blanks");
                helper::redirect(SITE_URL."/category/create");
            }
        }
        else
        {
            exit("No entry");
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $data = $this->model('categoryModel')->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render('category/edit', ['data' => $data]);
        $this->render("site/footer");

    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            $name = helper::cleaner($_POST['name']);

            if($name != "")
            {
                $edit = $this->model('categoryModel')->updateData($name, $id);
                if($edit) {
                    
                    helper::flashData("status", "Category edited successfully");
                    helper::redirect(SITE_URL."/category/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "Category couldn't edited");
                    helper::redirect(SITE_URL."/category/edit/".$id);
                }
            }
            else
            {
                helper::flashData("status", "Please fill all the blanks");
                helper::redirect(SITE_URL."/category/edit/".$id);
            }
        }
        else
        {
            exit("No entry");
        }
    }

    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $delete = $this->model('categoryModel')->deleteData($id);
        
        helper::redirect(SITE_URL."/category");
    }
}

?>