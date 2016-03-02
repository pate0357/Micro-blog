document.addEventListener("DOMContentLoaded", function () {

document.querySelector("#signinNav").style.display = "none";

//show custome style whene signin btn will click.
document.querySelector("#btnSignIn").addEventListener("click", function () {

    document.querySelector("#signinNav").style.display = "block";
    document.querySelector("#defaultNav").style.display = "none";

 });
});