$(() => {

    $("#logout").on("click", () => {
        removeCookie();
        location.reload();
    });
 
    const file          = $("#file");
    const textField     = $("#textField");
    const postCreateErr = $("#postCreateErr");
    const fileErr       = $("#fileErr");
    const textFieldErr  = $("#textFieldErr");

    $("#postBtn").on("click", async() => {
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
                    location.href = "home.php";
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
});

