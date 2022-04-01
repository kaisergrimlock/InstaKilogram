var fname = document.getElementById('fname')
var lname = document.getElementById('lname')
var password = document.getElementById('password')
var retype = document.getElementById('retype-password')
var email = document.getElementById('email')

function validateForm(){
    if(password.value.length < 8 || password.value.length > 20){
        alert('please enter password between 8 and 20')
    }

    if (isUpper(password.value) != true){
        alert('please use at least one upper case')
    }

    if (isLower(password.value) != true){
        alert('please use at least one lower case')
    }

    if (password.value != retype.value){
        alert('please retype the same password')
    }  
    
    if (isLower(password.value) == true){
        alert('please do not use space')
    }
}

function isUpper(str) {
    var i = 0
    for (let i=0; i < str.length; i++)
    {
        let character = str.charAt(i)
        if (character === character.toUpperCase())
        {
            return true
        }
    }
}

function isLower(str) {
    var test = 0
    for (let i=0; i < str.length; i++)
    {
        let character = str.charAt(i)
        if (character === character.toLowerCase())
        {
            return true
        }
    }
}

function isSpace(str) {
    var test = 0
    for (let i=0; i < str.length; i++)
    {
        let character = str.charAt(i)
        if (character === ' ')
        {
            return true
        }
    }
}