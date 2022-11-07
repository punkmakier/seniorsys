<?php
    require_once("config.php"); //required to implement this for calling DB

    class HealthIssue extends config{

        private $CMIC; 
        private $HealthIssueStatus;
        private $uniqueID;


        public function __construct($CMIC,$HealthIssueStatus,$uniqueID){
            $this->CMIC = $CMIC;
            $this->HealthIssueStatus = $HealthIssueStatus;
            $this->uniqueID = $uniqueID;
        }

        public function updateHealthIssue(){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `srhealthissue` SET `CMIC`='$this->CMIC', `DateUpdated`= now(),`SrHealthIssueStatus`='$this->HealthIssueStatus' WHERE `UserUniqueID` = '$this->uniqueID'";
            $stmt = $con->prepare($sqlQuery);
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

    }



?>