<?php

include_once("connection.php");
include_once("model/M_grup.php");
include_once("view/V_Grup.php");

class C_Grup
{
    private $grup;

    function __construct()
    {
        $this->grup = new M_Grup(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    public function index()
    {
        $this->grup->open();
        $this->grup->getGrup();

        $data = array(
            'grups' => array(),
        );

        while ($row = $this->grup->getResult()) {
            array_push($data['grups'], $row);
        }

        $this->grup->close();

        $view = new V_Grup();
        $view->render($data);
    }


    function add($data)
    {
        $this->grup->open();
        $this->grup->add($data);
        $this->grup->close();

        header("location:grup.php");
    }

    function edit($data)
    {
        $this->grup->open();
        $this->grup->edit($data);
        $this->grup->close();

        header("location:grup.php");
    }

    function delete($id)
    {
        $this->grup->open();
        $this->grup->delete($id);
        $this->grup->close();

        header("location:grup.php");
    }

    function createForm()
    {
        $view = new V_Grup();
        $view->createForm();
    }

    function editForm($id)
    {
        $grup = null;

        $this->grup->open();
        $this->grup->getGrupById($id);
        $grup = $this->grup->getResult();

        $this->grup->close();

        $view = new V_Grup();
        $view->editForm($grup);
    }
}
