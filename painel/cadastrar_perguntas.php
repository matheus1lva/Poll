<?php include '../config/config.php';include_once "../classes/perguntas.php";include_once "../classes/Connection.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="../css/painel.css" />
	<title>Cadastrar Perguntas</title>

</head>
<body>
		<?php include ("menu.php");?>
	<div class="content-fluid conteudo">
		<div class="row">
			<div class="col-md-12">
				<form action="" method="post">
				<legend>Cadastrar Perguntas</legend>
					<label for="">
						<span>Pergunta</span>
						<input type="text" name="pergunta" />
					</label>
					<div id="pergunta-extra"></div>
					<input type="submit" value="Cadastrar" />
					<input type="hidden" name="acao" value="enviar" />
				</form>
				<?php if(isset($_POST['acao']) && $_POST['acao'] == 'enviar'){
					$quantidade = count($_POST['pergunta']);
					$i = 0;
					$pergunta = $_POST['pergunta'];
					if(empty($pergunta)){
						echo '<div class="isa_warning">O campo pergunta deve ser preenchido</div>';

					}else{
						$pdoVar = new PDO("mysql:host=$endereco;dbname=$banco", $usuario, $senha);
						$Perg = new Pergunta($pergunta, "1", $pdoVar);
						$inserção = $Perg->insere();
						if($inserção){
							$i++;
						}
						
						if($quantidade == $i){
							echo '<div class="isa_success">Pergunta cadastradas com sucesso.</div>';
						}else{
							echo '<div class="isa_error">Erro ao cadastrar pergunta.</div>';
						}	
					}
					

				}
				?>
			</div>	
		</div>
		
		
	</div>
</body>
</html>