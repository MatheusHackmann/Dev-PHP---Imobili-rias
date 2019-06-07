<?php
require_once('header.php');


$imovelController = new ImovelController();
$response = $imovelController->getAll();

$proprietarioController = new ProprietarioController('http://apps.superlogica.net/imobiliaria/api/proprietarios');
$res = $proprietarioController->getAll();
$jsonObj = json_decode($res);
$data = $jsonObj->data;

/* Armazena ID e NOME de todos os proprietários existentes */
$proprietarios = array();
foreach ($data as $d) {
	$proprietarios[$d->id_pessoa_pes] = $d->st_nome_pes;
}
?>

<div class="container">
	<div class="row">
		<div class="col-12" style="margin-top: 1%;border: 1px solid #ddd; border-radius: 5px; padding: 2%;">
			<div class="row">
				<div class="col-12 text-center">
					<h3 style="color: #999;"><?php echo count($response); ?> registros encontrados.</h3>
				</div>
			</div>
			<?php if(isset($_SESSION['msg'])) { ?>
				<div class="alert <?php echo $_SESSION['tipo_alert']; ?> alert-dismissible fade show" role="alert">
					<?php echo $_SESSION['msg']; ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php 
				unset($_SESSION['msg']);
				unset($_SESSION['tipo_alert']); 
			} ?>
			<form action="perfil_imovel.php" method="post" id="form_enviar_id">
				<input type="hidden" name="id_imovel" id="id_imovel">
			</form>
			<table class="table table-striped table-bordered table-hover" id="tabela_proprietarios">
				<thead>
					<tr>
						<th>Proprietário</th>
						<th>Tipo</th>
						<th>CEP</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($response as $r): ?>
						<tr>
							<td><?php 
							foreach ($proprietarios as $key => $value) {
								if ($key == $r['proprietario_imovel']) {
									echo $value;
								}
							} 
							?></td>
							<td><?php echo $r['tipo_imovel']; ?></td>
							<td><?php echo $r['cep_imovel']; ?></td>
							<td><span class="fas fa-user-edit" style="cursor: pointer;" onclick="enviarIdImovel('<?php echo $r['id']; ?>')"></span></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>