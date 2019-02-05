<?php

include "include/conexao.php";
//verificando as variaveis.
if (!empty($_POST['id_m']) && !empty($_POST['id_p']) && !empty($_POST['valor'])) {
    //Verificando a variavel 'ID' se esta correta ou NULL.
	if (!isset($_GET['id'])) {
	    //Passando o parametro para o BD.
		$query = sprintf(
			"INSERT INTO corridas (ID_M, ID_P, VALOR) VALUES ('%s', '%s', '%s')",
			$_POST['id_m'],
			$_POST['id_p'],
			$_POST['valor']
		);
		$msg = 'Corrida cadastrada com sucesso';
	} else {
        //Caso ja haja o valor no BD, ele executa.
		$query = sprintf(
			"UPDATE corridas SET id_m = '%s', id_p = '%s', valor = '%d' WHERE id = '%d'",
			$_POST['id_m'],
			$_POST['id_p'],
			$_POST['valor'],
			$_GET['id']
		);
		$msg = 'Corrida alterada com sucesso';
	}
    //Exeução de comandos no BD.
	mysqli_query($conn, $query);


	echo "<script>alert('" . $msg . "!')</script>";
	echo "<script>location.href='corridas.php'</script>";


} else {

	echo "<script>alert('Preencha todos os campos!')</script>";
	echo "<script>history.back(-1)</script>";
}
?>