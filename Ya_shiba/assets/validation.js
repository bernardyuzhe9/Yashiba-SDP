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
    var pattern = /^(01)[0-9]{1}[0-9]{7,8}$/;

    if(!phone.match(pattern)){
        phoneError.innerHTML="Phone number is not match";
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
    var codeFormat = /^[A-Za-z]{4}\d{4}$/;
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

//ADD SCHOOL ACCOUNT  
var schIDError = document.getElementById("sch_ID_ER");
var schNameError = document.getElementById("sch_name_ER");
var schAddressError = document.getElementById("sch_address_ER");
var schPicError = document.getElementById("sch_pic_ER");
var schContactError = document.getElementById("sch_contact_ER");
var schBtnError = document.getElementById("sch_btn_ER");


function validateSchID(){
    var schoolID= document.getElementById("sch_ID").value;
    var schoolIDFormat= /^SCKL\d{3}$/
    if(schoolID.match(" ")){
        schIDError.innerHTML="No space is required";
        return false;}

    if (!schoolID.match(schoolIDFormat)){
        schIDError.innerHTML="Invalid School ID!";
        return valid;}
    else{
        schIDError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;    
        /* 
            School ID can only have: 
            -SCKL
            - 3 Numbers (0-9)
        */
       
    }
}


function validateSchName(){
    var schoolName= document.getElementById("sch_name").value;
    if(schoolName.length==0){
        schNameError.innerHTML="School Name is required";
        return false;
        /* to set or return the HTML constent of an element.*/
    }
    
    else{
        schNameError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    }
}

function validateSchAddress(){
    var schoolAddress= document.getElementById("sch_address").value;
    var schoolAddressFormat= /^[a-zA-Z0-9(),./\s-]+$/
    if(schoolAddress.length===0){
        schAddressError.innerHTML="School Address is required";
        return false;}

    if (!schoolAddress.match(schoolAddressFormat)){
        schAddressError.innerHTML="Invalid School Address!";
        return valid;}
    else{
        schAddressError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;    
        /* 
            School Address can only have: 
            - Letters (A-Z a-z)
            - Numbers (0-9)
            - Special characters (, . ())
        */
       
    }
}

function validateSchPic(){
    var schoolPic= document.getElementById("sch_pic").value;
    if(schoolPic.length==0){
        schPicError.innerHTML="Person-In-Charge's Name is required";
        return false;
        /* to set or return the HTML constent of an element.*/
    }

    else{
        schPicError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    }
}

function validateSchContact(){
    var schoolContact= document.getElementById("sch_contact").value;

    if(schoolContact.length==0){
        schContactError.innerHTML="School Contact Number is required";
        return false;
        /* to set or return the HTML content of an element.*/
    }

    if(isNaN(schoolContact)){
        schContactError.innerHTML="Only write digit not character";
        return false;
    }
    if(schoolContact.length!=10){
        schContactError.innerHTML="Contact number only can be 10 digits";
        return false;
    }
    else{
        schContactError.innerHTML="<img src=\"img/checkcircle.png\"width=\"20px\" height=\"20px\" >";
        return true;
    }
}

function validateSchBtnForm(){
    if(!validateSchID()||!validateSchName()|| !validateSchAddress()||!validateSchPic()|| !validateSchContact()){
        schBtnError.innerHTML="Please fix the error to submit";
        schBtnError.style.display="block";
        setTimeout(function(){schBtnError.style.display="none"},1000)
        return false;
    }
}
function validateUForm(){
    if(!validateRUsername()||!validateREmail()||!validateRPhone()|| !validatePassword1()){
        usersubmitError.innerHTML="Please fix the error to submit";
        usersubmitError.style.display="block";
        setTimeout(function(){usersubmitError.style.display="none"},1000)
        return false;
    }
    else{
        usersubmitError.innerHTML="YOU ARE RIGHT";
        return true;
    }
}