function showMdp1() {
    var input = document.getElementById('motdepasse');
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}
function showMdp2() {
    var input = document.getElementById('motdepasse2');
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}