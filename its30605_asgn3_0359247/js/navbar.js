let backdrop = document.getElementById("backdrop");
let navbarButton = document.getElementById("login-navbar");

if (navbarButton) {
    navbarButton.addEventListener("click", function() {
        backdrop.style.display = "block";
        document.getElementById("username").focus();
    })
    
    window.addEventListener("click", function(e) {
        if ((e.target === backdrop) && (backdrop.style.display != "none")) {
            backdrop.style.display = "none";
        }
    })
}