<?php
    require_once("config.php"); //required to implement this for calling DB

    class AddAdmin extends config{
        private $empID;
        private $position;
        private $LastName;
        private $FirstName;
        private $MiddleName;
        private $Email;
        private $CellphoneNo;
        private $Username;
        private $Password;


        public function __construct($empID,$position,$LastName,$FirstName,$MiddleName,$Email,$CellphoneNo,$Username,$Password){
            $this->empID = $empID;
            $this->position = $position;
            $this->LastName = $LastName;
            $this->FirstName = $FirstName;
            $this->MiddleName = $MiddleName;
            $this->Email = $Email;
            $this->CellphoneNo = $CellphoneNo;
            $this->Username = $Username;
            $this->Password = $Password;
        }

        public function addAdminAccount(){
            $con = $this->openConnection();
            $sqlQuery = "INSERT INTO `admininfo` (`EmpID`,`Position`,`LastName`,`FirstName`,`MiddleName`,`Email`,`PhoneNo`,`Username`,`Password`)
            VALUES('$this->empID','$this->position','$this->LastName','$this->FirstName','$this->MiddleName','$this->Email','$this->CellphoneNo','$this->Username','$this->Password')";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }


        public function updateAdminAccount($empID){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `admininfo` SET `EmpID`='$this->empID', `Position`='$this->position',`LastName`='$this->LastName',`FirstName`='$this->FirstName',`MiddleName`='$this->MiddleName',`Email`='$this->Email',`PhoneNo`='$this->CellphoneNo',
            `Username`='$this->Username',`Password`='$this->Password' WHERE `EmpID`='$empID'";
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