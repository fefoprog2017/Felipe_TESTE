<?php

include "include/conexao.php";
//verificando as variaveis.
if (!empty($_POST['nome']) && !empty($_POST['nascimento']) && !empty($_POST['cpf']) && !empty($_POST['sexo'])) {
    //Verificando a variavel 'ID' se esta correta ou NULL.
	if (!isset($_GET['id'])) {
	    //Passando o parametro para o BD.
		$query = sprintf(
			"INSERT INTO passageiro (NOME, NASCIMENTO, CPF, SEXO) VALUES ('%s', '%s', '%s', '%s')",
			$_POST['nome'],
			$_POST['nascimento'],
			$_POST['cpf'],
			$_POST['sexo']
		);
		$msg = 'Passageiro cadastrado com sucesso';
	} else {
        //Caso ja haja o valor no BD, ele executa.
		$query = sprintf(
			"UPDATE passageiro SET NOME = '%s', NASCIMENTO = '%s', CPF = '%s', SEXO = '%s' WHERE id = '%d'",
			$_POST['nome'],
			$_POST['nascimento'],
			$_POST['cpf'],
			$_POST['sexo'],
			$_GET['id']
		);
		$msg = 'Passageiro alterado com sucesso';
	}
    //Exeução de comandos no BD.
	mysqli_query($conn, $query);


	echo "<script>alert('" . $msg . "!')</script>";
	echo "<script>location.href='listar_passageiro.php'</script>";


} else {

	echo "<script>alert('Preencha todos os campos!')</script>";
	echo "<script>history.back(-1)</script>";
}
?>