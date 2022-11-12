
<?php
    require_once 'Model/HomePageAnnounce.php';
    $snrAccountDetails = new HomePageAnnounce;

?>


<div id="announcement">
    <div class="container mt-5 text-center pe-lg-5 ps-lg-5 pb-lg-5">
        <h3>Announcement</h3>
        <h4 class="mt-4"><?php $snrAccountDetails->showLastAnnouncementTitle(); ?></h4>
        <p class="mt-5  ps-lg-5 pe-lg-5"><?php $snrAccountDetails->showLastAnnouncementDescription(); ?></p>

        <label class="mt-3">Date Posted: <?php $snrAccountDetails->showLastAnnouncementDateCreated(); ?><br>
            <small>Posted By: <?php $snrAccountDetails->showLastAnnouncementPostedBy(); ?> | <?php $snrAccountDetails->showLastAnnouncementPostedByPosition(); ?></small>
    </label>

    </div>
</div>