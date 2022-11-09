
<?php
    require '../Model/AdminDashboard.php';
    $count = new AdminDashboard;

?>


<div class="container-fluid p-3">
<h3 class="mb-3 mt-4">Dashboard</h3>

    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Total Senior User<br><b><?php $count->countSeniorUser();?></b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Total Admin User<br><b><?php $count->countAdminUser();?></b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Unread Message<br><b><?php $count->countUnreadMessage();?></b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Pending Account Req<br><b><?php $count->countSeniorRequestAccount();?></b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Pending Pension Req<br><b>11</b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Pending ID Req<br><b>11</b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label style="font-size: 0.9rem;">Pending Burial Asst. Req<br><b>11</b></label>
    </div>
   
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Total Pension Appr<br><b>11</b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Total ID Appr<br><b>11</b></label>
    </div>
    <div class="count-cards">
        <i class="fa-solid fa-users"></i>
        <label>Total Burial Asst. Appr<br><b>11</b></label>
    </div>
</div>