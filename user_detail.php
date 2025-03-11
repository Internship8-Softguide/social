<?php require_once("./layout/auth.php") ?>
<?php require_once("./layout/header.php") ?>
<div class="user-detail">
    <div class="user-detail-card">

        <!-- Left Side info -->
        <div class="userdetailimg">
            <img src="./static/image/userprofile.jpg" alt="Profile Picture" class="user-img">
            <h2>Angelar</h2>
            <h3>Bio</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s. lorem*300</p>

            <!-- <button class="interest-btn"></button> -->

            <div class="interest">
                <h3>My Interest</h3>
                <p>Discover my passions for music, travel, coding, and learning new things.</p>
            </div>
        </div>

        <!-- Right Side info-->
        <div class="aboutdetail">
            <div class="about">
                <h2>About</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.</p>
            </div>

            <div class="detail">
                <h2>Details</h2>
                <div class="info">
                    <h4><i class="fa-solid fa-user"></i> Name</h4>
                    <p>angelar <i class="fa-solid fa-pen"></i></p>
                </div>

                <div class="info">
                    <h4><i class="fa-solid fa-envelope"></i> Email</h4>
                    <p>angelar@gmail.com <i class="fa-solid fa-pen"></i></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-lock"></i> Pass</h4>
                    <p>******** <i class="fa-solid fa-pen"></i></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-graduation-cap"></i> Edu</h4>
                    <p>Harvard University <i class="fa-solid fa-pen"></i></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-heart"></i> Relationship </h4>
                    <p>Single<i class="fa-solid fa-pen"></i></p>
                </div>

                <div class="info">
                    <h4><i class="fa-solid fa-phone"></i> Phone </h4>
                    <p>09123456789 <i class="fa-solid fa-pen"></i></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-location-dot"></i> Location</h4>
                    <p>Yangon <i class="fa-solid fa-pen"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("./layout/footer.php") ?>
<script src="./static/js/reauestAPI/user_detail.js"></script>