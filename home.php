
<?php require_once ("./layout/auth.php")?>
<?php require_once ("./layout/header.php")?>
    <div class="home-background">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        
        <a class="navbar-brand ms-3" href="#">SG-Social</a>

        <!-- <div class="search-bar mx-auto">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn" type="button">Search</button>
        </div> -->
        
        <div class="user-dropdown ms-auto">
        <!-- <i class="fas fa-bell fs-5 cursor-pointer me-5" role="button"></i>
        <i class="fas fa-comments fs-5 cursor-pointer me-5" role="button"></i> -->
            <div class="dropdown">
                <img src="static/image/profile.png" class="dropdown-toggle me-2" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </div>
            <span class="me-5">User Name</span>
        </div>
    </div>
</nav>
    <div class="main-content">
        <h3>Your New Posts</h3>
        <div class="new-post-container" data-bs-toggle="modal" data-bs-target="#postModal">
            <img src="static/image/profile.png" alt="Profile Picture" class="profile-pic">
            <button class="new-post-button">Add a post</button>
        </div>
        <div class="post-container">
            <div class="post-header">
                <img src="static/image/profile.png" alt="Profile Picture" class="profile-pic">
                <div class="post-info">
                    <h6>User name</h6>
                    <small>5 mins ago</small>
                </div>
            </div>
            <div class="post-text">
                Hello Putao! I am here.
            </div>

            <img src="static/image/treeking.jpg" alt="Post Image" class="post-image">
            <div class="reaction-section">
                <i class="fa fa-thumbs-up like-reaction me-3" aria-hidden="true"></i>
                <i class="fa fa-comment comment-reaction" aria-hidden="true"></i>
                <!-- <input type="text" name="comment" class="comment-input" placeholder="Comment here..."></input> -->
            </div>
        </div>
        <div class="post-container">
            <div class="post-header">
                <img src="static/image/profile.png" alt="Profile Picture" class="profile-pic">
                <div class="post-info">
                    <h6>User name</h6>
                    <small>10 mins ago</small>
                </div>
            </div>
            <div class="post-text">
                The MayKha! The most beautiful river.
            </div>

            <img src="static/image/maykha.jpg" alt="Post Image" class="post-image">

            <div class="reaction-section">
                <i class="fa fa-thumbs-up like-reaction me-3" aria-hidden="true"></i>
                <i class="fa fa-comment comment-reaction" aria-hidden="true"></i>
                <!-- <input type="text" name="comment" class="comment-input" placeholder="Comment here..."></input> -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create a Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="file" class="form-control" name="post-photo" id="">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="4" placeholder="What's on your mind?"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn" style="background-color: #8a57e9; color: white;">Post</button>
                </div>
            </div>
        </div>
    </div>

    </div>

<?php require_once ("./layout/footer.php")?>
<script src="./static/js/reauestAPI/home.js"></script>

<script>
   $(document).ready(function () {
    $(".comment-reaction").on("click", function () {
        let postContainer = $(this).closest(".post-container");
        let commentSection = postContainer.find(".comment-section");

        if (commentSection.length === 0) {
            commentSection = $(`
                <div class="comment-section">
                    <div class="comments-list">
                    <p>This is comment One </p> 
                    <p>This is comment Two </p> 
                    </div>
                    <input type="text" class="comment-input" placeholder="Write a comment...">
                </div>
            `);
            postContainer.append(commentSection);
        }

        let existingComments = commentSection.find(".comments-list").children().length;

        if (existingComments > 0) {
           
            commentSection.find(".comments-list").show();
        } else {
            commentSection.find(".comments-list").hide();
        }

        commentSection.toggle();
    });
});

</script>

