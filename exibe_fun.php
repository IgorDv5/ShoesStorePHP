<?php 
	session_start ();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
				<h1> Shoes Store </h1>
					<h4> Controle de Vendas </h4>
				</div>
				<div class="menu_global">
					<ul>
						<li> Olá <?php include "validar_login.php";?></li>
                        <li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> EXIBIÇÃO DE DADOS DE USUÁRIOS </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">					
					<?php		
						$conectar = mysqli_connect ("localhost", "root", "", "shoes-store");
						
						$cod = $_GET["codigo"];
									
						$sql_pesquisa = "SELECT  nome_user, login_user, funcao , status_user
										 FROM usuarios
										 WHERE cod_user = '$cod'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					
						echo "<p> Nome: $registro[0] </p>";
						echo "<p> Login: $registro[1]</p>";	
						echo "<p> Perfil: $registro[2]</p>";									
						echo "<p> Status: $registro[3] </p>";						
					?>
												
				</div>				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> ETB - Escola Técnica de Brasília </h6> 
						<h6> Curso - Técnico em Informática </h6> 
						<h6> Disciplina - Desenvolvimento Web II </h6> 
					</div> 
				</div>
				<div id="redes_sociais">
					<!-- <img src="imagens/icon_facebook.png">
					<img src="imagens/icon_linkeldin.png">
					<img src="imagens/icon_twiter.png"> -->
				</div>
		</div>
    </body>
</html>