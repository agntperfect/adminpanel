function signup() {
    document.querySelector(".login-form-container").style.cssText = "display: none;";
    document.querySelector(".signup-form-container").style.cssText = "display: block;";
    document.querySelector(".container").style.cssText = "background: linear-gradient(to bottom, rgb(56, 189, 149),  rgb(28, 139, 106));";
    document.querySelector(".button-1").style.cssText = "display: none";
    document.querySelector(".button-2").style.cssText = "display: block";

};

function login() {
    document.querySelector(".signup-form-container").style.cssText = "display: none;";
    document.querySelector(".login-form-container").style.cssText = "display: block;";
    document.querySelector(".container").style.cssText = "background: linear-gradient(to bottom, rgb(6, 108, 224),  rgb(14, 48, 122));";
    document.querySelector(".button-2").style.cssText = "display: none";
    document.querySelector(".button-1").style.cssText = "display: block";
}
function openNav() {
    document.getElementById("navbar").style.width = "250px";
    document.getElementById("head").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of .the page content to 0 */
function closeNav() {
    document.getElementById("navbar").style.width = "0";
    document.getElementById("head").style.marginLeft = "0";
}

function $(a) {
    if (typeof (a) != 'string') {
        console.error('Property Value Invalid: Must be string')
    }

    return document.querySelectorAll(a);
}


async function fetchDataAsync(url) {
    const response = await fetch(url);
    var json_obj = await response.json();
    for (var i = 0; i < json_obj.data.length; i++) {
        var id = json_obj.data[i].ID;
        var username = json_obj.data[i].Username;
        var email = json_obj.data[i].Email;
        var user_mode = json_obj.data[i].user_mode;
        var status = json_obj.data[i].status;
        console.log(id, username, status, i);
        document.querySelectorAll('tr')[id].innerHTML += `<td>${status}</td>`;
    }
}
console.log('Hello Admin! Welcome to Admin web panel');
console.log('This project was done by Abhishek Kharel (Sys69Autocrat$)');
console.log('In upcoming future this website will be developed with the help of python and node.js');
console.log('Please download the extension ');
console.log('Note: Extension is the key of Admin panel');

function insertItem() {
    // if(document.querySelectorAll('#file').length == 1){
    //     return true;
    // } else {
    //     return false
    //     console.log('%c Error: Invalid File. (No Image data)', 'color: red; background-color: black; font-weight: 100; font-size: 15px;');
    // }
    if (document.querySelectorAll('.ins')[0].value != '') {
        if (document.querySelectorAll('.ins')[1].value != '') {
            if (document.querySelectorAll('.ins')[2].value != '') {
                if (document.querySelectorAll('.ins')[3].value != '') {
                    if (document.querySelectorAll('#price')[0].value != '') {

                        document.getElementsByClassName('center-div')[1].style.display = 'block';

                    }
                }
            }
        }
    }
}
if (window.location.pathname == "/adminpanel/index.php") {
    window.onclick = () => {
        document.getElementById('pie-open').onclick = () => {
            if (document.getElementsByClassName('center-div')[0].style.display == 'none') {
                document.getElementsByClassName('center-div')[0].style.display = 'block';
                document.getElementsByClassName('pie-open')[0].innerHTML = 'Close Pie Chart';
                document.getElementsByClassName('row')[0].style.cssText = 'filter: blur(3px);';
            } else {
                document.getElementsByClassName('center-div')[0].style.display = 'none';
                document.getElementsByClassName('pie-open')[0].innerHTML = 'Open Pie Chart';
                document.getElementsByClassName('row')[0].style.cssText = 'filter: blur(0px);';
            }
        }
    }
}

const xhr = new XMLHttpRequest();

function dash() {
    document.cookie = "click=dashboard";
    document.getElementsByClassName("dashboard")[0].style.display = 'block';
    document.getElementsByClassName('client')[0].style.display = 'none';
    document.getElementsByClassName('insertItem')[0].style.display = 'none';
    document.getElementsByClassName('customer')[0].style.display = 'none';
    document.getElementsByClassName('setting')[0].style.display = 'none';
    var array = document.getElementsByClassName("navbar-btn");
    var x = $('.dropdown-content');
    for (let i = 0; i < x.length; i++) {
        document.getElementsByClassName('dropdown-content')[i].style.display = 'none';
    }
    for (let i = 0; i < array.length; i++) {
        document.getElementsByClassName('navbar-btn')[i].style.cssText = 'background-color: white; color: black';
        document.getElementsByClassName('navbar-btn')[0].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
    }
}


function client() {
    document.cookie = "click=client";
    document.getElementsByClassName('insertItem')[0].style.display = 'none';
    document.getElementsByClassName("dashboard")[0].style.display = 'none';
    document.getElementsByClassName('client')[0].style.display = 'block';
    document.getElementsByClassName('customer')[0].style.display = 'none';
    document.getElementsByClassName('setting')[0].style.display = 'none';
    var array = document.getElementsByClassName("navbar-btn");
    var x = $('.dropdown-content');
    for (let i = 0; i < x.length; i++) {
        document.getElementsByClassName('dropdown-content')[i].style.display = 'none';
    }
    for (let i = 0; i < array.length; i++) {
        document.getElementsByClassName('navbar-btn')[i].style.cssText = 'background-color: white; color: black';
        document.getElementsByClassName('navbar-btn')[1].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
    }
}


function customer() {
    document.cookie = "click=customer";
    document.getElementsByClassName('client')[0].style.display = 'none';
    document.getElementsByClassName('insertItem')[0].style.display = 'none';
    document.getElementsByClassName("dashboard")[0].style.display = 'none';
    document.getElementsByClassName('customer')[0].style.display = 'block';
    document.getElementsByClassName('setting')[0].style.display = 'none';
    document.getElementsByClassName('drop-insertItem')[0].style.display = 'none';
    document.getElementsByClassName('drop-customer')[0].style.display = 'block';
    var array = document.getElementsByClassName("navbar-btn");
    var x = $('.dropdown-content');
    for (let i = 0; i < array.length; i++) {
        document.getElementsByClassName('navbar-btn')[i].style.cssText = 'background-color: white; color: black';
        document.getElementsByClassName('navbar-btn')[2].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
        document.getElementsByClassName('drop-customer')[0].style.display = 'block';

    }
}


function list() {
    document.cookie = "click=orderlist";
    document.getElementsByClassName('insertItem')[0].style.display = 'none';
    document.getElementsByClassName("dashboard")[0].style.display = 'none';
    document.getElementsByClassName('client')[0].style.display = 'none';
    document.getElementsByClassName('customer')[0].style.display = 'none';
    document.getElementsByClassName('setting')[0].style.display = 'none';
    var array = document.getElementsByClassName("navbar-btn");
    var x = $('.dropdown-content');
    for (let i = 0; i < x.length; i++) {
        document.getElementsByClassName('dropdown-content')[i].style.display = 'none';
    }
    for (let i = 0; i < array.length; i++) {
        document.getElementsByClassName('navbar-btn')[i].style.cssText = 'background-color: white; color: black';
        document.getElementsByClassName('navbar-btn')[3].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a );'
    }
}


