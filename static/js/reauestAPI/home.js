$(() => {
    const postBtn = $("#postBtn");
    const file = $("#file");
    const textField = $("#textField");
    postBtn.on("click", () => {
        
        const elements = [file, textField];
        if (validate(elements)) {
        }
    });

});

