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
					<h1> RECIBO </h1>
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "shoes-store");			
						
						
						$data = date ('d/m/Y');
						$cod_user = $_SESSION['cod_user'];
						$sql_registro_venda = "INSERT INTO vendas
												(data_ven, funcionarios_cod_fun)
												VALUES ('$data','$cod_user')";
												
						$resultado_registro_venda = mysqli_query ($conectar, $sql_registro_venda);
						
						
						
						$sql_consulta_ultima_venda = "SELECT cod_ven
						FROM vendas ORDER BY cod_ven DESC LIMIT 1";
						
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta_ultima_venda);		
												
						$registro_cod_ven = mysqli_fetch_row ($resultado_consulta);
						
					
						
						$sql_codigo_venda_em_amp = "UPDATE produtos
																SET vendas_cod_ven = '$registro_cod_ven[0]',
																    fila_compra_prod = 'V'
																WHERE fila_compra_prod = 'S'";
																
						$resultado_alteracao_amp = mysqli_query ($conectar, $sql_codigo_venda_em_amp);
						
					
						$sql_consulta_recibo = "SELECT marca_prod, modelo_prod, valor_prod FROM produtos WHERE vendas_cod_ven = '$registro_cod_ven[0]'";
						
						$resultado_consulta = mysqli_query ($conectar, $sql_consulta_recibo);						
						echo "<p> Venda nº: $registro_cod_ven[0]</p>";
						echo "<p> Data: $data</p>";
					?>
					
					<table class="centralizar">
						<tr>
							<td class="esquerda">
								<p> Marca </p>
							</td>
							<td>
								<p> Modelo </p>
							</td>							
							<td>
								<p> Preço </p>
							</td>						
						</tr>
						<?php
							$valor_total = 0;
							while ($registro = mysqli_fetch_row($resultado_consulta))
							{
						?>						
						<tr>
							<td class="esquerda">
								<p>
									<?php echo "$registro[0]"; ?>
								</p>
							</td>
							<td>
								<p>
									<?php echo "$registro[1]";	?>										
								</p>
							</td>
							<td class="esquerda">
								<p>
									<?php 
										echo "$registro[2]"; 
										$valor_total = $valor_total + $registro[2];
									?>
								</p>
							</td>							
						</tr>
						<?php
							}
						?>
					</table>
					<p> Total: <?php echo $valor_total; ?> </p>
					<p> <a href="vendas.php"> Fechar recibo </a> </p>
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