var fname = document.getElementById('fname')
var lname = document.getElementById('lname')
var password = document.getElementById('password')
var retype = document.getElementById('reptpassword')
var email = document.getElementById('email')
let alert_validation = document.getElementById('alert-validation')
function validateForm(){
    let upper = /[A-Z]/
    let lower = /[a-z]/
    let num = /[0-9]/
    let spec = /[ !"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/
    if(password.value.length < 8 || password.value.length > 20){
        alert('Please enter between 8 and 20 characters')
    }

    if(upper.test(password.value) != true){
        alert('Please use at least one uppercase character')
    }

    if (lower.test(password.value) != true){
        alert('Please use at least one lowercase character')
    }

    if (password.value != retype.value){
        alert('Please retype the same password')
    }  
    
    if (isSpace(password.value) == true){
        alert('Please do not use space')
    }

    if(spec.test(password.value) != true){
        alert('Please use at least one special character like @ or !')
    }

    if(num.test(password.value) != true)
    {
        alert('Please enter at least one number')
    }

    if(!isSpace)
    {
        alert('Please do not use space')
    }
}

function isSpace(str) {
    for (let i=0; i < str.length; i++)
    {
        let character = str.charAt(i)
        if (character === ' ')
        {
            return true;
        }
        else{
            return false;
        }
    }
}