<?php
    require_once("config.php"); //required to implement this for calling DB

    class AdminDashboard extends config{
        

        public function countSeniorUser(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`UserUniqueID`) AS `userCount` FROM srpersonalinfo";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countAdminUser(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`AccountRole`) AS `userCount` FROM admininfo";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countUnreadMessage(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`id`) AS `userCount` FROM message";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }

        public function countSeniorRequestAccount(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT COUNT(`UserUniqueID`) AS `userCount` FROM `srpersonalinfo` WHERE `Status`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            while($res = $stmt->fetch()){
                echo $res['userCount'];
            }
        }


    }



?>