console.log("cookies")

setCookies = (cName, cValue, expdays) => {
    let date = new Date();
    date.setTime(date.getTime() + (expdays * 24 * 60 * 60 * 100))
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + ";" + expires + "; path=/";

}

getCookie = (cName) => {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie);
    const cArr = cDecoded.split("; ");
    let value;
    cArr.forEach(val => {
        if(val.indexOf(name) === 0) value = val.substring(name.length);
    })
    return value;
}

document.querySelector("#cookies-btn").addEventListener("click", () => {
    document.querySelector("#cookies").style.display="none";
    setCookies("cookies",true, 30);
})

cookieMessage = () => {
    if(!getCookie("cookies")){
        document.querySelector("#cookies").style.display = "block";
    }

    if(getCookie("cookies")){
        document.querySelector("#cookies").style.display = "none";
        console.log("none")
    }
}

window.addEventListener("load", cookieMessage);