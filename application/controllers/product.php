<?php 

class product extends controller 
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $data = $this->model('productModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('product/index', ['data' => $data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $category = $this->model('categoryModel')->lists();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("product/create", ['category' => $category]);
        $this->render("site/footer");
    }

    public function send()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die; }

        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);
            $categoryId = intval($_POST['categoryId']);
            $properties = json_encode($_POST['property']);
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            if($name != "")
            {
                $insert = $this->model('productModel')->create($name, $categoryId, $properties);
                if($insert)
                {
                    helper::flashData("status", "Product added succesfully");
                    helper::redirect(SITE_URL."/product/create");
                }
            }
            else
            {
                helper::flashData("status", "Product couldn't added");
                helper::redirect(SITE_URL."/product/create");
            }
        }
        else
        {
            helper::flashData("status", "Product name can't be empty");
            helper::redirect(SITE_URL."/product/create");
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }
        
        $category = $this->model('categoryModel')->lists();
        $data = $this->model('productModel')->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("product/edit", ['category' => $category, 'data' => $data]);
        $this->render("site/footer");
    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $name = helper::cleaner($_POST['name']);
            $categoryId = intval($_POST['categoryId']);
            $properties = json_encode($_POST['property']);

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            if($name != "")
            {
                $edit = $this->model('productModel')->updateData($id, $name, $categoryId, $properties);
                if($edit) {
                    
                    helper::flashData("status", "Product edited successfully");
                    helper::redirect(SITE_URL."/product/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "Product couldn't edited");
                    helper::redirect(SITE_URL."/product/edit/".$id);
                }
            }
            else
            {
                helper::flashData("status", "Please fill all the blanks");
                helper::redirect(SITE_URL."/product/edit/".$id);
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

        $this->model('productModel')->deleteData($id);
        
        helper::redirect(SITE_URL."/product");
    }

} 


?>