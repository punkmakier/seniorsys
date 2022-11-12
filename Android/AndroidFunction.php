<?php
    require_once 'AndroidRequest.php';
    require_once '../Model/SeniorRegistration.php';


    
    if(isset($_POST['loginUsername']) && isset($_POST['loginPassword'])){
        $uname = $_POST['loginUsername'];
        $pass = $_POST['loginPassword'];
        $androidRequest = new AndroidRequest;
        $androidRequest->androidLogin($uname,md5($pass));
    }

    else if(isset($_GET['userIDAccount'])){
        $uniqueID = $_GET['userIDAccount'];
        $androidRequest = new AndroidRequest;
        $androidRequest->HomeDisplayUserInfo($uniqueID);
    }

    else if(isset($_POST['reg_fname']) && isset($_POST['reg_mname']) && isset($_POST['reg_lname']) && isset($_POST['reg_bday']) && isset($_POST['reg_cp']) && isset($_POST['reg_email']) && isset($_POST['reg_addr']) && 
    isset($_POST['reg_birthCert']) && isset($_POST['reg_brgy']) && isset($_POST['reg_usern']) && isset($_POST['reg_pass'])){
        $lname = $_POST['reg_lname'];
        $fname = $_POST['reg_fname'];
        $mname = $_POST['reg_mname'];
        $birthDate = $_POST['reg_bday'];
        $address = $_POST['reg_addr'];
        $email = $_POST['reg_email'];
        $cpNo = $_POST['reg_cp'];
        $userName = $_POST['reg_usern'];
        $pass = $_POST['reg_pass'];

        // Generate Random Chars for Unique ID
        $generateKey = uniqid();

        // User Unique Key Per Register
        $userUniqueId = date('Ymd')."-".$generateKey;
        $birthCertName = "BirthCertificate-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";
        $brgyClearName = "BarangayClearance-Mobile-".date("d-m-Y")."-".time()."-".rand(10000, 100000).".jpg";

        $snrReg = new SeniorRegistration($userUniqueId,$lname,$fname,$mname,$birthDate,$address,$email,$cpNo,$birthCertName,$brgyClearName,$userName,md5($pass));


        if($snrReg->SeniorRegistration()){
            file_put_contents("../assets/BirthCertificates/".$birthCertName, base64_decode($_POST['reg_birthCert']));
            file_put_contents("../assets/BarangayClearance/".$brgyClearName, base64_decode($_POST['reg_brgy']));
            echo "Success";

        }else{
            echo "Registration Failed!";
        
            
        }

    }else{
        echo "Ops! There's something wrong.";
    }


?>