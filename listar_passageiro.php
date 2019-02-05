<?php
	include "include/conexao.php";
	include "include/cabecalho.php";
    //Executando consulta no Banco de dados.
	$sql = "SELECT * FROM passageiro ORDER BY NOME";
	//Envia o comando ao BD.
	$query = mysqli_query($conn, $sql);

?>

<script type="text/javascript">
    //Função em javaScript que chama outra função em php para editar e excluir.
	function editar (id) {
		location.href = 'editar_passageiro.php?id=' + id
	}

	function excluir (id) {
		if (window.confirm('Tem certeza que deseja excluir esse produto? Não dá para voltar atrás.')) {
			location.href = 'excluir_passageiro.php?id=' + id
		}
	}

</script>

<div class="container">
	<h2>Listar Passageiro</h2>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
			    <th>ID</th>
				<th>Nome</th>
				<th>Data Nascimento</th>
				<th>Documento</th>
				<th>Sexo</th>
				<th width="20%">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php while ($resp = mysqli_fetch_array($query)): ?>
			<tr>
			    <td><?= $resp['id']; ?></td>
				<td><?= $resp['nome']; ?></td>
				<td><?= $resp['nascimento']; ?></td>
				<td><?= $resp['cpf']; ?></td>
				<td><?= $resp['sexo']; ?></td>
				<td>
					<button type="button" class="btn btn-outline-primary btn-sm" onclick="editar(<?= $resp['id']; ?>)">
						Editar
					</button>
					<button type="button" class="btn btn-outline-danger btn-sm" onclick="excluir(<?= $resp['id']; ?>)">
						Excluir
					</button>
				</td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>
</div>

<?php
	include "include/rodape.php";
?>