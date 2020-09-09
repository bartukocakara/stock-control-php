<?php 

class categoryModel extends model
{
    public function create($name)
    {
        $sql = "insert into categories(name) values (?)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name]);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function lists()
    {
        $sql = "select * from categories";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function getData($id)
    {
        $sql = "select * from categories where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($name, $id)
    {
        $sql = "update categories set name=? where id=?";

        $stmt = $this->db->prepare($sql);
        $update = $stmt->execute([$name, $id]);

        return $update;

    }

    public function deleteData($id)
    {
        $sql = "delete from categories where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    public function getExcelId($name)
    {
        $sql = "select * from categories where name=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$name]);

        
        if($stmt->rowCount() != 0)
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['id'];
        }
        else
        {
            $sql = "insert into categories(name) values (?)";

            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([$name]);
            return $this->db->lastInsertId();
        }
    }
    
}


?>