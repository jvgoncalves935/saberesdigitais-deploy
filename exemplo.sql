-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql.saberesdigitais.darlinton.net
-- Tempo de geração: 23/09/2020 às 05:26
-- Versão do servidor: 5.7.28-log
-- Versão do PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saberesdigitais`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administradores`
--

CREATE TABLE `administradores` (
  `ID` int(11) NOT NULL,
  `Cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `administradores`
--

INSERT INTO `administradores` (`ID`, `Cpf`) VALUES
(3, '10362090670'),
(1, '11111111111'),
(2, '11111111112');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `ID` int(11) NOT NULL,
  `CpfAluno` varchar(11) NOT NULL,
  `CpfTutor` varchar(11) NOT NULL,
  `EscolaID` int(11) NOT NULL,
  `Level` int(2) NOT NULL,
  `EXPTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`ID`, `CpfAluno`, `CpfTutor`, `EscolaID`, `Level`, `EXPTotal`) VALUES
(1, '11111111115', '11111111111', 1, 4, 4000),
(2, '11111111116', '11111111113', 2, 5, 5000),
(3, '11111111117', '11111111114', 3, 3, 2700),
(4, '12345612345', '11111111111', 2, 1, 0),
(5, '11111111111', '11111111111', 2, 1, 100),
(6, '11111111112', '11111111111', 2, 1, 0),
(7, '11111111113', '11111111111', 2, 1, 0),
(8, '11111111114', '11111111111', 2, 1, 0),
(9, '10362090670', '11111111111', 2, 1, 0),
(10, '66611593524', '11111111111', 1, 4, 3500),
(11, '32344455566', '11111111111', 2, 1, 100),
(12, '87887800022', '11111111111', 2, 1, 0),
(13, '10362090555', '11111111111', 2, 12, 36400),
(14, '13455566677', '11111111111', 2, 1, 0),
(15, '65445665478', '11111111111', 2, 1, 100),
(16, '00011122233', '11111111111', 1, 1, 1100),
(17, '12472688610', '11111111111', 1, 1, 0),
(18, '93511511511', '11111111111', 1, 1, 0),
(19, '44455566677', '11111111111', 1, 1, 0),
(20, '73947444444', '11111111111', 1, 1, 1000),
(21, '10529135639', '11111111111', 1, 1, 1000),
(22, '09369476699', '11111111111', 1, 4, 4300),
(23, '15814041668', '11111111111', 1, 3, 2100),
(24, '23428744802', '10362090670', 8, 3, 2100),
(25, '11596513616', '10362090670', 8, 6, 8500),
(26, '70069773637', '10362090670', 6, 1, 1000),
(27, '70069773637', '11111111111', 1, 1, 0),
(28, '70069773637', '11111111111', 1, 1, 0),
(29, '02266896628', '11111111111', 1, 4, 4300),
(30, '14642312650', '11111111111', 1, 3, 2100),
(31, '14642312650', '11111111111', 1, 1, 0),
(32, '14565582694', '11111111111', 9, 4, 3200),
(33, '10665972601', '11111111111', 1, 1, 0),
(34, '12863534670', '11111111111', 1, 1, 1000),
(35, '02166587640', '11111111111', 1, 1, 1000),
(36, '33321655691', '11111111111', 1, 3, 2100),
(37, '52525252525', '11111111111', 1, 1, 0),
(38, '70432370684', '11111111111', 1, 1, 0),
(39, '12920936689', '11111111111', 1, 1, 1200),
(40, '70432370684', '11111111111', 1, 1, 0),
(41, '70432370684', '11111111111', 1, 1, 0),
(42, '12958740676', '11111111111', 1, 1, 1200),
(43, '12920378651', '11111111111', 1, 1, 1200),
(44, '12920378651', '11111111111', 1, 1, 0),
(45, '10598845690', '11111111111', 1, 4, 4300),
(46, '13055210646', '11111111111', 1, 1, 0),
(47, '13055210646', '11111111111', 1, 1, 0),
(48, '13055210646', '11111111111', 1, 1, 0),
(49, '12854066642', '11111111111', 1, 1, 0),
(50, '11138221635', '10362090670', 9, 1, 0),
(51, '69625050604', '11111111111', 1, 1, 0),
(52, '70021703680', '11111111111', 1, 9, 17700),
(53, '25721460024', '11111111111', 1, 1, 0),
(54, '02113338670', '11111111111', 1, 5, 6700),
(55, '13083230699', '11111111111', 1, 3, 2100),
(56, '13543918613', '11111111111', 1, 1, 1000),
(57, '10866481613', '11111111111', 1, 1, 0),
(58, '10866481613', '11111111111', 1, 1, 0),
(59, '10866481613', '11111111111', 1, 1, 0),
(60, '12958740676', '11111111111', 1, 1, 0),
(61, '12920378651', '11111111111', 1, 1, 0),
(62, '44532834821', '11111111111', 1, 1, 0),
(63, '10310410510', '11111111111', 1, 5, 5600),
(64, '70467407630', '11111111111', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `aulas`
--

CREATE TABLE `aulas` (
  `ID` int(11) NOT NULL,
  `Cpf` varchar(11) DEFAULT NULL,
  `MateriaID` int(11) NOT NULL,
  `Pergunta01` int(1) NOT NULL,
  `Pergunta02` int(1) NOT NULL,
  `Pergunta03` int(1) NOT NULL,
  `Autorizada` tinyint(1) NOT NULL DEFAULT '0',
  `Validada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `aulas`
--

INSERT INTO `aulas` (`ID`, `Cpf`, `MateriaID`, `Pergunta01`, `Pergunta02`, `Pergunta03`, `Autorizada`, `Validada`) VALUES
(1, '11111111115', 1, 1, 2, 3, 0, 1),
(2, '11111111115', 2, 2, 3, 4, 0, 1),
(5, '11111111117', 2, 2, 3, 4, 0, 1),
(6, '11111111117', 4, 2, 3, 4, 0, 1),
(7, '11111111111', 3, 5, 5, 5, 0, 1),
(8, '11111111115', 6, 5, 4, 5, 0, 1),
(9, '11111111115', 7, 5, 5, 5, 0, 1),
(10, '11111111115', 8, 5, 5, 5, 0, 1),
(11, '11111111115', 9, 5, 5, 5, 0, 1),
(12, '11111111116', 6, 5, 5, 5, 0, 1),
(13, '11111111116', 7, 5, 5, 5, 0, 1),
(14, '11111111116', 8, 5, 4, 5, 0, 1),
(15, '11111111116', 10, 5, 5, 5, 0, 1),
(16, '66611593524', 1, 5, 5, 5, 0, 1),
(17, '66611593524', 4, 5, 5, 5, 0, 1),
(18, '66611593524', 6, 5, 5, 5, 0, 1),
(19, '65445665478', 6, 5, 5, 5, 0, 1),
(20, '10362090555', 1, 5, 5, 5, 0, 1),
(21, '10362090555', 2, 5, 5, 5, 0, 1),
(22, '10362090555', 3, 5, 5, 5, 0, 1),
(23, '10362090555', 4, 5, 5, 5, 0, 1),
(24, '00011122233', 6, 5, 5, 5, 0, 1),
(25, '00011122233', 15, 4, 4, 4, 0, 1),
(26, '66611593524', 15, 4, 4, 4, 0, 1),
(27, '66611593524', 21, 4, 5, 5, 0, 1),
(28, '32344455566', 6, 5, 5, 4, 0, 1),
(29, '15814041668', 15, 5, 5, 5, 0, 1),
(30, '15814041668', 16, 5, 5, 5, 0, 1),
(31, '73947444444', 50, 5, 5, 5, 0, 1),
(32, '23428744802', 63, 4, 3, 4, 0, 1),
(33, '70021703680', 15, 5, 5, 5, 0, 1),
(34, '12863534670', 15, 4, 1, 4, 0, 1),
(35, '70021703680', 16, 5, 4, 5, 0, 1),
(36, '10529135639', 15, 3, 3, 4, 0, 1),
(37, '09369476699', 15, 3, 4, 4, 0, 1),
(38, '11596513616', 31, 5, 4, 5, 0, 1),
(39, '11596513616', 32, 5, 4, 5, 0, 1),
(40, '11596513616', 33, 5, 4, 5, 0, 1),
(41, '33321655691', 15, 4, 4, 5, 0, 1),
(42, '02166587640', 15, 4, 4, 5, 0, 1),
(43, '02266896628', 15, 5, 4, 5, 0, 1),
(44, '14565582694', 6, 5, 5, 5, 0, 1),
(45, '12958740676', 21, 4, 4, 5, 0, 1),
(46, '14642312650', 15, 4, 5, 4, 0, 1),
(47, '14642312650', 16, 4, 5, 5, 0, 1),
(48, '12920936689', 21, 5, 4, 5, 0, 1),
(49, '13543918613', 15, 4, 4, 3, 0, 1),
(50, '12920378651', 21, 5, 4, 4, 0, 1),
(51, '10598845690', 31, 5, 4, 5, 0, 1),
(52, '10598845690', 32, 5, 4, 5, 0, 1),
(53, '10598845690', 33, 5, 4, 5, 0, 1),
(54, '23428744802', 64, 4, 3, 3, 0, 1),
(55, '70069773637', 15, 4, 3, 4, 0, 1),
(56, '09369476699', 16, 4, 4, 4, 0, 1),
(57, '02113338670', 15, 4, 5, 5, 0, 1),
(58, '33321655691', 16, 5, 4, 5, 0, 1),
(59, '11596513616', 34, 5, 4, 5, 0, 1),
(60, '11596513616', 35, 5, 4, 5, 0, 1),
(61, '13083230699', 31, 4, 4, 4, 0, 1),
(62, '13083230699', 32, 4, 4, 4, 0, 1),
(63, '70021703680', 17, 5, 1, 5, 0, 1),
(64, '10310410510', 31, 4, 3, 4, 0, 1),
(65, '10310410510', 32, 4, 4, 4, 0, 1),
(66, '10310410510', 33, 4, 4, 4, 0, 1),
(67, '10310410510', 34, 5, 5, 5, 0, 1),
(68, '14565582694', 7, 5, 4, 5, 0, 1),
(69, '14565582694', 8, 5, 4, 4, 0, 1),
(70, '09369476699', 17, 4, 4, 4, 0, 1),
(71, '70021703680', 18, 5, 5, 5, 0, 1),
(72, '70021703680', 19, 5, 5, 5, 0, 1),
(73, '70021703680', 20, 5, 5, 5, 0, 1),
(74, '11596513616', 36, 5, 4, 5, 0, 1),
(75, '02113338670', 16, 5, 5, 5, 0, 1),
(76, '02113338670', 17, 5, 5, 5, 0, 1),
(77, '02113338670', 18, 5, 5, 5, 0, 1),
(78, '02113338670', 19, 5, 5, 5, 0, 1),
(79, '02266896628', 16, 5, 5, 5, 0, 1),
(80, '02266896628', 17, 5, 5, 5, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `ConquistaID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Descricao` text,
  `EXPConquista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `conquistas`
--

INSERT INTO `conquistas` (`ConquistaID`, `Nome`, `Descricao`, `EXPConquista`) VALUES
(1, 'Aprendiz I', 'Completar 3 aulas.', 1000),
(2, 'Aprendiz II', 'Completar 10 aulas.', 2500),
(3, 'Aprendiz III', 'Completar 20 aulas.', 5000),
(4, 'Mestre dos Saberes Digitais I', 'Alcançar o Level 10.', 10000),
(5, 'Mestre dos Saberes Digitais II', 'Alcançar o Level 20.', 25000),
(6, 'Mestre dos Saberes Digitais III', 'Alcançar o Level 30.', 50000),
(7, 'Especialista App Inventor', 'Completar o Curso App Inventor.', 10000),
(8, 'Jornada ao Conhecimento I', 'Completar um curso.', 10000),
(9, 'Jornada ao Conhecimento II', 'Completar dois cursos.', 25000),
(10, 'Jornada ao Conhecimento III', 'Completar três cursos.', 50000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conquistas_alunos`
--

CREATE TABLE `conquistas_alunos` (
  `ID` int(11) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `ConquistaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `conquistas_alunos`
--

INSERT INTO `conquistas_alunos` (`ID`, `Cpf`, `ConquistaID`) VALUES
(1, '11111111115', 1),
(2, '11111111115', 2),
(3, '11111111116', 1),
(4, '11111111116', 3),
(5, '11111111117', 1),
(6, '11111111117', 2),
(7, '11111111117', 3),
(8, '10362090555', 1),
(9, '10362090555', 8),
(10, '10362090555', 9),
(11, '66611593524', 1),
(12, '11596513616', 1),
(13, '10598845690', 1),
(14, '70021703680', 1),
(15, '10310410510', 1),
(16, '14565582694', 1),
(17, '09369476699', 1),
(18, '70021703680', 8),
(19, '02113338670', 1),
(20, '02266896628', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `CursoID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `EXPCurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`CursoID`, `Nome`, `EXPCurso`) VALUES
(1, 'Compiladores', 1000),
(2, 'POC II', 1000),
(3, 'Programação Básica em Android - App Inventor', 1000),
(5, 'Microsoft - Noções Básicas de Computadores', 10000),
(6, 'Microsoft - Office 365', 10000),
(7, 'Microsoft - Aprendendo a programar', 10000),
(8, 'Microsoft - Fundamentos de Rede', 10000),
(9, 'Gerência de Projetos', 8000),
(10, 'Sistemas Operacionais', 10000),
(11, 'Arquitetura de Computadores', 10000),
(12, ' Programação de Páginas Web', 10000),
(13, 'Code.org - Aventureiro de Minecraft (Jogo Educativo)', 10000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos_tipos`
--

CREATE TABLE `cursos_tipos` (
  `ID` int(11) NOT NULL,
  `CursoID` int(11) NOT NULL,
  `Perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cursos_tipos`
--

INSERT INTO `cursos_tipos` (`ID`, `CursoID`, `Perfil`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 3),
(7, 5, 1),
(8, 6, 2),
(9, 7, 3),
(10, 8, 5),
(11, 9, 2),
(12, 10, 3),
(13, 11, 3),
(14, 11, 6),
(15, 12, 3),
(16, 13, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolas`
--

CREATE TABLE `escolas` (
  `EscolaID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cidade` varchar(255) NOT NULL,
  `Estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `escolas`
--

INSERT INTO `escolas` (`EscolaID`, `Nome`, `Cidade`, `Estado`) VALUES
(1, 'Colegio Atus', 'Sao Joao Del-Rei', 'MG'),
(2, 'UFSJ', 'SJDR City', 'MG'),
(3, 'UFJF', 'JF City', 'MG'),
(4, 'Colégio Revisão', 'São João Del Rei', 'MG'),
(5, 'Escola Teste', 'São João Del Rei', 'MG'),
(6, 'Escola Estadual Doutor Alberto Vieira Pereira', 'Barbacena', 'MG'),
(7, 'Escola Estadual Amélia Passos', 'São João Del Rei', 'MG'),
(8, 'Turma Personalizada 01', 'Barbacena', 'MG'),
(9, 'SESI Barbacena', 'Barbacena', 'MG');

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias`
--

CREATE TABLE `materias` (
  `MateriaID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `EXPMateria` int(11) NOT NULL,
  `CursoID` int(11) NOT NULL DEFAULT '0',
  `ContagemAulas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `materias`
--

INSERT INTO `materias` (`MateriaID`, `Nome`, `EXPMateria`, `CursoID`, `ContagemAulas`) VALUES
(1, 'Analise léxica', 100, 1, 0),
(2, 'Analise semântica', 100, 1, 0),
(3, 'Aula 1', 100, 2, 0),
(4, 'Aula 2', 100, 2, 0),
(6, 'Aula 1 - Configurando o ambiente', 100, 3, 7),
(7, 'Aula 2 - Desenvolvendo uma calculadora simples (IMC)', 1000, 3, 3),
(8, 'Aula 3 - Iniciando o desenvolvimento de um jogo quiz', 1100, 3, 3),
(9, 'Aula 4 – Criando perguntas e respostas para o jogo quiz', 1100, 3, 1),
(10, 'Aula 5 - Finalizando o jogo quiz', 1300, 3, 1),
(11, 'Aula 6 - Ordenador de números', 1400, 3, 0),
(12, 'Aula 7 - Jogo de adivinhar números', 1300, 3, 0),
(13, 'Aula 8 - Versão aprimorada do quiz', 1400, 3, 0),
(14, 'Aula 9 - Faça sua própria ideia de aplicativo', 2000, 3, 0),
(15, 'Módulo 1 - Introdução à Computadores', 1000, 5, 14),
(16, 'Módulo 2 - Terminologia Geral de Computação', 1100, 5, 7),
(17, 'Módulo 3 - Recursos e Desempenho do Computador', 1200, 5, 4),
(18, 'Módulo 4 - Sistemas Operacionais de Computador', 1300, 5, 2),
(19, 'Módulo 5 - Oportunidades de Trabalho', 1100, 5, 2),
(20, 'Módulo 6 - Conclusões do Módulo', 1000, 5, 1),
(21, 'Aula 1 - Outlook', 1200, 6, 4),
(22, 'Aula 2 - Outlook Online', 1300, 6, 0),
(23, 'Aula 3 - OneDrive', 1200, 6, 0),
(24, 'Aula 4 - OneNote', 1200, 6, 0),
(25, 'Aula 5 - Word', 1300, 6, 0),
(26, 'Aula 6 - Word Online', 1400, 6, 0),
(27, 'Aula 7 - Excel', 1300, 6, 0),
(28, 'Aula 8 - Excel Online', 1400, 6, 0),
(29, 'Aula 9 - Power Point', 1300, 6, 0),
(30, 'Aula 10 - SharePoint', 1400, 6, 0),
(31, 'Aula 01 - Introdução Tecnológica e Seleção de Linguagens', 1000, 7, 4),
(32, 'Aula 02 - Aplicativos na Nuvem e como Começar a Programar', 1100, 7, 4),
(33, 'Aula 03 - A Interface do Usuário', 1200, 7, 3),
(34, 'Aula 04 - Inteligência na Interface do Usuário', 1300, 7, 2),
(35, 'Aula 05 - O Servidor Web', 1400, 7, 1),
(36, 'Aula 06 - A Linguagem C#', 1500, 7, 1),
(37, 'Aula 07 - Conceitos Avançados do Servidor Web', 1600, 7, 0),
(38, 'Aula 08 - Onde e Como São Armazenados os Dados', 1700, 7, 0),
(39, 'Aula 09 - Conectando os Dados com o Aplicativo', 1800, 7, 0),
(40, 'Aula 10 - Uma Web Mais Inteligente', 1900, 7, 0),
(41, 'Aula 11 - Para Onde Vão os Aplicativos?', 1500, 7, 0),
(42, 'Aula 12 - Como Encarar um Projeto Tecnológico?', 1500, 7, 0),
(43, 'Aula 01 - Entendendo uma rede de área local (LAN)', 1000, 8, 0),
(44, 'Aula 02 - Definindo uma rede com o Modelo OSI', 1100, 8, 0),
(45, 'Aula 03 - Redes com Fio Vs Redes sem Fio', 1200, 8, 0),
(46, 'Aula 04 - Entendendo o protocolo na internet', 1300, 8, 0),
(47, 'Aula 05 - Ferramentas TCP/IP', 1400, 8, 0),
(48, 'Aula 06 - Serviços de Rede', 1500, 8, 0),
(49, 'Aula 07 - Entendendo redes WAN', 1600, 8, 0),
(50, 'Aula 01 - Introdução', 1000, 9, 1),
(51, 'Aula 02 - O gerenciamento de projetos', 1100, 9, 0),
(52, 'Aula 03 - Os pilares para a alta performance em projetos', 1200, 9, 0),
(53, 'Aula 04 - A cultura do gerenciamento de projetos', 1300, 9, 0),
(54, 'Aula 05 - Como lidar com os fatores sabotadores', 1400, 9, 0),
(55, 'Aula 06 - O sistema lean', 1500, 9, 0),
(56, 'Aula 07 - Confeccionando um projeto', 1600, 9, 0),
(57, 'Aula 01 - Softwares aplicativos', 1000, 10, 0),
(58, 'Aula 02 - Softwares orientado a tarefa', 1100, 10, 0),
(59, 'Aula 03 - Ética e software livre', 1200, 10, 0),
(60, 'Aula 04 - Sistemas operacionais', 1300, 10, 0),
(61, 'Aula 05 - Características dos sistemas operacionais', 1400, 10, 0),
(62, 'Aula 06 - Softwares aplicativos', 1500, 10, 0),
(63, 'Aula 01 - Histórico dos computadores', 1000, 11, 1),
(64, 'Aula 02 - Esquema básico de funcionamento do computador', 1100, 11, 1),
(65, 'Aula 03 - Sistemas operacionais', 1200, 11, 0),
(66, 'Aula 04 - Tipos de sistemas operacionais', 1300, 11, 0),
(67, 'Aula 05 - Instalar e montar computadores', 1400, 11, 0),
(68, 'Aula 06 - Dispositivos de entrada de dados e periféricos, preparo para instalação', 1500, 11, 0),
(69, 'Aula 07 - Teste básico, memória ROM, preparando o gabinete', 1600, 11, 0),
(70, 'Aula 08 - Instalação dos equipamentos', 1700, 11, 0),
(71, 'Aula 09 - Conexões, cabos e demais dispositivos', 1800, 11, 0),
(72, 'Aula 01 – Visão geral sobre a linguagem php', 1000, 12, 0),
(73, 'Aula 02 – Introdução à linguagem php', 1100, 12, 0),
(74, 'Aula 03 – Tipos de dados suportados pela linguagem php', 1200, 12, 0),
(75, 'Aula 04 – Trabalhando com variáveis e constantes', 1300, 12, 0),
(76, 'Aula 05 – Operadores da linguagem php', 1400, 12, 0),
(77, 'Aula 06 – Estruturas de controle', 1500, 12, 0),
(78, 'Aula 07 – Classes e objetos', 1600, 12, 0),
(79, 'Aula 08 – Controle de sessão', 1700, 12, 0),
(80, 'Aula 09 – Trabalhando com banco de dados - mysql', 1800, 12, 0),
(81, 'Aula 01 – Desafio 01', 1000, 13, 0),
(82, 'Aula 02 – Desafio 02', 1000, 13, 0),
(83, 'Aula 03 – Desafio 03', 1000, 13, 0),
(84, 'Aula 04 – Desafio 04', 1100, 13, 0),
(85, 'Aula 05 – Desafio 05', 1100, 13, 0),
(86, 'Aula 06 – Desafio 06', 1100, 13, 0),
(87, 'Aula 07 – Desafio 07', 1200, 13, 0),
(88, 'Aula 08 – Desafio 08', 1200, 13, 0),
(89, 'Aula 09 – Desafio 09', 1200, 13, 0),
(90, 'Aula 10 – Desafio 10', 1300, 13, 0),
(91, 'Aula 11 – Desafio 11', 1300, 13, 0),
(92, 'Aula 12 – Desafio 12', 1300, 13, 0),
(93, 'Aula 13 – Desafio 13', 1400, 13, 0),
(94, 'Aula 14 – Desafio 14', 1600, 13, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `materias_cursos`
--

CREATE TABLE `materias_cursos` (
  `ID` int(11) NOT NULL,
  `CursoID` int(11) NOT NULL,
  `MateriaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `materias_cursos`
--

INSERT INTO `materias_cursos` (`ID`, `CursoID`, `MateriaID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfis_tipos`
--

CREATE TABLE `perfis_tipos` (
  `ID` int(11) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Perfil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `perfis_tipos`
--

INSERT INTO `perfis_tipos` (`ID`, `CPF`, `Perfil`) VALUES
(6, '66611593524', 2),
(7, '66611593524', 3),
(8, '66611593524', 4),
(9, '44455566677', 1),
(10, '44455566677', 2),
(11, '15814041668', 2),
(12, '15814041668', 3),
(13, '15814041668', 4),
(14, '23428744802', 1),
(19, '70069773637', 1),
(20, '02266896628', 2),
(21, '02266896628', 3),
(22, '02266896628', 4),
(23, '02266896628', 5),
(24, '02266896628', 6),
(25, '14642312650', 2),
(26, '14642312650', 4),
(30, '10665972601', 4),
(31, '12863534670', 1),
(32, '33321655691', 4),
(33, '33321655691', 5),
(34, '02166587640', 4),
(35, '12920936689', 2),
(36, '12920936689', 5),
(37, '12920378651', 1),
(38, '10598845690', 3),
(39, '10598845690', 4),
(40, '10598845690', 5),
(41, '10598845690', 6),
(42, '70432370684', 1),
(43, '70432370684', 2),
(44, '70432370684', 4),
(45, '13055210646', 2),
(46, '12854066642', 2),
(47, '12854066642', 4),
(48, '12854066642', 5),
(49, '11138221635', 1),
(50, '69625050604', 2),
(51, '69625050604', 4),
(52, '69625050604', 5),
(53, '70021703680', 1),
(55, '11596513616', 1),
(56, '02113338670', 2),
(57, '02113338670', 5),
(58, '25721460024', 2),
(59, '25721460024', 3),
(60, '25721460024', 4),
(61, '25721460024', 5),
(62, '25721460024', 6),
(63, '13083230699', 3),
(64, '13543918613', 5),
(65, '10866481613', 5),
(66, '44532834821', 4),
(67, '10310410510', 3),
(68, '10310410510', 4),
(69, '70467407630', 2),
(70, '14565582694', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20190818122613, 'Materias', '2019-08-18 15:32:48', '2019-08-18 15:32:48', 0),
(20190818123843, 'Materias', '2019-08-18 15:39:04', '2019-08-18 15:39:04', 0),
(20190821192910, 'Aulas', '2019-08-21 22:53:25', '2019-08-21 22:53:25', 0),
(20200121171945, 'Usuario', '2020-01-21 20:32:59', '2020-01-21 20:33:00', 0),
(20200206115104, 'Materias', '2020-02-06 14:56:29', '2020-02-06 14:56:29', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `questionarios_tipos`
--

CREATE TABLE `questionarios_tipos` (
  `ID` int(11) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `Pergunta01` int(1) NOT NULL,
  `Pergunta02` int(1) NOT NULL,
  `Pergunta03` int(1) NOT NULL,
  `Pergunta04` int(1) NOT NULL,
  `Pergunta05` int(1) NOT NULL,
  `Pergunta06` int(1) NOT NULL,
  `Pergunta07` int(1) NOT NULL,
  `Pergunta08` int(1) NOT NULL,
  `Pergunta09` int(1) NOT NULL,
  `Pergunta10` int(1) NOT NULL,
  `Pergunta11` int(1) NOT NULL,
  `Pergunta12` int(1) NOT NULL,
  `Pergunta13` int(1) NOT NULL,
  `Pergunta14` int(1) NOT NULL,
  `Pergunta15` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `questionarios_tipos`
--

INSERT INTO `questionarios_tipos` (`ID`, `CPF`, `Pergunta01`, `Pergunta02`, `Pergunta03`, `Pergunta04`, `Pergunta05`, `Pergunta06`, `Pergunta07`, `Pergunta08`, `Pergunta09`, `Pergunta10`, `Pergunta11`, `Pergunta12`, `Pergunta13`, `Pergunta14`, `Pergunta15`) VALUES
(3, '66611593524', 1, 4, 4, 5, 4, 5, 5, 2, 4, 4, 5, 5, 2, 4, 1),
(4, '15814041668', 1, 5, 5, 5, 5, 5, 5, 3, 5, 4, 5, 5, 2, 4, 3),
(5, '11596513616', 2, 3, 3, 4, 3, 4, 5, 1, 5, 3, 5, 5, 1, 4, 5),
(6, '70069773637', 5, 1, 2, 3, 1, 2, 2, 1, 5, 3, 4, 5, 4, 5, 5),
(7, '02266896628', 1, 5, 5, 4, 5, 5, 5, 4, 5, 5, 5, 3, 5, 5, 5),
(8, '14642312650', 4, 2, 4, 2, 3, 5, 3, 1, 5, 4, 5, 3, 3, 5, 4),
(9, '14565582694', 1, 4, 3, 4, 4, 5, 5, 1, 4, 4, 5, 4, 4, 5, 5),
(10, '10665972601', 2, 3, 4, 3, 3, 5, 2, 1, 5, 2, 5, 5, 3, 3, 4),
(11, '12863534670', 2, 5, 1, 2, 1, 1, 5, 2, 5, 5, 3, 2, 1, 5, 3),
(12, '33321655691', 2, 4, 2, 1, 4, 5, 5, 1, 5, 4, 5, 5, 3, 5, 5),
(13, '02166587640', 3, 2, 2, 1, 3, 3, 5, 1, 5, 2, 4, 5, 1, 5, 3),
(14, '12920936689', 2, 4, 4, 3, 4, 3, 3, 1, 5, 5, 4, 2, 5, 5, 4),
(15, '12920378651', 3, 3, 2, 2, 2, 1, 2, 1, 5, 4, 5, 5, 4, 3, 4),
(16, '10598845690', 1, 4, 5, 4, 4, 5, 5, 4, 4, 2, 4, 5, 4, 5, 5),
(17, '70432370684', 4, 5, 3, 3, 4, 5, 5, 1, 5, 4, 4, 3, 1, 4, 5),
(18, '13055210646', 3, 4, 2, 1, 3, 3, 2, 1, 5, 5, 5, 4, 4, 5, 3),
(19, '12854066642', 2, 2, 3, 2, 4, 3, 3, 1, 5, 5, 5, 5, 5, 5, 5),
(20, '69625050604', 3, 2, 2, 2, 4, 4, 5, 1, 5, 5, 4, 4, 4, 5, 4),
(21, '70021703680', 2, 3, 1, 2, 3, 2, 3, 2, 5, 5, 3, 5, 3, 3, 4),
(22, '02113338670', 2, 3, 5, 2, 4, 1, 3, 2, 5, 5, 5, 5, 4, 5, 5),
(23, '25721460024', 1, 4, 3, 5, 4, 5, 5, 5, 5, 5, 5, 3, 5, 5, 5),
(24, '13083230699', 2, 3, 4, 3, 4, 1, 5, 1, 5, 2, 5, 5, 3, 3, 4),
(25, '13543918613', 3, 4, 2, 3, 3, 2, 5, 1, 5, 4, 5, 4, 4, 5, 5),
(26, '10866481613', 2, 2, 2, 4, 4, 3, 4, 1, 4, 3, 3, 1, 3, 5, 4),
(27, '44532834821', 2, 2, 2, 4, 2, 5, 5, 2, 5, 2, 4, 4, 3, 3, 2),
(28, '10310410510', 1, 3, 2, 4, 4, 5, 4, 1, 3, 3, 4, 5, 3, 4, 4),
(29, '70467407630', 3, 3, 4, 3, 4, 2, 3, 1, 5, 5, 4, 1, 1, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `requisitos`
--

CREATE TABLE `requisitos` (
  `ID` int(11) NOT NULL,
  `MateriaID` int(11) NOT NULL,
  `RequisitoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `requisitos`
--

INSERT INTO `requisitos` (`ID`, `MateriaID`, `RequisitoID`) VALUES
(1, 7, 6),
(2, 8, 7),
(3, 9, 8),
(4, 10, 9),
(5, 11, 10),
(6, 12, 11),
(7, 13, 12),
(8, 14, 13),
(10, 16, 15),
(11, 17, 16),
(12, 18, 17),
(13, 19, 18),
(14, 20, 19),
(15, 22, 21),
(16, 23, 22),
(17, 24, 23),
(18, 25, 24),
(19, 26, 25),
(20, 27, 26),
(21, 28, 27),
(22, 29, 28),
(23, 30, 29),
(24, 32, 31),
(25, 33, 32),
(26, 34, 33),
(27, 35, 34),
(28, 36, 35),
(29, 37, 36),
(30, 38, 37),
(31, 39, 38),
(32, 40, 39),
(33, 41, 40),
(34, 42, 41),
(35, 44, 43),
(36, 45, 44),
(37, 46, 45),
(38, 47, 46),
(39, 48, 47),
(40, 49, 48),
(41, 51, 50),
(42, 52, 51),
(43, 53, 52),
(44, 54, 53),
(45, 55, 54),
(46, 56, 55),
(47, 58, 57),
(48, 59, 58),
(49, 60, 59),
(50, 61, 60),
(51, 62, 61),
(52, 64, 63),
(53, 65, 64),
(54, 66, 65),
(55, 67, 66),
(56, 68, 67),
(57, 69, 68),
(58, 70, 69),
(59, 71, 70),
(60, 73, 72),
(61, 74, 73),
(62, 75, 74),
(63, 76, 75),
(64, 77, 76),
(65, 78, 77),
(66, 79, 78),
(67, 80, 79),
(68, 82, 81),
(69, 83, 82),
(70, 84, 83),
(71, 85, 84),
(72, 86, 85),
(73, 87, 86),
(74, 88, 87),
(75, 89, 88),
(76, 90, 89),
(77, 91, 90),
(78, 92, 91),
(79, 93, 92),
(80, 94, 93);

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `ID` int(11) NOT NULL,
  `MateriaID` int(11) NOT NULL,
  `CPFAluno` varchar(11) NOT NULL,
  `CPFTutor` varchar(11) NOT NULL,
  `Autorizada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`ID`, `MateriaID`, `CPFAluno`, `CPFTutor`, `Autorizada`) VALUES
(3, 10, '11111111116', '11111111113', 1),
(4, 12, '11111111116', '11111111113', 1),
(7, 26, '66611593524', '11111111111', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tutores`
--

CREATE TABLE `tutores` (
  `ID` int(11) NOT NULL,
  `Cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tutores`
--

INSERT INTO `tutores` (`ID`, `Cpf`) VALUES
(4, '10362090670'),
(1, '11111111111'),
(2, '11111111113'),
(3, '11111111114'),
(5, '12472688610'),
(6, '93511511511');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Genero` varchar(255) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Cpf`, `Nome`, `Email`, `Genero`, `Senha`, `Foto`) VALUES
(1, '11111111111', 'JV ADM', 'teste@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(2, '11111111112', 'João Vítor', 'teste2@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(3, '11111111113', 'João Vítor', 'teste3@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(4, '11111111114', 'João Vítor', 'teste4@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(5, '11111111115', 'João Vítor', 'teste5@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(6, '11111111116', 'João Vítor', 'teste6@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(7, '11111111117', 'João Vítor', 'teste7@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(9, '12312312312', 'teste', 'teste22@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(10, '12345612345', 'teste xd', 'teste8@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL),
(11, '10362090670', 'João Vítor Gonçalves', 'jvgoncalves935@hotmail.com', 'Masculino', '030943a914316ef121bd21ae5f316d0d3603f6032ef42b4513d1998a539819b5', NULL),
(12, '66611593524', 'Alexandre Carvalho', 'teste10@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'diegoxd.png'),
(13, '32344455566', 'Tuk Zeph', 'teste11@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'vain.png'),
(14, '87887800022', 'Alexandre Carvalho 2', 'teste12@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'arnoldera.jpg'),
(15, '10362090555', 'Alexandre Carvalho 3', 'teste13@hotmail.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'vain.png'),
(16, '13455566677', 'Alexandre Carvalho 4', 'teste14@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'zeph.png'),
(17, '65445665478', 'Teste kkkk', 'teste15@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'zeph.png'),
(18, '00011122233', 'Joseph Venancio', 'joseph@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'jv.png'),
(19, '12472688610', 'Christoffer Oliveira', 'christoffer.ufsj@outlook.com', 'Masculino', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'chris.png'),
(20, '93511511511', 'Dárlinton Carvalho', 'darlinton@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', ''),
(21, '44455566677', 'Yan Lucena', 'yan@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'JV.jpg'),
(22, '73947444444', 'Teste', 'teste50@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'aaa.png'),
(23, '10529135639', 'Vitória Rodrigues', 'viemanuelle07@gmail.com', 'Feminino', 'ac0a3767b7eff6597103758d1f9f7c0647cb30ade102ae57b8779243706f4728', ''),
(24, '09369476699', 'Ester Rodrigues ', 'tekatherine05@gmail.com', 'Feminino', '2aeda443dc587da68c4a37a839243695880afe4d1b2f68ef24823259edd5a753', ''),
(25, '15814041668', 'Juarez Gonçalves', 'teste51@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', ''),
(26, '23428744802', 'Alan Diniz D\'hellemmes', 'alan.diniz.dhellemmes1234@gmail.com', 'Masculino', 'dd130a849d7b29e5541b05d2f7f86a4acd4f1ec598c1c9438783f56bc4f0ff80', ''),
(27, '11596513616', 'José Geraldo Dos Santos ', 'babi6052@gmail.com ', 'Masculino', '3b401473d93859f7f37cb3d638a0fd1d3aae3bb3eb179a1785b43108cc01f693', ''),
(28, '70069773637', 'Lauriane Ketley do nascimento Marçal', 'laurianenascimento22@gmail.com', 'Feminino', '419f2160a4450a40db123dca83df796c003ba93850c9e4b5042a5af421c984be', 'Snapchat-453601212.jpg'),
(29, '70069773637', 'Lauriane Ketley do nascimento Marçal', 'laurianenascimento32@gmail.com', 'Feminino', '419f2160a4450a40db123dca83df796c003ba93850c9e4b5042a5af421c984be', ''),
(30, '70069773637', 'Lauriane Ketley do nascimento Marçal', 'laurianenascimento32@gmail.com', 'Feminino', '419f2160a4450a40db123dca83df796c003ba93850c9e4b5042a5af421c984be', ''),
(31, '02266896628', 'natan maicon da silva', 'natanmaicon007nm@gmail.com', 'Masculino', 'ad851a98f24578f5944f8bb25f37755768a9b95563a03c73af515cbe034ea844', ''),
(32, '14642312650', 'Gustavo Felipe Bernardo Rosa', 'gustavobernardoo355@gmail.vom', 'Masculino', '80fd67ffb92b015a936cf09f6e0709527cbae035fcda6c2e7d8bbce4a9cd22b9', ''),
(33, '14642312650', 'Gustavo Felipe Bernardo Rosa', 'gustavobernardoo355@gmail.com', 'Masculino', 'c91aca7b5c249c0ea32d8cba15699f31fed3b140b4257adba61eeb4e19ca5fae', ''),
(34, '14565582694', 'Leonardo Cursio Miranda', 'leonardocursiom@gmail.com', 'Masculino', '75c2ad03c4b06400f3b2d4a1efce7cb5c8a33518b5e6c021f4759f27680dcb14', ''),
(35, '10665972601', 'Thiago', 'mradlopes@gmail.com', 'Masculino', 'e9c5293515f062474e2dbffc1e7c4599392cd7f486c1343fedde9b75eef36c83', ''),
(36, '12863534670', 'Isabela Russo Ferreira ', 'belarussoferreira@gmail.com', 'Feminino', '1731806d8e912730df54449353d7f4158f4d20effa5e7f84329d18f2a81a2a28', '6866F462-6DE9-49BA-AB65-4366FFC66337.jpeg'),
(37, '02166587640', 'Beatriz de Assis Naves.', 'beatrizassisnaves55@gmail.com', 'Feminino', 'ff1423681118cf6017ffa3da053e0833d0379df9b1c38c0c78f894aec5bf437e', ''),
(38, '33321655691', 'Ana Clarinda Fonseca ', 'anaclarindafons1@gmail.com', 'Feminino', '5de3870ae61f0adc4b6bf91999321f09d92a20979795d654f6e43804348da9bd', ''),
(39, '52525252525', 'teste 52', 'teste52@teste.com', 'Masculino', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', ''),
(40, '70432370684', 'João Pedro', 'jpgurita@gmail.com', 'Masculino', 'f7b93931b8450cca91ebc91e7592384e39e515b6c765064550810fa0597de490', ''),
(41, '12920936689', 'Clara Silva Faria', 'clarasilvafaria@hotmail.com', 'Feminino', '1d5c592b66fd1fe53e8e1465deb2a4267003a4ee17a0485d5453c92010fc5790', ''),
(42, '70432370684', 'João Pedro', 'jpgurita@gmail.com', 'Masculino', 'f7b93931b8450cca91ebc91e7592384e39e515b6c765064550810fa0597de490', ''),
(43, '70432370684', 'João Pedro', 'jpgurita@gmail.com', 'Masculino', 'f7b93931b8450cca91ebc91e7592384e39e515b6c765064550810fa0597de490', ''),
(44, '12958740676', 'Vanessa Sfredo', 'vansfredo@gmail.com', 'Feminino', '4fbf2f554c24909737f9461a91e8a844f64092623383fdf1c596805e0bd19a57', ''),
(45, '12920378651', 'Danielle Ribeiro', 'danicunha394@gmail.com', 'Feminino', '58add5621bfe0efa49718ffc74d42150d9c7587661cc4b9e1aada73e455e8dd6', ''),
(46, '12920378651', 'Danielle Ribeiro', 'danicunha394@gmail.com', 'Feminino', '58add5621bfe0efa49718ffc74d42150d9c7587661cc4b9e1aada73e455e8dd6', ''),
(47, '10598845690', 'Gustavo Luiz Damasceno Rezende', 'gustavodamasceno283@gmail.com', 'Masculino', 'ac8886327b256b555f95904818fa51c469ff814167382c15f2e99131f8a99900', ''),
(48, '13055210646', 'Gabriely Hayane de Abreu Campos Souza ', 'hayaneabreu2@gmail.com', 'Feminino', '032151ef31a5b5f946219460ff23030b5f4fa2f54c820ce45d422a0664798b67', ''),
(49, '13055210646', 'Gabriely Hayane de Abreu Campos Souza ', 'hayaneabreu2@gmail.com', 'Feminino', '032151ef31a5b5f946219460ff23030b5f4fa2f54c820ce45d422a0664798b67', ''),
(50, '13055210646', 'Gabriely Hayane de Abreu Campos Souza ', 'hayaneabreu2@gmail.com', 'Feminino', '032151ef31a5b5f946219460ff23030b5f4fa2f54c820ce45d422a0664798b67', ''),
(51, '12854066642', 'Geovanna Couto Costa', 'geovannaccoutto22@gmail.com ', 'Feminino', '36fad2faed6e40d494abfca04697962fc5621e592823ac1b4581ddbc74f55122', 'Snapchat-2097424647.jpg'),
(52, '11138221635', 'Samuel Fellipe Silva dos Santos', 'Sfssclash@gmail.com', 'Masculino', '3ecff7926c8cdb3a6366ab9c2f6aff9c9a78573c9dcc29f4a59f6350e1abf186', ''),
(53, '69625050604', 'Giovana', 'giovanamoreira846@gmail.com', 'Masculino', 'e3b499329cec43e0400f736cbaa62362e2505a324df7cef294e0b28e86e5cee5', ''),
(54, '70021703680', 'Gabriela de Oliveira Milagres', 'gabrielamilagresoliveira@gmail.com', 'Feminino', '50ffb83c6eb8f98b31d712a36f1ccff3df63033bb0ef30f2b5b6ec061fa85e18', ''),
(55, '25721460024', 'Salomão Dilly', 'salomaodilly837@gmail.com', 'Masculino', '1ee154a6d0b0061ad1b81d5bbd6700fc1f1a9bd13c5df8772cd10542b24bb62b', ''),
(56, '02113338670', 'Bárbara Oliveira Araújo', 'barbararaujo04@gmail.com', 'Feminino', '80e58542f89dcdf3e5fa793a70c16e0769cbba9482d91faaac925ab5230fbf94', 'aefe55398e9224ac2cf3fc955cd03005.jpg'),
(57, '13083230699', 'Maria Eduarda Franco Lima', 'francolimaduiu@gmail.com', 'Feminino', 'e56a02b45f2dd7786546ef9a5aa9fcd1f2633015e64b460ee1510779e06e3401', ''),
(58, '13543918613', 'Carolina de Campos Bastos ', 'bastoscarolina65@gmail.com', 'Feminino', 'c5dc4710550db91a9f8d7c0423097d6c2ae2e9fa272c0928ae75bd8916d502d4', ''),
(59, '10866481613', 'Letícia Dani Laguardia', 'Laguardiadaniela@hotamail.com', 'Feminino', '4a57bf8e9cf45d878e8515acc58cfd8f592e1bb405eca0575ed398373a72d918', '7184506A-77CC-4C52-8FCC-BC9E296F1053.jpeg'),
(60, '10866481613', 'Letícia Dani Laguardia', 'Laguardiadaniela@hotmail.com', 'Feminino', '20d957c77536595c07a21836889eed7340f6d56a95cf9e29a7f4e97a51ca61a3', '15C78EE7-7D6E-469B-A2E7-421EE4A8E7F4.jpeg'),
(61, '10866481613', 'Leticia Dani Laguardia', 'Laguardiadaniela@hotmail.com', 'Feminino', '9ed8f452051ba839fa2c370e69f5c0d050703fe08b3d37dc1bbbe1e45909b088', ''),
(62, '12958740676', 'Vanessa Sfredo ', 'vansfredo@gmail.com', 'Feminino', '377a3a4c503b9844de47db8c56ff82855665d43181766938bd7bab3c20a19368', ''),
(63, '12920378651', 'Danielle Ribeiro', 'danicunha394@gmail.com', 'Feminino', '9aadd0e12af687e535c62d49bc0512af431d8a4b3cf89915b133873097926b16', ''),
(64, '44532834821', 'Lucas G. ', 'Lucasalpaca11@gmail.com', 'Masculino', '6de9e36ae3d3e9e4872ab006f3fa8c9837c563261338337d1bcad507ed1039f3', '3356df50f75c7cccd377600ae7be02be.jpg'),
(65, '10310410510', 'Rafael demeis', 'rafaeldemeis06@gmail.com', 'Masculino', 'ec071654ac8168cc594ba89aac907e82358dd9cc548574d68ea21bc5be898796', ''),
(66, '70467407630', 'Maria Theresa Paiva e Silva ', 'mtheresapaiva@gmail.com', 'Feminino', '7d64bdc3f1679dd369c16a7e1a914f7740aa673dd8dcc848eadd5cd714f2d9bd', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_cpf_administradores` (`Cpf`);

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_cpf_alunos` (`CpfAluno`),
  ADD KEY `FK_cpf_tutores_alunos` (`CpfTutor`),
  ADD KEY `FK_codigo_escola_alunos` (`EscolaID`);

--
-- Índices de tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_cod_aluno_aulas` (`Cpf`),
  ADD KEY `FK_cod_materias_aulas` (`MateriaID`);

--
-- Índices de tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`ConquistaID`);

--
-- Índices de tabela `conquistas_alunos`
--
ALTER TABLE `conquistas_alunos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_cpf_alunos_conquistas` (`Cpf`),
  ADD KEY `FK_cod_alunos_conquistas` (`ConquistaID`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`CursoID`);

--
-- Índices de tabela `cursos_tipos`
--
ALTER TABLE `cursos_tipos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`EscolaID`);

--
-- Índices de tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`MateriaID`);

--
-- Índices de tabela `materias_cursos`
--
ALTER TABLE `materias_cursos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_cod_cursos_materias` (`CursoID`),
  ADD KEY `FK_cod_materias_cursos` (`MateriaID`);

--
-- Índices de tabela `perfis_tipos`
--
ALTER TABLE `perfis_tipos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Índices de tabela `questionarios_tipos`
--
ALTER TABLE `questionarios_tipos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_cpf_tutores` (`Cpf`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cpf` (`Cpf`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `ConquistaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `conquistas_alunos`
--
ALTER TABLE `conquistas_alunos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `CursoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cursos_tipos`
--
ALTER TABLE `cursos_tipos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `escolas`
--
ALTER TABLE `escolas`
  MODIFY `EscolaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `MateriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `materias_cursos`
--
ALTER TABLE `materias_cursos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `perfis_tipos`
--
ALTER TABLE `perfis_tipos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `questionarios_tipos`
--
ALTER TABLE `questionarios_tipos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `requisitos`
--
ALTER TABLE `requisitos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tutores`
--
ALTER TABLE `tutores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `FK_cpf_administradores` FOREIGN KEY (`Cpf`) REFERENCES `usuarios` (`Cpf`);

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `FK_codigo_escola_alunos` FOREIGN KEY (`EscolaID`) REFERENCES `escolas` (`EscolaID`),
  ADD CONSTRAINT `FK_cpf_alunos` FOREIGN KEY (`CpfAluno`) REFERENCES `usuarios` (`Cpf`),
  ADD CONSTRAINT `FK_cpf_tutores_alunos` FOREIGN KEY (`CpfTutor`) REFERENCES `tutores` (`Cpf`);

--
-- Restrições para tabelas `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `FK_cod_aluno_aulas` FOREIGN KEY (`Cpf`) REFERENCES `alunos` (`CpfAluno`),
  ADD CONSTRAINT `FK_cod_materias_aulas` FOREIGN KEY (`MateriaID`) REFERENCES `materias` (`MateriaID`);

--
-- Restrições para tabelas `conquistas_alunos`
--
ALTER TABLE `conquistas_alunos`
  ADD CONSTRAINT `FK_cod_alunos_conquistas` FOREIGN KEY (`ConquistaID`) REFERENCES `conquistas` (`ConquistaID`),
  ADD CONSTRAINT `FK_cpf_alunos_conquistas` FOREIGN KEY (`Cpf`) REFERENCES `alunos` (`CpfAluno`);

--
-- Restrições para tabelas `materias_cursos`
--
ALTER TABLE `materias_cursos`
  ADD CONSTRAINT `FK_cod_cursos_materias` FOREIGN KEY (`CursoID`) REFERENCES `cursos` (`CursoID`),
  ADD CONSTRAINT `FK_cod_materias_cursos` FOREIGN KEY (`MateriaID`) REFERENCES `materias` (`MateriaID`);

--
-- Restrições para tabelas `tutores`
--
ALTER TABLE `tutores`
  ADD CONSTRAINT `FK_cpf_tutores` FOREIGN KEY (`Cpf`) REFERENCES `usuarios` (`Cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
