<?php
	include "include/conexao.php";
	include "include/cabecalho.php";
    
    //Executando consulta no Banco de dados
	$sql = "SELECT c.*, m.nome, p.nome FROM corridas c JOIN motorista m on m.id = c.id_m JOIN passageiro p on p.id = c.id_p" ;
	$query = mysqli_query($conn, $sql);
?>

<script type="text/javascript">
    //Função em javaScript que chama outra função em php para editar e excluir.
	function editar (id) {
		location.href = 'editar_corrida.php?id=' + id
	}

	function excluir (id) {
		if (window.confirm('Tem certeza que deseja excluir esse produto? Não dá para voltar atrás.')) {
			location.href = 'excluir_corrida.php?id=' + id
		}
	}

</script>

<div class="container">
	<h2>Adicionar corridas</h2>
	<h6>* Campos obrigatorios.</h6>
	<form method="post" action="salvar_corrida.php">
		<div class="form-group">
			<label>Motorista:*</label>
			<input type="text" name="id_m" class="form-control" placeholder="Digite o ID do motorista">
		</div>
		<div class="form-group">
			<label>Passageiro:*</label>
			<input type="text" name="id_p" class="form-control" placeholder="Digite o id do passageiro">
		</div>
		<div class="form-group">
			<label>Valor:*</label>
			<input type="text" name="valor" class="form-control" placeholder="Digite o valor da corrida"><br>
		<button class="btn btn-success">Salvar</button>
	</form>
</div>

<div class="container">
	<h2>Corridas</h2>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Motorista</th>
				<th>Passageiro</th>
				<th>Valor/R$</th>
				<th width="20%">Ações</th>
			</tr>
		</thead>
		<tbody>
		<?php while ($resp = mysqli_fetch_array($query)): ?>
			<tr>
				<td><?= $resp['id_m']; ?></td>
				<td><?= $resp['id_p']; ?></td>
				<td><?= $resp['valor']; ?></td>
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