-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2017 às 22:15
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create Database labornet;
use labornet;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_administrador`
--

CREATE TABLE `adm_administrador` (
  `adm_id` int(11) NOT NULL,
  `adm_nome` varchar(50) NOT NULL,
  `adm_email` varchar(50) NOT NULL,
  `adm_senha` varchar(50) NOT NULL,
  `tpu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anu_anuncio`
--

CREATE TABLE `anu_anuncio` (
  `anu_id` int(11) NOT NULL,
  `anu_titulo` varchar(50) NOT NULL,
  `anu_empresa` varchar(50) NOT NULL,
  `anu_empregador` varchar(50) NOT NULL,
  `anu_cidade` varchar(50) NOT NULL,
  `anu_remuneracao` varchar(50) NOT NULL,
  `anu_numvagas` varchar(11) NOT NULL,
  `anu_cargahoraria` varchar(100) NOT NULL,
  `anu_descricaoanuncio` text NOT NULL,
  `anu_requisitos` text NOT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anu_anuncio`
--

INSERT INTO `anu_anuncio` (`anu_id`, `anu_titulo`, `anu_empresa`, `anu_empregador`, `anu_cidade`, `anu_remuneracao`, `anu_numvagas`, `anu_cargahoraria`, `anu_descricaoanuncio`, `anu_requisitos`, `emp_id`) VALUES
(1, 'Chefe de Cozinha', 'Spani Atacadista', 'Gerente Amilton', 'Guaratinguetá', '1850,90', '2', '5h por dia', 'Vaga disponível para pessoas com experiência em culinária;', 'Experiência na área;\r\nEnsino médio completo.', 1),
(2, 'Balconista para o Natal', 'Cacau Show Aparecida', 'Natalia', 'Aparecida', '975,00 + auxilio alimentação', '3', '13h por dia', 'Vaga para o Natal de 2017, com horário estendido.', 'Maior de 18 anos.', 2),
(4, 'Camareira', 'Kafé Hotel', 'RH Vanessa', 'Guaratinguetá', '1125,00', '6', '8h por dia', 'Vaga fixa para equipe de camareiras.', 'Nenhum.', 3),
(5, 'Segurança', 'Kafé Hotel', 'RH Vanessa', 'Guaratinguetá', '1850,00', '4', '5h por dia', 'Vaga para segurança do hotel, diurno e noturno.', 'Curso de segurança;\r\nExperiência no cargo.', 3),
(6, 'Padeiro', 'Padaria Progresso', 'Hiago', 'Aparecida', '1180,50', '2', '9h por dia', 'Vaga para período matutino e vespertino.', 'Experiência em culinária.', 4),
(7, 'Caixa', 'Extra Supermercado', 'RH Carlos', 'Guaratinguetá', '975,00', '5', '8h por dia', 'Vaga disponível para Menor Aprendiz.', 'Carteira de trabalho.', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `coment_id` int(11) NOT NULL,
  `coment_anu_id` int(11) DEFAULT NULL,
  `coment_srv_id` int(11) DEFAULT NULL,
  `coment_nome` varchar(1000) DEFAULT NULL,
  `coment` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`coment_id`, `coment_anu_id`, `coment_srv_id`, `coment_nome`, `coment`) VALUES