function setting() {
    document.cookie = "click=setting";
    document.getElementsByClassName('insertItem')[0].style.display = 'none';
    document.getElementsByClassName("dashboard")[0].style.display = 'none';
    document.getElementsByClassName('customer')[0].style.display = 'none';
    document.getElementsByClassName('client')[0].style.display = 'none';
    document.getElementsByClassName('setting')[0].style.display = 'block';
    var array = document.getElementsByClassName("navbar-btn");
    var x = $('.dropdown-content');
    for (let i = 0; i < x.length; i++) {
        document.getElementsByClassName('dropdown-content')[i].style.display = 'none';
    }

    for (let i = 0; i < array.length; i++) {
        document.getElementsByClassName('navbar-btn')[i].style.cssText = 'background-color: white; color: black';
        document.getElementsByClassName('navbar-btn')[5].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';

    }
}

function ins() {
    document.cookie = "click=insertItem";
    var x = document.cookie.split(";")
    document.getElementsByClassName('setting')[0].style.display = 'none';
    document.getElementsByClassName('insertItem')[0].style.display = 'block';
    document.getElementsByClassName("dashboard")[0].style.display = 'none';
    document.getElementsByClassName('client')[0].style.display = 'none';
    document.getElementsByClassName('drop-customer')[0].style.display = 'none';
    document.getElementsByClassName('drop-insertItem')[0].style.display = 'block';

    var array = document.getElementsByClassName("navbar-btn");
    for (let i = 0; i < array.length; i++) {
        document.getElementsByClassName('navbar-btn')[i].style.cssText = 'background-color: white; color: black';
        document.getElementsByClassName('navbar-btn')[4].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
    }
}

