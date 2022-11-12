<?php

    require_once("../Model/config.php"); //required to implement this for calling DB

    class AndroidRequest extends config{


        public function androidLogin($username, $password){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT `UserUniqueID` FROM `srpersonalinfo` WHERE `Username`='$username' AND `Password`='$password'");
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo $res["UserUniqueID"];
                }
                return true;
            }
            else{
                echo "Failed";
            }
        }

        public function HomeDisplayUserInfo($uniqueID){
            $con = $this->openConnection();
            $stmt = $con->prepare("SELECT s.Status, s.FirstName, s.MiddleName, s.LastName, a.* FROM srpersonalinfo as s, announcement as a WHERE `UserUniqueID`='$uniqueID' order by a.id DESC LIMIT 1");
            $stmt->execute();
            $accountInfoObj = array();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    header("Content-Type: JSON");
                    $accountInfoObj[] = array(
                        "Status" => $res['Status'],
                        "CompleteName" => $res['FirstName']." ".substr($res['MiddleName'], 0,1).". ".$res['LastName'],
                        "AnnouncementTitle" => $res['Title'],
                        "AnnouncementDesc" => $res['Description'],
                        "AnnouncementByAndPosition" => $res['PostedBy']." | ".$res['PostedByPosition'],
                        "AnnoncementDatePosted" => $res['DateCreated']
                    );

                    echo json_encode($accountInfoObj, JSON_PRETTY_PRINT);
                   
                }
                return true;
            }
            else{
                echo "Failed";
            }
        }

    }





?>