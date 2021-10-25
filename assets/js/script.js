if (document.querySelector('button.signup-button') !== null) {
    document.querySelector('button.signup-button').onclick = (e) => {
        var array = document.querySelectorAll('.input-field');
        for (let i = 0; i < array.length; i++) {
            var ele = array[i].value;
            if(ele == ''){
                e.preventDefault();
            }else {
                e.returnValue = true;
            }
        }
        validation_form();
        display_error();
    }
} else {
    document.querySelector('button.login-button').onclick = (e) => {
        const y = document.querySelector("div.alert");
        var array = document.querySelectorAll('.input-field');
        for (let i = 0; i < array.length; i++) {
            var ele = array[i].value;
            if(ele == ''){
                y.innerHTML = `<span class='logo error'>!</span>${array[i].placeholder} is empty <span class='closebtn'>&times;</span>`;
                e.preventDefault();
                break;
            }else {
                e.returnValue = true;
            }
        }
        close_alert();
        display_error();
    }
}


function display_error() {
    document.querySelector('div.alert').style.display = "block";
    // validation_form();
    for (var i = 0; i < document.getElementsByClassName("closebtn").length; i++) {
        document.getElementsByClassName("closebtn")[i].parentElement.style.opacity = "1";
    }
}
// Loop through all close buttons
function validation_form(php) {
    const a_in = document.getElementById("username"); //username
    const b_in = document.getElementById("email"); //Email
    const c_in = document.getElementById("c_email"); // Confirm Email
    const e_in = document.getElementById("c_password"); // Confirm Password
    const d_in = document.getElementById("password"); // Password
    const f_in = document.getElementById("dob"); // Date of Birth
    const y = document.querySelector("div.alert");
    var date = new Date();
    var $date_year = date.getFullYear() - 13;
    if (a_in.value == "") {
        y.innerHTML = `<span class='logo error'>!</span>${a_in.placeholder} is empty <span class='closebtn'>&times;</span>`;
        close_alert();
        return false;  
    }

    if (a_in.value.indexOf(' ') == -1 ) {
        y.innerHTML = `<span class='logo error'>!</span>${a_in.placeholder} should contain lastname <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;
    } 

    if (a_in.value.split(' ')[1] == '') {
        y.innerHTML = `<span class='logo error'>!</span>${a_in.placeholder} should contain lastname <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;  
    }
 
    if(b_in.value == ''){
        y.innerHTML = `<span class='logo error'>!</span>${b_in.placeholder} is empty <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;  
    }

    if (c_in.value == '') {
        y.innerHTML = `<span class='logo error'>!</span>${c_in.placeholder} is empty <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;  
    } 

    if (b_in.value !== c_in.value) {
        y.innerHTML = `<span class='logo error'>!</span>${b_in.placeholder} is not matching with ${c_in.placeholder} <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;
    }
    
    if (d_in.value == '') {
        y.innerHTML = `<span class='logo error'>!</span>${d_in.placeholder} is empty <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;
    }

    if (d_in.value.length < 8) {
        y.innerHTML = `<span class='logo error'>!</span>${d_in.placeholder} is too short <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;
    }
    if (d_in.value !== e_in.value) {
        y.innerHTML = `<span class='logo error'>!</span>${d_in.placeholder} is not matching with ${e_in.placeholder} <span class='closebtn'>&times;</span>`;
        close_alert()
        return false;
    }

    if (f_in.value == '') {
        y.innerHTML = `<span class='logo error'>!</span>${f_in.placeholder} is empty <span class='closebtn'>&times;</span>`;
        close_alert()
        return false 
    } 

    if (f_in.value == $date_year) {
        y.innerHTML = `<span class='logo error'>!</span> Not Eligible for Childrens <span class='closebtn'>&times;</span>`
        close_alert()
        return false
    }
}

function close_alert() {
    var close = document.getElementsByClassName("closebtn");
    for (var i = 0; i < close.length; i++) {
        // When someone clicks on a close button
        close[i].onclick = function () {

            // Get the parent of <span class="closebtn"> (<div class="alert">)
            var div = this.parentElement;
            // Set the opacity of div to 0 (transparent)
            div.style.opacity = "0";
            // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
            setTimeout(() => { div.style.display = "none"; }, 600);
        };
    }
}
setInterval(alert_timing(), 100);

function alert_timing() {
    return setTimeout(() => {
        var parent = document.getElementsByClassName("closebtn")[0];
        if(parent !== undefined){
            var parent = parent.parentElement;
            parent.style.opacity = '0';
            setTimeout(() => { parent.style.display = "none"; }, 600);
        }
    }, 6000);
}
 
function checking_php($value) {
    if ($value !== ''){
        const y = document.querySelector("div.alert");
        y.innerHTML = `<span class='logo error'>!</span>${$value} <span class='closebtn'>&times;</span>`;
        close_alert();
        display_error();
        $value = '';
    }
}