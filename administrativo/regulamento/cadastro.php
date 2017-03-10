<?php
	//Chama para o arquivo de configuração do sistema.
	include("../../settings/restricted.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Criar Regra</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
    	<div class="alert-required alert alert-info" role="alert">Campos marcados com * são obrigatórios!</div>
        <div class="form-box panel panel-default">
            <div class="form-titulo panel-heading">
                <h3 class="panel-title">Criar Regras</h3>
            </div>
            <div class="form-body panel-body">
            	<form method="post" action="processarCadastro.php" id="regraCadastro">
                	<div class="form-fields-left">
                        <label>
                            <p>*Título da Regra:</p>
                            <input type="text" class="form-control" name="titulo" maxlength="200">
                        </label>
                    </div>
                    <div class="form-fields-right">
                        <label>
                            <p>*Conteúdo:</p>
                            <textarea class="form-control" name="conteudo">
                            </textarea>
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
            $("#regraCadastro").validate({
                rules: {
                    titulo: "required",
					conteudo: "required"
                },
                messages: {
                    titulo: "Este campo é obrigatório!",
               		conteudo: "Este campo é obrigatório!" 
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
