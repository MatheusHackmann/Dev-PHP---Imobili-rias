<?php
require_once (__DIR__.'/Database.php');
/**
 * Controller dos imoveis
 */
class ImovelController extends Database
{

	public function novoImovel(Imovel $imovel){
		$fields = 'tipo_imovel, cep_imovel, endereco_imovel, numero_imovel, bairro_imovel, cidade_imovel, estado_imovel, proprietario_imovel, aluguel_imovel, venda_imovel, data_cad';

		$parameters = array(
			$imovel->getTipo(), 
			$imovel->getCep(), 
			utf8_decode($imovel->getEndereco()), 
			$imovel->getNumero(), 
			utf8_decode($imovel->getBairro()), 
			utf8_decode($imovel->getCidade()), 
			$imovel->getEstado(), 
			$imovel->getProprietario(), 
			$imovel->getAluguel(), 
			$imovel->getVenda(), 
			date('Y-m-d'));

		$this->query("INSERT INTO imoveis ($fields) VALUES (?,?,?,?,?,?,?,?,?,?,?)", $parameters);
	}

	public function updateImovel(Imovel $imovel){
		$fields = 'aluguel_imovel = ?, venda_imovel = ?';

		$parameters = array($imovel->getAluguel(), $imovel->getVenda(), $imovel->getId());

		$this->query("UPDATE imoveis SET $fields WHERE id = ?", $parameters);
	}

	public function getAll(){
		$results = $this->select("SELECT * FROM imoveis ORDER BY id");
		return $results;
	}

	public function getById($id){
		$parameters = array($id);
		$results = $this->select("SELECT * FROM imoveis WHERE id = ?", $parameters);
		
		$imovel = new Imovel();

		foreach ($results as $r) {
			$imovel->setId($r['id']);
			$imovel->setTipo($r['tipo_imovel']);
			$imovel->setCep($r['cep_imovel']);
			$imovel->setEndereco($r['endereco_imovel']);
			$imovel->setNumero($r['numero_imovel']);
			$imovel->setBairro($r['bairro_imovel']);
			$imovel->setCidade($r['cidade_imovel']);
			$imovel->setEstado($r['estado_imovel']);
			$imovel->setProprietario($r['proprietario_imovel']);
			$imovel->setAluguel($r['aluguel_imovel']);
			$imovel->setVenda($r['venda_imovel']);
		}

		return $imovel;
	}

	public function deleteImovel($id){
		$parameters = array($id);
		$this->query("DELETE FROM imoveis WHERE id = ?", $parameters);
	}
}
