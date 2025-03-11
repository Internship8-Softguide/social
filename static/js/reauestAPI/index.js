$(() => {
    const signIn = $("#signIn");
    const email = $("#email");
    const password = $("#password");
    signIn.on("click", () => {
        loadingOpen();
        const elements = [email, password,numbercheck];
        if (validate(elements)) {
            let request = {
                email: email.val(),
                password: password.val(),
            };
            postJson('./server/index/login.php', request)
                .then((jsonResult) => {
                    if (jsonResult.status == 200) {
                        setCookie(JSON.stringify(jsonResult.data));

                        location.href = "home.php";
                    } else {
                        commonValidatMessage(jsonResult.data);
                    }
                    loadingHide();
                }).catch((e) => {
                    console.log(e)
                    loadingHide();
                });

        } else {
            loadingHide();
        }

    });
});