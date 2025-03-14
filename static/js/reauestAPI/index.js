$(() => {
    const signIn = $("#signIn");
    const togglePassword = $("#togglePassword");
    const email = $("#email");
    const password = $("#password");
    signIn.on("click", () => {
        loadingOpen();
        const elements = [email, password];
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
            setTimeout(loadingHide(), 2000);
        }

    });
    togglePassword.on("click", () => {
        let passwordField = document.getElementById("password");
        let icon = document.getElementById("togglePassword").querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    })  
});