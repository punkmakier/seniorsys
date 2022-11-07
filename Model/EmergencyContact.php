<?php
    require_once("config.php"); //required to implement this for calling DB

    class EmergencyContact extends config{
        
        private $lname;
        private $fname;
        private $mname;
        private $address;
        private $cpno;
        private $SrEmerContactStatus;
        private $uniqueID;

        public function __construct($lname,$fname,$mname,$address,$cpno,$SrEmerContactStatus,$uniqueID){
            $this->lname = $lname;
            $this->fname = $fname;
            $this->mname = $mname;
            $this->address = $address;
            $this->cpno = $cpno;
            $this->SrEmerContactStatus = $SrEmerContactStatus;
            $this->uniqueID = $uniqueID;
        }


        public function updateEmergencyContact(){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `sremercontact` SET `Lastname`='$this->lname',`FirstName`='$this->fname',`MiddleName`='$this->mname',`Address`='$this->address',`CellphoneNumber`='$this->cpno',
            `DateUpdated`= now(),`SrEmerContactStatus`='$this->SrEmerContactStatus' WHERE `UserUniqueID`='$this->uniqueID'";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }
    

    }



?>