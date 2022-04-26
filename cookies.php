<div id="cookies">
    <div class="alert alert-dismissible alert-light">
        <div class="cookies">
            <p>We use cookies to personalize your experience. By continuing to this website you agree to our use of cookies</p>
            <button id="cookies-btn" type="button" class="btn btn-info">Got it!</button>
            <a href="#">Read our policies</a>
        </div>
    </div>
</div>

<script type="text/javascript">
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

console.log(getCookie())

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
</script>
