<?php


include_once("model/Template.php");
include_once("model/DB.php");
include_once("controller/C_Member.php");

$member = new C_Members();

if (isset($_POST['add'])) {
  $member->add($_POST);
} else if (isset($_POST['edit'])) {
  $member->edit($_POST);
} else if (!empty($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
  $id = $_GET['id_edit'];
  $member->editForm($id);
} else if (!empty($_GET['create'])) {
  $member->createForm();
} else {
  $member->index();
}
