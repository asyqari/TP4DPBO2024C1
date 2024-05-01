<?php

include_once("connection.php");
include_once("model/M_Member.php");
include_once("model/M_Grup.php");
include_once("view/V_Member.php");

class C_Members
{
    private $member;
    private $grup;

    function __construct()
    {
        $this->member = new M_Member(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->grup = new M_Grup(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    public function index()
    {
        $this->member->open();
        $this->member->getMemberJoin();

        $data = array(
            'members' => array(),
            'grups' => array()
        );

        while ($row = $this->member->getResult()) {
            array_push($data['members'], $row);
            //   echo "<script>alert('{$row['name']}') </script>";
        }

        $this->member->close();

        $view = new V_Member();
        $view->render($data);
    }


    function add($data)
    {
        $this->member->open();
        $this->member->add($data);
        $this->member->close();

        header("location:index.php");
    }

    function edit($data)
    {
        $this->member->open();
        $this->member->edit($data);
        $this->member->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->member->open();
        $this->member->delete($id);
        $this->member->close();

        header("location:index.php");
    }

    function createForm()
    {
        $grups = array();

        $this->grup->open();
        $this->grup->getGrup();
        while ($row = $this->grup->getResult()) {
            array_push($grups, $row);
        }
        $this->grup->close();

        $view = new V_Member();
        $view->createForm($grups);
    }

    function editForm($id)
    {
        $data = array(
            'member' => null,
            'grups' => array()
        );

        $this->member->open();
        $this->member->getMemberById($id);
        $data['member'] = $this->member->getResult();

        $this->grup->open();
        $this->grup->getgrup();

        while ($row = $this->grup->getResult()) {
            array_push($data['grups'], $row);
        }
        $this->member->close();
        $this->grup->close();

        $view = new V_Member();
        $view->editForm($data);
    }
}
