

//Used in myaccount.php
//AJAX code to display the elements without reloading the page

function showAccountDetails() {

    let accountInfo = "accountinfo";
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("accountDetails").innerHTML = this.responseText;
        }
    };


    xmlhttp.open("GET","myaccount.php?"+ accountInfo,true);
    xmlhttp.send();
}

function changePassword() {

    let changePass = "changePassword";
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("accountDetails").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","myaccount.php?"+ changePass,true);
    xmlhttp.send();
}