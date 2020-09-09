<?php 

class customerModel extends model
{
    public function lists()
    {
        $sql = "select * from customers";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function create($name, $surname, $email, $phone, $address, $tc, $note, $company)
    {
        $sql = "insert into customers(name, surname, email, phone, address, tc, note, company, date) values (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $date = date("Y-m-d");

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name, $surname, $email, $phone, $address, $tc, $note, $company, $date]);
        
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
        $sql = "select * from customers where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($name, $surname, $email, $phone, $address, $tc, $note, $company, $id)
    {
        $sql = "update customers set name=?, surname=?, email=?, phone=?, address=?, tc=?, note=?, company=?, date=? where id=?";

        $date = date("Y-m-d");
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name, $surname, $email, $phone, $address, $tc, $note, $company, $date, $id]);

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
        $sql = "delete from customers where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>