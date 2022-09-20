-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela sys.acesso
CREATE TABLE IF NOT EXISTS `acesso` (
  `id_acesso` int(11) NOT NULL AUTO_INCREMENT,
  `id_setor` int(11) DEFAULT NULL,
  `id_sessao` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.acesso: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` (`id_acesso`, `id_setor`, `id_sessao`, `id_usuario`) VALUES
	(1, 1, 1, NULL),
	(2, 1, 2, NULL);
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.bancos
CREATE TABLE IF NOT EXISTS `bancos` (
  `id_banco` smallint(6) NOT NULL AUTO_INCREMENT,
  `num_banco` smallint(6) NOT NULL DEFAULT 0,
  `nome_banco` varchar(50) NOT NULL,
  `agencia` varchar(50) NOT NULL,
  `conta` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT 'cc',
  `cnpj` varchar(15) NOT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.bancos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` (`id_banco`, `num_banco`, `nome_banco`, `agencia`, `conta`, `tipo`, `cnpj`) VALUES
	(1, 237, 'BRADESCO', '7238', '29426-8', 'cc', ' 34.001.006/000'),
	(2, 748, 'SICRED', '0226', '98068-4', 'cc', ' 34.001.006/000'),
	(3, 33, 'SANTANDER', '3131', '13-009025-8', 'cc', ' 34.001.006/000');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL DEFAULT 1,
  `nome` varchar(250) NOT NULL DEFAULT '',
  `comprador` varchar(1) NOT NULL DEFAULT 's',
  `entrega_cobranca` varchar(1) NOT NULL DEFAULT 's',
  `pf_pj` varchar(2) NOT NULL DEFAULT '',
  `cpf` varchar(15) DEFAULT NULL,
  `cnpj` varchar(15) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `sexo` varchar(40) DEFAULT '',
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_nascimento` date DEFAULT NULL,
  `iestadual` varchar(15) DEFAULT NULL,
  `imunicipal` varchar(15) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `cep_cobranca` int(11) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT '',
  `endereco_cobranca` varchar(250) DEFAULT '',
  `numero` varchar(250) DEFAULT '',
  `numero_cobranca` varchar(250) DEFAULT '',
  `complemento` varchar(250) DEFAULT '',
  `complemento_cobranca` varchar(250) DEFAULT '',
  `bairro` varchar(250) DEFAULT '',
  `bairro_cobranca` varchar(250) DEFAULT '',
  `cidade` varchar(250) DEFAULT '',
  `cidade_cobranca` varchar(250) DEFAULT '',
  `uf` varchar(2) DEFAULT '',
  `uf_cobranca` varchar(2) DEFAULT '',
  `email` varchar(350) NOT NULL DEFAULT '',
  `senha` varchar(40) DEFAULT '',
  `celular` bigint(12) NOT NULL DEFAULT 0,
  `telefone` bigint(12) NOT NULL DEFAULT 0,
  `foto` varchar(50) DEFAULT NULL,
  `treinamento` varchar(1) DEFAULT 'n',
  `agendado` varchar(1) DEFAULT 'n',
  `ativo` varchar(1) DEFAULT 's',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.cliente: ~80 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `id_usuario`, `nome`, `comprador`, `entrega_cobranca`, `pf_pj`, `cpf`, `cnpj`, `rg`, `sexo`, `data_cadastro`, `data_nascimento`, `iestadual`, `imunicipal`, `cep`, `cep_cobranca`, `endereco`, `endereco_cobranca`, `numero`, `numero_cobranca`, `complemento`, `complemento_cobranca`, `bairro`, `bairro_cobranca`, `cidade`, `cidade_cobranca`, `uf`, `uf_cobranca`, `email`, `senha`, `celular`, `telefone`, `foto`, `treinamento`, `agendado`, `ativo`) VALUES
	(0, 1, 'Nenhum', 's', 's', '', NULL, NULL, NULL, '', '2022-03-27 10:42:14', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, NULL, 'n', 'n', 's'),
	(1, 1, 'SIMONE DE OLIVEIRA MAGALHAES', 's', 's', 'pf', '72781440949', NULL, NULL, '', '2022-07-26 10:56:31', NULL, NULL, NULL, 88080901, NULL, '', '', '', '', '', '', 'Coqueiros', '', 'Florianópolis', '', 'SC', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(3, 1, 'DANIEL RUFINO ALELUIA', 's', 's', 'pf', '727.814.409-49', NULL, NULL, '', '2022-08-18 17:15:10', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'mvgelo@gmail.com', '', 47996676334, 0, NULL, 's', 'n', 's'),
	(4, 1, 'FERNANDO DE SOUZA MORAES', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'HENRIQUESMANUELA155@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(5, 1, 'JESSICA FERNANDA AWELINO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'JESSICAFERAB@HOTMAIL.COM ', '', 0, 0, NULL, 'n', 'n', 's'),
	(6, 1, 'PRISCILA RODRIGUES DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'BIOMED.PRISCILA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(7, 1, 'FERNANDA FERNANDES', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'FERNANDAFERNANDESTJ@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(8, 1, 'ELIZANDRA FERRAZZO TRINDADE', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'EFTRINDADE@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(10, 1, 'ALESSANDRA MOREIRA DE OLIVEIRA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ALESSANDRAMOREIRA166@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(11, 1, 'VALTER HENRIQUE OLIVEIRA DE ALMEIDA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'SAIONARAVIVIAS@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(12, 1, 'LIANA GRAÇA DE MORI KRUTH', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:25:07', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'KRUTH1@LIVE.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(13, 1, 'FABIANA DE CARVALHO', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'FABICDECHIARE@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(14, 1, 'MARIA NEUZA PEREIRA DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'PRISCILAPEREIRAS3107@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(15, 1, 'FERNANDA BETTARELLO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'FERNANDABETTARELLO@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(16, 1, 'ELAINE CRISTINA BERNARDI', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'E.CRISTINABERNARDI@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(17, 1, 'THIAGO DE FREITAS FARIA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-01 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ANGELICANERY_FISIO@YAHOO.COM.BR', '', 0, 0, NULL, 'n', 'n', 's'),
	(18, 1, 'ELISÂNGELA MACENO DIAS', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'LISAESTETICISTA2015@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(19, 1, 'ELAINE BRAGA DE JESUS', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ELAINE.2106@HTOMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(20, 1, 'MAURO ANTONIO FERREIRA DA SILVA JUNIOR', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ELAINE.2106@HTOMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(21, 1, 'THAIS EUSTAQUIO SALDANHA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'DRA.THAISALDANHA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(22, 1, 'BRUNA RAQUEL PEREIRA CAVALCANTI', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'BRUNAPASSIRA@YAHOO.COM.BR', '', 0, 0, NULL, 'n', 'n', 's'),
	(23, 1, 'TANIA PARTELI', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'TANIAPARTELI@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(24, 1, 'ISABELLA FELICIANO DA CRUZ', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-04-19 12:43:55', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'IGOOR.MARCAL@HOTMAIL.COM', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(27, 1, 'VALERIA MOREIRA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:24:30', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'TAISMGC.MOREIRA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(29, 1, 'ELAINE CALDATO DE SOUZA LINO PEREIRA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:24:25', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ANDRELINOP@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(30, 1, 'MARINA MORENA FARINA NUNCIO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'MARINAMORENA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(31, 1, 'RONALDO LUIS ALBERANI', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ANACLAUSEGATTO@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(32, 1, 'DERMATHOS ESTÉTICA AVANÇADA EIRELI', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ESTETICADERMATHOS@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(33, 1, 'GISELE AMARAL SANTOS DINON', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:24:17', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'GISELIMAGAP@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(34, 1, 'THIAGO M. CARVALHO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:23:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'KARLAJOTA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(35, 1, 'WALDELINE KLEY RUIZ REDEZ', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ESTILOS.WK@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(36, 1, 'VALDOMIRO MOREIRA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:23:03', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ALIKANUT@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(37, 1, 'MARIALVO DOREA OLIVEIRA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'JOELMA.CALMUNGES@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(38, 1, 'DORILDE CANELLO', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'CLEOCANELLO1@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(39, 1, 'MARIA NEUZA PEREIRA DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'PRISCILAPEREIRAS3107@GMAIL.COM Representante', '', 0, 0, NULL, 'n', 'n', 's'),
	(40, 1, 'JULIANA DE FATIMA BORGES DOS SANTOS EBERTZ', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'JU_EBERTZ@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(42, 1, 'TAIS VICENTE DA SILVA E PAIVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-02 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'TAISPAIVAESTETICISTA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(44, 1, 'INACIO ANTUNES DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:24:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'IVANESSAADM@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(45, 1, 'DORILDE CANELLO', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-07 17:25:21', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'CLEOCANELLO1@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(47, 1, 'ALINE BUENO DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-06-02 11:38:49', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ALINEBUENO_6@HOTMAIL.COM', '', 489999999, 0, NULL, 'n', 'n', 's'),
	(48, 1, 'HELENA ESTELITA DE SOUZA DIAS', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'HELENA@FLEXDEPIL.COM.BR', '', 0, 0, NULL, 'n', 'n', 's'),
	(49, 1, 'DELMIR M GONÇALVES', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-07 17:23:32', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'LARISSASILVAGONCALVES@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(50, 1, 'JOSÉ GIVALDO DOS SANTOS', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ENIZA.SOUZA1030@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(52, 1, 'ROGERIO MARCOS DINIZ', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'DINIZ.ROGERIOMARCOS@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(53, 1, 'LUCAS HENRIQUE DELFINO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'LUCASHENRIQUEDELFINO@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(54, 1, 'ANDRE FRANCHINI FERNANDES', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-06-02 11:39:06', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ADM@RENTALMED.COM.BR', '', 4833049699, 0, NULL, 'n', 'n', 's'),
	(55, 1, 'LOUISE CAMPOS', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:25:41', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'TATHIESTETICISTA@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(56, 1, 'JOELMA MARIANA DE OLIVEIRA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'CLINICAJOELMABEAUTY@GMAIL.COM', '', 12, 0, NULL, 'n', 'n', 's'),
	(57, 1, 'FABIANA SEHN ANSCHAU', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'FABIANA_SEHN@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(59, 1, 'ORLANDO ALVES DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'GUSTAVOBTE@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(60, 1, 'ORLANDO ALVES DA SILVA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'GUSTAVOBTE@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(62, 1, 'LINDAURA SOARES MATIAS', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ANDRESINHAMS@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(63, 1, 'DANIELA COIMBRA CORRÊA MANALVO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'DANIELACOIMBRAMANALVO@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(64, 1, 'BRUNA RAQUEL PEREIRA CAVALCANTI', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-04 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'BRUNAPASSIRA@YAHOO.COM.BR Representante', '', 0, 0, NULL, 'n', 'n', 's'),
	(65, 1, 'PATRICIA FIGUEIREDO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:23:42', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'PATRICIA_FIGUEIREDO013@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(66, 1, 'VIPVIX SAÚDE E ESTÉTICA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-04 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'CRISANNICHINI@YAHOO.COM.BR', '', 0, 0, NULL, 'n', 'n', 's'),
	(68, 1, 'SONIA CRISTINA VESTINA', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-07 17:23:48', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'TATIANE.FISIO3615@GMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(69, 1, 'ELAYNE PATRICIA LINS LEAO', 's', 's', 'pj', NULL, NULL, NULL, '', '2022-03-04 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ELAYNELEAO@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(70, 1, 'anadir delai / luiziana', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-07 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'LUIZIANADELAME@HOTMAIL.COM', '', 0, 0, NULL, 'n', 'n', 's'),
	(71, 1, 'BRUNA RAQUEL PEREIRA CAVALCANTI', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-07 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'posvenda02@rentalmed.com.br', '', 0, 0, NULL, 'n', 'n', 's'),
	(72, 1, 'marcus vinicius brito da costa', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-08 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ivan@rentalmed.com.br', '', 2147483647, 0, NULL, 'n', 'n', 's'),
	(74, 1, 'casas bahiaaaa', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-06-02 11:45:59', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ivan@rentalmed.com.br', '', 444, 0, NULL, 'n', 'n', 's'),
	(75, 1, 'americanas', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-14 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ivan@rentalmed.com.br', '', 0, 0, NULL, 'n', 'n', 's'),
	(77, 1, 'patati patata', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-14 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(78, 1, 'xuxa meneguel', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-03 14:32:28', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 0, 0, NULL, 's', 'n', 's'),
	(81, 1, 'bruxa de blair', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-08 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'ivan@rentalmed.com.br', '', 0, 0, NULL, 'n', 'n', 's'),
	(86, 1, 'maria eduarda', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-03-28 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'marketing@rentalmed.com.br', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(90, 1, 'marlon brito da costa', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-14 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'mvgelo@gmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(92, 1, 'aline brito', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-14 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'silvia.gaho@gmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(98, 1, 'valdomiro pena', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-18 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(99, 1, 'Eduardo Costa', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-18 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(100, 1, 'MESSI', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-05-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'mvgelo@gmail.com', '', 47996676333, 0, NULL, 's', 'n', 's'),
	(101, 1, 'LEONEL MESSI', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-18 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(102, 1, 'NEYMAR', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-04-18 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996637777, 0, NULL, 'n', 'n', 's'),
	(103, 1, 'Eduardo Costa', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-05-03 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(104, 1, 'maria brito da costa', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-05-03 13:58:41', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 's', 's', 's'),
	(107, 1, 'samuel pereira dos santos', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-05-06 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(109, 1, 'arthemis da cosyys', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-06-02 11:42:11', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(110, 1, 'ALINE BUENO DA SILVA pereira', 's', 's', 'pf', NULL, NULL, NULL, '', '2022-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', 'profmoreck@hotmail.com', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(114, 1, 'SIMONE DE OLIVEIRA MAGALHAE', 's', 's', 'pf', '72781440949', '', NULL, '', '2022-07-26 10:57:31', NULL, NULL, NULL, 88080901, NULL, '', '', '', '', '', '', ' Coqueiros ', '', 'Florianópolis ', '', 'SC', '', 'profmoreck@hotmail.com ', '', 47996676333, 0, NULL, 'n', 'n', 's'),
	(139, 2, 'simara e maraiba', 's', 's', 'pf', '727.814.409-49', '41228556000156', '16747856', 'f', '2022-08-10 16:02:39', '2088-08-10', '12544', '12555', 88080901, 88113835, 'R. Desembargador Pedro Silva', 'R. Manoel Rosa', '2202', '116', 'Ap 13 Bloco 25', 'Ap 401 Bl 41', 'Coqueiros', 'Areias', 'Florianópolis', 'São José', 'SC', 'SC', 'ADM@RENTALMED.COM.BR', '', 47996676333, 4833049699, NULL, 'n', 'n', 's');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.colaborador
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id_colaborador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  PRIMARY KEY (`id_colaborador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.colaborador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_cotacao
CREATE TABLE IF NOT EXISTS `compra_cotacao` (
  `id_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_status_cotacao` int(11) NOT NULL,
  `data_abertura` date NOT NULL,
  `data_encerramento` date NOT NULL,
  `finalizado` varchar(1) NOT NULL DEFAULT '',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_cotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_cotacao: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_cotacao` DISABLE KEYS */;
INSERT INTO `compra_cotacao` (`id_cotacao`, `id_status_cotacao`, `data_abertura`, `data_encerramento`, `finalizado`, `id_usuario`) VALUES
	(2, 2, '2022-05-19', '0000-00-00', '', 2),
	(3, 2, '2022-05-23', '0000-00-00', '', 2),
	(4, 2, '2022-05-24', '0000-00-00', '', 2),
	(5, 2, '2022-05-24', '0000-00-00', '', 2),
	(6, 1, '2022-05-24', '0000-00-00', '', 0);
/*!40000 ALTER TABLE `compra_cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_fornecedor_cotacao
CREATE TABLE IF NOT EXISTS `compra_fornecedor_cotacao` (
  `id_fornecedor_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_cotacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor_cotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_fornecedor_cotacao: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_fornecedor_cotacao` DISABLE KEYS */;
INSERT INTO `compra_fornecedor_cotacao` (`id_fornecedor_cotacao`, `id_fornecedor`, `id_cotacao`) VALUES
	(1, 1, 1),
	(5, 3, 1),
	(7, 1, 2),
	(8, 2, 2),
	(9, 1, 3),
	(10, 2, 3),
	(11, 3, 3),
	(12, 2, 4),
	(13, 3, 4),
	(14, 1, 5);
/*!40000 ALTER TABLE `compra_fornecedor_cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_item_cotacao
CREATE TABLE IF NOT EXISTS `compra_item_cotacao` (
  `id_item_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_cotacao` int(10) unsigned DEFAULT NULL,
  `id_fornecedor` int(10) unsigned DEFAULT NULL,
  `id_solicitacao` int(10) unsigned DEFAULT NULL,
  `id_status_item_cotacao` int(10) unsigned DEFAULT NULL,
  `id_ordem_compra` int(10) unsigned DEFAULT NULL,
  `id_produto` int(10) unsigned DEFAULT NULL,
  `qtde` int(10) unsigned DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `limite_entrega` date DEFAULT NULL,
  `valor_cotacao` decimal(10,2) DEFAULT 0.00,
  `subtotal` decimal(10,2) DEFAULT 0.00,
  PRIMARY KEY (`id_item_cotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_item_cotacao: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_item_cotacao` DISABLE KEYS */;
INSERT INTO `compra_item_cotacao` (`id_item_cotacao`, `id_cotacao`, `id_fornecedor`, `id_solicitacao`, `id_status_item_cotacao`, `id_ordem_compra`, `id_produto`, `qtde`, `data_entrega`, `limite_entrega`, `valor_cotacao`, `subtotal`) VALUES
	(5, 1, 1, NULL, 1, NULL, 2, 10, NULL, NULL, 0.00, 0.00),
	(6, 1, 1, NULL, 1, NULL, 6, 15, NULL, NULL, 0.00, 0.00),
	(7, 1, 1, NULL, 1, NULL, 5, 12, NULL, NULL, 0.00, 0.00),
	(8, 1, 1, NULL, 1, NULL, 1, 145, NULL, NULL, 0.00, 0.00),
	(9, 1, 3, NULL, 1, NULL, 2, 10, NULL, NULL, 0.00, 0.00),
	(10, 1, 3, NULL, 1, NULL, 6, 15, NULL, NULL, 0.00, 0.00),
	(11, 1, 3, NULL, 1, NULL, 5, 12, NULL, NULL, 0.00, 0.00),
	(12, 1, 3, NULL, 1, NULL, 1, 145, NULL, NULL, 0.00, 0.00),
	(13, 2, 1, NULL, 1, NULL, 2, 10, NULL, NULL, 0.00, 0.00),
	(14, 2, 1, NULL, 1, NULL, 1, 15, NULL, NULL, 0.00, 0.00),
	(15, 2, 2, NULL, 1, NULL, 2, 10, NULL, NULL, 0.00, 0.00),
	(16, 2, 2, NULL, 1, NULL, 1, 15, NULL, NULL, 0.00, 0.00),
	(17, 3, 1, NULL, 1, NULL, 6, 10, NULL, NULL, 0.00, 0.00),
	(18, 3, 1, NULL, 1, NULL, 1, 20, NULL, NULL, 0.00, 0.00),
	(19, 3, 1, NULL, 1, NULL, 12, 13, NULL, NULL, 0.00, 0.00),
	(20, 3, 1, NULL, 1, NULL, 6, 33, NULL, NULL, 0.00, 0.00),
	(21, 3, 2, NULL, 1, NULL, 6, 10, NULL, NULL, 0.00, 0.00),
	(22, 3, 2, NULL, 1, NULL, 1, 20, NULL, NULL, 0.00, 0.00),
	(23, 3, 2, NULL, 1, NULL, 12, 13, NULL, NULL, 0.00, 0.00),
	(24, 3, 2, NULL, 1, NULL, 6, 33, NULL, NULL, 0.00, 0.00),
	(25, 3, 3, NULL, 1, NULL, 6, 10, NULL, NULL, 0.00, 0.00),
	(26, 3, 3, NULL, 1, NULL, 1, 20, NULL, NULL, 0.00, 0.00),
	(27, 3, 3, NULL, 1, NULL, 12, 13, NULL, NULL, 0.00, 0.00),
	(28, 3, 3, NULL, 1, NULL, 6, 33, NULL, NULL, 0.00, 0.00),
	(29, 4, 2, NULL, 1, NULL, 5, 22, NULL, NULL, 0.00, 0.00),
	(30, 4, 3, NULL, 1, NULL, 5, 22, NULL, NULL, 0.00, 0.00),
	(31, 5, 1, NULL, 1, NULL, 6, 112, NULL, NULL, 0.00, 0.00),
	(32, 5, 1, NULL, 1, NULL, 2, 123, NULL, NULL, 0.00, 0.00);
/*!40000 ALTER TABLE `compra_item_cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_item_ordem_compra
CREATE TABLE IF NOT EXISTS `compra_item_ordem_compra` (
  `id_item_ordem_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_item_ordem_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_item_ordem_compra: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_item_ordem_compra` DISABLE KEYS */;
INSERT INTO `compra_item_ordem_compra` (`id_item_ordem_compra`, `id_ordem_compra`, `id_produto`, `qtde`, `valor`, `subtotal`) VALUES
	(28, 2, 6, 2, 234.00, 468.00),
	(29, 3, 2, 2, 245.00, 490.00),
	(30, 3, 6, 13, 123.00, 1599.00),
	(31, 2, 4, 3, 33.00, 99.00),
	(33, 2, 2, 33, 124.00, 4092.00),
	(34, 2, 6, 234, 555.00, 129870.00);
/*!40000 ALTER TABLE `compra_item_ordem_compra` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_ordem_compra
CREATE TABLE IF NOT EXISTS `compra_ordem_compra` (
  `id_ordem_compra` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_status_ordem_compra` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_cotacao` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `data_atendimento` date DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `data_utl_parcela` date DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `avulsa` varchar(1) DEFAULT NULL,
  `finalizada` varchar(1) DEFAULT NULL,
  `qtde_parcela` int(11) DEFAULT NULL,
  `data_parc01` date DEFAULT NULL,
  `valor_parc01` decimal(10,2) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_parcela` decimal(10,2) DEFAULT NULL,
  `id_forma_pagto` int(11) DEFAULT NULL,
  `qtde_dias` int(11) DEFAULT NULL,
  `intervalo_entre_parcela` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ordem_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_ordem_compra: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_ordem_compra` DISABLE KEYS */;
INSERT INTO `compra_ordem_compra` (`id_ordem_compra`, `id_status_ordem_compra`, `id_fornecedor`, `id_cotacao`, `data_emissao`, `data_aprovacao`, `data_atendimento`, `data_entrada`, `data_utl_parcela`, `valor_total`, `avulsa`, `finalizada`, `qtde_parcela`, `data_parc01`, `valor_parc01`, `data_vencimento`, `valor_parcela`, `id_forma_pagto`, `qtde_dias`, `intervalo_entre_parcela`) VALUES
	(2, 2, 1, NULL, '2022-05-26', NULL, NULL, NULL, NULL, 134529.00, 's', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 4, NULL, '2022-05-30', NULL, NULL, NULL, NULL, 2089.00, 's', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `compra_ordem_compra` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_solicitacao
CREATE TABLE IF NOT EXISTS `compra_solicitacao` (
  `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) DEFAULT NULL,
  `id_status_solicitacao` int(11) DEFAULT NULL,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_ordem_producao` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `data_solicitacao` date DEFAULT NULL,
  `hora_solicitacao` time DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `id_usuario_solicitou` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_solicitacao`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_solicitacao: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_solicitacao` DISABLE KEYS */;
INSERT INTO `compra_solicitacao` (`id_solicitacao`, `id_produto`, `id_status_solicitacao`, `id_ordem_compra`, `id_ordem_producao`, `id_fornecedor`, `qtde`, `data_solicitacao`, `hora_solicitacao`, `data_entrega`, `id_usuario_solicitou`) VALUES
	(8, 2, 2, NULL, NULL, NULL, 10, '2022-05-17', '18:23:00', NULL, 2),
	(9, 6, 2, NULL, NULL, NULL, 15, '2022-05-17', '18:23:00', NULL, 2),
	(10, 5, 2, NULL, NULL, NULL, 12, '2022-05-17', '18:24:00', NULL, 2),
	(11, 1, 2, NULL, NULL, NULL, 145, '2022-05-17', '18:27:00', NULL, 2),
	(12, 2, 2, NULL, NULL, NULL, 10, '2022-05-19', '21:12:00', NULL, 2),
	(13, 1, 2, NULL, NULL, NULL, 15, '2022-05-19', '21:12:00', NULL, 2),
	(14, 6, 2, NULL, NULL, NULL, 10, '2022-05-20', '14:46:00', NULL, 2),
	(15, 1, 2, NULL, NULL, NULL, 20, '2022-05-20', '14:46:00', NULL, 2),
	(16, 12, 2, NULL, NULL, NULL, 13, '2022-05-20', '14:46:00', NULL, 2),
	(17, 6, 2, NULL, NULL, NULL, 33, '2022-05-23', '19:41:00', NULL, 2),
	(18, 5, 2, NULL, NULL, NULL, 22, '2022-05-23', '19:42:00', NULL, 2),
	(19, 6, 2, NULL, NULL, NULL, 112, '2022-05-24', '22:32:00', NULL, 2),
	(20, 2, 2, NULL, NULL, NULL, 123, '2022-05-24', '22:33:00', NULL, 2);
/*!40000 ALTER TABLE `compra_solicitacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_solicitacao_cotacao
CREATE TABLE IF NOT EXISTS `compra_solicitacao_cotacao` (
  `id_solicitacao_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitacao` int(11) DEFAULT NULL,
  `id_cotacao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_solicitacao_cotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_solicitacao_cotacao: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_solicitacao_cotacao` DISABLE KEYS */;
INSERT INTO `compra_solicitacao_cotacao` (`id_solicitacao_cotacao`, `id_solicitacao`, `id_cotacao`) VALUES
	(12, 8, 1),
	(14, 10, 1),
	(16, 9, 1),
	(17, 11, 1),
	(18, 12, 2),
	(19, 13, 2),
	(30, 14, 3),
	(31, 15, 3),
	(32, 16, 3),
	(33, 17, 3),
	(34, 18, 4),
	(35, 19, 5),
	(36, 20, 5);
/*!40000 ALTER TABLE `compra_solicitacao_cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_status_cotacao
CREATE TABLE IF NOT EXISTS `compra_status_cotacao` (
  `id_status_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `status_cotacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_cotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_status_cotacao: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_status_cotacao` DISABLE KEYS */;
INSERT INTO `compra_status_cotacao` (`id_status_cotacao`, `status_cotacao`) VALUES
	(1, 'Iniciada'),
	(2, 'Aguardando'),
	(3, 'Pronto para Cotar'),
	(4, 'Cotado');
/*!40000 ALTER TABLE `compra_status_cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_status_item_cotacao
CREATE TABLE IF NOT EXISTS `compra_status_item_cotacao` (
  `id_status_item_cotacao` int(11) NOT NULL AUTO_INCREMENT,
  `status_item_cotacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_item_cotacao`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_status_item_cotacao: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_status_item_cotacao` DISABLE KEYS */;
INSERT INTO `compra_status_item_cotacao` (`id_status_item_cotacao`, `status_item_cotacao`) VALUES
	(1, 'Aguardando Cotação'),
	(2, 'Aguardando Aprovação'),
	(3, 'Aprovado'),
	(4, 'Cancelado'),
	(5, 'Rejeitado'),
	(6, 'Não Comercializada'),
	(7, 'Não Atende'),
	(8, 'No Estoque');
/*!40000 ALTER TABLE `compra_status_item_cotacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_status_ordem_compra
CREATE TABLE IF NOT EXISTS `compra_status_ordem_compra` (
  `id_status_ordem_compra` int(11) NOT NULL AUTO_INCREMENT,
  `status_ordem_compra` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_status_ordem_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_status_ordem_compra: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_status_ordem_compra` DISABLE KEYS */;
INSERT INTO `compra_status_ordem_compra` (`id_status_ordem_compra`, `status_ordem_compra`) VALUES
	(1, 'Em Elaboração'),
	(2, 'Aguardando Aprovação'),
	(3, 'Aprovado'),
	(4, 'Autorizado'),
	(5, 'Finalizado'),
	(6, 'Cancelado');
/*!40000 ALTER TABLE `compra_status_ordem_compra` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.compra_status_solicitacao
CREATE TABLE IF NOT EXISTS `compra_status_solicitacao` (
  `id_status_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `status_solicitacao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_status_solicitacao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.compra_status_solicitacao: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_status_solicitacao` DISABLE KEYS */;
INSERT INTO `compra_status_solicitacao` (`id_status_solicitacao`, `status_solicitacao`) VALUES
	(1, 'Em Aberto'),
	(2, 'Em Cotação'),
	(3, 'Em Ordem de Compra'),
	(4, 'En Estoque'),
	(5, 'Cancelado');
/*!40000 ALTER TABLE `compra_status_solicitacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `eh_cliente` varchar(1) DEFAULT NULL,
  `eh_fornecedor` varchar(1) DEFAULT NULL,
  `eh_transportador` varchar(1) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nome_fantasia` varchar(50) DEFAULT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `numero` varchar(40) DEFAULT NULL,
  `complemento` varchar(140) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `rg` varchar(50) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `ie` varchar(50) DEFAULT NULL,
  `bairro` varchar(250) DEFAULT NULL,
  `cidade` varchar(150) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `celular` varchar(150) DEFAULT NULL,
  `fone` varchar(150) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  PRIMARY KEY (`id_contato`) USING BTREE,
  KEY `id_contato_estado` (`id_estado`),
  CONSTRAINT `id_contato_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.contato: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`id_contato`, `id_estado`, `usuario`, `local`, `eh_cliente`, `eh_fornecedor`, `eh_transportador`, `nome`, `nome_fantasia`, `endereco`, `numero`, `complemento`, `cep`, `cpf`, `rg`, `cnpj`, `ie`, `bairro`, `cidade`, `uf`, `email`, `celular`, `fone`, `senha`, `data_cadastro`) VALUES
	(1, NULL, NULL, 'IMPORTACAO SP', NULL, 'S', NULL, 'LEBEN INDUSTRIA DE EQUIPAMENTOS ELETRO', 'LEBEN INDUSTRIA DE EQUIPAMENTOS ELETRO', 'R RIO CONGO, 62', '62', '', '13904-390', NULL, '', '40.685.268/0001-29', '', 'JARDIM FIGUEIRA', 'AMPARO', 'SP', 'VENDAS02@SALUSBRASIL.COM.BR', '(19) 3808-5108', '(19) 3808-5108', '123', '2022-01-13'),
	(2, NULL, NULL, 'RENTALMED COS.', NULL, 'S', NULL, 'N.M.B. CENTRO ESTETICO EIRELI', 'N.M.B. CENTRO ESTETICO EIRELI', 'AVENIDA MARCOLINO MARTINS CABRAL', '1674  ', 'EDIF BELO HORIZ', '88705-000', NULL, '', '33.148.237/0001-73', '', 'VILA MOEMA', 'TUBARAO', 'SC', 'nmbcentroestetico@hotmail.com', '(48) 9910-3999', '(48) 9910-3999', '123', '2022-01-13'),
	(4, NULL, NULL, 'RENTALMED COS.', NULL, 'S', 'S', 'ARLETE TRANSPORTES LTDA', 'ARLETE TRANSPORTES LTDA', 'RUA RONEI HENRIQUE HEIDERSCHEIDT', '63', 'GALPÃO 1', '88133-901', NULL, '', '72.090.442/0006-91', '', 'JARDIM ELDORADO', 'PALHOÇA', 'SC', 'marketing@rentalmed.com.br', '(48) 3285-6413', '(48) 3285-6413', '', '2022-01-12'),
	(6, NULL, NULL, 'RENTALMED COS.', NULL, 'S', NULL, 'CASA DAS MANGUEIRAS E BORRACHAS SILVY', 'CASA DAS MANGUEIRAS E BORRACHAS SILVY', 'Rua Águas Mornas', '98', '', '88110-520', NULL, '', '00.118.474/0001-32', '', 'Bela Vista', 'São José', 'SC', 'mangueirassilvy@hotmail.com', '(48) 3346-2222', '(48) 3346-2222', '', '2022-01-04');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.datasdoano
CREATE TABLE IF NOT EXISTS `datasdoano` (
  `id_data` bigint(20) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.datasdoano: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `datasdoano` DISABLE KEYS */;
INSERT INTO `datasdoano` (`id_data`, `data`) VALUES
	(1, '2022-03-18'),
	(2, '2022-03-19'),
	(3, '2022-03-20'),
	(4, '2022-03-21'),
	(5, '2022-03-22'),
	(6, '2022-03-23'),
	(7, '2022-03-24'),
	(8, '2022-03-25'),
	(9, '2022-03-26');
/*!40000 ALTER TABLE `datasdoano` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.diasuteis
CREATE TABLE IF NOT EXISTS `diasuteis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_ing` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.diasuteis: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `diasuteis` DISABLE KEYS */;
INSERT INTO `diasuteis` (`id`, `data_ing`) VALUES
	(1, '2022-03-22'),
	(2, '2022-03-23'),
	(3, '2022-03-24'),
	(4, '2022-03-25'),
	(5, '2022-03-26'),
	(6, '2022-03-27'),
	(7, '2022-03-28'),
	(8, '2022-03-29'),
	(9, '2022-03-30'),
	(10, '2022-03-31'),
	(11, '2022-04-01'),
	(12, '2022-04-02'),
	(13, '2022-04-03'),
	(14, '2022-04-04'),
	(15, '2022-04-05'),
	(16, '2022-04-06');
/*!40000 ALTER TABLE `diasuteis` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.entrada_avulsa
CREATE TABLE IF NOT EXISTS `entrada_avulsa` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `qtde_entrada` int(11) NOT NULL,
  `valor_entrada` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal_entrada` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT 2,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_entrada`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.entrada_avulsa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `entrada_avulsa` DISABLE KEYS */;
INSERT INTO `entrada_avulsa` (`id_entrada`, `id_produto`, `id_localizacao`, `qtde_entrada`, `valor_entrada`, `subtotal_entrada`, `data_entrada`, `hora_entrada`, `id_usuario`, `data_cadastro`) VALUES
	(27, 12, 6, 10, 123.00, 1230.00, '2022-05-04', '19:40:00', 2, '2022-05-04 14:40:42'),
	(28, 12, 10, 12, 123.00, 1476.00, '2022-05-04', '19:41:00', 2, '2022-05-04 14:41:37');
/*!40000 ALTER TABLE `entrada_avulsa` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(150) DEFAULT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.estado: ~23 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id_estado`, `estado`, `sigla`) VALUES
	(1, 'Acre', 'AC'),
	(2, 'Alagoas', 'AL'),
	(3, 'Amazonas', 'AM'),
	(4, 'Amapá', 'AP'),
	(5, 'Bahia', 'BA'),
	(6, 'Ceará', 'CE'),
	(7, 'Distrito Federal', 'DF'),
	(8, 'Goiás', 'GO'),
	(9, 'Maranhão', 'MA'),
	(10, 'Minas Gerais', 'MG'),
	(11, 'Mato Grosso do Sul', 'MS'),
	(12, 'Mato Grosso', 'MT'),
	(13, 'Pará', 'PA'),
	(14, 'Paraíba', 'PB'),
	(15, 'Pernambuco', 'PE'),
	(16, 'Piauí', 'PI'),
	(17, 'Paraná', 'PR'),
	(18, 'Rio de Janeiro', 'RJ'),
	(19, 'Rio Grande do Norte', 'RN'),
	(20, 'Rondônia', 'RO'),
	(21, 'Roraima', 'RR'),
	(22, 'Rio Grande do Sul', 'RS'),
	(23, 'Santa Catarina', 'SC'),
	(24, 'Sergipe', 'SE'),
	(25, 'São Paulo', 'SP'),
	(26, 'Tocantins', 'TO');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.fin_documento_origem
CREATE TABLE IF NOT EXISTS `fin_documento_origem` (
  `id_documento_origem` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `documento_origem` varchar(200) NOT NULL,
  PRIMARY KEY (`id_documento_origem`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.fin_documento_origem: ~67 rows (aproximadamente)
/*!40000 ALTER TABLE `fin_documento_origem` DISABLE KEYS */;
INSERT INTO `fin_documento_origem` (`id_documento_origem`, `codigo`, `sigla`, `documento_origem`) VALUES
	(1, '55', 'NFE', 'Nota Fiscal Eletrônica'),
	(34, '02', 'NFVC', 'Nota Fiscal de Venda a Consumidor  2  '),
	(35, '2D', 'CF', 'Cupom Fiscal   - ECF IF'),
	(36, '2C', 'CFPD', 'Cupom Fiscal   - ECF PDV'),
	(37, '2B', 'CFMR', 'Cupom Fiscal   - ECF MR'),
	(38, '2E', 'CFBP', 'Cupom Fiscal Bilhete de Passagem  '),
	(39, '04', 'NFP', 'Nota Fiscal de Produtor '),
	(40, '06', 'NFCE', 'Nota Fiscal/Conta de Energia Elétrica'),
	(41, '07', 'NFST', 'Nota Fiscal de Serviço de Transporte '),
	(42, '08', 'CTRC', 'Conhecimento de Transporte Rodoviário de cargas'),
	(43, '8B', 'CTCA', 'Conhecimento de Transporte de Cargas Avulso'),
	(44, '09', 'CTAC', 'Conhecimento de Transporte Aquaviário de Cargas'),
	(45, '10', 'CA', 'Conhecimento Aéreo  '),
	(46, '11', 'CTFC', 'Conhecimento de Transporte Ferroviário de Cargas'),
	(47, '13', 'BPR', 'Bilhete de Passagem Rodoviário '),
	(48, '14', 'BPA', 'Bilhete de Passagem Aquaviário '),
	(49, '15', 'BPNB', 'Bilhete de Passagem e Nota de Bagagem '),
	(50, '16', 'BPF', 'Bilhete de Passagem Ferroviário '),
	(51, '17', 'DT', 'Despacho de Transporte'),
	(52, '18', 'RMD', 'Resumo de Movimento Diário  '),
	(53, '20', 'OCC', 'Ordem de Coleta de Carga'),
	(54, '21', 'NFSC', 'Nota Fiscal de Serviço de Comunicação  21  '),
	(55, '22', 'NF22', 'Nota Fiscal de Serviços de telecomunicação'),
	(56, '23', 'GNRE', 'Guia Nacional de Recolhimento de Tributos Estaduais'),
	(57, '24', 'ACT', 'Autorização de Carregamento e Transporte'),
	(58, '25', 'MC', 'Manifesto de Carga - Modelo 25'),
	(59, '26', 'CTMC', 'Conhecimento de Transporte Multimodal de  Cargas'),
	(60, '27', 'NFTF', 'Nota Fiscal De Transporte Ferroviário De Cargas+'),
	(61, '28', 'NFFG', 'Nota Fiscal/Conta de Fornecimento de Gás Canalizado'),
	(62, '29', 'NFFA', 'Nota Fiscal/Conta de Fornecimento de Água Canalizada'),
	(63, '55', 'NFE', 'Nota Fiscal Eletrônica '),
	(64, '57', 'CTE', 'Conhecimento de Transporte Eletrônico (CT-e) '),
	(65, '101', 'CHQP', 'Cheque Próprio'),
	(66, '102', 'CHQT', 'Cheque de Terceiros'),
	(67, '103', 'CHQA', 'Cheque Administrativo'),
	(68, '104', 'DM', 'Duplicata Mercantil'),
	(69, '105', 'DS', 'Duplicata de Serviços'),
	(70, '106', 'NP', 'Nota Promissória'),
	(71, '107', 'LC', 'Letra de Cambio'),
	(72, '108', 'DB', 'Debênture'),
	(73, '109', 'CA', 'Certificado de Ações '),
	(74, '110', 'TED', 'Transferencia Eletronica de Disponíveis'),
	(75, '111', 'CD', 'Comprovante de Deposito Bancário'),
	(76, '112', 'DOC', 'DOC- Documento de Credito Bancario'),
	(77, '113', 'RPA', 'Recibo de Pagamento a Autonomo'),
	(78, '114', 'DEC', 'Decore'),
	(79, '115', 'RPS', 'Recibo de Pagamento de Salario'),
	(80, '116', 'FPG', 'Folha de Pagamento'),
	(81, '117', 'RECB', 'Recibo'),
	(82, '118', 'EXT', 'Extrato Bancário'),
	(83, '119', 'NLB', 'Noficação de Lançamento Bancario'),
	(84, '120', 'TRCT', 'Termo de Recisão de Contrato de Trabalho'),
	(85, '121', 'CIFI', 'Commercial Invoice - Fatura Internacional'),
	(86, '122', 'DARF', 'DARF - Documento de Arrecadação da Receita Federal'),
	(87, '123', 'GPS', 'GPS - Guia da Previdencia Social'),
	(88, '124', 'DAS', 'DAS - Documento de Arrecadação do Simples Nacional'),
	(89, '125', 'DAE', 'DAE - Documento de Arrecadação Estadual '),
	(90, '126', 'GFIP', 'GFIP - Guia de Declaraçao e Informação da Previdencia Social'),
	(91, '127', 'GRRF', 'GRRF - Guia da Multa  Recolhimento Rescisória'),
	(92, '128', 'GRF', 'GRF - Guia de Recolhimento do FGTS'),
	(93, '129', 'DAJ', 'DAJ - Documento de Arrecadação Judiciária'),
	(94, '130', 'NFS', 'Nota Fiscal de Prestação de Serviços'),
	(95, '131', 'DAMM', 'DAM - Documento de Arrecadação Municipal'),
	(96, '132', 'DAMJ', 'DAM - Documento de Arrecadação da Junta Comercial'),
	(97, '133', 'GRCS', 'GRCS- Guia de Recolhimento da Contribuição Sindical'),
	(98, '134', 'BB', 'Boleto Bancario'),
	(99, '135', 'DI', 'Declaração de Importacao - DI');
/*!40000 ALTER TABLE `fin_documento_origem` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id_fornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome_fornecedor` varchar(250) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.fornecedor: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`id_fornecedor`, `nome_fornecedor`, `celular`, `email`) VALUES
	(1, 'IBRAMED', 47996676333, 'profmoreck@hotmail.com'),
	(2, 'HTM', 47996676333, 'profmoreck@hotmail.com'),
	(3, 'KLD', 47996676333, 'profmoreck@hotmail.com'),
	(4, 'KLDE', 47996676333, 'profmoreck@hotmail.com');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.images_info
CREATE TABLE IF NOT EXISTS `images_info` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_anexo` varchar(50) NOT NULL DEFAULT '0',
  `id_chamado` int(11) NOT NULL DEFAULT 0,
  `image_path` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`image_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.images_info: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `images_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `images_info` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.localizacao
CREATE TABLE IF NOT EXISTS `localizacao` (
  `id_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `localizacao` varchar(50) NOT NULL,
  `cep_unidade` varchar(9) NOT NULL DEFAULT '',
  `rua_unidade` varchar(280) NOT NULL DEFAULT '',
  `numero_unidade` varchar(30) NOT NULL DEFAULT '',
  `complemento_unidade` varchar(80) NOT NULL DEFAULT '',
  `bairro_unidade` varchar(100) NOT NULL DEFAULT '',
  `cidade_unidade` varchar(150) NOT NULL,
  `uf_unidade` varchar(2) NOT NULL,
  `galpao` varchar(1) DEFAULT 'N',
  `id_usuario` int(11) NOT NULL DEFAULT 2,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_localizacao`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.localizacao: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `localizacao` DISABLE KEYS */;
INSERT INTO `localizacao` (`id_localizacao`, `localizacao`, `cep_unidade`, `rua_unidade`, `numero_unidade`, `complemento_unidade`, `bairro_unidade`, `cidade_unidade`, `uf_unidade`, `galpao`, `id_usuario`, `data_cadastro`) VALUES
	(2, 'Galpão 01', '02022-010', 'Avenida Braz Leme', '1645', 'ap 13', 'Santana', 'São Paulo', 'SP', 'S', 2, '2022-04-27 11:20:42'),
	(3, 'Galpão 02', '0', '0', '', '', '0', '', '', 'N', 2, '2022-04-27 10:01:44'),
	(4, 'Galpão 03', '0', '0', '', '', '0', '', '', 'N', 2, '2022-04-27 10:01:44'),
	(5, 'Galpão Geral', '0', '0', '', '', '0', '', '', 'N', 2, '2022-04-27 10:01:44'),
	(6, 'Galpão São Paulo', '0', '0', '', '', '0', '', '', 'N', 2, '2022-04-27 10:01:44'),
	(7, 'Expedição', '0', '0', '', '', '0', '', '', 'N', 2, '2022-04-27 10:01:44'),
	(8, 'Amparo', '13900-029', 'Praça Tenente José Ferraz de Oliveira', '125', '', 'Centro', 'Amparo', 'SP', 'S', 2, '2022-04-27 11:20:12'),
	(9, 'Galpão São Paulo', '05061-150', 'Rua Cerro Corá', '1645', '', 'Vila Romana', 'São Paulo', 'SP', 'N', 2, '2022-04-27 11:18:12'),
	(10, 'Amparo', '13900-029', 'Praça Tenente José Ferraz de Oliveira', '125', '', 'Centro', 'Amparo', 'SP', 'S', 2, '2022-04-27 11:19:30');
/*!40000 ALTER TABLE `localizacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.movimento
CREATE TABLE IF NOT EXISTS `movimento` (
  `id_movimento` int(11) NOT NULL AUTO_INCREMENT,
  `id_localizacao` int(11) DEFAULT NULL,
  `id_tipo_movimento` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_entrada_avulsa` int(11) DEFAULT NULL,
  `id_saida_avulsa` int(11) DEFAULT NULL,
  `id_ordem_producao` int(11) DEFAULT NULL,
  `id_transferencia` int(11) DEFAULT NULL,
  `entrada_saida` varchar(1) NOT NULL DEFAULT '',
  `data_movimento` date NOT NULL,
  `qtde_movimento` int(11) NOT NULL DEFAULT 0,
  `valor_movimento` decimal(10,2) NOT NULL,
  `subtotal_movimento` decimal(10,2) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `saldoestoque` int(11) NOT NULL,
  PRIMARY KEY (`id_movimento`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.movimento: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `movimento` DISABLE KEYS */;
INSERT INTO `movimento` (`id_movimento`, `id_localizacao`, `id_tipo_movimento`, `id_produto`, `id_ordem_compra`, `id_pedido`, `id_entrada_avulsa`, `id_saida_avulsa`, `id_ordem_producao`, `id_transferencia`, `entrada_saida`, `data_movimento`, `qtde_movimento`, `valor_movimento`, `subtotal_movimento`, `descricao`, `saldoestoque`) VALUES
	(34, 6, 1, 12, NULL, NULL, 27, NULL, NULL, NULL, 'E', '2022-05-04', 10, 123.00, 1230.00, 'Entrada Avulsa ID: 27', 10),
	(35, 10, 1, 12, NULL, NULL, 28, NULL, NULL, NULL, 'E', '2022-05-04', 12, 123.00, 1476.00, 'Entrada Avulsa ID: 28', 22),
	(36, 6, 5, 12, NULL, NULL, NULL, 5, NULL, NULL, 'S', '2022-05-04', 3, 123.00, 369.00, 'Saida Avulsa ID: 5', 19),
	(37, 6, 11, 12, NULL, NULL, NULL, NULL, NULL, 9, 'S', '2022-05-04', 5, 0.00, 0.00, 'Transferencia Saída ID: 9', 0),
	(38, 10, 12, 12, NULL, NULL, NULL, NULL, NULL, 9, 'E', '2022-05-04', 5, 0.00, 0.00, 'Transferencia Entrada ID: 9', 0),
	(39, 6, 11, 12, NULL, NULL, NULL, NULL, NULL, 13, 'S', '2022-05-04', 2, 0.00, 0.00, 'Transferencia Saída ID: 13', 0),
	(40, 10, 12, 12, NULL, NULL, NULL, NULL, NULL, 13, 'E', '2022-05-04', 2, 0.00, 0.00, 'Transferencia Entrada ID: 13', 0),
	(41, 6, 11, 12, NULL, NULL, NULL, NULL, NULL, 15, 'S', '2022-05-04', 1, 0.00, 0.00, 'Transferencia Saída ID: 15', 0),
	(42, 10, 12, 12, NULL, NULL, NULL, NULL, NULL, 15, 'E', '2022-05-04', 1, 0.00, 0.00, 'Transferencia Entrada ID: 15', 0),
	(43, 6, 11, 12, NULL, NULL, NULL, NULL, NULL, 25, 'S', '2022-05-04', 2, 0.00, 0.00, 'Transferencia Saída ID: 25', 0),
	(44, 10, 12, 12, NULL, NULL, NULL, NULL, NULL, 25, 'E', '2022-05-04', 2, 0.00, 0.00, 'Transferencia Entrada ID: 25', 0),
	(45, 10, 11, 12, NULL, NULL, NULL, NULL, NULL, 26, 'S', '2022-05-04', 10, 0.00, 0.00, 'Transferencia Saída ID: 26', 0),
	(46, 6, 12, 12, NULL, NULL, NULL, NULL, NULL, 26, 'E', '2022-05-04', 10, 0.00, 0.00, 'Transferencia Entrada ID: 26', 0),
	(47, 6, 12, 12, NULL, NULL, NULL, NULL, NULL, 26, 'E', '2022-05-04', 10, 0.00, 0.00, 'Transferencia Entrada ID: 26', 0);
/*!40000 ALTER TABLE `movimento` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvendas_status_atendimento
CREATE TABLE IF NOT EXISTS `posvendas_status_atendimento` (
  `id_status_atendimento` int(11) NOT NULL AUTO_INCREMENT,
  `posvendas_status_atendimento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `classe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_status_atendimento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvendas_status_atendimento: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `posvendas_status_atendimento` DISABLE KEYS */;
INSERT INTO `posvendas_status_atendimento` (`id_status_atendimento`, `posvendas_status_atendimento`, `classe`) VALUES
	(1, 'Interno', 'btn-primary'),
	(2, 'Cliente', 'btn-secondary'),
	(3, 'Transportadora', 'btn-danger'),
	(4, 'Fabricante', 'btn-warning'),
	(5, 'Em andamento', 'btn-info'),
	(6, 'Concluído', 'btn-success'),
	(7, 'Remessa de Conserto', 'btn-secondary');
/*!40000 ALTER TABLE `posvendas_status_atendimento` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_agenda
CREATE TABLE IF NOT EXISTS `posvenda_agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `color` varchar(10) NOT NULL,
  `textcolor` varchar(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_agenda: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_agenda` DISABLE KEYS */;
INSERT INTO `posvenda_agenda` (`id`, `title`, `color`, `textcolor`, `start`, `end`) VALUES
	(1, 'Aula Ildo', '#65E687', '#ffffff', '2022-03-30 00:00:00', '2022-04-03 00:00:00'),
	(2, 'Aula Vanessa 1', '#FCFB62', '#000000', '2022-04-04 00:00:00', '2022-04-06 00:00:00'),
	(3, 'Sabrina', '#FFA823', '#ffffff', '2022-04-07 15:00:00', '2022-04-08 19:00:00');
/*!40000 ALTER TABLE `posvenda_agenda` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_anexo_chamado
CREATE TABLE IF NOT EXISTS `posvenda_anexo_chamado` (
  `id_anexo_chamado` int(11) DEFAULT NULL,
  `id_chamado` int(11) DEFAULT NULL,
  `anexos_posvenda_chamados` int(11) DEFAULT NULL,
  `id_posvenda_chamado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvenda_anexo_chamado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_anexo_chamado` DISABLE KEYS */;
/*!40000 ALTER TABLE `posvenda_anexo_chamado` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_chamado
CREATE TABLE IF NOT EXISTS `posvenda_chamado` (
  `id_chamado` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_status_atendimento` int(11) DEFAULT NULL,
  `obs_fechamento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_fechamento` int(11) DEFAULT NULL,
  `num_pedido` int(11) DEFAULT NULL,
  `id_incidente` int(11) DEFAULT NULL,
  `id_resposta_padrao` int(11) DEFAULT NULL,
  `id_prioridade` int(11) DEFAULT 1,
  `descricao` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `assunto_chamado` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `data_abertura` timestamp NULL DEFAULT current_timestamp(),
  `data_atualizacao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_fechamento` date DEFAULT NULL,
  `somatoria` int(11) DEFAULT 1,
  PRIMARY KEY (`id_chamado`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.posvenda_chamado: ~229 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_chamado` DISABLE KEYS */;
INSERT INTO `posvenda_chamado` (`id_chamado`, `id_cliente`, `id_status_atendimento`, `obs_fechamento`, `id_usuario`, `id_marca`, `id_fechamento`, `num_pedido`, `id_incidente`, `id_resposta_padrao`, `id_prioridade`, `descricao`, `assunto_chamado`, `imagem`, `id_notificacao`, `data_abertura`, `data_atualizacao`, `data_fechamento`, `somatoria`) VALUES
	(1, 1, 6, 'PEDIDO DESPACHADO', 1, 2, 1, 20615, 5, 1, 1, NULL, 'APLICADOR ETHERNIA COLD: 0015CFB025891021 - CANCELAMENTO INDICADA COMPRA DE APARELHO QUE CLIENTE JÁ TINHA', NULL, 2, '2022-02-16 16:53:29', '2022-04-14 16:53:29', '2022-04-14', 1),
	(2, 2, 6, 'Cliente informa ter recebido o equipamento em 10/0', 1, 2, 1, 20030, 4, 1, 1, NULL, 'NOVO EFFECT - Nº SERIE 299942', NULL, 2, '2022-02-25 11:44:56', '2022-03-11 11:44:56', '2022-03-11', 1),
	(3, 3, 6, 'Cliente não deu retorno de quando estaria encaminh', 4, 2, 1, 14527, 4, 1, 1, NULL, 'BEAUTY SHAPE: 276279 ', NULL, 2, '2022-02-11 18:36:40', '2022-03-23 18:36:40', '2022-03-23', 1),
	(4, 4, 6, 'Houve varias tentativas de contato com o cliente s', 4, 1, 2, 17739, 4, 1, 1, NULL, 'DERMOTONUS SLIM : 800570018', NULL, 2, '2022-02-23 16:36:48', '2022-03-09 16:36:48', '2022-03-09', 1),
	(5, 5, 6, 'Aparelho recebido em 09/03', 1, 1, 1, 21345, 1, 0, 1, NULL, 'STRIAT: 852330015 - NOVO PEDIDO 22266', NULL, 0, '2022-03-02 12:52:06', '2022-03-10 12:52:06', '2022-03-09', 1),
	(6, 6, 6, 'Cliente está em contato direto com vendedora Maeve', 4, 2, 1, 20718, 4, 0, 1, NULL, 'STIMULUS  FACE MAXX : 281044', NULL, 0, '2022-02-21 00:00:00', '2022-03-07 15:02:06', '2022-03-07', 1),
	(7, 7, 6, 'Cliente recebeu equipamento, tudo ok', 4, 1, 1, 19406, 4, 0, 1, NULL, ' POLARYS : 810620004', NULL, 0, '2022-03-03 11:42:37', '2022-03-30 11:42:37', '2022-03-30', 1),
	(8, 8, 6, '16/03/2022- concluída com duvidas sanadas pela pró', 4, 2, 1, 20532, 4, 0, 1, NULL, 'NOVO EFFECT - Nº SERIE 304242', NULL, 0, '2022-02-14 15:18:37', '2022-03-16 15:18:37', '2022-03-16', 1),
	(9, 9, 6, 'cliente não deu retorno.', 4, 1, 2, 18873, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE NEARTEK ESTHETIC: 785450021', NULL, 0, '2022-02-16 11:23:48', '2022-03-30 11:23:48', '2022-03-30', 1),
	(10, 10, 6, '', 4, 2, 0, 18048, 4, 0, 1, NULL, 'EFFECT:287933', NULL, 0, '2022-03-03 00:00:00', '2022-03-08 13:28:33', '2022-03-07', 1),
	(11, 11, 6, 'Cliente recebeu aparelho e esta tudo OK', 4, 4, 1, 8655, 4, 0, 1, NULL, 'ETHERNIA- 0171COS0001990920', NULL, 0, '2022-02-23 10:34:44', '2022-03-18 10:34:44', '2022-03-18', 1),
	(12, 12, 6, 'Cliente confirma ter recebido a caneta.', 3, 6, 1, 22116, 4, 0, 1, NULL, 'SMART DERMA PEN - 21-K-T0065', NULL, 0, '2022-03-02 10:17:55', '2022-03-22 10:17:55', '2022-03-22', 1),
	(13, 14, 6, 'Cliente recebeu os manípulos', 1, 2, 1, 20028, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE  NEARTEK ESTHETIC : 785450015', NULL, 0, '2022-02-28 10:11:32', '2022-03-11 10:11:32', '2022-03-11', 1),
	(14, 13, 6, 'Aparelho retorno para nosso estoque CD de Amparo.', 1, 2, 1, 22370, 1, 0, 1, NULL, 'LIGHT PULSE - Nº SERIE 291845 - ', NULL, 0, '2022-03-04 14:44:58', '2022-03-18 14:44:58', '2022-03-18', 1),
	(15, 15, 6, 'Cliente informa que levou as manoplas para arrumar', 1, 1, 1, 20261, 4, 0, 1, NULL, 'POLARYS + 3 APLICADORES', NULL, 0, '2022-03-03 00:00:00', '2022-03-07 16:16:37', '2022-03-07', 1),
	(16, 16, 6, 'aplicadores recebidos em 24/01', 4, 1, 1, 18820, 4, 0, 1, NULL, 'NEARTEK ESTHETIC - Nº SERIE 785460002 / TROCA DE PONTEIRAS (TECARTERAPIA)', NULL, 0, '2022-02-09 11:09:03', '2022-03-30 11:09:03', '2022-03-30', 1),
	(17, 17, 6, 'Aparelho recebido em nosso CD', 1, 2, 1, 21596, 5, 0, 1, NULL, 'ÁCRUS  308871 - CANCELAMENTO', NULL, 0, '2022-02-16 14:58:14', '2022-03-18 14:58:14', '2022-03-18', 1),
	(18, 18, 6, 'Cliente recebeu o equipamento', 4, 1, 1, 22144, 1, 0, 1, NULL, 'DERMOTONUS SLIM - Nº SERIE 819360005 - NOVO PEDIDO 22355', NULL, 0, '2022-02-22 17:06:26', '2022-03-17 17:06:26', '2022-03-15', 1),
	(19, 19, 6, 'Análise do equipamento concluída e não identificad', 4, 2, 1, 18110, 4, 0, 1, NULL, ' BEAUTY SHAPE; 289668', NULL, 0, '2022-03-07 00:00:00', '2022-03-08 14:58:46', '2022-03-07', 1),
	(20, 20, 6, 'Aplicador consertado e despachado via correios par', 4, 1, 1, 16606, 4, 0, 1, NULL, 'POLARYS :  Apl. M = 792650005', NULL, 0, '2022-02-11 16:40:25', '2022-03-08 16:40:25', '2022-03-08', 1),
	(21, 21, 6, '', 4, 1, 0, 20148, 4, 0, 1, NULL, 'POLARYS Apl. M = 798940014', NULL, 0, '2022-03-03 00:00:00', '2022-03-08 13:28:41', '2022-03-07', 1),
	(22, 22, 6, 'CLIENTE RECEBEU APARELHO NO FINAL DO DIA 10/03/202', 4, 1, 1, 19452, 4, 0, 1, NULL, 'THORK - Nº SERIE 803820008', NULL, 0, '2022-01-18 09:36:24', '2022-03-17 10:37:00', '2022-03-11', 1),
	(23, 23, 6, 'Cliente recebeu aplicadores em 10/03/2022', 4, 2, 1, 20661, 4, 0, 1, NULL, 'BEAUTY SHAPE DUO - Nº SERIE 301432', NULL, 0, '2022-02-11 09:29:39', '2022-03-11 09:29:39', '2022-03-11', 1),
	(24, 24, 6, 'Cliente informou em 08/03/2022, ter recebido o equ', 4, 2, 1, 21665, 4, 0, 1, NULL, 'FLUENCE - SEM APLICADOR - Nº SERIE 300078', NULL, 0, '2022-02-14 00:00:00', '2022-03-08 09:52:33', '2022-03-08', 1),
	(25, 25, 6, 'Em 05/03/2022 cliente informa ter recebido  o equi', 4, 9, 1, 21850, 4, 0, 1, NULL, 'DERMA SCAN FULL BRANCO: 612439', NULL, 0, '2022-02-22 00:00:00', '2022-03-07 16:04:17', '2022-03-07', 1),
	(26, 26, 6, 'cliente não retorno algum referente a informações ', 4, 1, 2, 17969, 4, 0, 1, NULL, 'POLARYS - Nº SERIE 810630004 ', NULL, 0, '2022-03-04 11:20:52', '2022-03-30 11:20:52', '2022-03-30', 1),
	(27, 27, 6, 'A ponteira chegou ate a cliente', 4, 1, 1, 21433, 4, 0, 1, NULL, 'THORK IBRAMED - Nº SERIE 841240015   ', NULL, 0, '2022-02-16 13:39:50', '2022-03-22 13:39:50', '2022-03-22', 1),
	(28, 28, 6, 'O fabricante informou ter resolvido diretamente co', 4, 3, 1, 20907, 4, 0, 1, NULL, 'ARTIS G3 STANDARD - Nº SERIE F085814*', NULL, 0, '2022-02-15 00:00:00', '2022-03-07 17:48:22', '2022-03-07', 1),
	(29, 29, 6, 'Foi repassado os dados do Pendrive para a cliente', 4, 3, 1, 12320, 4, 0, 1, NULL, 'OXY SEM VÁCUO TONEDERM F086440 PEN DRIVE', NULL, 0, '2022-02-15 00:00:00', '2022-03-07 18:00:22', '2022-03-07', 1),
	(30, 30, 6, 'Em 02/03 cliente informa ter recebido o equipament', 4, 4, 1, 21549, 1, 0, 1, NULL, 'SUPORTE ULTRAMED: 0194UMH0356560122', NULL, 0, '2022-02-10 00:00:00', '2022-03-07 18:26:24', '2022-03-07', 1),
	(31, 31, 6, 'Cliente não deu retorno', 4, 1, 1, 17489, 4, 0, 1, NULL, 'POLARYS : 810630003', NULL, 0, '2022-02-09 17:12:59', '2022-04-05 17:12:59', '2022-04-05', 1),
	(32, 32, 6, 'Cliente não deu retorno de videos', 4, 1, 2, 17605, 4, 0, 1, NULL, 'POLARYS - Apl. G = 812240019', NULL, 0, '2022-02-08 14:06:25', '2022-03-29 14:06:25', '2022-03-29', 1),
	(34, 33, 6, 'Em 23/02 Cliente informa ter recebido o cabo.', 4, 2, 1, 17758, 4, 0, 1, NULL, 'HIBRIDI:284438 ', NULL, 0, '2022-02-11 00:00:00', '2022-03-07 18:23:21', '2022-03-07', 1),
	(35, 34, 6, 'Varias tentativas de contato com o cliente sem êxi', 4, 3, 2, 21380, 4, 0, 1, NULL, 'CANETA PEELING DIAMANTE', NULL, 0, '2022-02-22 13:24:26', '2022-03-08 13:24:26', '2022-03-08', 1),
	(36, 35, 6, 'Equipamento chegou testado  ok', 3, 3, 1, 21261, 4, 0, 1, NULL, 'DIAMANTIS + BOLSA + CILINDRO - Nº SERIE  F092438  ', NULL, 0, '2022-02-16 16:48:49', '2022-04-05 16:48:49', '2022-04-05', 1),
	(37, 36, 6, 'Cliente recebeu RACK em 24/03/2022', 4, 4, 1, 21085, 1, 0, 1, NULL, 'RACK BLACK PARA CRIODERMIS SMART ', NULL, 0, '2022-02-10 09:08:29', '2022-03-24 00:00:00', '2022-03-24', 1),
	(38, 37, 6, 'passado testes para cliente que nunca deu retorno!', 4, 2, 2, 14298, 4, 0, 1, NULL, 'BEAUTY SHAPE : 276266', NULL, 0, '2022-03-01 09:35:27', '2022-03-30 09:35:27', '2022-03-30', 1),
	(39, 38, 7, '', 1, 1, 0, 22010, 1, 0, 1, NULL, 'POLARYS - Nº SERIE	854300003', NULL, 0, '2022-03-02 14:29:37', '2022-04-05 14:29:37', '0000-00-00', 1),
	(41, 40, 6, 'EQUIPAMENTO RECEBIDO!', 4, 5, 1, 13498, 4, 0, 1, NULL, 'Manthus Start / 748440017', NULL, 0, '2022-03-01 15:31:34', '2022-03-23 15:31:34', '2022-03-23', 1),
	(42, 41, 6, 'feita postagem em janeiro', 4, 1, 1, 16399, 1, 0, 1, NULL, 'POLARYS: 810630005 APLICADOR M POLARYS - Nº SERIE 849150012', NULL, 0, '2022-02-09 10:59:50', '2022-03-30 10:59:50', '2022-03-30', 1),
	(43, 42, 6, 'O chamado do cliente foi resolvido', 4, 1, 1, 21468, 4, 0, 2, NULL, 'NÚMERO DE SÉRIE POLARYS ( 2 APLICADOR M + 1 APLICADOR GRANDE ): 0846220002', NULL, 0, '2022-02-09 00:00:00', '2022-05-12 11:11:53', '2022-03-04', 1),
	(44, 43, 6, '[11:49, 21/03/2022] Recebimento Ass HTM Luana: Já ', 1, 2, 1, 22132, 1, 0, 1, NULL, 'APLICADOR MEDIO BEAUTY SHAPE DUO : 296986 - Novo pedido ', NULL, 0, '2022-02-18 11:51:25', '2022-03-21 11:51:25', '2022-03-21', 1),
	(45, 44, 6, '', 4, 1, 0, 0, 6, 0, 1, NULL, 'POLARYS + APLICADOR G POLARYS 820930007 1 + P + M  ( 19451 ) 21155', NULL, 0, '2022-02-09 00:00:00', '2022-03-07 11:51:59', '2022-03-07', 1),
	(46, 46, 6, 'tecnico foi ao cliente fez a troca da placa', 3, 2, 1, 20611, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE ÁCRUS: 291756', NULL, 0, '2022-03-02 11:01:35', '2022-03-14 11:01:35', '2022-03-14', 1),
	(47, 47, 6, 'Aline fez os testes solicitados pelo fabricante, d', 3, 1, 1, 20263, 4, 0, 1, NULL, 'POLARYS : 837920002', NULL, 0, '2022-02-09 11:54:33', '2022-03-18 11:54:33', '2022-03-18', 1),
	(48, 48, 6, '', 4, 1, 0, 17544, 4, 0, 1, NULL, 'POLARYS : 810640004 0780950005', NULL, 0, '2022-02-09 00:00:00', '2022-03-07 13:39:32', '2022-03-07', 1),
	(49, 49, 6, '', 1, 2, 0, 21597, 1, 0, 1, NULL, 'TROCA PARCIAL - STIMULUS PHYSIO 2 CANAIS: 291385 -  NOVO PEDIDO 21914', NULL, 0, '2022-02-07 00:00:00', '2022-03-07 13:46:50', '2022-03-07', 1),
	(50, 50, 6, '', 4, 1, 0, 17257, 4, 0, 1, NULL, 'NEARTEK ESTHETIC: 768970023', NULL, 0, '2022-02-09 00:00:00', '2022-03-07 14:04:43', '2022-03-07', 1),
	(51, 17, 6, '', 4, 2, 0, 20680, 3, 0, 1, NULL, 'ACRUS: 291756', NULL, 0, '2022-02-10 00:00:00', '2022-03-07 14:45:44', '2022-03-07', 1),
	(52, 52, 6, 'ok', 4, 1, 1, 19718, 4, 0, 1, NULL, 'LYRA - Nº SERIE 815570002    ', NULL, 2, '2022-03-03 00:00:00', '2022-03-07 10:14:49', '2022-03-07', 1),
	(53, 53, 6, '', 4, 2, 0, 21114, 4, 0, 1, NULL, 'carrinho ULTRAFOCUS - Nº SERIE 302288', NULL, 0, '2022-02-18 00:00:00', '2022-03-07 15:00:57', '2022-03-07', 1),
	(54, 54, 6, '', 4, 2, 0, 20021, 4, 0, 1, NULL, 'APLICADOR MEDIO BEAUTY SHAPE DUO - Nº SERIE 281992 E 297003', NULL, 0, '2022-02-22 00:00:00', '2022-03-07 15:22:35', '2022-03-07', 1),
	(55, 55, 6, '', 4, 1, 0, 21083, 4, 0, 1, NULL, 'NEARTEK ESTHETIC - Nº SERIE 801400044', NULL, 0, '2022-03-03 00:00:00', '2022-03-07 15:30:52', '2022-03-07', 1),
	(56, 56, 6, '', 4, 1, 0, 21008, 4, 0, 1, NULL, 'POLARYS + 3 APLICADORES - Nº SERIE 810640004', NULL, 0, '2022-02-09 00:00:00', '2022-03-07 15:37:55', '2022-03-07', 1),
	(57, 57, 6, '', 4, 1, 0, 19184, 1, 0, 1, NULL, 'TROCA - APLICADOR M POLARYS:  853850013', NULL, 0, '2022-02-08 00:00:00', '2022-03-07 15:50:55', '2022-03-07', 1),
	(58, 58, 6, '', 4, 1, 0, 18456, 4, 0, 1, NULL, 'LYRA - Nº SERIE 794510004', NULL, 0, '2022-02-08 00:00:00', '2022-03-07 16:13:08', '2022-03-07', 1),
	(59, 59, 6, 'Sem previsão', 4, 1, 1, 16959, 4, 0, 1, NULL, 'APLICADOR M POLARYS - Nº SERIE 853860003', NULL, 0, '2022-02-08 12:02:04', '2022-04-28 12:02:04', '2022-04-28', 1),
	(60, 43, 6, '', 4, 2, 0, 21704, 1, 0, 1, NULL, 'APLICADOR M 296999 E APLICADOR G 303485 - NOVO PEDIDO 22132', NULL, 0, '2022-01-14 00:00:00', '2022-05-10 16:13:05', '2022-03-07', 1),
	(61, 62, 6, 'Cliente fez os testes, as correntes voltaram a fun', 3, 2, 1, 21782, 4, 0, 1, NULL, 'SONIC COMPACT MAXX - Nº SERIE 278239 ', NULL, 0, '2022-02-25 16:40:27', '2022-03-09 16:40:27', '2022-03-09', 1),
	(62, 63, 7, '', 1, 2, 0, 21607, 3, 0, 1, NULL, 'CLUSTER LED AMBAR + LASER INFRAVERMELHO  288310 - NOVO PEDIDO 22148', NULL, 0, '2022-03-03 10:52:00', '2022-04-26 00:00:00', '2022-03-07', 1),
	(63, 65, 6, 'Cliente recebeu o equipamento confirmou esta tudo ', 3, 1, 1, 18377, 4, 0, 1, NULL, 'NÚMERO DE SERIE POLARYS: 810650005', NULL, 0, '2022-03-04 09:40:42', '2022-04-05 09:40:42', '2022-04-05', 1),
	(64, 66, 6, 'Cliente não deu retorno', 4, 1, 2, 16971, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE POLARYS: 803860002 ', NULL, 0, '2022-03-04 12:12:50', '2022-03-30 12:12:50', '2022-03-30', 1),
	(65, 67, 6, 'Equipamento recebido e testado', 3, 2, 1, 15248, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE BEAUTY STEAM 2021 : 272354', NULL, 0, '2022-03-04 16:31:51', '2022-05-10 16:31:51', '2022-05-10', 1),
	(66, 68, 6, 'Cliente levou na Assitencia foi feito o reparo!', 3, 3, 1, 14797, 4, 0, 1, NULL, 'OXY COM VACUO  NÚMERO DE SÉRIE : F090834', NULL, 0, '2022-03-04 10:55:30', '2022-03-24 10:55:30', '2022-03-24', 1),
	(67, 69, 6, 'Cliente teve suporte via telefone, resolvido!!', 3, 1, 1, 21171, 4, 0, 1, NULL, 'DERMOTONUS SLIM - Nº SERIE 814610009', NULL, 0, '2022-03-04 16:53:53', '2022-03-14 16:53:53', '2022-03-14', 1),
	(68, 70, 6, 'Calibragem realizada com sucesso', 4, 2, 1, 20901, 4, 0, 1, NULL, 'BEAUTY SHAPE DUO (APLICADORES\'\')', NULL, 2, '2022-03-07 12:55:53', '2022-04-06 12:55:53', '2022-04-06', 1),
	(71, 72, 6, 'Cliente confirmou o fusível queimado, fez a troca,', 3, 2, 1, 16608, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE STIMULUS FACE MAXX: 268528', NULL, 0, '2022-03-04 10:03:02', '2022-03-09 10:03:02', '2022-03-09', 1),
	(72, 73, 6, 'concluido', 4, 1, 1, 10979, 4, 0, 1, NULL, 'HECCUS: 735180006', NULL, 2, '2022-03-08 12:17:26', '2022-04-28 12:17:26', '2022-04-28', 1),
	(73, 74, 6, 'Volume localizado', 1, 2, 3, 22342, 1, 0, 1, NULL, 'TROCA  - VIBRIA MAXX - Nº SERIE 295114 - EXTRAVIO BRASPRESS - NOVO PEDIDO 22700', NULL, 0, '2022-03-08 14:10:31', '2022-03-24 14:10:31', '2022-03-10', 1),
	(74, 75, 6, 'Cliente não deu retorno', 4, 2, 1, 10256, 4, 0, 1, NULL, 'Ponteira M Beauty Shape Duo 262531', NULL, 2, '2022-03-08 16:48:34', '2022-04-05 16:48:34', '2022-04-05', 1),
	(75, 76, 6, 'Cliente recebeu suas pulseiras TECARE', 4, 2, 1, 20053, 4, 0, 1, NULL, 'TECARE: 305427', NULL, 2, '2022-03-08 08:31:12', '2022-04-04 08:31:12', '2022-04-04', 1),
	(76, 77, 6, 'Cliente não deu retorno após informação recebida', 4, 1, 1, 17783, 4, 0, 1, NULL, ' ARES: 788830022', NULL, 2, '2022-03-08 17:44:32', '2022-04-05 17:44:32', '2022-04-05', 1),
	(77, 78, 2, 'Por falta de comunicação', 3, 2, 2, 21758, 4, 0, 1, NULL, 'BEAUTY STEAM 2021 - Nº SERIE 276666', NULL, 0, '2022-03-08 12:37:28', '2022-04-20 00:00:00', '2022-03-24', 1),
	(78, 79, 6, 'Cliente não deu retorno', 4, 1, 2, 20143, 4, 0, 1, NULL, 'HECCUS TURBO - Nº SERIE 815330002', NULL, 2, '2022-03-08 18:16:06', '2022-03-23 18:16:06', '2022-03-23', 1),
	(79, 80, 6, 'Cliente recebeu aparelho HTM', 1, 1, 1, 22554, 1, 0, 1, NULL, 'DERMOSTEAM 110V - Nº SERIE 816420025 - NOVO PEDIDO 22730 ', NULL, 0, '2022-03-09 14:48:26', '2022-03-22 14:48:26', '2022-03-22', 1),
	(80, 81, 6, 'Cliente recebeu a ventosa!', 3, 2, 1, 22583, 4, 0, 1, NULL, 'BEAUTY DERMO - Nº SERIE 296746', NULL, 0, '2022-03-09 14:09:02', '2022-03-24 14:09:02', '2022-03-23', 1),
	(81, 82, 6, 'Cliente não retornou após fabricante informar que ', 4, 2, 1, 21575, 4, 0, 1, NULL, 'NOVO EFFECT - 293698', NULL, 2, '2022-03-09 16:54:24', '2022-04-05 16:54:24', '2022-04-05', 1),
	(82, 83, 6, 'Suporte recebido', 4, 4, 1, 22349, 4, 0, 1, NULL, 'ULTRAMED HIFU - 5 CARTUCHOS - Nº SERIE 0122UMH0317051221 ', NULL, 2, '2022-03-09 10:45:02', '2022-04-06 10:45:02', '2022-04-06', 1),
	(83, 78, 6, 'Por falta de comunicação e chamado em duplicidade', 3, 2, 2, 21758, 4, 0, 1, NULL, 'BEAUTY STEAM 2021 - Nº SERIE 276666', NULL, 0, '2022-03-09 14:57:02', '2022-03-24 14:57:02', '2022-03-24', 1),
	(84, 85, 6, 'Meu aparelho faz uns 15 dias que não dá problema.', 3, 2, 3, 20449, 4, 0, 1, NULL, 'BEAUTY STEAM 2021 -Nº SERIE	276518', NULL, 0, '2022-03-10 09:25:47', '2022-05-03 09:25:47', '2022-05-03', 1),
	(85, 88, 6, 'Equipamento entregue a cliente', 3, 2, 1, 18450, 4, 0, 1, NULL, 'BEAUTY STEAM 2021 - Nº SERIE 276728', NULL, 0, '2022-03-10 12:11:30', '2022-04-20 12:11:30', '2022-04-20', 1),
	(86, 80, 6, 'Cliente recebeu as pulseiras.', 1, 2, 1, 22554, 4, 0, 1, NULL, 'TECARE	- Nº SERIE 305473', NULL, 0, '2022-03-10 16:27:32', '2022-04-05 16:27:32', '2022-04-05', 1),
	(87, 42, 6, 'Cliente recebeu o aplicador', 3, 1, 1, 21468, 3, 0, 1, NULL, 'APLICADOR G POLARYS: 868800008 - NOVO PEDIDO 22818', NULL, 0, '2022-03-11 16:05:15', '2022-04-05 16:05:15', '2022-04-05', 1),
	(88, 87, 6, 'Cliente levou o equipamento na assitencia chamado ', 1, 1, 1, 14883, 4, 0, 1, NULL, 'DERMOSTEAM 110V -  728630014', NULL, 0, '2022-03-11 16:20:38', '2022-03-28 16:20:38', '2022-03-28', 1),
	(89, 87, 6, 'Eles Entraram em contato já só consigo  ir retirar', 1, 2, 1, 14883, 4, 0, 1, NULL, 'TECARE - 265798', NULL, 0, '2022-03-11 18:18:46', '2022-03-30 18:18:46', '2022-03-30', 1),
	(90, 90, 6, 'Cliente recebeu o equipamento, funcionado perfeita', 3, 2, 1, 21605, 4, 0, 1, NULL, 'BEAUTY STEAM 2021 - Nº SERIE 276447	', NULL, 0, '2022-03-11 16:24:35', '2022-03-22 16:24:35', '2022-03-22', 1),
	(91, 46, 6, 'Chamado resolvido.', 3, 2, 1, 20611, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE ÁCRUS: 291756	 ', NULL, 0, '2022-03-11 11:12:45', '2022-03-24 11:12:45', '2022-03-24', 1),
	(92, 14, 6, 'Equipamento novo entregue a cliente', 3, 1, 1, 20028, 4, 0, 2, NULL, 'NÚMERO DE SÉRIE  NEARTEK ESTHETIC : 785450015', NULL, 0, '2022-03-14 17:16:51', '2022-05-12 11:12:33', '2022-03-18', 1),
	(93, 91, 4, '', 3, 2, 0, 21065, 4, 0, 1, NULL, 'NOVO EFFECT - Nº SERIE 299861', NULL, 0, '2022-03-14 12:21:08', '2022-05-03 00:00:00', '0000-00-00', 1),
	(94, 23, 6, 'Cliente fez envio e já recebeu manípulos que estão', 4, 2, 1, 7248, 4, 0, 1, NULL, 'APLICADOR MEDIO BEAUTY SHAPE DUO - Nº SERIE 299086', NULL, 2, '2022-03-14 18:20:36', '2022-03-23 18:20:36', '2022-03-23', 1),
	(95, 93, 6, 'Cliente pegou o equipamento esta ok', 3, 2, 1, 6108, 8, 0, 1, NULL, 'NÚMERO DE SÉRIE EFFECT: 205562  ', NULL, 0, '2022-03-14 14:07:03', '2022-04-11 14:07:03', '2022-04-11', 1),
	(96, 4, 6, 'passada informações da fabricante para cliente que', 4, 1, 1, 21111, 4, 0, 1, NULL, 'HECCUS TURBO - Nº SERIE 815310010 ', NULL, 2, '2022-03-14 10:40:30', '2022-04-06 10:40:30', '2022-04-06', 1),
	(97, 95, 6, 'Sendo tratado no chamado 130', 4, 1, 1, 17660, 4, 0, 1, NULL, 'HECCUS TURBO Nº SERIE 783710004', NULL, 2, '2022-03-15 15:19:46', '2022-03-31 15:19:46', '2022-03-31', 1),
	(98, 96, 2, '', 4, 1, 0, 21587, 4, 0, 1, NULL, 'DERMOSTEAM 110V - Nº SERIE 816420015', NULL, 2, '2022-03-15 17:22:50', '2022-05-04 00:00:00', '0000-00-00', 1),
	(99, 98, 6, 'Reembolso realizado', 1, 4, 1, 21956, 5, 0, 1, NULL, 'CANCELAMENTO - SUPORTE CRIO SMART', NULL, 0, '2022-03-16 18:10:59', '2022-03-18 18:10:59', '2022-03-18', 1),
	(100, 103, 4, '', 3, 1, 0, 15906, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE NEARTEK ESTHETIC :772600016', NULL, 0, '2022-03-16 15:26:25', '2022-04-28 00:00:00', '0000-00-00', 1),
	(101, 49, 6, '', 3, 2, 1, 21597, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE PLURIA : 295478', NULL, 0, '2022-03-16 13:36:59', '2022-04-11 13:36:59', '2022-04-11', 1),
	(102, 38, 7, '', 1, 1, 0, 22584, 1, 0, 1, NULL, ' POLARYS - Nº SERIE 837880005 - NOVO PEDIDO 22934', NULL, 0, '2022-03-16 14:29:11', '2022-04-05 14:29:11', '0000-00-00', 1),
	(103, 22, 6, 'Cliente recebeu aparelho.', 4, 4, 1, 16517, 2, 0, 1, NULL, 'TROCA - ETHERNIA COLD SMART - 0590COS0175920 621 - NOVO PEDIDO PEDIDO 22945 ', NULL, 0, '2022-03-16 15:40:13', '2022-04-27 15:40:14', '2022-04-27', 1),
	(104, 22, 6, 'ABERTO OUTRO CHAMADO PARA TROCA', 4, 4, 1, 16517, 4, 0, 1, NULL, 'ETHERNIA COLD SMART: 0590COS0175920621', NULL, 2, '2022-03-16 18:35:57', '2022-03-16 18:35:57', '2022-03-16', 1),
	(105, 117, 6, 'Situação resolvida através das informaçoes do fabr', 3, 1, 1, 19942, 4, 0, 1, NULL, 'NEURODYN ESTHETIC - Nº SERIE 794190023', NULL, 0, '2022-03-17 18:29:19', '2022-03-23 18:29:19', '2022-03-23', 1),
	(106, 96, 2, '', 4, 1, 0, 21587, 4, 0, 1, NULL, 'LYRA - Nº SERIE 785390004', NULL, 2, '2022-03-17 17:24:46', '2022-05-04 00:00:00', '0000-00-00', 1),
	(107, 118, 6, 'Cliente informa equipamento esta funcionando perfe', 3, 6, 1, 11621, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE  SMART DERMA PEN: 21-A-0234', NULL, 0, '2022-03-17 15:24:10', '2022-04-14 15:24:10', '2022-04-14', 1),
	(108, 120, 6, '06/04/2022- Cliente não deu mais retorno', 4, 2, 1, 15593, 4, 0, 1, NULL, 'STIMULUS PHYSIO 2 CANAIS : 277424  ', NULL, 0, '2022-03-17 13:02:33', '2022-04-06 13:02:33', '2022-04-06', 1),
	(109, 121, 4, '', 4, 1, 0, 14723, 4, 0, 1, NULL, 'NEARTEK ESTHETIC 772600041 ', NULL, 2, '2022-03-17 16:32:11', '2022-05-12 00:00:00', '0000-00-00', 1),
	(110, 124, 6, 'sem contato', 4, 2, 1, 21993, 4, 0, 1, NULL, 'BEAUTY SHAPE DUO - Nº SERIE 295369', NULL, 0, '2022-03-17 16:12:42', '2022-05-04 16:12:42', '2022-05-04', 1),
	(111, 134, 6, 'A tampa chegou, intacta!', 3, 1, 1, 22852, 4, 0, 1, NULL, 'SONOPULSE II - Nº SERIE 819630013', NULL, 0, '2022-03-17 10:12:32', '2022-04-19 10:12:32', '2022-04-19', 1),
	(112, 136, 6, ' Cliente recebeu caneta e já esta utilizando norma', 4, 20, 1, 21713, 2, 0, 1, NULL, 'CANETA SMART DERMA PEN: 21-K-T0062', NULL, 2, '2022-03-17 11:06:36', '2022-04-06 11:06:36', '2022-04-06', 1),
	(113, 142, 6, 'Cliente recebeu o termômetro, foi testado esta fun', 3, 2, 1, 17643, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE LIMINE', NULL, 0, '2022-03-18 16:32:04', '2022-04-05 16:32:04', '2022-03-29', 1),
	(114, 143, 6, 'Cliente fez os testes problema resolvido!', 3, 2, 1, 20556, 4, 0, 1, NULL, 'APLICADOR GRANDE BEAUTY SHAPE DUO', NULL, 0, '2022-03-18 17:15:59', '2022-04-22 17:15:59', '2022-04-22', 1),
	(115, 142, 6, 'Cliente não tem direito a garantia de acessório, p', 3, 12, 2, 17643, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE RECOVER ', NULL, 0, '2022-03-18 16:21:52', '2022-03-29 00:00:00', '2022-03-23', 1),
	(116, 144, 6, 'Resolvido junto a fabricante', 4, 3, 1, 15935, 4, 0, 1, NULL, 'OXY SEM VACUO + CILINDRO: F091551', NULL, 2, '2022-03-18 11:22:53', '2022-04-06 11:22:53', '2022-04-06', 1),
	(117, 50, 6, 'Cliente não deu mais retorno referente a ponteiras', 4, 1, 1, 17257, 4, 0, 1, NULL, ' NEARTEK ESTHETIC: 768970023', NULL, 2, '2022-03-21 11:36:41', '2022-04-06 11:36:41', '2022-04-06', 1),
	(118, 146, 6, 'Testes finalizados pela nossa assistência', 4, 2, 1, 20797, 4, 0, 1, NULL, 'ÁCRUS: 308878', NULL, 2, '2022-03-21 17:15:14', '2022-04-05 17:15:14', '2022-04-05', 1),
	(119, 147, 6, 'Equipamento testado pelo cliente, tudo ok', 3, 1, 1, 18479, 4, 0, 1, NULL, 'DERMOTONUS SLIM - Nº SERIE 788670009', NULL, 0, '2022-03-21 11:43:16', '2022-04-14 11:43:16', '2022-04-14', 1),
	(120, 148, 6, 'As manoplas estão funcionando normal', 3, 1, 1, 18954, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE POLARYS: 824650001', NULL, 0, '2022-03-22 15:54:41', '2022-05-02 15:54:41', '2022-05-02', 1),
	(121, 149, 6, 'Cliente ja esta em uso com o equipamento', 3, 2, 1, 16363, 4, 0, 1, NULL, 'SÉRIE POLARYS: 788860006', NULL, 0, '2022-03-23 12:28:55', '2022-03-30 12:28:55', '2022-03-31', 1),
	(122, 126, 6, 'sem retorno', 4, 2, 1, 21170, 4, 0, 1, NULL, 'NOVO EFFECT - Nº SERIE 299700', NULL, 2, '2022-03-23 16:14:35', '2022-05-04 16:14:35', '2022-05-04', 1),
	(123, 151, 6, 'RACK RECEBIDO HOJE.', 1, 1, 1, 22454, 1, 0, 1, NULL, 'TROCA PARCIAL -  LETICIA LAIS BUSARELLO - RACK HECCUS TURBO AZUL CLARO - IBRAMED - NOVO PEDIDO N° 23127', NULL, 0, '2022-03-23 15:23:38', '2022-04-08 15:23:38', '2022-04-08', 1),
	(125, 152, 6, 'Chegou o equipamento, testado e aprovado!', 3, 1, 1, 22602, 4, 0, 1, NULL, 'HF IBRAMED - Nº SERIE 815000035', NULL, 0, '2022-03-24 11:04:22', '2022-04-19 11:04:22', '2022-04-19', 1),
	(126, 153, 6, 'Após orientação seu aparelho está funcionando norm', 4, 2, 1, 22209, 4, 0, 1, NULL, 'BEAUTY SHAPE DUO - Nº SERIE 295370', NULL, 2, '2022-03-24 11:47:10', '2022-03-24 11:47:10', '2022-03-24', 1),
	(127, 154, 6, 'aparelho da cliente voltou a funcionar normalmente', 4, 1, 1, 16034, 4, 0, 1, NULL, 'POLARYS : 780950003 ', NULL, 2, '2022-03-25 12:30:05', '2022-03-25 12:30:05', '2022-03-25', 1),
	(128, 155, 6, 'Equipamento recebido e testado', 3, 2, 1, 19621, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE EFFECT : 297287', NULL, 0, '2022-03-25 18:44:59', '2022-04-26 18:44:59', '2022-04-26', 1),
	(129, 157, 6, 'APLICADOR RECEBIDO PELA CLIENTE HOJE.', 4, 1, 1, 20965, 4, 0, 1, NULL, ' POLARYS : 843390005', NULL, 2, '2022-03-25 17:06:28', '2022-04-07 17:06:28', '2022-04-07', 1),
	(130, 95, 6, 'Aparelho coletado pela nossa logística 26/04 as 18', 1, 1, 1, 17660, 4, 0, 1, NULL, 'HECCUS TURBO Nº SERIE 783710004', NULL, 0, '2022-03-25 08:56:12', '2022-04-27 08:56:12', '2022-04-27', 1),
	(131, 158, 6, 'Cliente informa ter recebido o cabo', 3, 4, 1, 21924, 4, 0, 1, NULL, 'CRIODERMIS FULL ', NULL, 0, '2022-03-25 18:17:51', '2022-04-05 18:17:51', '2022-04-05', 1),
	(132, 159, 6, 'O fabricante mandou instruções através de video, r', 3, 2, 1, 23070, 4, 0, 1, NULL, 'BEAUTY STEAM MAXX ', NULL, 0, '2022-03-28 16:32:42', '2022-04-05 16:32:42', '2022-03-28', 1),
	(133, 161, 6, 'Concluído', 4, 3, 1, 22112, 4, 0, 1, NULL, ' Nº SERIE F092433 ', NULL, 2, '2022-03-28 11:45:48', '2022-04-08 11:45:48', '2022-04-08', 1),
	(134, 160, 2, '', 3, 2, 0, 15241, 4, 0, 1, NULL, 'APLICADOR PLUS FULL FREEZE ', NULL, 0, '2022-03-28 13:33:47', '2022-05-11 00:00:00', '0000-00-00', 1),
	(135, 162, 6, 'Cliente recebeu aplicador novo da fabricante', 1, 1, 1, 14828, 2, 0, 1, NULL, 'APLICADOR P POLARYS - SÉRIE: 756510001', NULL, 0, '2022-03-28 11:24:11', '2022-04-12 11:24:11', '2022-04-12', 1),
	(136, 163, 6, 'Cliente não deu retorno', 4, 1, 1, 22688, 4, 0, 1, NULL, 'APLICADOR G SERIE 867830005', NULL, 2, '2022-03-29 18:17:57', '2022-04-28 18:17:57', '2022-04-28', 1),
	(137, 164, 6, 'Após testes manipulo voltou a funcionar normalment', 4, 2, 1, 15013, 4, 0, 1, NULL, 'BEAUTY SHAPE : 284548  ', NULL, 2, '2022-03-29 13:58:40', '2022-03-29 13:58:40', '2022-03-29', 1),
	(138, 166, 6, '', 4, 2, 1, 23014, 1, 0, 1, NULL, 'LIGHT PULSE -286126', NULL, 2, '2022-03-30 09:18:37', '2022-04-26 09:18:37', '2022-04-26', 1),
	(139, 135, 6, '', 3, 1, 1, 21960, 4, 0, 1, NULL, 'HECCUS TURBO - Nº SERIE 815350001', NULL, 0, '2022-03-30 10:45:36', '2022-05-02 10:45:36', '2022-05-02', 1),
	(140, 167, 3, '', 3, 2, 0, 14680, 4, 0, 1, NULL, 'APLICADOR MEDIO Beauty Shape, série: 277845', NULL, 0, '2022-03-31 17:55:52', '2022-05-11 17:55:52', '0000-00-00', 1),
	(141, 169, 6, 'Cliente não vai mais enviar ao fabricante.', 3, 5, 3, 11484, 8, 0, 1, NULL, 'NÚMERO DE SÉRIE: FM2CVD25', NULL, 0, '2022-03-31 17:28:21', '2022-04-29 17:28:21', '2022-04-29', 1),
	(142, 170, 5, '', 3, 1, 0, 14566, 4, 0, 1, NULL, ' HECCUS TURBO: 760470004', NULL, 0, '2022-04-01 18:36:04', '2022-05-09 00:00:00', '0000-00-00', 1),
	(143, 171, 5, 'Equipamento chegou a cliente', 3, 2, 1, 21514, 4, 0, 1, NULL, 'FLUENCE MAXX - Nº SERIE 278407	', NULL, 0, '2022-04-01 15:20:19', '2022-04-29 15:20:19', '2022-04-25', 1),
	(144, 172, 5, '', 3, 2, 0, 12388, 4, 0, 2, NULL, ' TECARE NÚMERO DE SÉRIE: 258150', NULL, 0, '2022-04-04 16:52:23', '2022-05-11 18:00:15', '0000-00-00', 1),
	(145, 173, 2, '', 3, 2, 0, 16110, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE CLUSTER LED LINEAR AZUL: 286908', NULL, 0, '2022-04-04 14:46:09', '2022-05-02 00:00:00', '0000-00-00', 1),
	(146, 174, 6, 'Rodinhas novas chegaram', 3, 4, 1, 23500, 4, 0, 1, NULL, 'ULTRAMED : 279umh0385560222', NULL, 0, '2022-04-04 15:10:31', '2022-05-02 15:10:31', '2022-05-02', 1),
	(147, 175, 2, '', 4, 4, 0, 21351, 4, 0, 1, NULL, 'ETHERNIA COLD SMART - Nº SERIE 0698COS0228530921 ', NULL, 2, '2022-04-05 16:04:18', '2022-05-04 00:00:00', '0000-00-00', 1),
	(148, 46, 6, 'Aparelho atualizado com Sucesso', 4, 2, 1, 20611, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE ÁCRUS: 291756', NULL, 2, '2022-04-05 10:22:24', '2022-04-05 10:22:24', '2022-04-05', 1),
	(149, 36, 6, 'Em análise do histórico, não foi identificado falh', 1, 4, 1, 22088, 1, 0, 1, NULL, 'RACK BLACK MEDICAL SAN', NULL, 0, '2022-04-05 11:10:18', '2022-04-05 11:10:18', '2022-04-05', 1),
	(150, 177, 6, 'Aparelho deu entrada no estoque em 11/05', 4, 1, 1, 22000, 1, 0, 1, NULL, ' DERMOSTEAM 110V : 816410018 - Novo pedido 23694', NULL, 2, '2022-04-05 16:37:59', '2022-05-11 16:37:59', '2022-05-11', 1),
	(151, 177, 6, 'cliente recebeu pedido', 4, 1, 1, 22000, 4, 0, 1, NULL, 'HF ALTA FREQUENCIA : 810110041', NULL, 2, '2022-04-05 11:35:26', '2022-04-27 11:35:26', '2022-04-27', 1),
	(153, 179, 6, 'Conseguiu ligar aparelho', 4, 4, 1, 22657, 4, 0, 1, NULL, 'ULTRAMED HIFU 0226UMH0357880122', NULL, 2, '2022-04-07 09:28:27', '2022-04-08 09:28:27', '2022-04-08', 1),
	(154, 178, 7, '', 1, 1, 0, 23268, 1, 0, 1, NULL, 'APLICADOR CRIOLIPÓLISE P POLARYS - Nº SERIE 849130017 APLICADOR CRIOLIPOLISE G POLARYS - Nº SERIE 868820020 - NOVO PEDIDO  N° 23676', NULL, 0, '2022-04-07 09:33:48', '2022-05-06 00:00:00', '0000-00-00', 1),
	(155, 179, 6, 'Cliente não tinha colocado o cartucho', 3, 4, 1, 22657, 4, 0, 1, NULL, 'ULTRAMED HIFU - 5 CARTUCHOS - Nº SERIE 0226UMH0357880122', NULL, 0, '2022-04-07 11:17:21', '2022-04-07 11:17:21', '2022-04-07', 1),
	(156, 183, 6, 'Fabricante informou que é normal dela mesmo, devid', 3, 2, 1, 18465, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE  EFFECT : 293545', NULL, 0, '2022-04-07 15:12:39', '2022-04-07 15:12:39', '2022-04-07', 1),
	(157, 182, 6, 'cliente recebeu equipamento', 4, 2, 1, 23469, 4, 0, 1, NULL, 'MASCARA FOTOTERAPICA LED FACE+ PESCOÇO: 283302 / FLUENCE MAXX: 308277', NULL, 2, '2022-04-07 18:31:46', '2022-04-29 18:31:46', '2022-04-29', 1),
	(158, 184, 6, 'concluído ', 4, 2, 1, 17348, 4, 0, 1, NULL, 'BEAUTY SHAPE : 289639', NULL, 2, '2022-04-08 17:45:16', '2022-04-28 17:45:16', '2022-04-28', 1),
	(159, 185, 6, 'Em contato com o fabricante foi verificado que a v', 3, 1, 1, 23567, 1, 0, 1, NULL, 'HF : 0784460016', NULL, 0, '2022-04-08 11:48:42', '2022-04-11 11:48:42', '2022-04-11', 1),
	(160, 186, 2, '', 3, 6, 0, 13043, 4, 0, 1, NULL, 'SMART DERMA PEM: 21-C-0816', NULL, 0, '2022-04-08 15:40:05', '2022-04-28 00:00:00', '0000-00-00', 1),
	(161, 42, 6, 'Cliente satisfeitíssima!', 3, 1, 1, 21468, 4, 0, 1, NULL, 'SÉRIE POLARYS ( 2 APLICADOR M + 1 APLICADOR GRANDE ): 0846220002', NULL, 0, '2022-04-08 15:58:39', '2022-05-10 15:58:40', '2022-05-10', 1),
	(162, 187, 4, '', 3, 1, 0, 22719, 4, 0, 1, NULL, 'THORK IBRAMED - Nº SERIE 859400015 ', NULL, 0, '2022-04-08 16:52:50', '2022-05-02 16:52:50', '0000-00-00', 1),
	(163, 189, 6, 'Cliente recebeu a poltrona', 3, 8, 1, 22647, 2, 0, 1, NULL, 'POLTRONA HIDRAULICA PATMOS PRETA', NULL, 0, '2022-04-11 11:38:26', '2022-05-06 11:38:26', '2022-05-06', 1),
	(164, 190, 6, 'passada informações', 4, 1, 1, 17711, 4, 0, 1, NULL, 'POLARYS : 811290003', NULL, 2, '2022-04-11 18:32:52', '2022-04-29 18:32:52', '2022-04-29', 1),
	(165, 191, 6, 'Acessorio chegou para a cliente', 3, 2, 1, 23464, 9, 0, 1, NULL, 'STIMULUS FACE - 291518', NULL, 0, '2022-04-13 18:25:53', '2022-04-20 18:25:53', '2022-04-20', 1),
	(166, 192, 3, '', 1, 2, 0, 23105, 5, 0, 1, NULL, 'CANCELAMENTO - NF 6059 - CANETA PEELING - BEAUTY DERMO N.SERIE 302175 - AVARIA RODONAVES', NULL, 0, '2022-04-13 16:42:12', '2022-05-04 00:00:00', '0000-00-00', 1),
	(167, 193, 4, '', 3, 1, 0, 18218, 4, 0, 1, NULL, ' HECCUS TURBO796900004', NULL, 0, '2022-04-13 15:19:41', '2022-04-27 15:19:41', '0000-00-00', 1),
	(168, 194, 6, '', 4, 1, 1, 17714, 4, 0, 1, NULL, 'POLARYS : 811300001', NULL, 2, '2022-04-14 18:12:52', '2022-04-28 18:12:52', '2022-04-28', 1),
	(169, 195, 2, '', 4, 2, 0, 19082, 4, 0, 1, NULL, 'APLICADOR FULL FREEZE: 299009 / FULL FREEZE: 299013 / ', NULL, 2, '2022-04-14 12:10:41', '2022-05-02 00:00:00', '0000-00-00', 1),
	(170, 166, 6, 'Funil recebido pelo cliente', 3, 2, 1, 23014, 9, 0, 1, NULL, 'LIGHT PULSE - Nº SERIE 286126', NULL, 0, '2022-04-14 15:42:51', '2022-04-27 15:42:51', '2022-04-27', 1),
	(171, 196, 6, 'RESOLVIDO/SEM CONTATO', 4, 2, 1, 22249, 4, 0, 1, NULL, 'BEAUTY STEAM MAXX - Nº SERIE 301992', NULL, 2, '2022-04-14 18:35:30', '2022-04-29 18:35:30', '2022-04-29', 1),
	(172, 197, 6, 'Cliente fora do pais, resolveu comprar outro fluxo', 3, 3, 2, 13130, 4, 0, 1, NULL, 'OXY SEM VÁCUO NÚMERO DE SÉRIE: F087132', NULL, 0, '2022-04-18 15:53:49', '2022-05-03 15:53:49', '2022-05-03', 1),
	(173, 198, 5, '', 4, 1, 0, 19774, 4, 0, 1, NULL, ' APLICADOR G POLARYS = 820930015 N-SERIE', NULL, 2, '2022-04-18 12:26:45', '2022-05-10 12:26:45', '0000-00-00', 1),
	(174, 199, 7, '', 3, 2, 0, 23017, 1, 0, 1, NULL, 'VIBRIA MAXX: 306421 - NOVO PEDIDO 23950', NULL, 0, '2022-04-18 13:20:06', '2022-05-03 13:20:06', '0000-00-00', 1),
	(175, 200, 4, '', 3, 3, 0, 23017, 4, 0, 1, NULL, 'OXITONE PRIME + TORRE - Nº SERIE F092551 ', NULL, 0, '2022-04-18 16:39:34', '2022-04-19 16:39:34', '0000-00-00', 1),
	(176, 201, 4, '', 4, 4, 0, 21797, 4, 0, 1, NULL, 'CRIODERMIS FULL: 2695CRD0358640122', NULL, 2, '2022-04-18 14:08:35', '2022-05-02 14:08:35', '0000-00-00', 1),
	(178, 202, 7, '', 3, 2, 0, 23748, 1, 0, 1, NULL, 'BEAUTY SHAPE DUO - Nº SERIE 295347 - NOVO PEDIDO 23971', NULL, 0, '2022-04-19 16:44:56', '2022-05-11 00:00:00', '0000-00-00', 1),
	(179, 204, 5, '', 3, 2, 0, 6697, 8, 0, 1, NULL, 'BEAUTY STEAM 220V - AP NÚMERO DE SÉRIE: 150614', NULL, 0, '2022-04-19 18:26:43', '2022-05-02 18:26:43', '0000-00-00', 1),
	(180, 203, 4, '', 4, 1, 0, 22538, 4, 0, 1, NULL, 'POLARYS 863970002', NULL, 2, '2022-04-19 17:19:38', '2022-04-20 00:00:00', '0000-00-00', 1),
	(181, 205, 6, 'concluido', 4, 1, 1, 22436, 4, 0, 1, NULL, 'SONOPULSE II - Nº SERIE 815200013', NULL, 2, '2022-04-19 14:12:26', '2022-05-02 00:00:00', '2022-05-02', 1),
	(182, 206, 2, '', 3, 1, 0, 21015, 4, 0, 1, NULL, 'HECCUS TURBO - Nº SERIE 805160010', NULL, 0, '2022-04-19 18:46:02', '2022-04-28 00:00:00', '0000-00-00', 1),
	(183, 207, 4, '', 4, 1, 0, 21696, 4, 0, 1, NULL, 'POLARYS - 854320001', NULL, 2, '2022-04-20 12:17:47', '2022-04-20 00:00:00', '0000-00-00', 1),
	(184, 208, 6, 'Não deu retorno', 4, 1, 1, 15042, 4, 0, 1, NULL, 'HECCUS TURBO - 753820006', NULL, 2, '2022-04-20 14:23:59', '2022-05-02 14:23:59', '2022-05-02', 1),
	(185, 209, 2, '', 3, 1, 0, 22251, 4, 0, 1, NULL, 'POLARYS (2 APLICADORES M + 1 APLICADOR G) - Nº SERIE 856080001 ', NULL, 0, '2022-04-22 16:07:07', '2022-04-26 00:00:00', '0000-00-00', 1),
	(186, 210, 6, 'Cliente levou aparelho para assistência.', 4, 2, 1, 22385, 1, 0, 1, NULL, 'ÁCRUS : 320902', NULL, 2, '2022-04-25 12:46:12', '2022-05-10 12:46:12', '2022-05-10', 1),
	(187, 5, 2, '', 3, 1, 0, 22266, 4, 0, 1, NULL, 'NEURODYN II - NÚMERO DE SÉRIE 840540021', NULL, 0, '2022-04-25 11:16:15', '2022-05-05 00:00:00', '0000-00-00', 1),
	(188, 211, 6, 'Equipamento recebido e testado', 3, 2, 1, 21239, 4, 0, 1, NULL, 'STIMULUS FACE MAXX - Nº SERIE 298413	', NULL, 0, '2022-04-25 15:47:11', '2022-05-11 15:47:11', '2022-05-11', 1),
	(189, 212, 2, '', 3, 3, 0, 14110, 4, 0, 1, NULL, ' OXY COM VACUO + TORRE: F090870', NULL, 0, '2022-04-25 17:52:15', '2022-05-02 00:00:00', '0000-00-00', 1),
	(190, 213, 6, 'Cliente optou por ficar com o aparelho', 1, 2, 1, 23903, 5, 0, 1, NULL, 'CANCELAMENTO - NUMERO DE SERIE FLUENCE MAXX: 308290', NULL, 0, '2022-04-26 10:12:06', '2022-05-11 10:12:06', '2022-05-11', 1),
	(191, 214, 6, 'Cliente recebeu a mangueira', 3, 2, 1, 22154, 9, 0, 1, NULL, 'SÉRIE ÁCRUS: 308871', NULL, 0, '2022-04-26 09:25:29', '2022-05-10 09:25:30', '2022-05-10', 1),
	(192, 216, 2, '', 3, 2, 0, 18444, 4, 0, 1, NULL, 'SÉRIE EFFECT: 293534', NULL, 0, '2022-04-26 13:54:18', '2022-04-26 00:00:00', '0000-00-00', 1),
	(193, 215, 4, '', 4, 9, 0, 23603, 4, 0, 1, NULL, ' DERMA SCAN FULL BRANCO: 612464', NULL, 2, '2022-04-26 15:27:54', '2022-05-04 00:00:00', '0000-00-00', 1),
	(194, 217, 2, '', 3, 1, 0, 23539, 4, 0, 1, NULL, 'ARES:  841190017', NULL, 0, '2022-04-26 18:17:01', '2022-04-27 00:00:00', '0000-00-00', 1),
	(195, 218, 6, 'Cliente recebeu pedido completo', 4, 2, 1, 23755, 4, 0, 1, NULL, 'NOVO EFFECT - Nº  310452', NULL, 2, '2022-04-27 14:26:14', '2022-04-28 14:26:14', '2022-04-28', 1),
	(196, 219, 4, '', 3, 2, 0, 23502, 4, 0, 1, NULL, 'BEAUTY STEAM MAXX COD: 009160', NULL, 0, '2022-04-27 10:04:38', '2022-05-10 10:04:38', '0000-00-00', 1),
	(197, 221, 3, '', 1, 4, 0, 16480, 9, 0, 1, NULL, 'SUPORTE CRIODERMIS SMART - 0778CRS0197240721 - PEDIDO 24169', NULL, 0, '2022-04-28 09:01:03', '2022-04-29 09:01:03', '0000-00-00', 1),
	(198, 220, 2, '', 4, 5, 0, 13704, 4, 0, 1, NULL, ' HERTIX : IA2CVB27', NULL, 2, '2022-04-28 10:22:21', '2022-05-04 00:00:00', '0000-00-00', 1),
	(199, 222, 6, 'Pedido completo!', 4, 3, 1, 23816, 4, 0, 1, NULL, 'OXITONE DIAMANTIS + BOLSA + CILINDRO - Nº SERIE F094672', NULL, 2, '2022-04-28 11:22:09', '2022-04-28 11:22:09', '2022-04-28', 1),
	(200, 65, 4, '', 4, 1, 0, 18377, 4, 0, 1, NULL, 'Aplicador G: 771960012 (polarys)', NULL, 2, '2022-04-28 15:57:02', '2022-05-16 14:27:15', '0000-00-00', 1),
	(201, 223, 2, '', 1, 1, 0, 20271, 4, 0, 1, NULL, 'POLARYS + 3 APLICADOR ES - N.SERIE 841510001 (Apl.P = 849130006 Apl.M = 833910008 Apl.G =  833930001)', NULL, 0, '2022-04-28 11:59:19', '2022-04-28 00:00:00', '0000-00-00', 1),
	(202, 224, 2, '', 3, 2, 0, 16743, 4, 0, 1, NULL, 'SÉRIE TECARE: 275124', NULL, 0, '2022-04-28 14:09:22', '2022-04-28 00:00:00', '0000-00-00', 1),
	(203, 226, 6, 'Cliente preferiu fazer conforme fabricante oriento', 3, 2, 3, 23554, 4, 0, 1, NULL, 'HIBRIDI: 289533', NULL, 0, '2022-04-28 09:26:49', '2022-05-02 09:26:49', '2022-05-02', 1),
	(204, 227, 4, '', 1, 1, 0, 23862, 4, 0, 1, NULL, 'RACK HECCUS TURBO - PARAFUSO NÃO DA APERTO', NULL, 0, '2022-04-29 10:01:29', '2022-04-29 00:00:00', '0000-00-00', 1),
	(205, 228, 4, '', 4, 4, 0, 23477, 4, 0, 1, NULL, 'SUPORTE RACK BLACK MEDICAL SAN / / ETHERNIA COLD - PEDIDO 24216', NULL, 2, '2022-04-29 09:41:04', '2022-05-10 00:00:00', '0000-00-00', 1),
	(206, 229, 2, '', 3, 5, 0, 2884, 5, 0, 1, NULL, ' Hygiadermo  Número de série: HR5FSA05 - NOVO PEDIDO 24488', NULL, 0, '2022-04-29 17:08:52', '2022-05-05 17:08:52', '0000-00-00', 1),
	(207, 225, 5, '', 4, 1, 0, 11257, 4, 0, 1, NULL, 'HECCUS TURBO - 719850003 ', NULL, 2, '2022-04-29 16:42:41', '2022-04-29 16:42:41', '0000-00-00', 1),
	(208, 230, 2, '', 3, 5, 0, 9966, 8, 0, 1, NULL, 'NUMERO DE SERI E HYGIAPLASMA: JB2HUB20', NULL, 0, '2022-04-29 15:04:17', '2022-04-29 00:00:00', '0000-00-00', 1),
	(209, 231, 7, '', 4, 1, 0, 23828, 1, 0, 1, NULL, 'APLICADOR CRIOLIPOLISE G - Nº SERIE 868810002 - NOVO PEDIDO 24250', NULL, 2, '2022-04-29 09:38:41', '2022-05-10 09:38:41', '0000-00-00', 1),
	(210, 232, 2, '', 3, 2, 0, 17561, 4, 0, 1, NULL, 'NOVO EFFECT Nº SERIE 287776', NULL, 0, '2022-05-02 11:47:32', '2022-05-03 00:00:00', '0000-00-00', 1),
	(211, 174, 5, '', 3, 1, 0, 23495, 4, 0, 1, NULL, 'HOOK: 0832140004', NULL, 0, '2022-05-02 14:57:53', '2022-05-05 00:00:00', '0000-00-00', 1),
	(212, 242, 2, '', 3, 4, 0, 19381, 4, 0, 1, NULL, 'CRIODEMIS FULL : 1819CRD0246250921', NULL, 0, '2022-05-02 16:58:59', '2022-05-11 00:00:00', '0000-00-00', 1),
	(213, 87, 2, '', 4, 2, 0, 14883, 4, 0, 1, NULL, 'STIMULUS FACE MAXX : 273075', NULL, 2, '2022-05-03 13:35:38', '2022-05-03 13:35:38', '0000-00-00', 1),
	(214, 178, 7, '', 1, 1, 0, 23676, 1, 0, 1, NULL, 'APLICADOR CRIOLIPOLISE G POLARYS - N.SERIE 754740011 - NOVO PEDIDO 24368', NULL, 0, '2022-05-03 09:44:10', '2022-05-10 09:44:10', '0000-00-00', 1),
	(215, 245, 4, '', 3, 4, 0, 22404, 2, 0, 1, NULL, 'ETHERNIA COLD SMART:0847COS0361030122', NULL, 0, '2022-05-03 09:32:41', '2022-05-06 09:32:41', '0000-00-00', 1),
	(216, 246, 2, '', 4, 15, 0, 22084, 4, 0, 1, NULL, 'THOOR ULTRACAVITAÇÃO AZUL:  8544-11', NULL, 2, '2022-05-03 13:40:41', '2022-05-05 00:00:00', '0000-00-00', 1),
	(217, 247, 4, '', 3, 16, 0, 23400, 4, 0, 1, NULL, 'CARTUCHO FACIAL 1,5 MM ', NULL, 0, '2022-05-04 16:11:07', '2022-05-11 16:11:07', '0000-00-00', 1),
	(218, 248, 2, '', 4, 2, 0, 23178, 4, 0, 1, NULL, 'NOVO HIBRIDI - Nº SERIE 295307 ', NULL, 2, '2022-05-04 15:56:17', '2022-05-04 00:00:00', '0000-00-00', 1),
	(219, 249, 2, '', 3, 5, 0, 22676, 4, 0, 1, NULL, 'HERTIX SMART THF 1703 CRIOGENICA - Nº SERIE JN4JVE02', NULL, 0, '2022-05-05 10:39:08', '2022-05-05 00:00:00', '0000-00-00', 1),
	(220, 250, 2, '', 3, 1, 0, 22152, 4, 0, 1, NULL, 'Apl. G = 854600004)', NULL, 0, '2022-05-05 12:18:00', '2022-05-05 00:00:00', '0000-00-00', 1),
	(221, 151, 6, 'resolvido', 4, 2, 1, 21552, 4, 0, 1, NULL, 'SONIC COMPACT MAXX - Nº SERIE 297949', NULL, 2, '2022-05-06 09:50:33', '2022-05-06 09:50:33', '2022-05-06', 1),
	(223, 255, 6, 'Técnico foi ao cliente probl resolvido', 3, 1, 1, 22811, 4, 0, 1, NULL, 'VEGA TRIPLE WAVE - Nº SERIE 871890002', NULL, 0, '2022-05-09 13:38:28', '2022-05-10 13:38:28', '2022-05-10', 1),
	(224, 256, 2, '', 3, 3, 0, 22651, 4, 0, 1, NULL, 'OXITONE PRO + CARRINHO - Nº SERIE F093802', NULL, 0, '2022-05-09 18:34:38', '2022-05-09 00:00:00', '0000-00-00', 1),
	(225, 128, 6, 'Duvidas esclarecidas.', 3, 1, 1, 21531, 4, 0, 1, NULL, ' Polarys Nº SERIE 854260005', NULL, 0, '2022-05-10 10:17:06', '2022-05-10 10:17:06', '2022-05-10', 1),
	(226, 33, 6, 'Duvidas esclarecidas', 3, 2, 1, 21086, 8, 0, 1, NULL, 'NOVO HIBRIDI - Nº SERIE 289388	', NULL, 0, '2022-05-10 11:20:49', '2022-05-10 11:20:49', '2022-05-10', 1),
	(227, 257, 4, '', 4, 1, 0, 23858, 1, 0, 1, NULL, 'POLARYS 5 APLICADORES -N.SERIE 887790002', NULL, 2, '2022-05-10 11:51:19', '2022-05-11 11:51:19', '0000-00-00', 1),
	(228, 255, 2, '', 3, 1, 0, 23020, 4, 0, 1, NULL, 'PLASMED - Nº SERIE 803910004 ', NULL, 0, '2022-05-10 13:53:34', '2022-05-10 00:00:00', '0000-00-00', 1),
	(229, 258, 2, '', 3, 2, 0, 23131, 4, 0, 1, NULL, 'PLURIA - AP.ELETROMEDICO PARA CARBOXITERAPIA - Nº SERIE 295477', NULL, 0, '2022-05-10 14:03:17', '2022-05-12 00:00:00', '0000-00-00', 1),
	(230, 259, 2, '', 3, 1, 0, 23602, 4, 0, 1, NULL, 'NÚMERO DE SÉRIE DERMOTONUS SLIM :855450006', NULL, 0, '2022-05-10 17:19:37', '2022-05-10 00:00:00', '0000-00-00', 1),
	(231, 260, 2, '', 3, 2, 0, 14040, 4, 0, 1, NULL, ' BEAUTY DERMO: 255679', NULL, 0, '2022-05-11 10:07:41', '2022-05-11 00:00:00', '0000-00-00', 1),
	(232, 178, 2, '', 1, 1, 0, 23268, 1, 0, 1, NULL, 'TROCA PARCIAL NF 6108- ADRIANO CARVALHO DE PAULA - APLICADOR M POLARYS N° 866050039 - NOVO PEDIDO 24632', NULL, 0, '2022-05-11 10:37:58', '2022-05-11 00:00:00', '0000-00-00', 1),
	(233, 269, 4, '', 4, 1, 0, 23497, 4, 0, 1, NULL, 'NEURODYN ESTHETIC : 862890025', NULL, 2, '2022-05-11 16:32:31', '2022-05-11 00:00:00', '0000-00-00', 1),
	(234, 142, 4, '', 4, 2, 0, 17643, 4, 0, 1, NULL, 'APLICADOR MEDIO : 282012 (beauty shape)', NULL, 2, '2022-05-11 16:38:07', '2022-05-11 00:00:00', '0000-00-00', 1),
	(235, 270, 2, '', 3, 4, 0, 19081, 4, 0, 1, NULL, 'ULTRAMED: 0045UMH0299981121', NULL, 0, '2022-05-11 18:31:29', '2022-05-11 00:00:00', '0000-00-00', 1),
	(236, 271, 6, 'Duvidas esclarecidas', 3, 4, 1, 23621, 4, 0, 1, NULL, 'ULTRAMED HIFU - 5 CARTUCHOS - Nº SERIE 0331UMH0386430222 ', NULL, 0, '2022-05-12 10:19:22', '2022-05-12 11:11:21', '2022-05-12', 1),
	(237, 222, 2, '', 3, 3, 0, 23816, 4, 0, 1, NULL, 'OXITONE DIAMANTIS + BOLSA + CILINDRO - Nº SERIE F094672', NULL, 0, '2022-05-12 10:31:03', '2022-05-12 00:00:00', '0000-00-00', 1);
/*!40000 ALTER TABLE `posvenda_chamado` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_chamado_item
CREATE TABLE IF NOT EXISTS `posvenda_chamado_item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_chamado` int(11) NOT NULL DEFAULT 0,
  `id_status_atendimento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_incidente` int(11) DEFAULT NULL,
  `descricao_item` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `data_item` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_item`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvenda_chamado_item: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_chamado_item` DISABLE KEYS */;
INSERT INTO `posvenda_chamado_item` (`id_item`, `id_chamado`, `id_status_atendimento`, `id_usuario`, `id_marca`, `id_incidente`, `descricao_item`, `id_notificacao`, `data_item`) VALUES
	(37, 22, 2, 1, NULL, 5, 'testando', 2, '2022-03-01 00:00:00'),
	(38, 22, 2, 1, NULL, 5, 'testando', 2, '2022-03-01 00:00:00'),
	(39, 22, 2, 1, NULL, 5, 'mais um teste', 2, '2022-03-01 00:00:00'),
	(40, 22, 2, 1, NULL, 5, 'testando hoje', 2, '2022-03-01 00:00:00'),
	(41, 24, 2, 2, NULL, 3, 'é agora', 0, '2022-03-01 00:00:00'),
	(42, 24, 2, 2, NULL, 3, 'restaurante', 0, '2022-03-01 00:00:00'),
	(43, 24, 2, 2, NULL, 3, 'fragrancia', 0, '2022-03-01 00:00:00'),
	(44, 24, 2, 2, NULL, 3, '$descricao_items', 0, '2022-03-01 00:00:00'),
	(45, 24, 2, 2, NULL, 3, 'colocar apostrofe', 0, '2022-03-01 00:00:00'),
	(46, 24, 2, 2, NULL, 3, 'dángelo\'s', 0, '2022-03-02 00:00:00'),
	(47, 22, 2, 1, NULL, 5, 'descuido', 2, '2022-03-09 00:00:00'),
	(48, 22, 2, 1, NULL, 5, 'descuido', 2, '2022-03-09 00:00:00'),
	(49, 22, 2, 1, NULL, 5, 'testando mais ainda', 2, '2022-03-16 00:00:00'),
	(50, 81, 1, 1, NULL, 1, 'TESTANDO DATA ATUALIZAÇÃO', 0, '2022-03-08 00:00:00'),
	(51, 81, 1, 1, NULL, 1, 'RRRRRRRRRRRRR', 0, '2022-03-08 00:00:00'),
	(52, 81, 1, 1, NULL, 1, 'EEEEEEEEEEEE', 0, '2022-03-08 00:00:00'),
	(53, 62, 1, 1, NULL, 3, 'desterro', 0, '2022-03-08 00:00:00');
/*!40000 ALTER TABLE `posvenda_chamado_item` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_fechamento_chamado
CREATE TABLE IF NOT EXISTS `posvenda_fechamento_chamado` (
  `id_fechamento` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fechamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_fechamento_chamado: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_fechamento_chamado` DISABLE KEYS */;
INSERT INTO `posvenda_fechamento_chamado` (`id_fechamento`, `motivo`) VALUES
	(1, 'Resolvido'),
	(2, 'Inatividade'),
	(3, 'Desistência'),
	(4, 'Jurídico');
/*!40000 ALTER TABLE `posvenda_fechamento_chamado` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_feriados
CREATE TABLE IF NOT EXISTS `posvenda_feriados` (
  `id_feriado` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  PRIMARY KEY (`id_feriado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_feriados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_feriados` DISABLE KEYS */;
/*!40000 ALTER TABLE `posvenda_feriados` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_incidente
CREATE TABLE IF NOT EXISTS `posvenda_incidente` (
  `id_incidente` int(11) NOT NULL AUTO_INCREMENT,
  `incidente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dias` int(11) NOT NULL DEFAULT 30,
  PRIMARY KEY (`id_incidente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvenda_incidente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_incidente` DISABLE KEYS */;
INSERT INTO `posvenda_incidente` (`id_incidente`, `incidente`, `dias`) VALUES
	(1, 'Troca 7 dias', 30),
	(2, 'Troca Fábrica', 30),
	(3, 'Troca autorizada pela chefia', 30),
	(4, 'Assistência na Garantia', 30),
	(5, 'Devolução', 30),
	(6, 'Remessa de conserto', 30),
	(7, 'Extravio', 30);
/*!40000 ALTER TABLE `posvenda_incidente` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_instrutor
CREATE TABLE IF NOT EXISTS `posvenda_instrutor` (
  `id_instrutor` int(11) DEFAULT NULL,
  `id_colaborador` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT 'm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_instrutor: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_instrutor` DISABLE KEYS */;
INSERT INTO `posvenda_instrutor` (`id_instrutor`, `id_colaborador`, `id_usuario`, `id_sala`, `sexo`) VALUES
	(1, NULL, 5, NULL, 'm'),
	(2, NULL, 6, NULL, 'm');
/*!40000 ALTER TABLE `posvenda_instrutor` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_notificacao
CREATE TABLE IF NOT EXISTS `posvenda_notificacao` (
  `id_notificacao` int(11) NOT NULL AUTO_INCREMENT,
  `notificacao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_notificacao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvenda_notificacao: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_notificacao` DISABLE KEYS */;
INSERT INTO `posvenda_notificacao` (`id_notificacao`, `notificacao`) VALUES
	(1, 'App'),
	(2, 'Whatsapp'),
	(3, 'email'),
	(4, 'telefone');
/*!40000 ALTER TABLE `posvenda_notificacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_resposta_padrao
CREATE TABLE IF NOT EXISTS `posvenda_resposta_padrao` (
  `id_resposta_padrao` int(11) NOT NULL AUTO_INCREMENT,
  `resposta_padrao` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_resposta_padrao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvenda_resposta_padrao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_resposta_padrao` DISABLE KEYS */;
INSERT INTO `posvenda_resposta_padrao` (`id_resposta_padrao`, `resposta_padrao`) VALUES
	(1, 'Obrigado por nos procurar');
/*!40000 ALTER TABLE `posvenda_resposta_padrao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_solicitante
CREATE TABLE IF NOT EXISTS `posvenda_solicitante` (
  `id_solicitante` int(11) NOT NULL AUTO_INCREMENT,
  `nome_solicitante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `setor_solicitante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_solicitante` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_solicitante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.posvenda_solicitante: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_solicitante` DISABLE KEYS */;
/*!40000 ALTER TABLE `posvenda_solicitante` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento
CREATE TABLE IF NOT EXISTS `posvenda_treinamento` (
  `id_treinamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `id_responsavel` int(11) unsigned DEFAULT NULL,
  `id_ocupacao` int(11) DEFAULT NULL,
  `id_usuario` int(11) unsigned DEFAULT NULL,
  `id_formato` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT 1,
  `id_horario` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_uso` int(11) DEFAULT NULL,
  `pedido` int(11) DEFAULT NULL,
  `nequip` int(11) DEFAULT 1,
  `concluido` varchar(1) DEFAULT 'n',
  `obs_treinamento` text DEFAULT NULL,
  `certificado` varchar(1) DEFAULT 'n',
  `data_lancamento` timestamp NULL DEFAULT current_timestamp(),
  `somatoria` int(11) DEFAULT 1,
  `feriado` varchar(1) DEFAULT 'n',
  `titulo_feriado` varchar(150) DEFAULT NULL,
  `confirmado` varchar(1) DEFAULT 'n',
  PRIMARY KEY (`id_treinamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=384 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.posvenda_treinamento: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento` (`id_treinamento`, `data_inicio`, `data_fim`, `id_responsavel`, `id_ocupacao`, `id_usuario`, `id_formato`, `id_tipo`, `id_horario`, `id_produto`, `id_cliente`, `id_uso`, `pedido`, `nequip`, `concluido`, `obs_treinamento`, `certificado`, `data_lancamento`, `somatoria`, `feriado`, `titulo_feriado`, `confirmado`) VALUES
	(194, '2022-04-18 09:00:00', '2022-04-18 11:00:00', 5, 1, 2, 1, 1, 1, 2, 1, 1, 1356, 1, 's', 'obs', '', '2022-04-13 13:56:37', 1, 'n', '1', 'n'),
	(340, '2022-04-23 10:00:00', '2022-04-23 12:00:00', 5, 1, 2, 1, 2, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-20 13:10:32', 1, 'n', '1', 'n'),
	(341, '2022-04-19 14:00:00', '2022-04-19 16:30:00', 5, 1, 2, 1, 1, NULL, 1, 3, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-20 16:09:53', 1, 'n', '1', 'n'),
	(343, '2022-04-22 13:30:00', '2022-04-22 16:00:00', 7, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 's', 'Sem Observação', '', '2022-04-20 16:54:51', 1, 'n', '1', 'n'),
	(344, '2022-04-18 14:30:00', '2022-04-18 16:30:00', 6, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 's', 'Sem Observação', '', '2022-04-20 16:55:40', 1, 'n', '1', 'n'),
	(349, '2022-04-19 14:00:00', '2022-04-19 16:30:00', 6, 2, 2, 2, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-20 17:47:50', 1, 'n', '1', 'n'),
	(350, '2022-04-20 09:00:00', '2022-04-20 10:30:00', 7, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-22 10:31:15', 1, 'n', '1', 'n'),
	(351, '2022-04-19 09:00:00', '2022-04-19 10:30:00', 5, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-22 18:24:07', 1, 'n', '1', 'n'),
	(359, '2022-04-22 09:30:00', '2022-04-22 11:00:00', 8, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-22 19:12:19', 1, 'n', '1', 'n'),
	(360, '2022-04-21 00:00:00', '2022-04-22 00:00:00', 5, 1, 1, 1, 1, 0, 0, 0, 1, 0, 1, 'n', 'Sem Observação', '', '2022-04-13 13:56:37', 1, 's', 'Tiradentes', 'n'),
	(362, '2022-06-16 00:00:00', '2022-06-16 00:00:00', 2, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-25 15:36:37', 1, 's', 'Corpus Christi', 'n'),
	(363, '2022-04-15 00:00:00', '2022-04-15 00:00:00', 2, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-04-25 17:08:25', 1, 's', 'Paixão de Cristo', 'n'),
	(364, '2022-05-02 09:00:00', '2022-05-02 11:00:00', 5, 2, 2, 2, 1, NULL, 0, 0, 1, 0, 1, '', 'Sem Observação', '', '2022-05-02 16:32:22', 1, 'n', NULL, 'n'),
	(365, '2022-05-02 14:30:00', '2022-05-02 17:00:00', 5, 1, 2, 1, 1, NULL, 2, 70, 1, 0, 1, 's', 'Sem Observação', '', '2022-05-02 20:52:04', 1, 'n', NULL, 's'),
	(372, '2022-05-04 09:00:00', '2022-05-04 11:00:00', 5, 1, 2, 2, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-05-03 17:33:26', 1, 'n', NULL, 'n'),
	(373, '2022-05-04 14:00:00', '2022-05-04 16:30:00', 6, 1, 2, 2, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-05-03 17:33:41', 1, 'n', NULL, 'n'),
	(374, '2022-05-05 09:00:00', '2022-05-05 11:00:00', 6, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-05-03 17:57:58', 1, 'n', NULL, 'n'),
	(375, '2022-05-05 11:30:00', '2022-05-05 17:00:00', 5, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-05-04 09:16:21', 1, 'n', NULL, 'n'),
	(376, '2022-05-10 09:30:00', '2022-05-10 11:30:00', 5, 1, 2, 1, 1, NULL, 6, 0, 1, 0, 1, '', 'Sem Observação', '', '2022-05-09 11:47:01', 1, 'n', NULL, 's'),
	(377, '2022-05-12 09:30:00', '2022-05-12 11:00:00', 5, 2, 2, 2, 1, NULL, 0, 0, 1, 0, 1, '', 'Sem Observação', '', '2022-05-09 11:47:06', 1, 'n', NULL, ''),
	(378, '2022-05-12 13:30:00', '2022-05-12 15:30:00', 5, 2, 2, 1, 2, NULL, 0, 0, 1, 0, 1, '', 'Sem Observação', '', '2022-05-09 11:48:07', 1, 'n', NULL, ''),
	(379, '2022-05-10 14:30:00', '2022-05-10 16:30:00', 5, 1, 2, 1, 4, NULL, 2, 47, 1, 0, 1, '', 'Sem Observação', '', '2022-05-13 10:03:54', 1, 'n', NULL, ''),
	(380, '2022-05-11 10:30:00', '2022-05-11 13:30:00', 6, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, '', 'Sem Observação', '', '2022-05-13 13:23:07', 1, 'n', NULL, 's'),
	(381, '2022-05-09 18:00:00', '2022-05-09 19:30:00', 5, 1, 2, 1, 5, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-05-13 14:42:22', 1, 'n', NULL, 'n'),
	(382, '2022-05-17 09:00:00', '2022-05-17 09:30:00', 5, 1, 2, 1, 3, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-05-18 11:35:17', 1, 'n', NULL, 'n'),
	(383, '2022-07-19 10:00:00', '2022-07-19 10:30:00', 5, 1, 2, 1, 1, NULL, 0, 0, 1, 0, 1, 'n', 'Sem Observação', 'n', '2022-07-21 11:58:11', 1, 'n', NULL, 'n');
/*!40000 ALTER TABLE `posvenda_treinamento` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_formato
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_formato` (
  `id_formato` int(11) NOT NULL AUTO_INCREMENT,
  `formato` varchar(50) NOT NULL,
  PRIMARY KEY (`id_formato`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_treinamento_formato: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_formato` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_formato` (`id_formato`, `formato`) VALUES
	(1, 'Na Sala de Treinamento'),
	(2, 'On Line ou Fora da Sala');
/*!40000 ALTER TABLE `posvenda_treinamento_formato` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_grupo
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_grupo` (
  `id_treinamento_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `id_treinamento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_uso` int(11) NOT NULL,
  `pratica` varchar(1) DEFAULT 'n',
  `pedido` int(11) NOT NULL,
  `concluido` varchar(1) DEFAULT 'n',
  `obs_treinamento` text DEFAULT NULL,
  `certificado` varchar(1) DEFAULT 'n',
  `confirmado` varchar(1) DEFAULT 'n',
  `data_lancamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `somatoria` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_treinamento_grupo`) USING BTREE,
  KEY `FK_treinamento` (`id_treinamento`),
  CONSTRAINT `FK_treinamento` FOREIGN KEY (`id_treinamento`) REFERENCES `posvenda_treinamento` (`id_treinamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_treinamento_grupo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_grupo` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_grupo` (`id_treinamento_grupo`, `id_treinamento`, `id_cliente`, `id_uso`, `pratica`, `pedido`, `concluido`, `obs_treinamento`, `certificado`, `confirmado`, `data_lancamento`, `somatoria`) VALUES
	(113, 364, 92, 1, 'n', 0, 's', 'Sem Observações', NULL, 's', '2022-05-02 16:32:37', 1),
	(114, 378, 47, 1, 'n', 122, NULL, 'Sem Observações', NULL, 's', '2022-05-09 13:27:16', 1),
	(115, 377, 47, 1, 'n', 2345, NULL, 'Sem Observações', NULL, NULL, '2022-05-13 10:28:04', 1);
/*!40000 ALTER TABLE `posvenda_treinamento_grupo` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_horario
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `horario` varchar(50) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `inicio` time NOT NULL,
  `fim` time NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_treinamento_horario: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_horario` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_horario` (`id_horario`, `horario`, `periodo`, `inicio`, `fim`) VALUES
	(0, '08:30-09:30', 'matutino', '08:30:00', '09:00:00'),
	(1, '09:00-09:30', 'matutino', '09:00:00', '09:30:00'),
	(2, '09:30-10:00', 'matutino', '09:30:00', '10:00:00'),
	(3, '10:00-10:30', 'matutino', '10:00:00', '10:30:00'),
	(4, '10:30-11:00', 'matutino', '10:30:00', '11:00:00'),
	(5, '11:00-11:30', 'matutino', '11:00:00', '11:30:00'),
	(6, '11:30-12:00', 'matutino', '11:30:00', '12:00:00'),
	(7, 'INTERVALO', 'matutino', '12:00:00', '13:00:00'),
	(8, 'INTERVALO', 'matutino', '13:00:00', '13:30:00'),
	(9, '13:30-14:00', 'vespertino', '13:30:00', '14:00:00'),
	(10, '14:00-14:30', 'vespertino', '14:00:00', '14:30:00'),
	(11, '14:30-15:00', 'vespertino', '14:30:00', '15:00:00'),
	(12, '15:00-15:30', 'vespertino', '15:00:00', '15:30:00'),
	(13, '15:30-16:00', 'vespertino', '15:30:00', '16:00:00'),
	(14, '16:00-16:30', 'vespertino', '16:00:00', '16:30:00'),
	(15, '16:30-17:00', 'vespertino', '16:30:00', '17:00:00'),
	(16, '17:00-17:30', 'vespertino', '17:00:00', '17:30:00'),
	(17, '17:30-18:00', 'vespertino', '17:30:00', '18:00:00'),
	(18, '18:00-18:30', 'vespertino', '18:00:00', '18:30:00');
/*!40000 ALTER TABLE `posvenda_treinamento_horario` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_ocupacao
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_ocupacao` (
  `id_ocupacao` int(11) NOT NULL AUTO_INCREMENT,
  `ocupacao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ocupacao`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.posvenda_treinamento_ocupacao: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_ocupacao` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_ocupacao` (`id_ocupacao`, `ocupacao`) VALUES
	(1, 'Individual'),
	(2, 'Grupo');
/*!40000 ALTER TABLE `posvenda_treinamento_ocupacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_participantes
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_participantes` (
  `id_treinamento_participante` int(11) NOT NULL DEFAULT 0,
  `id_treinamento` bigint(20) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_lancamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `somatoria` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_treinamento_participante`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_treinamento_participantes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_participantes` DISABLE KEYS */;
/*!40000 ALTER TABLE `posvenda_treinamento_participantes` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_sala
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_sala` (
  `id_sala` int(11) NOT NULL AUTO_INCREMENT,
  `sala` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_treinamento_sala: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_sala` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_sala` (`id_sala`, `sala`) VALUES
	(1, 'ECCO\'S'),
	(2, 'Sabrina'),
	(3, 'Em Uso'),
	(4, 'Livre');
/*!40000 ALTER TABLE `posvenda_treinamento_sala` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_tipo
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.posvenda_treinamento_tipo: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_tipo` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_tipo` (`id_tipo`, `tipo`) VALUES
	(1, 'Venda'),
	(2, 'Locação'),
	(3, 'Uso Próprio'),
	(4, 'Marketing'),
	(5, 'Eccos');
/*!40000 ALTER TABLE `posvenda_treinamento_tipo` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.posvenda_treinamento_uso
CREATE TABLE IF NOT EXISTS `posvenda_treinamento_uso` (
  `id_uso` int(11) NOT NULL AUTO_INCREMENT,
  `uso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_uso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.posvenda_treinamento_uso: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `posvenda_treinamento_uso` DISABLE KEYS */;
INSERT INTO `posvenda_treinamento_uso` (`id_uso`, `uso`) VALUES
	(0, 'Não definido'),
	(1, 'Showroom'),
	(2, 'Locação'),
	(3, 'Cliente');
/*!40000 ALTER TABLE `posvenda_treinamento_uso` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(10) unsigned NOT NULL,
  `id_unidade` int(10) unsigned DEFAULT NULL,
  `locacao` int(10) unsigned NOT NULL DEFAULT 1,
  `produto` varchar(250) NOT NULL DEFAULT '',
  `id_marca` varchar(250) NOT NULL DEFAULT '',
  `marca` varchar(250) NOT NULL DEFAULT '',
  `eh_produto` varchar(50) NOT NULL DEFAULT '',
  `eh_insumo` varchar(50) NOT NULL DEFAULT '',
  `eh_promocao` varchar(50) NOT NULL DEFAULT '',
  `eh_maisvendido` varchar(50) NOT NULL DEFAULT '',
  `codigo_barra` varchar(50) DEFAULT '',
  `preco_alto` decimal(20,2) DEFAULT 0.00,
  `preco` decimal(20,2) NOT NULL DEFAULT 0.00,
  `descricao` text NOT NULL,
  `observacao` text NOT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `urlyoutube` varchar(250) DEFAULT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 's',
  `usado` varchar(1) NOT NULL DEFAULT 'n',
  `variacao` int(11) NOT NULL DEFAULT 1,
  `sku` varchar(50) NOT NULL DEFAULT '',
  `gtin` varchar(50) NOT NULL DEFAULT '',
  `skupai` varchar(50) NOT NULL DEFAULT '',
  `ncm` varchar(50) NOT NULL DEFAULT '',
  `estoquegerenciado` varchar(1) NOT NULL DEFAULT 's',
  `estoque_inicial` int(11) NOT NULL DEFAULT 0,
  `estoque_minimo` int(11) NOT NULL DEFAULT 0,
  `estoque_reservado` int(11) NOT NULL DEFAULT 0,
  `estoque_maximo` int(11) NOT NULL DEFAULT 0,
  `estoque_atual` int(11) NOT NULL DEFAULT 0,
  `estoque_real` int(11) NOT NULL DEFAULT 0,
  `voltagem` int(11) NOT NULL DEFAULT 220,
  `peso` decimal(20,2) NOT NULL DEFAULT 0.00,
  `altura` decimal(20,2) NOT NULL DEFAULT 0.00,
  `largura` decimal(20,2) NOT NULL DEFAULT 0.00,
  `comprimento` decimal(20,2) NOT NULL DEFAULT 0.00,
  `custo_atual` decimal(20,2) NOT NULL DEFAULT 0.00,
  `custo_medio` decimal(20,2) NOT NULL DEFAULT 0.00,
  `custo_producao` decimal(20,2) NOT NULL DEFAULT 0.00,
  `estoque_financeiro` decimal(20,2) NOT NULL DEFAULT 0.00,
  `data_cadastro` date NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.produto: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id_produto`, `id_categoria`, `id_unidade`, `locacao`, `produto`, `id_marca`, `marca`, `eh_produto`, `eh_insumo`, `eh_promocao`, `eh_maisvendido`, `codigo_barra`, `preco_alto`, `preco`, `descricao`, `observacao`, `imagem`, `urlyoutube`, `ativo`, `usado`, `variacao`, `sku`, `gtin`, `skupai`, `ncm`, `estoquegerenciado`, `estoque_inicial`, `estoque_minimo`, `estoque_reservado`, `estoque_maximo`, `estoque_atual`, `estoque_real`, `voltagem`, `peso`, `altura`, `largura`, `comprimento`, `custo_atual`, `custo_medio`, `custo_producao`, `estoque_financeiro`, `data_cadastro`) VALUES
	(0, 0, NULL, 1, 'Nenhum', '', '', '', '', '', '', '', 0.00, 0.00, '', '', NULL, NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 0, 5, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00'),
	(1, 5, 1, 1, 'Smart Derma Pen - Microagulhamento Elétrico', '1', 'Smart GR', 'S', '', '', '', '', 0.00, 120.00, '', '', '55c40bd4390ea7b097c538d8e9cc9e38.png', NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 0, 4, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00'),
	(2, 6, 2, 1, 'Color Skin Therapy - Micropigmentação', '2', 'HTM', 'S', '', '', '', '', 0.00, 110.00, '', '', 'd40c0c8338bc9b48b6251be3508e2aac.jpg', NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 0, 10, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00'),
	(4, 1, 2, 1, 'Hygiadermo Acqua - Peeling de Água', '3', 'KLD', 'S', '', '', '', '', 0.00, 200.00, '', '', '18c492cbc01556721e2d227f3a760b13.jpg', NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 0, 8, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00'),
	(5, 1, 2, 1, 'Stimullus Face Clean - Terapia Combinada', '2', 'HTM', 'S', '', '', '', '', 0.00, 320.00, '', '', 'stimulus-face-clean-htm-01-600x450.jpg', NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 0, 20, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00'),
	(6, 1, 1, 1, 'Hygiadermo Crystal - Peeling de Cristal e Vacuoterapia', '3', 'KLD', 'S', '', '', '', '', 0.00, 440.00, '', '', '', NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 0, 15, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00'),
	(12, 1, 2, 1, 'Beauty Face - Alta Frequência', '2', 'HTM', 'S', '', '', '', '', 0.00, 123.00, '', '', '0a60a4b9b82cc2bd6997ba4db113f36a.png', NULL, 's', 'n', 1, '', '', '', '', 's', 0, 0, 0, 0, 19, 19, 220, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '0000-00-00');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.produto_categoria
CREATE TABLE IF NOT EXISTS `produto_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) unsigned NOT NULL,
  `categoria` varchar(150) DEFAULT NULL,
  `abreviatura` varchar(50) DEFAULT NULL,
  `tipo_receita` varchar(150) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_categoria`) USING BTREE,
  UNIQUE KEY `categoria` (`categoria`),
  KEY `FK_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.produto_categoria: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `produto_categoria` DISABLE KEYS */;
INSERT INTO `produto_categoria` (`id_categoria`, `id_usuario`, `categoria`, `abreviatura`, `tipo_receita`, `data_cadastro`) VALUES
	(1, 2, 'CRIOFREQUÊNCIA', 'MERC REVEN', '4109- EQUIPAMENTOS', '2022-04-26 10:18:42'),
	(2, 2, 'IMOBILIZADO COSMÉTICOS', NULL, 'AUTOMÁTICO', '2022-04-26 09:29:52'),
	(3, 2, 'MATERIAL DE USO CONSUMO', 'MATERIAL D', 'AUTOMÁTICO', '2022-04-26 09:29:53'),
	(4, 2, 'ASSISTÊNCIA TÉCNICA-PRODUTOS', NULL, '417-ASSIST.PRODUTOS', '2022-04-26 09:29:54'),
	(5, 2, 'CURSOS', NULL, '4106-CURSOS', '2022-04-26 09:29:55'),
	(6, 2, 'ATIVO IMOBILIZADO', NULL, 'AUTOMÁTICO', '2022-04-26 09:29:56'),
	(7, 2, 'COSMÉTICOS', NULL, '4105 - COSMÉTICOS', '2022-04-26 09:29:57'),
	(11, 2, 'PRODUTO ACABADO', 'ACABADO', 'AUTOMÁTICO', '2022-04-26 10:19:13');
/*!40000 ALTER TABLE `produto_categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.produto_localizacao
CREATE TABLE IF NOT EXISTS `produto_localizacao` (
  `id_produto_localizacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `id_usuario` int(11) NOT NULL DEFAULT 2,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_produto_localizacao`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.produto_localizacao: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `produto_localizacao` DISABLE KEYS */;
INSERT INTO `produto_localizacao` (`id_produto_localizacao`, `id_produto`, `id_localizacao`, `estoque`, `id_usuario`, `data_cadastro`) VALUES
	(1, 12, 6, 12, 2, '2022-05-04 15:16:38'),
	(3, 12, 10, 17, 2, '2022-05-04 15:16:38'),
	(4, 1, 2, 0, 2, '2022-05-04 14:37:50'),
	(6, 5, 2, 0, 2, '2022-04-28 00:00:00'),
	(7, 4, 2, 0, 2, '2022-04-28 00:00:00'),
	(41, 1, 10, 0, 2, '2022-05-04 14:37:51'),
	(43, 12, 8, 0, 2, '2022-05-04 13:35:31');
/*!40000 ALTER TABLE `produto_localizacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.produto_marca
CREATE TABLE IF NOT EXISTS `produto_marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT 2,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_marca`),
  UNIQUE KEY `marca` (`marca`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.produto_marca: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `produto_marca` DISABLE KEYS */;
INSERT INTO `produto_marca` (`id_marca`, `marca`, `id_usuario`, `data_cadastro`) VALUES
	(1, 'IBRAMED', 2, '2022-04-26 11:08:47'),
	(2, 'HTM', 2, '2022-04-26 11:08:47'),
	(3, 'TONEDERM', 2, '2022-04-26 11:08:47'),
	(4, 'MEDICAL SAN', 2, '2022-04-26 11:08:47'),
	(5, 'KLD', 2, '2022-04-26 11:08:47'),
	(6, 'SMARTGR', 2, '2022-04-26 11:08:47'),
	(7, 'FISMATEK', 2, '2022-04-26 11:08:47'),
	(8, 'SALLUS', 2, '2022-04-26 11:08:47'),
	(9, 'ESTEK', 2, '2022-04-26 11:08:47'),
	(10, 'CEBRA', 2, '2022-04-26 11:08:47'),
	(11, 'BIOSET', 2, '2022-04-26 11:08:47'),
	(12, 'MMO', 2, '2022-04-26 11:08:47'),
	(13, 'RMC', 2, '2022-04-26 11:08:47'),
	(14, 'PONCE', 2, '2022-04-26 11:08:47'),
	(15, 'DMG', 2, '2022-04-26 11:08:47'),
	(16, 'FISMATECK', 2, '2022-04-26 11:08:47'),
	(17, 'SEM MARCA', 2, '2022-04-26 11:08:47');
/*!40000 ALTER TABLE `produto_marca` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.produto_unidade
CREATE TABLE IF NOT EXISTS `produto_unidade` (
  `id_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_unidade` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT 2,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_unidade`) USING BTREE,
  UNIQUE KEY `marca` (`nome_unidade`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.produto_unidade: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `produto_unidade` DISABLE KEYS */;
INSERT INTO `produto_unidade` (`id_unidade`, `nome_unidade`, `id_usuario`, `data_cadastro`) VALUES
	(19, 'Kg', 2, '2022-04-26 12:00:37');
/*!40000 ALTER TABLE `produto_unidade` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.saida_avulsa
CREATE TABLE IF NOT EXISTS `saida_avulsa` (
  `id_saida` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `qtde_saida` int(11) NOT NULL,
  `valor_saida` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal_saida` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT 2,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_saida`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.saida_avulsa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `saida_avulsa` DISABLE KEYS */;
INSERT INTO `saida_avulsa` (`id_saida`, `id_produto`, `id_localizacao`, `qtde_saida`, `valor_saida`, `subtotal_saida`, `data_saida`, `hora_saida`, `id_usuario`, `data_registro`) VALUES
	(5, 12, 6, 3, 123.00, 369.00, '2022-05-04', '19:42:00', 2, '2022-05-04 14:42:28');
/*!40000 ALTER TABLE `saida_avulsa` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.tipo_movimento
CREATE TABLE IF NOT EXISTS `tipo_movimento` (
  `id_tipo_movimento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_movimento` varchar(250) DEFAULT NULL,
  `ent_sai` varchar(1) DEFAULT NULL,
  `movimenta_estoque` varchar(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT 2,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_tipo_movimento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.tipo_movimento: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_movimento` DISABLE KEYS */;
INSERT INTO `tipo_movimento` (`id_tipo_movimento`, `tipo_movimento`, `ent_sai`, `movimenta_estoque`, `id_usuario`, `data_cadastro`) VALUES
	(1, 'Estrada Avulsa', 'E', 'S', 2, '2022-04-26 14:42:19'),
	(2, 'Entrada Por Ajuste Balanço', 'E', 'S', 2, '2022-04-26 14:42:20'),
	(3, 'Entrada Por Ordem de Compra', 'E', 'S', 2, '2022-04-26 14:42:23'),
	(4, 'Entrada Por Ordem de Produção', 'S', 'S', 2, '2022-04-26 14:42:24'),
	(5, 'Saída Avulsa', 'S', 'S', 2, '2022-04-26 14:42:25'),
	(6, 'Saída Por Perda', 'S', 'S', 2, '2022-04-26 14:42:27'),
	(7, 'Saída por Venda de Produto', 'S', 'S', 2, '2022-04-26 14:42:28'),
	(8, 'Saída por Ordem de Produção', 'S', 'S', 2, '2022-04-26 14:42:29'),
	(9, 'Saída por Ajuste de Balanço', 'S', 'S', 2, '2022-04-26 14:42:30'),
	(10, 'Saída para Consumo Interno', 'S', 'S', 2, '2022-04-26 14:42:31'),
	(11, 'Saida por Transferencia de Estoque', 'S', 'N', 2, '2022-04-26 14:42:32'),
	(12, 'Entrada por Transferencia de Estoque', 'E', 'N', 2, '2022-04-26 14:42:32');
/*!40000 ALTER TABLE `tipo_movimento` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.tipo_receita
CREATE TABLE IF NOT EXISTS `tipo_receita` (
  `id_tr` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_tr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.tipo_receita: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_receita` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_receita` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.transferencia
CREATE TABLE IF NOT EXISTS `transferencia` (
  `id_transferencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_origem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `data_transferencia` date NOT NULL,
  `qtde_transferencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT 2,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_transferencia`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.transferencia: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `transferencia` DISABLE KEYS */;
INSERT INTO `transferencia` (`id_transferencia`, `id_origem`, `id_produto`, `id_destino`, `data_transferencia`, `qtde_transferencia`, `id_usuario`, `data_registro`) VALUES
	(9, 6, 12, 10, '2022-05-04', 5, 2, '2022-05-04 14:44:01'),
	(10, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 14:56:00'),
	(11, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 14:56:55'),
	(12, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:01:54'),
	(13, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:03:45'),
	(14, 6, 12, 10, '2022-05-04', 1, 2, '2022-05-04 15:04:23'),
	(15, 6, 12, 10, '2022-05-04', 1, 2, '2022-05-04 15:06:34'),
	(16, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:08:30'),
	(17, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:10:28'),
	(18, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:10:59'),
	(19, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:11:03'),
	(20, 10, 12, 6, '2022-05-04', 2, 2, '2022-05-04 15:12:16'),
	(21, 10, 12, 6, '2022-05-04', 2, 2, '2022-05-04 15:12:25'),
	(22, 10, 12, 6, '2022-05-04', 2, 2, '2022-05-04 15:14:39'),
	(23, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:15:21'),
	(24, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:16:01'),
	(25, 6, 12, 10, '2022-05-04', 2, 2, '2022-05-04 15:16:14'),
	(26, 10, 12, 6, '2022-05-04', 10, 2, '2022-05-04 15:16:38');
/*!40000 ALTER TABLE `transferencia` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.unidade
CREATE TABLE IF NOT EXISTS `unidade` (
  `id_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `unidade` varchar(150) NOT NULL,
  `CNPJ` int(11) NOT NULL,
  `endereco_filial` varchar(250) NOT NULL DEFAULT '',
  `cep_filial` int(11) NOT NULL,
  `numero_filial` int(11) NOT NULL,
  `complemento_filial` varchar(50) NOT NULL,
  `bairro_filial` varchar(150) NOT NULL,
  `telefone_filial` varchar(150) NOT NULL,
  PRIMARY KEY (`id_unidade`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.unidade: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `unidade` DISABLE KEYS */;
INSERT INTO `unidade` (`id_unidade`, `unidade`, `CNPJ`, `endereco_filial`, `cep_filial`, `numero_filial`, `complemento_filial`, `bairro_filial`, `telefone_filial`) VALUES
	(1, 'Florianópolis-SC', 0, '', 0, 0, '', '', ''),
	(2, 'Amparo-SP', 0, '', 0, 0, '', '', '');
/*!40000 ALTER TABLE `unidade` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.updates
CREATE TABLE IF NOT EXISTS `updates` (
  `id_updates` int(11) NOT NULL AUTO_INCREMENT,
  `versao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(450) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_updates`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela sys.updates: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `updates` DISABLE KEYS */;
INSERT INTO `updates` (`id_updates`, `versao`, `desc`, `data`) VALUES
	(2, '1.0 beta', 'Lançamento do sistema com módulo de SAC pós venda', '2022-02-23 10:41:55');
/*!40000 ALTER TABLE `updates` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) unsigned NOT NULL,
  `id_colaborador` smallint(6) unsigned NOT NULL,
  `color` varchar(50) NOT NULL DEFAULT '',
  `login` varchar(50) DEFAULT NULL,
  `nome_usuario` varchar(50) DEFAULT NULL,
  `email_usuario` varchar(250) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `filial` varchar(50) DEFAULT NULL,
  `acesso` varchar(50) DEFAULT 'Master',
  `id_filial` int(11) DEFAULT NULL,
  `updates` int(11) DEFAULT NULL,
  `acessos` int(11) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `id_setor` varchar(50) DEFAULT NULL,
  `posvenda` varchar(50) DEFAULT NULL,
  `aprofessor` varchar(50) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT 'icon.png',
  `imagem_certificado` varchar(50) DEFAULT 'certificado.jpg',
  `chamado` varchar(1) DEFAULT NULL,
  `treinamento` varchar(1) DEFAULT NULL,
  `instrutor` varchar(1) DEFAULT NULL,
  `geral` varchar(1) DEFAULT NULL,
  `estoque` varchar(1) DEFAULT NULL,
  `compras` varchar(1) DEFAULT NULL,
  `vendas` varchar(1) DEFAULT NULL,
  `excluir` varchar(1) DEFAULT NULL,
  `inserir` varchar(1) DEFAULT NULL,
  `editar` varchar(1) DEFAULT NULL,
  `usuario_sala` varchar(1) DEFAULT NULL,
  `dash` varchar(30) DEFAULT 'home.php',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `id_colaborador`, `color`, `login`, `nome_usuario`, `email_usuario`, `senha`, `filial`, `acesso`, `id_filial`, `updates`, `acessos`, `cargo`, `id_setor`, `posvenda`, `aprofessor`, `imagem`, `imagem_certificado`, `chamado`, `treinamento`, `instrutor`, `geral`, `estoque`, `compras`, `vendas`, `excluir`, `inserir`, `editar`, `usuario_sala`, `dash`) VALUES
	(1, 0, '', 'posvenda@rentalmed.com.br', 'Thiago Bassotti', 'posvenda@rentalmed.com.br', 'psvendas@#', NULL, '1', NULL, NULL, NULL, 'Supervisor de Pós-venda', '2', 's', 's', 'thiagobassotti.jpg', 'certificado.jpg', 's', 's', '', 's', NULL, NULL, NULL, 's', 's', 's', NULL, 'home'),
	(2, 0, '', 'mvgelo@gmail.com', 'Marcus Vinicius', 'mvgelo@gmail.com', '@#alex2021', NULL, '1', NULL, NULL, NULL, 'Programador', '2', 's', 's', 'maarcusvinicius.png', 'certificado.jpg', 's', 's', '', 's', 's', 's', 's', 's', 's', 's', NULL, 'home'),
	(3, 0, '', 'posvenda05@rentalmed.com.br', 'Marcia Sabino', 'posvenda05@rentalmed.com.br', '@#prestes', NULL, '0', NULL, NULL, NULL, 'Operadora de Pós-venda', NULL, 's', 's', 'marciasabino.jpeg', 'certificado.jpg', 's', 's', '', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'home'),
	(4, 0, '', 'posvenda02@rentalmed.com.br', 'Bernardo Barbosa', 'posvenda02@rentalmed.com.br', '@#barbosa', NULL, '0', NULL, NULL, NULL, 'Operador de Pós-venda', NULL, 's', 's', 'bernardo.jpeg', 'certificado.jpg', 's', 's', '', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'home'),
	(5, 0, '#A52A2A', 'ildo@rentalmed.com.br', 'Ildo Teixeira da Silva', 'ildo@rentalmed.com.br', '@#ildo', NULL, '0', NULL, NULL, NULL, 'Treinamento', NULL, 's', 's', 'ildo.jpg', 'certificado_ildo.jpg', '', 's', 's', 's', NULL, NULL, NULL, NULL, NULL, 's', 's', 'home_agenda'),
	(6, 0, '#FF69B4', 'treinamento@rentalmed.com.br', 'Vanessa Costa Feitosa', 'treinamento@rentalmed.com.br', '@#van', NULL, '0', NULL, NULL, NULL, 'Treinamento', '2', 's', 's', 'vanessa.jpg', 'certificado_vanessa.jpg', 's', 's', 's', 's', NULL, NULL, NULL, NULL, NULL, NULL, 's', 'home'),
	(7, 0, '#40E0D0', 'sa_sussekind@hotmail.com', 'Sabrina Sussekind', 'sa_sussekind@hotmail.com', 'sussekind', NULL, '0', NULL, NULL, NULL, 'Terceirizado', NULL, 's', NULL, 'icon.png', 'certificado.jpg', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 's', 'home'),
	(8, 0, '#228B22', 'marketing@rentalmed.com.br', 'Alexia Ferreira', 'marketing@rentalmed.com.br', '@#ferreira', NULL, '0', NULL, NULL, NULL, 'Gerente de Marketing', NULL, 's', NULL, 'icon.png', 'certificado.jpg', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 's', 'home'),
	(9, 0, '#DAA520', 'comercial06@rentalmed.com.br', 'Olizer dos Santos', 'comercial06@rentalmed.com.br', '@#olizer', NULL, '0', NULL, NULL, NULL, 'Locação', '2', 's', NULL, 'icon.png', 'certificado.jpg', NULL, 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 's', '', 'home');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_forma_pagamento
CREATE TABLE IF NOT EXISTS `venda_forma_pagamento` (
  `id_forma_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `forma` varchar(50) NOT NULL DEFAULT '',
  `taxa` double NOT NULL,
  `parcela_max` int(11) NOT NULL,
  `obrigatorio` varchar(1) NOT NULL DEFAULT 'a',
  PRIMARY KEY (`id_forma_pagamento`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.venda_forma_pagamento: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_forma_pagamento` DISABLE KEYS */;
INSERT INTO `venda_forma_pagamento` (`id_forma_pagamento`, `forma`, `taxa`, `parcela_max`, `obrigatorio`) VALUES
	(1, 'PIX', 0, 1, 'a'),
	(2, 'DINHEIRO', 0, 1, 'a'),
	(3, 'CARTÃO DE DÉBITO', 5, 1, 'a'),
	(4, 'CARTÃO DE CRÉDITO', 4, 24, 'a'),
	(5, 'FINAMCIAMENTO', 0, 24, 'n'),
	(6, 'PAY PAL', 0, 12, 'a'),
	(7, 'MERCADO PAGO', 0, 12, 'a'),
	(8, 'CASHBACK', 0, 1, 'a');
/*!40000 ALTER TABLE `venda_forma_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_item_pedido
CREATE TABLE IF NOT EXISTS `venda_item_pedido` (
  `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `qtde_atendido` int(11) NOT NULL,
  `id_origem` int(11) NOT NULL DEFAULT 1,
  `valor` decimal(10,2) NOT NULL,
  `frete` decimal(10,2) NOT NULL,
  `desconto_valor` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `desconto_percentual` decimal(10,0) NOT NULL,
  `total_somado` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_item_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=374 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.venda_item_pedido: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_item_pedido` DISABLE KEYS */;
INSERT INTO `venda_item_pedido` (`id_item_pedido`, `id_pedido`, `id_produto`, `qtde`, `qtde_atendido`, `id_origem`, `valor`, `frete`, `desconto_valor`, `total`, `desconto_percentual`, `total_somado`) VALUES
	(217, 1, 6, 4, 0, 1, 440.00, 0.00, 0.00, 0.00, 0, 0.00),
	(220, 2, 2, 3, 0, 1, 110.00, 0.00, 0.00, 0.00, 0, 0.00),
	(223, 1, 5, 1, 0, 1, 320.00, 0.00, 0.00, 0.00, 0, 0.00),
	(224, 1, 1, 2, 0, 1, 120.00, 0.00, 0.00, 0.00, 0, 0.00),
	(368, 7, 2, 2, 0, 1, 110.00, 15.00, 11.00, 220.00, 5, 239.00),
	(369, 7, 1, 1, 0, 1, 120.00, 15.00, 0.00, 120.00, 0, 135.00),
	(370, 7, 5, 1, 0, 1, 320.00, 15.00, 0.00, 320.00, 0, 335.00),
	(372, 4, 2, 3, 0, 1, 110.00, 15.00, 69.30, 330.00, 21, 305.70),
	(373, 4, 6, 8, 0, 1, 440.00, 15.00, 176.00, 3520.00, 5, 3464.00);
/*!40000 ALTER TABLE `venda_item_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_pedido
CREATE TABLE IF NOT EXISTS `venda_pedido` (
  `id_pedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) unsigned DEFAULT NULL,
  `comprador` varchar(1) DEFAULT NULL,
  `start` varchar(1) DEFAULT 'n',
  `id_comprador` int(10) unsigned DEFAULT NULL,
  `id_usuario` int(10) unsigned DEFAULT NULL,
  `id_origem_venda` int(10) unsigned DEFAULT 1,
  `qtd_produtos` int(10) unsigned DEFAULT 0,
  `data_pedido` date DEFAULT NULL,
  `hora_pedido` time DEFAULT NULL,
  `baixado` varchar(1) DEFAULT 'n',
  `finalizado` varchar(1) DEFAULT 'n',
  `id_status_pedido` smallint(6) DEFAULT 1,
  `frete` decimal(10,2) DEFAULT 0.00,
  `desconto_valor` decimal(10,2) DEFAULT 0.00,
  `desconto_percentual` int(11) DEFAULT 0,
  `nc` int(1) DEFAULT 1,
  `total` decimal(10,2) DEFAULT 0.00,
  `total_somado` decimal(10,2) DEFAULT 0.00,
  `observacao` longtext DEFAULT NULL,
  `textolivre` longtext DEFAULT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.venda_pedido: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_pedido` DISABLE KEYS */;
INSERT INTO `venda_pedido` (`id_pedido`, `id_cliente`, `comprador`, `start`, `id_comprador`, `id_usuario`, `id_origem_venda`, `qtd_produtos`, `data_pedido`, `hora_pedido`, `baixado`, `finalizado`, `id_status_pedido`, `frete`, `desconto_valor`, `desconto_percentual`, `nc`, `total`, `total_somado`, `observacao`, `textolivre`) VALUES
	(1, 47, NULL, 'n', NULL, 2, 1, 3, '2022-06-02', '00:00:16', 'n', 's', 3, 0.00, 0.00, 0, 1, 2320.00, 0.00, NULL, NULL),
	(2, 27, NULL, 'n', NULL, 2, 1, 1, '2022-06-02', '00:00:16', 'n', 's', 2, 0.00, 0.00, 0, 1, 1955.00, 0.00, NULL, NULL),
	(3, 4, NULL, 'n', NULL, 2, 1, 3, '2022-06-02', '00:00:16', 'n', 's', 2, 0.00, 0.00, 0, 1, 1950.00, 0.00, NULL, NULL),
	(4, 3, 's', 'n', 3, 2, 1, 2, '2022-07-05', '00:00:20', 'n', 's', 1, 30.00, 640.85, 17, 1, 3769.70, 3158.85, NULL, NULL),
	(6, 3, NULL, 'n', NULL, 2, 1, 0, '2022-07-25', '00:00:16', 'n', 'n', 3, 0.00, 0.00, 0, 1, 0.00, 0.00, NULL, NULL),
	(7, 114, NULL, 'n', NULL, 2, 1, 3, '2022-07-26', '00:00:15', 'n', 's', 4, 45.00, 0.00, 0, 1, 709.00, 754.00, NULL, NULL);
/*!40000 ALTER TABLE `venda_pedido` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_pedido_anexos
CREATE TABLE IF NOT EXISTS `venda_pedido_anexos` (
  `id_pedido_anexos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_anexo` varchar(150) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pedido_anexos`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.venda_pedido_anexos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_pedido_anexos` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda_pedido_anexos` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_pedido_pagamento
CREATE TABLE IF NOT EXISTS `venda_pedido_pagamento` (
  `id_pedido_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `id_forma_pagamento` int(11) DEFAULT NULL,
  `id_banco` int(11) DEFAULT NULL,
  `parcela` int(3) DEFAULT NULL,
  `nparcelas` int(3) DEFAULT NULL,
  `valor_pedido` decimal(20,2) DEFAULT NULL,
  `valor_parcial` decimal(20,2) DEFAULT NULL,
  `valor_apagar` decimal(20,2) DEFAULT NULL,
  `taxa` decimal(20,2) DEFAULT NULL,
  `id_forma` int(11) NOT NULL,
  `anexo` varchar(150) DEFAULT '',
  `ncontrato` varchar(50) NOT NULL DEFAULT '',
  `data_quitacao` date DEFAULT NULL,
  `data_registro` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pedido_pagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.venda_pedido_pagamento: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_pedido_pagamento` DISABLE KEYS */;
INSERT INTO `venda_pedido_pagamento` (`id_pedido_pagamento`, `id_pedido`, `data_pagamento`, `id_forma_pagamento`, `id_banco`, `parcela`, `nparcelas`, `valor_pedido`, `valor_parcial`, `valor_apagar`, `taxa`, `id_forma`, `anexo`, `ncontrato`, `data_quitacao`, `data_registro`) VALUES
	(67, 4, '2022-08-24', 2, 1, 1, 1, 3158.85, 3158.85, 234.00, 0.00, 1, 'comprovante_4_67_271_.png', '', NULL, '2022-08-24 11:04:58');
/*!40000 ALTER TABLE `venda_pedido_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_pedido_parcela
CREATE TABLE IF NOT EXISTS `venda_pedido_parcela` (
  `id_pedido_parcela` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido_pagamento` int(11) NOT NULL DEFAULT 0,
  `data_pagamento` date DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_forma_pagamento` int(11) DEFAULT NULL,
  `parcela` int(11) DEFAULT NULL,
  `total_parcelas` int(11) DEFAULT NULL,
  `valor_parcial` decimal(20,2) DEFAULT NULL,
  `taxa` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`id_pedido_parcela`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sys.venda_pedido_parcela: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_pedido_parcela` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda_pedido_parcela` ENABLE KEYS */;

-- Copiando estrutura para tabela sys.venda_status_pedido
CREATE TABLE IF NOT EXISTS `venda_status_pedido` (
  `id_status_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `status_pedido` varchar(50) NOT NULL DEFAULT '',
  `cor` varchar(50) NOT NULL DEFAULT '',
  `acesso` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_status_pedido`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela sys.venda_status_pedido: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `venda_status_pedido` DISABLE KEYS */;
INSERT INTO `venda_status_pedido` (`id_status_pedido`, `status_pedido`, `cor`, `acesso`) VALUES
	(1, 'Orçamento', 'primary', ''),
	(2, 'Aguardando Aprovação', 'warning', ''),
	(3, 'Incompleto', 'danger', ''),
	(4, 'Liberado', 'success', ''),
	(5, 'Nota Futura Anexada', 'secondary', ''),
	(6, 'Solicitado Fábrica', 'warning', ''),
	(7, 'Aguardando Pagamento', 'warning', ''),
	(8, 'Com Pendências', 'danger', ''),
	(9, 'Faturado', 'success', ''),
	(10, 'Trânsito Cliente', 'warning', ''),
	(11, 'Entregue', 'secondary', ''),
	(12, 'Consiginado', 'info', ''),
	(13, 'Pago Enviar', 'success', ''),
	(14, 'Liberado Envio', 'success', ''),
	(15, 'Stand Rentalmed Entregue', 'secondary', ''),
	(16, 'Stand Rentalmed', 'primary', '');
/*!40000 ALTER TABLE `venda_status_pedido` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
