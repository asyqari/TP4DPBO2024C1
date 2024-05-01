<?php
include_once("model/Template.php");
include_once("model/DB.class.php");
include_once("controller/C_Grup.php");

$grup = new C_Grup();

if (isset($_POST['add'])) {
    $grup->add($_POST);
} else if (isset($_POST['edit'])) {
    $grup->edit($_POST);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $grup->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $grup->editForm($id);
} else if (!empty($_GET['create'])) {
    $grup->createForm();
} else {
    $grup->index();
}
