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

-- Copiando dados para a tabela tcc.agenda: 1 rows
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id_agenda`, `id_cliente`, `id_funcionario`, `id_servico`, `horario_inicio`, `horario_termino`, `data_agenda`, `status_agenda`) VALUES
	(1, 1, 1, 1, '15:00:00', '15:30:00', '2020-07-02', 'Pendente');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.cliente: 2 rows
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `id_endereco`, `nome_cliente`, `email_cliente`, `telefone_celular_cliente`, `telefone_fixo_cliente`, `status_cliente`) VALUES
	(1, 1, 'Caio Lisboa', 'cai@cai', '119916836412', '1155172811', 'Ativo'),
	(2, 3, '', '', '', '', 'Ativo');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.endereco: 4 rows
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`id_endereco`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
	(1, '04953030', 'Rua Carolus-Duran', '10', '', 'Vila Gilda', 'SÃ£o Paulo', 'SP'),
	(2, '04953030', 'Rua Carolus-Duran', '10', '', 'Vila Gilda', 'SÃ£o Paulo', 'SP'),
	(3, '04953030', '', '', '', '', '', 'AC'),
	(4, '04953030', 'Rua Carolus-Duran', '', '', 'Vila Gilda', 'SÃ£o Paulo', 'SP');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.funcionario: 1 rows
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id_funcionario`, `nome_funcionario`, `telefone_celular_funcionario`, `telefone_fixo_funcionario`, `email_funcionario`, `senha`) VALUES
	(1, 'Caique', '11991683641', '1155172811', 'cai@cai', 'caique');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.ganho: 1 rows
/*!40000 ALTER TABLE `ganho` DISABLE KEYS */;
INSERT INTO `ganho` (`id_ganho`, `id_agenda`, `data_ganho`, `status_ganho`, `valor_ganho`) VALUES
	(1, 1, '2020-07-02', 'Pago', 120);
/*!40000 ALTER TABLE `ganho` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.gasto: 0 rows
/*!40000 ALTER TABLE `gasto` DISABLE KEYS */;
/*!40000 ALTER TABLE `gasto` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.gasto_ganho: 0 rows
/*!40000 ALTER TABLE `gasto_ganho` DISABLE KEYS */;
/*!40000 ALTER TABLE `gasto_ganho` ENABLE KEYS */;

-- Copiando dados para a tabela tcc.servico: 1 rows
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`id_servico`, `tipo_servico`) VALUES
	(1, 'Corte');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
