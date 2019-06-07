<?php
require_once('header.php');

if (isset($_POST['nome'])) {
    $proprietario = new Proprietario(
        null,
        $_POST['nome'],
        $_POST['nome_fantasia'],
        $_POST['celular'],
        $_POST['telefone'],
        $_POST['email'],
        $_POST['forma_pagamento'],
        $_POST['rg'],
        $_POST['orgao_expeditor'],
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
        $_POST['reter_issqn'],
        $_POST['proprietario_beneficiario']
    );

    $proprietarioController = new ProprietarioController('http://apps.superlogica.net/imobiliaria/api/proprietarios');
    $response = $proprietarioController->novoProprietario($proprietario);
    $jsonObj = json_decode($response);
    $status = $jsonObj->status;

    if ($status == 200) {
        $_SESSION['msg'] = "Cadastro realizado com sucesso.";
        $_SESSION['tipo_alert'] = "alert-success";
        
    }else{
     $_SESSION['msg'] = "Não foi possível realizar o cadastro. Tente novamente.";
     $_SESSION['tipo_alert'] = "alert-danger";
     header("Location: cadastro_proprietario.php");
     exit();
 }
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
            
            <?php if(!isset($_POST['nome'])) { ?>

                <form action="" method="post" style="border: 1px solid #ddd; border-radius: 5px; padding: 1%;">
                    <div class="row form-group">
                        <div class="col-12 col-md-8">
                            <label for="">Nome completo:</label>
                            <input class="form-control" type="text" name="nome" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Nome fantasia:</label>
                            <input class="form-control" type="text" name="nome_fantasia" required>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="">Celular:</label>
                            <input class="form-control" type="text" name="celular" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Telefone:</label>
                            <input class="form-control" type="text" name="telefone" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="">Email:</label>
                            <input class="form-control" type="email" name="email" required>
                        </div>

                        <div class="col-12 col-md-5">
                            <label for="">Forma de pagamento</label>
                            <select class="form-control" name="forma_pagamento" required>
                                <option value="1">Depósito em cheque</option>
                                <option value="2">Depósito em dinheiro</option>
                                <option value="3">Retirar cheque no local</option>
                                <option value="4">Retirar dinheiro no local</option>
                                <option value="5">Transferência bancária</option>
                                <option value="6">Doc/Ted</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-5">
                            <label for="">RG:</label>
                            <input class="form-control" type="text" name="rg" required>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="">Orgão expeditor:</label>
                            <input class="form-control" type="text" name="orgao_expeditor" required>
                        </div>

                        <div class="col-12 col-md-3 radio">
                            <label class="radio-inline">Sexo:&nbsp&nbsp</label>
                            <label class="radio-inline"><input type="radio" name="sexo" value="M">Masculino</label>
                            <label class="radio-inline"><input type="radio" name="sexo" value="F">Feminino</label>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="">Data de nascimento:</label>
                            <input class="form-control" type="date" name="data_nascimento" required>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="">Nacionalidade:</label>
                            <input class="form-control" type="text" name="nacionalidade" required>
                        </div>
                        <div class="col-12 col-md-3 radio">
                            <label class="radio-inline">Mora no Brasil?&nbsp&nbsp</label>
                            <label class="radio-inline"><input type="radio" name="nao_domiciliado" value="1" checked>Sim</label>
                            <label class="radio-inline"><input type="radio" name="nao_domiciliado" value="0" disabled>Não</label>
                        </div>

                        <div class="col-12 col-md-2">
                            <label for="">CEP:</label>
                            <input class="form-control" type="text" name="cep" required>
                        </div>
                        <div class="col-12 col-md-6">
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

                        <div class="col-12 col-6">
                            <label class="radio-inline">Reter ISSQN?&nbsp&nbsp</label>
                            <label class="radio-inline"><input type="radio" name="reter_issqn" value="1" checked>Sim</label>
                            <label class="radio-inline"><input type="radio" name="reter_issqn" value="0" disabled>Não</label>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <label class="radio-inline">Proprietário beneficiário:&nbsp&nbsp</label>
                            <label class="radio-inline"><input type="radio" name="proprietario_beneficiario" value="1" disabled>Sim</label>
                            <label class="radio-inline"><input type="radio" name="proprietario_beneficiario" value="0" checked>Não</label>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success">Cadastrar Proprietário</button>
                            <a href="#" class="btn btn-danger" onclick="javascript: if(confirm('Cancelar cadastro?')) window.location.href = 'buscar_proprietario.php';">Cancelar</a>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <a href="buscar_proprietario.php" class="btn btn-primary">Finalizar</a>
            <?php } ?>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>
