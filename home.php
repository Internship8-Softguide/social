<?php require_once ("./layout/auth.php") ?>
<?php require_once ("./layout/header.php") ?>

<div class="home-background">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <a class="navbar-brand ms-3" href="./home.php">SG-Social</a>

            <!-- <div class="search-bar mx-auto">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn" type="button">Search</button>
        </div> -->

            <div class="user-dropdown ms-auto">
                <!-- <i class="fas fa-bell fs-5 cursor-pointer me-5" role="button"></i>
        <i class="fas fa-comments fs-5 cursor-pointer me-5" role="button"></i> -->
                <div class="dropdown">
                    <img src="<?php echo $user['data']['photo'] == '' ? "static/image/profile.png" : $user['data']['photo'] ?>" class="dropdown-toggle me-2" id="userDropdown" data-bs-toggle="dropdown">
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="./user_detail.php">Profile</a></li>
                        <li><a class="dropdown-item" id="logout">Logout</a></li>
                    </ul>
                </div>
                <span class="me-5"><?= $user['data']['name'] ?></span>
            </div>
        </div>
    </nav>
    <div class="main-content1">
        <!-- <h3>Your New Posts</h3> -->
        <div class="new-post-container" data-bs-toggle="modal" data-bs-target="#postModal">
            <img src="static/image/profile.png" alt="Profile Picture" class="profile-pic">
            <button class="new-post-button">Add a post</button>
        </div>
    </div>
    <div class="main-content" id="main-content">
        <!-- <h3>Your New Posts</h3> -->

        <!-- <div class="post-container">
            <div class="post-header">
                <img src="static/image/profile.png" alt="Profile Picture" class="profile-pic">
                <div class="post-info">
                    <h6>User name</h6>
                    <small>10 mins ago</small>
                </div>
                <div class="dropdown">
                    <span><i class="fa fa-ellipsis-v" data-bs-toggle="dropdown" id="postEditDropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" aria-labelledby="postEditDropdown">
                            <li><a class="dropdown-item" href="">Edit Post</a></li>
                            <li><a class="dropdown-item" href="" id="">Delete Post</a></li>
                        </ul>
                    </span>
                </div>
            </div>
            <div class="post-text">
                The MayKha! The most beautiful river.
            </div>

            <img src="static/image/maykha.jpg" alt="Post Image" class="post-image">

            <div class="reaction-section">
                <i class="fa fa-thumbs-up like-reaction me-3" aria-hidden="true"></i>
                <i class="fa fa-comment comment-reaction" aria-hidden="true"></i> -->
        <!-- </div>
</div> -->
    </div>
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create a Post</h5>
                    <button type="button" class="btn-close" id="close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <span class="validate" id="postCreateErr"></span>
                        <input type="file" class="form-control" name="file" id="file" validate="file" />
                        <span class="validate" id="fileErr"></span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="title" rows="4" placeholder="What's on your mind?" validate="file" id="textField"></textarea>
                        <span class="validate" id="textFieldErr"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" style="background-color: #8a57e9; color: white;" id="postBtn">Post</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once ("./layout/footer.php") ?>
<script src="./static/js/reauestAPI/home.js"></script>

<script>
    $(document).ready(function() {
        // getAllData("./server/home/comment.php")
        //     .then((jsonResult) => {
        //         // Handle the response here
        //         console.log("Data from server:", jsonResult);
        //         // You can do further processing here, like updating the UI

        //     })
        //     .catch((error) => {
        //         console.error("Error fetching data:", error);
        //     });
        let comment_input = $(".comment-section");
        $(document).on("change", comment_input, function() {
            console.log("Hello");
        });
        $(document).on("click", "#control", function() {
            const postId = $(this).closest(".post-container").data("post_id");
            const userId = $(this).closest(".post-container").data("user_id");

            console.log("Clicked post_id:", postId);
            console.log("Clicked user_id:", userId);
            let postContainer = $(this).closest(".post-container");
            let commentSection = postContainer.find(".comment-section");
            console.log(commentSection)

            if (commentSection.length === 0) {
                // If the comment section does not exist, create and append it
                commentSection = $(`
            <div class="comment-section">
            <form>
                <div class="comments-list">
                    <p>This is comment One</p> 
                    <p>This is comment Two</p> 
                </div>  
                <input type="text" class="comment-input" placeholder="Write a comment...">
                </form>
            </div>
        `);
                postContainer.append(commentSection);
            } else {
                // If the comment section exists, toggle its visibility
                commentSection.toggle();
            }
        });

    });
</script>