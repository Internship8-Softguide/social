$(() => {

    signIn.on("click", () => {
        const elements = [];
        if (validate(elements)) {
            //api call
        }
    });

});

// Loading Functions
function LoadingOpen(){
    let loading = document.getElementById("loading")
    $("body").css({
        "overflow": "hidden",
        "pointer-events": "auto",
        "user-select": "none"
    });
    $("body").css("pointer-events", "none");
    loading.style.display = "flex";
}

function LoadingHide(){
    let loading = document.getElementById("loading")
    $("body").css({
        "overflow": "auto",
        "pointer-events": "auto",
        "user-select": "auto"
    });
    loading.style.display = "none";
}