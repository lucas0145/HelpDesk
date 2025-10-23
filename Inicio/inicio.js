let secWel = document.getElementById("sec-welcome")
let secCha = document.getElementById("sec-chamada")
let secHist = document.getElementById("sec-histo")

//Funçao para trocar a exibiçao da tela
function chaFnc(a) {
        
    secWel.style.display = "none"
    secHist.style.display = "none"
    secCha.style.display = "block"
    document.body.style.overflowY = "hidden"

}

//Funçao para trocar a exibiçao da tela
function histFnc(a) {

    secWel.style.display = "none"
    secCha.style.display = "none"
    secHist.style.display = "block"
    document.body.style.overflowY = "auto"

}

//Funcao para nao da errado na injeçao para o banco de dados
function formatTxt(a) {
    a.value = a.value.slice(0, 500)
}

//Funçao para limpar o auto login
function sairFnc() {
    localStorage.setItem("matricula", null)
    localStorage.setItem("senha", null)
}