<?php

class V_Grup
{
    public function render($data)
    {
        $dataGrup = null;
        $no = 1;
        foreach ($data['grups'] as $val) {
            list($id, $name) = $val;
            $dataGrup .= "<tr>
            <td>" . $no . "</td>
            <td>" . $name . "</td>
            <td>
                <a href='cult.php?id_edit=" . $id .  "' class='btn btn-success' '>Edit</a>
                <a href='cult.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
            </td>
            </tr>";
            $no++;
        }

        $tpl = new Template("templates/grup.html");

        $tpl->replace("DATA_TABEL", $dataGrup);
        $tpl->write();
    }

    public function createForm()
    {
        $tpl = new Template("templates/grupForm.html");
        $tpl->replace("DATA_SUBMIT", 'add');
        $tpl->replace("DATA_TITLE", 'Add New');
        $tpl->write();
    }

    public function editForm($grup)
    {
        $dataGrup = $grup;
        $idInput = '<input type="hidden" name="id" value="' . $dataGrup['id_grup'] . '" class="form-control"> <br>';


        $tpl = new Template("templates/grupForm.html");
        $tpl->replace("DATA_ID_INPUT", $idInput);
        $tpl->replace("DATA_NAME", $dataGrup['name']);
        $tpl->replace("DATA_SUBMIT", 'edit');
        $tpl->replace("DATA_TITLE", 'Edit');
        $tpl->write();
    }
}
