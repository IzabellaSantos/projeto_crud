function cadastro(email, senha, nome) {

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../backend/integration/login.php',
        async: false,
        data: {
            "nome": nome,
            "email": email,
            "senha": senha,
            "cadastro": "true"
        },
        success: function (response) {
            if (response == "Email cadastrado com sucesso!") {
                $(".wait").show();

                setTimeout(function () {
                    window.location.replace("index.html")
                }, 3000)

            } else {
                toastr.error(response)
            }

        }
    })
}

function verificaDadosCadastro() {
    var nome = document.getElementById("name").value
    var email = document.getElementById("email").value
    var senha = document.getElementById("senha").value

    var tamanho = senha.length

    if (tamanho > 9) {
        toastr.warning("Senha muito longa!")
    } else if (tamanho < 5) {
        toastr.warning("Senha muito curta!")
    } else if (senha.search("@") == -1 && senha.search("#") == -1 && senha.search("%") == -1 && senha.search("_") == -1) {
        toastr.warning("Falta de caracteres especiais na senha")
    } else {
        cadastro(email, senha, nome)
    }
}

function acesso() {
    var email = document.getElementById("email").value
    var senha = document.getElementById("senha").value

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '../backend/integration/login.php',
        async: false,
        data: {
            "email": email,
            "senha": senha,
            "login": "true"
        },
        success: function (response) {
            if (response == "Pode acessar") {
                $(".wait").show();

                setTimeout(function () {
                    window.location.replace("homepage/inicio.html")
                }, 3000)

            } else {
                toastr.error(response)
            }

        }
    })
}

function esqueceuSenha() {
    var senha = document.getElementById("senha").value
}