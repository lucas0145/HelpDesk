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