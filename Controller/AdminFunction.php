<?php
    // Import Models Here
    require_once '../Model/AddAdmin.php';
    require_once '../Model/AdminAccount.php';
    require_once '../Model/AddAnnouncement.php';



    if(isset($_POST['addAdminAccount'])){
        addAdminAccountFunc();
    }

    else if(isset($_POST['deleteAdminAccount'])){
        deleteAdminAccountFunc();
    }

    else if(isset($_POST['deleteSrSelected'])){
        deleteSrSelectedFunc();
    }
    else if(isset($_POST['adminLoginAccount'])){
        adminLoginAccountFunc();
    }
    else if(isset($_POST['updateAccountAdminC'])){
        updateAccountAdminCFunc();
    }
    else if(isset($_POST['postDataAnnouncement'])){
        postDataAnnouncementFunc();
    }

    


    function addAdminAccountFunc(){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $empid = $_POST['empid'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];

        if(empty($lname) || empty($fname) || empty($mname) || empty($empid) || empty($phoneNo) || empty($email) || empty($position) || empty($uname) || empty($pass) || empty($conpass) )
        {
            echo "Required";
        }
        else if($pass != $conpass){
            echo "NotMatch";
        }
        else{
            $addAd = new AddAdmin($empid,$position,$lname,$fname,$mname,$email,$phoneNo,$uname,md5($pass));
            if($addAd->addAdminAccount()){
                echo "Success";
            }else{
                echo "Failed";
            }
        }

    }

    function deleteAdminAccountFunc(){
        $id = $_POST['selectedDataToDelete'];
        
        $del = new AdminAccount();
        $del->deleteAdminAccount($id);
    }

    function adminLoginAccountFunc(){
        $user = $_POST['username'];
        $password = $_POST['password'];
        
        $del = new AdminAccount();
        if($del->adminLoginAccount($user,md5($password))){
            echo "Success";
        }else{
            echo "Failed";
        }
    }


    function updateAccountAdminCFunc(){
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $empid = $_POST['empid'];
        $phoneNo = $_POST['phoneNo'];
        $email = $_POST['email'];
        $position = $_POST['position'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];
        $userID = $_SESSION['empID'];
        
        if(empty($lname) || empty($fname) || empty($mname) || empty($empid) || empty($phoneNo) || empty($email) || empty($position) || empty($uname) || empty($pass) || empty($conpass) )
        {
            echo "Required";
        }
        else if($pass != $conpass){
            echo "NotMatch";
        }
        else{
            $addAd = new AddAdmin($empid,$position,$lname,$fname,$mname,$email,$phoneNo,$uname,md5($pass));
            if($addAd->updateAdminAccount($userID)){
                echo "Success";
            }else{
                echo "Failed";
            }
        }
        
    }

    function postDataAnnouncementFunc(){
        $admin = new AdminAccount;

        $title = $_POST['title'];
        $desc = $_POST['description'];
        $user = $_SESSION['empID'];
        $fname = $_SESSION['adminFname'];
        $mname = $_SESSION['adminMname'];
        $lname = $_SESSION['adminLname']; 
        $pos = $_SESSION['adminPos']; 
        
        if(empty($title) || empty($desc)){
            echo "Required";
        }
        
        else{
            $completeName = $fname." ".substr($mname, 0,1).". ".$lname;
            $announce = new AddAnnouncement($title,$desc,$completeName ,$pos);
            if($announce->addAnnouncement()){
                echo "Success";
            }else{
                echo "Failed";
            }
        }


        

    }


?>