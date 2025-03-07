$(() => {
    const signIn = $("#signIn");
    const email = $("#email");
    const password = $("#password");
    signIn.on("click", () => {
        const elements = [email, password];
        if (validate(elements)) {
            //api call
        }
    });
});