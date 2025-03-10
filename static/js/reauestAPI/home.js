$(() => {

    $("#logout").on("click", () => {
        removeCookie();
        location.reload();
    });

});

