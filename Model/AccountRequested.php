<?php
    require_once("config.php"); //required to implement this for calling DB

    class AccountRequested extends config{
        

        public function showSeniorAccountRequested(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT * FROM srpersonalinfo WHERE `Status`='Pending'";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "<tr>
                    <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'],0,1).". ".$res['LastName']."</td>
                    <td class='text-center'>$res[Address]</td>
                    <td class='text-center'>$res[Age]</td>
                    <td class='text-center'>$res[Gender]</td>
                    <td class='text-center'>$res[Status]</td>
                    <td class='text-center'>
                        <a href='$res[UserUniqueID]' class='btn btn-primary'><i class='fa-solid fa-eye'></i></a> 
                        <a href='$res[UserUniqueID]' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }
        }

        public function showAllSeniorAccount(){
            $con = $this->openConnection();
            $sqlQuery = "SELECT * FROM srpersonalinfo";
            $stmt = $con->prepare($sqlQuery);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                while($res = $stmt->fetch()){
                    echo "<tr>
                    <td class='text-center'>".$res['FirstName']." ".substr($res['MiddleName'],0,1).". ".$res['LastName']."</td>
                    <td class='text-center d-none'>$res[UserUniqueID]</td>
                    <td class='text-center'>$res[Address]</td>
                    <td class='text-center'>$res[Age]</td>
                    <td class='text-center'>$res[Gender]</td>
                    <td class='text-center'>$res[Status]</td>
                    <td class='text-center'>
                        <a href='$res[UserUniqueID]' class='btn btn-primary'><i class='fa-solid fa-eye'></i></a> 
                        <a class='btn btn-danger deleteThisSrCitizenAcct'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }
        }

    }



?>