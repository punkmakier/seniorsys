<?php
    require_once("config.php"); //required to implement this for calling DB

    class  UpdateBasicInfo extends config{
        
        private $fname;
        private $lname;
        private $mname;
        private $address;
        private $birthday;
        private $placeofbirth;
        private $age;
        private $gender;
        private $educattainment;
        private $voters;
        private $civilStat;
        private $citizenship;
        private $religion;
        private $cpno;
        private $telno;
        private $occupation;
        private $monthlyIncome;
        private $uniqueID;
        private $BasicInfoStatus;


        public function __construct($fname,$lname,$mname,$address,$birthday,$placeofbirth,$age,$gender,$educattainment,$voters,$civilStat,$citizenship,$religion,$cpno,$telno,$occupation,$monthlyIncome,$uniqueID,$BasicInfoStatus){
            $this->fname= $fname;
            $this->lname= $lname;
            $this->mname= $mname;
            $this->address= $address;
            $this->birthday= $birthday;
            $this->placeofbirth= $placeofbirth;
            $this->age= $age;
            $this->gender= $gender;
            $this->educattainment= $educattainment;
            $this->voters= $voters;
            $this->civilStat= $civilStat;
            $this->citizenship= $citizenship;
            $this->religion= $religion;
            $this->cpno= $cpno;
            $this->telno= $telno;
            $this->occupation= $occupation;
            $this->monthlyIncome= $monthlyIncome;
            $this->uniqueID= $uniqueID;
            $this->BasicInfoStatus= $BasicInfoStatus;
        }

        public function updateBasicInfo(){
            $con = $this->openConnection();
            $sqlQuery = "UPDATE `srpersonalinfo` SET `FirstName`='$this->fname',`LastName`='$this->lname',`MiddleName`='$this->mname',`Address`='$this->address',`Birthdate`='$this->birthday',
            `PlaceOfBirth`='$this->placeofbirth',`Age`='$this->age',`Gender`='$this->gender',`EducAttainment`='$this->educattainment',`VoterStatus`='$this->voters',`CivilStatus`='$this->civilStat',
            `Citizenship`='$this->citizenship',`Religion`='$this->religion',`CellphoneNo`='$this->cpno',
            `TeleNumber`='$this->telno',`Occupation`='$this->occupation',`MonthlyIncome`='$this->monthlyIncome',`UpdatedAt`= now(),`BasicInfoStatus`='$this->BasicInfoStatus' WHERE `UserUniqueID`='$this->uniqueID'";

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