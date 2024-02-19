<?php
include 'Connection.php';

class AddData extends Connection
{

    function add()
    {
        $open = fopen("./skills.csv", "r");
        while(! feof($open) ){
            $data = fgetcsv($open);
            if (empty($data)) break;
            
            if( strlen($data[2])<50) {
                $data[2] = addUnderscore($data[2]);
            }
            $type=$data[0];
            $title=$this->conn->real_escape_string($data[1]);
            $description=$this->conn->real_escape_string($data[2] );

            if((int)$data[0] % 2 === 0)
            {
                $sql1= "INSERT INTO `genaralskills` (`type`, `title`, `description`) VALUES ( '$type','$title', '$description')";
                $er = $this->conn->query($sql1);
            }
            else{
                $sql2= "INSERT INTO `specialskills` (`type`, `title`, `description`) VALUES ( '$type','$title', '$description')";
                $this->conn->query($sql2);
            }
        }
        fclose($open);
        
        
    }
    
}

/**
 * @param $data
 * @return string
 */
function addUnderscore($data): string
{
    $uScore= "";
    $len = 50- strlen($data);
    while($len--)
    {
        $uScore .="_";
    }
    return $uScore.$data;
}

$obj = new AddData();
$obj->add();
    
