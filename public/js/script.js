function unmask() {
    var inputType = document.getElementById('password');
    var iconvue = document.getElementById("icon-vue");
    var iconpassword = document.getElementById("icon-password");
    if (inputType.type === "password") {
        document.getElementById('password').type = "text";
        iconvue.style.display = "block";
        iconpassword.style.display = "black";

    } else {
        document.getElementById('password').type = "password";
        iconvue.style.display = "none";

    }
}
function iconpassword() {
    var inputType = document.getElementById('password');
    var iconvue = document.getElementById("icon-vuelogin");
    var iconpassword = document.getElementById("icon-password");
    if (inputType.type === "password") {
        document.getElementById('password').type = "text";
        iconvue.style.display = "block";
        iconpassword.style.display = "block";

    } else {
        document.getElementById('password').type = "password";
        iconvue.style.display = "none";


    }
}

