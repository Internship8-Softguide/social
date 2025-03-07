<?php require_once ("./layout/header.php")?>
    <div class="home-background">
    <div class="my-navbar">
        <h2>SG-Social</h2>
        <input type="text" placeholder="Search jobs, friends...">
        <div class="my-nav-icons">
            <i class="fas fa-bell"></i>
            <i class="fas fa-comments"></i> 
            <div class="profile">
                <img src="static/image/profile.png" alt="User">
                <div class="dropdown">
                    <ul>
                        <li>Profile</li>
                        <li>Logout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <h2>Your New Posts</h2>
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
                <i class="fa fa-thumbs-up like-reaction" aria-hidden="true"></i>
                <input type="text" name="comment" class="comment-input" placeholder="Comment here..."></input>
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
                <i class="fa fa-thumbs-up like-reaction" aria-hidden="true"></i>
                <input type="text" name="comment" class="comment-input" placeholder="Comment here..."></input>
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
