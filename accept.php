<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $username = $row['username'];
            $email = $row['email'];
            $password = $row['password'];
            $status = $row['status'];
            $query = "INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `date`) VALUES (NULL, '$username', '$email', '$password', CURRENT_TIMESTAMP);";
        }
        // $query = "UPDATE `requests` SET `status`= accepted  WHERE `requests`.`id` = '$id';";
        $query = "ALTER TABLE `requests` MODIFY `status` varchar(255) DEFAULT 'Accepted' WHERE `requests`.`id` = '$id';";
        // $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been accepted.";
        }else{
            echo "Unknown error occured. Please try again.";
        }
    }else{
        echo "Error occured.";
    }

    
?>
    <br/><br/>
<a href="index.php">Back</a>
<br/><br/>