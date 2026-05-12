function doValidate() {
    let form = document.forms["UserForm"];
    let serviceData = form["service"].value.trim();
    let dateData = form["date"].value.trim();
    let timeData = form["time"].value.trim();
    let nameData = form["name"].value.trim();
    let phoneData = form["phone"].value.trim();
    let emailData = form["email"].value.trim();

    if (serviceData === "") {
        alert("Please select a service.");
        return false;
    }

    if (dateData === "") {
        alert("Please select a date.");
        return false;
    }

    if (timeData === "") {
        alert("Please select a time.");
        return false;
    }

    if (nameData === "") {
        alert("Please enter your name.");
        return false;
    }

    if (phoneData === "") {
        alert("Please enter your phone number.");
        return false;
    }

    if (emailData === "") {
        alert("Please enter your email.");
        return false;
    }

    // phone number validation
    let phonePattern = /^[0-9]{10,}$/; // 10 digit minimum
    if (!phonePattern.test(phoneData)) {
        alert("Please enter a valid phone number.");
        return false;
    }

    // email validation
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailData)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true; 
}




let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
  navbar.classList.toggle('active');
};
