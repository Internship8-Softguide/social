<?php require_once ("./layout/auth.php") ?>
<?php require_once ("./layout/header.php") ?>
<?php
$userId = $username = $email = $edu = $rs = $phone = $location = $bio = "";
$isMe = false;
if (isset($_GET['id'])) {
    $user = get_user_by_id($mysqli, $_GET['id']);
}
if (isset($_COOKIE['user'])) {
    $userData = json_decode($_COOKIE['user'], true);
    if ($user['data']['id'] == $userData['data']['id']) {
        $userData = $user;
        $isMe = true;
    }
    if ($userData !== null) {
        $userId   = $userData['data']['id'];
        $username = $userData['data']['name'];
        $email    = $userData['data']['email'];
        // $edu    = $userData['data']['education'];
        $rs    = $userData['data']['relationship'];
        $phone    = $userData['data']['phone'];
        $location    = $userData['data']['location'];
        $bio = $userData['data']['bio'];
        
    } else {
        echo "Failed to decode user data.";
    }
}

?>


<div class="user-detail">
    <div class="user-detail-card">
        <!-- Left Side info -->
        <div class="userdetailimg">
            <img src="./static/image/userprofile.jpg" alt="Profile Picture" class="user-img">
            <h2><?php echo htmlspecialchars($username); ?></h2>
            <input type="file" style="display: none;">
            <!-- <h3>Bio</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s. lorem*300</p> -->

            <!-- <button class="interest-btn"></button> -->

            <!-- <div class="interest">
                <h3>My Interest</h3>
                <p>Discover my passions for music, travel, coding, and learning new things.</p>
            </div> -->
        </div>

        <!-- Right Side info-->
        <div class="aboutdetail">
            <div class="about">
                <div style="display: flex;justify-content: space-between;align-items: center;">
                    <h2>About </h2><i class="fa-solid fa-edit"></i> <i class="fa-solid fa-check" style="display: none;"></i>
                </div>
                <p>Add your bio
            </p>
            </div>

            <div class="detail">
                <h2>Details</h2>
                <div class="info">
                    <h4><i class="fa-solid fa-user"></i> Name</h4>
                    <p type="name"><?php echo htmlspecialchars($username); ?>
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>

                <div class="info">
                    <h4><i class="fa-solid fa-envelope"></i> Email</h4>
                    <p type="email"><?php echo htmlspecialchars($email); ?>
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-lock"></i> Pass</h4>
                    <p type="password">********
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-graduation-cap"></i> Edu</h4>
                    <p type="edu"><?php echo htmlspecialchars($edu); ?>
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-heart"></i> Relationship </h4>
                    <p type="relationship"><?php echo htmlspecialchars($rs); ?>
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>

                <div class="info">
                    <h4><i class="fa-solid fa-phone"></i> Phone </h4>
                    <p type="phone"><?php echo htmlspecialchars($phone); ?>
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>
                <div class="info">
                    <h4><i class="fa-solid fa-location-dot"></i> Location</h4>
                    <p type="location"><?php echo htmlspecialchars($location); ?>
                        <?php if ($isMe) {
                            echo '<i class="fa-solid fa-pen"></i>';
                        } ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>
<script src="./static/js/reauestAPI/userDetail.js"></script>