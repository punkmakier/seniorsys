<?php
    require_once("config.php"); //required to implement this for calling DB

    class ShowMessage extends config{
        

        public function showAllMessage(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT * FROM `message`";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "<tr>
                    <td class='text-center d-none'>$res[id]</td>
                    <td class='text-center'>$res[MessageBy]</td>
                    <td class='text-center'>$res[Subject]</td>
                    <td class='text-center'>$res[Description]</td>
                    <td class='text-center'>$res[Status]</td>
                    <td class='text-center'>$res[DateCreated]</td>
                    <td class='text-center'>
                        <a class='btn btn-primary readMessage'>";
                        
                        if($res['Status']=="Unread"){echo "<i class='fa-solid fa-envelope'></i>";}else{ echo "<i class='fa-solid fa-envelope-open'></i>";}
                        echo "</a> 
                        <a class='btn btn-danger deleteMessage'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }
        }


}
?>