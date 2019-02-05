<?php

include "include/conexao.php";
//verificando as variaveis.
if (!empty($_POST['nome']) && !empty($_POST['nascimento']) && !empty($_POST['cpf']) && !empty($_POST['veiculo']) && !empty($_POST['situacao']) && !empty($_POST['sexo'])) {
    //Verificando a variavel 'ID' se esta correta ou NULL.
	if (!isset($_GET['id'])) {
	    //Passando o parametro para o BD.
		$query = sprintf(
			"INSERT INTO motorista (NOME, NASCIMENTO, CPF, VEICULO, SITUACAO, SEXO) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
			$_POST['nome'],
			$_POST['nascimento'],
			$_POST['cpf'],
			$_POST['veiculo'],
			$_POST['situacao'],
			$_POST['sexo']
		);
		$msg = 'Motorista cadastrado com sucesso';
	} else {
        //Caso ja haja o valor no BD, ele executa.
		$query = sprintf(
			"UPDATE motorista SET NOME = '%s', NASCIMENTO = '%s', CPF = '%s', VEICULO = '%s', SITUACAO = '%d', SEXO = '%s' WHERE id = '%d'",
			$_POST['nome'],
			$_POST['nascimento'],
			$_POST['cpf'],
			$_POST['veiculo'],
			$_POST['situacao'],
			$_POST['sexo'],
			$_GET['id']
		);
		
		$msg = 'Motorista alterado com sucesso';
		
	}
    //Exeução de comandos no BD.
	mysqli_query($conn, $query);
	

	echo "<script>alert('" . $msg . "!')</script>";
	echo "<script>location.href='listar_motorista.php'</script>";
    

} else {

	echo "<script>alert('Preencha todos os campos!')</script>";
	echo "<script>history.back(-1)</script>";
}
?>