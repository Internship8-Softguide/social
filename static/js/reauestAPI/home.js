$(() => {
    $("#logout").on("click", () => {
        removeCookie();
        location.reload();
    });
    const file = $("#file");
    const textField = $("#textField");
    const postCreateErr = $("#postCreateErr");
    const fileErr = $("#fileErr");
    const textFieldErr = $("#textFieldErr");

    $("#postBtn").on("click", async () => {
        postCreateErr.text("");
        fileErr.text("");
        textFieldErr.text("");

        if (validate([file])) {
            let formData = new FormData();
            formData.append("file", file[0].files[0]);
            formData.append("textField", textField.val());

            postFormData("./server/home/create_post.php", formData)
                .then((jsonResult) => {
                    if (jsonResult.status == 200) {
                        // $("#close-modal").click()
                    } else {
                        commonValidatMessage(jsonResult);
                    }
                    loadingHide();
                })
                .catch(() => {
                    postCreateErr.text("An error occurred while creating the post.");
                    loadingHide();
                });
        } else {
            loadingHide();
        }

    });
    getAllData("./server/home/selectPost.php").then((jsonResult) => {
        if (jsonResult.status == "success") {
            for (let i = 0; i < jsonResult.data.length; i++) {
                post_id = jsonResult.data[i].id;
                user_id = jsonResult.data[i].user_id;
                user_name = jsonResult.data[i].name;
                post_image = jsonResult.data[i].postImage;
                user_photo = jsonResult.data[i].photo == '' ? 'static/image/profile.png' : jsonResult.data[i].photo;
                title = jsonResult.data[i].title;

                const dbTimeStr = jsonResult.data[i].createdAt;
                const now = new Date();
                const dbTime = new Date(dbTimeStr);
                const year = dbTime.getFullYear();
                const month = dbTime.toLocaleString("en-US", { month: "long" });
                const day = dbTime.getDate().toString().padStart(2, "0");

                let hour = dbTime.getHours();
                const minute = dbTime.getMinutes().toString().padStart(2, "0"); // Ensure two digits
                const ampm = hour >= 12 ? "PM" : "AM";
                hour = hour % 12 || 12; // Convert to 12-hour format, `0` becomes `12`


                const nowYear = now.getFullYear();
                const nowMonth = now.toLocaleString("en-US", { month: "long" });
                const nowDay = now.getDate().toString().padStart(2, "0");

                const yesterday = new Date();
                yesterday.setDate(now.getDate() - 1); // Move back 1 day
                const yesterdayYear = yesterday.getFullYear();
                const yesterdayMonth = yesterday.toLocaleString("en-US", {
                    month: "long",
                });
                const yesterdayDay = yesterday
                    .getDate()
                    .toString()
                    .padStart(2, "0");

                let formattedDate = `${year}/${month}/${day}`;
                // Check if dbDate is today
                if (
                    `${year}/${month}/${day}` ===
                    `${nowYear}/${nowMonth}/${nowDay}`
                ) {
                    formattedDate = "Today";
                } else if (
                    `${year}/${month}/${day}` ===
                    `${yesterdayYear}/${yesterdayMonth}/${yesterdayDay}`
                ) {
                    formattedDate = "Yesterday";
                }
                const formattedTime = `${hour}:${minute} ${ampm}`;

                const timeDiffMs = now - dbTime;
                const seconds = Math.floor(timeDiffMs / 1000);
                const minutes = Math.floor(seconds / 60);
                const hours = Math.floor(minutes / 60);
                const days = Math.floor(hours / 24);
                const years = Math.floor(days / 365);
                function getTimeDifference() {
                    if (years > 0) {
                        return `${years} year${years > 1 ? "s" : ""} ago`;
                    } else if (days > 0) {
                        return `${days} day${days > 1 ? "s" : ""} ago`;
                    } else if (hours > 0) {
                        return `${hours} hour${hours > 1 ? "s" : ""} ago`;
                    } else if (minutes > 0) {
                        return `${minutes} minute${minutes > 1 ? "s" : ""} ago`;
                    } else if (seconds > 0) {
                        return `${seconds} second${seconds > 1 ? "s" : ""} ago`;
                    } else {
                        return "Just now"; // Less than 1 second difference
                    }
                }

                maincontent = $(".main-content");
                postContainer = $("<div>")
                    .addClass("post-container")
                    .data("post_id", post_id)
                    .data("user_id", user_id);
                postHeader = $("<div>").addClass("post-header");
                profilePic = $("<img>")
                    .attr({
                        src: user_photo,
                        alt: "Profile Picture",
                    })
                    .addClass("profile-pic");
                profileLink = $("<a>")
                    .attr("href", "./user_detail.php?id=" + user_id)
                    .append(profilePic);
                postInfo = $("<div>").addClass("post-info");
                userName = $("<h6>").text(user_name);
                link = $("<a>")
                    .attr("href", "./user_detail.php?id=" + user_id)
                    .append(userName)
                    .css({ "text-decoration": "none", color: "black" });
                timeAgo = $("<small>").text(
                    getTimeDifference() +
                    " " +
                    formattedDate +
                    " " +
                    formattedTime
                );
                postInfo.append(link, timeAgo);
                postHeader.append(profileLink, postInfo);
                postText = $("<div>").addClass("post-text").text(title);
                if (post_image !== "" || post_image !== null) {
                    postImage = $("<img>")
                        .attr({
                            src: "static/image/" + post_image,
                            alt: "Post Image",
                        })
                        .addClass("post-image");
                }
                reactionSection = $("<div>").addClass("reaction-section");
                likeReaction = $("<i>")
                    .addClass(" far fa-thumbs-up like-reaction me-3")
                    .attr("aria-hidden", "true");
                commentReaction = $("<i>")
                    .addClass("far fa-comment comment-reaction")
                    .attr("id", "control")
                    .attr("aria-hidden", "true");
                reactionSection.append(likeReaction, commentReaction);
                if (post_image == "" || post_image == null) {
                    postContainer.append(postHeader, postText, reactionSection);
                } else {
                    postContainer.append(
                        postHeader,
                        postText,
                        postImage,
                        reactionSection
                    );
                }
                maincontent.append(postContainer);
            }
        }
    });
});

