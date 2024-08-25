<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "shoes-store");
				
	
	$cod = $_POST["codigo"];
	$marca = $_POST["marca"];	
	$modelo = $_POST["modelo"];
	$preco = $_POST["preco"];
	$tipo = $_POST["tipo"];
	$foto = $_FILES["foto"];
	
	
	if ($foto["name"] <> "") {
		$foto_nome = "img/".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	
	$sql_altera = "UPDATE produtos 		
				   SET 		marca_prod='$marca', 
							modelo_prod = '$modelo',
							valor_prod ='$preco', 
							tipo_prod = '$tipo',
							foto_prod = '$foto_nome'
				   WHERE 	cod_prod = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('$modelo alterado com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_prod.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Dados do amplificador n�o foram alterados. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('lista_prod.php') 
			 </script>";
	}
?>