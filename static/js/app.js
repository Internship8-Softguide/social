// Loading Functions
function loadingOpen() {
    let loading = document.getElementById("loading")
    $("body").css({
        "overflow": "hidden",
        "pointer-events": "auto",
        "user-select": "none",
        "background-color": "#8d8c8c5a"
    });
    $("body").css("pointer-events", "none");
    loading.style.display = "flex";
}

function loadingHide() {
    let loading = document.getElementById("loading")
    $("body").css({
        "overflow": "auto",
        "pointer-events": "auto",
        "user-select": "auto",
        "background-color": "#fff"
    });
    loading.style.display = "none";
}

function setCookie(value) {
    let expires = "";
    const date = new Date();
    date.setTime(date.getTime() + (14 * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
    document.cookie = "user" + "=" + (value || "") + expires + "; path=/";
}

function removeCookie() {
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
}
