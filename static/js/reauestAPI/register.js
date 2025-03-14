$(() => {
    const register = $("#register");
    const name = $("#name");
    const email = $("#email");
    const password = $("#password");
    const confirm = $("#confirm");

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
                            setCookie(JSON.stringify(jsonResult.data));
                            location.href = "home.php";
                        } else {
                            commonValidatMessage(jsonResult.data);
                        }
                        loadingHide();
                    })
            } else {
                loadingHide();
            }
        }
    });
});


//EYE
let pswInput = document.getElementById("password");
let confirmInput = document.getElementById('confirm');
let pswIcon = document.getElementById('passwordIcon')
let confirmIcon = document.getElementById('confirmIcon');

pswIcon.addEventListener("click", () => {
    if (pswIcon.classList[1] == "fa-eye-slash") {
        pswInput.type = "text";
        pswIcon.classList.remove("fa-eye-slash")
        pswIcon.classList.add("fa-eye");
    } else {
        pswInput.type = "password";
        pswIcon.classList.remove("fa-eye")
        pswIcon.classList.add("fa-eye-slash");
    }
})

confirmIcon.addEventListener("click", () => {
    if (confirmIcon.classList[1] == "fa-eye-slash") {
        confirmInput.type = "text";
        confirmIcon.classList.remove("fa-eye-slash")
        confirmIcon.classList.add("fa-eye");
    } else {
        confirmInput.type = "password";
        confirmIcon.classList.remove("fa-eye")
        confirmIcon.classList.add("fa-eye-slash");
    }
})