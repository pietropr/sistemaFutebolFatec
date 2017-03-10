<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Capitão</title>
    <link href="../estilos/bootstrap.css" rel="stylesheet">
    <link href="../estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
    	<div class="alert-required alert alert-info" role="alert">Campos marcados com * são obrigatórios!</div>
        <div class="form-box panel panel-default">
            <div class="form-titulo panel-heading">
                <h3 class="panel-title">Cadastro de Capitão</h3>
            </div>
            <div class="form-body panel-body">
            	<form method="post" action="processarCadastro.php" id="capCadastro">
                	<div class="form-fields-left">
                        <label>
                            <p>*Nome completo:<i></i></p>
                            <input type="text" class="form-control" name="nome" maxlength="150">
                        </label>
                        <label>
                            <p>*Login:<i></i></p>
                            <input type="text" class="form-control" name="login" maxlength="25">
                        </label>
                        <label>
                         	<p>*R.A:<i></i></p>
                            <input type="text" class="form-control" name="ra" maxlength="13">
                        </label>
                        <label>
                         	<p>*E-mail:<i></i></p>
                            <input type="mail" class="form-control" name="email" maxlength="200">
                        </label>
                    </div>
                    <div class="form-fields-right">
                        <label>
                            <p>*Senha:<i></i></p>
                            <input type="password" class="form-control senha" name="senha" id="senha" maxlength="150">
                        </label>
                        <label>
                            <p>*Redigite a senha:<i></i></p>
                            <input type="password" class="form-control repete" name="confirmaSenha" 
                            	   id="confirmaSenha" maxlength="150">
                        </label>
                         <label>
                            <p>*Posição do jogador:</p>
                            <select name="posicao" class="form-control">
                                <option value="">Selecione a posição...</option>
                                <option value="Marcador">Marcador</option>
                                <option value="Passador">Passador</option>
                                <option value="Armador">Armador</option>
                                <option value="Finalizador">Finalizador</option>
                                <option value="Goleiro">Goleiro</option>
                                <option value="Fixo">Fixo</option>
                                <option value="Ala Direito<">Ala Direito</option>
                                <option value="Ala Esquerdo">Ala Esquerdo</option>
                                <option value="Pivô">Pivô</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-button btn-group" role="group" aria-label="...">
                        <a class="button-voltar btn btn-default" href="../index.php">Voltar</a>
                        <input type="submit" class="button-salvar btn btn-default" value="Salvar" name="salvar"/>
                        <input type="reset" class="button-cancelar btn btn-default" value="Cancelar"/>
                    </div>
                </form>
            </div>
        </div>
    </center>
    <script src="../javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../javaScript/jquery-validation-1.15.0/dist/jquery.validate.js" 
			type="text/javascript"charset="utf-8"></script>
    <script type="text/javascript">
        $().ready(function() {
            $("#capCadastro").validate({
                rules: {
                    nome: "required",
                    login: {
                        required: true,
                        minlength: 6
                    },
                    ra: {
                        required: true,
                        maxlength: 13,
                        minlength: 13
                    },
					email: {
						required: true,
						email: true
					},
                    senha: {
                        required: true,
                        minlength: 6
                    },
                    confirmaSenha: {
                        required: true,
                        minlength: 6,
                        equalTo: "#senha"
                    },
					posicao: "required"
                },
                messages: {
                    nome: "Este campo é obrigatório!",
                    login: {
                        required: "Este campo é obrigatório!",
                        minlength: "Insíra pelo menos 6 caracteres!"
                    },
                    ra: {
                        required: "Este campo é obrigatório!",
                        maxlength: "RA inválido!",
                        minlength: "RA invalido!"
                    },
					email: {
						required: "Este campo é obrigatório!",
						email: "Este campo deve conter o formato de E-mail!"
					},
                    senha: {
                        required: "Este campo é obrigatório!",
                        minlength: "Insíra pelo menos 6 caracteres!"
                    },
                    confirmaSenha: {
                        required: "Este campo é obrigatório!",
                        minlength: "Insíra pelo menos 6 caracteres!",
                        equalTo: "As senhas não correspondem!"
                    },
					posicao: "Este campo é obrigatório!"
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

                    if( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    }else{
                        error.insertAfter( element );
                    }
                },
            })
        })
		
		jQuery(function($) {
            $(document).ready(function(){
                $('input.repete').blur(function() {
                    if($('input.senha').val() != $('input.repete').val()) {
                            $('b').html("Senha não confere!");

                    } else {
                        $('b').html(' ');
                    }
                })
            });
        });      
    </script>
</body>
</html>
