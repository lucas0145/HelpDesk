//Separa as informaçoes na url
let login = window.location.href.split('?')

//Verifica todas as informaçoes no url
for (let index = 0; index < login.length; index++) {
    const element = login[index];

    //Avisa quando a matricula for repitida
    if (element == "MR") {

        window.alert("Matricula Repitida!")
    }
}

//Formata o input de matricula
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

//Formata para maximo 45 caracteres
function formatMax45(a) {

    a.value = a.value.slice(0,45)
}

//Formata o input de ramal
function formatRamal(a) {

    a.value = a.value.slice(0,4)

        if (Number.isNaN(parseInt(a.value)) == true && a.value != "") {

        window.alert("Ramal apenas numerico!")
        a.value = ""
    }
}
