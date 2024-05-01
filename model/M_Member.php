<?php

class M_Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberJoin()
    {
        $query = "SELECT members.id_members, members.name, members.email, members.phone, members.join_date, members.grup_id, grup.name_grup as grup_name FROM members LEFT JOIN grup ON members.grup_id=grup.id_grup";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT members.id_members, members.name, members.email, members.phone, members.join_date, members.grup_id, grup.name_grup as grup_name FROM members LEFT JOIN grup ON members.grup_id=grup.id_grup where members.id_members = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        echo "<script>alert('{$data['name']}') </script>";
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $grup_id = $data['grup_id'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$join_date', $grup_id)";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE id_members = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $grup_id = $data['grup_id'];
        $query = "update members set name = '$name', email = '$email', phone = '$phone', join_date = '$join_date', grup_id = '$grup_id' where id_member = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
