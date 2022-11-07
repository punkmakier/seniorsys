<?php
    require_once("config.php"); //required to implement this for calling DB

    class UserInfo extends config{
        

        

        public function checkIfOldPassTrue($uniqueID,$oldPass,$uname,$email,$newpass){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Password` FROM `srpersonalinfo` WHERE `UserUniqueID` = '$uniqueID' ";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    if($res['Password'] == $oldPass){
                        $sqlQuery2 = "UPDATE `srpersonalinfo` SET `Username`='$uname', `Email`='$email', `Password`='$newpass' WHERE `UserUniqueID`='$uniqueID'";
                        $stmt2 = $con->prepare($sqlQuery2);
                        $stmt2->execute();
                        echo "Success";
                        return true;

                    }else{
                        echo "NotMatch";
                        return false;

                    }
                }
            }else{
                return false;
            }
        }



    }



?>