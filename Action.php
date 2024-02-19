<?php
global $conn;
include 'Connection.php';
    $open = fopen("./skills.csv", "r");

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
    $data = fgetcsv($open);


while(! feof($open) ){
        $data = fgetcsv($open);

            if (empty($data)) break;
       if( strlen($data[2])<50) {
            $data[2] = addUnderscore($data[2]);
        }

        $type=$data[0];
        $title=$conn->real_escape_string($data[1]);
        $description=$conn->real_escape_string($data[2] );
//    var_dump($type,$title,$description);
//        echo $type. "---\t ". $title. "---\t". $description."<br>";


//
//
            if((int)$data[0] % 2 === 0)
            {
                $sql1= "INSERT INTO `genaralskills` (`type`, `title`, `description`) VALUES ( '$type','$title', '$description')";
                $er = $conn->query($sql1);
            }
            else{
                $sql2= "INSERT INTO `specialskills` (`type`, `title`, `description`) VALUES ( '$type','$title', '$description')";
                $conn->query($sql2);
            }

        }

    fclose($open);
header("Location: ../index.php");
