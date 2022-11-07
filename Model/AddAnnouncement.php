<?php
    require_once("config.php"); //required to implement this for calling DB

    class AddAnnouncement extends config{
        
        private $title, $descrition, $postedBy, $postedPos;

        public function __construct($title,$descrition,$postedBy,$postedPos){
            $this->title = $title;
            $this->descrition = $descrition;
            $this->postedBy = $postedBy;
            $this->postedPos = $postedPos;
        }

        public function addAnnouncement(){
            $con = $this->openConnection();
            $sqlQuery = "INSERT INTO `announcement` (`Title`,`Description`,`PostedBy`,`PostedByPosition`) VALUES('$this->title','$this->descrition','$this->postedBy','$this->postedPos')";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }


    }



?>