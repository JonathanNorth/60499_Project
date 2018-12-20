

//Checks whether the password entered has letters, numbers and atleast 6 characters
function validatePassword(pass){
    let pattern = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.{6,})");
    return pattern.test(pass);


}

//checks if each box in the change password feature is entered
//displays error messages if the fields are not completed properly
function validateChangePasswordForm(){
    let password = document.forms["change_password"]["password"].value;
    let cpassword = document.forms["change_password"]["confirm_password"].value;

    if (!validatePassword(password)) {
        document.getElementById('password_error').innerHTML = "Please enter a valid password";
        return false;

    } else {
        document.getElementById('password_error').innerHTML = "";

    }


    if (cpassword !== password) {
        document.getElementById('confirm_password_error').innerHTML = "Does not match password";
        return false;
    } else {
        document.getElementById('confirm_password_error').innerHTML = "";


    }

}
//checks if the information entered in the registration page is valid
function validateRegistrationForm() {
    let fullname = document.forms["register"]["fullname"].value;

    let username = document.forms["register"]["username"].value;
    let password = document.forms["register"]["password"].value;
    let confirm_password = document.forms["register"]["confirm_password"].value;

    if (fullname === "") {
        document.getElementById('fullname_error').innerHTML = "Please enter a name";
        return false;

    }
    else{
        document.getElementById('fullname_error').innerHTML = "";

    }
    if (username === "") {
        document.getElementById('username_error').innerHTML = "Please enter a username";
        return false;

    }
    else{
        document.getElementById('username_error').innerHTML = "";

    }

    if (!validatePassword(password)) {
        document.getElementById('password_error').innerHTML = "Please enter a valid password";
        return false;

    } else {
        document.getElementById('password_error').innerHTML = "";

    }


    if (confirm_password !== password) {
        document.getElementById('confirm_password_error').innerHTML = "Does not match password";
        return false;
    } else {
        document.getElementById('confirm_password_error').innerHTML = "";


    }
}