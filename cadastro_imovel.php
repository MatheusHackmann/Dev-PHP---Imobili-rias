<?php
require_once('header.php');

$imovelController = new ImovelController();

/* Busca os proprietários cadastrados */
$proprietarioController = new ProprietarioController('http://apps.superlogica.net/imobiliaria/api/proprietarios');
$response = $proprietarioController->getAll();
$jsonObj = json_decode($response);
$data = $jsonObj->data;

if (isset($_POST['tipo'])) {
	$imovel = new Imovel($_POST['tipo'], $_POST['cep'], $_POST['endereco'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['proprietario'], $_POST['aluguel'], $_POST['venda']);

	$imovelController->novoImovel($imovel);

	$_SESSION['msg'] = "Cadastro realizado com sucesso.";
	$_SESSION['tipo_alert'] = "alert-success";
}
?>
<div class="container">
	<div class="row">
		<div class="col-12" style="margin-top: 2%;">
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
			
			<?php if(!isset($_POST['tipo'])) { ?>
				<form action="" method="post" style="border: 1px solid #ddd; border-radius: 5px; padding: 1%;">
					<div class="row form-group">
						<div class="col-12 col-md-5">
							<label for="">Proprietário:</label>
							<select class="form-control" name="proprietario">
								<?php
								foreach ($data as $d) {
									echo "<option value=\"".$d->id_pessoa_pes."\">".$d->st_nome_pes."</option>";
								}
								?>
							</select>
						</div>

						<div class="col-12 col-md-5">
							<label for="">Tipo de imóvel:</label>
							<select class="form-control" name="tipo">
								<option value="Casa">Casa</option>
								<option value="Casa em condominio">Casa em condomínio</option>
								<option value="Casa comercial">Casa comercial</option>
								<option value="Apartamento">Apartamento</option>
							</select>
						</div>
						<div class="col-12 col-md-2">
							<label for="">CEP:</label>
							<input class="form-control" type="text" name="cep" required>
						</div>

						<div class="col-12 col-md-8">
							<label for="">Endereço:</label>
							<input class="form-control" type="text" name="endereco" required>
						</div>
						<div class="col-12 col-md-1">
							<label for="">Nº:</label>
							<input class="form-control" type="text" name="numero" required>
						</div>
						<div class="col-12 col-md-3">
							<label for="">Complemento:</label>
							<input class="form-control" type="text" name="complemento">
						</div>

						<div class="col-12 col-md-4">
							<label for="">Bairro:</label>
							<input class="form-control" type="text" name="bairro" required>

						</div>
						<div class="col-12 col-md-4">
							<label for="">Cidade:</label>
							<input class="form-control" type="text" name="cidade" required>

						</div>
						<div class="col-12 col-md-4">
							<label for="">Estado:</label>
							<select class="form-control" name="estado" required>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						</div>

						<div class="col-12 col-md-3">
							<label for="">Valor do aluguel:</label>
							<input class="form-control" type="number" name="aluguel" placeholder="R$" required>
						</div>
						<div class="col-12 col-md-3">
							<label for="">Valor da venda:</label>
							<input class="form-control" type="number" name="venda" placeholder="R$" required>
						</div>

						<div class="col-12" style="margin-top: 1%;">
							<button class="btn btn-success">Cadastrar Imóvel</button>
							<a href="#" class="btn btn-danger" onclick="javascript: if(confirm('Cancelar cadastro?')) window.location.href = 'buscar_imovel.php';">Cancelar</a>
						</div>
					</div>
				</form>
			<?php } else { ?>
				<a href="buscar_imovel.php" class="btn btn-primary">Finalizar</a>
			<?php } ?>
		</div>
	</div>
</div>


<?php require_once('footer.php'); ?>