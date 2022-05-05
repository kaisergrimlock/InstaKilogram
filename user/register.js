var fname = document.getElementById('fname')
var lname = document.getElementById('lname')
var password = document.getElementById('password')
var reptpassword = document.getElementById('reptpassword')
var email = document.getElementById('email')
pat = //
console.log("js is working")
function validateForm(){
    let upper = /[A-Z]/
    let lower = /[a-z]/
    let num = /[0-9]/
    if(password.value.length < 8 || password.value.length > 20){
        alert('please enter password between 8 and 20')
    }

    if(upper.test(password.value) != true){
        alert('please use at least one upper case')
    }

    if (lower.test(password.value) != true){
        alert('please use at least one lower case')
    }

// function validateForm(){
//     let upper = /[A-Z]/
//     let lower = /[a-z]/
//     let num = /[0-9]/
//     if(password.value.length < 8 || password.value.length > 20){
//         alert('please enter password between 8 and 20')
//     }

//     if(upper.test(password.value) != true){
//         alert('please use at least one upper case')
//     }

//     if (lower.test(password.value) != true){
//         alert('please use at least one lower case')
//     }

//     if (password.value != retype.value){
//         alert('please retype the same password')
//     }  
    
//     if (isSpace(password.value) == true){
//         alert('please do not use space')
//     }

//     if(num.test(password.value) != true)
//     {
//         alert('please use at least one number')
//     }

//     if(!isSpace)
//     {
//         alert('please do not use space')
//     }
// }

// function isSpace(str) {
//     var test = 0
//     for (let i=0; i < str.length; i++)
//     {
//         let character = str.charAt(i)
//         if (character === ' ')
//         {
//             return true
//         }
//         else{
//             return false;
//         }
//     }
}