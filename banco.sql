-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para tcc
CREATE DATABASE IF NOT EXISTS `tcc` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tcc`;

-- Copiando estrutura para tabela tcc.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_servico` int(11) NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_termino` time NOT NULL,
  `data_agenda` date NOT NULL,
  `status_agenda` char(20) DEFAULT 'Pendente',
  PRIMARY KEY (`id_agenda`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_servico` (`id_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT=' Essa tabela serve para guardar os dados de agendamento onde';

-- Copiando dados para a tabela tcc.agenda: 19 rows
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id_agenda`, `id_cliente`, `id_funcionario`, `id_servico`, `horario_inicio`, `horario_termino`, `data_agenda`, `status_agenda`) VALUES
	(1, 1, 1, 1, '15:00:00', '15:30:00', '2019-07-02', 'Não Compareceu'),
	(2, 2, 1, 3, '08:00:00', '08:30:00', '2020-07-14', 'Compareceu'),
	(3, 3, 1, 2, '16:00:00', '16:30:00', '2020-07-13', 'Compareceu'),
	(4, 1, 2, 1, '17:00:00', '17:30:00', '2020-07-13', 'Compareceu'),
	(5, 4, 1, 1, '20:00:00', '20:30:00', '2020-07-13', 'Compareceu'),
	(6, 4, 2, 2, '20:31:00', '21:00:00', '2020-07-13', 'Compareceu'),
	(7, 3, 3, 3, '18:00:00', '18:20:00', '2020-07-13', 'Compareceu'),
	(8, 5, 3, 4, '22:00:00', '22:30:00', '2020-07-13', 'Compareceu'),
	(9, 5, 1, 3, '17:10:00', '17:40:00', '2020-07-14', 'Não Compareceu'),
	(10, 9, 3, 1, '22:30:00', '23:00:00', '2020-07-14', 'Não Compareceu'),
	(11, 10, 2, 1, '16:30:00', '16:45:00', '2020-07-21', 'Pendente'),
	(12, 7, 4, 4, '09:30:00', '10:00:00', '2020-07-21', 'Pendente'),
	(13, 2, 2, 5, '17:00:00', '17:30:00', '2020-07-21', 'Pendente'),
	(14, 4, 4, 1, '13:00:00', '13:30:00', '2020-07-20', 'Compareceu'),
	(15, 8, 2, 3, '18:00:00', '19:30:00', '2020-07-16', 'Compareceu'),
	(16, 1, 2, 5, '19:13:00', '19:14:00', '2020-07-16', 'Compareceu'),
	(19, 12, 1, 2, '21:50:00', '22:00:00', '2020-07-19', 'Compareceu'),
	(18, 1, 4, 1, '19:37:00', '20:00:00', '2020-07-19', 'Compareceu'),
	(20, 13, 1, 1, '14:30:00', '15:00:00', '2020-07-20', 'Não compareceu');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_endereco` int(11) DEFAULT NULL,
  `nome_cliente` varchar(250) NOT NULL,
  `email_cliente` varchar(100) DEFAULT 'Sem Email',
  `telefone_celular_cliente` char(12) DEFAULT 'Sem Telefone',
  `telefone_fixo_cliente` char(12) DEFAULT 'Sem telefone',
  `status_cliente` char(50) DEFAULT 'Ativo',
  PRIMARY KEY (`id_cliente`),
  KEY `id_endereco` (`id_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='Essa tabela serve para guardar os dados do cliente, onde tod';

-- Copiando dados para a tabela tcc.cliente: 13 rows
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `id_endereco`, `nome_cliente`, `email_cliente`, `telefone_celular_cliente`, `telefone_fixo_cliente`, `status_cliente`) VALUES
	(1, 1, 'Caio Lisboa', 'cai@cai', '119916836412', '1155172811', 'Ativo'),
	(2, 3, 'Ana Paula', 'ana@ana', '11931923123', '1155172811', 'Ativo'),
	(3, 7, 'Nath', 'nath@nath', '11998548511', '11548741874', 'Ativo'),
	(4, NULL, 'Vilma Lisboa Santana', 'Sem Email', '11989827269', '1155172811', 'Ativo'),
	(5, NULL, 'Beatriz Lopes', 'Sem Email', '11948495968', '11558973821', 'Ativo'),
	(6, 10, 'Jose agnaldo', 'gui@gui', '11931923123', '', 'Ativo'),
	(7, 11, 'Gabriel Oliveira', 'gabriel@gabriel', '11992242424', '', 'Ativo'),
	(8, 12, 'filipe', 'filipe@filipe', '1198238932', '1155283721', 'Ativo'),
	(9, 15, 'Sandro Alves', 'sandro@gmail.com', '11998423421', '11553242321', 'Ativo'),
	(10, NULL, 'Maria Sogra', 'Sem Email', '11991375454', '1158962515', 'Ativo'),
	(11, 16, 'Roberto Santos', 'roberto@gmail.com', '11991687854', '1155178451', 'Ativo'),
	(12, NULL, 'Felipe felipe', 'Sem Email', '000000000', '', 'Ativo'),
	(13, NULL, 'Roberto Cardoso', 'Sem Email', '1199875412', '', 'Ativo');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` char(9) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` char(20) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Essa tabela serve para guardar os dados de endereco do clien';

