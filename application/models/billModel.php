<?php 

class billModel extends model
{
    public function lists()
    {
        $sql = "select * from bills";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($customer_id, $bill_no, $amount, $explanation, $type)
    {
        $sql = "insert into bills(customer_id, bill_no, amount, explanation, type) values (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$customer_id, $bill_no, $amount, $explanation, $type]);

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
        $sql = "select * from bills where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateData($id, $customer_id, $billNo, $amount, $explanation, $type)
    {
        $sql = "update bills set customer_id=?, bill_no=?, amount=?, explanation=?, type=? where id=?";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$customer_id, $billNo, $amount, $explanation, $type, $id]);

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
        $sql = "delete from bills where id = ?";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$id]);

        return $result;
    }
}


?>