<?php
	//Chama para o arquivo de configuração do sistema.
	include("../../settings/restricted.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Administrador</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
    	<div class="alert-required alert alert-info" role="alert">Campos marcados com * são obrigatórios!</div>
        <div class="form-box panel panel-default">
            <div class="form-titulo panel-heading">
                <h3 class="panel-title">Cadastro de Administrador</h3>
            </div>
            <div class="form-body panel-body">
            	<form method="post" action="processarCadastro.php" id="adminCadastro">
                	<div class="form-fields-left">
                        <label>
                            <p>Nome:</p>
                            <input type="text" class="form-control" name="nome" maxlength="150">
                        </label>
                        <label>
                            <p>*Login:</p>
                            <input type="text" class="form-control" name="login" maxlength="25">
                        </label>
                    </div>
                    <div class="form-fields-right">
                        <label>
                            <p>*Senha:</p>
                            <input type="password" class="form-control" name="senha" id="senha" maxlength="150">
                        </label>
                        <label>
                            <p>*Redigite a senha:</p>
                            <input type="password" class="form-control" name="confirmaSenha" maxlength="150">
                        </label>
                    </div>
                    <div class="form-button btn-group" role="group" aria-label="...">
                        <a class="button-voltar btn btn-default" href="../menu.php">Voltar</a>
                        <input type="submit" class="button-salvar btn btn-default" value="Salvar"/>
                        <input type="reset" class="button-cancelar btn btn-default" value="Cancelar"/>
                    </div>
                </form>
            </div>
        </div>
    </center>
    <script src="../../javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../../javaScript/jquery-validation-1.15.0/dist/jquery.validate.js" type="text/javascript"
			charset="utf-8"></script>
    <script type="text/javascript">
        $().ready(function() {
            $("#adminCadastro").validate({
                rules: {
                    nome: "required",
                    login: {
                        required: true,
                        minlength: 6
                    },
                    senha: {
                        required: true,
                        minlength: 6
                    },
                    confirmaSenha: {
                        required: true,
                        minlength: 6,
                        equalTo: "#senha"
                    }
                },
                messages: {
                    nome: "Este campo é obrigatório!",
                    login: {
                        required: "Este campo é obrigatório!",
                        minlength: "Insíra pelo menos 6 caracteres!"
                    },
					senha: {
                        required: "Este campo é obrigatório!",
                        minlength: "Insíra pelo menos 6 caracteres!"
                    },
                    confirmaSenha: {
                        required: "Este campo é obrigatório!",
                        minlength: "Insíra pelo menos 6 caracteres!",
                        equalTo: "As senhas não correspondem!"
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( "input" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( "input" ).addClass( "has-success" ).removeClass( "has-error" );
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {

                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
            })
        })
     </script>
</body>
</html>
