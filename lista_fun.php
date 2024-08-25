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
				<div id="menu_global"  class="menu_global">
					<ul>
                        <li> Olá <?php include "validar_login.php";?></li>
						<li><a href="logout.php" class="active">Sair</a></li>
					</ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> FUNCIONÁRIOS </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">					
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "shoes-store");			
					
						$sql_consulta = "SELECT cod_user, funcao, nome_user, login_user, senha_user, status_user FROM usuarios";
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
							
					?>
					<p align="right"> <a href="cadastra_fun.php"> Cadastrar funcionário </a> </p>
					<table class="centralizar">
						<tr>
							<td class="esquerda">
								<p> Nome </p>
							</td>
							<td>
								<p> Função </p>
							</td>
							<td>
								<p> Status </p>
							</td>
							<td class="direita">
								<p> Ação </p>
							</td>
						</tr>
						<?php		
							while ($registro = mysqli_fetch_row($resultado_consulta)) 
							{											
						?>						
						<tr>
							<td class="esquerda">
								<p>
									<a href="exibe_fun.php?codigo=<?php echo $registro[0]?>"> 
										<?php 
											echo "$registro[2]";
										?>
									</a>
								</p>
							</td>
							<td>
								<p>									 
									<?php echo "$registro[1]"; ?>
								</p>
							</td>
							<td>
								<p>									 
									<?php 
										echo "$registro[5]";
									?>
								</p>
							</td>
						
							<td class="direita">
								<p>
									<a href="altera_fun.php?codigo=<?php echo $registro[0]?>">
										Alterar	
									</a>
								</p>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
				</div>				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
					<h6> Shoes Stroe </h6> 
						<h6> Rua Almeida, 69 -- E-mail: ShoesStore@gmail.com -- Fone: (61) 9123 - 6677 </h6> 
					</div> 
				</div>
				
		</div>
    </body>
</html>