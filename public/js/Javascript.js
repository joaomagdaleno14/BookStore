
// when form is submit
$('#FormCadastro').submit(function() {
    // we stoped it
    event.preventDefault();

    var NomeCliente = $('#NomeCliente').val();
    var Sobrenome = $('#Sobrenome').val();
    var CPF = $('#CPF').val();
    var Dt_Nascimento = $('#Dt_Nascimento').val();
    var Telefone = $('#Telefone').val();
    var Email = $('#Email').val();
    var Senha = $('#Senha').val();
    var SenhaConf = $('#SenhaConf').val();
    // needs for recaptacha ready
    grecaptcha.ready(function() {
        // do request for recaptcha token
        console.log(grecaptcha);
        // response is promise with passed token
        grecaptcha.execute('SG.6LfrbK8UAAAAALXauyoYZaGSzSDYMfXKlVzcZatC', {action: 'login'}).then(function(token) {
            // add token to form
            $('#FormCadastro').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                $.post("../controllers/ControllerCadastro.php",{NomeCliente: NomeCliente, Sobrenome:Sobrenome, CPF: CPF, Dt_Nascimento: Dt_Nascimento, Telefone: Telefone, Email: Email, Senha: Senha, SenhaConf: SenhaConf, token: token}, function(result) {
                        console.log(result);
                        if(result.success) {
                                alert('Thank you for the cadastro')
                        } else {
                                alert('You és a bot! Get the F@$%K out of here.')
                        }
                });
        });;
    });
});
