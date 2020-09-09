<?php 

class userModel extends model
{

    public function control($email, $password)
    {
        $sql = "select * from users where email=? and password=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email, $password]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function lists()
    {
        $sql = "select * from users";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function create($name, $email, $password, $permission)
    {
        $sql = "insert into users(name, email, password, permission) values(?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name, $email, $password, $permission]);

        return $result;

    }

    public function getData($id)
    {
        $sql = "select * from users where id=?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function updateData($id, $name, $email, $password, $permission)
    {
        $sql = "update users set name=?, email=?, password=?, permission=? where id=?";

        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([$name, $email, $password, $permission, $id]);

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
        $sql = "delete from users where id=?";

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