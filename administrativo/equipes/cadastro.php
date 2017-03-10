<?php
	//Chamada para os arquivos de configurações do sistema.
	include("../../settings/connection.php");
	include("../../settings/restricted.php");
	
	//Recupera o login do usuário a partir da sessão.
	$login = $_SESSION['usuarioSession'];
	
	//Instrução para busca do capitão direto no banco de dados.
	$instrucao = "SELECT codigoUsuario, nome 
				  FROM usuario 
				  WHERE tipo = 'Capitão' 
				  AND login = '$login'
				  AND situacao = 1;";
	
	//Atribui a instrução a um objeto de consulta SQL.
	$consultaUsuario = $conn -> query($instrucao);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Cadastro de Equipe</title>
    <link href="../../estilos/bootstrap.css" rel="stylesheet">
    <link href="../../estilos/principal.css" rel="stylesheet">
</hedd>
<body>
	<center>
    	<div class="alert-required alert alert-info" role="alert">Campos marcados com * são obrigatórios!</div>
        <div class="form-box panel panel-default">
            <div class="form-titulo panel-heading">
                <h3 class="panel-title">Cadastro de Equipe</h3>
            </div>
            <div class="form-body panel-body">
            	<form enctype="multipart/form-data" method="post" action="processarCadastro.php" id="equipeCadastro">
                	<div class="form-fields-left">
                        <label>
                            <p>*Nome:</p>
                            <input type="text" class="form-control" name="nome" maxlength="150">
                        </label>
                        <label>
                            <p>*Curso:</p>
                            <select name="curso" class="form-control">
                            	<option value="">Selecione o curso...</option>
                                <option value="Agronegócio">Agronegócio</option>
                                <option value="Análise e Desenvolvimento de Sistemas">
                                	Análise e Desenvolvimento de Sistemas
                                </option>
                                <option value="Gestão Empresarial - EAD">Gestão Empresarial - EAD</option>
                                <option value="Logistica">Logística</option>
                                <option value="Produção Industrial">Produção Industrial</option>
                                <option value="Radiologia">Radiologia</option>
                            </select>
                        </label>
                        <label>
                            <p>*Período:</p>
                            <select name="periodo" class="form-control">
                            	<option value="">Selecione o período...</option>
                            	<option value="Matutino">Matutino</option>
                                <option value="Vespertino">Vespertino</option>
                                <option value="Noturno">Noturno</option>
                            </select>
                        </label>
                         <label>
                            <p>*Ciclo:</p>
                            <select name="ciclo" class="form-control">
                                <option value="">Selecione o ciclo...</option>
                                <option value="Primeiro">Primeiro</option>
                                <option value="Segundo">Segundo</option>
                                <option value="Terceiro">Terceiro</option>
                                <option value="Quarto">Quarto</option>
                                <option value="Quinto">Quinto</option>
                                <option value="Sexto">Sexto</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-fields-right">
                        <label>
                            <p>*Capitão:</p>
                            <select name="capitao" class="form-control">
                                <?php
									//Roda um laço de repetição exibindo os resultados em uma matriz.
                        			while($exibe = $consultaUsuario -> fetch(PDO::FETCH_ASSOC)){
								?>
                                	<option value="<?php echo($exibe['codigoUsuario']); ?>">
                                    	<?php echo($exibe['nome']); ?>
                                    </option>
                                <?php
									}
								?>
                            </select>
                        </label>
                        <label>
                            <p>*Modalidade:</p>
                            <select name="modalidade" class="form-control">
                            	<option value="">Selecione a modalidade...</option>
                            	<option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </label>
                         <label>
                            <p>Foto:</p>
                            <input type="file" name="foto" id="foto" class="">
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
            $("#equipeCadastro").validate({
                rules: {
                    nome: "required",
                    ciclo: "required",
                    curso: "required",
                    periodo: "required",
                    modalidade: "required"
                },
                messages: {
                    nome: "Este campo é obrigatório!",
                    ciclo: "Este campo é obrigatório!",
                    curso: "Este campo é obrigatório!",
                    periodo: "Este campo é obrigatório!",
                    modalidade: "Este campo é obrigatório!"
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
