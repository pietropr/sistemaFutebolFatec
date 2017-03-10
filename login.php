<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Autenticação de Usuário</title>
    <link href="estilos/bootstrap.css" rel="stylesheet">
    <link href="estilos/principal.css" rel="stylesheet">
</head>
<body>
	<center>
    	<!-- Inicio Modal -->
        <div class="modal fade" id="contato" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Esqueceu sua senha?</h4>
              </div>
              <div class="modal-body">
              	<p style="color: #8e1511;"><strong>Atenção:</strong> Para receber uma nova senha de acesso ao sistema
                envie um e-mail para <strong>contato@rsgt.com.br</strong> com assunto "Nova Senha" contendo os 
                seguintes itens:
                </p>
                <div align="left">
                	<p>Nome Completo</p>
                    <p>Login</p>
                    <p>Curso</p>
                    <p>Período</p>
                    <p>RA</p>
                </div>
                <hr>
                <p style="color: #8e1511;">
                	A nova senha deverá ser gerada em até 48 horas. Pedimos a sua compreensão.
                    <br/>
                    Os e-mails que estiverem fora do padrão estipulado serão ignorados.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Fim Modal -->
        <div class="login panel panel-default">
            <div class="login-titulo panel-heading">
            	<h3 class="panel-title">Preencha com suas informações de usuário</h3>
            </div>
            <div class="panel-body">
            	<div class="campos-login">
                	<form method="post" action="settings/userAuthent.php">
                        <input type="text" class="form-control" name="login" placeholder="Login">
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                        <input type="submit" class="button-acessar btn btn-default" value="Acessar"/>
                	</form>
                </div>
            </div>
        </div>
        <div><a style="cursor: pointer;" data-toggle="modal" data-target="#contato">Esqueceu sua senha?</a></div>
    </center>
    <script src="javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="javaScript/bootstrap.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>