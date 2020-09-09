<?php 

class bill extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $data = $this->model('billModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('bill/index', ['data' => $data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL); die(); }

        $customers = $this->model('customerModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('bill/create', ['customers' => $customers]);
        $this->render('site/footer');
    }

    public function send()
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $customer_id = intval($_POST['customer_id']);
            $billNo = intval($_POST['bill_no']);
            $amount = helper::cleaner($_POST['amount']);
            $explanation = helper::cleaner($_POST['explanation']);
            $type = intval($_POST['type']);

            if($customer_id != 0 and $billNo != 0 and $amount != "")
            {
                $insert = $this->model('billModel')->create($customer_id, $billNo, $amount, $explanation, $type);

                if($insert)
                {
                    helper::flashData("status", "Bill added succesfully");
                    helper::redirect(SITE_URL."/bill/create");
                }
                else
                {
                    helper::flashData("status", "Bill couldn't added");
                    helper::redirect(SITE_URL."/bill/create");
                }
                
            }
            else
            {
                helper::flashData("status", "Please fill the name");
                helper::redirect(SITE_URL."/bill/create"); 
            }
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }
        
        $data = $this->model('billModel')->getData($id);
        $customers = $this->model('customerModel')->lists();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('bill/edit', ['data' => $data, 'customers' => $customers]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        if($_POST)
        {
            $customer_id = intval($_POST['customer_id']);
            $billNo = intval($_POST['bill_no']);
            $amount = helper::cleaner($_POST['amount']);
            $explanation = helper::cleaner($_POST['explanation']);
            $type = intval($_POST['type']);

            if($customer_id != 0 and $billNo != 0 and $amount != "")
            {
                $edit = $this->model('billModel')->updateData($id, $customer_id, $billNo, $amount, $explanation, $type);

                if($edit)
                {
                    helper::flashData("status", "Bill edited succesfully");
                    helper::redirect(SITE_URL."/bill/edit/".$id);
                }
                else
                {
                    helper::flashData("status", "Bill couldn't edited");
                    helper::redirect(SITE_URL."/bill/edit/".$id);
                }
                
            }
            else
            {
                helper::flashData("status", "Please fill the customer_id");
                helper::redirect(SITE_URL."/bill/edit/".$id); 
            }
        }
    }

    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()){ helper::redirect(SITE_URL); die(); }

        $this->model('billModel')->deleteData($id);

        helper::redirect(SITE_URL."/bill");
    }
}


?>