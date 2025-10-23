document.addEventListener("DOMContentLoaded", () => {

    let matriculaSalva = localStorage.getItem("matricula")
    let senhaSalva = localStorage.getItem("senha")

    if (matriculaSalva != null && senhaSalva != null && matriculaSalva != 'null' && senhaSalva != 'null') {
        window.location = "PHP/login.php?"+matriculaSalva+"%"+senhaSalva
        console.log("Ue nao era pra eu aparece")
    }
    console.log("Tudo carrego")
})