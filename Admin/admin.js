
let secWel = document.getElementById("sec-welcome")
let secHist = document.getElementById("sec-histo")

function histFnc(a) {
    
    secWel.style.display = "none"
    secCha.style.display = "none"
    secHist.style.display = "block"
    document.body.style.overflowY = "auto"
    
}

function formatTxt(a) {
    a.value = a.value.slice(0, 500)
}

function sortFnc() {
    window.location = "../PHP/sort.php?" + document.getElementById("sortSelect").value
    localStorage.setItem("selectedOpt", document.getElementById("sortSelect").value)
}

document.addEventListener("DOMContentLoaded", () => {

    console.log(localStorage.getItem("selectedOpt"))

    if (localStorage.getItem("selectedOpt") != "") {
        document.getElementById("sortSelect").value = localStorage.getItem("selectedOpt")
    } else{
        document.getElementById("sortSelect").value = ""
    }
})