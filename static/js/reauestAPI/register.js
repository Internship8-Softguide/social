$(() => {
    const register = $("#register");
    const name = $("#name");
    const email = $("#email");
    const password = $("#password");
    const confirmPassword = $("#confirmPassword")
    register.on("click", () => {
        loadingOpen();
        const elements = [name, email, password, confirmPassword];
        let request = {
            name: name.val(),
            email: email.val(),
            password: password.val(),
        }
        if (validate(elements)) {
            postJson('./server/register/register.php', request).then((jsonResult) => {
                if (jsonResult.status == 200) {
                    // setCookie(JSON.stringify(jsonResult.data));
                    // location.href = "home.php"
                    console.log(jsonResult)
                } else {
                    commonValidatMessage(jsonResult.data);
                }
                loadingHide();
            }).catch((e) => {
                console.log(e)
                loadingHide();
            });
        }
    });
});