<?php
	if ( isset($_SESSION["login_user"]) ) {
		
		echo $_SESSION["nome_user"];
		
	}
	else {
	
		echo "<script> 
				alert ('Você não está logado!!!') 
			  </script>";
			
		echo "<script> 
				location.href = ('index.php') 
			  </script>";
	}
?>