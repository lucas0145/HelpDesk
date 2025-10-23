
let secWel = document.getElementById("sec-welcome")
let secHist = document.getElementById("sec-histo")

//Função para fazer aparecer a lista de chamado
function histFnc(a) {
    
    secWel.style.display = "none"
    secHist.style.display = "block"
    document.body.style.overflowY = "auto"
    
}

//Formataçao do textarea
function formatTxt(a) {
    a.value = a.value.slice(0, 500)
}

//Função do input sortBy
function sortFnc() {
    window.location = "../PHP/sort.php?" + document.getElementById("sortSelect").value
    localStorage.setItem("selectedOpt", document.getElementById("sortSelect").value)
}

//Funçao para limpar o auto login
function sairFnc() {
    localStorage.setItem("matricula", null)
    localStorage.setItem("senha", null)
}

document.addEventListener("DOMContentLoaded", () => {

    console.log(localStorage.getItem("selectedOpt"))

    if (localStorage.getItem("selectedOpt") != "") {
        document.getElementById("sortSelect").value = localStorage.getItem("selectedOpt")
    } else{
        document.getElementById("sortSelect").value = ""
    }
})