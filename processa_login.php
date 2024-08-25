<?php
	session_start();
	
	$conectar = mysqli_connect ("localhost", "root", "", "shoes-store");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];	
		
	$sql_consulta = "SELECT cod_user, funcao, nome_user, login_user, senha_user, status_user FROM usuarios
					 WHERE 
					       login_user = '$login' 
					 AND 
					       senha_user = '$senha'";
					 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);
	
	
	if ($linhas == 1) {	
		$registro = mysqli_fetch_row($resultado_consulta);
		$_SESSION["cod_user"] = $registro[0];
		$_SESSION["funcao"] = $registro[1];
		$_SESSION["nome_user"] = $registro[2];
		$_SESSION["login_user"] = $registro[3];
        $_SESSION["senha_user"] = $registro[4];	
        $_SESSION["status_user"] = $registro[5];			
		
		echo "<script> 
					location.href = ('administracao.php') 
			  </script>";
	}
	else {
		echo "<script> 
				  alert ('Login ou Senha Incorretos! Digite Novamente!!') 
			  </script>";
		echo "<script> location.href = ('index.php') </script>";
	}
?>