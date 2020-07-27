<?php
    include('functions.php');
    $id = $_GET['id'];
    $query="ALTER TABLE `requests` MODIFY `status` varchar(255) DEFAULT 'rejected' WHERE `requests`.`id` = '$id;";
    // $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo " Account has been rejected. ";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="index.php">Back</a>