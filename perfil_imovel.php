<?php
require_once('header.php');

$imovelController = new ImovelController();
$imovel = $imovelController->getById($_POST['id_imovel']);

$proprietarioController = new ProprietarioController('http://apps.superlogica.net/imobiliaria/api/proprietarios');
$proprietario = new Proprietario();
$proprietario->setId($imovel->getProprietario());
$response = $proprietarioController->getById($proprietario);
$jsonObj = json_decode($response);
$datas = $jsonObj->data;

$nome_proprietario = '';
foreach ($datas as $d) {
    $nome_proprietario = $d->st_nome_pes;
}

if (isset($_POST['proprietario'])) {
    $imovel = new Imovel(null,null,null,null,null,null,null,null, $_POST['aluguel'], $_POST['venda'], $_POST['id_imovel']);
    $imovelController->updateImovel($imovel);

    $_SESSION['msg'] = "Alteração realizada com sucesso.";
    $_SESSION['tipo_alert'] = "alert-success";
    header("Location: buscar_imovel.php");
    exit();
}
/*if ($status == 200) {
    $_SESSION['msg'] = "Alteração realizada com sucesso.";
    $_SESSION['tipo_alert'] = "alert-success";
    header("Location: buscar_proprietario.php");
    exit();
}else{
 $_SESSION['msg'] = "Não foi possível realizar a alteração. Tente novamente.";
 $_SESSION['tipo_alert'] = "alert-danger";
 header("Location: buscar_proprietario.php");
 exit();
}*/

if (isset($_POST['deletar'])) {
    $imovelController->deleteImovel($_POST['id_imovel']);

    $_SESSION['msg'] = "Imóvel deletado com sucesso.";
    $_SESSION['tipo_alert'] = "alert-success";
    header("Location: buscar_imovel.php");
    exit();
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
            <!-- FORM PARA 'DELETAR' -->
            <form action="" method="post" id="form_deletar">
                <input type="hidden" name="id_imovel" value="<?php echo $_POST['id_imovel']; ?>">
                <input type="hidden" name="deletar" value="1">
            </form>
            
            <form action="" method="post" style="border: 1px solid #ddd; border-radius: 5px; padding: 1%;">
                <div class="row"><div class="col-12 text-center"><h3 style="color: #999;">Atualizar informações</h3></div></div>
                <div class="row form-group">
                    <!-- ID -->
                    <input type="hidden" name="id_imovel" value="<?php echo $_POST['id_imovel']; ?>" >

                    <div class="col-12 col-md-5">
                        <label for="">Proprietário:</label>
                        <input class="form-control" type="text" name="proprietario" value="<?php echo utf8_encode($nome_proprietario); ?>" readonly="readonly">
                    </div>

                    <div class="col-12 col-md-5">
                        <label for="">Tipo de imóvel:</label>
                        <select class="form-control" name="tipo" disabled>
                            <option value="Casa" <?php if ($imovel->getTipo() == "Casa") {echo "selected";} ?> >Casa</option>
                            <option value="Casa em condominio" <?php if ($imovel->getTipo() == "Casa em condominio") {echo "selected";} ?> >Casa em condomínio</option>
                            <option value="Casa comercial" <?php if ($imovel->getTipo() == "Casa comercial") {echo "selected";} ?> >Casa comercial</option>
                            <option value="Apartamento" <?php if ($imovel->getTipo() == "Apartamento") {echo "selected";} ?> >Apartamento</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="">CEP:</label>
                        <input class="form-control" type="text" name="cep" value="<?php echo $imovel->getCep(); ?>" required readonly="readonly">
                    </div>

                    <div class="col-12 col-md-8">
                        <label for="">Endereço:</label>
                        <input class="form-control" type="text" name="endereco" value="<?php echo utf8_encode($imovel->getEndereco()); ?>" required readonly="readonly">
                    </div>
                    <div class="col-12 col-md-1">
                        <label for="">Nº:</label>
                        <input class="form-control" type="text" name="numero" value="<?php echo $imovel->getNumero(); ?>" required readonly="readonly">
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="">Bairro:</label>
                        <input class="form-control" type="text" name="bairro" value="<?php echo utf8_encode($imovel->getBairro()); ?>" required readonly="readonly">

                    </div>
                    <div class="col-12 col-md-4">
                        <label for="">Cidade:</label>
                        <input class="form-control" type="text" name="cidade" value="<?php echo utf8_encode($imovel->getCidade()); ?>" required readonly="readonly">

                    </div>
                    <div class="col-12 col-md-4">
                        <label for="">Estado:</label>
                        <select class="form-control" name="estado" required disabled>
                            <?php
                            $estados = array(
                                'AC' => 'Acre',
                                'AL' => 'Alagoas',
                                'AP' => 'Amapá',
                                'AM' => 'Amazonas',
                                'BA' => 'Bahia',
                                'CE' => 'Ceará',
                                'DF' => 'Distrito Federal',
                                'ES' => 'Espírito Santo',
                                'GO' => 'Goiás',
                                'MA' => 'Maranhão',
                                'MT' => 'Mato Grosso',
                                'MS' => 'Mato Grosso do Sul',
                                'MG' => 'Minas Gerais',
                                'PA' => 'Pará',
                                'PB' => 'Paraíba',
                                'PR' => 'Paraná',
                                'PE' => 'Pernambuco',
                                'PI' => 'Piauí',
                                'RJ' => 'Rio de Janeiro',
                                'RN' => 'Rio Grande do Norte',
                                'RS' => 'Rio Grande do Sul',
                                'RO' => 'Rondônia',
                                'RR' => 'Roraima',
                                'SC' => 'Santa Catarina',
                                'SP' => 'São Paulo',
                                'SE' => 'Sergipe',
                                'TO' => 'Tocantins',
                            );

                            foreach ($estados as $key => $value) {
                                if ($imovel->getEstado() == $key) {
                                    $selected = 'selected';
                                }
                                echo "<option value=".$key." ".$selected.">".$value."</option>";
                                $selected = '';
                            }
                            ?>

                        </select>
                    </div>
                    
                    <div class="col-12 col-md-3">
                        <label for="">Valor do aluguel:</label>
                        <input class="form-control" type="number" name="aluguel" placeholder="R$" onchange="attInformacoes()" value="<?php echo $imovel->getAluguel(); ?>" required>
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="">Valor da venda:</label>
                        <input class="form-control" type="number" name="venda" placeholder="R$" onchange="attInformacoes()" value="<?php echo $imovel->getVenda(); ?>" required>
                    </div>

                    <div class="col-12 col-md-8" style="margin-top: 1%;">
                        <button class="btn btn-success" id="btn_att_informacoes" disabled>Atualizar Informações</button>
                        <a href="#" class="btn btn-danger" onclick="javascript: if(confirm('Cancelar?')) window.location.href = 'buscar_imovel.php';">Cancelar</a>
                    </div>
                    <div class="col-12 col-md-4 text-right" style="margin-top: 1%;">
                        <button type="button" class="btn btn-danger" onclick="deleteImovel()">Deletar Imóvel</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>