(1, 1, NULL, 'Marcos', 'Estarei entrando em contato!'),
(3, 1, NULL, 'Spani Atacadista', 'Gostamos do seu currículo! Vamos marcar uma entrevista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_empregador`
--

CREATE TABLE `emp_empregador` (
  `emp_id` int(11) NOT NULL,
  `emp_nome` varchar(45) NOT NULL,
  `emp_cnpj` varchar(18) DEFAULT NULL,
  `emp_estado` varchar(2) NOT NULL,
  `emp_cidade` varchar(50) NOT NULL,
  `emp_bairro` varchar(50) NOT NULL,
  `emp_endereco` varchar(50) NOT NULL,
  `emp_numero` int(11) NOT NULL,
  `emp_telefone` varchar(15) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_senha` varchar(50) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `tpu_id` int(11) NOT NULL,
  `id_usu_it` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `emp_empregador`
--

INSERT INTO `emp_empregador` (`emp_id`, `emp_nome`, `emp_cnpj`, `emp_estado`, `emp_cidade`, `emp_bairro`, `emp_endereco`, `emp_numero`, `emp_telefone`, `emp_email`, `emp_senha`, `log_id`, `tpu_id`, `id_usu_it`) VALUES
(1, 'Spani Atacadista', '51.427.102/0001-29', 'SP', 'Guaratinguetá', 'Alto de São João', 'Rod. Paulo Virgínio', 50, '(12)31284000', 'spani@email.com', '123', 3, 2, NULL),
(2, 'Cacau Show Aparecida', '18.653.797/0001-91', 'SP', 'Aparecida', 'Centro', 'R. Benedito Rosa de Oliveira', 25, '(12) 3105-8760', 'cs@email.com', '123', 4, 2, NULL),
(3, 'Kafé Hotel', '58.877.102/0071-85', 'SP', 'Guaratinguetá', 'Centro', 'R. Cel. Tamarindo', 87, '(12)3133-8549', 'kafe@email.com', '123', 7, 2, NULL),
(4, 'Padaria Progresso', '85.784.989/7845-29', 'SP', 'Aparecida', 'Aroeira', 'Av. Padroeira do Brasil', 58, '(12)3013-8985', 'progresso@email.com', '123', 8, 2, NULL),
(5, 'Extra Supermercado', '89.884.125/1900-96', 'SP', 'Guaratinguetá', 'Pedreira', 'R. Cel. Tamarindo', 12, '12-31324895', 'extra@email.com', '123', 9, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_login`
--

CREATE TABLE `log_login` (
  `log_id` int(11) NOT NULL,
  `log_email` varchar(50) NOT NULL,
  `log_senha` varchar(50) NOT NULL,
  `log_nome` varchar(50) NOT NULL,
  `tpu_id` int(11) NOT NULL,
  `log_idusu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log_login`
--

INSERT INTO `log_login` (`log_id`, `log_email`, `log_senha`, `log_nome`, `tpu_id`, `log_idusu`) VALUES
(1, 'admin@email.com', '123', 'Admin', 1, 0),
(2, 'marcos@email.com', '123', 'Marcos', 3, 1),
(3, 'spani@email.com', '123', 'Spani Atacadista', 2, 1),
(4, 'cs@email.com', '123', 'Cacau Show Aparecida', 2, 2),
(5, 'fernanda@email.com', '123', 'Fernanda', 3, 2),
(6, 'rodrigo@email.com', '123', 'Rodrigo', 3, 3),
(7, 'kafe@email.com', '123', 'Kafé Hotel', 2, 3),
(8, 'progresso@email.com', '123', 'Padaria Progresso', 2, 4),
(9, 'extra@email.com', '123', 'Extra Supermercado', 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `srv_servicos`
--

CREATE TABLE `srv_servicos` (
  `srv_id` int(11) NOT NULL,
  `srv_titulo` varchar(500) DEFAULT NULL,
  `srv_endereco` varchar(500) DEFAULT NULL,
  `srv_estado` varchar(500) DEFAULT NULL,
  `srv_bairro` varchar(500) DEFAULT NULL,
  `srv_numero` varchar(500) DEFAULT NULL,
  `srv_cidade` varchar(500) DEFAULT NULL,
  `srv_telefone` varchar(500) DEFAULT NULL,
  `srv_descricao` varchar(500) DEFAULT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `srv_servicos`
--

INSERT INTO `srv_servicos` (`srv_id`, `srv_titulo`, `srv_endereco`, `srv_estado`, `srv_bairro`, `srv_numero`, `srv_cidade`, `srv_telefone`, `srv_descricao`, `usu_id`) VALUES
(1, 'Preciso de Pintor', 'R. Benedito Rosa de Oliveira', 'SP', 'Campo do Galvão', '35', 'Guaratinguetá', '(12) 3105-8760', 'Preciso de pintor para manutenção de ambiente exterior, entrar em contato para negociar preço.', 3),
(3, 'Técnico em Manutenção de Piscinas', 'R. Benedito Rosa de Oliveira', 'SP', 'Campo do Galvão', '16', 'Guaratinguetá', '(12) 3105-8760', 'Preciso para limpeza de piscina para o ano novo, favor entrar em contato.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpu_tipousuario`
--

CREATE TABLE `tpu_tipousuario` (
  `tpu_id` int(11) NOT NULL,
  `tpu_titulo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tpu_tipousuario`
--

INSERT INTO `tpu_tipousuario` (`tpu_id`, `tpu_titulo`) VALUES
(1, 'admin'),
(2, 'empregador'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_interesse`
--

CREATE TABLE `usu_interesse` (
  `usu_it_id` int(11) NOT NULL,
  `usu_id` int(11) DEFAULT NULL,
  `usu_anu_id` int(11) DEFAULT NULL,
  `usu_srv_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usu_interesse`
--

INSERT INTO `usu_interesse` (`usu_it_id`, `usu_id`, `usu_anu_id`, `usu_srv_id`) VALUES
(1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usu_usuario`
--

CREATE TABLE `usu_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(45) NOT NULL,
  `usu_cpf` varchar(14) NOT NULL,
  `usu_telefone` varchar(15) NOT NULL,
  `usu_email` varchar(50) NOT NULL,
  `usu_senha` varchar(50) NOT NULL,
  `usu_descricaoperfil` varchar(100) NOT NULL,
  `tpu_id` int(11) NOT NULL,
  `log_id` int(11) DEFAULT NULL,
  `usu_curriculo` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usu_usuario`
--

INSERT INTO `usu_usuario` (`usu_id`, `usu_nome`, `usu_cpf`, `usu_telefone`, `usu_email`, `usu_senha`, `usu_descricaoperfil`, `tpu_id`, `log_id`, `usu_curriculo`) VALUES
(1, 'Marcos', '162.897.451-00', '(12)31284000', 'marcos@email.com', '123', 'Formado em Advocacia;', 3, 2, 'SIM'),
(2, 'Fernanda', '894.551.121-10', '(12)996198060', 'fernanda@email.com', '123', 'Ensino médio;\r\nCabeleireira.', 3, 5, NULL),
(3, 'Rodrigo', '845.954.158-52', '(31) 8888-9999', 'rodrigo@email.com', '123', 'Analista financeiro.', 3, 6, 'SIM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_administrador`
--
ALTER TABLE `adm_administrador`
  ADD PRIMARY KEY (`adm_id`),
  ADD KEY `tpu_id` (`tpu_id`);

--
-- Indexes for table `anu_anuncio`
--
ALTER TABLE `anu_anuncio`
  ADD PRIMARY KEY (`anu_id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`coment_id`);

--
-- Indexes for table `emp_empregador`
--
ALTER TABLE `emp_empregador`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `log_id` (`log_id`),
  ADD KEY `tpu_id` (`tpu_id`);

--
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `tpu_id` (`tpu_id`);

--
-- Indexes for table `srv_servicos`
--
ALTER TABLE `srv_servicos`
  ADD PRIMARY KEY (`srv_id`);

--
-- Indexes for table `tpu_tipousuario`
--
ALTER TABLE `tpu_tipousuario`
  ADD PRIMARY KEY (`tpu_id`);

--
-- Indexes for table `usu_interesse`
--
ALTER TABLE `usu_interesse`
  ADD PRIMARY KEY (`usu_it_id`);

--
-- Indexes for table `usu_usuario`
--
ALTER TABLE `usu_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `log_id` (`log_id`),
  ADD KEY `tpu_id` (`tpu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_administrador`
--
ALTER TABLE `adm_administrador`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anu_anuncio`
--
ALTER TABLE `anu_anuncio`
  MODIFY `anu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `coment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `emp_empregador`
--
ALTER TABLE `emp_empregador`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `srv_servicos`
--
ALTER TABLE `srv_servicos`
  MODIFY `srv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tpu_tipousuario`
--
ALTER TABLE `tpu_tipousuario`
  MODIFY `tpu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usu_interesse`
--
ALTER TABLE `usu_interesse`
  MODIFY `usu_it_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usu_usuario`
--
ALTER TABLE `usu_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `adm_administrador`
--
ALTER TABLE `adm_administrador`
  ADD CONSTRAINT `adm_administrador_ibfk_1` FOREIGN KEY (`tpu_id`) REFERENCES `tpu_tipousuario` (`tpu_id`);

--
-- Limitadores para a tabela `emp_empregador`
--
ALTER TABLE `emp_empregador`
  ADD CONSTRAINT `emp_empregador_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `log_login` (`log_id`),
  ADD CONSTRAINT `emp_empregador_ibfk_2` FOREIGN KEY (`tpu_id`) REFERENCES `tpu_tipousuario` (`tpu_id`);

--
-- Limitadores para a tabela `log_login`
--
ALTER TABLE `log_login`
  ADD CONSTRAINT `log_login_ibfk_1` FOREIGN KEY (`tpu_id`) REFERENCES `tpu_tipousuario` (`tpu_id`);

--
-- Limitadores para a tabela `usu_usuario`
--
ALTER TABLE `usu_usuario`
  ADD CONSTRAINT `usu_usuario_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `log_login` (`log_id`),
  ADD CONSTRAINT `usu_usuario_ibfk_2` FOREIGN KEY (`tpu_id`) REFERENCES `tpu_tipousuario` (`tpu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
