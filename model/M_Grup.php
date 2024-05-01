<?php

class M_Grup extends DB
{
    function getGrup()
    {
        $query = "SELECT * FROM grup";
        return $this->execute($query);
    }
    function getGrupById($id)
    {
        $query = "SELECT * FROM grup WHERE id_grup = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        echo "<script>alert('{$data['name']}') </script>";
        $name = $data['name'];

        $query = "insert into grup values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "delete FROM members WHERE grup_id = '$id'";
        $this->execute($query);

        $query = "DELETE FROM grup WHERE id_grup = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $id = $data['id_grup'];
        $name = $data['name'];
        $query = "update grup set name_grup = '$name' where id_grup = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
