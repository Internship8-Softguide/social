$(() => {
    const signIn = $("#signIn");
    const email = $("#email");
    const password = $("#password");
    signIn.on("click", () => {
        loadingOpen();
        const elements = [email, password];
        if (validate(elements)) {
            let request = {
                email: email.val(),
                password: password.val()
            };
            postJson('./server/index/login.php', request)
                .then((jsonResult) => {
                    if (jsonResult.status == "success") {
                        setCookie(JSON.stringify(jsonResult));
                        location.href = "home.php";
                    } else {
                        console.log(jsonResult)
                    }
                    loadingHide();
                });

        } else {
            loadingHide();
        }

    });
});