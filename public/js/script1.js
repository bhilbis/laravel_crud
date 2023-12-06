function SendMail() {
    var emailInput = document.getElementById("email_id");
    var emailError = document.getElementById("emailError");

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    var params = {
        from_name: document.getElementById("fullName").value,
        email_id: emailInput.value,
        contact_no : document.getElementById("contact_no").value,
        message: document.getElementById("message").value,
    }

    if (!emailPattern.test(params.email_id)) {
        emailError.innerHTML = "Email tidak valid.";
        emailError.style.color = "red";
        return false;
    } else {
        emailError.innerHTML = "";
    }

    // Reset nilai-nilai dalam formulir
    document.getElementById("fullName").value = "";
    emailInput.value = "";
    document.getElementById("contact_no").value = "";
    document.getElementById("message").value = "";

    emailjs.send("service_xul49co", "template_9y0mn5w", params).then(function (res) {
        alert("Succes! " + res.status);
    });

    return true;
}



function validateForm() {
    var emailInput = document.getElementById("email_id");
    var emailError = document.getElementById("emailError");
    var email = emailInput.value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (!emailPattern.test(email)) {
        emailError.textContent = "Email tidak valid";
        emailInput.focus();
        return false;
    } else {
        emailError.textContent = "";
        return true;
    }
}