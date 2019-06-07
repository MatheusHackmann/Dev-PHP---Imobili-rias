<?php

/**
 * Model dos proprietários
 */
class Proprietario
{
	public $id;
	public $nome;
	public $nomeFantasia;
	public $celular;
	public $telefone;
	public $email;
	public $idFormaPagamento;
	public $rg;
	public $orgaoExpeditor;
	public $sexo;
	public $dataNascimento;
	public $nacionalidade;
	public $naoDomiciliado;
	public $cep;
	public $endereco;
	public $numero;
	public $complemento;
	public $bairro;
	public $cidade;
	public $estado;
	public $reterIssqn;
	public $proprietarioBeneficiario;

	function __construct($id = null, $nome = null, $nomeFantasia = null, $celular = null, $telefone = null, $email = null, $idFormaPagamento = null, $rg = null, $orgaoExpeditor = null, $sexo = null, $dataNascimento = null, $nacionalidade = null, $naoDomiciliado = null, $cep = null, $endereco = null, $numero = null, $complemento = null, $bairro = null, $cidade = null, $estado = null, $reterIssqn = null, $proprietarioBeneficiario = null)
	{
		$this->id = $id;
        $this->nome = $nome;
        $this->nomeFantasia = $nomeFantasia;
        $this->celular = $celular;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->idFormaPagamento = $idFormaPagamento;
        $this->rg = $rg;
        $this->orgaoExpeditor = $orgaoExpeditor;
        $this->sexo = $sexo;
        $this->dataNascimento = $dataNascimento;
        $this->nacionalidade = $nacionalidade;
        $this->naoDomiciliado = $naoDomiciliado;
        $this->cep = $cep;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->reterIssqn = $reterIssqn;
        $this->proprietarioBeneficiario = $proprietarioBeneficiario;
	}

	/* SETTERS */
	public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setNomeFantasia($nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setIdFormaPagamento($idFormaPagamento)
    {
        $this->idFormaPagamento = $idFormaPagamento;
    }
    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    public function setOrgaoExpeditor($orgaoExpeditor)
    {
        $this->orgaoExpeditor = $orgaoExpeditor;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }
    public function setNaoDomiciliado($naoDomiciliado)
    {
        $this->naoDomiciliado = $naoDomiciliado;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setReterIssqn($reterIssqn)
    {
        $this->reterIssqn = $reterIssqn;
    }
    public function setProprietarioBeneficiario($proprietarioBeneficiario)
    {
        $this->proprietarioBeneficiario = $proprietarioBeneficiario;
    }



	/* GETTERS */
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }
    public function getCelular()
    {
        return $this->celular;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getIdFormaPagamento()
    {
        return $this->idFormaPagamento;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function getOrgaoExpeditor()
    {
        return $this->orgaoExpeditor;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
    public function getNaoDomiciliado()
    {
        return $this->naoDomiciliado;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getReterIssqn()
    {
        return $this->reterIssqn;
    }
    public function getProprietarioBeneficiario()
    {
        return $this->proprietarioBeneficiario;
    }
}