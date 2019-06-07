<?php
require_once('header.php');
$proprietarioController = new ProprietarioController('http://apps.superlogica.net/imobiliaria/api/proprietarios');

if (isset($_POST['nome'])) {
    $proprietario = new Proprietario(
        $_POST['id_proprietario'],
        $_POST['nome'],
        $_POST['nome_fantasia'],
        $_POST['celular'],
        $_POST['telefone'],
        $_POST['email'],
        null,
        $_POST['rg'],
        null,
        $_POST['sexo'],
        $_POST['data_nascimento'],
        $_POST['nacionalidade'],
        $_POST['nao_domiciliado'],
        $_POST['cep'],
        $_POST['endereco'],
        $_POST['numero'],
        $_POST['complemento'],
        $_POST['bairro'],
        $_POST['cidade'],
        $_POST['estado'],
        null,
        null
    );

    $response = $proprietarioController->updateProprietario($proprietario);
    $jsonObj = json_decode($response);
    $status = $jsonObj->status;

    if ($status == 200) {
        $_SESSION['msg'] = "Alteração realizada com sucesso.";
        $_SESSION['tipo_alert'] = "alert-success";
        header("Location: buscar_proprietario.php");
        exit();
    }else{
     $_SESSION['msg'] = "Não foi possível realizar a alteração. Tente novamente.";
     $_SESSION['tipo_alert'] = "alert-danger";
     header("Location: buscar_proprietario.php");
     exit();
 }
}else{
    $proprietario = new Proprietario();
}
if (isset($_POST['deletar'])) {
    $response = $proprietarioController->deleteProprietario($_POST['id_proprietario']);
    $jsonObj = json_decode($response);
    $status = $jsonObj->status;

    if ($status == 200) {
        $_SESSION['msg'] = "Proprietario deletado com sucesso.";
        $_SESSION['tipo_alert'] = "alert-success";
        header("Location: buscar_proprietario.php");
        exit();
    }else{
     $_SESSION['msg'] = "Não foi possível deletar o proprietário. Tente novamente.";
     $_SESSION['tipo_alert'] = "alert-danger";
     header("Location: buscar_proprietario.php");
     exit();
 }
}

$proprietario->setId($_POST['id_proprietario']);
$response = $proprietarioController->getById($proprietario);
$jsonObj = json_decode($response);
$datas = $jsonObj->data;
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
                <input type="hidden" name="id_proprietario" value="<?php echo $_POST['id_proprietario']; ?>">
                <input type="hidden" name="deletar" value="1">
            </form>
            
            <form action="" method="post" style="border: 1px solid #ddd; border-radius: 5px; padding: 1%;">
                <div class="row"><div class="col-12 text-center"><h3 style="color: #999;">Atualizar informações</h3></div></div>
                <div class="row form-group">
                    <?php
                    foreach ($datas as $d) {
                        ?>
                        <div class="col-12 col-md-1">
                            <label for="">ID:</label>
                            <input class="form-control" type="text" name="id_proprietario" value="<?php echo $d->id_pessoa_pes; ?>" readonly="readonly">
                        </div>
                        <div class="col-12 col-md-1">
                            <label for="">Status:</label>
                            <?php if($d->fl_status_pes == 0) {$status_proprietario = 'ON'; $style = 'border-color: green';} else {$status_proprietario = 'OFF'; $style = 'border-color: red';} ?>
                            <input class="form-control"  type="text" name="status"   value="<?php echo $status_proprietario; ?>" style="<?php echo $style; ?>" readonly="readonly">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="">Nome completo:</label>
                            <input class="form-control" type="text" name="nome" onchange="attInformacoes()" value="<?php echo $d->st_nome_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Nome fantasia:</label>
                            <input class="form-control" type="text" name="nome_fantasia" onchange="attInformacoes()" value="<?php echo $d->st_fantasia_pes; ?>" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="">Celular:</label>
                            <input class="form-control" type="number" name="celular" onchange="attInformacoes()" value="<?php echo $d->st_celular_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Telefone:</label>
                            <input class="form-control" type="number" name="telefone" onchange="attInformacoes()" value="<?php echo $d->st_telefone_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Email:</label>
                            <input class="form-control" type="email" name="email" onchange="attInformacoes()" value="<?php echo $d->st_email_pes; ?>" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="">RG:</label>
                            <input class="form-control" type="number" name="rg" onchange="attInformacoes()" value="<?php echo $d->st_rg_pes; ?>" required>
                        </div>

                        <div class="col-12 col-md-3 radio">
                            <label>Sexo:</label><br>
                            <input type="radio" name="sexo" onchange="attInformacoes()" value="M" <?php if ($d->st_sexo_pes == 1 || $d->st_sexo_pes == '') {echo "checked";} ?> >Masculino
                            <input type="radio" name="sexo" onchange="attInformacoes()" value="F" <?php if ($d->st_sexo_pes == 2) {echo "checked";} ?> >Feminino
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="">Data de nascimento:</label>
                            <input class="form-control" type="date" name="data_nascimento" onchange="attInformacoes()" value="<?php echo date('Y-m-d', strtotime($d->dt_nascimento_pes)); ?>"  required>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="">Nacionalidade:</label>
                            <input class="form-control" type="text" name="nacionalidade" onchange="attInformacoes()" value="<?php echo $d->st_nacionalidade_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-3 radio">
                            <label>Mora no Brasil?</label><br>
                            <input type="radio" name="nao_domiciliado" value="1" checked>Sim
                            <input type="radio" name="nao_domiciliado" value="0" disabled>Não
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="">CEP:</label>
                            <input class="form-control" type="number" name="cep" onchange="attInformacoes()" value="<?php echo $d->st_cep_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-7">
                            <label for="">Endereço:</label>
                            <input class="form-control" type="text" name="endereco" onchange="attInformacoes()" value="<?php echo $d->st_endereco_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="">Nº:</label>
                            <input class="form-control" type="text" name="numero" onchange="attInformacoes()" value="<?php echo $d->st_numero_pes; ?>" required>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="">Complemento:</label>
                            <input class="form-control" type="text" name="complemento" onchange="attInformacoes()" value="<?php echo $d->st_complemento_pes; ?>">
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="">Bairro:</label>
                            <input class="form-control" type="text" name="bairro" onchange="attInformacoes()" value="<?php echo $d->st_bairro_pes; ?>" required>

                        </div>
                        <div class="col-12 col-md-3">
                            <label for="">Cidade:</label>
                            <input class="form-control" type="text" name="cidade" onchange="attInformacoes()" value="<?php echo $d->st_cidade_pes; ?>" required>

                        </div>
                        <div class="col-12 col-md-2">
                            <label for="">Estado:</label>
                            <select class="form-control" name="estado" onchange="attInformacoes()" required>
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
                                    if ($d->st_estado_pes == $key) {
                                        $selected = 'selected';
                                    }
                                    echo "<option value=".$key." ".$selected.">".$value."</option>";
                                    $selected = '';
                                }
                                ?>

                            </select>
                        </div>
                    <?php } ?>

                    <div class="col-12 col-md-6" style="margin-top: 1%;">
                        <button class="btn btn-success" id="btn_att_informacoes" disabled>Atualizar Informações</button>
                        <a href="#" class="btn btn-danger" onclick="javascript: if(confirm('Cancelar?')) window.location.href = 'buscar_proprietario.php';">Cancelar</a>
                    </div>
                    <div class="col-12 col-md-6 text-right" style="margin-top: 1%;">
                        <button type="button" class="btn btn-danger" onclick="deleteProprietario()">Deletar Proprietário</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>
