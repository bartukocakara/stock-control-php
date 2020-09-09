<?php 

class productModel extends model
{
    public function lists()
    {
        $sql = "select * from products";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        return $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function create($name, $categoryId, $properties, $date = null)
    {
        $sql = "insert into products(name, category_id, properties, date) values(?, ?, ?, ?)";
        if($date != "")
        {
            $date = $date;
        }
        else
        {
            $date = date("Y-m-d");
        }
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name, $categoryId, $properties, $date]);

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
        $sql = "select * from products where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id, $name, $categoryId, $properties)
    {
        $sql = "update products set name = ?, category_id = ?, properties = ? where id = ?";

        $stmt = $this->db->prepare($sql);
        $update = $stmt->execute([$name, $categoryId, $properties, $id]);

        if($update)
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
        $sql = "delete from products where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    public function search($name)
    {
        $sql = "select * from products where name like ? ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["%".$name."%"]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createExcel($name, $categoryId, $properties, $date = null)
    {
        $sql = "select * from products where name=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name]);

        if($stmt->rowCount() == 0)
        {
            $sql = "insert into products(name, category_id, properties, date) values(?, ?, ?, ?)";
            if($date != "")
            {
                $date = $date;
            }
            else
            {
                $date = date("Y-m-d");
            }
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([$name, $categoryId, $properties, $date]);

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
}



?>