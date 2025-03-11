$(() => {
    const register = $("#register");
    const name = $("#name");
    const email = $("#email");
    const password = $("#password");
    const confirm = $("#confirm")

    register.on("click", () => {
        const elements = [name, email, password, confirm];
        if (validate(elements)) {
            //api call 
            if (validate(elements)) {
                let request = {
                    name: name.val(),
                    email: email.val(),
                    password: password.val(),
                    confirm: confirm.val(),
                };
                postJson('./server/register/register.php', request)
                    .then((jsonResult) => {
                        if (jsonResult.status == 200) {
                            setCookie(JSON.stringify(jsonResult));
                            location.href = "home.php";
                        } else {
                            commonValidatMessage(jsonResult.data);
                        }
                        loadingHide();
                    });

            } else {
                loadingHide();
            }
        }
    });
});