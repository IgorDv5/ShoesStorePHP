<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "shoes-store");
				
	
	$cod = $_GET["codigo"];	
	
	$sql_altera = "UPDATE produtos 		
				   SET 		fila_compra_prod = 'S'
				   WHERE 	cod_prod = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Produto colocado na fila de compra com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. O Produto n�o foi colocado na fila de compras. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>