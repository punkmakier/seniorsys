<?php
    // Import Models Here
    require_once '../Model/SeniorRegistration.php';
    require_once '../Model/SeniorAccount.php';
    require_once '../Model/UpdateBasicInfo.php';
    require_once '../Model/PartnerInformation.php';
    require_once '../Model/HealthIssue.php';
    require_once '../Model/EmergencyContact.php';
    require_once '../Model/UserInfo.php';
    require_once '../Model/Message.php';

    
    // For Calling Function
    if(isset($_POST['SeniorRegistration'])){
        SeniorRegistration();
    }

    else if(isset($_POST['SeniorLogin'])){
        SeniorLogin();
    }

    else if(isset($_POST['SeniorUpdateBasicInfo'])){
        SeniorUpdateBasicInfo();
    }
    else if(isset($_POST['SnrPartnerInfo'])){
        SnrPartnerInfo();
    }
    else if(isset($_POST['healthIssuefunc'])){

        healthIssuefunc();
    }
    else if(isset($_POST['emergencyContactFunc'])){
        emergencyContactFunc();
    }

    else if(isset($_POST['updateUserAccountInfo'])){
        updateUserAccountInfo();
    }
    else if(isset($_POST['messageToAdmin'])){
        messageToAdmin();
    }
    else if(isset($_POST['trigger'])){
        $trig = $_POST['trigger'];
        $user= $_SESSION['userUniqueID'];
        $updateStat = new SeniorAccount();
        $updateStat->updateStatusAccount($trig,$user);
    }
    
    
    // Executions from condition above

    function SeniorRegistration(){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $birthDate = $_POST['birthDate'];
        $cpNo = $_POST['cpNo'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $userName = $_POST['uname'];
        $pass = $_POST['regpass'];
        $conPass = $_POST['regconpass'];

        // Generate Random Chars for Unique ID
        $generateKey = uniqid();

        // User Unique Key Per Register
        $userUniqueId = date('Ymd')."-".$generateKey;


        // Upload birth certificates images
        $birth_img_name = $_FILES['birthCert']['name'];
        $birth_tmp_name = $_FILES['birthCert']['tmp_name'];

        $birth_img_ext = pathinfo($birth_img_name, PATHINFO_EXTENSION);
        $birth_img_ex_lc = strtolower($birth_img_ext);

        $birth_new_name_image = uniqid("BirthCertificate-",true).'.'.$birth_img_ex_lc;

        $birthCert_img_upload_path = "../assets/BirthCertificates/".$birth_new_name_image;


        // Upload barangay clearance images
        $brgy_img_name = $_FILES['brgyClear']['name'];
        $brgy_tmp_name = $_FILES['brgyClear']['tmp_name'];

        $brgy_img_ext = pathinfo($brgy_img_name, PATHINFO_EXTENSION);
        $brgy_img_ex_lc = strtolower($brgy_img_ext);

        $brgy_new_name_image = uniqid("BrgyClearance-",true).'.'.$brgy_img_ex_lc;

        $brgyClear_img_upload_path = "../assets/BarangayClearance/".$brgy_new_name_image;

        // password validation
        if($pass != $conPass){
            echo "NotMatch";
        }

        else{
            $addSr = new SeniorRegistration($userUniqueId,$lname,$fname,$mname,$birthDate,$address,$email,$cpNo,$birth_new_name_image,$brgy_new_name_image,$userName,md5($pass));
            if($addSr->SeniorRegistration()){

                move_uploaded_file($birth_tmp_name, $birthCert_img_upload_path);
                move_uploaded_file($brgy_tmp_name, $brgyClear_img_upload_path);
                echo "Success";
            }else{
                echo "False";
            }
        }


    }


    function SeniorLogin(){
        $uname = $_POST['username'];
        $pass = $_POST['password'];

        $snr = new SeniorAccount();
        if($snr->SeniorLoginAccount($uname,md5($pass))){
            echo "Success";
        }
        else{
            echo "NoFound";
        }

    }


    function SeniorUpdateBasicInfo(){
        $fname = $_POST['updt_fname'];
        $lname = $_POST['updt_lname'];
        $mname = $_POST['updt_mname'];
        $address = $_POST['updt_address'];
        $birhtday = $_POST['updt_birthdate'];
        $placeofbirth = $_POST['updt_placeBirth'];
        $age = $_POST['updt_age'];
        $gender = $_POST['updt_gender'];
        $educattain = $_POST['updt_educAttainment'];
        $voters = $_POST['updt_voterstat'];
        $civilstat = $_POST['updt_civilstat'];
        $citizenship = $_POST['updt_citizenship'];
        $religion = $_POST['updt_religion'];
        $cpno = $_POST['updt_cpno'];
        $telno = $_POST['updt_telno'];
        $occu = $_POST['updt_occupation'];
        $monthly = $_POST['updt_monthlyIncome'];
        $uniqueID = $_SESSION['userUniqueID'];

        $basicInfoStatus = "";

        if(empty($fname) || empty($lname) || empty($mname) || empty($address) || empty($birhtday) || empty($placeofbirth) || empty($age) || $gender == "- Select -" || empty($educattain) || $voters == "- Select -"
         || $civilstat == "- Select -" || empty($citizenship) || empty($religion) || empty($cpno) || empty($telno) || empty($occu) || empty($monthly) || empty($uniqueID)){
            $basicInfoStatus = "No";
         }
         else{
            $basicInfoStatus = "Yes";
         }


        $updateBasicInfo = new UpdateBasicInfo(trim($fname),trim($lname),trim($mname),$address,$birhtday,$placeofbirth,$age,$gender,$educattain,$voters,$civilstat,$citizenship,$religion,$cpno,$telno,$occu,$monthly,$uniqueID,$basicInfoStatus);
        if($updateBasicInfo->updateBasicInfo()){
            echo "Success";
        }
        else{
            echo "Failed";
        }

    }


    function SnrPartnerInfo(){
        $lname = $_POST['part_lname'];
        $fname = $_POST['part_fname'];
        $mname = $_POST['part_mname'];
        $birthDate = $_POST['part_bday'];
        $age = $_POST['part_age'];
        $edAttain = $_POST['part_edattain'];
        $occu = $_POST['part_oocu'];
        $monthly = $_POST['part_monthlyinc'];
        $uniqueID = $_SESSION['userUniqueID'];

        $partnerInfo = "";

        if(empty($fname) || empty($lname) || empty($mname) || empty($birthDate) || empty($age) || empty($edAttain) || empty($occu) || empty($monthly)){
            $partnerInfo = "No";
         }
         else{
            $partnerInfo = "Yes";
         }


        $partner = new PartnerInformation($lname,$fname,$mname,$birthDate,$age,$edAttain,$occu,$monthly,$uniqueID,$partnerInfo);
        if($partner->updatePartnerInfo()){
            echo "Success";
        }else{
            echo "Failed";
        }
        
    }

    function healthIssuefunc(){
        $hissue = $_POST['healthissue'];
        $uniqueID = $_SESSION['userUniqueID'];
       
        $healthIssueInfo = "";

        if(empty($hissue)){
            $healthIssueInfo = "No";
         }
         else{
            $healthIssueInfo = "Yes";
         }

        $healthIssue = new HealthIssue($hissue,$healthIssueInfo,$uniqueID);
        if($healthIssue->updateHealthIssue()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }


    function emergencyContactFunc(){

        $lname = $_POST['emer_lname'];
        $fname = $_POST['emer_fname'];
        $mname = $_POST['emer_mname'];
        $address = $_POST['emer_address'];
        $cpno = $_POST['emer_cpno'];
        $uniqueIDUser = $_SESSION['userUniqueID'];

         $emergencyInfo = "";

        if(empty($lname) || empty($fname) || empty($mname) || empty($address) || empty($cpno)){
            $emergencyInfo = "No";
         }
         else{
            $emergencyInfo = "Yes";
         }

        $emyc = new EmergencyContact($lname,$fname,$mname,$address,$cpno,$emergencyInfo,$uniqueIDUser);
        if($emyc->updateEmergencyContact()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }



    function updateUserAccountInfo(){

        $uname = $_POST['ac_uname'];
        $email = $_POST['ac_email'];
        $pass = $_POST['ac_newpass'];
        $conpass = $_POST['ac_connewpass'];
        $oldpass = $_POST['ac_oldnewpass'];
        $uniqueID = $_SESSION['userUniqueID'];

        $convertOldPass = md5($oldpass);

        if($pass != $conpass){
            echo "NewPassNotMatch";
        }
        else{

            $userinfo = new UserInfo();
            $userinfo->checkIfOldPassTrue($uniqueID,$convertOldPass,$uname,$email,md5($pass));
    
        }

    }

    function messageToAdmin(){
        $subject = $_POST['subjectMessage'];
        $body = $_POST['bodyMessage'];
        $user = $_POST['senderName'];
        echo $body;
        $send = new Message($subject,$body,$user);
        if($send->sendMessageToAdmin()){
            echo "Success";
        }else{
            echo "Failed";
        }
    }
   
?>