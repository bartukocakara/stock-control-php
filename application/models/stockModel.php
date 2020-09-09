<?php 

class stockModel extends model
{
    public function lists()
    {
        $sql = "select * from stock";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($safeId, $productId, $processType, $quantity, $price, $customerId)
    {
        $sql = "insert into stock(safe_id, product_id, process_type, quantity, price, date, customer_id) values(?, ?, ?, ?, ?, ?, ?)";

        $date = date("Y-m-d");
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$safeId, $productId, $processType, $quantity, $price, $date, $customerId]);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    
    public function getData($id)
    {
        $sql = "select * from stock where product_id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id, $safeId, $productId, $processType, $quantity, $price, $customerId)
    {
        $sql = "update stock set safe_id=?, product_id=?, process_type=?, quantity=?, price=?, date=?, customer_id=? where id=?";

        $date = date("Y-m-d");
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$safeId, $productId, $processType, $quantity, $price, $date, $customerId, $id]);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteData($id)
    {
        $sql = "delete from stock where id=?";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$id]);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


?>