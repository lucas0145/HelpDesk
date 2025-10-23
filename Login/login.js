
//Pega informaçao guardada na url
let login = window.location.href[window.location.href.length - 1]

//Verifica se o login anterior deu errado
if (login == 0) {
    window.alert("Usuario ou senha invalida!")
}

//Formata o campo input de matricula
function formatMat(a) {

    a.value = a.value.slice(0,3)

    if (a.value > 700) {
        window.alert("Matricula Invalida!")
        a.value = ""
    }

    if (Number.isNaN(parseInt(a.value)) == true && a.value != "") {

        window.alert("Matricula apenas numerica!")
        a.value = ""
    }
}

//Formata para maximo de 45 caracteres
function formatMax45(a) {

    a.value = a.value.slice(0,45)
}

//Funçao para mensagem de recuperaçao de senha
function recSenha() {
    window.alert("Caso tenha esquecido a senha contate o suporte!")
}

//Funçao para salvar login no localstorage
function salvaLogin() {
    localStorage.setItem("matricula", document.getElementById("inpMatricula").value)
    localStorage.setItem("senha", document.getElementById("inpSenha").value)
    console.log("salvei as coisa")
}