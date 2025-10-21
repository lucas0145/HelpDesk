
let login = window.location.href[window.location.href.length - 1]

if (login == 0) {
    window.alert("Usuario ou senha invalida!")
}

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

function formatMax45(a) {

    a.value = a.value.slice(0,45)
}

function recSenha() {
    window.alert("Caso tenha esquecido a senha contate o suporte!")
}