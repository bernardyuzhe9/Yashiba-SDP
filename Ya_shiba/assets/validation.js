/*REGISTER*/ 
var usernameRError = document.getElementById("usernameR-error");
var nameError = document.getElementById("nameR-error");
var phoneError = document.getElementById("phoneR-error");
var emailError = document.getElementById("emailR-error");
var passwordR1Error = document.getElementById("passwordR1-error");
var passwordR2Error = document.getElementById("passwordR2-error");
var submitError = document.getElementById("submitR-error");
var usersubmitError = document.getElementById("submitC-error");
var classcodeError = document.getElementById("codeC-error");



function validateRUsername(){
    var username= document.getElementById("user_usernameR").value;
    var usernameformat= /^[a-z0-9_\.]+$/
    if(username.match(" ")){
        usernameRError.innerHTML="No space is required";
        return false;}

    if (!username.match(usernameformat)){
        usernameRError.innerHTML="Invalid username";
        return valid;}
    else{
        usernameRError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    
        /* 
          Usernames can only have: 
          - Lowercase Letters (a-z) 
          - Numbers (0-9)
          - Dots (.)
          - Underscores (_)
        */
       
      }}

function validateRName(){
    var name= document.getElementById("user_contact_name").value;
    if(name.length==0){
        nameError.innerHTML="Name is required";
        return false;
        /* to set or return the HTML csontent of an element.*/
    }

    else{
        nameError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    }}

function validateRPhone(){
    var phone= document.getElementById("user_contact_phone").value;

    if(phone.length==0){
        phoneError.innerHTML="Phone number is required";
        return false;
        /* to set or return the HTML content of an element.*/
    }

    if(isNaN(phone)){
        phoneError.innerHTML="User can only write digit not character";
        return false;
    }
    if(phone.length!=10){
        phoneError.innerHTML="Phone number only can be 10 digits";
        return false;
    }
    else{
        phoneError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    }}

function validateREmail(){
    var email= document.getElementById("user_contact_email").value;
    var emailformat= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(email.length==0){
        emailError.innerHTML="Email is required";
        return false;
        /* to set or return the HTML content of an element.*/
    }
    else if(!email.match(emailformat)){
        emailError.innerHTML="Invalid Email";
        return false;
    }
    else{
        emailError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    }}

function validateCode() {
    var code = document.getElementById("codeInput").value;
    var codeFormat = /^[A-Za-z]{3}\d{4}$/;
    if (code.length === 0) {
        classcodeError.innerHTML = "Code is required";
        return false;
    } else if (!code.match(codeFormat)) {
        classcodeError.innerHTML = "Invalid Code";
        return false;
    } else {
        classcodeError.innerHTML = "<img src=\"img/checkcircle.png\" width=\"20px\" height=\"20px\">";
        return true;
    }
    }
      

function validateClassForm(){
    if(!validateCode()){
        usersubmitError.innerHTML="Please fix the error to submit";
        usersubmitError.style.display="block";
        setTimeout(function(){usersubmitError.style.display="none"},1000)
        return false;
    }
}



function validateRForm(){
    if(!validateRUsername()||!validateRName()|| !validateREmail()||!validateRPhone()|| !validatePassword1()||!validatePassword2()){
        submitError.innerHTML="Please fix the error to submit";
        submitError.style.display="block";
        setTimeout(function(){submitError.style.display="none"},1000)
        return false;
    }
}

function validatePassword1() {  
    var pw1 = document.getElementById("user_password1").value;  
    

    if(pw1.length==0) {  
        passwordR1Error.innerHTML = "Fill the password please!";  
       return false;  
    }  
     
   //minimum password length validation  
    if(pw1.length < 8 ) {  
        passwordR1Error.innerHTML = "Password length exceed 8 characters";  
        return false;  
    }  
    
  //maximum length of password validation  
    if(pw1.length > 15) {  
        passwordR1Error.innerHTML = "Password length must not exceed 15 characters";  
       return false;  
    } 
    else{
        passwordR1Error.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
    }  return true;
}
function validatePassword2() {
    var pw1 = document.getElementById("user_password1").value;  
    var pw2 = document.getElementById("user_password2").value;  
    
    if(pw1 != pw2) {  
        passwordR2Error.innerHTML = "Passwords are not same";  
        return false;  
    }
    else{
        passwordR2Error.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;  
    }  
}