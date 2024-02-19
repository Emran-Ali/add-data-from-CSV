<?php
include 'Connection.php';
class Truncate extends Connection
{
    function delete()
    {
        $this->conn->query("TRUNCATE TABLE genaralskills;");
        $this->conn->query("TRUNCATE TABLE specialskills");

    }

}
$object = new Truncate();
$object->delete();

