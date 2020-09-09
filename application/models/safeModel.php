<?php 

class safeModel extends model
{
    public function lists()
    {
        $sql = "select * from safe";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($name)
    {
        $sql = "insert into safe(name) values (?)";

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

    public function getData($id)
    {
        $sql = "select * from safe where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateData($id, $name)
    {
        $sql = "update safe set name=? where id=?";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name, $id]);

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
        $sql = "delete from safe where id = ?";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$id]);

        return $result;
    }
}


?>