if (window.location.pathname == "/adminpanel/index.php") {
    window.onload = () => {
        var z = $('.navbar-btn');
        for (let i = 0; i < z.length; i++) {
            z[i].disabled = true;
        }
        setTimeout(() => {
            for (let i = 0; i < z.length; i++) {
                z[i].disabled = false;
            }
            $(".Welcome-page")[0].remove();
            all_in_one();
        }, 2000)
    }
}
function all_in_one() {
    switch (document.cookie.split(';')[0]) {
        case "click=dashboard":
            document.getElementsByClassName("dashboard")[0].style.display = 'block';
            document.getElementById('navbar-home').click();
            document.getElementsByClassName('navbar-btn')[0].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
            break;
        case "click=client":
            document.getElementsByClassName("dashboard")[0].style.display = 'none';
            // document.getElementsByClassName('navbar-btn')[1].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
            document.getElementById('navbar-client').click();
            break;
        case "click=customer":
            document.getElementsByClassName("dashboard")[0].style.display = 'none';
            // document.getElementsByClassName('navbar-btn')[2].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
            document.getElementById('navbar-customer').click();
            break;
        case "click=orderlist":
            document.getElementsByClassName("dashboard")[0].style.display = 'none';
            // document.getElementsByClassName('navbar-btn')[3].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
            document.getElementById('navbar-order').click();
            break;
        case "click=insertItem":
            document.getElementsByClassName("dashboard")[0].style.display = 'none';
            // document.getElementsByClassName('navbar-btn')[4].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
            document.getElementById('navbar-insert').click();
            break;
        case "click=setting":
            document.getElementsByClassName("dashboard")[0].style.display = 'none';
            // document.getElementsByClassName('navbar-btn')[5].style.cssText = 'background: linear-gradient(45deg , #066ce0 ,  #0e307a ); color: white;';
            document.getElementById('navbar-setting').click();
            break;
        default:
            document.getElementsByClassName("dashboard")[0].style.display = 'block';
            break;
    }
}

function maint() {
    var checkbox = document.getElementsByClassName("checkbox")[0];
    if (checkbox.checked == true) {
        console.log("CHECKED!");
        xhr.open("POST", "api/v1/api.php?maintenance=true");
        xhr.send();
    } else {
        console.log("NOT CHECKED!")
        xhr.open("POST", "api/v1/api.php?maintenance=false");
        xhr.send();
    }
}

function vMaint() {
    var url1 = 'http://localhost/adminpanel/api/v1/api';
    let request = new XMLHttpRequest();
    request.open('GET', url1);
    request.responseType = 'json';
    request.onload = () => {
        var x = document.getElementById("chkbx");
        // console.log(request.response.maintance); 
        if (request.response.maintance == false) {
            x.checked = false;
        } else {
            x.checked = true;
        }
    }
    request.send();
}
if (window.location.pathname == "/adminpanel/login.php") {
    window.onload = () => {
        if (document.getElementsByClassName("alert")[0].innerText == "") {
            document.getElementsByClassName("alert")[0].style.display = "none";
        } else {
            document.getElementsByClassName("alert")[0].style.display = "block";
        }
        setTimeout(() => {
            if (document.getElementsByClassName("alert")[0].style.display == "block") {
                document.getElementsByClassName("alert")[0].style.display = "none";
            }
        }, 5000);
    }
}