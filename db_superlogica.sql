CREATE DATABASE `db_superlogica` /*!40100 DEFAULT CHARACTER SET utf8 */;
CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_imovel` varchar(255) NOT NULL,
  `cep_imovel` varchar(8) NOT NULL,
  `endereco_imovel` varchar(255) NOT NULL,
  `numero_imovel` varchar(5) NOT NULL,
  `bairro_imovel` varchar(255) NOT NULL,
  `cidade_imovel` varchar(255) NOT NULL,
  `estado_imovel` varchar(255) NOT NULL,
  `proprietario_imovel` int(11) NOT NULL,
  `aluguel_imovel` double NOT NULL,
  `venda_imovel` double NOT NULL,
  `data_cad` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
