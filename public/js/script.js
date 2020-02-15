function unmask() {
    var inputType = document.getElementById('password');
    var x = document.getElementById("traitDiag");
    if (inputType.type === "password") {
        document.getElementById('password').type = "text";
        x.style.display = "block";

    } else {
        document.getElementById('password').type = "password";
        x.style.display = "none";
    }
}