-- Copiando dados para a tabela tcc.endereco: 16 rows
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`id_endereco`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
	(1, '01517100', 'Viaduto 31 de Março', '11', '', 'Liberdade', 'São Paulo', 'SP'),
	(2, '04953030', 'Rua Carolus-Duran', '10', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(3, '04953030', '', '', '', '', '', 'AC'),
	(4, '04953030', 'Rua Carolus-Duran', '', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(5, '04953030', 'Rua Carolus-Duran', '10', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(6, '04953030', 'Rua Carolus-Duran', '11', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(7, '04950005', 'Rua Frederico Murnau', '10', '', 'Cidade Ipava', 'São Paulo', 'SP'),
	(8, '04953030', 'Rua Carolus-Duran', '10', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(9, '08240001', 'Rua 23 de Novembro', '11', '', 'Vila Progresso (Zona Leste)', 'São Paulo', 'SP'),
	(10, '08240001', 'Rua 23 de Novembro', '12', '', 'Vila Progresso (Zona Leste)', 'São Paulo', 'SP'),
	(11, '08150640', 'Travessa 26 de Outubro', '10', '', 'Jardim Nazareth', 'São Paulo', 'SP'),
	(12, '03047000', 'Rua 21 de Abril', '213', '', 'Brás', 'São Paulo', 'SP'),
	(13, '04953030', 'Rua Carolus-Duran', '512', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(14, '04953030', 'Rua Carolus-Duran', '512', '', 'Vila Gilda', 'São Paulo', 'SP'),
	(15, '03047000', 'Rua 21 de Abril', '100', '', 'Brás', 'São Paulo', 'SP'),
	(16, '08240001', 'Rua 23 de Novembro', '12', '', 'Vila Progresso (Zona Leste)', 'São Paulo', 'SP');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_funcionario` varchar(250) NOT NULL,
  `telefone_celular_funcionario` char(12) DEFAULT 'Sem Telefone',
  `telefone_fixo_funcionario` char(12) DEFAULT 'Sem telefone',
  `email_funcionario` varchar(100) DEFAULT 'Sem Email',
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id_funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Essa tabela serve para guardar os dados do funcionario, pois';

-- Copiando dados para a tabela tcc.funcionario: 5 rows
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `telefone_celular_funcionario`, `telefone_fixo_funcionario`, `email_funcionario`, `senha`) VALUES
	(1, 'Caique', '11991683641', '1155172811', 'cai@cai', 'caique'),
	(2, 'Nath', '11931923123', '1155172811', 'nath@nath', '123456'),
	(3, 'Wagner Antonio', '11992346234', '1155374523', 'wagner@gmail.com', 'wagner'),
	(4, 'jovi', '11981815148', '11552874511', 'jovi@jovi', 'jovijovi'),
	(5, 'admin', 'Sem Celular', 'Sem Fixo', 'admin@admin', 'admin');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.ganho
CREATE TABLE IF NOT EXISTS `ganho` (
  `id_ganho` int(11) NOT NULL AUTO_INCREMENT,
  `id_agenda` int(11) DEFAULT NULL,
  `data_ganho` date NOT NULL,
  `status_ganho` varchar(20) DEFAULT 'Pagamento em Espera',
  `valor_ganho` float NOT NULL,
  PRIMARY KEY (`id_ganho`),
  UNIQUE KEY `id_agenda` (`id_agenda`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Essa tabela serve para guardar os dados do que é ganhado em ';

-- Copiando dados para a tabela tcc.ganho: 19 rows
/*!40000 ALTER TABLE `ganho` DISABLE KEYS */;
INSERT INTO `ganho` (`id_ganho`, `id_agenda`, `data_ganho`, `status_ganho`, `valor_ganho`) VALUES
	(1, 1, '2020-07-02', 'nao pago', 120),
	(2, 2, '2020-07-14', 'Pago', 100),
	(3, 3, '2020-07-13', 'Pago', 50),
	(4, 4, '2020-07-13', 'Pago', 35),
	(5, 5, '2020-07-13', 'Pago', 50),
	(6, 6, '2020-07-13', 'Pago', 55),
	(7, 7, '2020-07-13', 'Pago', 20),
	(8, 8, '2020-07-13', 'Pago', 300),
	(9, 9, '2020-07-14', 'nao pago', 20),
	(10, 10, '2020-07-14', 'nao pago', 100),
	(11, 11, '2020-07-21', 'Pago', 40),
	(12, 12, '2020-07-21', 'Pago', 120),
	(13, 13, '2020-07-21', 'Pago', 100),
	(14, 14, '2020-07-20', 'Pago', 100),
	(15, 15, '2020-07-16', 'Pago', 100),
	(16, 16, '2020-07-16', 'Pago', 100),
	(20, 20, '2020-07-20', 'nao pago', 120),
	(18, 18, '2020-07-19', 'Pago', 100),
	(19, 19, '2020-07-19', 'Pago', 120);
/*!40000 ALTER TABLE `ganho` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.gasto
CREATE TABLE IF NOT EXISTS `gasto` (
  `id_gasto` int(11) NOT NULL AUTO_INCREMENT,
  `data_gasto` date NOT NULL,
  `valor_gasto` float NOT NULL,
  `descricao` varchar(250) NOT NULL,
  PRIMARY KEY (`id_gasto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Essa tabela serve para guardar os dados do que é gastado par';

-- Copiando dados para a tabela tcc.gasto: 0 rows
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.gasto_ganho
CREATE TABLE IF NOT EXISTS `gasto_ganho` (
  `id_ganho` int(11) DEFAULT NULL,
  `id_gasto` int(11) DEFAULT NULL,
  KEY `id_ganho` (`id_ganho`),
  KEY `id_gasto` (`id_gasto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT=' Essa tabela serve apenas como ligação entre a tabela ganho ';

-- Copiando dados para a tabela tcc.gasto_ganho: 0 rows
/*!40000 ALTER TABLE `gasto_ganho` DISABLE KEYS */;
/*!40000 ALTER TABLE `gasto_ganho` ENABLE KEYS */;

-- Copiando estrutura para tabela tcc.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_servico` varchar(100) NOT NULL,
  PRIMARY KEY (`id_servico`),
  UNIQUE KEY `tipo_servico` (`tipo_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Essa tabela serve para guardar os dados dos serviços ofereci';

-- Copiando dados para a tabela tcc.servico: 10 rows
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`id_servico`, `tipo_servico`) VALUES
	(1, 'Corte'),
	(2, 'Manicure'),
	(3, 'Progressiva'),
	(4, 'Depilação'),
	(5, 'Pedicure'),
	(6, 'Relaxamento'),
	(7, 'Luzes'),
	(8, 'Pintura'),
	(9, 'Escova'),
	(10, 'Chapinha');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;

-- Copiando estrutura para view tcc.view_agenda
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `view_agenda` (
	`id_agenda` INT(11) NOT NULL,
	`nome_cliente` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`nome_funcionario` VARCHAR(250) NOT NULL COLLATE 'latin1_swedish_ci',
	`tipo_servico` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`horario_inicio` TIME NOT NULL,
	`horario_termino` TIME NOT NULL,
	`data_agenda` DATE NOT NULL,
	`valor_ganho` FLOAT NOT NULL,
	`status_agenda` CHAR(20) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Copiando estrutura para view tcc.view_agenda
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `view_agenda`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_agenda` AS SELECT 	agenda.id_agenda,
			cliente.nome_cliente,
			funcionario.nome_funcionario,
			servico.tipo_servico,
			agenda.horario_inicio,
			agenda.horario_termino,
			agenda.data_agenda,
			ganho.valor_ganho,
			agenda.status_agenda 
		FROM  		  agenda 
			INNER JOIN cliente 		ON (cliente.id_cliente = agenda.id_cliente) 
			INNER JOIN funcionario  ON (funcionario.id_funcionario = agenda.id_funcionario)
			INNER JOIN servico 		ON (servico.id_servico = agenda.id_servico) 
			INNER JOIN ganho 			ON (ganho.id_agenda = agenda.id_agenda) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
