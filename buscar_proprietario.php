<?php
require_once('header.php');


$proprietarioController = new ProprietarioController('http://apps.superlogica.net/imobiliaria/api/proprietarios');
$response = $proprietarioController->getAll();
$jsonObj = json_decode($response);
$data = $jsonObj->data; //Pega os dados retornados e armazena num array de objetos na variável $data
?>

<div class="container">
	<div class="row">
		<div class="col-12" style="margin-top: 1%;border: 1px solid #ddd; border-radius: 5px; padding: 2%;">
			<div class="row">
				<div class="col-12 text-center">
					<h3 style="color: #999;"><?php echo count($data); ?> registros encontrados.</h3>
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
			<form action="perfil_proprietario.php" method="post" id="form_enviar_id">
				<input type="hidden" name="id_proprietario" id="id_proprietario">
			</form>
			<table class="table table-striped table-bordered table-hover" id="tabela_proprietarios">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>RG</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $d): ?>
						<tr>
							<td><?php echo $d->st_nome_pes; ?></td>
							<td><?php echo $d->st_email_pes; ?></td>
							<td><?php echo $d->st_rg_pes; ?></td>
							<td><span class="fas fa-user-edit" style="cursor: pointer;" onclick="enviarIdProprietario('<?php echo $d->id_pessoa_pes; ?>')"></span></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once('footer.php'); ?>