<?php 

class reportModel extends model
{
    public function entryProductTotal($id)
    {
        $sql = "select SUM(price*quantity) as total from stock where product_id=? and process_type='0'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['total']);
    }

    public function entryProductTotalSafe($id)
    {
        $sql = "select SUM(price*quantity) as total from stock where safe_id=? and process_type='0'";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['total']);
    }

    public function outProductTotal($id)
    {
        $sql = "select SUM(price*quantity) as total  from stock where product_id=? and process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['total']);
    }

    public function outProductTotalSafe($id)
    {
        $sql = "select SUM(price*quantity) as totalfrom stock where safe_id=? and process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['total']);
    }

    public function entryProductQuantity($id)
    {
        $sql = "select SUM(quantity) from stock where product_id=? and process_type='0'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return doubleval($result['SUM(quantity)']);
    }

    public function entryProductQuantitySafe($id)
    {
        $sql = "select SUM(quantity) from stock where safe_id=? and process_type='0'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return doubleval($result['SUM(quantity)']);
    }

    public function outProductQuantity($id)
    {
        $sql = "select SUM(quantity) from stock where product_id=? and process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['SUM(quantity)']);
    }

    public function outProductQuantitySafe($id)
    {
        $sql = "select SUM(quantity) from stock where safe_id=? and process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['SUM(quantity)']);
    }

    public function totalPriceBought($id)
    {
        $sql = "select SUM(price) from stock where customer_id=? and process_type=1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['SUM(price)']);
    }

    public function totalPriceSold($id)
    {
        $sql = "select SUM(price) from stock where customer_id=? and process_type=0";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['SUM(price)']);
    }

    public function totalPriceEarned($id)
    {
        $sql = "select SUM(price*quantity) as total from stock where customer_id=? and process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['total']);
    }

    public function totalPriceLoss($id)
    {
        $sql = "select SUM(price*quantity) as total from stock where customer_id=? and process_type='0'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return doubleval($result['total']);
    }

    public function totalLoss()
    {
        $sql = "select SUM(price*quantity) as total from stock where process_type='0'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $totalLoss = doubleval($result['total']);
        return $totalLoss;
    }

    public function totalProfit()
    {
        $sql = "select SUM(price*quantity) as total from stock where process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $totalProfit = doubleval($result['total']);
        return $totalProfit;
    }

    public function filter($startDate, $endDate)
    {
        $sql = "select * from stock where date between ? and ? group by product_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$startDate, $endDate]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalProductQuantityEntry()
    {
        $sql = "select SUM(quantity) from stock where process_type='0'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total =  doubleval($result['SUM(quantity)']);
        return $total;
    }

    public function totalProductQuantityOut()
    {
        $sql = "select SUM(quantity) from stock where process_type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total =  doubleval($result['SUM(quantity)']);
        return $total;
    }

    public function billExpense($customerId)
    {
        $sql = "select SUM(amount) as total from bills where customer_id=? and type='0'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$customerId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return doubleval($result['total']);
    }

    public function billIncome($customerId)
    {
        $sql = "select SUM(amount) as total from bills where customer_id=? and type='1'";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$customerId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return doubleval($result['total']);
    }
}


?>