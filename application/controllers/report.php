<?php 

class report extends controller
{
    public function product()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $product = $this->model('productModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/product/index', ['product' => $product, 'stock' => $stock]);
        $this->render('site/footer');
    }

    public function customer()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $customer = $this->model('customerModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/customer/index', ['customer' => $customer]);
        $this->render('site/footer');
    }

    public function date()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        //Get parameters doesn't work
        if(isset($_GET['startDate']) and isset($_GET['endDate']))
        {
            $data = $this->model('reportModel')->filter($_GET['startDate'], $_GET['endDate']);
        }
        else
        {
            $data = $this->model('reportModel')->filter(date("Y-m-01"), date("Y-m-d"));
        }

        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/date/index', ['data' => $data]);
        $this->render('site/footer');
    }

    public function safe()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $safes = $this->model('safeModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('report/safe/index', ['safes' => $safes]);
        $this->render('site/footer');
    }
}

?>