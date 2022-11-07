<?php
    require_once("config.php"); //required to implement this for calling DB

    class PartnerInformation extends config{

        private $lname;
        private $fname;
        private $mname;
        private $bday;
        private $age;
        private $edattain;
        private $occu;
        private $monthly;
        private $uniqueID;
        private $SrPartnerInfoStatus;

        public function __construct($lname,$fname,$mname,$bday,$age,$edattain,$occu,$monthly,$uniqueID, $SrPartnerInfoStatus){
            $this->lname = $lname;
            $this->fname = $fname;
            $this->mname = $mname;
            $this->bday = $bday;
            $this->age = $age;
            $this->edattain = $edattain;
            $this->occu = $occu;
            $this->monthly = $monthly;
            $this->uniqueID = $uniqueID;
            $this->SrPartnerInfoStatus = $SrPartnerInfoStatus;
        }

        public function updatePartnerInfo(){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `srparterinfo` SET `LastName`='$this->lname', `FirstName`='$this->fname',`MiddleName`='$this->mname',`Birthdate`='$this->bday',`Age`='$this->age',`EducAttainment`='$this->edattain',
            `Occupation`='$this->occu',
            `MonthlyIncome`='$this->monthly', `DateUpdated` = now(), `SrPartnerInfoStatus`='$this->SrPartnerInfoStatus' WHERE `UserUniqueID`='$this->uniqueID'";

            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

    }



?>