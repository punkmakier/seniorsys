<?php
    require_once("config.php"); //required to implement this for calling DB

    class HomePageAnnounce extends config{
        



        // Show Title Announcement
        public function showLastAnnouncementTitle(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Title` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Title'];
                }
            }
        }

        // Show Description Announcement
        public function showLastAnnouncementDescription(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `Description` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['Description'];
                }
            }
        }

        // Show PostedBy Announcement
        public function showLastAnnouncementPostedBy(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `PostedBy` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['PostedBy'];
                }
            }
        }

        // Show PostedByPosition Announcement
        public function showLastAnnouncementPostedByPosition(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `PostedByPosition` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['PostedByPosition'];
                }
            }
        }

        // Show DateCreated Announcement
        public function showLastAnnouncementDateCreated(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT `DateCreated` FROM `announcement` ORDER BY `id` DESC LIMIT 1";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res['DateCreated'];
                }
            }
        }
        
    }



?>