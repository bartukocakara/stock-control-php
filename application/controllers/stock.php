<?php 

class stock extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $stocks = $this->model('stockModel')->lists();
        $products = $this->model('productModel')->lists();
        $safes = $this->model('safeModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/index', ['stocks' => $stocks, 'products' => $products, 'safes' => $safes]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $products = $this->model('productModel')->lists();
        $customers = $this->model('customerModel')->lists();
        $safes = $this->model('safeModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/create', ['products' => $products, 'customers' => $customers, 'safes' => $safes]);
        $this->render('site/footer');   
    }
    public function send()
    {
        if($_POST)
        {   
            $safeId = intval($_POST['safe_id']);
            $productId = intval($_POST['product_id']);
            $processType = intval($_POST['process_type']);
            $quantity = intval($_POST['quantity']);
            $price = helper::cleaner($_POST['price']);
            $customerId = intval($_POST['customer_id']);

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            if($quantity != 0 and $price != "")
            {
                $add = $this->model('stockModel')->create($safeId, $productId, $processType, $quantity, $price, $customerId);
                if($add)
                {
                    helper::flashData("status", "Stock added succesfully");
                    helper::redirect(SITE_URL."/stock/create");
                }
                else
                {
                    helper::flashData("status", "Stock couldn't added");
                    helper::redirect(SITE_URL."/stock/create");
                }
            }
            else
            {
                helper::flashData("status", "Please fill the quantity and price");
                helper::redirect(SITE_URL."/stock/create");
            }
        }
        
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $products = $this->model('productModel')->lists();
        $customers = $this->model('customerModel')->lists();
        $safes = $this->model('safeModel')->lists();
        $stock = $this->model('stockModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stock/edit', ['products' => $products, 'customers' => $customers, 'stock' => $stock, 'safes' => $safes]);
        $this->render('site/footer');   
    }

    public function update($id)
    {
        if($_POST)
        {   
            $safeId = intval($_POST['safe_id']);
            $productId = intval($_POST['product_id']);
            $processType = intval($_POST['process_type']);
            $quantity = intval($_POST['quantity']);
            $price = helper::cleaner($_POST['price']);
            $customerId = intval($_POST['customer_id']);

            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // exit;
            if($quantity != 0 and $price != "")
            {
                $update = $this->model('stockModel')->updateData($id, $safeId, $productId, $processType, $quantity, $price, $customerId);
                if($update)
                {
                    helper::flashData("status", "Stock edited succesfully");
                    helper::redirect(SITE_URL."/stock/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "Stock couldn't edited");
                    helper::redirect(SITE_URL."/stock/edit/".$id);
                }
            }
            else
            {
                helper::flashData("status", "Please fill the quantity and price");
                helper::redirect(SITE_URL."/stock/edit/".$id);
            }
        }
    }

    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $this->model('stockModel')->deleteData($id);

        helper::redirect(SITE_URL."/stock");
    }
}


?>