$(() => {
    const register = $("#register");
    const name = $("#name");
    const email = $("#email");
    const password = $("#password");
    const confirmPassword = $("#confirmPassword")
    register.on("click", () => {
        const elements = [name, email, password, confirmPassword];
        if (validate(elements)) {
            //api call
        }
    });
});