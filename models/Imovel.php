<?php

/**
 * Model dos imoveis
 */
class Imovel
{
	public $id;
	public $tipo;
	public $cep;
	public $endereco;
	public $numero;
	public $bairro;
	public $cidade;
	public $estado;
	public $proprietario;
	public $aluguel;
	public $venda;

	function __construct($tipo = null, $cep = null, $endereco = null, $numero = null, $bairro = null, $cidade = null, $estado = null, $proprietario = null, $aluguel = null, $venda = null, $id = null)
	{
		$this->id = $id;
		$this->tipo = $tipo;
		$this->cep = $cep;
		$this->endereco = $endereco;
		$this->numero = $numero;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->proprietario = $proprietario;
		$this->aluguel = $aluguel;
		$this->venda = $venda;
	}

	/* SETTERS */
	public function setId($id){
		$this->id = $id;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function setCep($cep){
		$this->cep = $cep;
	}
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function setBairro($bairro){
		$this->bairro = $bairro;
	}
	public function setCidade($cidade){
		$this->cidade = $cidade;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}
	public function setProprietario($proprietario){
		$this->proprietario = $proprietario;
	}
	public function setAluguel($aluguel){
		$this->aluguel = $aluguel;
	}
	public function setVenda($venda){
		$this->venda = $venda;
	}

	/* GETTERS*/
	public function getId(){
		return $this->id;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getCep(){
		return $this->cep;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	public function getNumero(){
		return $this->numero;
	}
	public function getBairro(){
		return $this->bairro;
	}
	public function getCidade(){
		return $this->cidade;
	}
	public function getEstado(){
		return $this->estado;
	}
	public function getProprietario(){
		return $this->proprietario;
	}
	public function getAluguel(){
		return $this->aluguel;
	}
	public function getVenda(){
		return $this->venda;
	}
}