
let login = window.location.href.split('?')

for (let index = 0; index < login.length; index++) {
    const element = login[index];

    if (element == "MR") {

        window.alert("Matricula Repitida!")
    }
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
function formatRamal(a) {

    a.value = a.value.slice(0,4)

        if (Number.isNaN(parseInt(a.value)) == true && a.value != "") {

        window.alert("Ramal apenas numerico!")
        a.value = ""
    }
}
