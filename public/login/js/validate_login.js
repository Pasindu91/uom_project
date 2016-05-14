// JavaScript Document
function validate(){
    var un=document.getElementById("username");
    var ps=document.getElementById("password");

    if(un.value == "" && ps.value == ""){
        document.getElementById("msg").innerHTML="Both Fields cannot be empty";
        un.focus();
        return false;
    }

    if(un.value == ""){
        document.getElementById("msg").innerHTML="Username Field cannot be empty";
        un.focus();
        return false;
    }

    if(ps.value == ""){
        document.getElementById("msg").innerHTML="Password Field cannot be empty";
        ps.focus();
        return false;
    }

}

