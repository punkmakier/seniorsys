<?php
    require_once("config.php"); //required to implement this for calling DB

    class Message extends config{
        
        private $subject;
        private $body;
        private $user;

        public function __construct($subject,$body,$user){
            $this->subject = $subject;
            $this->body = $body;
            $this->user = $user;
        }

        public function sendMessageToAdmin(){
            $con = $this->openConnection();
            $sqlQuery = "INSERT INTO `message` (`Subject`,`Description`,`MessageBy`) VALUES('$this->subject','$this->body','$this->user')";
            $stmt = $con->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

    }



?>