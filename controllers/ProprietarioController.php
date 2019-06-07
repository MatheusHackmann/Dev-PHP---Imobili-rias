<?php

/**
 * Controller dos proprietários
 */
class ProprietarioController
{
	protected $url = '';
	protected $curl = null;

	/*Autoriazação de acesso para a API utilizando os tokens disponibilizados*/
	private $http_header = array(
		"Content-Type: application/json",
		"app_token: f9ad4d06-2373-3621-b8c3-e1fed4efea7e",
		"access_token: a09f3cde-4060-3740-8b3a-5498b1d3fb88");
	
	function __construct($url)
	{
		$this->url = $url;
	}

	/* Criar um novo proprietário */
	public function novoProprietario(Proprietario $proprietario){
		if ($this->curl == null) {
			$this->curl = curl_init();
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->http_header);
			curl_setopt($this->curl, CURLOPT_URL, $this->url);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($this->curl, CURLOPT_HEADER, FALSE);
			curl_setopt($this->curl, CURLOPT_POST, TRUE);

			$parameters = array(
				'ST_NOME_PES' => $proprietario->getNome(),
				'ST_FANTASIA_PES' => $proprietario->getNomeFantasia(),
				'ST_CELULAR_PES' => $this->unmask($proprietario->getCelular()),
				'ST_TELEFONE_PES' => $this->unmask($proprietario->getTelefone()),
				'ST_EMAIL_PES' => $proprietario->getEmail(),
				'ID_FORMA_PAG' => $proprietario->getIdFormaPagamento(),
				'ST_RG_PES' => $this->unmask($proprietario->getRg()),
				'ST_ORGÃO_PES' => $proprietario->getOrgaoExpeditor(),
				'ST_SEXO_PES' => $proprietario->getSexo(),
				'DT_NASCIMENTO_PES' => $this->organizarData($proprietario->getDataNascimento()),
				'ST_NACIONALIDADE_PES' => $proprietario->getNacionalidade(),
				'FL_NAODOMICILIADO_PES' => $proprietario->getNaoDomiciliado(),
				'ST_CEP_PES' => $this->unmask($proprietario->getCep()),
				'ST_ENDERECO_PES' => $proprietario->getEndereco(),
				'ST_NUMERO_PES' => $proprietario->getNumero(),
				'ST_COMPLEMENTO_PES' => $proprietario->getComplemento(),
				'ST_BAIRRO_PES' => $proprietario->getBairro(),
				'ST_CIDADE_PES' => $proprietario->getCidade(),
				'ST_ESTADO_PES' => $proprietario->getEstado(),
				'FL_RETERISSQN_PES' => $proprietario->getReterIssqn(),
				'FL_PROPRIETARIOBENEFICIARIO_PES' => $proprietario->getProprietarioBeneficiario()

			);

			$parameters = utf8_decode(json_encode($parameters));

			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parameters);
			$response = curl_exec($this->curl);

			return $response;

			curl_close($this->curl);
		}
	}

	/* Busca todos os proprietários */
	public function getAll(){
		if ($this->curl == null) {
			$this->curl = curl_init();
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->http_header);
			curl_setopt($this->curl, CURLOPT_URL, $this->url);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($this->curl, CURLOPT_HEADER, FALSE);
			curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "GET");

			$parameters = array(
				'apenasColunasPrincipais' => '1',
				'fl_status_pes' => '0'
			);

			$parameters = utf8_decode(json_encode($parameters));

			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parameters);
			$response = curl_exec($this->curl);

			return $response;

			curl_close($this->curl);
		}
	}

	/* Busca um proprietário pelo ID */
	public function getById(Proprietario $proprietario){
		if ($this->curl == null) {
			$this->curl = curl_init();
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->http_header);
			curl_setopt($this->curl, CURLOPT_URL, $this->url);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($this->curl, CURLOPT_HEADER, FALSE);
			curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "GET");

			$parameters = array(
				'id' => $proprietario->getId()
			);

			$parameters = utf8_decode(json_encode($parameters));

			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parameters);
			$response = curl_exec($this->curl);

			return $response;

			curl_close($this->curl);
		}
	}

	/* Faz o update dos dados do proprietário */
	public function updateProprietario(Proprietario $proprietario){
		if ($this->curl == null) {
			$this->curl = curl_init();
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->http_header);
			curl_setopt($this->curl, CURLOPT_URL, $this->url);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($this->curl, CURLOPT_HEADER, FALSE);
			curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");

			$parameters = array(
				'ID_PESSOA_PES' => $proprietario->getId(),
				'ST_NOME_PES' => $proprietario->getNome(),
				'ST_FANTASIA_PES' => $proprietario->getNomeFantasia(),
				'ST_CELULAR_PES' => $this->unmask($proprietario->getCelular()),
				'ST_TELEFONE_PES' => $this->unmask($proprietario->getTelefone()),
				'ST_EMAIL_PES' => $proprietario->getEmail(),
				'ST_RG_PES' => $this->unmask($proprietario->getRg()),
				'ST_SEXO_PES' => $proprietario->getSexo(),
				'DT_NASCIMENTO_PES' => $this->organizarData($proprietario->getDataNascimento()),
				'ST_NACIONALIDADE_PES' => $proprietario->getNacionalidade(),
				'FL_NAODOMICILIADO_PES' => $proprietario->getNaoDomiciliado(),
				'ST_CEP_PES' => $this->unmask($proprietario->getCep()),
				'ST_ENDERECO_PES' => $proprietario->getEndereco(),
				'ST_NUMERO_PES' => $proprietario->getNumero(),
				'ST_COMPLEMENTO_PES' => $proprietario->getComplemento(),
				'ST_BAIRRO_PES' => $proprietario->getBairro(),
				'ST_CIDADE_PES' => $proprietario->getCidade(),
				'ST_ESTADO_PES' => $proprietario->getEstado()
			);

			$parameters = utf8_decode(json_encode($parameters));

			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parameters);
			$response = curl_exec($this->curl);

			return $response;

			curl_close($this->curl);
		}
	}

	/* Atualiza o status para 0, como o Aleff pediu */
	public function deleteProprietario($id){
		if ($this->curl == null) {
			$this->curl = curl_init();
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->http_header);
			curl_setopt($this->curl, CURLOPT_URL, $this->url);
			curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($this->curl, CURLOPT_HEADER, FALSE);
			curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");

			$parameters = array(
				'ID_PESSOA_PES' => $id,
				'FL_STATUS_PES' => '1'
			);

			$parameters = utf8_decode(json_encode($parameters));

			curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parameters);
			$response = curl_exec($this->curl);

			return $response;

			curl_close($this->curl);
		}
	}

	/* Formata a data informada para o padrão mm/dd/yy */
	private function organizarData($data){
		$data = date('m/d/Y', strtotime($data));

		return $data;
	}

	/* Retira qualquer caracter utilizado para mascarar */
	private function unmask($masked){
		$masked = str_replace('(', '', $masked);
		$masked = str_replace(')', '', $masked);
		$masked = str_replace('-', '', $masked);
		$masked = str_replace('.', '', $masked);
		$masked = str_replace(' ', '', $masked);

		return $masked;
	}
}