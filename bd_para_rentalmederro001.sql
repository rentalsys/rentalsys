-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Fev-2021 às 10:51
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `borrao_agora_erp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banco`
--

CREATE TABLE `banco` (
  `id_banco` int(11) NOT NULL,
  `id_conta` int(11) DEFAULT NULL,
  `banco` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banco`
--

INSERT INTO `banco` (`id_banco`, `id_conta`, `banco`) VALUES
(1, 248, 'Banco do Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(11) NOT NULL,
  `id_contato` int(11) DEFAULT NULL,
  `data_carrinho` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Panela'),
(2, 'Cuzcuzeira'),
(3, 'Copo'),
(4, 'Caneca'),
(5, 'Papeiro'),
(6, 'Leiteira'),
(7, 'Frigideira'),
(8, 'Bacia'),
(9, 'Balde'),
(10, 'Assadeira'),
(11, 'Baquelite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(16) NOT NULL,
  `id_estado` int(16) NOT NULL,
  `nome_cidade` varchar(64) NOT NULL,
  `ibge_cidade` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `id_estado`, `nome_cidade`, `ibge_cidade`) VALUES
(1, 22, 'Alta Floresta D\'Oeste', '1100015'),
(2, 22, 'Ariquemes', '1100023'),
(3, 22, 'Cabixi', '1100031'),
(4, 22, 'Cacoal', '1100049'),
(5, 22, 'Cerejeiras', '1100056'),
(6, 22, 'Colorado do Oeste', '1100064'),
(7, 22, 'Corumbiara', '1100072'),
(8, 22, 'Costa Marques', '1100080'),
(9, 22, 'Espigão D\'Oeste', '1100098'),
(10, 22, 'Guajará-Mirim', '1100106'),
(11, 22, 'Jaru', '1100114'),
(12, 22, 'Ji-Paraná', '1100122'),
(13, 22, 'Machadinho D\'Oeste', '1100130'),
(14, 22, 'Nova Brasilândia D\'Oeste', '1100148'),
(15, 22, 'Ouro Preto do Oeste', '1100155'),
(16, 22, 'Pimenta Bueno', '1100189'),
(17, 22, 'Porto Velho', '1100205'),
(18, 22, 'Presidente Médici', '1100254'),
(19, 22, 'Rio Crespo', '1100262'),
(20, 22, 'Rolim de Moura', '1100288'),
(21, 22, 'Santa Luzia D\'Oeste', '1100296'),
(22, 22, 'Vilhena', '1100304'),
(23, 22, 'São Miguel do Guaporé', '1100320'),
(24, 22, 'Nova Mamoré', '1100338'),
(25, 22, 'Alvorada D\'Oeste', '1100346'),
(26, 22, 'Alto Alegre dos Parecis', '1100379'),
(27, 22, 'Alto Paraíso', '1100403'),
(28, 22, 'Buritis', '1100452'),
(29, 22, 'Novo Horizonte do Oeste', '1100502'),
(30, 22, 'Cacaulândia', '1100601'),
(31, 22, 'Campo Novo de Rondônia', '1100700'),
(32, 22, 'Candeias do Jamari', '1100809'),
(33, 22, 'Castanheiras', '1100908'),
(34, 22, 'Chupinguaia', '1100924'),
(35, 22, 'Cujubim', '1100940'),
(36, 22, 'Governador Jorge Teixeira', '1101005'),
(37, 22, 'Itapuã do Oeste', '1101104'),
(38, 22, 'Ministro Andreazza', '1101203'),
(39, 22, 'Mirante da Serra', '1101302'),
(40, 22, 'Monte Negro', '1101401'),
(41, 22, 'Nova União', '1101435'),
(42, 22, 'Parecis', '1101450'),
(43, 22, 'Pimenteiras do Oeste', '1101468'),
(44, 22, 'Primavera de Rondônia', '1101476'),
(45, 22, 'São Felipe D\'Oeste', '1101484'),
(46, 22, 'São Francisco do Guaporé', '1101492'),
(47, 22, 'Seringueiras', '1101500'),
(48, 22, 'Teixeirópolis', '1101559'),
(49, 22, 'Theobroma', '1101609'),
(50, 22, 'Urupá', '1101708'),
(51, 22, 'Vale do Anari', '1101757'),
(52, 22, 'Vale do Paraíso', '1101807'),
(53, 1, 'Acrelândia', '1200013'),
(54, 1, 'Assis Brasil', '1200054'),
(55, 1, 'Brasiléia', '1200104'),
(56, 1, 'Bujari', '1200138'),
(57, 1, 'Capixaba', '1200179'),
(58, 1, 'Cruzeiro do Sul', '1200203'),
(59, 1, 'Epitaciolândia', '1200252'),
(60, 1, 'Feijó', '1200302'),
(61, 1, 'Jordão', '1200328'),
(62, 1, 'Mâncio Lima', '1200336'),
(63, 1, 'Manoel Urbano', '1200344'),
(64, 1, 'Marechal Thaumaturgo', '1200351'),
(65, 1, 'Plácido de Castro', '1200385'),
(66, 1, 'Porto Walter', '1200393'),
(67, 1, 'Rio Branco', '1200401'),
(68, 1, 'Rodrigues Alves', '1200427'),
(69, 1, 'Santa Rosa do Purus', '1200435'),
(70, 1, 'Senador Guiomard', '1200450'),
(71, 1, 'Sena Madureira', '1200500'),
(72, 1, 'Tarauacá', '1200609'),
(73, 1, 'Xapuri', '1200708'),
(74, 1, 'Porto Acre', '1200807'),
(75, 4, 'Alvarães', '1300029'),
(76, 4, 'Amaturá', '1300060'),
(77, 4, 'Anamã', '1300086'),
(78, 4, 'Anori', '1300102'),
(79, 4, 'Apuí', '1300144'),
(80, 4, 'Atalaia do Norte', '1300201'),
(81, 4, 'Autazes', '1300300'),
(82, 4, 'Barcelos', '1300409'),
(83, 4, 'Barreirinha', '1300508'),
(84, 4, 'Benjamin Constant', '1300607'),
(85, 4, 'Beruri', '1300631'),
(86, 4, 'Boa Vista do Ramos', '1300680'),
(87, 4, 'Boca do Acre', '1300706'),
(88, 4, 'Borba', '1300805'),
(89, 4, 'Caapiranga', '1300839'),
(90, 4, 'Canutama', '1300904'),
(91, 4, 'Carauari', '1301001'),
(92, 4, 'Careiro', '1301100'),
(93, 4, 'Careiro da Várzea', '1301159'),
(94, 4, 'Coari', '1301209'),
(95, 4, 'Codajás', '1301308'),
(96, 4, 'Eirunepé', '1301407'),
(97, 4, 'Envira', '1301506'),
(98, 4, 'Fonte Boa', '1301605'),
(99, 4, 'Guajará', '1301654'),
(100, 4, 'Humaitá', '1301704'),
(101, 4, 'Ipixuna', '1301803'),
(102, 4, 'Iranduba', '1301852'),
(103, 4, 'Itacoatiara', '1301902'),
(104, 4, 'Itamarati', '1301951'),
(105, 4, 'Itapiranga', '1302009'),
(106, 4, 'Japurá', '1302108'),
(107, 4, 'Juruá', '1302207'),
(108, 4, 'Jutaí', '1302306'),
(109, 4, 'Lábrea', '1302405'),
(110, 4, 'Manacapuru', '1302504'),
(111, 4, 'Manaquiri', '1302553'),
(112, 4, 'Manaus', '1302603'),
(113, 4, 'Manicoré', '1302702'),
(114, 4, 'Maraã', '1302801'),
(115, 4, 'Maués', '1302900'),
(116, 4, 'Nhamundá', '1303007'),
(117, 4, 'Nova Olinda do Norte', '1303106'),
(118, 4, 'Novo Airão', '1303205'),
(119, 4, 'Novo Aripuanã', '1303304'),
(120, 4, 'Parintins', '1303403'),
(121, 4, 'Pauini', '1303502'),
(122, 4, 'Presidente Figueiredo', '1303536'),
(123, 4, 'Rio Preto da Eva', '1303569'),
(124, 4, 'Santa Isabel do Rio Negro', '1303601'),
(125, 4, 'Santo Antônio do Içá', '1303700'),
(126, 4, 'São Gabriel da Cachoeira', '1303809'),
(127, 4, 'São Paulo de Olivença', '1303908'),
(128, 4, 'São Sebastião do Uatumã', '1303957'),
(129, 4, 'Silves', '1304005'),
(130, 4, 'Tabatinga', '1304062'),
(131, 4, 'Tapauá', '1304104'),
(132, 4, 'Tefé', '1304203'),
(133, 4, 'Tonantins', '1304237'),
(134, 4, 'Uarini', '1304260'),
(135, 4, 'Urucará', '1304302'),
(136, 4, 'Urucurituba', '1304401'),
(137, 23, 'Amajari', '1400027'),
(138, 23, 'Alto Alegre', '1400050'),
(139, 23, 'Boa Vista', '1400100'),
(140, 23, 'Bonfim', '1400159'),
(141, 23, 'Cantá', '1400175'),
(142, 23, 'Caracaraí', '1400209'),
(143, 23, 'Caroebe', '1400233'),
(144, 23, 'Iracema', '1400282'),
(145, 23, 'Mucajaí', '1400308'),
(146, 23, 'Normandia', '1400407'),
(147, 23, 'Pacaraima', '1400456'),
(148, 23, 'Rorainópolis', '1400472'),
(149, 23, 'São João da Baliza', '1400506'),
(150, 23, 'São Luiz', '1400605'),
(151, 23, 'Uiramutã', '1400704'),
(152, 16, 'Abaetetuba', '1500107'),
(153, 16, 'Abel Figueiredo', '1500131'),
(154, 16, 'Acará', '1500206'),
(155, 16, 'Afuá', '1500305'),
(156, 16, 'Água Azul do Norte', '1500347'),
(157, 16, 'Alenquer', '1500404'),
(158, 16, 'Almeirim', '1500503'),
(159, 16, 'Altamira', '1500602'),
(160, 16, 'Anajás', '1500701'),
(161, 16, 'Ananindeua', '1500800'),
(162, 16, 'Anapu', '1500859'),
(163, 16, 'Augusto Corrêa', '1500909'),
(164, 16, 'Aurora do Pará', '1500958'),
(165, 16, 'Aveiro', '1501006'),
(166, 16, 'Bagre', '1501105'),
(167, 16, 'Baião', '1501204'),
(168, 16, 'Bannach', '1501253'),
(169, 16, 'Barcarena', '1501303'),
(170, 16, 'Belém', '1501402'),
(171, 16, 'Belterra', '1501451'),
(172, 16, 'Benevides', '1501501'),
(173, 16, 'Bom Jesus do Tocantins', '1501576'),
(174, 16, 'Bonito', '1501600'),
(175, 16, 'Bragança', '1501709'),
(176, 16, 'Brasil Novo', '1501725'),
(177, 16, 'Brejo Grande do Araguaia', '1501758'),
(178, 16, 'Breu Branco', '1501782'),
(179, 16, 'Breves', '1501808'),
(180, 16, 'Bujaru', '1501907'),
(181, 16, 'Cachoeira do Piriá', '1501956'),
(182, 16, 'Cachoeira do Arari', '1502004'),
(183, 16, 'Cametá', '1502103'),
(184, 16, 'Canaã dos Carajás', '1502152'),
(185, 16, 'Capanema', '1502202'),
(186, 16, 'Capitão Poço', '1502301'),
(187, 16, 'Castanhal', '1502400'),
(188, 16, 'Chaves', '1502509'),
(189, 16, 'Colares', '1502608'),
(190, 16, 'Conceição do Araguaia', '1502707'),
(191, 16, 'Concórdia do Pará', '1502756'),
(192, 16, 'Cumaru do Norte', '1502764'),
(193, 16, 'Curionópolis', '1502772'),
(194, 16, 'Curralinho', '1502806'),
(195, 16, 'Curuá', '1502855'),
(196, 16, 'Curuçá', '1502905'),
(197, 16, 'Dom Eliseu', '1502939'),
(198, 16, 'Eldorado do Carajás', '1502954'),
(199, 16, 'Faro', '1503002'),
(200, 16, 'Floresta do Araguaia', '1503044'),
(201, 16, 'Garrafão do Norte', '1503077'),
(202, 16, 'Goianésia do Pará', '1503093'),
(203, 16, 'Gurupá', '1503101'),
(204, 16, 'Igarapé-Açu', '1503200'),
(205, 16, 'Igarapé-Miri', '1503309'),
(206, 16, 'Inhangapi', '1503408'),
(207, 16, 'Ipixuna do Pará', '1503457'),
(208, 16, 'Irituia', '1503507'),
(209, 16, 'Itaituba', '1503606'),
(210, 16, 'Itupiranga', '1503705'),
(211, 16, 'Jacareacanga', '1503754'),
(212, 16, 'Jacundá', '1503804'),
(213, 16, 'Juruti', '1503903'),
(214, 16, 'Limoeiro do Ajuru', '1504000'),
(215, 16, 'Mãe do Rio', '1504059'),
(216, 16, 'Magalhães Barata', '1504109'),
(217, 16, 'Marabá', '1504208'),
(218, 16, 'Maracanã', '1504307'),
(219, 16, 'Marapanim', '1504406'),
(220, 16, 'Marituba', '1504422'),
(221, 16, 'Medicilândia', '1504455'),
(222, 16, 'Melgaço', '1504505'),
(223, 16, 'Mocajuba', '1504604'),
(224, 16, 'Moju', '1504703'),
(225, 16, 'Mojuí dos Campos', '1504752'),
(226, 16, 'Monte Alegre', '1504802'),
(227, 16, 'Muaná', '1504901'),
(228, 16, 'Nova Esperança do Piriá', '1504950'),
(229, 16, 'Nova Ipixuna', '1504976'),
(230, 16, 'Nova Timboteua', '1505007'),
(231, 16, 'Novo Progresso', '1505031'),
(232, 16, 'Novo Repartimento', '1505064'),
(233, 16, 'Óbidos', '1505106'),
(234, 16, 'Oeiras do Pará', '1505205'),
(235, 16, 'Oriximiná', '1505304'),
(236, 16, 'Ourém', '1505403'),
(237, 16, 'Ourilândia do Norte', '1505437'),
(238, 16, 'Pacajá', '1505486'),
(239, 16, 'Palestina do Pará', '1505494'),
(240, 16, 'Paragominas', '1505502'),
(241, 16, 'Parauapebas', '1505536'),
(242, 16, 'Pau D\'Arco', '1505551'),
(243, 16, 'Peixe-Boi', '1505601'),
(244, 16, 'Piçarra', '1505635'),
(245, 16, 'Placas', '1505650'),
(246, 16, 'Ponta de Pedras', '1505700'),
(247, 16, 'Portel', '1505809'),
(248, 16, 'Porto de Moz', '1505908'),
(249, 16, 'Prainha', '1506005'),
(250, 16, 'Primavera', '1506104'),
(251, 16, 'Quatipuru', '1506112'),
(252, 16, 'Redenção', '1506138'),
(253, 16, 'Rio Maria', '1506161'),
(254, 16, 'Rondon do Pará', '1506187'),
(255, 16, 'Rurópolis', '1506195'),
(256, 16, 'Salinópolis', '1506203'),
(257, 16, 'Salvaterra', '1506302'),
(258, 16, 'Santa Bárbara do Pará', '1506351'),
(259, 16, 'Santa Cruz do Arari', '1506401'),
(260, 16, 'Santa Izabel do Pará', '1506500'),
(261, 16, 'Santa Luzia do Pará', '1506559'),
(262, 16, 'Santa Maria das Barreiras', '1506583'),
(263, 16, 'Santa Maria do Pará', '1506609'),
(264, 16, 'Santana do Araguaia', '1506708'),
(265, 16, 'Santarém', '1506807'),
(266, 16, 'Santarém Novo', '1506906'),
(267, 16, 'Santo Antônio do Tauá', '1507003'),
(268, 16, 'São Caetano de Odivelas', '1507102'),
(269, 16, 'São Domingos do Araguaia', '1507151'),
(270, 16, 'São Domingos do Capim', '1507201'),
(271, 16, 'São Félix do Xingu', '1507300'),
(272, 16, 'São Francisco do Pará', '1507409'),
(273, 16, 'São Geraldo do Araguaia', '1507458'),
(274, 16, 'São João da Ponta', '1507466'),
(275, 16, 'São João de Pirabas', '1507474'),
(276, 16, 'São João do Araguaia', '1507508'),
(277, 16, 'São Miguel do Guamá', '1507607'),
(278, 16, 'São Sebastião da Boa Vista', '1507706'),
(279, 16, 'Sapucaia', '1507755'),
(280, 16, 'Senador José Porfírio', '1507805'),
(281, 16, 'Soure', '1507904'),
(282, 16, 'Tailândia', '1507953'),
(283, 16, 'Terra Alta', '1507961'),
(284, 16, 'Terra Santa', '1507979'),
(285, 16, 'Tomé-Açu', '1508001'),
(286, 16, 'Tracuateua', '1508035'),
(287, 16, 'Trairão', '1508050'),
(288, 16, 'Tucumã', '1508084'),
(289, 16, 'Tucuruí', '1508100'),
(290, 16, 'Ulianópolis', '1508126'),
(291, 16, 'Uruará', '1508159'),
(292, 16, 'Vigia', '1508209'),
(293, 16, 'Viseu', '1508308'),
(294, 16, 'Vitória do Xingu', '1508357'),
(295, 16, 'Xinguara', '1508407'),
(296, 3, 'Serra do Navio', '1600055'),
(297, 3, 'Amapá', '1600105'),
(298, 3, 'Pedra Branca do Amapari', '1600154'),
(299, 3, 'Calçoene', '1600204'),
(300, 3, 'Cutias', '1600212'),
(301, 3, 'Ferreira Gomes', '1600238'),
(302, 3, 'Itaubal', '1600253'),
(303, 3, 'Laranjal do Jari', '1600279'),
(304, 3, 'Macapá', '1600303'),
(305, 3, 'Mazagão', '1600402'),
(306, 3, 'Oiapoque', '1600501'),
(307, 3, 'Porto Grande', '1600535'),
(308, 3, 'Pracuúba', '1600550'),
(309, 3, 'Santana', '1600600'),
(310, 3, 'Tartarugalzinho', '1600709'),
(311, 3, 'Vitória do Jari', '1600808'),
(312, 27, 'Abreulândia', '1700251'),
(313, 27, 'Aguiarnópolis', '1700301'),
(314, 27, 'Aliança do Tocantins', '1700350'),
(315, 27, 'Almas', '1700400'),
(316, 27, 'Alvorada', '1700707'),
(317, 27, 'Ananás', '1701002'),
(318, 27, 'Angico', '1701051'),
(319, 27, 'Aparecida do Rio Negro', '1701101'),
(320, 27, 'Aragominas', '1701309'),
(321, 27, 'Araguacema', '1701903'),
(322, 27, 'Araguaçu', '1702000'),
(323, 27, 'Araguaína', '1702109'),
(324, 27, 'Araguanã', '1702158'),
(325, 27, 'Araguatins', '1702208'),
(326, 27, 'Arapoema', '1702307'),
(327, 27, 'Arraias', '1702406'),
(328, 27, 'Augustinópolis', '1702554'),
(329, 27, 'Aurora do Tocantins', '1702703'),
(330, 27, 'Axixá do Tocantins', '1702901'),
(331, 27, 'Babaçulândia', '1703008'),
(332, 27, 'Bandeirantes do Tocantins', '1703057'),
(333, 27, 'Barra do Ouro', '1703073'),
(334, 27, 'Barrolândia', '1703107'),
(335, 27, 'Bernardo Sayão', '1703206'),
(336, 27, 'Bom Jesus do Tocantins', '1703305'),
(337, 27, 'Brasilândia do Tocantins', '1703602'),
(338, 27, 'Brejinho de Nazaré', '1703701'),
(339, 27, 'Buriti do Tocantins', '1703800'),
(340, 27, 'Cachoeirinha', '1703826'),
(341, 27, 'Campos Lindos', '1703842'),
(342, 27, 'Cariri do Tocantins', '1703867'),
(343, 27, 'Carmolândia', '1703883'),
(344, 27, 'Carrasco Bonito', '1703891'),
(345, 27, 'Caseara', '1703909'),
(346, 27, 'Centenário', '1704105'),
(347, 27, 'Chapada de Areia', '1704600'),
(348, 27, 'Chapada da Natividade', '1705102'),
(349, 27, 'Colinas do Tocantins', '1705508'),
(350, 27, 'Combinado', '1705557'),
(351, 27, 'Conceição do Tocantins', '1705607'),
(352, 27, 'Couto Magalhães', '1706001'),
(353, 27, 'Cristalândia', '1706100'),
(354, 27, 'Crixás do Tocantins', '1706258'),
(355, 27, 'Darcinópolis', '1706506'),
(356, 27, 'Dianópolis', '1707009'),
(357, 27, 'Divinópolis do Tocantins', '1707108'),
(358, 27, 'Dois Irmãos do Tocantins', '1707207'),
(359, 27, 'Dueré', '1707306'),
(360, 27, 'Esperantina', '1707405'),
(361, 27, 'Fátima', '1707553'),
(362, 27, 'Figueirópolis', '1707652'),
(363, 27, 'Filadélfia', '1707702'),
(364, 27, 'Formoso do Araguaia', '1708205'),
(365, 27, 'Fortaleza do Tabocão', '1708254'),
(366, 27, 'Goianorte', '1708304'),
(367, 27, 'Goiatins', '1709005'),
(368, 27, 'Guaraí', '1709302'),
(369, 27, 'Gurupi', '1709500'),
(370, 27, 'Ipueiras', '1709807'),
(371, 27, 'Itacajá', '1710508'),
(372, 27, 'Itaguatins', '1710706'),
(373, 27, 'Itapiratins', '1710904'),
(374, 27, 'Itaporã do Tocantins', '1711100'),
(375, 27, 'Jaú do Tocantins', '1711506'),
(376, 27, 'Juarina', '1711803'),
(377, 27, 'Lagoa da Confusão', '1711902'),
(378, 27, 'Lagoa do Tocantins', '1711951'),
(379, 27, 'Lajeado', '1712009'),
(380, 27, 'Lavandeira', '1712157'),
(381, 27, 'Lizarda', '1712405'),
(382, 27, 'Luzinópolis', '1712454'),
(383, 27, 'Marianópolis do Tocantins', '1712504'),
(384, 27, 'Mateiros', '1712702'),
(385, 27, 'Maurilândia do Tocantins', '1712801'),
(386, 27, 'Miracema do Tocantins', '1713205'),
(387, 27, 'Miranorte', '1713304'),
(388, 27, 'Monte do Carmo', '1713601'),
(389, 27, 'Monte Santo do Tocantins', '1713700'),
(390, 27, 'Palmeiras do Tocantins', '1713809'),
(391, 27, 'Muricilândia', '1713957'),
(392, 27, 'Natividade', '1714203'),
(393, 27, 'Nazaré', '1714302'),
(394, 27, 'Nova Olinda', '1714880'),
(395, 27, 'Nova Rosalândia', '1715002'),
(396, 27, 'Novo Acordo', '1715101'),
(397, 27, 'Novo Alegre', '1715150'),
(398, 27, 'Novo Jardim', '1715259'),
(399, 27, 'Oliveira de Fátima', '1715507'),
(400, 27, 'Palmeirante', '1715705'),
(401, 27, 'Palmeirópolis', '1715754'),
(402, 27, 'Paraíso do Tocantins', '1716109'),
(403, 27, 'Paranã', '1716208'),
(404, 27, 'Pau D\'Arco', '1716307'),
(405, 27, 'Pedro Afonso', '1716505'),
(406, 27, 'Peixe', '1716604'),
(407, 27, 'Pequizeiro', '1716653'),
(408, 27, 'Colméia', '1716703'),
(409, 27, 'Pindorama do Tocantins', '1717008'),
(410, 27, 'Piraquê', '1717206'),
(411, 27, 'Pium', '1717503'),
(412, 27, 'Ponte Alta do Bom Jesus', '1717800'),
(413, 27, 'Ponte Alta do Tocantins', '1717909'),
(414, 27, 'Porto Alegre do Tocantins', '1718006'),
(415, 27, 'Porto Nacional', '1718204'),
(416, 27, 'Praia Norte', '1718303'),
(417, 27, 'Presidente Kennedy', '1718402'),
(418, 27, 'Pugmil', '1718451'),
(419, 27, 'Recursolândia', '1718501'),
(420, 27, 'Riachinho', '1718550'),
(421, 27, 'Rio da Conceição', '1718659'),
(422, 27, 'Rio dos Bois', '1718709'),
(423, 27, 'Rio Sono', '1718758'),
(424, 27, 'Sampaio', '1718808'),
(425, 27, 'Sandolândia', '1718840'),
(426, 27, 'Santa Fé do Araguaia', '1718865'),
(427, 27, 'Santa Maria do Tocantins', '1718881'),
(428, 27, 'Santa Rita do Tocantins', '1718899'),
(429, 27, 'Santa Rosa do Tocantins', '1718907'),
(430, 27, 'Santa Tereza do Tocantins', '1719004'),
(431, 27, 'Santa Terezinha do Tocantins', '1720002'),
(432, 27, 'São Bento do Tocantins', '1720101'),
(433, 27, 'São Félix do Tocantins', '1720150'),
(434, 27, 'São Miguel do Tocantins', '1720200'),
(435, 27, 'São Salvador do Tocantins', '1720259'),
(436, 27, 'São Sebastião do Tocantins', '1720309'),
(437, 27, 'São Valério', '1720499'),
(438, 27, 'Silvanópolis', '1720655'),
(439, 27, 'Sítio Novo do Tocantins', '1720804'),
(440, 27, 'Sucupira', '1720853'),
(441, 27, 'Taguatinga', '1720903'),
(442, 27, 'Taipas do Tocantins', '1720937'),
(443, 27, 'Talismã', '1720978'),
(444, 27, 'Palmas', '1721000'),
(445, 27, 'Tocantínia', '1721109'),
(446, 27, 'Tocantinópolis', '1721208'),
(447, 27, 'Tupirama', '1721257'),
(448, 27, 'Tupiratins', '1721307'),
(449, 27, 'Wanderlândia', '1722081'),
(450, 27, 'Xambioá', '1722107'),
(451, 10, 'Açailândia', '2100055'),
(452, 10, 'Afonso Cunha', '2100105'),
(453, 10, 'Água Doce do Maranhão', '2100154'),
(454, 10, 'Alcântara', '2100204'),
(455, 10, 'Aldeias Altas', '2100303'),
(456, 10, 'Altamira do Maranhão', '2100402'),
(457, 10, 'Alto Alegre do Maranhão', '2100436'),
(458, 10, 'Alto Alegre do Pindaré', '2100477'),
(459, 10, 'Alto Parnaíba', '2100501'),
(460, 10, 'Amapá do Maranhão', '2100550'),
(461, 10, 'Amarante do Maranhão', '2100600'),
(462, 10, 'Anajatuba', '2100709'),
(463, 10, 'Anapurus', '2100808'),
(464, 10, 'Apicum-Açu', '2100832'),
(465, 10, 'Araguanã', '2100873'),
(466, 10, 'Araioses', '2100907'),
(467, 10, 'Arame', '2100956'),
(468, 10, 'Arari', '2101004'),
(469, 10, 'Axixá', '2101103'),
(470, 10, 'Bacabal', '2101202'),
(471, 10, 'Bacabeira', '2101251'),
(472, 10, 'Bacuri', '2101301'),
(473, 10, 'Bacurituba', '2101350'),
(474, 10, 'Balsas', '2101400'),
(475, 10, 'Barão de Grajaú', '2101509'),
(476, 10, 'Barra do Corda', '2101608'),
(477, 10, 'Barreirinhas', '2101707'),
(478, 10, 'Belágua', '2101731'),
(479, 10, 'Bela Vista do Maranhão', '2101772'),
(480, 10, 'Benedito Leite', '2101806'),
(481, 10, 'Bequimão', '2101905'),
(482, 10, 'Bernardo do Mearim', '2101939'),
(483, 10, 'Boa Vista do Gurupi', '2101970'),
(484, 10, 'Bom Jardim', '2102002'),
(485, 10, 'Bom Jesus das Selvas', '2102036'),
(486, 10, 'Bom Lugar', '2102077'),
(487, 10, 'Brejo', '2102101'),
(488, 10, 'Brejo de Areia', '2102150'),
(489, 10, 'Buriti', '2102200'),
(490, 10, 'Buriti Bravo', '2102309'),
(491, 10, 'Buriticupu', '2102325'),
(492, 10, 'Buritirana', '2102358'),
(493, 10, 'Cachoeira Grande', '2102374'),
(494, 10, 'Cajapió', '2102408'),
(495, 10, 'Cajari', '2102507'),
(496, 10, 'Campestre do Maranhão', '2102556'),
(497, 10, 'Cândido Mendes', '2102606'),
(498, 10, 'Cantanhede', '2102705'),
(499, 10, 'Capinzal do Norte', '2102754'),
(500, 10, 'Carolina', '2102804'),
(501, 10, 'Carutapera', '2102903'),
(502, 10, 'Caxias', '2103000'),
(503, 10, 'Cedral', '2103109'),
(504, 10, 'Central do Maranhão', '2103125'),
(505, 10, 'Centro do Guilherme', '2103158'),
(506, 10, 'Centro Novo do Maranhão', '2103174'),
(507, 10, 'Chapadinha', '2103208'),
(508, 10, 'Cidelândia', '2103257'),
(509, 10, 'Codó', '2103307'),
(510, 10, 'Coelho Neto', '2103406'),
(511, 10, 'Colinas', '2103505'),
(512, 10, 'Conceição do Lago-Açu', '2103554'),
(513, 10, 'Coroatá', '2103604'),
(514, 10, 'Cururupu', '2103703'),
(515, 10, 'Davinópolis', '2103752'),
(516, 10, 'Dom Pedro', '2103802'),
(517, 10, 'Duque Bacelar', '2103901'),
(518, 10, 'Esperantinópolis', '2104008'),
(519, 10, 'Estreito', '2104057'),
(520, 10, 'Feira Nova do Maranhão', '2104073'),
(521, 10, 'Fernando Falcão', '2104081'),
(522, 10, 'Formosa da Serra Negra', '2104099'),
(523, 10, 'Fortaleza dos Nogueiras', '2104107'),
(524, 10, 'Fortuna', '2104206'),
(525, 10, 'Godofredo Viana', '2104305'),
(526, 10, 'Gonçalves Dias', '2104404'),
(527, 10, 'Governador Archer', '2104503'),
(528, 10, 'Governador Edison Lobão', '2104552'),
(529, 10, 'Governador Eugênio Barros', '2104602'),
(530, 10, 'Governador Luiz Rocha', '2104628'),
(531, 10, 'Governador Newton Bello', '2104651'),
(532, 10, 'Governador Nunes Freire', '2104677'),
(533, 10, 'Graça Aranha', '2104701'),
(534, 10, 'Grajaú', '2104800'),
(535, 10, 'Guimarães', '2104909'),
(536, 10, 'Humberto de Campos', '2105005'),
(537, 10, 'Icatu', '2105104'),
(538, 10, 'Igarapé do Meio', '2105153'),
(539, 10, 'Igarapé Grande', '2105203'),
(540, 10, 'Imperatriz', '2105302'),
(541, 10, 'Itaipava do Grajaú', '2105351'),
(542, 10, 'Itapecuru Mirim', '2105401'),
(543, 10, 'Itinga do Maranhão', '2105427'),
(544, 10, 'Jatobá', '2105450'),
(545, 10, 'Jenipapo dos Vieiras', '2105476'),
(546, 10, 'João Lisboa', '2105500'),
(547, 10, 'Joselândia', '2105609'),
(548, 10, 'Junco do Maranhão', '2105658'),
(549, 10, 'Lago da Pedra', '2105708'),
(550, 10, 'Lago do Junco', '2105807'),
(551, 10, 'Lago Verde', '2105906'),
(552, 10, 'Lagoa do Mato', '2105922'),
(553, 10, 'Lago dos Rodrigues', '2105948'),
(554, 10, 'Lagoa Grande do Maranhão', '2105963'),
(555, 10, 'Lajeado Novo', '2105989'),
(556, 10, 'Lima Campos', '2106003'),
(557, 10, 'Loreto', '2106102'),
(558, 10, 'Luís Domingues', '2106201'),
(559, 10, 'Magalhães de Almeida', '2106300'),
(560, 10, 'Maracaçumé', '2106326'),
(561, 10, 'Marajá do Sena', '2106359'),
(562, 10, 'Maranhãozinho', '2106375'),
(563, 10, 'Mata Roma', '2106409'),
(564, 10, 'Matinha', '2106508'),
(565, 10, 'Matões', '2106607'),
(566, 10, 'Matões do Norte', '2106631'),
(567, 10, 'Milagres do Maranhão', '2106672'),
(568, 10, 'Mirador', '2106706'),
(569, 10, 'Miranda do Norte', '2106755'),
(570, 10, 'Mirinzal', '2106805'),
(571, 10, 'Monção', '2106904'),
(572, 10, 'Montes Altos', '2107001'),
(573, 10, 'Morros', '2107100'),
(574, 10, 'Nina Rodrigues', '2107209'),
(575, 10, 'Nova Colinas', '2107258'),
(576, 10, 'Nova Iorque', '2107308'),
(577, 10, 'Nova Olinda do Maranhão', '2107357'),
(578, 10, 'Olho d\'Água das Cunhãs', '2107407'),
(579, 10, 'Olinda Nova do Maranhão', '2107456'),
(580, 10, 'Paço do Lumiar', '2107506'),
(581, 10, 'Palmeirândia', '2107605'),
(582, 10, 'Paraibano', '2107704'),
(583, 10, 'Parnarama', '2107803'),
(584, 10, 'Passagem Franca', '2107902'),
(585, 10, 'Pastos Bons', '2108009'),
(586, 10, 'Paulino Neves', '2108058'),
(587, 10, 'Paulo Ramos', '2108108'),
(588, 10, 'Pedreiras', '2108207'),
(589, 10, 'Pedro do Rosário', '2108256'),
(590, 10, 'Penalva', '2108306'),
(591, 10, 'Peri Mirim', '2108405'),
(592, 10, 'Peritoró', '2108454'),
(593, 10, 'Pindaré-Mirim', '2108504'),
(594, 10, 'Pinheiro', '2108603'),
(595, 10, 'Pio XII', '2108702'),
(596, 10, 'Pirapemas', '2108801'),
(597, 10, 'Poção de Pedras', '2108900'),
(598, 10, 'Porto Franco', '2109007'),
(599, 10, 'Porto Rico do Maranhão', '2109056'),
(600, 10, 'Presidente Dutra', '2109106'),
(601, 10, 'Presidente Juscelino', '2109205'),
(602, 10, 'Presidente Médici', '2109239'),
(603, 10, 'Presidente Sarney', '2109270'),
(604, 10, 'Presidente Vargas', '2109304'),
(605, 10, 'Primeira Cruz', '2109403'),
(606, 10, 'Raposa', '2109452'),
(607, 10, 'Riachão', '2109502'),
(608, 10, 'Ribamar Fiquene', '2109551'),
(609, 10, 'Rosário', '2109601'),
(610, 10, 'Sambaíba', '2109700'),
(611, 10, 'Santa Filomena do Maranhão', '2109759'),
(612, 10, 'Santa Helena', '2109809'),
(613, 10, 'Santa Inês', '2109908'),
(614, 10, 'Santa Luzia', '2110005'),
(615, 10, 'Santa Luzia do Paruá', '2110039'),
(616, 10, 'Santa Quitéria do Maranhão', '2110104'),
(617, 10, 'Santa Rita', '2110203'),
(618, 10, 'Santana do Maranhão', '2110237'),
(619, 10, 'Santo Amaro do Maranhão', '2110278'),
(620, 10, 'Santo Antônio dos Lopes', '2110302'),
(621, 10, 'São Benedito do Rio Preto', '2110401'),
(622, 10, 'São Bento', '2110500'),
(623, 10, 'São Bernardo', '2110609'),
(624, 10, 'São Domingos do Azeitão', '2110658'),
(625, 10, 'São Domingos do Maranhão', '2110708'),
(626, 10, 'São Félix de Balsas', '2110807'),
(627, 10, 'São Francisco do Brejão', '2110856'),
(628, 10, 'São Francisco do Maranhão', '2110906'),
(629, 10, 'São João Batista', '2111003'),
(630, 10, 'São João do Carú', '2111029'),
(631, 10, 'São João do Paraíso', '2111052'),
(632, 10, 'São João do Soter', '2111078'),
(633, 10, 'São João dos Patos', '2111102'),
(634, 10, 'São José de Ribamar', '2111201'),
(635, 10, 'São José dos Basílios', '2111250'),
(636, 10, 'São Luís', '2111300'),
(637, 10, 'São Luís Gonzaga do Maranhão', '2111409'),
(638, 10, 'São Mateus do Maranhão', '2111508'),
(639, 10, 'São Pedro da Água Branca', '2111532'),
(640, 10, 'São Pedro dos Crentes', '2111573'),
(641, 10, 'São Raimundo das Mangabeiras', '2111607'),
(642, 10, 'São Raimundo do Doca Bezerra', '2111631'),
(643, 10, 'São Roberto', '2111672'),
(644, 10, 'São Vicente Ferrer', '2111706'),
(645, 10, 'Satubinha', '2111722'),
(646, 10, 'Senador Alexandre Costa', '2111748'),
(647, 10, 'Senador La Rocque', '2111763'),
(648, 10, 'Serrano do Maranhão', '2111789'),
(649, 10, 'Sítio Novo', '2111805'),
(650, 10, 'Sucupira do Norte', '2111904'),
(651, 10, 'Sucupira do Riachão', '2111953'),
(652, 10, 'Tasso Fragoso', '2112001'),
(653, 10, 'Timbiras', '2112100'),
(654, 10, 'Timon', '2112209'),
(655, 10, 'Trizidela do Vale', '2112233'),
(656, 10, 'Tufilândia', '2112274'),
(657, 10, 'Tuntum', '2112308'),
(658, 10, 'Turiaçu', '2112407'),
(659, 10, 'Turilândia', '2112456'),
(660, 10, 'Tutóia', '2112506'),
(661, 10, 'Urbano Santos', '2112605'),
(662, 10, 'Vargem Grande', '2112704'),
(663, 10, 'Viana', '2112803'),
(664, 10, 'Vila Nova dos Martírios', '2112852'),
(665, 10, 'Vitória do Mearim', '2112902'),
(666, 10, 'Vitorino Freire', '2113009'),
(667, 10, 'Zé Doca', '2114007'),
(668, 18, 'Acauã', '2200053'),
(669, 18, 'Agricolândia', '2200103'),
(670, 18, 'Água Branca', '2200202'),
(671, 18, 'Alagoinha do Piauí', '2200251'),
(672, 18, 'Alegrete do Piauí', '2200277'),
(673, 18, 'Alto Longá', '2200301'),
(674, 18, 'Altos', '2200400'),
(675, 18, 'Alvorada do Gurguéia', '2200459'),
(676, 18, 'Amarante', '2200509'),
(677, 18, 'Angical do Piauí', '2200608'),
(678, 18, 'Anísio de Abreu', '2200707'),
(679, 18, 'Antônio Almeida', '2200806'),
(680, 18, 'Aroazes', '2200905'),
(681, 18, 'Aroeiras do Itaim', '2200954'),
(682, 18, 'Arraial', '2201002'),
(683, 18, 'Assunção do Piauí', '2201051'),
(684, 18, 'Avelino Lopes', '2201101'),
(685, 18, 'Baixa Grande do Ribeiro', '2201150'),
(686, 18, 'Barra D\'Alcântara', '2201176'),
(687, 18, 'Barras', '2201200'),
(688, 18, 'Barreiras do Piauí', '2201309'),
(689, 18, 'Barro Duro', '2201408'),
(690, 18, 'Batalha', '2201507'),
(691, 18, 'Bela Vista do Piauí', '2201556'),
(692, 18, 'Belém do Piauí', '2201572'),
(693, 18, 'Beneditinos', '2201606'),
(694, 18, 'Bertolínia', '2201705'),
(695, 18, 'Betânia do Piauí', '2201739'),
(696, 18, 'Boa Hora', '2201770'),
(697, 18, 'Bocaina', '2201804'),
(698, 18, 'Bom Jesus', '2201903'),
(699, 18, 'Bom Princípio do Piauí', '2201919'),
(700, 18, 'Bonfim do Piauí', '2201929'),
(701, 18, 'Boqueirão do Piauí', '2201945'),
(702, 18, 'Brasileira', '2201960'),
(703, 18, 'Brejo do Piauí', '2201988'),
(704, 18, 'Buriti dos Lopes', '2202000'),
(705, 18, 'Buriti dos Montes', '2202026'),
(706, 18, 'Cabeceiras do Piauí', '2202059'),
(707, 18, 'Cajazeiras do Piauí', '2202075'),
(708, 18, 'Cajueiro da Praia', '2202083'),
(709, 18, 'Caldeirão Grande do Piauí', '2202091'),
(710, 18, 'Campinas do Piauí', '2202109'),
(711, 18, 'Campo Alegre do Fidalgo', '2202117'),
(712, 18, 'Campo Grande do Piauí', '2202133'),
(713, 18, 'Campo Largo do Piauí', '2202174'),
(714, 18, 'Campo Maior', '2202208'),
(715, 18, 'Canavieira', '2202251'),
(716, 18, 'Canto do Buriti', '2202307'),
(717, 18, 'Capitão de Campos', '2202406'),
(718, 18, 'Capitão Gervásio Oliveira', '2202455'),
(719, 18, 'Caracol', '2202505'),
(720, 18, 'Caraúbas do Piauí', '2202539'),
(721, 18, 'Caridade do Piauí', '2202554'),
(722, 18, 'Castelo do Piauí', '2202604'),
(723, 18, 'Caxingó', '2202653'),
(724, 18, 'Cocal', '2202703'),
(725, 18, 'Cocal de Telha', '2202711'),
(726, 18, 'Cocal dos Alves', '2202729'),
(727, 18, 'Coivaras', '2202737'),
(728, 18, 'Colônia do Gurguéia', '2202752'),
(729, 18, 'Colônia do Piauí', '2202778'),
(730, 18, 'Conceição do Canindé', '2202802'),
(731, 18, 'Coronel José Dias', '2202851'),
(732, 18, 'Corrente', '2202901'),
(733, 18, 'Cristalândia do Piauí', '2203008'),
(734, 18, 'Cristino Castro', '2203107'),
(735, 18, 'Curimatá', '2203206'),
(736, 18, 'Currais', '2203230'),
(737, 18, 'Curralinhos', '2203255'),
(738, 18, 'Curral Novo do Piauí', '2203271'),
(739, 18, 'Demerval Lobão', '2203305'),
(740, 18, 'Dirceu Arcoverde', '2203354'),
(741, 18, 'Dom Expedito Lopes', '2203404'),
(742, 18, 'Domingos Mourão', '2203420'),
(743, 18, 'Dom Inocêncio', '2203453'),
(744, 18, 'Elesbão Veloso', '2203503'),
(745, 18, 'Eliseu Martins', '2203602'),
(746, 18, 'Esperantina', '2203701'),
(747, 18, 'Fartura do Piauí', '2203750'),
(748, 18, 'Flores do Piauí', '2203800'),
(749, 18, 'Floresta do Piauí', '2203859'),
(750, 18, 'Floriano', '2203909'),
(751, 18, 'Francinópolis', '2204006'),
(752, 18, 'Francisco Ayres', '2204105'),
(753, 18, 'Francisco Macedo', '2204154'),
(754, 18, 'Francisco Santos', '2204204'),
(755, 18, 'Fronteiras', '2204303'),
(756, 18, 'Geminiano', '2204352'),
(757, 18, 'Gilbués', '2204402'),
(758, 18, 'Guadalupe', '2204501'),
(759, 18, 'Guaribas', '2204550'),
(760, 18, 'Hugo Napoleão', '2204600'),
(761, 18, 'Ilha Grande', '2204659'),
(762, 18, 'Inhuma', '2204709'),
(763, 18, 'Ipiranga do Piauí', '2204808'),
(764, 18, 'Isaías Coelho', '2204907'),
(765, 18, 'Itainópolis', '2205003'),
(766, 18, 'Itaueira', '2205102'),
(767, 18, 'Jacobina do Piauí', '2205151'),
(768, 18, 'Jaicós', '2205201'),
(769, 18, 'Jardim do Mulato', '2205250'),
(770, 18, 'Jatobá do Piauí', '2205276'),
(771, 18, 'Jerumenha', '2205300'),
(772, 18, 'João Costa', '2205359'),
(773, 18, 'Joaquim Pires', '2205409'),
(774, 18, 'Joca Marques', '2205458'),
(775, 18, 'José de Freitas', '2205508'),
(776, 18, 'Juazeiro do Piauí', '2205516'),
(777, 18, 'Júlio Borges', '2205524'),
(778, 18, 'Jurema', '2205532'),
(779, 18, 'Lagoinha do Piauí', '2205540'),
(780, 18, 'Lagoa Alegre', '2205557'),
(781, 18, 'Lagoa do Barro do Piauí', '2205565'),
(782, 18, 'Lagoa de São Francisco', '2205573'),
(783, 18, 'Lagoa do Piauí', '2205581'),
(784, 18, 'Lagoa do Sítio', '2205599'),
(785, 18, 'Landri Sales', '2205607'),
(786, 18, 'Luís Correia', '2205706'),
(787, 18, 'Luzilândia', '2205805'),
(788, 18, 'Madeiro', '2205854'),
(789, 18, 'Manoel Emídio', '2205904'),
(790, 18, 'Marcolândia', '2205953'),
(791, 18, 'Marcos Parente', '2206001'),
(792, 18, 'Massapê do Piauí', '2206050'),
(793, 18, 'Matias Olímpio', '2206100'),
(794, 18, 'Miguel Alves', '2206209'),
(795, 18, 'Miguel Leão', '2206308'),
(796, 18, 'Milton Brandão', '2206357'),
(797, 18, 'Monsenhor Gil', '2206407'),
(798, 18, 'Monsenhor Hipólito', '2206506'),
(799, 18, 'Monte Alegre do Piauí', '2206605'),
(800, 18, 'Morro Cabeça no Tempo', '2206654'),
(801, 18, 'Morro do Chapéu do Piauí', '2206670'),
(802, 18, 'Murici dos Portelas', '2206696'),
(803, 18, 'Nazaré do Piauí', '2206704'),
(804, 18, 'Nazária', '2206720'),
(805, 18, 'Nossa Senhora de Nazaré', '2206753'),
(806, 18, 'Nossa Senhora dos Remédios', '2206803'),
(807, 18, 'Novo Oriente do Piauí', '2206902'),
(808, 18, 'Novo Santo Antônio', '2206951'),
(809, 18, 'Oeiras', '2207009'),
(810, 18, 'Olho D\'Água do Piauí', '2207108'),
(811, 18, 'Padre Marcos', '2207207'),
(812, 18, 'Paes Landim', '2207306'),
(813, 18, 'Pajeú do Piauí', '2207355'),
(814, 18, 'Palmeira do Piauí', '2207405'),
(815, 18, 'Palmeirais', '2207504'),
(816, 18, 'Paquetá', '2207553'),
(817, 18, 'Parnaguá', '2207603'),
(818, 18, 'Parnaíba', '2207702'),
(819, 18, 'Passagem Franca do Piauí', '2207751'),
(820, 18, 'Patos do Piauí', '2207777'),
(821, 18, 'Pau D\'Arco do Piauí', '2207793'),
(822, 18, 'Paulistana', '2207801'),
(823, 18, 'Pavussu', '2207850'),
(824, 18, 'Pedro II', '2207900'),
(825, 18, 'Pedro Laurentino', '2207934'),
(826, 18, 'Nova Santa Rita', '2207959'),
(827, 18, 'Picos', '2208007'),
(828, 18, 'Pimenteiras', '2208106'),
(829, 18, 'Pio IX', '2208205'),
(830, 18, 'Piracuruca', '2208304'),
(831, 18, 'Piripiri', '2208403'),
(832, 18, 'Porto', '2208502'),
(833, 18, 'Porto Alegre do Piauí', '2208551'),
(834, 18, 'Prata do Piauí', '2208601'),
(835, 18, 'Queimada Nova', '2208650'),
(836, 18, 'Redenção do Gurguéia', '2208700'),
(837, 18, 'Regeneração', '2208809'),
(838, 18, 'Riacho Frio', '2208858'),
(839, 18, 'Ribeira do Piauí', '2208874'),
(840, 18, 'Ribeiro Gonçalves', '2208908'),
(841, 18, 'Rio Grande do Piauí', '2209005'),
(842, 18, 'Santa Cruz do Piauí', '2209104'),
(843, 18, 'Santa Cruz dos Milagres', '2209153'),
(844, 18, 'Santa Filomena', '2209203'),
(845, 18, 'Santa Luz', '2209302'),
(846, 18, 'Santana do Piauí', '2209351'),
(847, 18, 'Santa Rosa do Piauí', '2209377'),
(848, 18, 'Santo Antônio de Lisboa', '2209401'),
(849, 18, 'Santo Antônio dos Milagres', '2209450'),
(850, 18, 'Santo Inácio do Piauí', '2209500'),
(851, 18, 'São Braz do Piauí', '2209559'),
(852, 18, 'São Félix do Piauí', '2209609'),
(853, 18, 'São Francisco de Assis do Piauí', '2209658'),
(854, 18, 'São Francisco do Piauí', '2209708'),
(855, 18, 'São Gonçalo do Gurguéia', '2209757'),
(856, 18, 'São Gonçalo do Piauí', '2209807'),
(857, 18, 'São João da Canabrava', '2209856'),
(858, 18, 'São João da Fronteira', '2209872'),
(859, 18, 'São João da Serra', '2209906'),
(860, 18, 'São João da Varjota', '2209955'),
(861, 18, 'São João do Arraial', '2209971'),
(862, 18, 'São João do Piauí', '2210003'),
(863, 18, 'São José do Divino', '2210052'),
(864, 18, 'São José do Peixe', '2210102'),
(865, 18, 'São José do Piauí', '2210201'),
(866, 18, 'São Julião', '2210300'),
(867, 18, 'São Lourenço do Piauí', '2210359'),
(868, 18, 'São Luis do Piauí', '2210375'),
(869, 18, 'São Miguel da Baixa Grande', '2210383'),
(870, 18, 'São Miguel do Fidalgo', '2210391'),
(871, 18, 'São Miguel do Tapuio', '2210409'),
(872, 18, 'São Pedro do Piauí', '2210508'),
(873, 18, 'São Raimundo Nonato', '2210607'),
(874, 18, 'Sebastião Barros', '2210623'),
(875, 18, 'Sebastião Leal', '2210631'),
(876, 18, 'Sigefredo Pacheco', '2210656'),
(877, 18, 'Simões', '2210706'),
(878, 18, 'Simplício Mendes', '2210805'),
(879, 18, 'Socorro do Piauí', '2210904'),
(880, 18, 'Sussuapara', '2210938'),
(881, 18, 'Tamboril do Piauí', '2210953'),
(882, 18, 'Tanque do Piauí', '2210979'),
(883, 18, 'Teresina', '2211001'),
(884, 18, 'União', '2211100'),
(885, 18, 'Uruçuí', '2211209'),
(886, 18, 'Valença do Piauí', '2211308'),
(887, 18, 'Várzea Branca', '2211357'),
(888, 18, 'Várzea Grande', '2211407'),
(889, 18, 'Vera Mendes', '2211506'),
(890, 18, 'Vila Nova do Piauí', '2211605'),
(891, 18, 'Wall Ferraz', '2211704'),
(892, 6, 'Abaiara', '2300101'),
(893, 6, 'Acarape', '2300150'),
(894, 6, 'Acaraú', '2300200'),
(895, 6, 'Acopiara', '2300309'),
(896, 6, 'Aiuaba', '2300408'),
(897, 6, 'Alcântaras', '2300507'),
(898, 6, 'Altaneira', '2300606'),
(899, 6, 'Alto Santo', '2300705'),
(900, 6, 'Amontada', '2300754'),
(901, 6, 'Antonina do Norte', '2300804'),
(902, 6, 'Apuiarés', '2300903'),
(903, 6, 'Aquiraz', '2301000'),
(904, 6, 'Aracati', '2301109'),
(905, 6, 'Aracoiaba', '2301208'),
(906, 6, 'Ararendá', '2301257'),
(907, 6, 'Araripe', '2301307'),
(908, 6, 'Aratuba', '2301406'),
(909, 6, 'Arneiroz', '2301505'),
(910, 6, 'Assaré', '2301604'),
(911, 6, 'Aurora', '2301703'),
(912, 6, 'Baixio', '2301802'),
(913, 6, 'Banabuiú', '2301851'),
(914, 6, 'Barbalha', '2301901'),
(915, 6, 'Barreira', '2301950'),
(916, 6, 'Barro', '2302008'),
(917, 6, 'Barroquinha', '2302057'),
(918, 6, 'Baturité', '2302107'),
(919, 6, 'Beberibe', '2302206'),
(920, 6, 'Bela Cruz', '2302305'),
(921, 6, 'Boa Viagem', '2302404'),
(922, 6, 'Brejo Santo', '2302503'),
(923, 6, 'Camocim', '2302602'),
(924, 6, 'Campos Sales', '2302701'),
(925, 6, 'Canindé', '2302800'),
(926, 6, 'Capistrano', '2302909'),
(927, 6, 'Caridade', '2303006'),
(928, 6, 'Cariré', '2303105'),
(929, 6, 'Caririaçu', '2303204'),
(930, 6, 'Cariús', '2303303'),
(931, 6, 'Carnaubal', '2303402'),
(932, 6, 'Cascavel', '2303501'),
(933, 6, 'Catarina', '2303600'),
(934, 6, 'Catunda', '2303659'),
(935, 6, 'Caucaia', '2303709'),
(936, 6, 'Cedro', '2303808'),
(937, 6, 'Chaval', '2303907'),
(938, 6, 'Choró', '2303931'),
(939, 6, 'Chorozinho', '2303956'),
(940, 6, 'Coreaú', '2304004'),
(941, 6, 'Crateús', '2304103'),
(942, 6, 'Crato', '2304202'),
(943, 6, 'Croatá', '2304236'),
(944, 6, 'Cruz', '2304251'),
(945, 6, 'Deputado Irapuan Pinheiro', '2304269'),
(946, 6, 'Ererê', '2304277'),
(947, 6, 'Eusébio', '2304285'),
(948, 6, 'Farias Brito', '2304301'),
(949, 6, 'Forquilha', '2304350'),
(950, 6, 'Fortaleza', '2304400'),
(951, 6, 'Fortim', '2304459'),
(952, 6, 'Frecheirinha', '2304509'),
(953, 6, 'General Sampaio', '2304608'),
(954, 6, 'Graça', '2304657'),
(955, 6, 'Granja', '2304707'),
(956, 6, 'Granjeiro', '2304806'),
(957, 6, 'Groaíras', '2304905'),
(958, 6, 'Guaiúba', '2304954'),
(959, 6, 'Guaraciaba do Norte', '2305001'),
(960, 6, 'Guaramiranga', '2305100'),
(961, 6, 'Hidrolândia', '2305209'),
(962, 6, 'Horizonte', '2305233'),
(963, 6, 'Ibaretama', '2305266'),
(964, 6, 'Ibiapina', '2305308'),
(965, 6, 'Ibicuitinga', '2305332'),
(966, 6, 'Icapuí', '2305357'),
(967, 6, 'Icó', '2305407'),
(968, 6, 'Iguatu', '2305506'),
(969, 6, 'Independência', '2305605'),
(970, 6, 'Ipaporanga', '2305654'),
(971, 6, 'Ipaumirim', '2305704'),
(972, 6, 'Ipu', '2305803'),
(973, 6, 'Ipueiras', '2305902'),
(974, 6, 'Iracema', '2306009'),
(975, 6, 'Irauçuba', '2306108'),
(976, 6, 'Itaiçaba', '2306207'),
(977, 6, 'Itaitinga', '2306256'),
(978, 6, 'Itapagé', '2306306'),
(979, 6, 'Itapipoca', '2306405'),
(980, 6, 'Itapiúna', '2306504'),
(981, 6, 'Itarema', '2306553'),
(982, 6, 'Itatira', '2306603'),
(983, 6, 'Jaguaretama', '2306702'),
(984, 6, 'Jaguaribara', '2306801'),
(985, 6, 'Jaguaribe', '2306900'),
(986, 6, 'Jaguaruana', '2307007'),
(987, 6, 'Jardim', '2307106'),
(988, 6, 'Jati', '2307205'),
(989, 6, 'Jijoca de Jericoacoara', '2307254'),
(990, 6, 'Juazeiro do Norte', '2307304'),
(991, 6, 'Jucás', '2307403'),
(992, 6, 'Lavras da Mangabeira', '2307502'),
(993, 6, 'Limoeiro do Norte', '2307601'),
(994, 6, 'Madalena', '2307635'),
(995, 6, 'Maracanaú', '2307650'),
(996, 6, 'Maranguape', '2307700'),
(997, 6, 'Marco', '2307809'),
(998, 6, 'Martinópole', '2307908'),
(999, 6, 'Massapê', '2308005'),
(1000, 6, 'Mauriti', '2308104'),
(1001, 6, 'Meruoca', '2308203'),
(1002, 6, 'Milagres', '2308302'),
(1003, 6, 'Milhã', '2308351'),
(1004, 6, 'Miraíma', '2308377'),
(1005, 6, 'Missão Velha', '2308401'),
(1006, 6, 'Mombaça', '2308500'),
(1007, 6, 'Monsenhor Tabosa', '2308609'),
(1008, 6, 'Morada Nova', '2308708'),
(1009, 6, 'Moraújo', '2308807'),
(1010, 6, 'Morrinhos', '2308906'),
(1011, 6, 'Mucambo', '2309003'),
(1012, 6, 'Mulungu', '2309102'),
(1013, 6, 'Nova Olinda', '2309201'),
(1014, 6, 'Nova Russas', '2309300'),
(1015, 6, 'Novo Oriente', '2309409'),
(1016, 6, 'Ocara', '2309458'),
(1017, 6, 'Orós', '2309508'),
(1018, 6, 'Pacajus', '2309607'),
(1019, 6, 'Pacatuba', '2309706'),
(1020, 6, 'Pacoti', '2309805'),
(1021, 6, 'Pacujá', '2309904'),
(1022, 6, 'Palhano', '2310001'),
(1023, 6, 'Palmácia', '2310100'),
(1024, 6, 'Paracuru', '2310209'),
(1025, 6, 'Paraipaba', '2310258'),
(1026, 6, 'Parambu', '2310308'),
(1027, 6, 'Paramoti', '2310407'),
(1028, 6, 'Pedra Branca', '2310506'),
(1029, 6, 'Penaforte', '2310605'),
(1030, 6, 'Pentecoste', '2310704'),
(1031, 6, 'Pereiro', '2310803'),
(1032, 6, 'Pindoretama', '2310852'),
(1033, 6, 'Piquet Carneiro', '2310902'),
(1034, 6, 'Pires Ferreira', '2310951'),
(1035, 6, 'Poranga', '2311009'),
(1036, 6, 'Porteiras', '2311108'),
(1037, 6, 'Potengi', '2311207'),
(1038, 6, 'Potiretama', '2311231'),
(1039, 6, 'Quiterianópolis', '2311264'),
(1040, 6, 'Quixadá', '2311306'),
(1041, 6, 'Quixelô', '2311355'),
(1042, 6, 'Quixeramobim', '2311405'),
(1043, 6, 'Quixeré', '2311504'),
(1044, 6, 'Redenção', '2311603'),
(1045, 6, 'Reriutaba', '2311702'),
(1046, 6, 'Russas', '2311801'),
(1047, 6, 'Saboeiro', '2311900'),
(1048, 6, 'Salitre', '2311959'),
(1049, 6, 'Santana do Acaraú', '2312007'),
(1050, 6, 'Santana do Cariri', '2312106'),
(1051, 6, 'Santa Quitéria', '2312205'),
(1052, 6, 'São Benedito', '2312304'),
(1053, 6, 'São Gonçalo do Amarante', '2312403'),
(1054, 6, 'São João do Jaguaribe', '2312502'),
(1055, 6, 'São Luís do Curu', '2312601'),
(1056, 6, 'Senador Pompeu', '2312700'),
(1057, 6, 'Senador Sá', '2312809'),
(1058, 6, 'Sobral', '2312908'),
(1059, 6, 'Solonópole', '2313005'),
(1060, 6, 'Tabuleiro do Norte', '2313104'),
(1061, 6, 'Tamboril', '2313203'),
(1062, 6, 'Tarrafas', '2313252'),
(1063, 6, 'Tauá', '2313302'),
(1064, 6, 'Tejuçuoca', '2313351'),
(1065, 6, 'Tianguá', '2313401'),
(1066, 6, 'Trairi', '2313500'),
(1067, 6, 'Tururu', '2313559'),
(1068, 6, 'Ubajara', '2313609'),
(1069, 6, 'Umari', '2313708'),
(1070, 6, 'Umirim', '2313757'),
(1071, 6, 'Uruburetama', '2313807'),
(1072, 6, 'Uruoca', '2313906'),
(1073, 6, 'Varjota', '2313955'),
(1074, 6, 'Várzea Alegre', '2314003'),
(1075, 6, 'Viçosa do Ceará', '2314102'),
(1076, 20, 'Acari', '2400109'),
(1077, 20, 'Açu', '2400208'),
(1078, 20, 'Afonso Bezerra', '2400307'),
(1079, 20, 'Água Nova', '2400406'),
(1080, 20, 'Alexandria', '2400505'),
(1081, 20, 'Almino Afonso', '2400604'),
(1082, 20, 'Alto do Rodrigues', '2400703'),
(1083, 20, 'Angicos', '2400802'),
(1084, 20, 'Antônio Martins', '2400901'),
(1085, 20, 'Apodi', '2401008'),
(1086, 20, 'Areia Branca', '2401107'),
(1087, 20, 'Arês', '2401206'),
(1088, 20, 'Augusto Severo', '2401305'),
(1089, 20, 'Baía Formosa', '2401404'),
(1090, 20, 'Baraúna', '2401453'),
(1091, 20, 'Barcelona', '2401503'),
(1092, 20, 'Bento Fernandes', '2401602'),
(1093, 20, 'Bodó', '2401651'),
(1094, 20, 'Bom Jesus', '2401701'),
(1095, 20, 'Brejinho', '2401800'),
(1096, 20, 'Caiçara do Norte', '2401859'),
(1097, 20, 'Caiçara do Rio do Vento', '2401909'),
(1098, 20, 'Caicó', '2402006'),
(1099, 20, 'Campo Redondo', '2402105'),
(1100, 20, 'Canguaretama', '2402204'),
(1101, 20, 'Caraúbas', '2402303'),
(1102, 20, 'Carnaúba dos Dantas', '2402402'),
(1103, 20, 'Carnaubais', '2402501'),
(1104, 20, 'Ceará-Mirim', '2402600'),
(1105, 20, 'Cerro Corá', '2402709'),
(1106, 20, 'Coronel Ezequiel', '2402808'),
(1107, 20, 'Coronel João Pessoa', '2402907'),
(1108, 20, 'Cruzeta', '2403004'),
(1109, 20, 'Currais Novos', '2403103'),
(1110, 20, 'Doutor Severiano', '2403202'),
(1111, 20, 'Parnamirim', '2403251'),
(1112, 20, 'Encanto', '2403301'),
(1113, 20, 'Equador', '2403400'),
(1114, 20, 'Espírito Santo', '2403509'),
(1115, 20, 'Extremoz', '2403608'),
(1116, 20, 'Felipe Guerra', '2403707'),
(1117, 20, 'Fernando Pedroza', '2403756'),
(1118, 20, 'Florânia', '2403806'),
(1119, 20, 'Francisco Dantas', '2403905'),
(1120, 20, 'Frutuoso Gomes', '2404002'),
(1121, 20, 'Galinhos', '2404101'),
(1122, 20, 'Goianinha', '2404200'),
(1123, 20, 'Governador Dix-Sept Rosado', '2404309'),
(1124, 20, 'Grossos', '2404408'),
(1125, 20, 'Guamaré', '2404507'),
(1126, 20, 'Ielmo Marinho', '2404606'),
(1127, 20, 'Ipanguaçu', '2404705'),
(1128, 20, 'Ipueira', '2404804'),
(1129, 20, 'Itajá', '2404853'),
(1130, 20, 'Itaú', '2404903'),
(1131, 20, 'Jaçanã', '2405009'),
(1132, 20, 'Jandaíra', '2405108'),
(1133, 20, 'Janduís', '2405207'),
(1134, 20, 'Januário Cicco', '2405306'),
(1135, 20, 'Japi', '2405405'),
(1136, 20, 'Jardim de Angicos', '2405504'),
(1137, 20, 'Jardim de Piranhas', '2405603'),
(1138, 20, 'Jardim do Seridó', '2405702'),
(1139, 20, 'João Câmara', '2405801'),
(1140, 20, 'João Dias', '2405900'),
(1141, 20, 'José da Penha', '2406007'),
(1142, 20, 'Jucurutu', '2406106'),
(1143, 20, 'Jundiá', '2406155'),
(1144, 20, 'Lagoa d\'Anta', '2406205'),
(1145, 20, 'Lagoa de Pedras', '2406304'),
(1146, 20, 'Lagoa de Velhos', '2406403'),
(1147, 20, 'Lagoa Nova', '2406502'),
(1148, 20, 'Lagoa Salgada', '2406601'),
(1149, 20, 'Lajes', '2406700'),
(1150, 20, 'Lajes Pintadas', '2406809'),
(1151, 20, 'Lucrécia', '2406908'),
(1152, 20, 'Luís Gomes', '2407005'),
(1153, 20, 'Macaíba', '2407104'),
(1154, 20, 'Macau', '2407203'),
(1155, 20, 'Major Sales', '2407252'),
(1156, 20, 'Marcelino Vieira', '2407302'),
(1157, 20, 'Martins', '2407401'),
(1158, 20, 'Maxaranguape', '2407500'),
(1159, 20, 'Messias Targino', '2407609'),
(1160, 20, 'Montanhas', '2407708'),
(1161, 20, 'Monte Alegre', '2407807'),
(1162, 20, 'Monte das Gameleiras', '2407906'),
(1163, 20, 'Mossoró', '2408003'),
(1164, 20, 'Natal', '2408102'),
(1165, 20, 'Nísia Floresta', '2408201'),
(1166, 20, 'Nova Cruz', '2408300'),
(1167, 20, 'Olho-d\'Água do Borges', '2408409'),
(1168, 20, 'Ouro Branco', '2408508'),
(1169, 20, 'Paraná', '2408607'),
(1170, 20, 'Paraú', '2408706'),
(1171, 20, 'Parazinho', '2408805'),
(1172, 20, 'Parelhas', '2408904'),
(1173, 20, 'Rio do Fogo', '2408953'),
(1174, 20, 'Passa e Fica', '2409100'),
(1175, 20, 'Passagem', '2409209'),
(1176, 20, 'Patu', '2409308'),
(1177, 20, 'Santa Maria', '2409332'),
(1178, 20, 'Pau dos Ferros', '2409407'),
(1179, 20, 'Pedra Grande', '2409506'),
(1180, 20, 'Pedra Preta', '2409605'),
(1181, 20, 'Pedro Avelino', '2409704'),
(1182, 20, 'Pedro Velho', '2409803'),
(1183, 20, 'Pendências', '2409902'),
(1184, 20, 'Pilões', '2410009'),
(1185, 20, 'Poço Branco', '2410108'),
(1186, 20, 'Portalegre', '2410207'),
(1187, 20, 'Porto do Mangue', '2410256'),
(1188, 20, 'Serra Caiada', '2410306'),
(1189, 20, 'Pureza', '2410405'),
(1190, 20, 'Rafael Fernandes', '2410504'),
(1191, 20, 'Rafael Godeiro', '2410603'),
(1192, 20, 'Riacho da Cruz', '2410702'),
(1193, 20, 'Riacho de Santana', '2410801'),
(1194, 20, 'Riachuelo', '2410900'),
(1195, 20, 'Rodolfo Fernandes', '2411007'),
(1196, 20, 'Tibau', '2411056'),
(1197, 20, 'Ruy Barbosa', '2411106'),
(1198, 20, 'Santa Cruz', '2411205'),
(1199, 20, 'Santana do Matos', '2411403'),
(1200, 20, 'Santana do Seridó', '2411429'),
(1201, 20, 'Santo Antônio', '2411502'),
(1202, 20, 'São Bento do Norte', '2411601'),
(1203, 20, 'São Bento do Trairí', '2411700'),
(1204, 20, 'São Fernando', '2411809'),
(1205, 20, 'São Francisco do Oeste', '2411908'),
(1206, 20, 'São Gonçalo do Amarante', '2412005'),
(1207, 20, 'São João do Sabugi', '2412104'),
(1208, 20, 'São José de Mipibu', '2412203'),
(1209, 20, 'São José do Campestre', '2412302'),
(1210, 20, 'São José do Seridó', '2412401'),
(1211, 20, 'São Miguel', '2412500'),
(1212, 20, 'São Miguel do Gostoso', '2412559'),
(1213, 20, 'São Paulo do Potengi', '2412609'),
(1214, 20, 'São Pedro', '2412708'),
(1215, 20, 'São Rafael', '2412807'),
(1216, 20, 'São Tomé', '2412906'),
(1217, 20, 'São Vicente', '2413003'),
(1218, 20, 'Senador Elói de Souza', '2413102'),
(1219, 20, 'Senador Georgino Avelino', '2413201'),
(1220, 20, 'Serra de São Bento', '2413300'),
(1221, 20, 'Serra do Mel', '2413359'),
(1222, 20, 'Serra Negra do Norte', '2413409'),
(1223, 20, 'Serrinha', '2413508'),
(1224, 20, 'Serrinha dos Pintos', '2413557'),
(1225, 20, 'Severiano Melo', '2413607'),
(1226, 20, 'Sítio Novo', '2413706'),
(1227, 20, 'Taboleiro Grande', '2413805'),
(1228, 20, 'Taipu', '2413904'),
(1229, 20, 'Tangará', '2414001'),
(1230, 20, 'Tenente Ananias', '2414100'),
(1231, 20, 'Tenente Laurentino Cruz', '2414159'),
(1232, 20, 'Tibau do Sul', '2414209'),
(1233, 20, 'Timbaúba dos Batistas', '2414308'),
(1234, 20, 'Touros', '2414407'),
(1235, 20, 'Triunfo Potiguar', '2414456'),
(1236, 20, 'Umarizal', '2414506'),
(1237, 20, 'Upanema', '2414605'),
(1238, 20, 'Várzea', '2414704'),
(1239, 20, 'Venha-Ver', '2414753'),
(1240, 20, 'Vera Cruz', '2414803'),
(1241, 20, 'Viçosa', '2414902'),
(1242, 20, 'Vila Flor', '2415008'),
(1243, 15, 'Água Branca', '2500106'),
(1244, 15, 'Aguiar', '2500205'),
(1245, 15, 'Alagoa Grande', '2500304'),
(1246, 15, 'Alagoa Nova', '2500403'),
(1247, 15, 'Alagoinha', '2500502'),
(1248, 15, 'Alcantil', '2500536'),
(1249, 15, 'Algodão de Jandaíra', '2500577'),
(1250, 15, 'Alhandra', '2500601'),
(1251, 15, 'São João do Rio do Peixe', '2500700'),
(1252, 15, 'Amparo', '2500734'),
(1253, 15, 'Aparecida', '2500775'),
(1254, 15, 'Araçagi', '2500809'),
(1255, 15, 'Arara', '2500908'),
(1256, 15, 'Araruna', '2501005'),
(1257, 15, 'Areia', '2501104'),
(1258, 15, 'Areia de Baraúnas', '2501153'),
(1259, 15, 'Areial', '2501203'),
(1260, 15, 'Aroeiras', '2501302'),
(1261, 15, 'Assunção', '2501351'),
(1262, 15, 'Baía da Traição', '2501401'),
(1263, 15, 'Bananeiras', '2501500'),
(1264, 15, 'Baraúna', '2501534'),
(1265, 15, 'Barra de Santana', '2501575'),
(1266, 15, 'Barra de Santa Rosa', '2501609'),
(1267, 15, 'Barra de São Miguel', '2501708'),
(1268, 15, 'Bayeux', '2501807'),
(1269, 15, 'Belém', '2501906'),
(1270, 15, 'Belém do Brejo do Cruz', '2502003'),
(1271, 15, 'Bernardino Batista', '2502052'),
(1272, 15, 'Boa Ventura', '2502102'),
(1273, 15, 'Boa Vista', '2502151'),
(1274, 15, 'Bom Jesus', '2502201'),
(1275, 15, 'Bom Sucesso', '2502300'),
(1276, 15, 'Bonito de Santa Fé', '2502409'),
(1277, 15, 'Boqueirão', '2502508'),
(1278, 15, 'Igaracy', '2502607'),
(1279, 15, 'Borborema', '2502706'),
(1280, 15, 'Brejo do Cruz', '2502805'),
(1281, 15, 'Brejo dos Santos', '2502904'),
(1282, 15, 'Caaporã', '2503001'),
(1283, 15, 'Cabaceiras', '2503100'),
(1284, 15, 'Cabedelo', '2503209'),
(1285, 15, 'Cachoeira dos Índios', '2503308'),
(1286, 15, 'Cacimba de Areia', '2503407'),
(1287, 15, 'Cacimba de Dentro', '2503506'),
(1288, 15, 'Cacimbas', '2503555'),
(1289, 15, 'Caiçara', '2503605'),
(1290, 15, 'Cajazeiras', '2503704'),
(1291, 15, 'Cajazeirinhas', '2503753'),
(1292, 15, 'Caldas Brandão', '2503803'),
(1293, 15, 'Camalaú', '2503902'),
(1294, 15, 'Campina Grande', '2504009'),
(1295, 15, 'Capim', '2504033'),
(1296, 15, 'Caraúbas', '2504074'),
(1297, 15, 'Carrapateira', '2504108'),
(1298, 15, 'Casserengue', '2504157'),
(1299, 15, 'Catingueira', '2504207'),
(1300, 15, 'Catolé do Rocha', '2504306'),
(1301, 15, 'Caturité', '2504355'),
(1302, 15, 'Conceição', '2504405'),
(1303, 15, 'Condado', '2504504'),
(1304, 15, 'Conde', '2504603'),
(1305, 15, 'Congo', '2504702'),
(1306, 15, 'Coremas', '2504801'),
(1307, 15, 'Coxixola', '2504850'),
(1308, 15, 'Cruz do Espírito Santo', '2504900'),
(1309, 15, 'Cubati', '2505006'),
(1310, 15, 'Cuité', '2505105'),
(1311, 15, 'Cuitegi', '2505204'),
(1312, 15, 'Cuité de Mamanguape', '2505238'),
(1313, 15, 'Curral de Cima', '2505279'),
(1314, 15, 'Curral Velho', '2505303'),
(1315, 15, 'Damião', '2505352'),
(1316, 15, 'Desterro', '2505402'),
(1317, 15, 'Vista Serrana', '2505501'),
(1318, 15, 'Diamante', '2505600'),
(1319, 15, 'Dona Inês', '2505709'),
(1320, 15, 'Duas Estradas', '2505808'),
(1321, 15, 'Emas', '2505907'),
(1322, 15, 'Esperança', '2506004'),
(1323, 15, 'Fagundes', '2506103'),
(1324, 15, 'Frei Martinho', '2506202'),
(1325, 15, 'Gado Bravo', '2506251'),
(1326, 15, 'Guarabira', '2506301'),
(1327, 15, 'Gurinhém', '2506400'),
(1328, 15, 'Gurjão', '2506509'),
(1329, 15, 'Ibiara', '2506608'),
(1330, 15, 'Imaculada', '2506707'),
(1331, 15, 'Ingá', '2506806'),
(1332, 15, 'Itabaiana', '2506905'),
(1333, 15, 'Itaporanga', '2507002'),
(1334, 15, 'Itapororoca', '2507101'),
(1335, 15, 'Itatuba', '2507200'),
(1336, 15, 'Jacaraú', '2507309'),
(1337, 15, 'Jericó', '2507408'),
(1338, 15, 'João Pessoa', '2507507'),
(1339, 15, 'Juarez Távora', '2507606'),
(1340, 15, 'Juazeirinho', '2507705'),
(1341, 15, 'Junco do Seridó', '2507804'),
(1342, 15, 'Juripiranga', '2507903'),
(1343, 15, 'Juru', '2508000'),
(1344, 15, 'Lagoa', '2508109'),
(1345, 15, 'Lagoa de Dentro', '2508208'),
(1346, 15, 'Lagoa Seca', '2508307'),
(1347, 15, 'Lastro', '2508406'),
(1348, 15, 'Livramento', '2508505'),
(1349, 15, 'Logradouro', '2508554'),
(1350, 15, 'Lucena', '2508604'),
(1351, 15, 'Mãe d\'Água', '2508703'),
(1352, 15, 'Malta', '2508802'),
(1353, 15, 'Mamanguape', '2508901'),
(1354, 15, 'Manaíra', '2509008'),
(1355, 15, 'Marcação', '2509057'),
(1356, 15, 'Mari', '2509107'),
(1357, 15, 'Marizópolis', '2509156'),
(1358, 15, 'Massaranduba', '2509206'),
(1359, 15, 'Mataraca', '2509305'),
(1360, 15, 'Matinhas', '2509339'),
(1361, 15, 'Mato Grosso', '2509370'),
(1362, 15, 'Maturéia', '2509396'),
(1363, 15, 'Mogeiro', '2509404'),
(1364, 15, 'Montadas', '2509503'),
(1365, 15, 'Monte Horebe', '2509602'),
(1366, 15, 'Monteiro', '2509701'),
(1367, 15, 'Mulungu', '2509800'),
(1368, 15, 'Natuba', '2509909'),
(1369, 15, 'Nazarezinho', '2510006'),
(1370, 15, 'Nova Floresta', '2510105'),
(1371, 15, 'Nova Olinda', '2510204'),
(1372, 15, 'Nova Palmeira', '2510303'),
(1373, 15, 'Olho d\'Água', '2510402'),
(1374, 15, 'Olivedos', '2510501'),
(1375, 15, 'Ouro Velho', '2510600'),
(1376, 15, 'Parari', '2510659'),
(1377, 15, 'Passagem', '2510709'),
(1378, 15, 'Patos', '2510808'),
(1379, 15, 'Paulista', '2510907'),
(1380, 15, 'Pedra Branca', '2511004'),
(1381, 15, 'Pedra Lavrada', '2511103');
INSERT INTO `cidade` (`id_cidade`, `id_estado`, `nome_cidade`, `ibge_cidade`) VALUES
(1382, 15, 'Pedras de Fogo', '2511202'),
(1383, 15, 'Piancó', '2511301'),
(1384, 15, 'Picuí', '2511400'),
(1385, 15, 'Pilar', '2511509'),
(1386, 15, 'Pilões', '2511608'),
(1387, 15, 'Pilõezinhos', '2511707'),
(1388, 15, 'Pirpirituba', '2511806'),
(1389, 15, 'Pitimbu', '2511905'),
(1390, 15, 'Pocinhos', '2512002'),
(1391, 15, 'Poço Dantas', '2512036'),
(1392, 15, 'Poço de José de Moura', '2512077'),
(1393, 15, 'Pombal', '2512101'),
(1394, 15, 'Prata', '2512200'),
(1395, 15, 'Princesa Isabel', '2512309'),
(1396, 15, 'Puxinanã', '2512408'),
(1397, 15, 'Queimadas', '2512507'),
(1398, 15, 'Quixabá', '2512606'),
(1399, 15, 'Remígio', '2512705'),
(1400, 15, 'Pedro Régis', '2512721'),
(1401, 15, 'Riachão', '2512747'),
(1402, 15, 'Riachão do Bacamarte', '2512754'),
(1403, 15, 'Riachão do Poço', '2512762'),
(1404, 15, 'Riacho de Santo Antônio', '2512788'),
(1405, 15, 'Riacho dos Cavalos', '2512804'),
(1406, 15, 'Rio Tinto', '2512903'),
(1407, 15, 'Salgadinho', '2513000'),
(1408, 15, 'Salgado de São Félix', '2513109'),
(1409, 15, 'Santa Cecília', '2513158'),
(1410, 15, 'Santa Cruz', '2513208'),
(1411, 15, 'Santa Helena', '2513307'),
(1412, 15, 'Santa Inês', '2513356'),
(1413, 15, 'Santa Luzia', '2513406'),
(1414, 15, 'Santana de Mangueira', '2513505'),
(1415, 15, 'Santana dos Garrotes', '2513604'),
(1416, 15, 'Joca Claudino', '2513653'),
(1417, 15, 'Santa Rita', '2513703'),
(1418, 15, 'Santa Teresinha', '2513802'),
(1419, 15, 'Santo André', '2513851'),
(1420, 15, 'São Bento', '2513901'),
(1421, 15, 'São Bentinho', '2513927'),
(1422, 15, 'São Domingos do Cariri', '2513943'),
(1423, 15, 'São Domingos', '2513968'),
(1424, 15, 'São Francisco', '2513984'),
(1425, 15, 'São João do Cariri', '2514008'),
(1426, 15, 'São João do Tigre', '2514107'),
(1427, 15, 'São José da Lagoa Tapada', '2514206'),
(1428, 15, 'São José de Caiana', '2514305'),
(1429, 15, 'São José de Espinharas', '2514404'),
(1430, 15, 'São José dos Ramos', '2514453'),
(1431, 15, 'São José de Piranhas', '2514503'),
(1432, 15, 'São José de Princesa', '2514552'),
(1433, 15, 'São José do Bonfim', '2514602'),
(1434, 15, 'São José do Brejo do Cruz', '2514651'),
(1435, 15, 'São José do Sabugi', '2514701'),
(1436, 15, 'São José dos Cordeiros', '2514800'),
(1437, 15, 'São Mamede', '2514909'),
(1438, 15, 'São Miguel de Taipu', '2515005'),
(1439, 15, 'São Sebastião de Lagoa de Roça', '2515104'),
(1440, 15, 'São Sebastião do Umbuzeiro', '2515203'),
(1441, 15, 'Sapé', '2515302'),
(1442, 15, 'São Vicente do Seridó', '2515401'),
(1443, 15, 'Serra Branca', '2515500'),
(1444, 15, 'Serra da Raiz', '2515609'),
(1445, 15, 'Serra Grande', '2515708'),
(1446, 15, 'Serra Redonda', '2515807'),
(1447, 15, 'Serraria', '2515906'),
(1448, 15, 'Sertãozinho', '2515930'),
(1449, 15, 'Sobrado', '2515971'),
(1450, 15, 'Solânea', '2516003'),
(1451, 15, 'Soledade', '2516102'),
(1452, 15, 'Sossêgo', '2516151'),
(1453, 15, 'Sousa', '2516201'),
(1454, 15, 'Sumé', '2516300'),
(1455, 15, 'Tacima', '2516409'),
(1456, 15, 'Taperoá', '2516508'),
(1457, 15, 'Tavares', '2516607'),
(1458, 15, 'Teixeira', '2516706'),
(1459, 15, 'Tenório', '2516755'),
(1460, 15, 'Triunfo', '2516805'),
(1461, 15, 'Uiraúna', '2516904'),
(1462, 15, 'Umbuzeiro', '2517001'),
(1463, 15, 'Várzea', '2517100'),
(1464, 15, 'Vieirópolis', '2517209'),
(1465, 15, 'Zabelê', '2517407'),
(1466, 17, 'Abreu e Lima', '2600054'),
(1467, 17, 'Afogados da Ingazeira', '2600104'),
(1468, 17, 'Afrânio', '2600203'),
(1469, 17, 'Agrestina', '2600302'),
(1470, 17, 'Água Preta', '2600401'),
(1471, 17, 'Águas Belas', '2600500'),
(1472, 17, 'Alagoinha', '2600609'),
(1473, 17, 'Aliança', '2600708'),
(1474, 17, 'Altinho', '2600807'),
(1475, 17, 'Amaraji', '2600906'),
(1476, 17, 'Angelim', '2601003'),
(1477, 17, 'Araçoiaba', '2601052'),
(1478, 17, 'Araripina', '2601102'),
(1479, 17, 'Arcoverde', '2601201'),
(1480, 17, 'Barra de Guabiraba', '2601300'),
(1481, 17, 'Barreiros', '2601409'),
(1482, 17, 'Belém de Maria', '2601508'),
(1483, 17, 'Belém do São Francisco', '2601607'),
(1484, 17, 'Belo Jardim', '2601706'),
(1485, 17, 'Betânia', '2601805'),
(1486, 17, 'Bezerros', '2601904'),
(1487, 17, 'Bodocó', '2602001'),
(1488, 17, 'Bom Conselho', '2602100'),
(1489, 17, 'Bom Jardim', '2602209'),
(1490, 17, 'Bonito', '2602308'),
(1491, 17, 'Brejão', '2602407'),
(1492, 17, 'Brejinho', '2602506'),
(1493, 17, 'Brejo da Madre de Deus', '2602605'),
(1494, 17, 'Buenos Aires', '2602704'),
(1495, 17, 'Buíque', '2602803'),
(1496, 17, 'Cabo de Santo Agostinho', '2602902'),
(1497, 17, 'Cabrobó', '2603009'),
(1498, 17, 'Cachoeirinha', '2603108'),
(1499, 17, 'Caetés', '2603207'),
(1500, 17, 'Calçado', '2603306'),
(1501, 17, 'Calumbi', '2603405'),
(1502, 17, 'Camaragibe', '2603454'),
(1503, 17, 'Camocim de São Félix', '2603504'),
(1504, 17, 'Camutanga', '2603603'),
(1505, 17, 'Canhotinho', '2603702'),
(1506, 17, 'Capoeiras', '2603801'),
(1507, 17, 'Carnaíba', '2603900'),
(1508, 17, 'Carnaubeira da Penha', '2603926'),
(1509, 17, 'Carpina', '2604007'),
(1510, 17, 'Caruaru', '2604106'),
(1511, 17, 'Casinhas', '2604155'),
(1512, 17, 'Catende', '2604205'),
(1513, 17, 'Cedro', '2604304'),
(1514, 17, 'Chã de Alegria', '2604403'),
(1515, 17, 'Chã Grande', '2604502'),
(1516, 17, 'Condado', '2604601'),
(1517, 17, 'Correntes', '2604700'),
(1518, 17, 'Cortês', '2604809'),
(1519, 17, 'Cumaru', '2604908'),
(1520, 17, 'Cupira', '2605004'),
(1521, 17, 'Custódia', '2605103'),
(1522, 17, 'Dormentes', '2605152'),
(1523, 17, 'Escada', '2605202'),
(1524, 17, 'Exu', '2605301'),
(1525, 17, 'Feira Nova', '2605400'),
(1526, 17, 'Fernando de Noronha', '2605459'),
(1527, 17, 'Ferreiros', '2605509'),
(1528, 17, 'Flores', '2605608'),
(1529, 17, 'Floresta', '2605707'),
(1530, 17, 'Frei Miguelinho', '2605806'),
(1531, 17, 'Gameleira', '2605905'),
(1532, 17, 'Garanhuns', '2606002'),
(1533, 17, 'Glória do Goitá', '2606101'),
(1534, 17, 'Goiana', '2606200'),
(1535, 17, 'Granito', '2606309'),
(1536, 17, 'Gravatá', '2606408'),
(1537, 17, 'Iati', '2606507'),
(1538, 17, 'Ibimirim', '2606606'),
(1539, 17, 'Ibirajuba', '2606705'),
(1540, 17, 'Igarassu', '2606804'),
(1541, 17, 'Iguaracy', '2606903'),
(1542, 17, 'Inajá', '2607000'),
(1543, 17, 'Ingazeira', '2607109'),
(1544, 17, 'Ipojuca', '2607208'),
(1545, 17, 'Ipubi', '2607307'),
(1546, 17, 'Itacuruba', '2607406'),
(1547, 17, 'Itaíba', '2607505'),
(1548, 17, 'Ilha de Itamaracá', '2607604'),
(1549, 17, 'Itambé', '2607653'),
(1550, 17, 'Itapetim', '2607703'),
(1551, 17, 'Itapissuma', '2607752'),
(1552, 17, 'Itaquitinga', '2607802'),
(1553, 17, 'Jaboatão dos Guararapes', '2607901'),
(1554, 17, 'Jaqueira', '2607950'),
(1555, 17, 'Jataúba', '2608008'),
(1556, 17, 'Jatobá', '2608057'),
(1557, 17, 'João Alfredo', '2608107'),
(1558, 17, 'Joaquim Nabuco', '2608206'),
(1559, 17, 'Jucati', '2608255'),
(1560, 17, 'Jupi', '2608305'),
(1561, 17, 'Jurema', '2608404'),
(1562, 17, 'Lagoa do Carro', '2608453'),
(1563, 17, 'Lagoa de Itaenga', '2608503'),
(1564, 17, 'Lagoa do Ouro', '2608602'),
(1565, 17, 'Lagoa dos Gatos', '2608701'),
(1566, 17, 'Lagoa Grande', '2608750'),
(1567, 17, 'Lajedo', '2608800'),
(1568, 17, 'Limoeiro', '2608909'),
(1569, 17, 'Macaparana', '2609006'),
(1570, 17, 'Machados', '2609105'),
(1571, 17, 'Manari', '2609154'),
(1572, 17, 'Maraial', '2609204'),
(1573, 17, 'Mirandiba', '2609303'),
(1574, 17, 'Moreno', '2609402'),
(1575, 17, 'Nazaré da Mata', '2609501'),
(1576, 17, 'Olinda', '2609600'),
(1577, 17, 'Orobó', '2609709'),
(1578, 17, 'Orocó', '2609808'),
(1579, 17, 'Ouricuri', '2609907'),
(1580, 17, 'Palmares', '2610004'),
(1581, 17, 'Palmeirina', '2610103'),
(1582, 17, 'Panelas', '2610202'),
(1583, 17, 'Paranatama', '2610301'),
(1584, 17, 'Parnamirim', '2610400'),
(1585, 17, 'Passira', '2610509'),
(1586, 17, 'Paudalho', '2610608'),
(1587, 17, 'Paulista', '2610707'),
(1588, 17, 'Pedra', '2610806'),
(1589, 17, 'Pesqueira', '2610905'),
(1590, 17, 'Petrolândia', '2611002'),
(1591, 17, 'Petrolina', '2611101'),
(1592, 17, 'Poção', '2611200'),
(1593, 17, 'Pombos', '2611309'),
(1594, 17, 'Primavera', '2611408'),
(1595, 17, 'Quipapá', '2611507'),
(1596, 17, 'Quixaba', '2611533'),
(1597, 17, 'Recife', '2611606'),
(1598, 17, 'Riacho das Almas', '2611705'),
(1599, 17, 'Ribeirão', '2611804'),
(1600, 17, 'Rio Formoso', '2611903'),
(1601, 17, 'Sairé', '2612000'),
(1602, 17, 'Salgadinho', '2612109'),
(1603, 17, 'Salgueiro', '2612208'),
(1604, 17, 'Saloá', '2612307'),
(1605, 17, 'Sanharó', '2612406'),
(1606, 17, 'Santa Cruz', '2612455'),
(1607, 17, 'Santa Cruz da Baixa Verde', '2612471'),
(1608, 17, 'Santa Cruz do Capibaribe', '2612505'),
(1609, 17, 'Santa Filomena', '2612554'),
(1610, 17, 'Santa Maria da Boa Vista', '2612604'),
(1611, 17, 'Santa Maria do Cambucá', '2612703'),
(1612, 17, 'Santa Terezinha', '2612802'),
(1613, 17, 'São Benedito do Sul', '2612901'),
(1614, 17, 'São Bento do Una', '2613008'),
(1615, 17, 'São Caitano', '2613107'),
(1616, 17, 'São João', '2613206'),
(1617, 17, 'São Joaquim do Monte', '2613305'),
(1618, 17, 'São José da Coroa Grande', '2613404'),
(1619, 17, 'São José do Belmonte', '2613503'),
(1620, 17, 'São José do Egito', '2613602'),
(1621, 17, 'São Lourenço da Mata', '2613701'),
(1622, 17, 'São Vicente Ferrer', '2613800'),
(1623, 17, 'Serra Talhada', '2613909'),
(1624, 17, 'Serrita', '2614006'),
(1625, 17, 'Sertânia', '2614105'),
(1626, 17, 'Sirinhaém', '2614204'),
(1627, 17, 'Moreilândia', '2614303'),
(1628, 17, 'Solidão', '2614402'),
(1629, 17, 'Surubim', '2614501'),
(1630, 17, 'Tabira', '2614600'),
(1631, 17, 'Tacaimbó', '2614709'),
(1632, 17, 'Tacaratu', '2614808'),
(1633, 17, 'Tamandaré', '2614857'),
(1634, 17, 'Taquaritinga do Norte', '2615003'),
(1635, 17, 'Terezinha', '2615102'),
(1636, 17, 'Terra Nova', '2615201'),
(1637, 17, 'Timbaúba', '2615300'),
(1638, 17, 'Toritama', '2615409'),
(1639, 17, 'Tracunhaém', '2615508'),
(1640, 17, 'Trindade', '2615607'),
(1641, 17, 'Triunfo', '2615706'),
(1642, 17, 'Tupanatinga', '2615805'),
(1643, 17, 'Tuparetama', '2615904'),
(1644, 17, 'Venturosa', '2616001'),
(1645, 17, 'Verdejante', '2616100'),
(1646, 17, 'Vertente do Lério', '2616183'),
(1647, 17, 'Vertentes', '2616209'),
(1648, 17, 'Vicência', '2616308'),
(1649, 17, 'Vitória de Santo Antão', '2616407'),
(1650, 17, 'Xexéu', '2616506'),
(1651, 2, 'Água Branca', '2700102'),
(1652, 2, 'Anadia', '2700201'),
(1653, 2, 'Arapiraca', '2700300'),
(1654, 2, 'Atalaia', '2700409'),
(1655, 2, 'Barra de Santo Antônio', '2700508'),
(1656, 2, 'Barra de São Miguel', '2700607'),
(1657, 2, 'Batalha', '2700706'),
(1658, 2, 'Belém', '2700805'),
(1659, 2, 'Belo Monte', '2700904'),
(1660, 2, 'Boca da Mata', '2701001'),
(1661, 2, 'Branquinha', '2701100'),
(1662, 2, 'Cacimbinhas', '2701209'),
(1663, 2, 'Cajueiro', '2701308'),
(1664, 2, 'Campestre', '2701357'),
(1665, 2, 'Campo Alegre', '2701407'),
(1666, 2, 'Campo Grande', '2701506'),
(1667, 2, 'Canapi', '2701605'),
(1668, 2, 'Capela', '2701704'),
(1669, 2, 'Carneiros', '2701803'),
(1670, 2, 'Chã Preta', '2701902'),
(1671, 2, 'Coité do Nóia', '2702009'),
(1672, 2, 'Colônia Leopoldina', '2702108'),
(1673, 2, 'Coqueiro Seco', '2702207'),
(1674, 2, 'Coruripe', '2702306'),
(1675, 2, 'Craíbas', '2702355'),
(1676, 2, 'Delmiro Gouveia', '2702405'),
(1677, 2, 'Dois Riachos', '2702504'),
(1678, 2, 'Estrela de Alagoas', '2702553'),
(1679, 2, 'Feira Grande', '2702603'),
(1680, 2, 'Feliz Deserto', '2702702'),
(1681, 2, 'Flexeiras', '2702801'),
(1682, 2, 'Girau do Ponciano', '2702900'),
(1683, 2, 'Ibateguara', '2703007'),
(1684, 2, 'Igaci', '2703106'),
(1685, 2, 'Igreja Nova', '2703205'),
(1686, 2, 'Inhapi', '2703304'),
(1687, 2, 'Jacaré dos Homens', '2703403'),
(1688, 2, 'Jacuípe', '2703502'),
(1689, 2, 'Japaratinga', '2703601'),
(1690, 2, 'Jaramataia', '2703700'),
(1691, 2, 'Jequiá da Praia', '2703759'),
(1692, 2, 'Joaquim Gomes', '2703809'),
(1693, 2, 'Jundiá', '2703908'),
(1694, 2, 'Junqueiro', '2704005'),
(1695, 2, 'Lagoa da Canoa', '2704104'),
(1696, 2, 'Limoeiro de Anadia', '2704203'),
(1697, 2, 'Maceió', '2704302'),
(1698, 2, 'Major Isidoro', '2704401'),
(1699, 2, 'Maragogi', '2704500'),
(1700, 2, 'Maravilha', '2704609'),
(1701, 2, 'Marechal Deodoro', '2704708'),
(1702, 2, 'Maribondo', '2704807'),
(1703, 2, 'Mar Vermelho', '2704906'),
(1704, 2, 'Mata Grande', '2705002'),
(1705, 2, 'Matriz de Camaragibe', '2705101'),
(1706, 2, 'Messias', '2705200'),
(1707, 2, 'Minador do Negrão', '2705309'),
(1708, 2, 'Monteirópolis', '2705408'),
(1709, 2, 'Murici', '2705507'),
(1710, 2, 'Novo Lino', '2705606'),
(1711, 2, 'Olho d\'Água das Flores', '2705705'),
(1712, 2, 'Olho d\'Água do Casado', '2705804'),
(1713, 2, 'Olho d\'Água Grande', '2705903'),
(1714, 2, 'Olivença', '2706000'),
(1715, 2, 'Ouro Branco', '2706109'),
(1716, 2, 'Palestina', '2706208'),
(1717, 2, 'Palmeira dos Índios', '2706307'),
(1718, 2, 'Pão de Açúcar', '2706406'),
(1719, 2, 'Pariconha', '2706422'),
(1720, 2, 'Paripueira', '2706448'),
(1721, 2, 'Passo de Camaragibe', '2706505'),
(1722, 2, 'Paulo Jacinto', '2706604'),
(1723, 2, 'Penedo', '2706703'),
(1724, 2, 'Piaçabuçu', '2706802'),
(1725, 2, 'Pilar', '2706901'),
(1726, 2, 'Pindoba', '2707008'),
(1727, 2, 'Piranhas', '2707107'),
(1728, 2, 'Poço das Trincheiras', '2707206'),
(1729, 2, 'Porto Calvo', '2707305'),
(1730, 2, 'Porto de Pedras', '2707404'),
(1731, 2, 'Porto Real do Colégio', '2707503'),
(1732, 2, 'Quebrangulo', '2707602'),
(1733, 2, 'Rio Largo', '2707701'),
(1734, 2, 'Roteiro', '2707800'),
(1735, 2, 'Santa Luzia do Norte', '2707909'),
(1736, 2, 'Santana do Ipanema', '2708006'),
(1737, 2, 'Santana do Mundaú', '2708105'),
(1738, 2, 'São Brás', '2708204'),
(1739, 2, 'São José da Laje', '2708303'),
(1740, 2, 'São José da Tapera', '2708402'),
(1741, 2, 'São Luís do Quitunde', '2708501'),
(1742, 2, 'São Miguel dos Campos', '2708600'),
(1743, 2, 'São Miguel dos Milagres', '2708709'),
(1744, 2, 'São Sebastião', '2708808'),
(1745, 2, 'Satuba', '2708907'),
(1746, 2, 'Senador Rui Palmeira', '2708956'),
(1747, 2, 'Tanque d\'Arca', '2709004'),
(1748, 2, 'Taquarana', '2709103'),
(1749, 2, 'Teotônio Vilela', '2709152'),
(1750, 2, 'Traipu', '2709202'),
(1751, 2, 'União dos Palmares', '2709301'),
(1752, 2, 'Viçosa', '2709400'),
(1753, 25, 'Amparo de São Francisco', '2800100'),
(1754, 25, 'Aquidabã', '2800209'),
(1755, 25, 'Aracaju', '2800308'),
(1756, 25, 'Arauá', '2800407'),
(1757, 25, 'Areia Branca', '2800506'),
(1758, 25, 'Barra dos Coqueiros', '2800605'),
(1759, 25, 'Boquim', '2800670'),
(1760, 25, 'Brejo Grande', '2800704'),
(1761, 25, 'Campo do Brito', '2801009'),
(1762, 25, 'Canhoba', '2801108'),
(1763, 25, 'Canindé de São Francisco', '2801207'),
(1764, 25, 'Capela', '2801306'),
(1765, 25, 'Carira', '2801405'),
(1766, 25, 'Carmópolis', '2801504'),
(1767, 25, 'Cedro de São João', '2801603'),
(1768, 25, 'Cristinápolis', '2801702'),
(1769, 25, 'Cumbe', '2801900'),
(1770, 25, 'Divina Pastora', '2802007'),
(1771, 25, 'Estância', '2802106'),
(1772, 25, 'Feira Nova', '2802205'),
(1773, 25, 'Frei Paulo', '2802304'),
(1774, 25, 'Gararu', '2802403'),
(1775, 25, 'General Maynard', '2802502'),
(1776, 25, 'Gracho Cardoso', '2802601'),
(1777, 25, 'Ilha das Flores', '2802700'),
(1778, 25, 'Indiaroba', '2802809'),
(1779, 25, 'Itabaiana', '2802908'),
(1780, 25, 'Itabaianinha', '2803005'),
(1781, 25, 'Itabi', '2803104'),
(1782, 25, 'Itaporanga d\'Ajuda', '2803203'),
(1783, 25, 'Japaratuba', '2803302'),
(1784, 25, 'Japoatã', '2803401'),
(1785, 25, 'Lagarto', '2803500'),
(1786, 25, 'Laranjeiras', '2803609'),
(1787, 25, 'Macambira', '2803708'),
(1788, 25, 'Malhada dos Bois', '2803807'),
(1789, 25, 'Malhador', '2803906'),
(1790, 25, 'Maruim', '2804003'),
(1791, 25, 'Moita Bonita', '2804102'),
(1792, 25, 'Monte Alegre de Sergipe', '2804201'),
(1793, 25, 'Muribeca', '2804300'),
(1794, 25, 'Neópolis', '2804409'),
(1795, 25, 'Nossa Senhora Aparecida', '2804458'),
(1796, 25, 'Nossa Senhora da Glória', '2804508'),
(1797, 25, 'Nossa Senhora das Dores', '2804607'),
(1798, 25, 'Nossa Senhora de Lourdes', '2804706'),
(1799, 25, 'Nossa Senhora do Socorro', '2804805'),
(1800, 25, 'Pacatuba', '2804904'),
(1801, 25, 'Pedra Mole', '2805000'),
(1802, 25, 'Pedrinhas', '2805109'),
(1803, 25, 'Pinhão', '2805208'),
(1804, 25, 'Pirambu', '2805307'),
(1805, 25, 'Poço Redondo', '2805406'),
(1806, 25, 'Poço Verde', '2805505'),
(1807, 25, 'Porto da Folha', '2805604'),
(1808, 25, 'Propriá', '2805703'),
(1809, 25, 'Riachão do Dantas', '2805802'),
(1810, 25, 'Riachuelo', '2805901'),
(1811, 25, 'Ribeirópolis', '2806008'),
(1812, 25, 'Rosário do Catete', '2806107'),
(1813, 25, 'Salgado', '2806206'),
(1814, 25, 'Santa Luzia do Itanhy', '2806305'),
(1815, 25, 'Santana do São Francisco', '2806404'),
(1816, 25, 'Santa Rosa de Lima', '2806503'),
(1817, 25, 'Santo Amaro das Brotas', '2806602'),
(1818, 25, 'São Cristóvão', '2806701'),
(1819, 25, 'São Domingos', '2806800'),
(1820, 25, 'São Francisco', '2806909'),
(1821, 25, 'São Miguel do Aleixo', '2807006'),
(1822, 25, 'Simão Dias', '2807105'),
(1823, 25, 'Siriri', '2807204'),
(1824, 25, 'Telha', '2807303'),
(1825, 25, 'Tobias Barreto', '2807402'),
(1826, 25, 'Tomar do Geru', '2807501'),
(1827, 25, 'Umbaúba', '2807600'),
(1828, 5, 'Abaíra', '2900108'),
(1829, 5, 'Abaré', '2900207'),
(1830, 5, 'Acajutiba', '2900306'),
(1831, 5, 'Adustina', '2900355'),
(1832, 5, 'Água Fria', '2900405'),
(1833, 5, 'Érico Cardoso', '2900504'),
(1834, 5, 'Aiquara', '2900603'),
(1835, 5, 'Alagoinhas', '2900702'),
(1836, 5, 'Alcobaça', '2900801'),
(1837, 5, 'Almadina', '2900900'),
(1838, 5, 'Amargosa', '2901007'),
(1839, 5, 'Amélia Rodrigues', '2901106'),
(1840, 5, 'América Dourada', '2901155'),
(1841, 5, 'Anagé', '2901205'),
(1842, 5, 'Andaraí', '2901304'),
(1843, 5, 'Andorinha', '2901353'),
(1844, 5, 'Angical', '2901403'),
(1845, 5, 'Anguera', '2901502'),
(1846, 5, 'Antas', '2901601'),
(1847, 5, 'Antônio Cardoso', '2901700'),
(1848, 5, 'Antônio Gonçalves', '2901809'),
(1849, 5, 'Aporá', '2901908'),
(1850, 5, 'Apuarema', '2901957'),
(1851, 5, 'Aracatu', '2902005'),
(1852, 5, 'Araças', '2902054'),
(1853, 5, 'Araci', '2902104'),
(1854, 5, 'Aramari', '2902203'),
(1855, 5, 'Arataca', '2902252'),
(1856, 5, 'Aratuípe', '2902302'),
(1857, 5, 'Aurelino Leal', '2902401'),
(1858, 5, 'Baianópolis', '2902500'),
(1859, 5, 'Baixa Grande', '2902609'),
(1860, 5, 'Banzaê', '2902658'),
(1861, 5, 'Barra', '2902708'),
(1862, 5, 'Barra da Estiva', '2902807'),
(1863, 5, 'Barra do Choça', '2902906'),
(1864, 5, 'Barra do Mendes', '2903003'),
(1865, 5, 'Barra do Rocha', '2903102'),
(1866, 5, 'Barreiras', '2903201'),
(1867, 5, 'Barro Alto', '2903235'),
(1868, 5, 'Barrocas', '2903276'),
(1869, 5, 'Barro Preto', '2903300'),
(1870, 5, 'Belmonte', '2903409'),
(1871, 5, 'Belo Campo', '2903508'),
(1872, 5, 'Biritinga', '2903607'),
(1873, 5, 'Boa Nova', '2903706'),
(1874, 5, 'Boa Vista do Tupim', '2903805'),
(1875, 5, 'Bom Jesus da Lapa', '2903904'),
(1876, 5, 'Bom Jesus da Serra', '2903953'),
(1877, 5, 'Boninal', '2904001'),
(1878, 5, 'Bonito', '2904050'),
(1879, 5, 'Boquira', '2904100'),
(1880, 5, 'Botuporã', '2904209'),
(1881, 5, 'Brejões', '2904308'),
(1882, 5, 'Brejolândia', '2904407'),
(1883, 5, 'Brotas de Macaúbas', '2904506'),
(1884, 5, 'Brumado', '2904605'),
(1885, 5, 'Buerarema', '2904704'),
(1886, 5, 'Buritirama', '2904753'),
(1887, 5, 'Caatiba', '2904803'),
(1888, 5, 'Cabaceiras do Paraguaçu', '2904852'),
(1889, 5, 'Cachoeira', '2904902'),
(1890, 5, 'Caculé', '2905008'),
(1891, 5, 'Caém', '2905107'),
(1892, 5, 'Caetanos', '2905156'),
(1893, 5, 'Caetité', '2905206'),
(1894, 5, 'Cafarnaum', '2905305'),
(1895, 5, 'Cairu', '2905404'),
(1896, 5, 'Caldeirão Grande', '2905503'),
(1897, 5, 'Camacan', '2905602'),
(1898, 5, 'Camaçari', '2905701'),
(1899, 5, 'Camamu', '2905800'),
(1900, 5, 'Campo Alegre de Lourdes', '2905909'),
(1901, 5, 'Campo Formoso', '2906006'),
(1902, 5, 'Canápolis', '2906105'),
(1903, 5, 'Canarana', '2906204'),
(1904, 5, 'Canavieiras', '2906303'),
(1905, 5, 'Candeal', '2906402'),
(1906, 5, 'Candeias', '2906501'),
(1907, 5, 'Candiba', '2906600'),
(1908, 5, 'Cândido Sales', '2906709'),
(1909, 5, 'Cansanção', '2906808'),
(1910, 5, 'Canudos', '2906824'),
(1911, 5, 'Capela do Alto Alegre', '2906857'),
(1912, 5, 'Capim Grosso', '2906873'),
(1913, 5, 'Caraíbas', '2906899'),
(1914, 5, 'Caravelas', '2906907'),
(1915, 5, 'Cardeal da Silva', '2907004'),
(1916, 5, 'Carinhanha', '2907103'),
(1917, 5, 'Casa Nova', '2907202'),
(1918, 5, 'Castro Alves', '2907301'),
(1919, 5, 'Catolândia', '2907400'),
(1920, 5, 'Catu', '2907509'),
(1921, 5, 'Caturama', '2907558'),
(1922, 5, 'Central', '2907608'),
(1923, 5, 'Chorrochó', '2907707'),
(1924, 5, 'Cícero Dantas', '2907806'),
(1925, 5, 'Cipó', '2907905'),
(1926, 5, 'Coaraci', '2908002'),
(1927, 5, 'Cocos', '2908101'),
(1928, 5, 'Conceição da Feira', '2908200'),
(1929, 5, 'Conceição do Almeida', '2908309'),
(1930, 5, 'Conceição do Coité', '2908408'),
(1931, 5, 'Conceição do Jacuípe', '2908507'),
(1932, 5, 'Conde', '2908606'),
(1933, 5, 'Condeúba', '2908705'),
(1934, 5, 'Contendas do Sincorá', '2908804'),
(1935, 5, 'Coração de Maria', '2908903'),
(1936, 5, 'Cordeiros', '2909000'),
(1937, 5, 'Coribe', '2909109'),
(1938, 5, 'Coronel João Sá', '2909208'),
(1939, 5, 'Correntina', '2909307'),
(1940, 5, 'Cotegipe', '2909406'),
(1941, 5, 'Cravolândia', '2909505'),
(1942, 5, 'Crisópolis', '2909604'),
(1943, 5, 'Cristópolis', '2909703'),
(1944, 5, 'Cruz das Almas', '2909802'),
(1945, 5, 'Curaçá', '2909901'),
(1946, 5, 'Dário Meira', '2910008'),
(1947, 5, 'Dias d\'Ávila', '2910057'),
(1948, 5, 'Dom Basílio', '2910107'),
(1949, 5, 'Dom Macedo Costa', '2910206'),
(1950, 5, 'Elísio Medrado', '2910305'),
(1951, 5, 'Encruzilhada', '2910404'),
(1952, 5, 'Entre Rios', '2910503'),
(1953, 5, 'Esplanada', '2910602'),
(1954, 5, 'Euclides da Cunha', '2910701'),
(1955, 5, 'Eunápolis', '2910727'),
(1956, 5, 'Fátima', '2910750'),
(1957, 5, 'Feira da Mata', '2910776'),
(1958, 5, 'Feira de Santana', '2910800'),
(1959, 5, 'Filadélfia', '2910859'),
(1960, 5, 'Firmino Alves', '2910909'),
(1961, 5, 'Floresta Azul', '2911006'),
(1962, 5, 'Formosa do Rio Preto', '2911105'),
(1963, 5, 'Gandu', '2911204'),
(1964, 5, 'Gavião', '2911253'),
(1965, 5, 'Gentio do Ouro', '2911303'),
(1966, 5, 'Glória', '2911402'),
(1967, 5, 'Gongogi', '2911501'),
(1968, 5, 'Governador Mangabeira', '2911600'),
(1969, 5, 'Guajeru', '2911659'),
(1970, 5, 'Guanambi', '2911709'),
(1971, 5, 'Guaratinga', '2911808'),
(1972, 5, 'Heliópolis', '2911857'),
(1973, 5, 'Iaçu', '2911907'),
(1974, 5, 'Ibiassucê', '2912004'),
(1975, 5, 'Ibicaraí', '2912103'),
(1976, 5, 'Ibicoara', '2912202'),
(1977, 5, 'Ibicuí', '2912301'),
(1978, 5, 'Ibipeba', '2912400'),
(1979, 5, 'Ibipitanga', '2912509'),
(1980, 5, 'Ibiquera', '2912608'),
(1981, 5, 'Ibirapitanga', '2912707'),
(1982, 5, 'Ibirapuã', '2912806'),
(1983, 5, 'Ibirataia', '2912905'),
(1984, 5, 'Ibitiara', '2913002'),
(1985, 5, 'Ibititá', '2913101'),
(1986, 5, 'Ibotirama', '2913200'),
(1987, 5, 'Ichu', '2913309'),
(1988, 5, 'Igaporã', '2913408'),
(1989, 5, 'Igrapiúna', '2913457'),
(1990, 5, 'Iguaí', '2913507'),
(1991, 5, 'Ilhéus', '2913606'),
(1992, 5, 'Inhambupe', '2913705'),
(1993, 5, 'Ipecaetá', '2913804'),
(1994, 5, 'Ipiaú', '2913903'),
(1995, 5, 'Ipirá', '2914000'),
(1996, 5, 'Ipupiara', '2914109'),
(1997, 5, 'Irajuba', '2914208'),
(1998, 5, 'Iramaia', '2914307'),
(1999, 5, 'Iraquara', '2914406'),
(2000, 5, 'Irará', '2914505'),
(2001, 5, 'Irecê', '2914604'),
(2002, 5, 'Itabela', '2914653'),
(2003, 5, 'Itaberaba', '2914703'),
(2004, 5, 'Itabuna', '2914802'),
(2005, 5, 'Itacaré', '2914901'),
(2006, 5, 'Itaeté', '2915007'),
(2007, 5, 'Itagi', '2915106'),
(2008, 5, 'Itagibá', '2915205'),
(2009, 5, 'Itagimirim', '2915304'),
(2010, 5, 'Itaguaçu da Bahia', '2915353'),
(2011, 5, 'Itaju do Colônia', '2915403'),
(2012, 5, 'Itajuípe', '2915502'),
(2013, 5, 'Itamaraju', '2915601'),
(2014, 5, 'Itamari', '2915700'),
(2015, 5, 'Itambé', '2915809'),
(2016, 5, 'Itanagra', '2915908'),
(2017, 5, 'Itanhém', '2916005'),
(2018, 5, 'Itaparica', '2916104'),
(2019, 5, 'Itapé', '2916203'),
(2020, 5, 'Itapebi', '2916302'),
(2021, 5, 'Itapetinga', '2916401'),
(2022, 5, 'Itapicuru', '2916500'),
(2023, 5, 'Itapitanga', '2916609'),
(2024, 5, 'Itaquara', '2916708'),
(2025, 5, 'Itarantim', '2916807'),
(2026, 5, 'Itatim', '2916856'),
(2027, 5, 'Itiruçu', '2916906'),
(2028, 5, 'Itiúba', '2917003'),
(2029, 5, 'Itororó', '2917102'),
(2030, 5, 'Ituaçu', '2917201'),
(2031, 5, 'Ituberá', '2917300'),
(2032, 5, 'Iuiú', '2917334'),
(2033, 5, 'Jaborandi', '2917359'),
(2034, 5, 'Jacaraci', '2917409'),
(2035, 5, 'Jacobina', '2917508'),
(2036, 5, 'Jaguaquara', '2917607'),
(2037, 5, 'Jaguarari', '2917706'),
(2038, 5, 'Jaguaripe', '2917805'),
(2039, 5, 'Jandaíra', '2917904'),
(2040, 5, 'Jequié', '2918001'),
(2041, 5, 'Jeremoabo', '2918100'),
(2042, 5, 'Jiquiriçá', '2918209'),
(2043, 5, 'Jitaúna', '2918308'),
(2044, 5, 'João Dourado', '2918357'),
(2045, 5, 'Juazeiro', '2918407'),
(2046, 5, 'Jucuruçu', '2918456'),
(2047, 5, 'Jussara', '2918506'),
(2048, 5, 'Jussari', '2918555'),
(2049, 5, 'Jussiape', '2918605'),
(2050, 5, 'Lafaiete Coutinho', '2918704'),
(2051, 5, 'Lagoa Real', '2918753'),
(2052, 5, 'Laje', '2918803'),
(2053, 5, 'Lajedão', '2918902'),
(2054, 5, 'Lajedinho', '2919009'),
(2055, 5, 'Lajedo do Tabocal', '2919058'),
(2056, 5, 'Lamarão', '2919108'),
(2057, 5, 'Lapão', '2919157'),
(2058, 5, 'Lauro de Freitas', '2919207'),
(2059, 5, 'Lençóis', '2919306'),
(2060, 5, 'Licínio de Almeida', '2919405'),
(2061, 5, 'Livramento de Nossa Senhora', '2919504'),
(2062, 5, 'Luís Eduardo Magalhães', '2919553'),
(2063, 5, 'Macajuba', '2919603'),
(2064, 5, 'Macarani', '2919702'),
(2065, 5, 'Macaúbas', '2919801'),
(2066, 5, 'Macururé', '2919900'),
(2067, 5, 'Madre de Deus', '2919926'),
(2068, 5, 'Maetinga', '2919959'),
(2069, 5, 'Maiquinique', '2920007'),
(2070, 5, 'Mairi', '2920106'),
(2071, 5, 'Malhada', '2920205'),
(2072, 5, 'Malhada de Pedras', '2920304'),
(2073, 5, 'Manoel Vitorino', '2920403'),
(2074, 5, 'Mansidão', '2920452'),
(2075, 5, 'Maracás', '2920502'),
(2076, 5, 'Maragogipe', '2920601'),
(2077, 5, 'Maraú', '2920700'),
(2078, 5, 'Marcionílio Souza', '2920809'),
(2079, 5, 'Mascote', '2920908'),
(2080, 5, 'Mata de São João', '2921005'),
(2081, 5, 'Matina', '2921054'),
(2082, 5, 'Medeiros Neto', '2921104'),
(2083, 5, 'Miguel Calmon', '2921203'),
(2084, 5, 'Milagres', '2921302'),
(2085, 5, 'Mirangaba', '2921401'),
(2086, 5, 'Mirante', '2921450'),
(2087, 5, 'Monte Santo', '2921500'),
(2088, 5, 'Morpará', '2921609'),
(2089, 5, 'Morro do Chapéu', '2921708'),
(2090, 5, 'Mortugaba', '2921807'),
(2091, 5, 'Mucugê', '2921906'),
(2092, 5, 'Mucuri', '2922003'),
(2093, 5, 'Mulungu do Morro', '2922052'),
(2094, 5, 'Mundo Novo', '2922102'),
(2095, 5, 'Muniz Ferreira', '2922201'),
(2096, 5, 'Muquém de São Francisco', '2922250'),
(2097, 5, 'Muritiba', '2922300'),
(2098, 5, 'Mutuípe', '2922409'),
(2099, 5, 'Nazaré', '2922508'),
(2100, 5, 'Nilo Peçanha', '2922607'),
(2101, 5, 'Nordestina', '2922656'),
(2102, 5, 'Nova Canaã', '2922706'),
(2103, 5, 'Nova Fátima', '2922730'),
(2104, 5, 'Nova Ibiá', '2922755'),
(2105, 5, 'Nova Itarana', '2922805'),
(2106, 5, 'Nova Redenção', '2922854'),
(2107, 5, 'Nova Soure', '2922904'),
(2108, 5, 'Nova Viçosa', '2923001'),
(2109, 5, 'Novo Horizonte', '2923035'),
(2110, 5, 'Novo Triunfo', '2923050'),
(2111, 5, 'Olindina', '2923100'),
(2112, 5, 'Oliveira dos Brejinhos', '2923209'),
(2113, 5, 'Ouriçangas', '2923308'),
(2114, 5, 'Ourolândia', '2923357'),
(2115, 5, 'Palmas de Monte Alto', '2923407'),
(2116, 5, 'Palmeiras', '2923506'),
(2117, 5, 'Paramirim', '2923605'),
(2118, 5, 'Paratinga', '2923704'),
(2119, 5, 'Paripiranga', '2923803'),
(2120, 5, 'Pau Brasil', '2923902'),
(2121, 5, 'Paulo Afonso', '2924009'),
(2122, 5, 'Pé de Serra', '2924058'),
(2123, 5, 'Pedrão', '2924108'),
(2124, 5, 'Pedro Alexandre', '2924207'),
(2125, 5, 'Piatã', '2924306'),
(2126, 5, 'Pilão Arcado', '2924405'),
(2127, 5, 'Pindaí', '2924504'),
(2128, 5, 'Pindobaçu', '2924603'),
(2129, 5, 'Pintadas', '2924652'),
(2130, 5, 'Piraí do Norte', '2924678'),
(2131, 5, 'Piripá', '2924702'),
(2132, 5, 'Piritiba', '2924801'),
(2133, 5, 'Planaltino', '2924900'),
(2134, 5, 'Planalto', '2925006'),
(2135, 5, 'Poções', '2925105'),
(2136, 5, 'Pojuca', '2925204'),
(2137, 5, 'Ponto Novo', '2925253'),
(2138, 5, 'Porto Seguro', '2925303'),
(2139, 5, 'Potiraguá', '2925402'),
(2140, 5, 'Prado', '2925501'),
(2141, 5, 'Presidente Dutra', '2925600'),
(2142, 5, 'Presidente Jânio Quadros', '2925709'),
(2143, 5, 'Presidente Tancredo Neves', '2925758'),
(2144, 5, 'Queimadas', '2925808'),
(2145, 5, 'Quijingue', '2925907'),
(2146, 5, 'Quixabeira', '2925931'),
(2147, 5, 'Rafael Jambeiro', '2925956'),
(2148, 5, 'Remanso', '2926004'),
(2149, 5, 'Retirolândia', '2926103'),
(2150, 5, 'Riachão das Neves', '2926202'),
(2151, 5, 'Riachão do Jacuípe', '2926301'),
(2152, 5, 'Riacho de Santana', '2926400'),
(2153, 5, 'Ribeira do Amparo', '2926509'),
(2154, 5, 'Ribeira do Pombal', '2926608'),
(2155, 5, 'Ribeirão do Largo', '2926657'),
(2156, 5, 'Rio de Contas', '2926707'),
(2157, 5, 'Rio do Antônio', '2926806'),
(2158, 5, 'Rio do Pires', '2926905'),
(2159, 5, 'Rio Real', '2927002'),
(2160, 5, 'Rodelas', '2927101'),
(2161, 5, 'Ruy Barbosa', '2927200'),
(2162, 5, 'Salinas da Margarida', '2927309'),
(2163, 5, 'Salvador', '2927408'),
(2164, 5, 'Santa Bárbara', '2927507'),
(2165, 5, 'Santa Brígida', '2927606'),
(2166, 5, 'Santa Cruz Cabrália', '2927705'),
(2167, 5, 'Santa Cruz da Vitória', '2927804'),
(2168, 5, 'Santa Inês', '2927903'),
(2169, 5, 'Santaluz', '2928000'),
(2170, 5, 'Santa Luzia', '2928059'),
(2171, 5, 'Santa Maria da Vitória', '2928109'),
(2172, 5, 'Santana', '2928208'),
(2173, 5, 'Santanópolis', '2928307'),
(2174, 5, 'Santa Rita de Cássia', '2928406'),
(2175, 5, 'Santa Teresinha', '2928505'),
(2176, 5, 'Santo Amaro', '2928604'),
(2177, 5, 'Santo Antônio de Jesus', '2928703'),
(2178, 5, 'Santo Estêvão', '2928802'),
(2179, 5, 'São Desidério', '2928901'),
(2180, 5, 'São Domingos', '2928950'),
(2181, 5, 'São Félix', '2929008'),
(2182, 5, 'São Félix do Coribe', '2929057'),
(2183, 5, 'São Felipe', '2929107'),
(2184, 5, 'São Francisco do Conde', '2929206'),
(2185, 5, 'São Gabriel', '2929255'),
(2186, 5, 'São Gonçalo dos Campos', '2929305'),
(2187, 5, 'São José da Vitória', '2929354'),
(2188, 5, 'São José do Jacuípe', '2929370'),
(2189, 5, 'São Miguel das Matas', '2929404'),
(2190, 5, 'São Sebastião do Passé', '2929503'),
(2191, 5, 'Sapeaçu', '2929602'),
(2192, 5, 'Sátiro Dias', '2929701'),
(2193, 5, 'Saubara', '2929750'),
(2194, 5, 'Saúde', '2929800'),
(2195, 5, 'Seabra', '2929909'),
(2196, 5, 'Sebastião Laranjeiras', '2930006'),
(2197, 5, 'Senhor do Bonfim', '2930105'),
(2198, 5, 'Serra do Ramalho', '2930154'),
(2199, 5, 'Sento Sé', '2930204'),
(2200, 5, 'Serra Dourada', '2930303'),
(2201, 5, 'Serra Preta', '2930402'),
(2202, 5, 'Serrinha', '2930501'),
(2203, 5, 'Serrolândia', '2930600'),
(2204, 5, 'Simões Filho', '2930709'),
(2205, 5, 'Sítio do Mato', '2930758'),
(2206, 5, 'Sítio do Quinto', '2930766'),
(2207, 5, 'Sobradinho', '2930774'),
(2208, 5, 'Souto Soares', '2930808'),
(2209, 5, 'Tabocas do Brejo Velho', '2930907'),
(2210, 5, 'Tanhaçu', '2931004'),
(2211, 5, 'Tanque Novo', '2931053'),
(2212, 5, 'Tanquinho', '2931103'),
(2213, 5, 'Taperoá', '2931202'),
(2214, 5, 'Tapiramutá', '2931301'),
(2215, 5, 'Teixeira de Freitas', '2931350'),
(2216, 5, 'Teodoro Sampaio', '2931400'),
(2217, 5, 'Teofilândia', '2931509'),
(2218, 5, 'Teolândia', '2931608'),
(2219, 5, 'Terra Nova', '2931707'),
(2220, 5, 'Tremedal', '2931806'),
(2221, 5, 'Tucano', '2931905'),
(2222, 5, 'Uauá', '2932002'),
(2223, 5, 'Ubaíra', '2932101'),
(2224, 5, 'Ubaitaba', '2932200'),
(2225, 5, 'Ubatã', '2932309'),
(2226, 5, 'Uibaí', '2932408'),
(2227, 5, 'Umburanas', '2932457'),
(2228, 5, 'Una', '2932507'),
(2229, 5, 'Urandi', '2932606'),
(2230, 5, 'Uruçuca', '2932705'),
(2231, 5, 'Utinga', '2932804'),
(2232, 5, 'Valença', '2932903'),
(2233, 5, 'Valente', '2933000'),
(2234, 5, 'Várzea da Roça', '2933059'),
(2235, 5, 'Várzea do Poço', '2933109'),
(2236, 5, 'Várzea Nova', '2933158'),
(2237, 5, 'Varzedo', '2933174'),
(2238, 5, 'Vera Cruz', '2933208'),
(2239, 5, 'Vereda', '2933257'),
(2240, 5, 'Vitória da Conquista', '2933307'),
(2241, 5, 'Wagner', '2933406'),
(2242, 5, 'Wanderley', '2933455'),
(2243, 5, 'Wenceslau Guimarães', '2933505'),
(2244, 5, 'Xique-Xique', '2933604'),
(2245, 13, 'Abadia dos Dourados', '3100104'),
(2246, 13, 'Abaeté', '3100203'),
(2247, 13, 'Abre Campo', '3100302'),
(2248, 13, 'Acaiaca', '3100401'),
(2249, 13, 'Açucena', '3100500'),
(2250, 13, 'Água Boa', '3100609'),
(2251, 13, 'Água Comprida', '3100708'),
(2252, 13, 'Aguanil', '3100807'),
(2253, 13, 'Águas Formosas', '3100906'),
(2254, 13, 'Águas Vermelhas', '3101003'),
(2255, 13, 'Aimorés', '3101102'),
(2256, 13, 'Aiuruoca', '3101201'),
(2257, 13, 'Alagoa', '3101300'),
(2258, 13, 'Albertina', '3101409'),
(2259, 13, 'Além Paraíba', '3101508'),
(2260, 13, 'Alfenas', '3101607'),
(2261, 13, 'Alfredo Vasconcelos', '3101631'),
(2262, 13, 'Almenara', '3101706'),
(2263, 13, 'Alpercata', '3101805'),
(2264, 13, 'Alpinópolis', '3101904'),
(2265, 13, 'Alterosa', '3102001'),
(2266, 13, 'Alto Caparaó', '3102050'),
(2267, 13, 'Alto Rio Doce', '3102100'),
(2268, 13, 'Alvarenga', '3102209'),
(2269, 13, 'Alvinópolis', '3102308'),
(2270, 13, 'Alvorada de Minas', '3102407'),
(2271, 13, 'Amparo do Serra', '3102506'),
(2272, 13, 'Andradas', '3102605'),
(2273, 13, 'Cachoeira de Pajeú', '3102704'),
(2274, 13, 'Andrelândia', '3102803'),
(2275, 13, 'Angelândia', '3102852'),
(2276, 13, 'Antônio Carlos', '3102902'),
(2277, 13, 'Antônio Dias', '3103009'),
(2278, 13, 'Antônio Prado de Minas', '3103108'),
(2279, 13, 'Araçaí', '3103207'),
(2280, 13, 'Aracitaba', '3103306'),
(2281, 13, 'Araçuaí', '3103405'),
(2282, 13, 'Araguari', '3103504'),
(2283, 13, 'Arantina', '3103603'),
(2284, 13, 'Araponga', '3103702'),
(2285, 13, 'Araporã', '3103751'),
(2286, 13, 'Arapuá', '3103801'),
(2287, 13, 'Araújos', '3103900'),
(2288, 13, 'Araxá', '3104007'),
(2289, 13, 'Arceburgo', '3104106'),
(2290, 13, 'Arcos', '3104205'),
(2291, 13, 'Areado', '3104304'),
(2292, 13, 'Argirita', '3104403'),
(2293, 13, 'Aricanduva', '3104452'),
(2294, 13, 'Arinos', '3104502'),
(2295, 13, 'Astolfo Dutra', '3104601'),
(2296, 13, 'Ataléia', '3104700'),
(2297, 13, 'Augusto de Lima', '3104809'),
(2298, 13, 'Baependi', '3104908'),
(2299, 13, 'Baldim', '3105004'),
(2300, 13, 'Bambuí', '3105103'),
(2301, 13, 'Bandeira', '3105202'),
(2302, 13, 'Bandeira do Sul', '3105301'),
(2303, 13, 'Barão de Cocais', '3105400'),
(2304, 13, 'Barão de Monte Alto', '3105509'),
(2305, 13, 'Barbacena', '3105608'),
(2306, 13, 'Barra Longa', '3105707'),
(2307, 13, 'Barroso', '3105905'),
(2308, 13, 'Bela Vista de Minas', '3106002'),
(2309, 13, 'Belmiro Braga', '3106101'),
(2310, 13, 'Belo Horizonte', '3106200'),
(2311, 13, 'Belo Oriente', '3106309'),
(2312, 13, 'Belo Vale', '3106408'),
(2313, 13, 'Berilo', '3106507'),
(2314, 13, 'Bertópolis', '3106606'),
(2315, 13, 'Berizal', '3106655'),
(2316, 13, 'Betim', '3106705'),
(2317, 13, 'Bias Fortes', '3106804'),
(2318, 13, 'Bicas', '3106903'),
(2319, 13, 'Biquinhas', '3107000'),
(2320, 13, 'Boa Esperança', '3107109'),
(2321, 13, 'Bocaina de Minas', '3107208'),
(2322, 13, 'Bocaiúva', '3107307'),
(2323, 13, 'Bom Despacho', '3107406'),
(2324, 13, 'Bom Jardim de Minas', '3107505'),
(2325, 13, 'Bom Jesus da Penha', '3107604'),
(2326, 13, 'Bom Jesus do Amparo', '3107703'),
(2327, 13, 'Bom Jesus do Galho', '3107802'),
(2328, 13, 'Bom Repouso', '3107901'),
(2329, 13, 'Bom Sucesso', '3108008'),
(2330, 13, 'Bonfim', '3108107'),
(2331, 13, 'Bonfinópolis de Minas', '3108206'),
(2332, 13, 'Bonito de Minas', '3108255'),
(2333, 13, 'Borda da Mata', '3108305'),
(2334, 13, 'Botelhos', '3108404'),
(2335, 13, 'Botumirim', '3108503'),
(2336, 13, 'Brasilândia de Minas', '3108552'),
(2337, 13, 'Brasília de Minas', '3108602'),
(2338, 13, 'Brás Pires', '3108701'),
(2339, 13, 'Braúnas', '3108800'),
(2340, 13, 'Brazópolis', '3108909'),
(2341, 13, 'Brumadinho', '3109006'),
(2342, 13, 'Bueno Brandão', '3109105'),
(2343, 13, 'Buenópolis', '3109204'),
(2344, 13, 'Bugre', '3109253'),
(2345, 13, 'Buritis', '3109303'),
(2346, 13, 'Buritizeiro', '3109402'),
(2347, 13, 'Cabeceira Grande', '3109451'),
(2348, 13, 'Cabo Verde', '3109501'),
(2349, 13, 'Cachoeira da Prata', '3109600'),
(2350, 13, 'Cachoeira de Minas', '3109709'),
(2351, 13, 'Cachoeira Dourada', '3109808'),
(2352, 13, 'Caetanópolis', '3109907'),
(2353, 13, 'Caeté', '3110004'),
(2354, 13, 'Caiana', '3110103'),
(2355, 13, 'Cajuri', '3110202'),
(2356, 13, 'Caldas', '3110301'),
(2357, 13, 'Camacho', '3110400'),
(2358, 13, 'Camanducaia', '3110509'),
(2359, 13, 'Cambuí', '3110608'),
(2360, 13, 'Cambuquira', '3110707'),
(2361, 13, 'Campanário', '3110806'),
(2362, 13, 'Campanha', '3110905'),
(2363, 13, 'Campestre', '3111002'),
(2364, 13, 'Campina Verde', '3111101'),
(2365, 13, 'Campo Azul', '3111150'),
(2366, 13, 'Campo Belo', '3111200'),
(2367, 13, 'Campo do Meio', '3111309'),
(2368, 13, 'Campo Florido', '3111408'),
(2369, 13, 'Campos Altos', '3111507'),
(2370, 13, 'Campos Gerais', '3111606'),
(2371, 13, 'Canaã', '3111705'),
(2372, 13, 'Canápolis', '3111804'),
(2373, 13, 'Cana Verde', '3111903'),
(2374, 13, 'Candeias', '3112000'),
(2375, 13, 'Cantagalo', '3112059'),
(2376, 13, 'Caparaó', '3112109'),
(2377, 13, 'Capela Nova', '3112208'),
(2378, 13, 'Capelinha', '3112307'),
(2379, 13, 'Capetinga', '3112406'),
(2380, 13, 'Capim Branco', '3112505'),
(2381, 13, 'Capinópolis', '3112604'),
(2382, 13, 'Capitão Andrade', '3112653'),
(2383, 13, 'Capitão Enéas', '3112703'),
(2384, 13, 'Capitólio', '3112802'),
(2385, 13, 'Caputira', '3112901'),
(2386, 13, 'Caraí', '3113008'),
(2387, 13, 'Caranaíba', '3113107'),
(2388, 13, 'Carandaí', '3113206'),
(2389, 13, 'Carangola', '3113305'),
(2390, 13, 'Caratinga', '3113404'),
(2391, 13, 'Carbonita', '3113503'),
(2392, 13, 'Careaçu', '3113602'),
(2393, 13, 'Carlos Chagas', '3113701'),
(2394, 13, 'Carmésia', '3113800'),
(2395, 13, 'Carmo da Cachoeira', '3113909'),
(2396, 13, 'Carmo da Mata', '3114006'),
(2397, 13, 'Carmo de Minas', '3114105'),
(2398, 13, 'Carmo do Cajuru', '3114204'),
(2399, 13, 'Carmo do Paranaíba', '3114303'),
(2400, 13, 'Carmo do Rio Claro', '3114402'),
(2401, 13, 'Carmópolis de Minas', '3114501'),
(2402, 13, 'Carneirinho', '3114550'),
(2403, 13, 'Carrancas', '3114600'),
(2404, 13, 'Carvalhópolis', '3114709'),
(2405, 13, 'Carvalhos', '3114808'),
(2406, 13, 'Casa Grande', '3114907'),
(2407, 13, 'Cascalho Rico', '3115003'),
(2408, 13, 'Cássia', '3115102'),
(2409, 13, 'Conceição da Barra de Minas', '3115201'),
(2410, 13, 'Cataguases', '3115300'),
(2411, 13, 'Catas Altas', '3115359'),
(2412, 13, 'Catas Altas da Noruega', '3115409'),
(2413, 13, 'Catuji', '3115458'),
(2414, 13, 'Catuti', '3115474'),
(2415, 13, 'Caxambu', '3115508'),
(2416, 13, 'Cedro do Abaeté', '3115607'),
(2417, 13, 'Central de Minas', '3115706'),
(2418, 13, 'Centralina', '3115805'),
(2419, 13, 'Chácara', '3115904'),
(2420, 13, 'Chalé', '3116001'),
(2421, 13, 'Chapada do Norte', '3116100'),
(2422, 13, 'Chapada Gaúcha', '3116159'),
(2423, 13, 'Chiador', '3116209'),
(2424, 13, 'Cipotânea', '3116308'),
(2425, 13, 'Claraval', '3116407'),
(2426, 13, 'Claro dos Poções', '3116506'),
(2427, 13, 'Cláudio', '3116605'),
(2428, 13, 'Coimbra', '3116704'),
(2429, 13, 'Coluna', '3116803'),
(2430, 13, 'Comendador Gomes', '3116902'),
(2431, 13, 'Comercinho', '3117009'),
(2432, 13, 'Conceição da Aparecida', '3117108'),
(2433, 13, 'Conceição das Pedras', '3117207'),
(2434, 13, 'Conceição das Alagoas', '3117306'),
(2435, 13, 'Conceição de Ipanema', '3117405'),
(2436, 13, 'Conceição do Mato Dentro', '3117504'),
(2437, 13, 'Conceição do Pará', '3117603'),
(2438, 13, 'Conceição do Rio Verde', '3117702'),
(2439, 13, 'Conceição dos Ouros', '3117801'),
(2440, 13, 'Cônego Marinho', '3117836'),
(2441, 13, 'Confins', '3117876'),
(2442, 13, 'Congonhal', '3117900'),
(2443, 13, 'Congonhas', '3118007'),
(2444, 13, 'Congonhas do Norte', '3118106'),
(2445, 13, 'Conquista', '3118205'),
(2446, 13, 'Conselheiro Lafaiete', '3118304'),
(2447, 13, 'Conselheiro Pena', '3118403'),
(2448, 13, 'Consolação', '3118502'),
(2449, 13, 'Contagem', '3118601'),
(2450, 13, 'Coqueiral', '3118700'),
(2451, 13, 'Coração de Jesus', '3118809'),
(2452, 13, 'Cordisburgo', '3118908'),
(2453, 13, 'Cordislândia', '3119005'),
(2454, 13, 'Corinto', '3119104'),
(2455, 13, 'Coroaci', '3119203'),
(2456, 13, 'Coromandel', '3119302'),
(2457, 13, 'Coronel Fabriciano', '3119401'),
(2458, 13, 'Coronel Murta', '3119500'),
(2459, 13, 'Coronel Pacheco', '3119609'),
(2460, 13, 'Coronel Xavier Chaves', '3119708'),
(2461, 13, 'Córrego Danta', '3119807'),
(2462, 13, 'Córrego do Bom Jesus', '3119906'),
(2463, 13, 'Córrego Fundo', '3119955'),
(2464, 13, 'Córrego Novo', '3120003'),
(2465, 13, 'Couto de Magalhães de Minas', '3120102'),
(2466, 13, 'Crisólita', '3120151'),
(2467, 13, 'Cristais', '3120201'),
(2468, 13, 'Cristália', '3120300'),
(2469, 13, 'Cristiano Otoni', '3120409'),
(2470, 13, 'Cristina', '3120508'),
(2471, 13, 'Crucilândia', '3120607'),
(2472, 13, 'Cruzeiro da Fortaleza', '3120706'),
(2473, 13, 'Cruzília', '3120805'),
(2474, 13, 'Cuparaque', '3120839'),
(2475, 13, 'Curral de Dentro', '3120870'),
(2476, 13, 'Curvelo', '3120904'),
(2477, 13, 'Datas', '3121001'),
(2478, 13, 'Delfim Moreira', '3121100'),
(2479, 13, 'Delfinópolis', '3121209'),
(2480, 13, 'Delta', '3121258'),
(2481, 13, 'Descoberto', '3121308'),
(2482, 13, 'Desterro de Entre Rios', '3121407'),
(2483, 13, 'Desterro do Melo', '3121506'),
(2484, 13, 'Diamantina', '3121605'),
(2485, 13, 'Diogo de Vasconcelos', '3121704'),
(2486, 13, 'Dionísio', '3121803'),
(2487, 13, 'Divinésia', '3121902'),
(2488, 13, 'Divino', '3122009'),
(2489, 13, 'Divino das Laranjeiras', '3122108'),
(2490, 13, 'Divinolândia de Minas', '3122207'),
(2491, 13, 'Divinópolis', '3122306'),
(2492, 13, 'Divisa Alegre', '3122355'),
(2493, 13, 'Divisa Nova', '3122405'),
(2494, 13, 'Divisópolis', '3122454'),
(2495, 13, 'Dom Bosco', '3122470'),
(2496, 13, 'Dom Cavati', '3122504'),
(2497, 13, 'Dom Joaquim', '3122603'),
(2498, 13, 'Dom Silvério', '3122702'),
(2499, 13, 'Dom Viçoso', '3122801'),
(2500, 13, 'Dona Eusébia', '3122900'),
(2501, 13, 'Dores de Campos', '3123007'),
(2502, 13, 'Dores de Guanhães', '3123106'),
(2503, 13, 'Dores do Indaiá', '3123205'),
(2504, 13, 'Dores do Turvo', '3123304'),
(2505, 13, 'Doresópolis', '3123403'),
(2506, 13, 'Douradoquara', '3123502'),
(2507, 13, 'Durandé', '3123528'),
(2508, 13, 'Elói Mendes', '3123601'),
(2509, 13, 'Engenheiro Caldas', '3123700'),
(2510, 13, 'Engenheiro Navarro', '3123809'),
(2511, 13, 'Entre Folhas', '3123858'),
(2512, 13, 'Entre Rios de Minas', '3123908'),
(2513, 13, 'Ervália', '3124005'),
(2514, 13, 'Esmeraldas', '3124104'),
(2515, 13, 'Espera Feliz', '3124203'),
(2516, 13, 'Espinosa', '3124302'),
(2517, 13, 'Espírito Santo do Dourado', '3124401'),
(2518, 13, 'Estiva', '3124500'),
(2519, 13, 'Estrela Dalva', '3124609'),
(2520, 13, 'Estrela do Indaiá', '3124708'),
(2521, 13, 'Estrela do Sul', '3124807'),
(2522, 13, 'Eugenópolis', '3124906'),
(2523, 13, 'Ewbank da Câmara', '3125002'),
(2524, 13, 'Extrema', '3125101'),
(2525, 13, 'Fama', '3125200'),
(2526, 13, 'Faria Lemos', '3125309'),
(2527, 13, 'Felício dos Santos', '3125408'),
(2528, 13, 'São Gonçalo do Rio Preto', '3125507'),
(2529, 13, 'Felisburgo', '3125606'),
(2530, 13, 'Felixlândia', '3125705'),
(2531, 13, 'Fernandes Tourinho', '3125804'),
(2532, 13, 'Ferros', '3125903'),
(2533, 13, 'Fervedouro', '3125952'),
(2534, 13, 'Florestal', '3126000'),
(2535, 13, 'Formiga', '3126109'),
(2536, 13, 'Formoso', '3126208'),
(2537, 13, 'Fortaleza de Minas', '3126307'),
(2538, 13, 'Fortuna de Minas', '3126406'),
(2539, 13, 'Francisco Badaró', '3126505'),
(2540, 13, 'Francisco Dumont', '3126604'),
(2541, 13, 'Francisco Sá', '3126703'),
(2542, 13, 'Franciscópolis', '3126752'),
(2543, 13, 'Frei Gaspar', '3126802'),
(2544, 13, 'Frei Inocêncio', '3126901'),
(2545, 13, 'Frei Lagonegro', '3126950'),
(2546, 13, 'Fronteira', '3127008'),
(2547, 13, 'Fronteira dos Vales', '3127057'),
(2548, 13, 'Fruta de Leite', '3127073'),
(2549, 13, 'Frutal', '3127107'),
(2550, 13, 'Funilândia', '3127206'),
(2551, 13, 'Galiléia', '3127305'),
(2552, 13, 'Gameleiras', '3127339'),
(2553, 13, 'Glaucilândia', '3127354'),
(2554, 13, 'Goiabeira', '3127370'),
(2555, 13, 'Goianá', '3127388'),
(2556, 13, 'Gonçalves', '3127404'),
(2557, 13, 'Gonzaga', '3127503'),
(2558, 13, 'Gouveia', '3127602'),
(2559, 13, 'Governador Valadares', '3127701'),
(2560, 13, 'Grão Mogol', '3127800'),
(2561, 13, 'Grupiara', '3127909'),
(2562, 13, 'Guanhães', '3128006'),
(2563, 13, 'Guapé', '3128105'),
(2564, 13, 'Guaraciaba', '3128204'),
(2565, 13, 'Guaraciama', '3128253'),
(2566, 13, 'Guaranésia', '3128303'),
(2567, 13, 'Guarani', '3128402'),
(2568, 13, 'Guarará', '3128501'),
(2569, 13, 'Guarda-Mor', '3128600'),
(2570, 13, 'Guaxupé', '3128709'),
(2571, 13, 'Guidoval', '3128808'),
(2572, 13, 'Guimarânia', '3128907'),
(2573, 13, 'Guiricema', '3129004'),
(2574, 13, 'Gurinhatã', '3129103'),
(2575, 13, 'Heliodora', '3129202'),
(2576, 13, 'Iapu', '3129301'),
(2577, 13, 'Ibertioga', '3129400'),
(2578, 13, 'Ibiá', '3129509'),
(2579, 13, 'Ibiaí', '3129608'),
(2580, 13, 'Ibiracatu', '3129657'),
(2581, 13, 'Ibiraci', '3129707'),
(2582, 13, 'Ibirité', '3129806'),
(2583, 13, 'Ibitiúra de Minas', '3129905'),
(2584, 13, 'Ibituruna', '3130002'),
(2585, 13, 'Icaraí de Minas', '3130051'),
(2586, 13, 'Igarapé', '3130101'),
(2587, 13, 'Igaratinga', '3130200'),
(2588, 13, 'Iguatama', '3130309'),
(2589, 13, 'Ijaci', '3130408'),
(2590, 13, 'Ilicínea', '3130507'),
(2591, 13, 'Imbé de Minas', '3130556'),
(2592, 13, 'Inconfidentes', '3130606'),
(2593, 13, 'Indaiabira', '3130655'),
(2594, 13, 'Indianópolis', '3130705'),
(2595, 13, 'Ingaí', '3130804'),
(2596, 13, 'Inhapim', '3130903'),
(2597, 13, 'Inhaúma', '3131000'),
(2598, 13, 'Inimutaba', '3131109'),
(2599, 13, 'Ipaba', '3131158'),
(2600, 13, 'Ipanema', '3131208'),
(2601, 13, 'Ipatinga', '3131307'),
(2602, 13, 'Ipiaçu', '3131406'),
(2603, 13, 'Ipuiúna', '3131505'),
(2604, 13, 'Iraí de Minas', '3131604'),
(2605, 13, 'Itabira', '3131703'),
(2606, 13, 'Itabirinha', '3131802'),
(2607, 13, 'Itabirito', '3131901'),
(2608, 13, 'Itacambira', '3132008'),
(2609, 13, 'Itacarambi', '3132107'),
(2610, 13, 'Itaguara', '3132206'),
(2611, 13, 'Itaipé', '3132305'),
(2612, 13, 'Itajubá', '3132404'),
(2613, 13, 'Itamarandiba', '3132503'),
(2614, 13, 'Itamarati de Minas', '3132602'),
(2615, 13, 'Itambacuri', '3132701'),
(2616, 13, 'Itambé do Mato Dentro', '3132800'),
(2617, 13, 'Itamogi', '3132909'),
(2618, 13, 'Itamonte', '3133006'),
(2619, 13, 'Itanhandu', '3133105'),
(2620, 13, 'Itanhomi', '3133204'),
(2621, 13, 'Itaobim', '3133303'),
(2622, 13, 'Itapagipe', '3133402'),
(2623, 13, 'Itapecerica', '3133501'),
(2624, 13, 'Itapeva', '3133600'),
(2625, 13, 'Itatiaiuçu', '3133709'),
(2626, 13, 'Itaú de Minas', '3133758'),
(2627, 13, 'Itaúna', '3133808'),
(2628, 13, 'Itaverava', '3133907'),
(2629, 13, 'Itinga', '3134004'),
(2630, 13, 'Itueta', '3134103'),
(2631, 13, 'Ituiutaba', '3134202'),
(2632, 13, 'Itumirim', '3134301'),
(2633, 13, 'Iturama', '3134400'),
(2634, 13, 'Itutinga', '3134509'),
(2635, 13, 'Jaboticatubas', '3134608'),
(2636, 13, 'Jacinto', '3134707'),
(2637, 13, 'Jacuí', '3134806'),
(2638, 13, 'Jacutinga', '3134905'),
(2639, 13, 'Jaguaraçu', '3135001'),
(2640, 13, 'Jaíba', '3135050'),
(2641, 13, 'Jampruca', '3135076'),
(2642, 13, 'Janaúba', '3135100'),
(2643, 13, 'Januária', '3135209'),
(2644, 13, 'Japaraíba', '3135308'),
(2645, 13, 'Japonvar', '3135357'),
(2646, 13, 'Jeceaba', '3135407'),
(2647, 13, 'Jenipapo de Minas', '3135456'),
(2648, 13, 'Jequeri', '3135506'),
(2649, 13, 'Jequitaí', '3135605'),
(2650, 13, 'Jequitibá', '3135704'),
(2651, 13, 'Jequitinhonha', '3135803'),
(2652, 13, 'Jesuânia', '3135902'),
(2653, 13, 'Joaíma', '3136009'),
(2654, 13, 'Joanésia', '3136108'),
(2655, 13, 'João Monlevade', '3136207'),
(2656, 13, 'João Pinheiro', '3136306'),
(2657, 13, 'Joaquim Felício', '3136405'),
(2658, 13, 'Jordânia', '3136504'),
(2659, 13, 'José Gonçalves de Minas', '3136520'),
(2660, 13, 'José Raydan', '3136553'),
(2661, 13, 'Josenópolis', '3136579'),
(2662, 13, 'Nova União', '3136603'),
(2663, 13, 'Juatuba', '3136652'),
(2664, 13, 'Juiz de Fora', '3136702'),
(2665, 13, 'Juramento', '3136801'),
(2666, 13, 'Juruaia', '3136900'),
(2667, 13, 'Juvenília', '3136959'),
(2668, 13, 'Ladainha', '3137007'),
(2669, 13, 'Lagamar', '3137106'),
(2670, 13, 'Lagoa da Prata', '3137205'),
(2671, 13, 'Lagoa dos Patos', '3137304'),
(2672, 13, 'Lagoa Dourada', '3137403'),
(2673, 13, 'Lagoa Formosa', '3137502'),
(2674, 13, 'Lagoa Grande', '3137536'),
(2675, 13, 'Lagoa Santa', '3137601'),
(2676, 13, 'Lajinha', '3137700'),
(2677, 13, 'Lambari', '3137809'),
(2678, 13, 'Lamim', '3137908'),
(2679, 13, 'Laranjal', '3138005'),
(2680, 13, 'Lassance', '3138104'),
(2681, 13, 'Lavras', '3138203'),
(2682, 13, 'Leandro Ferreira', '3138302'),
(2683, 13, 'Leme do Prado', '3138351'),
(2684, 13, 'Leopoldina', '3138401'),
(2685, 13, 'Liberdade', '3138500'),
(2686, 13, 'Lima Duarte', '3138609'),
(2687, 13, 'Limeira do Oeste', '3138625'),
(2688, 13, 'Lontra', '3138658'),
(2689, 13, 'Luisburgo', '3138674'),
(2690, 13, 'Luislândia', '3138682'),
(2691, 13, 'Luminárias', '3138708'),
(2692, 13, 'Luz', '3138807'),
(2693, 13, 'Machacalis', '3138906'),
(2694, 13, 'Machado', '3139003'),
(2695, 13, 'Madre de Deus de Minas', '3139102'),
(2696, 13, 'Malacacheta', '3139201'),
(2697, 13, 'Mamonas', '3139250'),
(2698, 13, 'Manga', '3139300'),
(2699, 13, 'Manhuaçu', '3139409'),
(2700, 13, 'Manhumirim', '3139508'),
(2701, 13, 'Mantena', '3139607'),
(2702, 13, 'Maravilhas', '3139706'),
(2703, 13, 'Mar de Espanha', '3139805'),
(2704, 13, 'Maria da Fé', '3139904'),
(2705, 13, 'Mariana', '3140001'),
(2706, 13, 'Marilac', '3140100'),
(2707, 13, 'Mário Campos', '3140159'),
(2708, 13, 'Maripá de Minas', '3140209'),
(2709, 13, 'Marliéria', '3140308'),
(2710, 13, 'Marmelópolis', '3140407'),
(2711, 13, 'Martinho Campos', '3140506'),
(2712, 13, 'Martins Soares', '3140530'),
(2713, 13, 'Mata Verde', '3140555'),
(2714, 13, 'Materlândia', '3140605'),
(2715, 13, 'Mateus Leme', '3140704'),
(2716, 13, 'Matias Barbosa', '3140803'),
(2717, 13, 'Matias Cardoso', '3140852'),
(2718, 13, 'Matipó', '3140902'),
(2719, 13, 'Mato Verde', '3141009'),
(2720, 13, 'Matozinhos', '3141108'),
(2721, 13, 'Matutina', '3141207'),
(2722, 13, 'Medeiros', '3141306'),
(2723, 13, 'Medina', '3141405'),
(2724, 13, 'Mendes Pimentel', '3141504'),
(2725, 13, 'Mercês', '3141603'),
(2726, 13, 'Mesquita', '3141702'),
(2727, 13, 'Minas Novas', '3141801'),
(2728, 13, 'Minduri', '3141900'),
(2729, 13, 'Mirabela', '3142007'),
(2730, 13, 'Miradouro', '3142106'),
(2731, 13, 'Miraí', '3142205'),
(2732, 13, 'Miravânia', '3142254'),
(2733, 13, 'Moeda', '3142304'),
(2734, 13, 'Moema', '3142403'),
(2735, 13, 'Monjolos', '3142502'),
(2736, 13, 'Monsenhor Paulo', '3142601'),
(2737, 13, 'Montalvânia', '3142700'),
(2738, 13, 'Monte Alegre de Minas', '3142809'),
(2739, 13, 'Monte Azul', '3142908'),
(2740, 13, 'Monte Belo', '3143005'),
(2741, 13, 'Monte Carmelo', '3143104'),
(2742, 13, 'Monte Formoso', '3143153'),
(2743, 13, 'Monte Santo de Minas', '3143203'),
(2744, 13, 'Montes Claros', '3143302'),
(2745, 13, 'Monte Sião', '3143401'),
(2746, 13, 'Montezuma', '3143450'),
(2747, 13, 'Morada Nova de Minas', '3143500'),
(2748, 13, 'Morro da Garça', '3143609'),
(2749, 13, 'Morro do Pilar', '3143708'),
(2750, 13, 'Munhoz', '3143807'),
(2751, 13, 'Muriaé', '3143906'),
(2752, 13, 'Mutum', '3144003'),
(2753, 13, 'Muzambinho', '3144102'),
(2754, 13, 'Nacip Raydan', '3144201'),
(2755, 13, 'Nanuque', '3144300'),
(2756, 13, 'Naque', '3144359'),
(2757, 13, 'Natalândia', '3144375'),
(2758, 13, 'Natércia', '3144409'),
(2759, 13, 'Nazareno', '3144508'),
(2760, 13, 'Nepomuceno', '3144607'),
(2761, 13, 'Ninheira', '3144656'),
(2762, 13, 'Nova Belém', '3144672'),
(2763, 13, 'Nova Era', '3144706'),
(2764, 13, 'Nova Lima', '3144805'),
(2765, 13, 'Nova Módica', '3144904'),
(2766, 13, 'Nova Ponte', '3145000'),
(2767, 13, 'Nova Porteirinha', '3145059'),
(2768, 13, 'Nova Resende', '3145109'),
(2769, 13, 'Nova Serrana', '3145208'),
(2770, 13, 'Novo Cruzeiro', '3145307'),
(2771, 13, 'Novo Oriente de Minas', '3145356'),
(2772, 13, 'Novorizonte', '3145372'),
(2773, 13, 'Olaria', '3145406'),
(2774, 13, 'Olhos-d\'Água', '3145455'),
(2775, 13, 'Olímpio Noronha', '3145505'),
(2776, 13, 'Oliveira', '3145604'),
(2777, 13, 'Oliveira Fortes', '3145703'),
(2778, 13, 'Onça de Pitangui', '3145802'),
(2779, 13, 'Oratórios', '3145851'),
(2780, 13, 'Orizânia', '3145877'),
(2781, 13, 'Ouro Branco', '3145901'),
(2782, 13, 'Ouro Fino', '3146008'),
(2783, 13, 'Ouro Preto', '3146107'),
(2784, 13, 'Ouro Verde de Minas', '3146206'),
(2785, 13, 'Padre Carvalho', '3146255');
INSERT INTO `cidade` (`id_cidade`, `id_estado`, `nome_cidade`, `ibge_cidade`) VALUES
(2786, 13, 'Padre Paraíso', '3146305'),
(2787, 13, 'Paineiras', '3146404'),
(2788, 13, 'Pains', '3146503'),
(2789, 13, 'Pai Pedro', '3146552'),
(2790, 13, 'Paiva', '3146602'),
(2791, 13, 'Palma', '3146701'),
(2792, 13, 'Palmópolis', '3146750'),
(2793, 13, 'Papagaios', '3146909'),
(2794, 13, 'Paracatu', '3147006'),
(2795, 13, 'Pará de Minas', '3147105'),
(2796, 13, 'Paraguaçu', '3147204'),
(2797, 13, 'Paraisópolis', '3147303'),
(2798, 13, 'Paraopeba', '3147402'),
(2799, 13, 'Passabém', '3147501'),
(2800, 13, 'Passa Quatro', '3147600'),
(2801, 13, 'Passa Tempo', '3147709'),
(2802, 13, 'Passa-Vinte', '3147808'),
(2803, 13, 'Passos', '3147907'),
(2804, 13, 'Patis', '3147956'),
(2805, 13, 'Patos de Minas', '3148004'),
(2806, 13, 'Patrocínio', '3148103'),
(2807, 13, 'Patrocínio do Muriaé', '3148202'),
(2808, 13, 'Paula Cândido', '3148301'),
(2809, 13, 'Paulistas', '3148400'),
(2810, 13, 'Pavão', '3148509'),
(2811, 13, 'Peçanha', '3148608'),
(2812, 13, 'Pedra Azul', '3148707'),
(2813, 13, 'Pedra Bonita', '3148756'),
(2814, 13, 'Pedra do Anta', '3148806'),
(2815, 13, 'Pedra do Indaiá', '3148905'),
(2816, 13, 'Pedra Dourada', '3149002'),
(2817, 13, 'Pedralva', '3149101'),
(2818, 13, 'Pedras de Maria da Cruz', '3149150'),
(2819, 13, 'Pedrinópolis', '3149200'),
(2820, 13, 'Pedro Leopoldo', '3149309'),
(2821, 13, 'Pedro Teixeira', '3149408'),
(2822, 13, 'Pequeri', '3149507'),
(2823, 13, 'Pequi', '3149606'),
(2824, 13, 'Perdigão', '3149705'),
(2825, 13, 'Perdizes', '3149804'),
(2826, 13, 'Perdões', '3149903'),
(2827, 13, 'Periquito', '3149952'),
(2828, 13, 'Pescador', '3150000'),
(2829, 13, 'Piau', '3150109'),
(2830, 13, 'Piedade de Caratinga', '3150158'),
(2831, 13, 'Piedade de Ponte Nova', '3150208'),
(2832, 13, 'Piedade do Rio Grande', '3150307'),
(2833, 13, 'Piedade dos Gerais', '3150406'),
(2834, 13, 'Pimenta', '3150505'),
(2835, 13, 'Pingo-d\'Água', '3150539'),
(2836, 13, 'Pintópolis', '3150570'),
(2837, 13, 'Piracema', '3150604'),
(2838, 13, 'Pirajuba', '3150703'),
(2839, 13, 'Piranga', '3150802'),
(2840, 13, 'Piranguçu', '3150901'),
(2841, 13, 'Piranguinho', '3151008'),
(2842, 13, 'Pirapetinga', '3151107'),
(2843, 13, 'Pirapora', '3151206'),
(2844, 13, 'Piraúba', '3151305'),
(2845, 13, 'Pitangui', '3151404'),
(2846, 13, 'Piumhi', '3151503'),
(2847, 13, 'Planura', '3151602'),
(2848, 13, 'Poço Fundo', '3151701'),
(2849, 13, 'Poços de Caldas', '3151800'),
(2850, 13, 'Pocrane', '3151909'),
(2851, 13, 'Pompéu', '3152006'),
(2852, 13, 'Ponte Nova', '3152105'),
(2853, 13, 'Ponto Chique', '3152131'),
(2854, 13, 'Ponto dos Volantes', '3152170'),
(2855, 13, 'Porteirinha', '3152204'),
(2856, 13, 'Porto Firme', '3152303'),
(2857, 13, 'Poté', '3152402'),
(2858, 13, 'Pouso Alegre', '3152501'),
(2859, 13, 'Pouso Alto', '3152600'),
(2860, 13, 'Prados', '3152709'),
(2861, 13, 'Prata', '3152808'),
(2862, 13, 'Pratápolis', '3152907'),
(2863, 13, 'Pratinha', '3153004'),
(2864, 13, 'Presidente Bernardes', '3153103'),
(2865, 13, 'Presidente Juscelino', '3153202'),
(2866, 13, 'Presidente Kubitschek', '3153301'),
(2867, 13, 'Presidente Olegário', '3153400'),
(2868, 13, 'Alto Jequitibá', '3153509'),
(2869, 13, 'Prudente de Morais', '3153608'),
(2870, 13, 'Quartel Geral', '3153707'),
(2871, 13, 'Queluzito', '3153806'),
(2872, 13, 'Raposos', '3153905'),
(2873, 13, 'Raul Soares', '3154002'),
(2874, 13, 'Recreio', '3154101'),
(2875, 13, 'Reduto', '3154150'),
(2876, 13, 'Resende Costa', '3154200'),
(2877, 13, 'Resplendor', '3154309'),
(2878, 13, 'Ressaquinha', '3154408'),
(2879, 13, 'Riachinho', '3154457'),
(2880, 13, 'Riacho dos Machados', '3154507'),
(2881, 13, 'Ribeirão das Neves', '3154606'),
(2882, 13, 'Ribeirão Vermelho', '3154705'),
(2883, 13, 'Rio Acima', '3154804'),
(2884, 13, 'Rio Casca', '3154903'),
(2885, 13, 'Rio Doce', '3155009'),
(2886, 13, 'Rio do Prado', '3155108'),
(2887, 13, 'Rio Espera', '3155207'),
(2888, 13, 'Rio Manso', '3155306'),
(2889, 13, 'Rio Novo', '3155405'),
(2890, 13, 'Rio Paranaíba', '3155504'),
(2891, 13, 'Rio Pardo de Minas', '3155603'),
(2892, 13, 'Rio Piracicaba', '3155702'),
(2893, 13, 'Rio Pomba', '3155801'),
(2894, 13, 'Rio Preto', '3155900'),
(2895, 13, 'Rio Vermelho', '3156007'),
(2896, 13, 'Ritápolis', '3156106'),
(2897, 13, 'Rochedo de Minas', '3156205'),
(2898, 13, 'Rodeiro', '3156304'),
(2899, 13, 'Romaria', '3156403'),
(2900, 13, 'Rosário da Limeira', '3156452'),
(2901, 13, 'Rubelita', '3156502'),
(2902, 13, 'Rubim', '3156601'),
(2903, 13, 'Sabará', '3156700'),
(2904, 13, 'Sabinópolis', '3156809'),
(2905, 13, 'Sacramento', '3156908'),
(2906, 13, 'Salinas', '3157005'),
(2907, 13, 'Salto da Divisa', '3157104'),
(2908, 13, 'Santa Bárbara', '3157203'),
(2909, 13, 'Santa Bárbara do Leste', '3157252'),
(2910, 13, 'Santa Bárbara do Monte Verde', '3157278'),
(2911, 13, 'Santa Bárbara do Tugúrio', '3157302'),
(2912, 13, 'Santa Cruz de Minas', '3157336'),
(2913, 13, 'Santa Cruz de Salinas', '3157377'),
(2914, 13, 'Santa Cruz do Escalvado', '3157401'),
(2915, 13, 'Santa Efigênia de Minas', '3157500'),
(2916, 13, 'Santa Fé de Minas', '3157609'),
(2917, 13, 'Santa Helena de Minas', '3157658'),
(2918, 13, 'Santa Juliana', '3157708'),
(2919, 13, 'Santa Luzia', '3157807'),
(2920, 13, 'Santa Margarida', '3157906'),
(2921, 13, 'Santa Maria de Itabira', '3158003'),
(2922, 13, 'Santa Maria do Salto', '3158102'),
(2923, 13, 'Santa Maria do Suaçuí', '3158201'),
(2924, 13, 'Santana da Vargem', '3158300'),
(2925, 13, 'Santana de Cataguases', '3158409'),
(2926, 13, 'Santana de Pirapama', '3158508'),
(2927, 13, 'Santana do Deserto', '3158607'),
(2928, 13, 'Santana do Garambéu', '3158706'),
(2929, 13, 'Santana do Jacaré', '3158805'),
(2930, 13, 'Santana do Manhuaçu', '3158904'),
(2931, 13, 'Santana do Paraíso', '3158953'),
(2932, 13, 'Santana do Riacho', '3159001'),
(2933, 13, 'Santana dos Montes', '3159100'),
(2934, 13, 'Santa Rita de Caldas', '3159209'),
(2935, 13, 'Santa Rita de Jacutinga', '3159308'),
(2936, 13, 'Santa Rita de Minas', '3159357'),
(2937, 13, 'Santa Rita de Ibitipoca', '3159407'),
(2938, 13, 'Santa Rita do Itueto', '3159506'),
(2939, 13, 'Santa Rita do Sapucaí', '3159605'),
(2940, 13, 'Santa Rosa da Serra', '3159704'),
(2941, 13, 'Santa Vitória', '3159803'),
(2942, 13, 'Santo Antônio do Amparo', '3159902'),
(2943, 13, 'Santo Antônio do Aventureiro', '3160009'),
(2944, 13, 'Santo Antônio do Grama', '3160108'),
(2945, 13, 'Santo Antônio do Itambé', '3160207'),
(2946, 13, 'Santo Antônio do Jacinto', '3160306'),
(2947, 13, 'Santo Antônio do Monte', '3160405'),
(2948, 13, 'Santo Antônio do Retiro', '3160454'),
(2949, 13, 'Santo Antônio do Rio Abaixo', '3160504'),
(2950, 13, 'Santo Hipólito', '3160603'),
(2951, 13, 'Santos Dumont', '3160702'),
(2952, 13, 'São Bento Abade', '3160801'),
(2953, 13, 'São Brás do Suaçuí', '3160900'),
(2954, 13, 'São Domingos das Dores', '3160959'),
(2955, 13, 'São Domingos do Prata', '3161007'),
(2956, 13, 'São Félix de Minas', '3161056'),
(2957, 13, 'São Francisco', '3161106'),
(2958, 13, 'São Francisco de Paula', '3161205'),
(2959, 13, 'São Francisco de Sales', '3161304'),
(2960, 13, 'São Francisco do Glória', '3161403'),
(2961, 13, 'São Geraldo', '3161502'),
(2962, 13, 'São Geraldo da Piedade', '3161601'),
(2963, 13, 'São Geraldo do Baixio', '3161650'),
(2964, 13, 'São Gonçalo do Abaeté', '3161700'),
(2965, 13, 'São Gonçalo do Pará', '3161809'),
(2966, 13, 'São Gonçalo do Rio Abaixo', '3161908'),
(2967, 13, 'São Gonçalo do Sapucaí', '3162005'),
(2968, 13, 'São Gotardo', '3162104'),
(2969, 13, 'São João Batista do Glória', '3162203'),
(2970, 13, 'São João da Lagoa', '3162252'),
(2971, 13, 'São João da Mata', '3162302'),
(2972, 13, 'São João da Ponte', '3162401'),
(2973, 13, 'São João das Missões', '3162450'),
(2974, 13, 'São João del Rei', '3162500'),
(2975, 13, 'São João do Manhuaçu', '3162559'),
(2976, 13, 'São João do Manteninha', '3162575'),
(2977, 13, 'São João do Oriente', '3162609'),
(2978, 13, 'São João do Pacuí', '3162658'),
(2979, 13, 'São João do Paraíso', '3162708'),
(2980, 13, 'São João Evangelista', '3162807'),
(2981, 13, 'São João Nepomuceno', '3162906'),
(2982, 13, 'São Joaquim de Bicas', '3162922'),
(2983, 13, 'São José da Barra', '3162948'),
(2984, 13, 'São José da Lapa', '3162955'),
(2985, 13, 'São José da Safira', '3163003'),
(2986, 13, 'São José da Varginha', '3163102'),
(2987, 13, 'São José do Alegre', '3163201'),
(2988, 13, 'São José do Divino', '3163300'),
(2989, 13, 'São José do Goiabal', '3163409'),
(2990, 13, 'São José do Jacuri', '3163508'),
(2991, 13, 'São José do Mantimento', '3163607'),
(2992, 13, 'São Lourenço', '3163706'),
(2993, 13, 'São Miguel do Anta', '3163805'),
(2994, 13, 'São Pedro da União', '3163904'),
(2995, 13, 'São Pedro dos Ferros', '3164001'),
(2996, 13, 'São Pedro do Suaçuí', '3164100'),
(2997, 13, 'São Romão', '3164209'),
(2998, 13, 'São Roque de Minas', '3164308'),
(2999, 13, 'São Sebastião da Bela Vista', '3164407'),
(3000, 13, 'São Sebastião da Vargem Alegre', '3164431'),
(3001, 13, 'São Sebastião do Anta', '3164472'),
(3002, 13, 'São Sebastião do Maranhão', '3164506'),
(3003, 13, 'São Sebastião do Oeste', '3164605'),
(3004, 13, 'São Sebastião do Paraíso', '3164704'),
(3005, 13, 'São Sebastião do Rio Preto', '3164803'),
(3006, 13, 'São Sebastião do Rio Verde', '3164902'),
(3007, 13, 'São Tiago', '3165008'),
(3008, 13, 'São Tomás de Aquino', '3165107'),
(3009, 13, 'São Thomé das Letras', '3165206'),
(3010, 13, 'São Vicente de Minas', '3165305'),
(3011, 13, 'Sapucaí-Mirim', '3165404'),
(3012, 13, 'Sardoá', '3165503'),
(3013, 13, 'Sarzedo', '3165537'),
(3014, 13, 'Setubinha', '3165552'),
(3015, 13, 'Sem-Peixe', '3165560'),
(3016, 13, 'Senador Amaral', '3165578'),
(3017, 13, 'Senador Cortes', '3165602'),
(3018, 13, 'Senador Firmino', '3165701'),
(3019, 13, 'Senador José Bento', '3165800'),
(3020, 13, 'Senador Modestino Gonçalves', '3165909'),
(3021, 13, 'Senhora de Oliveira', '3166006'),
(3022, 13, 'Senhora do Porto', '3166105'),
(3023, 13, 'Senhora dos Remédios', '3166204'),
(3024, 13, 'Sericita', '3166303'),
(3025, 13, 'Seritinga', '3166402'),
(3026, 13, 'Serra Azul de Minas', '3166501'),
(3027, 13, 'Serra da Saudade', '3166600'),
(3028, 13, 'Serra dos Aimorés', '3166709'),
(3029, 13, 'Serra do Salitre', '3166808'),
(3030, 13, 'Serrania', '3166907'),
(3031, 13, 'Serranópolis de Minas', '3166956'),
(3032, 13, 'Serranos', '3167004'),
(3033, 13, 'Serro', '3167103'),
(3034, 13, 'Sete Lagoas', '3167202'),
(3035, 13, 'Silveirânia', '3167301'),
(3036, 13, 'Silvianópolis', '3167400'),
(3037, 13, 'Simão Pereira', '3167509'),
(3038, 13, 'Simonésia', '3167608'),
(3039, 13, 'Sobrália', '3167707'),
(3040, 13, 'Soledade de Minas', '3167806'),
(3041, 13, 'Tabuleiro', '3167905'),
(3042, 13, 'Taiobeiras', '3168002'),
(3043, 13, 'Taparuba', '3168051'),
(3044, 13, 'Tapira', '3168101'),
(3045, 13, 'Tapiraí', '3168200'),
(3046, 13, 'Taquaraçu de Minas', '3168309'),
(3047, 13, 'Tarumirim', '3168408'),
(3048, 13, 'Teixeiras', '3168507'),
(3049, 13, 'Teófilo Otoni', '3168606'),
(3050, 13, 'Timóteo', '3168705'),
(3051, 13, 'Tiradentes', '3168804'),
(3052, 13, 'Tiros', '3168903'),
(3053, 13, 'Tocantins', '3169000'),
(3054, 13, 'Tocos do Moji', '3169059'),
(3055, 13, 'Toledo', '3169109'),
(3056, 13, 'Tombos', '3169208'),
(3057, 13, 'Três Corações', '3169307'),
(3058, 13, 'Três Marias', '3169356'),
(3059, 13, 'Três Pontas', '3169406'),
(3060, 13, 'Tumiritinga', '3169505'),
(3061, 13, 'Tupaciguara', '3169604'),
(3062, 13, 'Turmalina', '3169703'),
(3063, 13, 'Turvolândia', '3169802'),
(3064, 13, 'Ubá', '3169901'),
(3065, 13, 'Ubaí', '3170008'),
(3066, 13, 'Ubaporanga', '3170057'),
(3067, 13, 'Uberaba', '3170107'),
(3068, 13, 'Uberlândia', '3170206'),
(3069, 13, 'Umburatiba', '3170305'),
(3070, 13, 'Unaí', '3170404'),
(3071, 13, 'União de Minas', '3170438'),
(3072, 13, 'Uruana de Minas', '3170479'),
(3073, 13, 'Urucânia', '3170503'),
(3074, 13, 'Urucuia', '3170529'),
(3075, 13, 'Vargem Alegre', '3170578'),
(3076, 13, 'Vargem Bonita', '3170602'),
(3077, 13, 'Vargem Grande do Rio Pardo', '3170651'),
(3078, 13, 'Varginha', '3170701'),
(3079, 13, 'Varjão de Minas', '3170750'),
(3080, 13, 'Várzea da Palma', '3170800'),
(3081, 13, 'Varzelândia', '3170909'),
(3082, 13, 'Vazante', '3171006'),
(3083, 13, 'Verdelândia', '3171030'),
(3084, 13, 'Veredinha', '3171071'),
(3085, 13, 'Veríssimo', '3171105'),
(3086, 13, 'Vermelho Novo', '3171154'),
(3087, 13, 'Vespasiano', '3171204'),
(3088, 13, 'Viçosa', '3171303'),
(3089, 13, 'Vieiras', '3171402'),
(3090, 13, 'Mathias Lobato', '3171501'),
(3091, 13, 'Virgem da Lapa', '3171600'),
(3092, 13, 'Virgínia', '3171709'),
(3093, 13, 'Virginópolis', '3171808'),
(3094, 13, 'Virgolândia', '3171907'),
(3095, 13, 'Visconde do Rio Branco', '3172004'),
(3096, 13, 'Volta Grande', '3172103'),
(3097, 13, 'Wenceslau Braz', '3172202'),
(3098, 8, 'Afonso Cláudio', '3200102'),
(3099, 8, 'Águia Branca', '3200136'),
(3100, 8, 'Água Doce do Norte', '3200169'),
(3101, 8, 'Alegre', '3200201'),
(3102, 8, 'Alfredo Chaves', '3200300'),
(3103, 8, 'Alto Rio Novo', '3200359'),
(3104, 8, 'Anchieta', '3200409'),
(3105, 8, 'Apiacá', '3200508'),
(3106, 8, 'Aracruz', '3200607'),
(3107, 8, 'Atilio Vivacqua', '3200706'),
(3108, 8, 'Baixo Guandu', '3200805'),
(3109, 8, 'Barra de São Francisco', '3200904'),
(3110, 8, 'Boa Esperança', '3201001'),
(3111, 8, 'Bom Jesus do Norte', '3201100'),
(3112, 8, 'Brejetuba', '3201159'),
(3113, 8, 'Cachoeiro de Itapemirim', '3201209'),
(3114, 8, 'Cariacica', '3201308'),
(3115, 8, 'Castelo', '3201407'),
(3116, 8, 'Colatina', '3201506'),
(3117, 8, 'Conceição da Barra', '3201605'),
(3118, 8, 'Conceição do Castelo', '3201704'),
(3119, 8, 'Divino de São Lourenço', '3201803'),
(3120, 8, 'Domingos Martins', '3201902'),
(3121, 8, 'Dores do Rio Preto', '3202009'),
(3122, 8, 'Ecoporanga', '3202108'),
(3123, 8, 'Fundão', '3202207'),
(3124, 8, 'Governador Lindenberg', '3202256'),
(3125, 8, 'Guaçuí', '3202306'),
(3126, 8, 'Guarapari', '3202405'),
(3127, 8, 'Ibatiba', '3202454'),
(3128, 8, 'Ibiraçu', '3202504'),
(3129, 8, 'Ibitirama', '3202553'),
(3130, 8, 'Iconha', '3202603'),
(3131, 8, 'Irupi', '3202652'),
(3132, 8, 'Itaguaçu', '3202702'),
(3133, 8, 'Itapemirim', '3202801'),
(3134, 8, 'Itarana', '3202900'),
(3135, 8, 'Iúna', '3203007'),
(3136, 8, 'Jaguaré', '3203056'),
(3137, 8, 'Jerônimo Monteiro', '3203106'),
(3138, 8, 'João Neiva', '3203130'),
(3139, 8, 'Laranja da Terra', '3203163'),
(3140, 8, 'Linhares', '3203205'),
(3141, 8, 'Mantenópolis', '3203304'),
(3142, 8, 'Marataízes', '3203320'),
(3143, 8, 'Marechal Floriano', '3203346'),
(3144, 8, 'Marilândia', '3203353'),
(3145, 8, 'Mimoso do Sul', '3203403'),
(3146, 8, 'Montanha', '3203502'),
(3147, 8, 'Mucurici', '3203601'),
(3148, 8, 'Muniz Freire', '3203700'),
(3149, 8, 'Muqui', '3203809'),
(3150, 8, 'Nova Venécia', '3203908'),
(3151, 8, 'Pancas', '3204005'),
(3152, 8, 'Pedro Canário', '3204054'),
(3153, 8, 'Pinheiros', '3204104'),
(3154, 8, 'Piúma', '3204203'),
(3155, 8, 'Ponto Belo', '3204252'),
(3156, 8, 'Presidente Kennedy', '3204302'),
(3157, 8, 'Rio Bananal', '3204351'),
(3158, 8, 'Rio Novo do Sul', '3204401'),
(3159, 8, 'Santa Leopoldina', '3204500'),
(3160, 8, 'Santa Maria de Jetibá', '3204559'),
(3161, 8, 'Santa Teresa', '3204609'),
(3162, 8, 'São Domingos do Norte', '3204658'),
(3163, 8, 'São Gabriel da Palha', '3204708'),
(3164, 8, 'São José do Calçado', '3204807'),
(3165, 8, 'São Mateus', '3204906'),
(3166, 8, 'São Roque do Canaã', '3204955'),
(3167, 8, 'Serra', '3205002'),
(3168, 8, 'Sooretama', '3205010'),
(3169, 8, 'Vargem Alta', '3205036'),
(3170, 8, 'Venda Nova do Imigrante', '3205069'),
(3171, 8, 'Viana', '3205101'),
(3172, 8, 'Vila Pavão', '3205150'),
(3173, 8, 'Vila Valério', '3205176'),
(3174, 8, 'Vila Velha', '3205200'),
(3175, 8, 'Vitória', '3205309'),
(3176, 19, 'Angra dos Reis', '3300100'),
(3177, 19, 'Aperibé', '3300159'),
(3178, 19, 'Araruama', '3300209'),
(3179, 19, 'Areal', '3300225'),
(3180, 19, 'Armação dos Búzios', '3300233'),
(3181, 19, 'Arraial do Cabo', '3300258'),
(3182, 19, 'Barra do Piraí', '3300308'),
(3183, 19, 'Barra Mansa', '3300407'),
(3184, 19, 'Belford Roxo', '3300456'),
(3185, 19, 'Bom Jardim', '3300506'),
(3186, 19, 'Bom Jesus do Itabapoana', '3300605'),
(3187, 19, 'Cabo Frio', '3300704'),
(3188, 19, 'Cachoeiras de Macacu', '3300803'),
(3189, 19, 'Cambuci', '3300902'),
(3190, 19, 'Carapebus', '3300936'),
(3191, 19, 'Comendador Levy Gasparian', '3300951'),
(3192, 19, 'Campos dos Goytacazes', '3301009'),
(3193, 19, 'Cantagalo', '3301108'),
(3194, 19, 'Cardoso Moreira', '3301157'),
(3195, 19, 'Carmo', '3301207'),
(3196, 19, 'Casimiro de Abreu', '3301306'),
(3197, 19, 'Conceição de Macabu', '3301405'),
(3198, 19, 'Cordeiro', '3301504'),
(3199, 19, 'Duas Barras', '3301603'),
(3200, 19, 'Duque de Caxias', '3301702'),
(3201, 19, 'Engenheiro Paulo de Frontin', '3301801'),
(3202, 19, 'Guapimirim', '3301850'),
(3203, 19, 'Iguaba Grande', '3301876'),
(3204, 19, 'Itaboraí', '3301900'),
(3205, 19, 'Itaguaí', '3302007'),
(3206, 19, 'Italva', '3302056'),
(3207, 19, 'Itaocara', '3302106'),
(3208, 19, 'Itaperuna', '3302205'),
(3209, 19, 'Itatiaia', '3302254'),
(3210, 19, 'Japeri', '3302270'),
(3211, 19, 'Laje do Muriaé', '3302304'),
(3212, 19, 'Macaé', '3302403'),
(3213, 19, 'Macuco', '3302452'),
(3214, 19, 'Magé', '3302502'),
(3215, 19, 'Mangaratiba', '3302601'),
(3216, 19, 'Maricá', '3302700'),
(3217, 19, 'Mendes', '3302809'),
(3218, 19, 'Mesquita', '3302858'),
(3219, 19, 'Miguel Pereira', '3302908'),
(3220, 19, 'Miracema', '3303005'),
(3221, 19, 'Natividade', '3303104'),
(3222, 19, 'Nilópolis', '3303203'),
(3223, 19, 'Niterói', '3303302'),
(3224, 19, 'Nova Friburgo', '3303401'),
(3225, 19, 'Nova Iguaçu', '3303500'),
(3226, 19, 'Paracambi', '3303609'),
(3227, 19, 'Paraíba do Sul', '3303708'),
(3228, 19, 'Paraty', '3303807'),
(3229, 19, 'Paty do Alferes', '3303856'),
(3230, 19, 'Petrópolis', '3303906'),
(3231, 19, 'Pinheiral', '3303955'),
(3232, 19, 'Piraí', '3304003'),
(3233, 19, 'Porciúncula', '3304102'),
(3234, 19, 'Porto Real', '3304110'),
(3235, 19, 'Quatis', '3304128'),
(3236, 19, 'Queimados', '3304144'),
(3237, 19, 'Quissamã', '3304151'),
(3238, 19, 'Resende', '3304201'),
(3239, 19, 'Rio Bonito', '3304300'),
(3240, 19, 'Rio Claro', '3304409'),
(3241, 19, 'Rio das Flores', '3304508'),
(3242, 19, 'Rio das Ostras', '3304524'),
(3243, 19, 'Rio de Janeiro', '3304557'),
(3244, 19, 'Santa Maria Madalena', '3304607'),
(3245, 19, 'Santo Antônio de Pádua', '3304706'),
(3246, 19, 'São Francisco de Itabapoana', '3304755'),
(3247, 19, 'São Fidélis', '3304805'),
(3248, 19, 'São Gonçalo', '3304904'),
(3249, 19, 'São João da Barra', '3305000'),
(3250, 19, 'São João de Meriti', '3305109'),
(3251, 19, 'São José de Ubá', '3305133'),
(3252, 19, 'São José do Vale do Rio Preto', '3305158'),
(3253, 19, 'São Pedro da Aldeia', '3305208'),
(3254, 19, 'São Sebastião do Alto', '3305307'),
(3255, 19, 'Sapucaia', '3305406'),
(3256, 19, 'Saquarema', '3305505'),
(3257, 19, 'Seropédica', '3305554'),
(3258, 19, 'Silva Jardim', '3305604'),
(3259, 19, 'Sumidouro', '3305703'),
(3260, 19, 'Tanguá', '3305752'),
(3261, 19, 'Teresópolis', '3305802'),
(3262, 19, 'Trajano de Moraes', '3305901'),
(3263, 19, 'Três Rios', '3306008'),
(3264, 19, 'Valença', '3306107'),
(3265, 19, 'Varre-Sai', '3306156'),
(3266, 19, 'Vassouras', '3306206'),
(3267, 19, 'Volta Redonda', '3306305'),
(3268, 26, 'Adamantina', '3500105'),
(3269, 26, 'Adolfo', '3500204'),
(3270, 26, 'Aguaí', '3500303'),
(3271, 26, 'Águas da Prata', '3500402'),
(3272, 26, 'Águas de Lindóia', '3500501'),
(3273, 26, 'Águas de Santa Bárbara', '3500550'),
(3274, 26, 'Águas de São Pedro', '3500600'),
(3275, 26, 'Agudos', '3500709'),
(3276, 26, 'Alambari', '3500758'),
(3277, 26, 'Alfredo Marcondes', '3500808'),
(3278, 26, 'Altair', '3500907'),
(3279, 26, 'Altinópolis', '3501004'),
(3280, 26, 'Alto Alegre', '3501103'),
(3281, 26, 'Alumínio', '3501152'),
(3282, 26, 'Álvares Florence', '3501202'),
(3283, 26, 'Álvares Machado', '3501301'),
(3284, 26, 'Álvaro de Carvalho', '3501400'),
(3285, 26, 'Alvinlândia', '3501509'),
(3286, 26, 'Americana', '3501608'),
(3287, 26, 'Américo Brasiliense', '3501707'),
(3288, 26, 'Américo de Campos', '3501806'),
(3289, 26, 'Amparo', '3501905'),
(3290, 26, 'Analândia', '3502002'),
(3291, 26, 'Andradina', '3502101'),
(3292, 26, 'Angatuba', '3502200'),
(3293, 26, 'Anhembi', '3502309'),
(3294, 26, 'Anhumas', '3502408'),
(3295, 26, 'Aparecida', '3502507'),
(3296, 26, 'Aparecida d\'Oeste', '3502606'),
(3297, 26, 'Apiaí', '3502705'),
(3298, 26, 'Araçariguama', '3502754'),
(3299, 26, 'Araçatuba', '3502804'),
(3300, 26, 'Araçoiaba da Serra', '3502903'),
(3301, 26, 'Aramina', '3503000'),
(3302, 26, 'Arandu', '3503109'),
(3303, 26, 'Arapeí', '3503158'),
(3304, 26, 'Araraquara', '3503208'),
(3305, 26, 'Araras', '3503307'),
(3306, 26, 'Arco-Íris', '3503356'),
(3307, 26, 'Arealva', '3503406'),
(3308, 26, 'Areias', '3503505'),
(3309, 26, 'Areiópolis', '3503604'),
(3310, 26, 'Ariranha', '3503703'),
(3311, 26, 'Artur Nogueira', '3503802'),
(3312, 26, 'Arujá', '3503901'),
(3313, 26, 'Aspásia', '3503950'),
(3314, 26, 'Assis', '3504008'),
(3315, 26, 'Atibaia', '3504107'),
(3316, 26, 'Auriflama', '3504206'),
(3317, 26, 'Avaí', '3504305'),
(3318, 26, 'Avanhandava', '3504404'),
(3319, 26, 'Avaré', '3504503'),
(3320, 26, 'Bady Bassitt', '3504602'),
(3321, 26, 'Balbinos', '3504701'),
(3322, 26, 'Bálsamo', '3504800'),
(3323, 26, 'Bananal', '3504909'),
(3324, 26, 'Barão de Antonina', '3505005'),
(3325, 26, 'Barbosa', '3505104'),
(3326, 26, 'Bariri', '3505203'),
(3327, 26, 'Barra Bonita', '3505302'),
(3328, 26, 'Barra do Chapéu', '3505351'),
(3329, 26, 'Barra do Turvo', '3505401'),
(3330, 26, 'Barretos', '3505500'),
(3331, 26, 'Barrinha', '3505609'),
(3332, 26, 'Barueri', '3505708'),
(3333, 26, 'Bastos', '3505807'),
(3334, 26, 'Batatais', '3505906'),
(3335, 26, 'Bauru', '3506003'),
(3336, 26, 'Bebedouro', '3506102'),
(3337, 26, 'Bento de Abreu', '3506201'),
(3338, 26, 'Bernardino de Campos', '3506300'),
(3339, 26, 'Bertioga', '3506359'),
(3340, 26, 'Bilac', '3506409'),
(3341, 26, 'Birigui', '3506508'),
(3342, 26, 'Biritiba-Mirim', '3506607'),
(3343, 26, 'Boa Esperança do Sul', '3506706'),
(3344, 26, 'Bocaina', '3506805'),
(3345, 26, 'Bofete', '3506904'),
(3346, 26, 'Boituva', '3507001'),
(3347, 26, 'Bom Jesus dos Perdões', '3507100'),
(3348, 26, 'Bom Sucesso de Itararé', '3507159'),
(3349, 26, 'Borá', '3507209'),
(3350, 26, 'Boracéia', '3507308'),
(3351, 26, 'Borborema', '3507407'),
(3352, 26, 'Borebi', '3507456'),
(3353, 26, 'Botucatu', '3507506'),
(3354, 26, 'Bragança Paulista', '3507605'),
(3355, 26, 'Braúna', '3507704'),
(3356, 26, 'Brejo Alegre', '3507753'),
(3357, 26, 'Brodowski', '3507803'),
(3358, 26, 'Brotas', '3507902'),
(3359, 26, 'Buri', '3508009'),
(3360, 26, 'Buritama', '3508108'),
(3361, 26, 'Buritizal', '3508207'),
(3362, 26, 'Cabrália Paulista', '3508306'),
(3363, 26, 'Cabreúva', '3508405'),
(3364, 26, 'Caçapava', '3508504'),
(3365, 26, 'Cachoeira Paulista', '3508603'),
(3366, 26, 'Caconde', '3508702'),
(3367, 26, 'Cafelândia', '3508801'),
(3368, 26, 'Caiabu', '3508900'),
(3369, 26, 'Caieiras', '3509007'),
(3370, 26, 'Caiuá', '3509106'),
(3371, 26, 'Cajamar', '3509205'),
(3372, 26, 'Cajati', '3509254'),
(3373, 26, 'Cajobi', '3509304'),
(3374, 26, 'Cajuru', '3509403'),
(3375, 26, 'Campina do Monte Alegre', '3509452'),
(3376, 26, 'Campinas', '3509502'),
(3377, 26, 'Campo Limpo Paulista', '3509601'),
(3378, 26, 'Campos do Jordão', '3509700'),
(3379, 26, 'Campos Novos Paulista', '3509809'),
(3380, 26, 'Cananéia', '3509908'),
(3381, 26, 'Canas', '3509957'),
(3382, 26, 'Cândido Mota', '3510005'),
(3383, 26, 'Cândido Rodrigues', '3510104'),
(3384, 26, 'Canitar', '3510153'),
(3385, 26, 'Capão Bonito', '3510203'),
(3386, 26, 'Capela do Alto', '3510302'),
(3387, 26, 'Capivari', '3510401'),
(3388, 26, 'Caraguatatuba', '3510500'),
(3389, 26, 'Carapicuíba', '3510609'),
(3390, 26, 'Cardoso', '3510708'),
(3391, 26, 'Casa Branca', '3510807'),
(3392, 26, 'Cássia dos Coqueiros', '3510906'),
(3393, 26, 'Castilho', '3511003'),
(3394, 26, 'Catanduva', '3511102'),
(3395, 26, 'Catiguá', '3511201'),
(3396, 26, 'Cedral', '3511300'),
(3397, 26, 'Cerqueira César', '3511409'),
(3398, 26, 'Cerquilho', '3511508'),
(3399, 26, 'Cesário Lange', '3511607'),
(3400, 26, 'Charqueada', '3511706'),
(3401, 26, 'Clementina', '3511904'),
(3402, 26, 'Colina', '3512001'),
(3403, 26, 'Colômbia', '3512100'),
(3404, 26, 'Conchal', '3512209'),
(3405, 26, 'Conchas', '3512308'),
(3406, 26, 'Cordeirópolis', '3512407'),
(3407, 26, 'Coroados', '3512506'),
(3408, 26, 'Coronel Macedo', '3512605'),
(3409, 26, 'Corumbataí', '3512704'),
(3410, 26, 'Cosmópolis', '3512803'),
(3411, 26, 'Cosmorama', '3512902'),
(3412, 26, 'Cotia', '3513009'),
(3413, 26, 'Cravinhos', '3513108'),
(3414, 26, 'Cristais Paulista', '3513207'),
(3415, 26, 'Cruzália', '3513306'),
(3416, 26, 'Cruzeiro', '3513405'),
(3417, 26, 'Cubatão', '3513504'),
(3418, 26, 'Cunha', '3513603'),
(3419, 26, 'Descalvado', '3513702'),
(3420, 26, 'Diadema', '3513801'),
(3421, 26, 'Dirce Reis', '3513850'),
(3422, 26, 'Divinolândia', '3513900'),
(3423, 26, 'Dobrada', '3514007'),
(3424, 26, 'Dois Córregos', '3514106'),
(3425, 26, 'Dolcinópolis', '3514205'),
(3426, 26, 'Dourado', '3514304'),
(3427, 26, 'Dracena', '3514403'),
(3428, 26, 'Duartina', '3514502'),
(3429, 26, 'Dumont', '3514601'),
(3430, 26, 'Echaporã', '3514700'),
(3431, 26, 'Eldorado', '3514809'),
(3432, 26, 'Elias Fausto', '3514908'),
(3433, 26, 'Elisiário', '3514924'),
(3434, 26, 'Embaúba', '3514957'),
(3435, 26, 'Embu das Artes', '3515004'),
(3436, 26, 'Embu-Guaçu', '3515103'),
(3437, 26, 'Emilianópolis', '3515129'),
(3438, 26, 'Engenheiro Coelho', '3515152'),
(3439, 26, 'Espírito Santo do Pinhal', '3515186'),
(3440, 26, 'Espírito Santo do Turvo', '3515194'),
(3441, 26, 'Estrela d\'Oeste', '3515202'),
(3442, 26, 'Estrela do Norte', '3515301'),
(3443, 26, 'Euclides da Cunha Paulista', '3515350'),
(3444, 26, 'Fartura', '3515400'),
(3445, 26, 'Fernandópolis', '3515509'),
(3446, 26, 'Fernando Prestes', '3515608'),
(3447, 26, 'Fernão', '3515657'),
(3448, 26, 'Ferraz de Vasconcelos', '3515707'),
(3449, 26, 'Flora Rica', '3515806'),
(3450, 26, 'Floreal', '3515905'),
(3451, 26, 'Flórida Paulista', '3516002'),
(3452, 26, 'Florínia', '3516101'),
(3453, 26, 'Franca', '3516200'),
(3454, 26, 'Francisco Morato', '3516309'),
(3455, 26, 'Franco da Rocha', '3516408'),
(3456, 26, 'Gabriel Monteiro', '3516507'),
(3457, 26, 'Gália', '3516606'),
(3458, 26, 'Garça', '3516705'),
(3459, 26, 'Gastão Vidigal', '3516804'),
(3460, 26, 'Gavião Peixoto', '3516853'),
(3461, 26, 'General Salgado', '3516903'),
(3462, 26, 'Getulina', '3517000'),
(3463, 26, 'Glicério', '3517109'),
(3464, 26, 'Guaiçara', '3517208'),
(3465, 26, 'Guaimbê', '3517307'),
(3466, 26, 'Guaíra', '3517406'),
(3467, 26, 'Guapiaçu', '3517505'),
(3468, 26, 'Guapiara', '3517604'),
(3469, 26, 'Guará', '3517703'),
(3470, 26, 'Guaraçaí', '3517802'),
(3471, 26, 'Guaraci', '3517901'),
(3472, 26, 'Guarani d\'Oeste', '3518008'),
(3473, 26, 'Guarantã', '3518107'),
(3474, 26, 'Guararapes', '3518206'),
(3475, 26, 'Guararema', '3518305'),
(3476, 26, 'Guaratinguetá', '3518404'),
(3477, 26, 'Guareí', '3518503'),
(3478, 26, 'Guariba', '3518602'),
(3479, 26, 'Guarujá', '3518701'),
(3480, 26, 'Guarulhos', '3518800'),
(3481, 26, 'Guatapará', '3518859'),
(3482, 26, 'Guzolândia', '3518909'),
(3483, 26, 'Herculândia', '3519006'),
(3484, 26, 'Holambra', '3519055'),
(3485, 26, 'Hortolândia', '3519071'),
(3486, 26, 'Iacanga', '3519105'),
(3487, 26, 'Iacri', '3519204'),
(3488, 26, 'Iaras', '3519253'),
(3489, 26, 'Ibaté', '3519303'),
(3490, 26, 'Ibirá', '3519402'),
(3491, 26, 'Ibirarema', '3519501'),
(3492, 26, 'Ibitinga', '3519600'),
(3493, 26, 'Ibiúna', '3519709'),
(3494, 26, 'Icém', '3519808'),
(3495, 26, 'Iepê', '3519907'),
(3496, 26, 'Igaraçu do Tietê', '3520004'),
(3497, 26, 'Igarapava', '3520103'),
(3498, 26, 'Igaratá', '3520202'),
(3499, 26, 'Iguape', '3520301'),
(3500, 26, 'Ilhabela', '3520400'),
(3501, 26, 'Ilha Comprida', '3520426'),
(3502, 26, 'Ilha Solteira', '3520442'),
(3503, 26, 'Indaiatuba', '3520509'),
(3504, 26, 'Indiana', '3520608'),
(3505, 26, 'Indiaporã', '3520707'),
(3506, 26, 'Inúbia Paulista', '3520806'),
(3507, 26, 'Ipaussu', '3520905'),
(3508, 26, 'Iperó', '3521002'),
(3509, 26, 'Ipeúna', '3521101'),
(3510, 26, 'Ipiguá', '3521150'),
(3511, 26, 'Iporanga', '3521200'),
(3512, 26, 'Ipuã', '3521309'),
(3513, 26, 'Iracemápolis', '3521408'),
(3514, 26, 'Irapuã', '3521507'),
(3515, 26, 'Irapuru', '3521606'),
(3516, 26, 'Itaberá', '3521705'),
(3517, 26, 'Itaí', '3521804'),
(3518, 26, 'Itajobi', '3521903'),
(3519, 26, 'Itaju', '3522000'),
(3520, 26, 'Itanhaém', '3522109'),
(3521, 26, 'Itaóca', '3522158'),
(3522, 26, 'Itapecerica da Serra', '3522208'),
(3523, 26, 'Itapetininga', '3522307'),
(3524, 26, 'Itapeva', '3522406'),
(3525, 26, 'Itapevi', '3522505'),
(3526, 26, 'Itapira', '3522604'),
(3527, 26, 'Itapirapuã Paulista', '3522653'),
(3528, 26, 'Itápolis', '3522703'),
(3529, 26, 'Itaporanga', '3522802'),
(3530, 26, 'Itapuí', '3522901'),
(3531, 26, 'Itapura', '3523008'),
(3532, 26, 'Itaquaquecetuba', '3523107'),
(3533, 26, 'Itararé', '3523206'),
(3534, 26, 'Itariri', '3523305'),
(3535, 26, 'Itatiba', '3523404'),
(3536, 26, 'Itatinga', '3523503'),
(3537, 26, 'Itirapina', '3523602'),
(3538, 26, 'Itirapuã', '3523701'),
(3539, 26, 'Itobi', '3523800'),
(3540, 26, 'Itu', '3523909'),
(3541, 26, 'Itupeva', '3524006'),
(3542, 26, 'Ituverava', '3524105'),
(3543, 26, 'Jaborandi', '3524204'),
(3544, 26, 'Jaboticabal', '3524303'),
(3545, 26, 'Jacareí', '3524402'),
(3546, 26, 'Jaci', '3524501'),
(3547, 26, 'Jacupiranga', '3524600'),
(3548, 26, 'Jaguariúna', '3524709'),
(3549, 26, 'Jales', '3524808'),
(3550, 26, 'Jambeiro', '3524907'),
(3551, 26, 'Jandira', '3525003'),
(3552, 26, 'Jardinópolis', '3525102'),
(3553, 26, 'Jarinu', '3525201'),
(3554, 26, 'Jaú', '3525300'),
(3555, 26, 'Jeriquara', '3525409'),
(3556, 26, 'Joanópolis', '3525508'),
(3557, 26, 'João Ramalho', '3525607'),
(3558, 26, 'José Bonifácio', '3525706'),
(3559, 26, 'Júlio Mesquita', '3525805'),
(3560, 26, 'Jumirim', '3525854'),
(3561, 26, 'Jundiaí', '3525904'),
(3562, 26, 'Junqueirópolis', '3526001'),
(3563, 26, 'Juquiá', '3526100'),
(3564, 26, 'Juquitiba', '3526209'),
(3565, 26, 'Lagoinha', '3526308'),
(3566, 26, 'Laranjal Paulista', '3526407'),
(3567, 26, 'Lavínia', '3526506'),
(3568, 26, 'Lavrinhas', '3526605'),
(3569, 26, 'Leme', '3526704'),
(3570, 26, 'Lençóis Paulista', '3526803'),
(3571, 26, 'Limeira', '3526902'),
(3572, 26, 'Lindóia', '3527009'),
(3573, 26, 'Lins', '3527108'),
(3574, 26, 'Lorena', '3527207'),
(3575, 26, 'Lourdes', '3527256'),
(3576, 26, 'Louveira', '3527306'),
(3577, 26, 'Lucélia', '3527405'),
(3578, 26, 'Lucianópolis', '3527504'),
(3579, 26, 'Luís Antônio', '3527603'),
(3580, 26, 'Luiziânia', '3527702'),
(3581, 26, 'Lupércio', '3527801'),
(3582, 26, 'Lutécia', '3527900'),
(3583, 26, 'Macatuba', '3528007'),
(3584, 26, 'Macaubal', '3528106'),
(3585, 26, 'Macedônia', '3528205'),
(3586, 26, 'Magda', '3528304'),
(3587, 26, 'Mairinque', '3528403'),
(3588, 26, 'Mairiporã', '3528502'),
(3589, 26, 'Manduri', '3528601'),
(3590, 26, 'Marabá Paulista', '3528700'),
(3591, 26, 'Maracaí', '3528809'),
(3592, 26, 'Marapoama', '3528858'),
(3593, 26, 'Mariápolis', '3528908'),
(3594, 26, 'Marília', '3529005'),
(3595, 26, 'Marinópolis', '3529104'),
(3596, 26, 'Martinópolis', '3529203'),
(3597, 26, 'Matão', '3529302'),
(3598, 26, 'Mauá', '3529401'),
(3599, 26, 'Mendonça', '3529500'),
(3600, 26, 'Meridiano', '3529609'),
(3601, 26, 'Mesópolis', '3529658'),
(3602, 26, 'Miguelópolis', '3529708'),
(3603, 26, 'Mineiros do Tietê', '3529807'),
(3604, 26, 'Miracatu', '3529906'),
(3605, 26, 'Mira Estrela', '3530003'),
(3606, 26, 'Mirandópolis', '3530102'),
(3607, 26, 'Mirante do Paranapanema', '3530201'),
(3608, 26, 'Mirassol', '3530300'),
(3609, 26, 'Mirassolândia', '3530409'),
(3610, 26, 'Mococa', '3530508'),
(3611, 26, 'Mogi das Cruzes', '3530607'),
(3612, 26, 'Mogi Guaçu', '3530706'),
(3613, 26, 'Mogi Mirim', '3530805'),
(3614, 26, 'Mombuca', '3530904'),
(3615, 26, 'Monções', '3531001'),
(3616, 26, 'Mongaguá', '3531100'),
(3617, 26, 'Monte Alegre do Sul', '3531209'),
(3618, 26, 'Monte Alto', '3531308'),
(3619, 26, 'Monte Aprazível', '3531407'),
(3620, 26, 'Monte Azul Paulista', '3531506'),
(3621, 26, 'Monte Castelo', '3531605'),
(3622, 26, 'Monteiro Lobato', '3531704'),
(3623, 26, 'Monte Mor', '3531803'),
(3624, 26, 'Morro Agudo', '3531902'),
(3625, 26, 'Morungaba', '3532009'),
(3626, 26, 'Motuca', '3532058'),
(3627, 26, 'Murutinga do Sul', '3532108'),
(3628, 26, 'Nantes', '3532157'),
(3629, 26, 'Narandiba', '3532207'),
(3630, 26, 'Natividade da Serra', '3532306'),
(3631, 26, 'Nazaré Paulista', '3532405'),
(3632, 26, 'Neves Paulista', '3532504'),
(3633, 26, 'Nhandeara', '3532603'),
(3634, 26, 'Nipoã', '3532702'),
(3635, 26, 'Nova Aliança', '3532801'),
(3636, 26, 'Nova Campina', '3532827'),
(3637, 26, 'Nova Canaã Paulista', '3532843'),
(3638, 26, 'Nova Castilho', '3532868'),
(3639, 26, 'Nova Europa', '3532900'),
(3640, 26, 'Nova Granada', '3533007'),
(3641, 26, 'Nova Guataporanga', '3533106'),
(3642, 26, 'Nova Independência', '3533205'),
(3643, 26, 'Novais', '3533254'),
(3644, 26, 'Nova Luzitânia', '3533304'),
(3645, 26, 'Nova Odessa', '3533403'),
(3646, 26, 'Novo Horizonte', '3533502'),
(3647, 26, 'Nuporanga', '3533601'),
(3648, 26, 'Ocauçu', '3533700'),
(3649, 26, 'Óleo', '3533809'),
(3650, 26, 'Olímpia', '3533908'),
(3651, 26, 'Onda Verde', '3534005'),
(3652, 26, 'Oriente', '3534104'),
(3653, 26, 'Orindiúva', '3534203'),
(3654, 26, 'Orlândia', '3534302'),
(3655, 26, 'Osasco', '3534401'),
(3656, 26, 'Oscar Bressane', '3534500'),
(3657, 26, 'Osvaldo Cruz', '3534609'),
(3658, 26, 'Ourinhos', '3534708'),
(3659, 26, 'Ouroeste', '3534757'),
(3660, 26, 'Ouro Verde', '3534807'),
(3661, 26, 'Pacaembu', '3534906'),
(3662, 26, 'Palestina', '3535002'),
(3663, 26, 'Palmares Paulista', '3535101'),
(3664, 26, 'Palmeira d\'Oeste', '3535200'),
(3665, 26, 'Palmital', '3535309'),
(3666, 26, 'Panorama', '3535408'),
(3667, 26, 'Paraguaçu Paulista', '3535507'),
(3668, 26, 'Paraibuna', '3535606'),
(3669, 26, 'Paraíso', '3535705'),
(3670, 26, 'Paranapanema', '3535804'),
(3671, 26, 'Paranapuã', '3535903'),
(3672, 26, 'Parapuã', '3536000'),
(3673, 26, 'Pardinho', '3536109'),
(3674, 26, 'Pariquera-Açu', '3536208'),
(3675, 26, 'Parisi', '3536257'),
(3676, 26, 'Patrocínio Paulista', '3536307'),
(3677, 26, 'Paulicéia', '3536406'),
(3678, 26, 'Paulínia', '3536505'),
(3679, 26, 'Paulistânia', '3536570'),
(3680, 26, 'Paulo de Faria', '3536604'),
(3681, 26, 'Pederneiras', '3536703'),
(3682, 26, 'Pedra Bela', '3536802'),
(3683, 26, 'Pedranópolis', '3536901'),
(3684, 26, 'Pedregulho', '3537008'),
(3685, 26, 'Pedreira', '3537107'),
(3686, 26, 'Pedrinhas Paulista', '3537156'),
(3687, 26, 'Pedro de Toledo', '3537206'),
(3688, 26, 'Penápolis', '3537305'),
(3689, 26, 'Pereira Barreto', '3537404'),
(3690, 26, 'Pereiras', '3537503'),
(3691, 26, 'Peruíbe', '3537602'),
(3692, 26, 'Piacatu', '3537701'),
(3693, 26, 'Piedade', '3537800'),
(3694, 26, 'Pilar do Sul', '3537909'),
(3695, 26, 'Pindamonhangaba', '3538006'),
(3696, 26, 'Pindorama', '3538105'),
(3697, 26, 'Pinhalzinho', '3538204'),
(3698, 26, 'Piquerobi', '3538303'),
(3699, 26, 'Piquete', '3538501'),
(3700, 26, 'Piracaia', '3538600'),
(3701, 26, 'Piracicaba', '3538709'),
(3702, 26, 'Piraju', '3538808'),
(3703, 26, 'Pirajuí', '3538907'),
(3704, 26, 'Pirangi', '3539004'),
(3705, 26, 'Pirapora do Bom Jesus', '3539103'),
(3706, 26, 'Pirapozinho', '3539202'),
(3707, 26, 'Pirassununga', '3539301'),
(3708, 26, 'Piratininga', '3539400'),
(3709, 26, 'Pitangueiras', '3539509'),
(3710, 26, 'Planalto', '3539608'),
(3711, 26, 'Platina', '3539707'),
(3712, 26, 'Poá', '3539806'),
(3713, 26, 'Poloni', '3539905'),
(3714, 26, 'Pompéia', '3540002'),
(3715, 26, 'Pongaí', '3540101'),
(3716, 26, 'Pontal', '3540200'),
(3717, 26, 'Pontalinda', '3540259'),
(3718, 26, 'Pontes Gestal', '3540309'),
(3719, 26, 'Populina', '3540408'),
(3720, 26, 'Porangaba', '3540507'),
(3721, 26, 'Porto Feliz', '3540606'),
(3722, 26, 'Porto Ferreira', '3540705'),
(3723, 26, 'Potim', '3540754'),
(3724, 26, 'Potirendaba', '3540804'),
(3725, 26, 'Pracinha', '3540853'),
(3726, 26, 'Pradópolis', '3540903'),
(3727, 26, 'Praia Grande', '3541000'),
(3728, 26, 'Pratânia', '3541059'),
(3729, 26, 'Presidente Alves', '3541109'),
(3730, 26, 'Presidente Bernardes', '3541208'),
(3731, 26, 'Presidente Epitácio', '3541307'),
(3732, 26, 'Presidente Prudente', '3541406'),
(3733, 26, 'Presidente Venceslau', '3541505'),
(3734, 26, 'Promissão', '3541604'),
(3735, 26, 'Quadra', '3541653'),
(3736, 26, 'Quatá', '3541703'),
(3737, 26, 'Queiroz', '3541802'),
(3738, 26, 'Queluz', '3541901'),
(3739, 26, 'Quintana', '3542008'),
(3740, 26, 'Rafard', '3542107'),
(3741, 26, 'Rancharia', '3542206'),
(3742, 26, 'Redenção da Serra', '3542305'),
(3743, 26, 'Regente Feijó', '3542404'),
(3744, 26, 'Reginópolis', '3542503'),
(3745, 26, 'Registro', '3542602'),
(3746, 26, 'Restinga', '3542701'),
(3747, 26, 'Ribeira', '3542800'),
(3748, 26, 'Ribeirão Bonito', '3542909'),
(3749, 26, 'Ribeirão Branco', '3543006'),
(3750, 26, 'Ribeirão Corrente', '3543105'),
(3751, 26, 'Ribeirão do Sul', '3543204'),
(3752, 26, 'Ribeirão dos Índios', '3543238'),
(3753, 26, 'Ribeirão Grande', '3543253'),
(3754, 26, 'Ribeirão Pires', '3543303'),
(3755, 26, 'Ribeirão Preto', '3543402'),
(3756, 26, 'Riversul', '3543501'),
(3757, 26, 'Rifaina', '3543600'),
(3758, 26, 'Rincão', '3543709'),
(3759, 26, 'Rinópolis', '3543808'),
(3760, 26, 'Rio Claro', '3543907'),
(3761, 26, 'Rio das Pedras', '3544004'),
(3762, 26, 'Rio Grande da Serra', '3544103'),
(3763, 26, 'Riolândia', '3544202'),
(3764, 26, 'Rosana', '3544251'),
(3765, 26, 'Roseira', '3544301'),
(3766, 26, 'Rubiácea', '3544400'),
(3767, 26, 'Rubinéia', '3544509'),
(3768, 26, 'Sabino', '3544608'),
(3769, 26, 'Sagres', '3544707'),
(3770, 26, 'Sales', '3544806'),
(3771, 26, 'Sales Oliveira', '3544905'),
(3772, 26, 'Salesópolis', '3545001'),
(3773, 26, 'Salmourão', '3545100'),
(3774, 26, 'Saltinho', '3545159'),
(3775, 26, 'Salto', '3545209'),
(3776, 26, 'Salto de Pirapora', '3545308'),
(3777, 26, 'Salto Grande', '3545407'),
(3778, 26, 'Sandovalina', '3545506'),
(3779, 26, 'Santa Adélia', '3545605'),
(3780, 26, 'Santa Albertina', '3545704'),
(3781, 26, 'Santa Bárbara d\'Oeste', '3545803'),
(3782, 26, 'Santa Branca', '3546009'),
(3783, 26, 'Santa Clara d\'Oeste', '3546108'),
(3784, 26, 'Santa Cruz da Conceição', '3546207'),
(3785, 26, 'Santa Cruz da Esperança', '3546256'),
(3786, 26, 'Santa Cruz das Palmeiras', '3546306'),
(3787, 26, 'Santa Cruz do Rio Pardo', '3546405'),
(3788, 26, 'Santa Ernestina', '3546504'),
(3789, 26, 'Santa Fé do Sul', '3546603'),
(3790, 26, 'Santa Gertrudes', '3546702'),
(3791, 26, 'Santa Isabel', '3546801'),
(3792, 26, 'Santa Lúcia', '3546900'),
(3793, 26, 'Santa Maria da Serra', '3547007'),
(3794, 26, 'Santa Mercedes', '3547106'),
(3795, 26, 'Santana da Ponte Pensa', '3547205'),
(3796, 26, 'Santana de Parnaíba', '3547304'),
(3797, 26, 'Santa Rita d\'Oeste', '3547403'),
(3798, 26, 'Santa Rita do Passa Quatro', '3547502'),
(3799, 26, 'Santa Rosa de Viterbo', '3547601'),
(3800, 26, 'Santa Salete', '3547650'),
(3801, 26, 'Santo Anastácio', '3547700'),
(3802, 26, 'Santo André', '3547809'),
(3803, 26, 'Santo Antônio da Alegria', '3547908'),
(3804, 26, 'Santo Antônio de Posse', '3548005'),
(3805, 26, 'Santo Antônio do Aracanguá', '3548054'),
(3806, 26, 'Santo Antônio do Jardim', '3548104'),
(3807, 26, 'Santo Antônio do Pinhal', '3548203'),
(3808, 26, 'Santo Expedito', '3548302'),
(3809, 26, 'Santópolis do Aguapeí', '3548401'),
(3810, 26, 'Santos', '3548500'),
(3811, 26, 'São Bento do Sapucaí', '3548609'),
(3812, 26, 'São Bernardo do Campo', '3548708'),
(3813, 26, 'São Caetano do Sul', '3548807'),
(3814, 26, 'São Carlos', '3548906'),
(3815, 26, 'São Francisco', '3549003'),
(3816, 26, 'São João da Boa Vista', '3549102'),
(3817, 26, 'São João das Duas Pontes', '3549201'),
(3818, 26, 'São João de Iracema', '3549250'),
(3819, 26, 'São João do Pau d\'Alho', '3549300'),
(3820, 26, 'São Joaquim da Barra', '3549409'),
(3821, 26, 'São José da Bela Vista', '3549508'),
(3822, 26, 'São José do Barreiro', '3549607'),
(3823, 26, 'São José do Rio Pardo', '3549706'),
(3824, 26, 'São José do Rio Preto', '3549805'),
(3825, 26, 'São José dos Campos', '3549904'),
(3826, 26, 'São Lourenço da Serra', '3549953'),
(3827, 26, 'São Luís do Paraitinga', '3550001'),
(3828, 26, 'São Manuel', '3550100'),
(3829, 26, 'São Miguel Arcanjo', '3550209'),
(3830, 26, 'São Paulo', '3550308'),
(3831, 26, 'São Pedro', '3550407'),
(3832, 26, 'São Pedro do Turvo', '3550506'),
(3833, 26, 'São Roque', '3550605'),
(3834, 26, 'São Sebastião', '3550704'),
(3835, 26, 'São Sebastião da Grama', '3550803'),
(3836, 26, 'São Simão', '3550902'),
(3837, 26, 'São Vicente', '3551009'),
(3838, 26, 'Sarapuí', '3551108'),
(3839, 26, 'Sarutaiá', '3551207'),
(3840, 26, 'Sebastianópolis do Sul', '3551306'),
(3841, 26, 'Serra Azul', '3551405'),
(3842, 26, 'Serrana', '3551504'),
(3843, 26, 'Serra Negra', '3551603'),
(3844, 26, 'Sertãozinho', '3551702'),
(3845, 26, 'Sete Barras', '3551801'),
(3846, 26, 'Severínia', '3551900'),
(3847, 26, 'Silveiras', '3552007'),
(3848, 26, 'Socorro', '3552106'),
(3849, 26, 'Sorocaba', '3552205'),
(3850, 26, 'Sud Mennucci', '3552304'),
(3851, 26, 'Sumaré', '3552403'),
(3852, 26, 'Suzano', '3552502'),
(3853, 26, 'Suzanápolis', '3552551'),
(3854, 26, 'Tabapuã', '3552601'),
(3855, 26, 'Tabatinga', '3552700'),
(3856, 26, 'Taboão da Serra', '3552809'),
(3857, 26, 'Taciba', '3552908'),
(3858, 26, 'Taguaí', '3553005'),
(3859, 26, 'Taiaçu', '3553104'),
(3860, 26, 'Taiúva', '3553203'),
(3861, 26, 'Tambaú', '3553302'),
(3862, 26, 'Tanabi', '3553401'),
(3863, 26, 'Tapiraí', '3553500'),
(3864, 26, 'Tapiratiba', '3553609'),
(3865, 26, 'Taquaral', '3553658'),
(3866, 26, 'Taquaritinga', '3553708'),
(3867, 26, 'Taquarituba', '3553807'),
(3868, 26, 'Taquarivaí', '3553856'),
(3869, 26, 'Tarabai', '3553906'),
(3870, 26, 'Tarumã', '3553955'),
(3871, 26, 'Tatuí', '3554003'),
(3872, 26, 'Taubaté', '3554102'),
(3873, 26, 'Tejupá', '3554201'),
(3874, 26, 'Teodoro Sampaio', '3554300'),
(3875, 26, 'Terra Roxa', '3554409'),
(3876, 26, 'Tietê', '3554508'),
(3877, 26, 'Timburi', '3554607'),
(3878, 26, 'Torre de Pedra', '3554656'),
(3879, 26, 'Torrinha', '3554706'),
(3880, 26, 'Trabiju', '3554755'),
(3881, 26, 'Tremembé', '3554805'),
(3882, 26, 'Três Fronteiras', '3554904'),
(3883, 26, 'Tuiuti', '3554953'),
(3884, 26, 'Tupã', '3555000'),
(3885, 26, 'Tupi Paulista', '3555109'),
(3886, 26, 'Turiúba', '3555208'),
(3887, 26, 'Turmalina', '3555307'),
(3888, 26, 'Ubarana', '3555356'),
(3889, 26, 'Ubatuba', '3555406'),
(3890, 26, 'Ubirajara', '3555505'),
(3891, 26, 'Uchoa', '3555604'),
(3892, 26, 'União Paulista', '3555703'),
(3893, 26, 'Urânia', '3555802'),
(3894, 26, 'Uru', '3555901'),
(3895, 26, 'Urupês', '3556008'),
(3896, 26, 'Valentim Gentil', '3556107'),
(3897, 26, 'Valinhos', '3556206'),
(3898, 26, 'Valparaíso', '3556305'),
(3899, 26, 'Vargem', '3556354'),
(3900, 26, 'Vargem Grande do Sul', '3556404'),
(3901, 26, 'Vargem Grande Paulista', '3556453'),
(3902, 26, 'Várzea Paulista', '3556503'),
(3903, 26, 'Vera Cruz', '3556602'),
(3904, 26, 'Vinhedo', '3556701'),
(3905, 26, 'Viradouro', '3556800'),
(3906, 26, 'Vista Alegre do Alto', '3556909'),
(3907, 26, 'Vitória Brasil', '3556958'),
(3908, 26, 'Votorantim', '3557006'),
(3909, 26, 'Votuporanga', '3557105'),
(3910, 26, 'Zacarias', '3557154'),
(3911, 26, 'Chavantes', '3557204'),
(3912, 26, 'Estiva Gerbi', '3557303'),
(3913, 14, 'Abatiá', '4100103'),
(3914, 14, 'Adrianópolis', '4100202'),
(3915, 14, 'Agudos do Sul', '4100301'),
(3916, 14, 'Almirante Tamandaré', '4100400'),
(3917, 14, 'Altamira do Paraná', '4100459'),
(3918, 14, 'Altônia', '4100509'),
(3919, 14, 'Alto Paraná', '4100608'),
(3920, 14, 'Alto Piquiri', '4100707'),
(3921, 14, 'Alvorada do Sul', '4100806'),
(3922, 14, 'Amaporã', '4100905'),
(3923, 14, 'Ampére', '4101002'),
(3924, 14, 'Anahy', '4101051'),
(3925, 14, 'Andirá', '4101101'),
(3926, 14, 'Ângulo', '4101150'),
(3927, 14, 'Antonina', '4101200'),
(3928, 14, 'Antônio Olinto', '4101309'),
(3929, 14, 'Apucarana', '4101408'),
(3930, 14, 'Arapongas', '4101507'),
(3931, 14, 'Arapoti', '4101606'),
(3932, 14, 'Arapuã', '4101655'),
(3933, 14, 'Araruna', '4101705'),
(3934, 14, 'Araucária', '4101804'),
(3935, 14, 'Ariranha do Ivaí', '4101853'),
(3936, 14, 'Assaí', '4101903'),
(3937, 14, 'Assis Chateaubriand', '4102000'),
(3938, 14, 'Astorga', '4102109'),
(3939, 14, 'Atalaia', '4102208'),
(3940, 14, 'Balsa Nova', '4102307'),
(3941, 14, 'Bandeirantes', '4102406'),
(3942, 14, 'Barbosa Ferraz', '4102505'),
(3943, 14, 'Barracão', '4102604'),
(3944, 14, 'Barra do Jacaré', '4102703'),
(3945, 14, 'Bela Vista da Caroba', '4102752'),
(3946, 14, 'Bela Vista do Paraíso', '4102802'),
(3947, 14, 'Bituruna', '4102901'),
(3948, 14, 'Boa Esperança', '4103008'),
(3949, 14, 'Boa Esperança do Iguaçu', '4103024'),
(3950, 14, 'Boa Ventura de São Roque', '4103040'),
(3951, 14, 'Boa Vista da Aparecida', '4103057'),
(3952, 14, 'Bocaiúva do Sul', '4103107'),
(3953, 14, 'Bom Jesus do Sul', '4103156'),
(3954, 14, 'Bom Sucesso', '4103206'),
(3955, 14, 'Bom Sucesso do Sul', '4103222'),
(3956, 14, 'Borrazópolis', '4103305'),
(3957, 14, 'Braganey', '4103354'),
(3958, 14, 'Brasilândia do Sul', '4103370'),
(3959, 14, 'Cafeara', '4103404'),
(3960, 14, 'Cafelândia', '4103453'),
(3961, 14, 'Cafezal do Sul', '4103479'),
(3962, 14, 'Califórnia', '4103503'),
(3963, 14, 'Cambará', '4103602'),
(3964, 14, 'Cambé', '4103701'),
(3965, 14, 'Cambira', '4103800'),
(3966, 14, 'Campina da Lagoa', '4103909'),
(3967, 14, 'Campina do Simão', '4103958'),
(3968, 14, 'Campina Grande do Sul', '4104006'),
(3969, 14, 'Campo Bonito', '4104055'),
(3970, 14, 'Campo do Tenente', '4104105'),
(3971, 14, 'Campo Largo', '4104204'),
(3972, 14, 'Campo Magro', '4104253'),
(3973, 14, 'Campo Mourão', '4104303'),
(3974, 14, 'Cândido de Abreu', '4104402'),
(3975, 14, 'Candói', '4104428'),
(3976, 14, 'Cantagalo', '4104451'),
(3977, 14, 'Capanema', '4104501'),
(3978, 14, 'Capitão Leônidas Marques', '4104600'),
(3979, 14, 'Carambeí', '4104659'),
(3980, 14, 'Carlópolis', '4104709'),
(3981, 14, 'Cascavel', '4104808'),
(3982, 14, 'Castro', '4104907'),
(3983, 14, 'Catanduvas', '4105003'),
(3984, 14, 'Centenário do Sul', '4105102'),
(3985, 14, 'Cerro Azul', '4105201'),
(3986, 14, 'Céu Azul', '4105300'),
(3987, 14, 'Chopinzinho', '4105409'),
(3988, 14, 'Cianorte', '4105508'),
(3989, 14, 'Cidade Gaúcha', '4105607'),
(3990, 14, 'Clevelândia', '4105706'),
(3991, 14, 'Colombo', '4105805'),
(3992, 14, 'Colorado', '4105904'),
(3993, 14, 'Congonhinhas', '4106001'),
(3994, 14, 'Conselheiro Mairinck', '4106100'),
(3995, 14, 'Contenda', '4106209'),
(3996, 14, 'Corbélia', '4106308'),
(3997, 14, 'Cornélio Procópio', '4106407'),
(3998, 14, 'Coronel Domingos Soares', '4106456'),
(3999, 14, 'Coronel Vivida', '4106506'),
(4000, 14, 'Corumbataí do Sul', '4106555'),
(4001, 14, 'Cruzeiro do Iguaçu', '4106571'),
(4002, 14, 'Cruzeiro do Oeste', '4106605'),
(4003, 14, 'Cruzeiro do Sul', '4106704'),
(4004, 14, 'Cruz Machado', '4106803'),
(4005, 14, 'Cruzmaltina', '4106852'),
(4006, 14, 'Curitiba', '4106902'),
(4007, 14, 'Curiúva', '4107009'),
(4008, 14, 'Diamante do Norte', '4107108'),
(4009, 14, 'Diamante do Sul', '4107124'),
(4010, 14, 'Diamante D\'Oeste', '4107157'),
(4011, 14, 'Dois Vizinhos', '4107207'),
(4012, 14, 'Douradina', '4107256'),
(4013, 14, 'Doutor Camargo', '4107306'),
(4014, 14, 'Enéas Marques', '4107405'),
(4015, 14, 'Engenheiro Beltrão', '4107504'),
(4016, 14, 'Esperança Nova', '4107520'),
(4017, 14, 'Entre Rios do Oeste', '4107538'),
(4018, 14, 'Espigão Alto do Iguaçu', '4107546'),
(4019, 14, 'Farol', '4107553'),
(4020, 14, 'Faxinal', '4107603'),
(4021, 14, 'Fazenda Rio Grande', '4107652'),
(4022, 14, 'Fênix', '4107702'),
(4023, 14, 'Fernandes Pinheiro', '4107736'),
(4024, 14, 'Figueira', '4107751'),
(4025, 14, 'Floraí', '4107801'),
(4026, 14, 'Flor da Serra do Sul', '4107850'),
(4027, 14, 'Floresta', '4107900'),
(4028, 14, 'Florestópolis', '4108007'),
(4029, 14, 'Flórida', '4108106'),
(4030, 14, 'Formosa do Oeste', '4108205'),
(4031, 14, 'Foz do Iguaçu', '4108304'),
(4032, 14, 'Francisco Alves', '4108320'),
(4033, 14, 'Francisco Beltrão', '4108403'),
(4034, 14, 'Foz do Jordão', '4108452'),
(4035, 14, 'General Carneiro', '4108502'),
(4036, 14, 'Godoy Moreira', '4108551'),
(4037, 14, 'Goioerê', '4108601'),
(4038, 14, 'Goioxim', '4108650'),
(4039, 14, 'Grandes Rios', '4108700'),
(4040, 14, 'Guaíra', '4108809'),
(4041, 14, 'Guairaçá', '4108908'),
(4042, 14, 'Guamiranga', '4108957'),
(4043, 14, 'Guapirama', '4109005'),
(4044, 14, 'Guaporema', '4109104'),
(4045, 14, 'Guaraci', '4109203'),
(4046, 14, 'Guaraniaçu', '4109302'),
(4047, 14, 'Guarapuava', '4109401'),
(4048, 14, 'Guaraqueçaba', '4109500'),
(4049, 14, 'Guaratuba', '4109609'),
(4050, 14, 'Honório Serpa', '4109658'),
(4051, 14, 'Ibaiti', '4109708'),
(4052, 14, 'Ibema', '4109757'),
(4053, 14, 'Ibiporã', '4109807'),
(4054, 14, 'Icaraíma', '4109906'),
(4055, 14, 'Iguaraçu', '4110003'),
(4056, 14, 'Iguatu', '4110052'),
(4057, 14, 'Imbaú', '4110078'),
(4058, 14, 'Imbituva', '4110102'),
(4059, 14, 'Inácio Martins', '4110201'),
(4060, 14, 'Inajá', '4110300'),
(4061, 14, 'Indianópolis', '4110409'),
(4062, 14, 'Ipiranga', '4110508'),
(4063, 14, 'Iporã', '4110607'),
(4064, 14, 'Iracema do Oeste', '4110656'),
(4065, 14, 'Irati', '4110706'),
(4066, 14, 'Iretama', '4110805'),
(4067, 14, 'Itaguajé', '4110904'),
(4068, 14, 'Itaipulândia', '4110953'),
(4069, 14, 'Itambaracá', '4111001'),
(4070, 14, 'Itambé', '4111100'),
(4071, 14, 'Itapejara d\'Oeste', '4111209'),
(4072, 14, 'Itaperuçu', '4111258'),
(4073, 14, 'Itaúna do Sul', '4111308'),
(4074, 14, 'Ivaí', '4111407'),
(4075, 14, 'Ivaiporã', '4111506'),
(4076, 14, 'Ivaté', '4111555'),
(4077, 14, 'Ivatuba', '4111605'),
(4078, 14, 'Jaboti', '4111704'),
(4079, 14, 'Jacarezinho', '4111803'),
(4080, 14, 'Jaguapitã', '4111902'),
(4081, 14, 'Jaguariaíva', '4112009'),
(4082, 14, 'Jandaia do Sul', '4112108'),
(4083, 14, 'Janiópolis', '4112207'),
(4084, 14, 'Japira', '4112306'),
(4085, 14, 'Japurá', '4112405'),
(4086, 14, 'Jardim Alegre', '4112504'),
(4087, 14, 'Jardim Olinda', '4112603'),
(4088, 14, 'Jataizinho', '4112702'),
(4089, 14, 'Jesuítas', '4112751'),
(4090, 14, 'Joaquim Távora', '4112801'),
(4091, 14, 'Jundiaí do Sul', '4112900'),
(4092, 14, 'Juranda', '4112959'),
(4093, 14, 'Jussara', '4113007'),
(4094, 14, 'Kaloré', '4113106'),
(4095, 14, 'Lapa', '4113205'),
(4096, 14, 'Laranjal', '4113254'),
(4097, 14, 'Laranjeiras do Sul', '4113304'),
(4098, 14, 'Leópolis', '4113403'),
(4099, 14, 'Lidianópolis', '4113429'),
(4100, 14, 'Lindoeste', '4113452'),
(4101, 14, 'Loanda', '4113502'),
(4102, 14, 'Lobato', '4113601'),
(4103, 14, 'Londrina', '4113700'),
(4104, 14, 'Luiziana', '4113734'),
(4105, 14, 'Lunardelli', '4113759'),
(4106, 14, 'Lupionópolis', '4113809'),
(4107, 14, 'Mallet', '4113908'),
(4108, 14, 'Mamborê', '4114005'),
(4109, 14, 'Mandaguaçu', '4114104'),
(4110, 14, 'Mandaguari', '4114203'),
(4111, 14, 'Mandirituba', '4114302'),
(4112, 14, 'Manfrinópolis', '4114351'),
(4113, 14, 'Mangueirinha', '4114401'),
(4114, 14, 'Manoel Ribas', '4114500'),
(4115, 14, 'Marechal Cândido Rondon', '4114609'),
(4116, 14, 'Maria Helena', '4114708'),
(4117, 14, 'Marialva', '4114807'),
(4118, 14, 'Marilândia do Sul', '4114906'),
(4119, 14, 'Marilena', '4115002'),
(4120, 14, 'Mariluz', '4115101'),
(4121, 14, 'Maringá', '4115200'),
(4122, 14, 'Mariópolis', '4115309'),
(4123, 14, 'Maripá', '4115358'),
(4124, 14, 'Marmeleiro', '4115408'),
(4125, 14, 'Marquinho', '4115457'),
(4126, 14, 'Marumbi', '4115507'),
(4127, 14, 'Matelândia', '4115606'),
(4128, 14, 'Matinhos', '4115705'),
(4129, 14, 'Mato Rico', '4115739'),
(4130, 14, 'Mauá da Serra', '4115754'),
(4131, 14, 'Medianeira', '4115804'),
(4132, 14, 'Mercedes', '4115853'),
(4133, 14, 'Mirador', '4115903'),
(4134, 14, 'Miraselva', '4116000'),
(4135, 14, 'Missal', '4116059'),
(4136, 14, 'Moreira Sales', '4116109'),
(4137, 14, 'Morretes', '4116208'),
(4138, 14, 'Munhoz de Melo', '4116307'),
(4139, 14, 'Nossa Senhora das Graças', '4116406'),
(4140, 14, 'Nova Aliança do Ivaí', '4116505'),
(4141, 14, 'Nova América da Colina', '4116604'),
(4142, 14, 'Nova Aurora', '4116703'),
(4143, 14, 'Nova Cantu', '4116802'),
(4144, 14, 'Nova Esperança', '4116901'),
(4145, 14, 'Nova Esperança do Sudoeste', '4116950'),
(4146, 14, 'Nova Fátima', '4117008'),
(4147, 14, 'Nova Laranjeiras', '4117057'),
(4148, 14, 'Nova Londrina', '4117107'),
(4149, 14, 'Nova Olímpia', '4117206'),
(4150, 14, 'Nova Santa Bárbara', '4117214');
INSERT INTO `cidade` (`id_cidade`, `id_estado`, `nome_cidade`, `ibge_cidade`) VALUES
(4151, 14, 'Nova Santa Rosa', '4117222'),
(4152, 14, 'Nova Prata do Iguaçu', '4117255'),
(4153, 14, 'Nova Tebas', '4117271'),
(4154, 14, 'Novo Itacolomi', '4117297'),
(4155, 14, 'Ortigueira', '4117305'),
(4156, 14, 'Ourizona', '4117404'),
(4157, 14, 'Ouro Verde do Oeste', '4117453'),
(4158, 14, 'Paiçandu', '4117503'),
(4159, 14, 'Palmas', '4117602'),
(4160, 14, 'Palmeira', '4117701'),
(4161, 14, 'Palmital', '4117800'),
(4162, 14, 'Palotina', '4117909'),
(4163, 14, 'Paraíso do Norte', '4118006'),
(4164, 14, 'Paranacity', '4118105'),
(4165, 14, 'Paranaguá', '4118204'),
(4166, 14, 'Paranapoema', '4118303'),
(4167, 14, 'Paranavaí', '4118402'),
(4168, 14, 'Pato Bragado', '4118451'),
(4169, 14, 'Pato Branco', '4118501'),
(4170, 14, 'Paula Freitas', '4118600'),
(4171, 14, 'Paulo Frontin', '4118709'),
(4172, 14, 'Peabiru', '4118808'),
(4173, 14, 'Perobal', '4118857'),
(4174, 14, 'Pérola', '4118907'),
(4175, 14, 'Pérola d\'Oeste', '4119004'),
(4176, 14, 'Piên', '4119103'),
(4177, 14, 'Pinhais', '4119152'),
(4178, 14, 'Pinhalão', '4119202'),
(4179, 14, 'Pinhal de São Bento', '4119251'),
(4180, 14, 'Pinhão', '4119301'),
(4181, 14, 'Piraí do Sul', '4119400'),
(4182, 14, 'Piraquara', '4119509'),
(4183, 14, 'Pitanga', '4119608'),
(4184, 14, 'Pitangueiras', '4119657'),
(4185, 14, 'Planaltina do Paraná', '4119707'),
(4186, 14, 'Planalto', '4119806'),
(4187, 14, 'Ponta Grossa', '4119905'),
(4188, 14, 'Pontal do Paraná', '4119954'),
(4189, 14, 'Porecatu', '4120002'),
(4190, 14, 'Porto Amazonas', '4120101'),
(4191, 14, 'Porto Barreiro', '4120150'),
(4192, 14, 'Porto Rico', '4120200'),
(4193, 14, 'Porto Vitória', '4120309'),
(4194, 14, 'Prado Ferreira', '4120333'),
(4195, 14, 'Pranchita', '4120358'),
(4196, 14, 'Presidente Castelo Branco', '4120408'),
(4197, 14, 'Primeiro de Maio', '4120507'),
(4198, 14, 'Prudentópolis', '4120606'),
(4199, 14, 'Quarto Centenário', '4120655'),
(4200, 14, 'Quatiguá', '4120705'),
(4201, 14, 'Quatro Barras', '4120804'),
(4202, 14, 'Quatro Pontes', '4120853'),
(4203, 14, 'Quedas do Iguaçu', '4120903'),
(4204, 14, 'Querência do Norte', '4121000'),
(4205, 14, 'Quinta do Sol', '4121109'),
(4206, 14, 'Quitandinha', '4121208'),
(4207, 14, 'Ramilândia', '4121257'),
(4208, 14, 'Rancho Alegre', '4121307'),
(4209, 14, 'Rancho Alegre D\'Oeste', '4121356'),
(4210, 14, 'Realeza', '4121406'),
(4211, 14, 'Rebouças', '4121505'),
(4212, 14, 'Renascença', '4121604'),
(4213, 14, 'Reserva', '4121703'),
(4214, 14, 'Reserva do Iguaçu', '4121752'),
(4215, 14, 'Ribeirão Claro', '4121802'),
(4216, 14, 'Ribeirão do Pinhal', '4121901'),
(4217, 14, 'Rio Azul', '4122008'),
(4218, 14, 'Rio Bom', '4122107'),
(4219, 14, 'Rio Bonito do Iguaçu', '4122156'),
(4220, 14, 'Rio Branco do Ivaí', '4122172'),
(4221, 14, 'Rio Branco do Sul', '4122206'),
(4222, 14, 'Rio Negro', '4122305'),
(4223, 14, 'Rolândia', '4122404'),
(4224, 14, 'Roncador', '4122503'),
(4225, 14, 'Rondon', '4122602'),
(4226, 14, 'Rosário do Ivaí', '4122651'),
(4227, 14, 'Sabáudia', '4122701'),
(4228, 14, 'Salgado Filho', '4122800'),
(4229, 14, 'Salto do Itararé', '4122909'),
(4230, 14, 'Salto do Lontra', '4123006'),
(4231, 14, 'Santa Amélia', '4123105'),
(4232, 14, 'Santa Cecília do Pavão', '4123204'),
(4233, 14, 'Santa Cruz de Monte Castelo', '4123303'),
(4234, 14, 'Santa Fé', '4123402'),
(4235, 14, 'Santa Helena', '4123501'),
(4236, 14, 'Santa Inês', '4123600'),
(4237, 14, 'Santa Isabel do Ivaí', '4123709'),
(4238, 14, 'Santa Izabel do Oeste', '4123808'),
(4239, 14, 'Santa Lúcia', '4123824'),
(4240, 14, 'Santa Maria do Oeste', '4123857'),
(4241, 14, 'Santa Mariana', '4123907'),
(4242, 14, 'Santa Mônica', '4123956'),
(4243, 14, 'Santana do Itararé', '4124004'),
(4244, 14, 'Santa Tereza do Oeste', '4124020'),
(4245, 14, 'Santa Terezinha de Itaipu', '4124053'),
(4246, 14, 'Santo Antônio da Platina', '4124103'),
(4247, 14, 'Santo Antônio do Caiuá', '4124202'),
(4248, 14, 'Santo Antônio do Paraíso', '4124301'),
(4249, 14, 'Santo Antônio do Sudoeste', '4124400'),
(4250, 14, 'Santo Inácio', '4124509'),
(4251, 14, 'São Carlos do Ivaí', '4124608'),
(4252, 14, 'São Jerônimo da Serra', '4124707'),
(4253, 14, 'São João', '4124806'),
(4254, 14, 'São João do Caiuá', '4124905'),
(4255, 14, 'São João do Ivaí', '4125001'),
(4256, 14, 'São João do Triunfo', '4125100'),
(4257, 14, 'São Jorge d\'Oeste', '4125209'),
(4258, 14, 'São Jorge do Ivaí', '4125308'),
(4259, 14, 'São Jorge do Patrocínio', '4125357'),
(4260, 14, 'São José da Boa Vista', '4125407'),
(4261, 14, 'São José das Palmeiras', '4125456'),
(4262, 14, 'São José dos Pinhais', '4125506'),
(4263, 14, 'São Manoel do Paraná', '4125555'),
(4264, 14, 'São Mateus do Sul', '4125605'),
(4265, 14, 'São Miguel do Iguaçu', '4125704'),
(4266, 14, 'São Pedro do Iguaçu', '4125753'),
(4267, 14, 'São Pedro do Ivaí', '4125803'),
(4268, 14, 'São Pedro do Paraná', '4125902'),
(4269, 14, 'São Sebastião da Amoreira', '4126009'),
(4270, 14, 'São Tomé', '4126108'),
(4271, 14, 'Sapopema', '4126207'),
(4272, 14, 'Sarandi', '4126256'),
(4273, 14, 'Saudade do Iguaçu', '4126272'),
(4274, 14, 'Sengés', '4126306'),
(4275, 14, 'Serranópolis do Iguaçu', '4126355'),
(4276, 14, 'Sertaneja', '4126405'),
(4277, 14, 'Sertanópolis', '4126504'),
(4278, 14, 'Siqueira Campos', '4126603'),
(4279, 14, 'Sulina', '4126652'),
(4280, 14, 'Tamarana', '4126678'),
(4281, 14, 'Tamboara', '4126702'),
(4282, 14, 'Tapejara', '4126801'),
(4283, 14, 'Tapira', '4126900'),
(4284, 14, 'Teixeira Soares', '4127007'),
(4285, 14, 'Telêmaco Borba', '4127106'),
(4286, 14, 'Terra Boa', '4127205'),
(4287, 14, 'Terra Rica', '4127304'),
(4288, 14, 'Terra Roxa', '4127403'),
(4289, 14, 'Tibagi', '4127502'),
(4290, 14, 'Tijucas do Sul', '4127601'),
(4291, 14, 'Toledo', '4127700'),
(4292, 14, 'Tomazina', '4127809'),
(4293, 14, 'Três Barras do Paraná', '4127858'),
(4294, 14, 'Tunas do Paraná', '4127882'),
(4295, 14, 'Tuneiras do Oeste', '4127908'),
(4296, 14, 'Tupãssi', '4127957'),
(4297, 14, 'Turvo', '4127965'),
(4298, 14, 'Ubiratã', '4128005'),
(4299, 14, 'Umuarama', '4128104'),
(4300, 14, 'União da Vitória', '4128203'),
(4301, 14, 'Uniflor', '4128302'),
(4302, 14, 'Uraí', '4128401'),
(4303, 14, 'Wenceslau Braz', '4128500'),
(4304, 14, 'Ventania', '4128534'),
(4305, 14, 'Vera Cruz do Oeste', '4128559'),
(4306, 14, 'Verê', '4128609'),
(4307, 14, 'Alto Paraíso', '4128625'),
(4308, 14, 'Doutor Ulysses', '4128633'),
(4309, 14, 'Virmond', '4128658'),
(4310, 14, 'Vitorino', '4128708'),
(4311, 14, 'Xambrê', '4128807'),
(4312, 24, 'Abdon Batista', '4200051'),
(4313, 24, 'Abelardo Luz', '4200101'),
(4314, 24, 'Agrolândia', '4200200'),
(4315, 24, 'Agronômica', '4200309'),
(4316, 24, 'Água Doce', '4200408'),
(4317, 24, 'Águas de Chapecó', '4200507'),
(4318, 24, 'Águas Frias', '4200556'),
(4319, 24, 'Águas Mornas', '4200606'),
(4320, 24, 'Alfredo Wagner', '4200705'),
(4321, 24, 'Alto Bela Vista', '4200754'),
(4322, 24, 'Anchieta', '4200804'),
(4323, 24, 'Angelina', '4200903'),
(4324, 24, 'Anita Garibaldi', '4201000'),
(4325, 24, 'Anitápolis', '4201109'),
(4326, 24, 'Antônio Carlos', '4201208'),
(4327, 24, 'Apiúna', '4201257'),
(4328, 24, 'Arabutã', '4201273'),
(4329, 24, 'Araquari', '4201307'),
(4330, 24, 'Araranguá', '4201406'),
(4331, 24, 'Armazém', '4201505'),
(4332, 24, 'Arroio Trinta', '4201604'),
(4333, 24, 'Arvoredo', '4201653'),
(4334, 24, 'Ascurra', '4201703'),
(4335, 24, 'Atalanta', '4201802'),
(4336, 24, 'Aurora', '4201901'),
(4337, 24, 'Balneário Arroio do Silva', '4201950'),
(4338, 24, 'Balneário Camboriú', '4202008'),
(4339, 24, 'Balneário Barra do Sul', '4202057'),
(4340, 24, 'Balneário Gaivota', '4202073'),
(4341, 24, 'Bandeirante', '4202081'),
(4342, 24, 'Barra Bonita', '4202099'),
(4343, 24, 'Barra Velha', '4202107'),
(4344, 24, 'Bela Vista do Toldo', '4202131'),
(4345, 24, 'Belmonte', '4202156'),
(4346, 24, 'Benedito Novo', '4202206'),
(4347, 24, 'Biguaçu', '4202305'),
(4348, 24, 'Blumenau', '4202404'),
(4349, 24, 'Bocaina do Sul', '4202438'),
(4350, 24, 'Bombinhas', '4202453'),
(4351, 24, 'Bom Jardim da Serra', '4202503'),
(4352, 24, 'Bom Jesus', '4202537'),
(4353, 24, 'Bom Jesus do Oeste', '4202578'),
(4354, 24, 'Bom Retiro', '4202602'),
(4355, 24, 'Botuverá', '4202701'),
(4356, 24, 'Braço do Norte', '4202800'),
(4357, 24, 'Braço do Trombudo', '4202859'),
(4358, 24, 'Brunópolis', '4202875'),
(4359, 24, 'Brusque', '4202909'),
(4360, 24, 'Caçador', '4203006'),
(4361, 24, 'Caibi', '4203105'),
(4362, 24, 'Calmon', '4203154'),
(4363, 24, 'Camboriú', '4203204'),
(4364, 24, 'Capão Alto', '4203253'),
(4365, 24, 'Campo Alegre', '4203303'),
(4366, 24, 'Campo Belo do Sul', '4203402'),
(4367, 24, 'Campo Erê', '4203501'),
(4368, 24, 'Campos Novos', '4203600'),
(4369, 24, 'Canelinha', '4203709'),
(4370, 24, 'Canoinhas', '4203808'),
(4371, 24, 'Capinzal', '4203907'),
(4372, 24, 'Capivari de Baixo', '4203956'),
(4373, 24, 'Catanduvas', '4204004'),
(4374, 24, 'Caxambu do Sul', '4204103'),
(4375, 24, 'Celso Ramos', '4204152'),
(4376, 24, 'Cerro Negro', '4204178'),
(4377, 24, 'Chapadão do Lageado', '4204194'),
(4378, 24, 'Chapecó', '4204202'),
(4379, 24, 'Cocal do Sul', '4204251'),
(4380, 24, 'Concórdia', '4204301'),
(4381, 24, 'Cordilheira Alta', '4204350'),
(4382, 24, 'Coronel Freitas', '4204400'),
(4383, 24, 'Coronel Martins', '4204459'),
(4384, 24, 'Corupá', '4204509'),
(4385, 24, 'Correia Pinto', '4204558'),
(4386, 24, 'Criciúma', '4204608'),
(4387, 24, 'Cunha Porã', '4204707'),
(4388, 24, 'Cunhataí', '4204756'),
(4389, 24, 'Curitibanos', '4204806'),
(4390, 24, 'Descanso', '4204905'),
(4391, 24, 'Dionísio Cerqueira', '4205001'),
(4392, 24, 'Dona Emma', '4205100'),
(4393, 24, 'Doutor Pedrinho', '4205159'),
(4394, 24, 'Entre Rios', '4205175'),
(4395, 24, 'Ermo', '4205191'),
(4396, 24, 'Erval Velho', '4205209'),
(4397, 24, 'Faxinal dos Guedes', '4205308'),
(4398, 24, 'Flor do Sertão', '4205357'),
(4399, 24, 'Florianópolis', '4205407'),
(4400, 24, 'Formosa do Sul', '4205431'),
(4401, 24, 'Forquilhinha', '4205456'),
(4402, 24, 'Fraiburgo', '4205506'),
(4403, 24, 'Frei Rogério', '4205555'),
(4404, 24, 'Galvão', '4205605'),
(4405, 24, 'Garopaba', '4205704'),
(4406, 24, 'Garuva', '4205803'),
(4407, 24, 'Gaspar', '4205902'),
(4408, 24, 'Governador Celso Ramos', '4206009'),
(4409, 24, 'Grão Pará', '4206108'),
(4410, 24, 'Gravatal', '4206207'),
(4411, 24, 'Guabiruba', '4206306'),
(4412, 24, 'Guaraciaba', '4206405'),
(4413, 24, 'Guaramirim', '4206504'),
(4414, 24, 'Guarujá do Sul', '4206603'),
(4415, 24, 'Guatambú', '4206652'),
(4416, 24, 'Herval d\'Oeste', '4206702'),
(4417, 24, 'Ibiam', '4206751'),
(4418, 24, 'Ibicaré', '4206801'),
(4419, 24, 'Ibirama', '4206900'),
(4420, 24, 'Içara', '4207007'),
(4421, 24, 'Ilhota', '4207106'),
(4422, 24, 'Imaruí', '4207205'),
(4423, 24, 'Imbituba', '4207304'),
(4424, 24, 'Imbuia', '4207403'),
(4425, 24, 'Indaial', '4207502'),
(4426, 24, 'Iomerê', '4207577'),
(4427, 24, 'Ipira', '4207601'),
(4428, 24, 'Iporã do Oeste', '4207650'),
(4429, 24, 'Ipuaçu', '4207684'),
(4430, 24, 'Ipumirim', '4207700'),
(4431, 24, 'Iraceminha', '4207759'),
(4432, 24, 'Irani', '4207809'),
(4433, 24, 'Irati', '4207858'),
(4434, 24, 'Irineópolis', '4207908'),
(4435, 24, 'Itá', '4208005'),
(4436, 24, 'Itaiópolis', '4208104'),
(4437, 24, 'Itajaí', '4208203'),
(4438, 24, 'Itapema', '4208302'),
(4439, 24, 'Itapiranga', '4208401'),
(4440, 24, 'Itapoá', '4208450'),
(4441, 24, 'Ituporanga', '4208500'),
(4442, 24, 'Jaborá', '4208609'),
(4443, 24, 'Jacinto Machado', '4208708'),
(4444, 24, 'Jaguaruna', '4208807'),
(4445, 24, 'Jaraguá do Sul', '4208906'),
(4446, 24, 'Jardinópolis', '4208955'),
(4447, 24, 'Joaçaba', '4209003'),
(4448, 24, 'Joinville', '4209102'),
(4449, 24, 'José Boiteux', '4209151'),
(4450, 24, 'Jupiá', '4209177'),
(4451, 24, 'Lacerdópolis', '4209201'),
(4452, 24, 'Lages', '4209300'),
(4453, 24, 'Laguna', '4209409'),
(4454, 24, 'Lajeado Grande', '4209458'),
(4455, 24, 'Laurentino', '4209508'),
(4456, 24, 'Lauro Muller', '4209607'),
(4457, 24, 'Lebon Régis', '4209706'),
(4458, 24, 'Leoberto Leal', '4209805'),
(4459, 24, 'Lindóia do Sul', '4209854'),
(4460, 24, 'Lontras', '4209904'),
(4461, 24, 'Luiz Alves', '4210001'),
(4462, 24, 'Luzerna', '4210035'),
(4463, 24, 'Macieira', '4210050'),
(4464, 24, 'Mafra', '4210100'),
(4465, 24, 'Major Gercino', '4210209'),
(4466, 24, 'Major Vieira', '4210308'),
(4467, 24, 'Maracajá', '4210407'),
(4468, 24, 'Maravilha', '4210506'),
(4469, 24, 'Marema', '4210555'),
(4470, 24, 'Massaranduba', '4210605'),
(4471, 24, 'Matos Costa', '4210704'),
(4472, 24, 'Meleiro', '4210803'),
(4473, 24, 'Mirim Doce', '4210852'),
(4474, 24, 'Modelo', '4210902'),
(4475, 24, 'Mondaí', '4211009'),
(4476, 24, 'Monte Carlo', '4211058'),
(4477, 24, 'Monte Castelo', '4211108'),
(4478, 24, 'Morro da Fumaça', '4211207'),
(4479, 24, 'Morro Grande', '4211256'),
(4480, 24, 'Navegantes', '4211306'),
(4481, 24, 'Nova Erechim', '4211405'),
(4482, 24, 'Nova Itaberaba', '4211454'),
(4483, 24, 'Nova Trento', '4211504'),
(4484, 24, 'Nova Veneza', '4211603'),
(4485, 24, 'Novo Horizonte', '4211652'),
(4486, 24, 'Orleans', '4211702'),
(4487, 24, 'Otacílio Costa', '4211751'),
(4488, 24, 'Ouro', '4211801'),
(4489, 24, 'Ouro Verde', '4211850'),
(4490, 24, 'Paial', '4211876'),
(4491, 24, 'Painel', '4211892'),
(4492, 24, 'Palhoça', '4211900'),
(4493, 24, 'Palma Sola', '4212007'),
(4494, 24, 'Palmeira', '4212056'),
(4495, 24, 'Palmitos', '4212106'),
(4496, 24, 'Papanduva', '4212205'),
(4497, 24, 'Paraíso', '4212239'),
(4498, 24, 'Passo de Torres', '4212254'),
(4499, 24, 'Passos Maia', '4212270'),
(4500, 24, 'Paulo Lopes', '4212304'),
(4501, 24, 'Pedras Grandes', '4212403'),
(4502, 24, 'Penha', '4212502'),
(4503, 24, 'Peritiba', '4212601'),
(4504, 24, 'Pescaria Brava', '4212650'),
(4505, 24, 'Petrolândia', '4212700'),
(4506, 24, 'Balneário Piçarras', '4212809'),
(4507, 24, 'Pinhalzinho', '4212908'),
(4508, 24, 'Pinheiro Preto', '4213005'),
(4509, 24, 'Piratuba', '4213104'),
(4510, 24, 'Planalto Alegre', '4213153'),
(4511, 24, 'Pomerode', '4213203'),
(4512, 24, 'Ponte Alta', '4213302'),
(4513, 24, 'Ponte Alta do Norte', '4213351'),
(4514, 24, 'Ponte Serrada', '4213401'),
(4515, 24, 'Porto Belo', '4213500'),
(4516, 24, 'Porto União', '4213609'),
(4517, 24, 'Pouso Redondo', '4213708'),
(4518, 24, 'Praia Grande', '4213807'),
(4519, 24, 'Presidente Castello Branco', '4213906'),
(4520, 24, 'Presidente Getúlio', '4214003'),
(4521, 24, 'Presidente Nereu', '4214102'),
(4522, 24, 'Princesa', '4214151'),
(4523, 24, 'Quilombo', '4214201'),
(4524, 24, 'Rancho Queimado', '4214300'),
(4525, 24, 'Rio das Antas', '4214409'),
(4526, 24, 'Rio do Campo', '4214508'),
(4527, 24, 'Rio do Oeste', '4214607'),
(4528, 24, 'Rio dos Cedros', '4214706'),
(4529, 24, 'Rio do Sul', '4214805'),
(4530, 24, 'Rio Fortuna', '4214904'),
(4531, 24, 'Rio Negrinho', '4215000'),
(4532, 24, 'Rio Rufino', '4215059'),
(4533, 24, 'Riqueza', '4215075'),
(4534, 24, 'Rodeio', '4215109'),
(4535, 24, 'Romelândia', '4215208'),
(4536, 24, 'Salete', '4215307'),
(4537, 24, 'Saltinho', '4215356'),
(4538, 24, 'Salto Veloso', '4215406'),
(4539, 24, 'Sangão', '4215455'),
(4540, 24, 'Santa Cecília', '4215505'),
(4541, 24, 'Santa Helena', '4215554'),
(4542, 24, 'Santa Rosa de Lima', '4215604'),
(4543, 24, 'Santa Rosa do Sul', '4215653'),
(4544, 24, 'Santa Terezinha', '4215679'),
(4545, 24, 'Santa Terezinha do Progresso', '4215687'),
(4546, 24, 'Santiago do Sul', '4215695'),
(4547, 24, 'Santo Amaro da Imperatriz', '4215703'),
(4548, 24, 'São Bernardino', '4215752'),
(4549, 24, 'São Bento do Sul', '4215802'),
(4550, 24, 'São Bonifácio', '4215901'),
(4551, 24, 'São Carlos', '4216008'),
(4552, 24, 'São Cristovão do Sul', '4216057'),
(4553, 24, 'São Domingos', '4216107'),
(4554, 24, 'São Francisco do Sul', '4216206'),
(4555, 24, 'São João do Oeste', '4216255'),
(4556, 24, 'São João Batista', '4216305'),
(4557, 24, 'São João do Itaperiú', '4216354'),
(4558, 24, 'São João do Sul', '4216404'),
(4559, 24, 'São Joaquim', '4216503'),
(4560, 24, 'São José', '4216602'),
(4561, 24, 'São José do Cedro', '4216701'),
(4562, 24, 'São José do Cerrito', '4216800'),
(4563, 24, 'São Lourenço do Oeste', '4216909'),
(4564, 24, 'São Ludgero', '4217006'),
(4565, 24, 'São Martinho', '4217105'),
(4566, 24, 'São Miguel da Boa Vista', '4217154'),
(4567, 24, 'São Miguel do Oeste', '4217204'),
(4568, 24, 'São Pedro de Alcântara', '4217253'),
(4569, 24, 'Saudades', '4217303'),
(4570, 24, 'Schroeder', '4217402'),
(4571, 24, 'Seara', '4217501'),
(4572, 24, 'Serra Alta', '4217550'),
(4573, 24, 'Siderópolis', '4217600'),
(4574, 24, 'Sombrio', '4217709'),
(4575, 24, 'Sul Brasil', '4217758'),
(4576, 24, 'Taió', '4217808'),
(4577, 24, 'Tangará', '4217907'),
(4578, 24, 'Tigrinhos', '4217956'),
(4579, 24, 'Tijucas', '4218004'),
(4580, 24, 'Timbé do Sul', '4218103'),
(4581, 24, 'Timbó', '4218202'),
(4582, 24, 'Timbó Grande', '4218251'),
(4583, 24, 'Três Barras', '4218301'),
(4584, 24, 'Treviso', '4218350'),
(4585, 24, 'Treze de Maio', '4218400'),
(4586, 24, 'Treze Tílias', '4218509'),
(4587, 24, 'Trombudo Central', '4218608'),
(4588, 24, 'Tubarão', '4218707'),
(4589, 24, 'Tunápolis', '4218756'),
(4590, 24, 'Turvo', '4218806'),
(4591, 24, 'União do Oeste', '4218855'),
(4592, 24, 'Urubici', '4218905'),
(4593, 24, 'Urupema', '4218954'),
(4594, 24, 'Urussanga', '4219002'),
(4595, 24, 'Vargeão', '4219101'),
(4596, 24, 'Vargem', '4219150'),
(4597, 24, 'Vargem Bonita', '4219176'),
(4598, 24, 'Vidal Ramos', '4219200'),
(4599, 24, 'Videira', '4219309'),
(4600, 24, 'Vitor Meireles', '4219358'),
(4601, 24, 'Witmarsum', '4219408'),
(4602, 24, 'Xanxerê', '4219507'),
(4603, 24, 'Xavantina', '4219606'),
(4604, 24, 'Xaxim', '4219705'),
(4605, 24, 'Zortéa', '4219853'),
(4606, 24, 'Balneário Rincão', '4220000'),
(4607, 21, 'Aceguá', '4300034'),
(4608, 21, 'Água Santa', '4300059'),
(4609, 21, 'Agudo', '4300109'),
(4610, 21, 'Ajuricaba', '4300208'),
(4611, 21, 'Alecrim', '4300307'),
(4612, 21, 'Alegrete', '4300406'),
(4613, 21, 'Alegria', '4300455'),
(4614, 21, 'Almirante Tamandaré do Sul', '4300471'),
(4615, 21, 'Alpestre', '4300505'),
(4616, 21, 'Alto Alegre', '4300554'),
(4617, 21, 'Alto Feliz', '4300570'),
(4618, 21, 'Alvorada', '4300604'),
(4619, 21, 'Amaral Ferrador', '4300638'),
(4620, 21, 'Ametista do Sul', '4300646'),
(4621, 21, 'André da Rocha', '4300661'),
(4622, 21, 'Anta Gorda', '4300703'),
(4623, 21, 'Antônio Prado', '4300802'),
(4624, 21, 'Arambaré', '4300851'),
(4625, 21, 'Araricá', '4300877'),
(4626, 21, 'Aratiba', '4300901'),
(4627, 21, 'Arroio do Meio', '4301008'),
(4628, 21, 'Arroio do Sal', '4301057'),
(4629, 21, 'Arroio do Padre', '4301073'),
(4630, 21, 'Arroio dos Ratos', '4301107'),
(4631, 21, 'Arroio do Tigre', '4301206'),
(4632, 21, 'Arroio Grande', '4301305'),
(4633, 21, 'Arvorezinha', '4301404'),
(4634, 21, 'Augusto Pestana', '4301503'),
(4635, 21, 'Áurea', '4301552'),
(4636, 21, 'Bagé', '4301602'),
(4637, 21, 'Balneário Pinhal', '4301636'),
(4638, 21, 'Barão', '4301651'),
(4639, 21, 'Barão de Cotegipe', '4301701'),
(4640, 21, 'Barão do Triunfo', '4301750'),
(4641, 21, 'Barracão', '4301800'),
(4642, 21, 'Barra do Guarita', '4301859'),
(4643, 21, 'Barra do Quaraí', '4301875'),
(4644, 21, 'Barra do Ribeiro', '4301909'),
(4645, 21, 'Barra do Rio Azul', '4301925'),
(4646, 21, 'Barra Funda', '4301958'),
(4647, 21, 'Barros Cassal', '4302006'),
(4648, 21, 'Benjamin Constant do Sul', '4302055'),
(4649, 21, 'Bento Gonçalves', '4302105'),
(4650, 21, 'Boa Vista das Missões', '4302154'),
(4651, 21, 'Boa Vista do Buricá', '4302204'),
(4652, 21, 'Boa Vista do Cadeado', '4302220'),
(4653, 21, 'Boa Vista do Incra', '4302238'),
(4654, 21, 'Boa Vista do Sul', '4302253'),
(4655, 21, 'Bom Jesus', '4302303'),
(4656, 21, 'Bom Princípio', '4302352'),
(4657, 21, 'Bom Progresso', '4302378'),
(4658, 21, 'Bom Retiro do Sul', '4302402'),
(4659, 21, 'Boqueirão do Leão', '4302451'),
(4660, 21, 'Bossoroca', '4302501'),
(4661, 21, 'Bozano', '4302584'),
(4662, 21, 'Braga', '4302600'),
(4663, 21, 'Brochier', '4302659'),
(4664, 21, 'Butiá', '4302709'),
(4665, 21, 'Caçapava do Sul', '4302808'),
(4666, 21, 'Cacequi', '4302907'),
(4667, 21, 'Cachoeira do Sul', '4303004'),
(4668, 21, 'Cachoeirinha', '4303103'),
(4669, 21, 'Cacique Doble', '4303202'),
(4670, 21, 'Caibaté', '4303301'),
(4671, 21, 'Caiçara', '4303400'),
(4672, 21, 'Camaquã', '4303509'),
(4673, 21, 'Camargo', '4303558'),
(4674, 21, 'Cambará do Sul', '4303608'),
(4675, 21, 'Campestre da Serra', '4303673'),
(4676, 21, 'Campina das Missões', '4303707'),
(4677, 21, 'Campinas do Sul', '4303806'),
(4678, 21, 'Campo Bom', '4303905'),
(4679, 21, 'Campo Novo', '4304002'),
(4680, 21, 'Campos Borges', '4304101'),
(4681, 21, 'Candelária', '4304200'),
(4682, 21, 'Cândido Godói', '4304309'),
(4683, 21, 'Candiota', '4304358'),
(4684, 21, 'Canela', '4304408'),
(4685, 21, 'Canguçu', '4304507'),
(4686, 21, 'Canoas', '4304606'),
(4687, 21, 'Canudos do Vale', '4304614'),
(4688, 21, 'Capão Bonito do Sul', '4304622'),
(4689, 21, 'Capão da Canoa', '4304630'),
(4690, 21, 'Capão do Cipó', '4304655'),
(4691, 21, 'Capão do Leão', '4304663'),
(4692, 21, 'Capivari do Sul', '4304671'),
(4693, 21, 'Capela de Santana', '4304689'),
(4694, 21, 'Capitão', '4304697'),
(4695, 21, 'Carazinho', '4304705'),
(4696, 21, 'Caraá', '4304713'),
(4697, 21, 'Carlos Barbosa', '4304804'),
(4698, 21, 'Carlos Gomes', '4304853'),
(4699, 21, 'Casca', '4304903'),
(4700, 21, 'Caseiros', '4304952'),
(4701, 21, 'Catuípe', '4305009'),
(4702, 21, 'Caxias do Sul', '4305108'),
(4703, 21, 'Centenário', '4305116'),
(4704, 21, 'Cerrito', '4305124'),
(4705, 21, 'Cerro Branco', '4305132'),
(4706, 21, 'Cerro Grande', '4305157'),
(4707, 21, 'Cerro Grande do Sul', '4305173'),
(4708, 21, 'Cerro Largo', '4305207'),
(4709, 21, 'Chapada', '4305306'),
(4710, 21, 'Charqueadas', '4305355'),
(4711, 21, 'Charrua', '4305371'),
(4712, 21, 'Chiapetta', '4305405'),
(4713, 21, 'Chuí', '4305439'),
(4714, 21, 'Chuvisca', '4305447'),
(4715, 21, 'Cidreira', '4305454'),
(4716, 21, 'Ciríaco', '4305504'),
(4717, 21, 'Colinas', '4305587'),
(4718, 21, 'Colorado', '4305603'),
(4719, 21, 'Condor', '4305702'),
(4720, 21, 'Constantina', '4305801'),
(4721, 21, 'Coqueiro Baixo', '4305835'),
(4722, 21, 'Coqueiros do Sul', '4305850'),
(4723, 21, 'Coronel Barros', '4305871'),
(4724, 21, 'Coronel Bicaco', '4305900'),
(4725, 21, 'Coronel Pilar', '4305934'),
(4726, 21, 'Cotiporã', '4305959'),
(4727, 21, 'Coxilha', '4305975'),
(4728, 21, 'Crissiumal', '4306007'),
(4729, 21, 'Cristal', '4306056'),
(4730, 21, 'Cristal do Sul', '4306072'),
(4731, 21, 'Cruz Alta', '4306106'),
(4732, 21, 'Cruzaltense', '4306130'),
(4733, 21, 'Cruzeiro do Sul', '4306205'),
(4734, 21, 'David Canabarro', '4306304'),
(4735, 21, 'Derrubadas', '4306320'),
(4736, 21, 'Dezesseis de Novembro', '4306353'),
(4737, 21, 'Dilermando de Aguiar', '4306379'),
(4738, 21, 'Dois Irmãos', '4306403'),
(4739, 21, 'Dois Irmãos das Missões', '4306429'),
(4740, 21, 'Dois Lajeados', '4306452'),
(4741, 21, 'Dom Feliciano', '4306502'),
(4742, 21, 'Dom Pedro de Alcântara', '4306551'),
(4743, 21, 'Dom Pedrito', '4306601'),
(4744, 21, 'Dona Francisca', '4306700'),
(4745, 21, 'Doutor Maurício Cardoso', '4306734'),
(4746, 21, 'Doutor Ricardo', '4306759'),
(4747, 21, 'Eldorado do Sul', '4306767'),
(4748, 21, 'Encantado', '4306809'),
(4749, 21, 'Encruzilhada do Sul', '4306908'),
(4750, 21, 'Engenho Velho', '4306924'),
(4751, 21, 'Entre-Ijuís', '4306932'),
(4752, 21, 'Entre Rios do Sul', '4306957'),
(4753, 21, 'Erebango', '4306973'),
(4754, 21, 'Erechim', '4307005'),
(4755, 21, 'Ernestina', '4307054'),
(4756, 21, 'Herval', '4307104'),
(4757, 21, 'Erval Grande', '4307203'),
(4758, 21, 'Erval Seco', '4307302'),
(4759, 21, 'Esmeralda', '4307401'),
(4760, 21, 'Esperança do Sul', '4307450'),
(4761, 21, 'Espumoso', '4307500'),
(4762, 21, 'Estação', '4307559'),
(4763, 21, 'Estância Velha', '4307609'),
(4764, 21, 'Esteio', '4307708'),
(4765, 21, 'Estrela', '4307807'),
(4766, 21, 'Estrela Velha', '4307815'),
(4767, 21, 'Eugênio de Castro', '4307831'),
(4768, 21, 'Fagundes Varela', '4307864'),
(4769, 21, 'Farroupilha', '4307906'),
(4770, 21, 'Faxinal do Soturno', '4308003'),
(4771, 21, 'Faxinalzinho', '4308052'),
(4772, 21, 'Fazenda Vilanova', '4308078'),
(4773, 21, 'Feliz', '4308102'),
(4774, 21, 'Flores da Cunha', '4308201'),
(4775, 21, 'Floriano Peixoto', '4308250'),
(4776, 21, 'Fontoura Xavier', '4308300'),
(4777, 21, 'Formigueiro', '4308409'),
(4778, 21, 'Forquetinha', '4308433'),
(4779, 21, 'Fortaleza dos Valos', '4308458'),
(4780, 21, 'Frederico Westphalen', '4308508'),
(4781, 21, 'Garibaldi', '4308607'),
(4782, 21, 'Garruchos', '4308656'),
(4783, 21, 'Gaurama', '4308706'),
(4784, 21, 'General Câmara', '4308805'),
(4785, 21, 'Gentil', '4308854'),
(4786, 21, 'Getúlio Vargas', '4308904'),
(4787, 21, 'Giruá', '4309001'),
(4788, 21, 'Glorinha', '4309050'),
(4789, 21, 'Gramado', '4309100'),
(4790, 21, 'Gramado dos Loureiros', '4309126'),
(4791, 21, 'Gramado Xavier', '4309159'),
(4792, 21, 'Gravataí', '4309209'),
(4793, 21, 'Guabiju', '4309258'),
(4794, 21, 'Guaíba', '4309308'),
(4795, 21, 'Guaporé', '4309407'),
(4796, 21, 'Guarani das Missões', '4309506'),
(4797, 21, 'Harmonia', '4309555'),
(4798, 21, 'Herveiras', '4309571'),
(4799, 21, 'Horizontina', '4309605'),
(4800, 21, 'Hulha Negra', '4309654'),
(4801, 21, 'Humaitá', '4309704'),
(4802, 21, 'Ibarama', '4309753'),
(4803, 21, 'Ibiaçá', '4309803'),
(4804, 21, 'Ibiraiaras', '4309902'),
(4805, 21, 'Ibirapuitã', '4309951'),
(4806, 21, 'Ibirubá', '4310009'),
(4807, 21, 'Igrejinha', '4310108'),
(4808, 21, 'Ijuí', '4310207'),
(4809, 21, 'Ilópolis', '4310306'),
(4810, 21, 'Imbé', '4310330'),
(4811, 21, 'Imigrante', '4310363'),
(4812, 21, 'Independência', '4310405'),
(4813, 21, 'Inhacorá', '4310413'),
(4814, 21, 'Ipê', '4310439'),
(4815, 21, 'Ipiranga do Sul', '4310462'),
(4816, 21, 'Iraí', '4310504'),
(4817, 21, 'Itaara', '4310538'),
(4818, 21, 'Itacurubi', '4310553'),
(4819, 21, 'Itapuca', '4310579'),
(4820, 21, 'Itaqui', '4310603'),
(4821, 21, 'Itati', '4310652'),
(4822, 21, 'Itatiba do Sul', '4310702'),
(4823, 21, 'Ivorá', '4310751'),
(4824, 21, 'Ivoti', '4310801'),
(4825, 21, 'Jaboticaba', '4310850'),
(4826, 21, 'Jacuizinho', '4310876'),
(4827, 21, 'Jacutinga', '4310900'),
(4828, 21, 'Jaguarão', '4311007'),
(4829, 21, 'Jaguari', '4311106'),
(4830, 21, 'Jaquirana', '4311122'),
(4831, 21, 'Jari', '4311130'),
(4832, 21, 'Jóia', '4311155'),
(4833, 21, 'Júlio de Castilhos', '4311205'),
(4834, 21, 'Lagoa Bonita do Sul', '4311239'),
(4835, 21, 'Lagoão', '4311254'),
(4836, 21, 'Lagoa dos Três Cantos', '4311270'),
(4837, 21, 'Lagoa Vermelha', '4311304'),
(4838, 21, 'Lajeado', '4311403'),
(4839, 21, 'Lajeado do Bugre', '4311429'),
(4840, 21, 'Lavras do Sul', '4311502'),
(4841, 21, 'Liberato Salzano', '4311601'),
(4842, 21, 'Lindolfo Collor', '4311627'),
(4843, 21, 'Linha Nova', '4311643'),
(4844, 21, 'Machadinho', '4311700'),
(4845, 21, 'Maçambará', '4311718'),
(4846, 21, 'Mampituba', '4311734'),
(4847, 21, 'Manoel Viana', '4311759'),
(4848, 21, 'Maquiné', '4311775'),
(4849, 21, 'Maratá', '4311791'),
(4850, 21, 'Marau', '4311809'),
(4851, 21, 'Marcelino Ramos', '4311908'),
(4852, 21, 'Mariana Pimentel', '4311981'),
(4853, 21, 'Mariano Moro', '4312005'),
(4854, 21, 'Marques de Souza', '4312054'),
(4855, 21, 'Mata', '4312104'),
(4856, 21, 'Mato Castelhano', '4312138'),
(4857, 21, 'Mato Leitão', '4312153'),
(4858, 21, 'Mato Queimado', '4312179'),
(4859, 21, 'Maximiliano de Almeida', '4312203'),
(4860, 21, 'Minas do Leão', '4312252'),
(4861, 21, 'Miraguaí', '4312302'),
(4862, 21, 'Montauri', '4312351'),
(4863, 21, 'Monte Alegre dos Campos', '4312377'),
(4864, 21, 'Monte Belo do Sul', '4312385'),
(4865, 21, 'Montenegro', '4312401'),
(4866, 21, 'Mormaço', '4312427'),
(4867, 21, 'Morrinhos do Sul', '4312443'),
(4868, 21, 'Morro Redondo', '4312450'),
(4869, 21, 'Morro Reuter', '4312476'),
(4870, 21, 'Mostardas', '4312500'),
(4871, 21, 'Muçum', '4312609'),
(4872, 21, 'Muitos Capões', '4312617'),
(4873, 21, 'Muliterno', '4312625'),
(4874, 21, 'Não-Me-Toque', '4312658'),
(4875, 21, 'Nicolau Vergueiro', '4312674'),
(4876, 21, 'Nonoai', '4312708'),
(4877, 21, 'Nova Alvorada', '4312757'),
(4878, 21, 'Nova Araçá', '4312807'),
(4879, 21, 'Nova Bassano', '4312906'),
(4880, 21, 'Nova Boa Vista', '4312955'),
(4881, 21, 'Nova Bréscia', '4313003'),
(4882, 21, 'Nova Candelária', '4313011'),
(4883, 21, 'Nova Esperança do Sul', '4313037'),
(4884, 21, 'Nova Hartz', '4313060'),
(4885, 21, 'Nova Pádua', '4313086'),
(4886, 21, 'Nova Palma', '4313102'),
(4887, 21, 'Nova Petrópolis', '4313201'),
(4888, 21, 'Nova Prata', '4313300'),
(4889, 21, 'Nova Ramada', '4313334'),
(4890, 21, 'Nova Roma do Sul', '4313359'),
(4891, 21, 'Nova Santa Rita', '4313375'),
(4892, 21, 'Novo Cabrais', '4313391'),
(4893, 21, 'Novo Hamburgo', '4313409'),
(4894, 21, 'Novo Machado', '4313425'),
(4895, 21, 'Novo Tiradentes', '4313441'),
(4896, 21, 'Novo Xingu', '4313466'),
(4897, 21, 'Novo Barreiro', '4313490'),
(4898, 21, 'Osório', '4313508'),
(4899, 21, 'Paim Filho', '4313607'),
(4900, 21, 'Palmares do Sul', '4313656'),
(4901, 21, 'Palmeira das Missões', '4313706'),
(4902, 21, 'Palmitinho', '4313805'),
(4903, 21, 'Panambi', '4313904'),
(4904, 21, 'Pantano Grande', '4313953'),
(4905, 21, 'Paraí', '4314001'),
(4906, 21, 'Paraíso do Sul', '4314027'),
(4907, 21, 'Pareci Novo', '4314035'),
(4908, 21, 'Parobé', '4314050'),
(4909, 21, 'Passa Sete', '4314068'),
(4910, 21, 'Passo do Sobrado', '4314076'),
(4911, 21, 'Passo Fundo', '4314100'),
(4912, 21, 'Paulo Bento', '4314134'),
(4913, 21, 'Paverama', '4314159'),
(4914, 21, 'Pedras Altas', '4314175'),
(4915, 21, 'Pedro Osório', '4314209'),
(4916, 21, 'Pejuçara', '4314308'),
(4917, 21, 'Pelotas', '4314407'),
(4918, 21, 'Picada Café', '4314423'),
(4919, 21, 'Pinhal', '4314456'),
(4920, 21, 'Pinhal da Serra', '4314464'),
(4921, 21, 'Pinhal Grande', '4314472'),
(4922, 21, 'Pinheirinho do Vale', '4314498'),
(4923, 21, 'Pinheiro Machado', '4314506'),
(4924, 21, 'Pinto Bandeira', '4314548'),
(4925, 21, 'Pirapó', '4314555'),
(4926, 21, 'Piratini', '4314605'),
(4927, 21, 'Planalto', '4314704'),
(4928, 21, 'Poço das Antas', '4314753'),
(4929, 21, 'Pontão', '4314779'),
(4930, 21, 'Ponte Preta', '4314787'),
(4931, 21, 'Portão', '4314803'),
(4932, 21, 'Porto Alegre', '4314902'),
(4933, 21, 'Porto Lucena', '4315008'),
(4934, 21, 'Porto Mauá', '4315057'),
(4935, 21, 'Porto Vera Cruz', '4315073'),
(4936, 21, 'Porto Xavier', '4315107'),
(4937, 21, 'Pouso Novo', '4315131'),
(4938, 21, 'Presidente Lucena', '4315149'),
(4939, 21, 'Progresso', '4315156'),
(4940, 21, 'Protásio Alves', '4315172'),
(4941, 21, 'Putinga', '4315206'),
(4942, 21, 'Quaraí', '4315305'),
(4943, 21, 'Quatro Irmãos', '4315313'),
(4944, 21, 'Quevedos', '4315321'),
(4945, 21, 'Quinze de Novembro', '4315354'),
(4946, 21, 'Redentora', '4315404'),
(4947, 21, 'Relvado', '4315453'),
(4948, 21, 'Restinga Seca', '4315503'),
(4949, 21, 'Rio dos Índios', '4315552'),
(4950, 21, 'Rio Grande', '4315602'),
(4951, 21, 'Rio Pardo', '4315701'),
(4952, 21, 'Riozinho', '4315750'),
(4953, 21, 'Roca Sales', '4315800'),
(4954, 21, 'Rodeio Bonito', '4315909'),
(4955, 21, 'Rolador', '4315958'),
(4956, 21, 'Rolante', '4316006'),
(4957, 21, 'Ronda Alta', '4316105'),
(4958, 21, 'Rondinha', '4316204'),
(4959, 21, 'Roque Gonzales', '4316303'),
(4960, 21, 'Rosário do Sul', '4316402'),
(4961, 21, 'Sagrada Família', '4316428'),
(4962, 21, 'Saldanha Marinho', '4316436'),
(4963, 21, 'Salto do Jacuí', '4316451'),
(4964, 21, 'Salvador das Missões', '4316477'),
(4965, 21, 'Salvador do Sul', '4316501'),
(4966, 21, 'Sananduva', '4316600'),
(4967, 21, 'Santa Bárbara do Sul', '4316709'),
(4968, 21, 'Santa Cecília do Sul', '4316733'),
(4969, 21, 'Santa Clara do Sul', '4316758'),
(4970, 21, 'Santa Cruz do Sul', '4316808'),
(4971, 21, 'Santa Maria', '4316907'),
(4972, 21, 'Santa Maria do Herval', '4316956'),
(4973, 21, 'Santa Margarida do Sul', '4316972'),
(4974, 21, 'Santana da Boa Vista', '4317004'),
(4975, 21, 'Sant\'Ana do Livramento', '4317103'),
(4976, 21, 'Santa Rosa', '4317202'),
(4977, 21, 'Santa Tereza', '4317251'),
(4978, 21, 'Santa Vitória do Palmar', '4317301'),
(4979, 21, 'Santiago', '4317400'),
(4980, 21, 'Santo Ângelo', '4317509'),
(4981, 21, 'Santo Antônio do Palma', '4317558'),
(4982, 21, 'Santo Antônio da Patrulha', '4317608'),
(4983, 21, 'Santo Antônio das Missões', '4317707'),
(4984, 21, 'Santo Antônio do Planalto', '4317756'),
(4985, 21, 'Santo Augusto', '4317806'),
(4986, 21, 'Santo Cristo', '4317905'),
(4987, 21, 'Santo Expedito do Sul', '4317954'),
(4988, 21, 'São Borja', '4318002'),
(4989, 21, 'São Domingos do Sul', '4318051'),
(4990, 21, 'São Francisco de Assis', '4318101'),
(4991, 21, 'São Francisco de Paula', '4318200'),
(4992, 21, 'São Gabriel', '4318309'),
(4993, 21, 'São Jerônimo', '4318408'),
(4994, 21, 'São João da Urtiga', '4318424'),
(4995, 21, 'São João do Polêsine', '4318432'),
(4996, 21, 'São Jorge', '4318440'),
(4997, 21, 'São José das Missões', '4318457'),
(4998, 21, 'São José do Herval', '4318465'),
(4999, 21, 'São José do Hortêncio', '4318481'),
(5000, 21, 'São José do Inhacorá', '4318499'),
(5001, 21, 'São José do Norte', '4318507'),
(5002, 21, 'São José do Ouro', '4318606'),
(5003, 21, 'São José do Sul', '4318614'),
(5004, 21, 'São José dos Ausentes', '4318622'),
(5005, 21, 'São Leopoldo', '4318705'),
(5006, 21, 'São Lourenço do Sul', '4318804'),
(5007, 21, 'São Luiz Gonzaga', '4318903'),
(5008, 21, 'São Marcos', '4319000'),
(5009, 21, 'São Martinho', '4319109'),
(5010, 21, 'São Martinho da Serra', '4319125'),
(5011, 21, 'São Miguel das Missões', '4319158'),
(5012, 21, 'São Nicolau', '4319208'),
(5013, 21, 'São Paulo das Missões', '4319307'),
(5014, 21, 'São Pedro da Serra', '4319356'),
(5015, 21, 'São Pedro das Missões', '4319364'),
(5016, 21, 'São Pedro do Butiá', '4319372'),
(5017, 21, 'São Pedro do Sul', '4319406'),
(5018, 21, 'São Sebastião do Caí', '4319505'),
(5019, 21, 'São Sepé', '4319604'),
(5020, 21, 'São Valentim', '4319703'),
(5021, 21, 'São Valentim do Sul', '4319711'),
(5022, 21, 'São Valério do Sul', '4319737'),
(5023, 21, 'São Vendelino', '4319752'),
(5024, 21, 'São Vicente do Sul', '4319802'),
(5025, 21, 'Sapiranga', '4319901'),
(5026, 21, 'Sapucaia do Sul', '4320008'),
(5027, 21, 'Sarandi', '4320107'),
(5028, 21, 'Seberi', '4320206'),
(5029, 21, 'Sede Nova', '4320230'),
(5030, 21, 'Segredo', '4320263'),
(5031, 21, 'Selbach', '4320305'),
(5032, 21, 'Senador Salgado Filho', '4320321'),
(5033, 21, 'Sentinela do Sul', '4320354'),
(5034, 21, 'Serafina Corrêa', '4320404'),
(5035, 21, 'Sério', '4320453'),
(5036, 21, 'Sertão', '4320503'),
(5037, 21, 'Sertão Santana', '4320552'),
(5038, 21, 'Sete de Setembro', '4320578'),
(5039, 21, 'Severiano de Almeida', '4320602'),
(5040, 21, 'Silveira Martins', '4320651'),
(5041, 21, 'Sinimbu', '4320677'),
(5042, 21, 'Sobradinho', '4320701'),
(5043, 21, 'Soledade', '4320800'),
(5044, 21, 'Tabaí', '4320859'),
(5045, 21, 'Tapejara', '4320909'),
(5046, 21, 'Tapera', '4321006'),
(5047, 21, 'Tapes', '4321105'),
(5048, 21, 'Taquara', '4321204'),
(5049, 21, 'Taquari', '4321303'),
(5050, 21, 'Taquaruçu do Sul', '4321329'),
(5051, 21, 'Tavares', '4321352'),
(5052, 21, 'Tenente Portela', '4321402'),
(5053, 21, 'Terra de Areia', '4321436'),
(5054, 21, 'Teutônia', '4321451'),
(5055, 21, 'Tio Hugo', '4321469'),
(5056, 21, 'Tiradentes do Sul', '4321477'),
(5057, 21, 'Toropi', '4321493'),
(5058, 21, 'Torres', '4321501'),
(5059, 21, 'Tramandaí', '4321600'),
(5060, 21, 'Travesseiro', '4321626'),
(5061, 21, 'Três Arroios', '4321634'),
(5062, 21, 'Três Cachoeiras', '4321667'),
(5063, 21, 'Três Coroas', '4321709'),
(5064, 21, 'Três de Maio', '4321808'),
(5065, 21, 'Três Forquilhas', '4321832'),
(5066, 21, 'Três Palmeiras', '4321857'),
(5067, 21, 'Três Passos', '4321907'),
(5068, 21, 'Trindade do Sul', '4321956'),
(5069, 21, 'Triunfo', '4322004'),
(5070, 21, 'Tucunduva', '4322103'),
(5071, 21, 'Tunas', '4322152'),
(5072, 21, 'Tupanci do Sul', '4322186'),
(5073, 21, 'Tupanciretã', '4322202'),
(5074, 21, 'Tupandi', '4322251'),
(5075, 21, 'Tuparendi', '4322301'),
(5076, 21, 'Turuçu', '4322327'),
(5077, 21, 'Ubiretama', '4322343'),
(5078, 21, 'União da Serra', '4322350'),
(5079, 21, 'Unistalda', '4322376'),
(5080, 21, 'Uruguaiana', '4322400'),
(5081, 21, 'Vacaria', '4322509'),
(5082, 21, 'Vale Verde', '4322525'),
(5083, 21, 'Vale do Sol', '4322533'),
(5084, 21, 'Vale Real', '4322541'),
(5085, 21, 'Vanini', '4322558'),
(5086, 21, 'Venâncio Aires', '4322608'),
(5087, 21, 'Vera Cruz', '4322707'),
(5088, 21, 'Veranópolis', '4322806'),
(5089, 21, 'Vespasiano Correa', '4322855'),
(5090, 21, 'Viadutos', '4322905'),
(5091, 21, 'Viamão', '4323002'),
(5092, 21, 'Vicente Dutra', '4323101'),
(5093, 21, 'Victor Graeff', '4323200'),
(5094, 21, 'Vila Flores', '4323309'),
(5095, 21, 'Vila Lângaro', '4323358'),
(5096, 21, 'Vila Maria', '4323408'),
(5097, 21, 'Vila Nova do Sul', '4323457'),
(5098, 21, 'Vista Alegre', '4323507'),
(5099, 21, 'Vista Alegre do Prata', '4323606'),
(5100, 21, 'Vista Gaúcha', '4323705'),
(5101, 21, 'Vitória das Missões', '4323754'),
(5102, 21, 'Westfalia', '4323770'),
(5103, 21, 'Xangri-lá', '4323804'),
(5104, 11, 'Água Clara', '5000203'),
(5105, 11, 'Alcinópolis', '5000252'),
(5106, 11, 'Amambai', '5000609'),
(5107, 11, 'Anastácio', '5000708'),
(5108, 11, 'Anaurilândia', '5000807'),
(5109, 11, 'Angélica', '5000856'),
(5110, 11, 'Antônio João', '5000906'),
(5111, 11, 'Aparecida do Taboado', '5001003'),
(5112, 11, 'Aquidauana', '5001102'),
(5113, 11, 'Aral Moreira', '5001243'),
(5114, 11, 'Bandeirantes', '5001508'),
(5115, 11, 'Bataguassu', '5001904'),
(5116, 11, 'Batayporã', '5002001'),
(5117, 11, 'Bela Vista', '5002100'),
(5118, 11, 'Bodoquena', '5002159'),
(5119, 11, 'Bonito', '5002209'),
(5120, 11, 'Brasilândia', '5002308'),
(5121, 11, 'Caarapó', '5002407'),
(5122, 11, 'Camapuã', '5002605'),
(5123, 11, 'Campo Grande', '5002704'),
(5124, 11, 'Caracol', '5002803'),
(5125, 11, 'Cassilândia', '5002902'),
(5126, 11, 'Chapadão do Sul', '5002951'),
(5127, 11, 'Corguinho', '5003108'),
(5128, 11, 'Coronel Sapucaia', '5003157'),
(5129, 11, 'Corumbá', '5003207'),
(5130, 11, 'Costa Rica', '5003256'),
(5131, 11, 'Coxim', '5003306'),
(5132, 11, 'Deodápolis', '5003454'),
(5133, 11, 'Dois Irmãos do Buriti', '5003488'),
(5134, 11, 'Douradina', '5003504'),
(5135, 11, 'Dourados', '5003702'),
(5136, 11, 'Eldorado', '5003751'),
(5137, 11, 'Fátima do Sul', '5003801'),
(5138, 11, 'Figueirão', '5003900'),
(5139, 11, 'Glória de Dourados', '5004007'),
(5140, 11, 'Guia Lopes da Laguna', '5004106'),
(5141, 11, 'Iguatemi', '5004304'),
(5142, 11, 'Inocência', '5004403'),
(5143, 11, 'Itaporã', '5004502'),
(5144, 11, 'Itaquiraí', '5004601'),
(5145, 11, 'Ivinhema', '5004700'),
(5146, 11, 'Japorã', '5004809'),
(5147, 11, 'Jaraguari', '5004908'),
(5148, 11, 'Jardim', '5005004'),
(5149, 11, 'Jateí', '5005103'),
(5150, 11, 'Juti', '5005152'),
(5151, 11, 'Ladário', '5005202'),
(5152, 11, 'Laguna Carapã', '5005251'),
(5153, 11, 'Maracaju', '5005400'),
(5154, 11, 'Miranda', '5005608'),
(5155, 11, 'Mundo Novo', '5005681'),
(5156, 11, 'Naviraí', '5005707'),
(5157, 11, 'Nioaque', '5005806'),
(5158, 11, 'Nova Alvorada do Sul', '5006002'),
(5159, 11, 'Nova Andradina', '5006200'),
(5160, 11, 'Novo Horizonte do Sul', '5006259'),
(5161, 11, 'Paraíso das Águas', '5006275'),
(5162, 11, 'Paranaíba', '5006309'),
(5163, 11, 'Paranhos', '5006358'),
(5164, 11, 'Pedro Gomes', '5006408'),
(5165, 11, 'Ponta Porã', '5006606'),
(5166, 11, 'Porto Murtinho', '5006903'),
(5167, 11, 'Ribas do Rio Pardo', '5007109'),
(5168, 11, 'Rio Brilhante', '5007208'),
(5169, 11, 'Rio Negro', '5007307'),
(5170, 11, 'Rio Verde de Mato Grosso', '5007406'),
(5171, 11, 'Rochedo', '5007505'),
(5172, 11, 'Santa Rita do Pardo', '5007554'),
(5173, 11, 'São Gabriel do Oeste', '5007695'),
(5174, 11, 'Sete Quedas', '5007703'),
(5175, 11, 'Selvíria', '5007802'),
(5176, 11, 'Sidrolândia', '5007901'),
(5177, 11, 'Sonora', '5007935'),
(5178, 11, 'Tacuru', '5007950'),
(5179, 11, 'Taquarussu', '5007976'),
(5180, 11, 'Terenos', '5008008'),
(5181, 11, 'Três Lagoas', '5008305'),
(5182, 11, 'Vicentina', '5008404'),
(5183, 12, 'Acorizal', '5100102'),
(5184, 12, 'Água Boa', '5100201'),
(5185, 12, 'Alta Floresta', '5100250'),
(5186, 12, 'Alto Araguaia', '5100300'),
(5187, 12, 'Alto Boa Vista', '5100359'),
(5188, 12, 'Alto Garças', '5100409'),
(5189, 12, 'Alto Paraguai', '5100508'),
(5190, 12, 'Alto Taquari', '5100607'),
(5191, 12, 'Apiacás', '5100805'),
(5192, 12, 'Araguaiana', '5101001'),
(5193, 12, 'Araguainha', '5101209'),
(5194, 12, 'Araputanga', '5101258'),
(5195, 12, 'Arenápolis', '5101308'),
(5196, 12, 'Aripuanã', '5101407'),
(5197, 12, 'Barão de Melgaço', '5101605'),
(5198, 12, 'Barra do Bugres', '5101704'),
(5199, 12, 'Barra do Garças', '5101803'),
(5200, 12, 'Bom Jesus do Araguaia', '5101852'),
(5201, 12, 'Brasnorte', '5101902'),
(5202, 12, 'Cáceres', '5102504'),
(5203, 12, 'Campinápolis', '5102603'),
(5204, 12, 'Campo Novo do Parecis', '5102637'),
(5205, 12, 'Campo Verde', '5102678'),
(5206, 12, 'Campos de Júlio', '5102686'),
(5207, 12, 'Canabrava do Norte', '5102694'),
(5208, 12, 'Canarana', '5102702'),
(5209, 12, 'Carlinda', '5102793'),
(5210, 12, 'Castanheira', '5102850'),
(5211, 12, 'Chapada dos Guimarães', '5103007'),
(5212, 12, 'Cláudia', '5103056'),
(5213, 12, 'Cocalinho', '5103106'),
(5214, 12, 'Colíder', '5103205'),
(5215, 12, 'Colniza', '5103254'),
(5216, 12, 'Comodoro', '5103304'),
(5217, 12, 'Confresa', '5103353'),
(5218, 12, 'Conquista D\'Oeste', '5103361'),
(5219, 12, 'Cotriguaçu', '5103379'),
(5220, 12, 'Cuiabá', '5103403'),
(5221, 12, 'Curvelândia', '5103437'),
(5222, 12, 'Denise', '5103452'),
(5223, 12, 'Diamantino', '5103502'),
(5224, 12, 'Dom Aquino', '5103601'),
(5225, 12, 'Feliz Natal', '5103700'),
(5226, 12, 'Figueirópolis D\'Oeste', '5103809'),
(5227, 12, 'Gaúcha do Norte', '5103858'),
(5228, 12, 'General Carneiro', '5103908'),
(5229, 12, 'Glória D\'Oeste', '5103957'),
(5230, 12, 'Guarantã do Norte', '5104104'),
(5231, 12, 'Guiratinga', '5104203'),
(5232, 12, 'Indiavaí', '5104500'),
(5233, 12, 'Ipiranga do Norte', '5104526'),
(5234, 12, 'Itanhangá', '5104542'),
(5235, 12, 'Itaúba', '5104559'),
(5236, 12, 'Itiquira', '5104609'),
(5237, 12, 'Jaciara', '5104807'),
(5238, 12, 'Jangada', '5104906'),
(5239, 12, 'Jauru', '5105002'),
(5240, 12, 'Juara', '5105101'),
(5241, 12, 'Juína', '5105150'),
(5242, 12, 'Juruena', '5105176'),
(5243, 12, 'Juscimeira', '5105200'),
(5244, 12, 'Lambari D\'Oeste', '5105234'),
(5245, 12, 'Lucas do Rio Verde', '5105259'),
(5246, 12, 'Luciara', '5105309'),
(5247, 12, 'Vila Bela da Santíssima Trindade', '5105507'),
(5248, 12, 'Marcelândia', '5105580'),
(5249, 12, 'Matupá', '5105606'),
(5250, 12, 'Mirassol d\'Oeste', '5105622'),
(5251, 12, 'Nobres', '5105903'),
(5252, 12, 'Nortelândia', '5106000'),
(5253, 12, 'Nossa Senhora do Livramento', '5106109'),
(5254, 12, 'Nova Bandeirantes', '5106158'),
(5255, 12, 'Nova Nazaré', '5106174'),
(5256, 12, 'Nova Lacerda', '5106182'),
(5257, 12, 'Nova Santa Helena', '5106190'),
(5258, 12, 'Nova Brasilândia', '5106208'),
(5259, 12, 'Nova Canaã do Norte', '5106216'),
(5260, 12, 'Nova Mutum', '5106224'),
(5261, 12, 'Nova Olímpia', '5106232'),
(5262, 12, 'Nova Ubiratã', '5106240'),
(5263, 12, 'Nova Xavantina', '5106257'),
(5264, 12, 'Novo Mundo', '5106265'),
(5265, 12, 'Novo Horizonte do Norte', '5106273'),
(5266, 12, 'Novo São Joaquim', '5106281'),
(5267, 12, 'Paranaíta', '5106299'),
(5268, 12, 'Paranatinga', '5106307'),
(5269, 12, 'Novo Santo Antônio', '5106315'),
(5270, 12, 'Pedra Preta', '5106372'),
(5271, 12, 'Peixoto de Azevedo', '5106422'),
(5272, 12, 'Planalto da Serra', '5106455'),
(5273, 12, 'Poconé', '5106505'),
(5274, 12, 'Pontal do Araguaia', '5106653'),
(5275, 12, 'Ponte Branca', '5106703'),
(5276, 12, 'Pontes e Lacerda', '5106752'),
(5277, 12, 'Porto Alegre do Norte', '5106778'),
(5278, 12, 'Porto dos Gaúchos', '5106802'),
(5279, 12, 'Porto Esperidião', '5106828'),
(5280, 12, 'Porto Estrela', '5106851'),
(5281, 12, 'Poxoréo', '5107008'),
(5282, 12, 'Primavera do Leste', '5107040'),
(5283, 12, 'Querência', '5107065'),
(5284, 12, 'São José dos Quatro Marcos', '5107107'),
(5285, 12, 'Reserva do Cabaçal', '5107156'),
(5286, 12, 'Ribeirão Cascalheira', '5107180'),
(5287, 12, 'Ribeirãozinho', '5107198'),
(5288, 12, 'Rio Branco', '5107206'),
(5289, 12, 'Santa Carmem', '5107248'),
(5290, 12, 'Santo Afonso', '5107263'),
(5291, 12, 'São José do Povo', '5107297'),
(5292, 12, 'São José do Rio Claro', '5107305'),
(5293, 12, 'São José do Xingu', '5107354'),
(5294, 12, 'São Pedro da Cipa', '5107404'),
(5295, 12, 'Rondolândia', '5107578'),
(5296, 12, 'Rondonópolis', '5107602'),
(5297, 12, 'Rosário Oeste', '5107701'),
(5298, 12, 'Santa Cruz do Xingu', '5107743'),
(5299, 12, 'Salto do Céu', '5107750'),
(5300, 12, 'Santa Rita do Trivelato', '5107768'),
(5301, 12, 'Santa Terezinha', '5107776'),
(5302, 12, 'Santo Antônio do Leste', '5107792'),
(5303, 12, 'Santo Antônio do Leverger', '5107800'),
(5304, 12, 'São Félix do Araguaia', '5107859'),
(5305, 12, 'Sapezal', '5107875'),
(5306, 12, 'Serra Nova Dourada', '5107883'),
(5307, 12, 'Sinop', '5107909'),
(5308, 12, 'Sorriso', '5107925'),
(5309, 12, 'Tabaporã', '5107941'),
(5310, 12, 'Tangará da Serra', '5107958'),
(5311, 12, 'Tapurah', '5108006'),
(5312, 12, 'Terra Nova do Norte', '5108055'),
(5313, 12, 'Tesouro', '5108105'),
(5314, 12, 'Torixoréu', '5108204'),
(5315, 12, 'União do Sul', '5108303'),
(5316, 12, 'Vale de São Domingos', '5108352'),
(5317, 12, 'Várzea Grande', '5108402'),
(5318, 12, 'Vera', '5108501'),
(5319, 12, 'Vila Rica', '5108600'),
(5320, 12, 'Nova Guarita', '5108808'),
(5321, 12, 'Nova Marilândia', '5108857'),
(5322, 12, 'Nova Maringá', '5108907'),
(5323, 12, 'Nova Monte Verde', '5108956'),
(5324, 9, 'Abadia de Goiás', '5200050'),
(5325, 9, 'Abadiânia', '5200100'),
(5326, 9, 'Acreúna', '5200134'),
(5327, 9, 'Adelândia', '5200159'),
(5328, 9, 'Água Fria de Goiás', '5200175'),
(5329, 9, 'Água Limpa', '5200209'),
(5330, 9, 'Águas Lindas de Goiás', '5200258'),
(5331, 9, 'Alexânia', '5200308'),
(5332, 9, 'Aloândia', '5200506'),
(5333, 9, 'Alto Horizonte', '5200555'),
(5334, 9, 'Alto Paraíso de Goiás', '5200605'),
(5335, 9, 'Alvorada do Norte', '5200803'),
(5336, 9, 'Amaralina', '5200829'),
(5337, 9, 'Americano do Brasil', '5200852'),
(5338, 9, 'Amorinópolis', '5200902'),
(5339, 9, 'Anápolis', '5201108'),
(5340, 9, 'Anhanguera', '5201207'),
(5341, 9, 'Anicuns', '5201306'),
(5342, 9, 'Aparecida de Goiânia', '5201405'),
(5343, 9, 'Aparecida do Rio Doce', '5201454'),
(5344, 9, 'Aporé', '5201504'),
(5345, 9, 'Araçu', '5201603'),
(5346, 9, 'Aragarças', '5201702'),
(5347, 9, 'Aragoiânia', '5201801'),
(5348, 9, 'Araguapaz', '5202155'),
(5349, 9, 'Arenópolis', '5202353'),
(5350, 9, 'Aruanã', '5202502'),
(5351, 9, 'Aurilândia', '5202601'),
(5352, 9, 'Avelinópolis', '5202809'),
(5353, 9, 'Baliza', '5203104'),
(5354, 9, 'Barro Alto', '5203203'),
(5355, 9, 'Bela Vista de Goiás', '5203302'),
(5356, 9, 'Bom Jardim de Goiás', '5203401'),
(5357, 9, 'Bom Jesus de Goiás', '5203500'),
(5358, 9, 'Bonfinópolis', '5203559'),
(5359, 9, 'Bonópolis', '5203575'),
(5360, 9, 'Brazabrantes', '5203609'),
(5361, 9, 'Britânia', '5203807'),
(5362, 9, 'Buriti Alegre', '5203906'),
(5363, 9, 'Buriti de Goiás', '5203939'),
(5364, 9, 'Buritinópolis', '5203962'),
(5365, 9, 'Cabeceiras', '5204003'),
(5366, 9, 'Cachoeira Alta', '5204102'),
(5367, 9, 'Cachoeira de Goiás', '5204201'),
(5368, 9, 'Cachoeira Dourada', '5204250'),
(5369, 9, 'Caçu', '5204300'),
(5370, 9, 'Caiapônia', '5204409'),
(5371, 9, 'Caldas Novas', '5204508'),
(5372, 9, 'Caldazinha', '5204557'),
(5373, 9, 'Campestre de Goiás', '5204607'),
(5374, 9, 'Campinaçu', '5204656'),
(5375, 9, 'Campinorte', '5204706'),
(5376, 9, 'Campo Alegre de Goiás', '5204805'),
(5377, 9, 'Campo Limpo de Goiás', '5204854'),
(5378, 9, 'Campos Belos', '5204904'),
(5379, 9, 'Campos Verdes', '5204953'),
(5380, 9, 'Carmo do Rio Verde', '5205000'),
(5381, 9, 'Castelândia', '5205059'),
(5382, 9, 'Catalão', '5205109'),
(5383, 9, 'Caturaí', '5205208'),
(5384, 9, 'Cavalcante', '5205307'),
(5385, 9, 'Ceres', '5205406'),
(5386, 9, 'Cezarina', '5205455'),
(5387, 9, 'Chapadão do Céu', '5205471'),
(5388, 9, 'Cidade Ocidental', '5205497'),
(5389, 9, 'Cocalzinho de Goiás', '5205513'),
(5390, 9, 'Colinas do Sul', '5205521'),
(5391, 9, 'Córrego do Ouro', '5205703'),
(5392, 9, 'Corumbá de Goiás', '5205802'),
(5393, 9, 'Corumbaíba', '5205901'),
(5394, 9, 'Cristalina', '5206206'),
(5395, 9, 'Cristianópolis', '5206305'),
(5396, 9, 'Crixás', '5206404'),
(5397, 9, 'Cromínia', '5206503'),
(5398, 9, 'Cumari', '5206602'),
(5399, 9, 'Damianópolis', '5206701'),
(5400, 9, 'Damolândia', '5206800'),
(5401, 9, 'Davinópolis', '5206909'),
(5402, 9, 'Diorama', '5207105'),
(5403, 9, 'Doverlândia', '5207253'),
(5404, 9, 'Edealina', '5207352'),
(5405, 9, 'Edéia', '5207402'),
(5406, 9, 'Estrela do Norte', '5207501'),
(5407, 9, 'Faina', '5207535'),
(5408, 9, 'Fazenda Nova', '5207600'),
(5409, 9, 'Firminópolis', '5207808'),
(5410, 9, 'Flores de Goiás', '5207907'),
(5411, 9, 'Formosa', '5208004'),
(5412, 9, 'Formoso', '5208103'),
(5413, 9, 'Gameleira de Goiás', '5208152'),
(5414, 9, 'Divinópolis de Goiás', '5208301'),
(5415, 9, 'Goianápolis', '5208400'),
(5416, 9, 'Goiandira', '5208509'),
(5417, 9, 'Goianésia', '5208608'),
(5418, 9, 'Goiânia', '5208707'),
(5419, 9, 'Goianira', '5208806'),
(5420, 9, 'Goiás', '5208905'),
(5421, 9, 'Goiatuba', '5209101'),
(5422, 9, 'Gouvelândia', '5209150'),
(5423, 9, 'Guapó', '5209200'),
(5424, 9, 'Guaraíta', '5209291'),
(5425, 9, 'Guarani de Goiás', '5209408'),
(5426, 9, 'Guarinos', '5209457'),
(5427, 9, 'Heitoraí', '5209606'),
(5428, 9, 'Hidrolândia', '5209705'),
(5429, 9, 'Hidrolina', '5209804'),
(5430, 9, 'Iaciara', '5209903'),
(5431, 9, 'Inaciolândia', '5209937'),
(5432, 9, 'Indiara', '5209952'),
(5433, 9, 'Inhumas', '5210000'),
(5434, 9, 'Ipameri', '5210109'),
(5435, 9, 'Ipiranga de Goiás', '5210158'),
(5436, 9, 'Iporá', '5210208'),
(5437, 9, 'Israelândia', '5210307'),
(5438, 9, 'Itaberaí', '5210406'),
(5439, 9, 'Itaguari', '5210562'),
(5440, 9, 'Itaguaru', '5210604'),
(5441, 9, 'Itajá', '5210802'),
(5442, 9, 'Itapaci', '5210901'),
(5443, 9, 'Itapirapuã', '5211008'),
(5444, 9, 'Itapuranga', '5211206'),
(5445, 9, 'Itarumã', '5211305'),
(5446, 9, 'Itauçu', '5211404'),
(5447, 9, 'Itumbiara', '5211503'),
(5448, 9, 'Ivolândia', '5211602'),
(5449, 9, 'Jandaia', '5211701'),
(5450, 9, 'Jaraguá', '5211800'),
(5451, 9, 'Jataí', '5211909'),
(5452, 9, 'Jaupaci', '5212006'),
(5453, 9, 'Jesúpolis', '5212055'),
(5454, 9, 'Joviânia', '5212105'),
(5455, 9, 'Jussara', '5212204'),
(5456, 9, 'Lagoa Santa', '5212253'),
(5457, 9, 'Leopoldo de Bulhões', '5212303'),
(5458, 9, 'Luziânia', '5212501'),
(5459, 9, 'Mairipotaba', '5212600'),
(5460, 9, 'Mambaí', '5212709'),
(5461, 9, 'Mara Rosa', '5212808'),
(5462, 9, 'Marzagão', '5212907'),
(5463, 9, 'Matrinchã', '5212956'),
(5464, 9, 'Maurilândia', '5213004'),
(5465, 9, 'Mimoso de Goiás', '5213053'),
(5466, 9, 'Minaçu', '5213087'),
(5467, 9, 'Mineiros', '5213103'),
(5468, 9, 'Moiporá', '5213400'),
(5469, 9, 'Monte Alegre de Goiás', '5213509'),
(5470, 9, 'Montes Claros de Goiás', '5213707'),
(5471, 9, 'Montividiu', '5213756'),
(5472, 9, 'Montividiu do Norte', '5213772'),
(5473, 9, 'Morrinhos', '5213806'),
(5474, 9, 'Morro Agudo de Goiás', '5213855'),
(5475, 9, 'Mossâmedes', '5213905'),
(5476, 9, 'Mozarlândia', '5214002'),
(5477, 9, 'Mundo Novo', '5214051'),
(5478, 9, 'Mutunópolis', '5214101'),
(5479, 9, 'Nazário', '5214408'),
(5480, 9, 'Nerópolis', '5214507'),
(5481, 9, 'Niquelândia', '5214606'),
(5482, 9, 'Nova América', '5214705'),
(5483, 9, 'Nova Aurora', '5214804'),
(5484, 9, 'Nova Crixás', '5214838'),
(5485, 9, 'Nova Glória', '5214861'),
(5486, 9, 'Nova Iguaçu de Goiás', '5214879'),
(5487, 9, 'Nova Roma', '5214903'),
(5488, 9, 'Nova Veneza', '5215009'),
(5489, 9, 'Novo Brasil', '5215207'),
(5490, 9, 'Novo Gama', '5215231'),
(5491, 9, 'Novo Planalto', '5215256'),
(5492, 9, 'Orizona', '5215306'),
(5493, 9, 'Ouro Verde de Goiás', '5215405'),
(5494, 9, 'Ouvidor', '5215504'),
(5495, 9, 'Padre Bernardo', '5215603'),
(5496, 9, 'Palestina de Goiás', '5215652'),
(5497, 9, 'Palmeiras de Goiás', '5215702'),
(5498, 9, 'Palmelo', '5215801'),
(5499, 9, 'Palminópolis', '5215900'),
(5500, 9, 'Panamá', '5216007'),
(5501, 9, 'Paranaiguara', '5216304'),
(5502, 9, 'Paraúna', '5216403'),
(5503, 9, 'Perolândia', '5216452'),
(5504, 9, 'Petrolina de Goiás', '5216809'),
(5505, 9, 'Pilar de Goiás', '5216908'),
(5506, 9, 'Piracanjuba', '5217104'),
(5507, 9, 'Piranhas', '5217203'),
(5508, 9, 'Pirenópolis', '5217302'),
(5509, 9, 'Pires do Rio', '5217401'),
(5510, 9, 'Planaltina', '5217609'),
(5511, 9, 'Pontalina', '5217708'),
(5512, 9, 'Porangatu', '5218003'),
(5513, 9, 'Porteirão', '5218052');
INSERT INTO `cidade` (`id_cidade`, `id_estado`, `nome_cidade`, `ibge_cidade`) VALUES
(5514, 9, 'Portelândia', '5218102'),
(5515, 9, 'Posse', '5218300'),
(5516, 9, 'Professor Jamil', '5218391'),
(5517, 9, 'Quirinópolis', '5218508'),
(5518, 9, 'Rialma', '5218607'),
(5519, 9, 'Rianápolis', '5218706'),
(5520, 9, 'Rio Quente', '5218789'),
(5521, 9, 'Rio Verde', '5218805'),
(5522, 9, 'Rubiataba', '5218904'),
(5523, 9, 'Sanclerlândia', '5219001'),
(5524, 9, 'Santa Bárbara de Goiás', '5219100'),
(5525, 9, 'Santa Cruz de Goiás', '5219209'),
(5526, 9, 'Santa Fé de Goiás', '5219258'),
(5527, 9, 'Santa Helena de Goiás', '5219308'),
(5528, 9, 'Santa Isabel', '5219357'),
(5529, 9, 'Santa Rita do Araguaia', '5219407'),
(5530, 9, 'Santa Rita do Novo Destino', '5219456'),
(5531, 9, 'Santa Rosa de Goiás', '5219506'),
(5532, 9, 'Santa Tereza de Goiás', '5219605'),
(5533, 9, 'Santa Terezinha de Goiás', '5219704'),
(5534, 9, 'Santo Antônio da Barra', '5219712'),
(5535, 9, 'Santo Antônio de Goiás', '5219738'),
(5536, 9, 'Santo Antônio do Descoberto', '5219753'),
(5537, 9, 'São Domingos', '5219803'),
(5538, 9, 'São Francisco de Goiás', '5219902'),
(5539, 9, 'São João d\'Aliança', '5220009'),
(5540, 9, 'São João da Paraúna', '5220058'),
(5541, 9, 'São Luís de Montes Belos', '5220108'),
(5542, 9, 'São Luíz do Norte', '5220157'),
(5543, 9, 'São Miguel do Araguaia', '5220207'),
(5544, 9, 'São Miguel do Passa Quatro', '5220264'),
(5545, 9, 'São Patrício', '5220280'),
(5546, 9, 'São Simão', '5220405'),
(5547, 9, 'Senador Canedo', '5220454'),
(5548, 9, 'Serranópolis', '5220504'),
(5549, 9, 'Silvânia', '5220603'),
(5550, 9, 'Simolândia', '5220686'),
(5551, 9, 'Sítio d\'Abadia', '5220702'),
(5552, 9, 'Taquaral de Goiás', '5221007'),
(5553, 9, 'Teresina de Goiás', '5221080'),
(5554, 9, 'Terezópolis de Goiás', '5221197'),
(5555, 9, 'Três Ranchos', '5221304'),
(5556, 9, 'Trindade', '5221403'),
(5557, 9, 'Trombas', '5221452'),
(5558, 9, 'Turvânia', '5221502'),
(5559, 9, 'Turvelândia', '5221551'),
(5560, 9, 'Uirapuru', '5221577'),
(5561, 9, 'Uruaçu', '5221601'),
(5562, 9, 'Uruana', '5221700'),
(5563, 9, 'Urutaí', '5221809'),
(5564, 9, 'Valparaíso de Goiás', '5221858'),
(5565, 9, 'Varjão', '5221908'),
(5566, 9, 'Vianópolis', '5222005'),
(5567, 9, 'Vicentinópolis', '5222054'),
(5568, 9, 'Vila Boa', '5222203'),
(5569, 9, 'Vila Propício', '5222302'),
(5570, 7, 'Brasília', '5300108');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

CREATE TABLE `configuracao` (
  `id_configuracao` int(11) NOT NULL,
  `nfe_serie` int(11) DEFAULT NULL,
  `nfe_ambiente` varchar(1) DEFAULT NULL,
  `nfe_versao` varchar(10) DEFAULT NULL,
  `empresa_padrao` int(11) DEFAULT NULL,
  `ultimanfe` int(11) DEFAULT NULL,
  `certificado_digital` varchar(50) DEFAULT NULL,
  `senha_certificado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `configuracao`
--

INSERT INTO `configuracao` (`id_configuracao`, `nfe_serie`, `nfe_ambiente`, `nfe_versao`, `empresa_padrao`, `ultimanfe`, `certificado_digital`, `senha_certificado`) VALUES
(1, 1, '2', '4', 1, 150, 'certificado_erivan.pfx', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contabil_conta`
--

CREATE TABLE `contabil_conta` (
  `id_conta` int(11) NOT NULL,
  `id_pai` int(11) DEFAULT NULL,
  `codigo` varchar(25) NOT NULL,
  `conta` varchar(100) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `tipo` varchar(1) NOT NULL DEFAULT 'N',
  `natureza` varchar(1) NOT NULL,
  `id_plano_conta` int(11) NOT NULL,
  `patrimonial` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contabil_conta`
--

INSERT INTO `contabil_conta` (`id_conta`, `id_pai`, `codigo`, `conta`, `alias`, `tipo`, `natureza`, `id_plano_conta`, `patrimonial`) VALUES
(1, NULL, '1', 'ATIVO', NULL, 'S', 'D', 1, 'N'),
(2, 1, '1.1', 'CIRCULANTE', NULL, 'S', 'D', 1, 'N'),
(3, 2, '1.1.1', 'DISPONIVEL', NULL, 'S', 'D', 1, 'N'),
(4, 3, '1.1.1.001', 'CAIXA', NULL, 'S', 'D', 1, 'N'),
(5, 4, '1.1.1.001.0001', 'Caixa', NULL, 'A', 'D', 1, 'N'),
(7, 3, '1.1.1.002', 'BANCOS C/ MOVIMENTO', 'banco', 'S', 'D', 1, 'N'),
(9, 2, '1.1.2', 'CLIENTES', NULL, 'S', 'D', 1, 'N'),
(10, 9, '1.1.2.001', 'CLIENTES A RECEBER', 'cliente_receber', 'S', 'D', 1, 'N'),
(13, 9, '1.1.2.002', 'CHEQUES A RECEBER', NULL, 'S', 'D', 1, 'N'),
(15, 2, '1.1.3', 'OUTROS CRÉDITOS', NULL, 'S', 'D', 1, 'N'),
(16, 15, '1.1.3.001', 'BANCOS C/ VINCULADA', NULL, 'S', 'D', 1, 'N'),
(17, 15, '1.1.3.005', 'TITULOS A RECUPERAR', NULL, 'S', 'D', 1, 'N'),
(18, 17, '1.1.3.005.0001', 'Simples Nacional a Recuperar', NULL, 'A', 'D', 1, 'N'),
(19, 2, '1.1.4', 'APLICACOES FINANCEIRAS', NULL, 'S', 'D', 1, 'N'),
(20, 19, '1.1.4.001', 'APLICACOES FINANCEIRAS', NULL, 'S', 'D', 1, 'N'),
(21, 2, '1.1.5', 'ESTOQUE', NULL, 'S', 'D', 1, 'N'),
(22, 21, '1.1.5.001', 'MERCADORAS E PRODUTOS', NULL, 'S', 'D', 1, 'N'),
(23, 22, '1.1.5.001.0001', 'Mercadorias p/ Revenda', NULL, 'A', 'D', 1, 'N'),
(24, 21, '1.1.5.002', 'ALMOFARIFADO', NULL, 'S', 'D', 1, 'N'),
(25, 24, '1.1.5.002.0001', 'Mercadorias', NULL, 'A', 'D', 1, 'N'),
(26, 21, '1.1.5.003', '(-) PROVISAO P/ AJUSTE DE ESTOQUE', NULL, 'S', 'D', 1, 'N'),
(27, 26, '1.1.5.003.0001', '(-) Ajuste de Estoque', NULL, 'A', 'D', 1, 'N'),
(28, 2, '1.1.6', 'DESPESAS PAGAS ANTECIPADAMENTE', NULL, 'S', 'D', 1, 'N'),
(29, 28, '1.1.6.001', 'DESPESAS MESES SEGUINTES', NULL, 'S', 'D', 1, 'N'),
(30, 29, '1.1.6.001.0001', 'Assinaturas e Anuidades', NULL, 'A', 'D', 1, 'N'),
(31, 1, '1.2', 'NAO-CIRCULANTE', NULL, 'S', 'D', 1, 'N'),
(32, 31, '1.2.1', 'REALIZAVEL A LONGO PRAZO', NULL, 'S', 'D', 1, 'N'),
(33, 32, '1.2.1.001', 'CLIENTES', NULL, 'S', 'D', 1, 'N'),
(34, 32, '1.2.1.002', 'OUTROS CREDITOS', NULL, 'S', 'D', 1, 'N'),
(35, 31, '1.2.2', 'INVESTIMENTOS', NULL, 'S', 'D', 1, 'N'),
(36, 35, '1.2.2.001', 'IMOVEIS NAO-DESTINADOS AO USO', NULL, 'S', 'D', 1, 'N'),
(37, 35, '1.2.2.002', '(-) PROVISAO P/ PERDAS PERMANENTES', NULL, 'S', 'D', 1, 'N'),
(38, 37, '1.2.2.002.0001', '(-) Equipamentos e Patrimonio', NULL, 'A', 'D', 1, 'N'),
(39, 31, '1.2.3', 'IMOBILIZADO', NULL, 'S', 'D', 1, 'N'),
(40, 39, '1.2.3.001', 'IMOVEIS', NULL, 'S', 'D', 1, 'N'),
(41, 40, '1.2.3.001.0001', 'Terrenos', NULL, 'A', 'D', 1, 'N'),
(42, 40, '1.2.3.001.0002', 'Construções', NULL, 'A', 'D', 1, 'N'),
(43, 40, '1.2.3.001.0003', 'Edificios', NULL, 'A', 'D', 1, 'N'),
(44, 39, '1.2.3.002', 'COMPUTADORES E PERIFÉRICOS', NULL, 'S', 'D', 1, 'N'),
(45, 44, '1.2.3.002.0001', 'COMPUTADORES', NULL, 'A', 'D', 1, 'N'),
(46, 39, '1.2.3.003', 'MAQUINAS E EQUIPAMENTOS', NULL, 'S', 'D', 1, 'N'),
(47, 46, '1.2.3.003.0001', 'Maquinas e Equipamentos', NULL, 'A', 'D', 1, 'N'),
(48, 39, '1.2.3.004', 'VEICULOS', NULL, 'S', 'D', 1, 'N'),
(49, 48, '1.2.3.004.0001', 'Veiculos', NULL, 'A', 'D', 1, 'N'),
(50, 39, '1.2.3.005 (-) ', 'DEPRECIACOES/AMORTIZACOES', NULL, 'S', 'D', 1, 'N'),
(51, 50, '1.2.3.005.0001', '(-) Edificios', NULL, 'A', 'D', 1, 'N'),
(52, 50, '1.2.3.005.0002', '(-) Moveis e Utensilios', NULL, 'A', 'D', 1, 'N'),
(53, 50, '1.2.3.005.0003', '(-) Maquinas e Equipamentos', NULL, 'A', 'D', 1, 'N'),
(54, 50, '1.2.3.005.0004', '(-) Veiculos', NULL, 'A', 'D', 1, 'N'),
(55, 31, '1.2.4', 'INTANGIVEL', NULL, 'S', 'D', 1, 'N'),
(56, 55, '1.2.4.001', 'MARCAS E PATENTES', NULL, 'S', 'D', 1, 'N'),
(57, NULL, '2', 'PASSIVO', NULL, 'S', 'C', 1, 'N'),
(58, 57, '2.1', 'CIRCULANTE', NULL, 'S', 'C', 1, 'N'),
(59, 58, '2.1.1', 'EMPRESTIMOS E FINANCIAMENTOS', NULL, 'S', 'C', 1, 'N'),
(60, 59, '2.1.1.001', 'EMPRESTIMOS', NULL, 'S', 'C', 1, 'N'),
(61, 59, '2.1.1.002', 'FINANCIAMENTOS', NULL, 'S', 'C', 1, 'N'),
(62, 58, '2.1.2', '	FORNECEDORES', NULL, 'S', 'C', 1, 'N'),
(63, 62, '2.1.2.001', 'FORNECEDORES', 'fornecedor', 'S', 'C', 1, 'N'),
(64, 63, '2.1.2.001.0001', 'Fornecedor a Pagar', NULL, 'A', '', 1, 'N'),
(116, 58, '2.1.3', 'OBRIGACOES TRIBUTARIAS', NULL, 'S', 'C', 1, 'N'),
(117, 116, '2.1.3.001', 'IMPOSTOS/CONTRIB A RECOLHER', NULL, 'S', 'C', 1, 'N'),
(118, 117, '2.1.3.001.0001', 'Simples Nacional a Recolher', NULL, 'A', 'C', 1, 'N'),
(119, 58, '2.1.4', 'OBRIGACOES TRABALHISTAS', NULL, 'S', 'C', 1, 'N'),
(120, 119, '2.1.4.001', 'OBRIGACOES C/ PESSOAL', NULL, 'S', 'C', 1, 'N'),
(121, 119, '2.1.4.002', 'OBRIGACOES SOCIAIS', NULL, 'S', 'C', 1, 'N'),
(122, 119, '2.1.4.005', 'PROVISOES', NULL, 'S', 'C', 1, 'N'),
(123, 122, '2.1.4.005.0001', 'Simples Nacional a Recolher', NULL, 'A', 'C', 1, 'N'),
(124, 58, '2.1.5', 'OUTRAS OBRIGACOES', NULL, 'S', 'C', 1, 'N'),
(125, 124, '2.1.5.001', 'CONTAS A PAGAR', NULL, 'S', 'C', 1, 'N'),
(126, 125, '2.1.5.001.0001', 'Servicos Contabeis', NULL, 'A', 'C', 1, 'N'),
(127, 125, '2.1.5.001.0002', 'Diferença de Aliquota SEFAZ-RN', NULL, 'A', 'C', 1, 'N'),
(128, 125, '2.1.5.001.0003', 'DAM Doc Arrecadação Municipal', NULL, 'A', 'C', 1, 'N'),
(129, 125, '2.1.5.001.0004', 'Energia Eletrica', NULL, 'A', 'C', 1, 'N'),
(130, 57, '2.2', 'PASSIVO NAO-CIRCULANTE', NULL, 'S', 'C', 1, 'N'),
(131, 130, '2.2.1', 'EXIGIVEL A LONGO PRAZO', NULL, 'S', 'C', 1, 'N'),
(132, 131, '2.2.1.001', 'EMPRESTIMOS', NULL, 'S', 'C', 1, 'N'),
(133, 131, '2.2.1.002', 'FINANCIAMENTOS', NULL, 'S', 'C', 1, 'N'),
(134, 131, '2.2.1.003', 'FORNECEDORES', NULL, 'S', 'C', 1, 'N'),
(135, 57, '2.3', 'PATRIMONIO LIQUIDO', NULL, 'S', 'C', 1, 'S'),
(136, 135, '2.3.1', 'CAPITAL SOCIAL', NULL, 'S', 'C', 1, 'S'),
(137, 136, '2.3.1.001', 'CAPITAL INTEGRALIZADO', NULL, 'S', 'C', 1, 'S'),
(138, 137, '2.3.1.001.0001', 'Capital Integralizado', NULL, 'A', 'C', 1, 'S'),
(139, 136, '2.3.1.002', '(-) CAPITAL A INTEGRALIZAR', NULL, 'S', 'C', 1, 'S'),
(140, 139, '2.3.1.002.0001', '(-) Capital a Integralizar', NULL, 'A', 'C', 1, 'S'),
(141, 135, '2.3.2', 'RESERVAS DE CAPITAL', NULL, 'S', 'C', 1, 'S'),
(142, 135, '2.3.3', 'RESERVAS DE REAVALIACAO', NULL, 'S', 'C', 1, 'S'),
(143, 135, '2.3.4', 'RESERVAS DE LUCROS', NULL, 'S', 'C', 1, 'S'),
(144, 135, '2.3.5', 'LUCROS OU PREJUIZOS ACUMULADOS', NULL, 'S', 'C', 1, 'S'),
(145, 144, '2.3.5.001', 'LUCROS OU PREJUIZOS ACUMULADOS', NULL, 'S', 'C', 1, 'S'),
(146, 145, '2.3.5.001.0001', 'Lucros Acumulados', 'lucro_acumulado', 'A', 'C', 1, 'S'),
(147, 145, '2.3.5.001.0002', '(-) Prejuizos Acumulados', 'prejuizo_acumulado', 'A', 'C', 1, 'S'),
(148, 145, '2.3.5.001.0003', 'Resultado do Exercicio em Curso', 'are', 'A', 'C', 1, 'S'),
(149, NULL, '3', 'RECEITAS', NULL, 'S', 'C', 1, 'N'),
(150, 149, '3.1', 'RECEITAS OPERACIONAIS', NULL, 'S', 'C', 1, 'N'),
(151, 150, '3.1.1', 'RECEITAS BRUTAS', NULL, 'S', 'C', 1, 'N'),
(152, 151, '3.1.1.001', 'RECEITAS BRUTAS S/ VENDAS', NULL, 'S', 'C', 1, 'N'),
(153, 152, '3.1.1.001.0001', 'Venda de Mercadorias', NULL, 'A', 'C', 1, 'N'),
(154, 151, '3.1.1.002', 'RECEITAS BRUTAS S/ SERVICOS', NULL, 'S', 'C', 1, 'N'),
(155, 154, '3.1.1.002.0001', 'Receitas s/ Serviços', NULL, 'A', 'C', 1, 'N'),
(156, 150, '3.1.2 (-)', 'DEDUCOES S/ RECEITA BRUTA', NULL, 'S', 'C', 1, 'N'),
(157, 156, '3.1.2.001', '(-) CANCELAMETNOS E DEVOLUCOES', NULL, 'S', 'C', 1, 'N'),
(158, 156, '3.1.2.002', '(-) DESCONTOS INCONDICIONAIS', NULL, 'S', 'C', 1, 'N'),
(159, 156, '3.1.2.003', '(-) IMPOSTOS S/ VENDAS E SERVICOS', NULL, 'S', 'C', 1, 'N'),
(160, 159, '3.1.2.003.0001', 'Simples Nacional', NULL, 'A', 'C', 1, 'N'),
(161, 150, '3.1.3', 'RECEITAS FINANCEIRAS', NULL, 'S', 'C', 1, 'N'),
(162, 161, '3.1.3.001', 'JUROS E DESCONTOS', NULL, 'S', 'C', 1, 'N'),
(163, 150, '3.1.4', 'RECUPERACAO DE DESPESAS', NULL, 'S', 'C', 1, 'N'),
(164, 163, '3.1.4.001', 'RECUP CRED-CONSID IRRECUPERAVEIS', NULL, 'S', 'C', 1, 'N'),
(165, 150, '3.1.5', 'OUTRAS RECEITAS OPERACIONAIS', NULL, 'S', 'C', 1, 'N'),
(166, 165, '3.1.5.001', 'RECEITAS DIVERSAS', NULL, 'S', 'C', 1, 'N'),
(167, 149, '3.2', 'RECEITAS NAO-OPERACIONAIS', NULL, 'S', 'C', 1, 'N'),
(168, 167, '3.2.1', 'RESULTADOS NAO-OPERACIONAIS', NULL, 'S', 'C', 1, 'N'),
(169, 168, '3.2.1.001', 'RESULT POSITIVO ALIEN INVESTIMENTO', NULL, 'S', 'C', 1, 'N'),
(170, 168, '3.2.1.002', 'LUCROS ALIEN IMOBILIZADO', NULL, 'S', 'C', 1, 'N'),
(171, 168, '3.2.1.003', 'RESULTADO SINISTRO C/ IMOBILIZADO', NULL, 'S', 'C', 1, 'N'),
(172, NULL, '4', 'DESPESAS', NULL, 'S', '', 1, 'N'),
(173, 172, '4.1', 'DESPESAS OPERACIONAIS', NULL, 'S', 'D', 1, 'N'),
(174, 173, '4.1.1', 'DESPESAS C/ VENDAS', NULL, 'S', 'D', 1, 'N'),
(175, 174, '4.1.1.001', 'DESPESAS C/ PESSOAL', NULL, 'S', 'D', 1, 'N'),
(176, 174, '4.1.1.002', 'COMISSOES S/ VENDAS', NULL, 'S', 'D', 1, 'N'),
(177, 174, '4.1.1.003', 'PROPAGANDA E PUBLICIDADE', NULL, 'S', 'D', 1, 'N'),
(178, 177, '4.1.1.003.0001', 'Publicidade', NULL, 'A', 'D', 1, 'N'),
(179, 177, '4.1.1.003.0002', 'Patrocinios', NULL, 'A', 'D', 1, 'N'),
(180, 177, '4.1.1.003.0003', 'Amostra Gratis', NULL, 'A', 'D', 1, 'N'),
(181, 174, '4.1.1.004', 'DESPESAS C/ ENTREGA', NULL, 'S', 'D', 1, 'N'),
(182, 181, '4.1.1.004.0001', 'Fretes e Carretos', NULL, 'A', 'D', 1, 'N'),
(183, 181, '4.1.1.004.0002', 'Manutencao de Veiculos', NULL, 'A', 'D', 1, 'N'),
(184, 181, '4.1.1.004.0003', 'Combustiveis', NULL, 'A', 'D', 1, 'N'),
(185, 174, '4.1.1.005', 'DESPESAS C/ VIAGENS', NULL, 'S', 'D', 1, 'N'),
(186, 174, '4.1.1.006', 'DESPESAS GERAIS', NULL, 'S', 'D', 1, 'N'),
(187, 186, '4.1.1.006.0001', 'Manutencao e Reparo', NULL, 'A', 'D', 1, 'N'),
(188, 186, '4.1.1.006.0003', 'Telefone', NULL, 'A', 'D', 1, 'N'),
(189, 186, '4.1.1.006.0004', 'Celular', NULL, 'A', 'D', 1, 'N'),
(190, 186, '4.1.1.006.0005', 'Despesas Postais', NULL, 'A', 'D', 1, 'N'),
(191, 186, '4.1.1.006.0006', 'Servicos Prestados por Terceiros', NULL, 'A', 'D', 1, 'N'),
(192, 174, '4.1.1.007', 'PERDAS NO RECEBIMENTO DE CREDITOS', NULL, 'S', 'D', 1, 'N'),
(193, 173, '4.1.2', 'DESPESAS ADMINISTRATIVAS', NULL, 'S', 'D', 1, 'N'),
(194, 193, '4.1.2.001', 'DESPESAS C/ PESSOAL', NULL, 'S', 'D', 1, 'N'),
(195, 193, '4.1.2.002', 'ALUGUEIS E ARRENDAMENTOS', NULL, 'S', 'D', 1, 'N'),
(196, 193, '4.1.2.003', 'IMPOSTOS, TAXAS, CONTRIBUICOES', NULL, 'S', 'D', 1, 'N'),
(197, 196, '4.1.2.003.0001', 'IPTU', NULL, 'A', 'D', 1, 'N'),
(198, 196, '4.1.2.003.0002', 'IPVA', NULL, 'A', 'D', 1, 'N'),
(199, 196, '4.1.2.003.0005', 'Honorarios Contabeis', NULL, 'A', 'D', 1, 'N'),
(200, 196, '4.1.2.003.0006', 'Alvará', NULL, 'A', 'D', 1, 'N'),
(201, 193, '4.1.2.004', 'DESPESAS GERAIS', NULL, 'S', 'D', 1, 'N'),
(202, 201, '4.1.2.004.0001', 'Certificado Digital', NULL, 'A', 'D', 1, 'N'),
(203, 201, '4.1.2.004.0002', 'Energia Eletrica', NULL, 'A', 'D', 1, 'N'),
(204, 201, '4.1.2.004.0003', 'Agua e Esgoto', NULL, 'A', 'D', 1, 'N'),
(205, 201, '4.1.2.004.0004', 'Material de Escritorio', NULL, 'A', 'D', 1, 'N'),
(206, 193, '4.1.2.005', 'DESPESAS FINANCEIRAS', NULL, 'S', 'D', 1, 'N'),
(207, 206, '4.1.2.005.0001', 'Juros Bancarios', NULL, 'A', 'D', 1, 'N'),
(208, 206, '4.1.2.005.0002', 'Tarifas Bancarias', NULL, 'A', 'D', 1, 'N'),
(209, 193, '4.1.2.006', 'DEPRECIAÇÕES', NULL, 'S', 'D', 1, 'N'),
(210, 209, '4.1.2.006.0001', 'Juros de Mora', NULL, 'A', 'D', 1, 'N'),
(211, 209, '4.1.2.006.0002', 'Máquinas e Equipamentos', NULL, 'A', 'D', 1, 'N'),
(212, 209, '4.1.2.006.0003', 'Diferença Aliquota SEFAZ-RN', NULL, 'A', 'D', 1, 'N'),
(213, 172, '4.2', 'DESPESAS NAO-OPERACIONAIS', NULL, 'S', 'D', 1, 'N'),
(214, 213, '4.2.1', 'RESULTADOS NAO-OPERACIONAIS', NULL, 'S', 'D', 1, 'N'),
(215, 214, '4.2.1.001', 'OUTRAS BAIXAS DO ATIVO PERMANENTE', NULL, 'S', 'D', 1, 'N'),
(216, 214, '4.2.1.002', 'PERDAS', NULL, 'S', 'D', 1, 'N'),
(217, 216, '4.3.1.002.0001', 'Perdas p/ Falta no Inventario', NULL, 'A', 'D', 1, 'N'),
(218, 172, '4.3', 'CUSTOS C/ PRODUTOS/SERVICOS', NULL, 'S', 'D', 1, 'N'),
(219, 218, '4.3.1', 'CUSTOS C/ PRODUTOS/SERVICOS', NULL, 'S', 'D', 1, 'N'),
(220, 219, '4.3.1.001', 'CUSTOS C/ PRODUTOS VENCIDOS', NULL, 'S', 'D', 1, 'N'),
(221, 220, '4.3.2', 'CUSTOS C/ SERVICOS PRESTADOS', NULL, 'S', 'D', 1, 'N'),
(222, 221, '4.3.2.001', 'CUSTOS C/ SERVICOS PRESTADOS', NULL, 'S', 'D', 1, 'N'),
(223, 218, '4.3.3', 'CUSTOS C/ MERCADORIAS VENDIDAS CMV', NULL, 'S', 'D', 1, 'N'),
(224, 223, '4.3.3.001', 'CUSTOS C/ MERCADORIAS VENDIDAS CMV', NULL, 'S', 'D', 1, 'N'),
(225, 224, '4.3.3.001.0001', 'Custo com Mercadorias Vendidas', NULL, 'A', 'D', 1, 'N'),
(226, NULL, '5', 'CONTAS DE RESULTADOS DO EXERCICIO', '', 'S', 'D', 1, 'N'),
(227, 226, '5.1', 'APURACAO DO RESULTADO DO EXERCICIO', NULL, 'S', 'D', 1, 'N'),
(228, 227, '5.1.1', 'APURACAO DO RESULTADO DE EXERCICIO', NULL, 'S', 'D', 1, 'N'),
(229, 228, '5.1.1.001', 'Resultado do Exercicio', NULL, 'S', 'D', 1, 'N'),
(230, 229, '5.1.1.001.0001', 'Apuração do Resultado do Exercício', 'are', 'A', 'D', 1, 'N'),
(241, 186, '4.1.1.006.0007', 'Despesa de Organização', '', 'A', 'D', 1, 'N'),
(242, 195, '4.1.2.002.0001', 'Aluguel Passivo', '', 'A', 'D', 1, 'N'),
(243, 158, '3.1.2.002.0001', 'Descontos Obtidos', '', 'A', 'C', 1, 'N'),
(244, 158, '3.1.2.002.0002', 'Juros Ativo', '', 'A', 'C', 1, 'N'),
(245, 120, '2.1.4.001.0001', 'Salários a Pagar', '', 'A', 'C', 1, 'N'),
(246, 194, '4.1.2.001.0001', 'Despesas com Salários', '', 'A', 'D', 1, 'N'),
(247, 125, '2.1.5.001.0005', 'Contas a Pagar', '', 'A', 'C', 1, 'N'),
(248, 7, '1.1.1.002.0001', 'Banco do Brasil', NULL, 'A', 'D', 0, 'N'),
(249, 10, '1.1.2.001.0001', 'Manoel Jailton Sousa', '', 'A', 'D', 0, 'N'),
(250, 63, '2.1.2.001.0002', 'mjailton Cursos', '', 'A', 'C', 0, 'N'),
(251, 10, '1.1.2.001.0002', 'teste', NULL, 'A', 'D', 0, 'N'),
(252, 63, '2.1.2.001.0003', 'teste', NULL, 'A', 'D', 0, 'N'),
(253, 63, '2.1.2.001.0004', 'Caema', NULL, 'A', 'D', 0, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id_contato` int(11) NOT NULL,
  `id_conta_cliente` int(11) DEFAULT NULL,
  `id_conta_fornecedor` int(11) DEFAULT NULL,
  `id_conta_transportador` int(11) DEFAULT NULL,
  `eh_cliente` varchar(1) DEFAULT 'S',
  `eh_fornecedor` varchar(1) DEFAULT NULL,
  `eh_transportador` varchar(1) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(15) DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 'S',
  `fone` varchar(18) DEFAULT NULL,
  `celular` varchar(18) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `cep` varchar(18) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(80) DEFAULT NULL,
  `complemento` varchar(80) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `ie` varchar(20) DEFAULT NULL,
  `im` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `indIEDest` varchar(20) DEFAULT NULL,
  `SUFRAMA` varchar(20) DEFAULT NULL,
  `idEstrangeiro` varchar(20) DEFAULT NULL,
  `ibge` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `id_conta_cliente`, `id_conta_fornecedor`, `id_conta_transportador`, `eh_cliente`, `eh_fornecedor`, `eh_transportador`, `nome`, `nome_fantasia`, `cpf`, `cnpj`, `data_cadastro`, `ativo`, `fone`, `celular`, `email`, `senha`, `cep`, `logradouro`, `numero`, `uf`, `cidade`, `complemento`, `bairro`, `ie`, `im`, `rg`, `indIEDest`, `SUFRAMA`, `idEstrangeiro`, `ibge`) VALUES
(1, NULL, NULL, NULL, 'S', 'S', NULL, 'Manoel Jailton', 'mjailton', '78589452387', NULL, '2020-06-15', 'S', '98999924667', '98999924667', 'mjailton@gmail.com', '123', '65074410', 'Rua José do Patrocínio', '09', 'MA', 'São Luís', '', 'Cohama', '', NULL, '', '2', NULL, NULL, '2111300'),
(2, NULL, NULL, NULL, NULL, 'S', NULL, 'mjailton Distribuidora', 'mjailton distribuidora', '78589452387', NULL, '0000-00-00', 'S', '9898', '98', 'fornecedor2@gmail.com', '123', '65074410', 'Rua hugo', '106', 'MA', 'São Luís', '', 'Cohama', '', NULL, '333', '2', NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, 'S', NULL, 'Intelimax Comércio', 'Intelimáx Comércio', '78589452387', NULL, '0000-00-00', 'S', '545', '545', 'fornecedor03@gmail.com', '123', '65074410', 'rua', '12', 'MA', 'São luís', 'aa', 'Cohama', '', NULL, '2323', '2', NULL, NULL, NULL),
(5, NULL, 253, NULL, NULL, 'S', NULL, 'Caema', 'Caema', NULL, NULL, '2021-01-07', 'S', NULL, '98989898989', 'caema@gmail.com', '123', '65074410', 'Rua José do Patrocínio', '9', 'MA', 'São Luís', '', 'Cohama', '', NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cotacao`
--

CREATE TABLE `cotacao` (
  `id_cotacao` int(11) NOT NULL,
  `id_status_cotacao` int(11) NOT NULL DEFAULT 1,
  `data_abertura` date NOT NULL,
  `data_encerramento` date DEFAULT NULL,
  `id_usuario_cotacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cotacao`
--

INSERT INTO `cotacao` (`id_cotacao`, `id_status_cotacao`, `data_abertura`, `data_encerramento`, `id_usuario_cotacao`) VALUES
(1, 4, '2021-01-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ie` varchar(20) NOT NULL,
  `iest` varchar(30) DEFAULT NULL,
  `im` varchar(20) DEFAULT NULL,
  `fone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_contabilidade` varchar(100) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cnae` varchar(20) DEFAULT NULL,
  `regime_tributario` int(50) DEFAULT NULL,
  `ibge` varchar(40) DEFAULT NULL,
  `ultima_atualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `razao_social`, `nome_fantasia`, `cnpj`, `ie`, `iest`, `im`, `fone`, `email`, `email_contabilidade`, `cep`, `logradouro`, `complemento`, `numero`, `uf`, `cidade`, `bairro`, `cnae`, `regime_tributario`, `ibge`, `ultima_atualizacao`) VALUES
(1, 'Intelimax Comércio Ltda', 'mjailton Cursos', '13083676000138', '202443086', NULL, NULL, '9898988989', 'mjailton@gmail.com', '', '59395000', 'ZONA RURAL', '', '191', 'RN', 'Cerro Corá', 'ZONA RURAL', '', 1, '2402709', '2019-07-01 06:47:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `qtde_entrada` int(11) NOT NULL,
  `valor_entrada` decimal(10,2) NOT NULL,
  `subtotal_entrada` decimal(10,2) DEFAULT NULL,
  `data_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_produto`, `id_localizacao`, `qtde_entrada`, `valor_entrada`, `subtotal_entrada`, `data_entrada`, `hora_entrada`) VALUES
(1, 8, 1, 10, '100.00', '1000.00', '2021-01-06', '05:41:17'),
(2, 8, 2, 10, '100.00', '1000.00', '2021-01-06', '05:41:33'),
(3, 117, 2, 5, '12.70', '63.50', '2021-01-06', '06:15:57'),
(4, 52, 101, 5, '0.50', '2.50', '2021-01-06', '06:16:15'),
(5, 95, 2, 5, '0.60', '3.00', '2021-01-06', '06:16:25'),
(6, 143, 101, 1, '1.00', '1.00', '2021-01-06', '06:16:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(16) NOT NULL,
  `nome_estado` varchar(64) NOT NULL,
  `uf_estado` varchar(2) NOT NULL,
  `codigo_estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome_estado`, `uf_estado`, `codigo_estado`) VALUES
(1, 'Acre', 'AC', '12'),
(2, 'Alagoas', 'AL', '27'),
(3, 'Amapá', 'AP', '16'),
(4, 'Amazonas', 'AM', '13'),
(5, 'Bahia', 'BA', '29'),
(6, 'Ceará', 'CE', '23'),
(7, 'Distrito Federal', 'DF', '53'),
(8, 'Espírito Santo', 'ES', '32'),
(9, 'Goiás', 'GO', '52'),
(10, 'Maranhão', 'MA', '21'),
(11, 'Mato Grosso do Sul', 'MS', '50'),
(12, 'Mato Grosso', 'MT', '51'),
(13, 'Minas Gerais', 'MG', '31'),
(14, 'Paraná', 'PR', '41'),
(15, 'Paraíba', 'PB', '25'),
(16, 'Pará', 'PA', '15'),
(17, 'Pernambuco', 'PE', '26'),
(18, 'Piauí', 'PI', '22'),
(19, 'Rio de Janeiro', 'RJ', '33'),
(20, 'Rio Grande do Norte', 'RN', '24'),
(21, 'Rio Grande do Sul', 'RS', '43'),
(22, 'Rondônia', 'RO', '11'),
(23, 'Roraima', 'RR', '14'),
(24, 'Santa Catarina', 'SC', '42'),
(25, 'Sergipe', 'SE', '28'),
(26, 'São Paulo', 'SP', '35'),
(27, 'Tocantins', 'TO', '17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa_producao`
--

CREATE TABLE `etapa_producao` (
  `id_etapa_producao` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_processo_produtivo` int(11) NOT NULL,
  `ordem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `etapa_producao`
--

INSERT INTO `etapa_producao` (`id_etapa_producao`, `id_produto`, `id_processo_produtivo`, `ordem`) VALUES
(1, 8, 1, 0),
(2, 8, 2, 0),
(3, 8, 3, 0),
(4, 8, 6, 0),
(5, 9, 1, 0),
(6, 9, 2, 0),
(7, 9, 3, 0),
(8, 9, 6, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_despesa`
--

CREATE TABLE `fin_despesa` (
  `id_despesa` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `despesa` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_despesa`
--

INSERT INTO `fin_despesa` (`id_despesa`, `id_conta`, `despesa`) VALUES
(1, 204, 'Água'),
(2, 188, 'Telefone'),
(3, 197, 'IPTU'),
(4, 198, 'IPVA'),
(5, 242, 'Aluguel'),
(6, 184, 'Combustível'),
(7, 205, 'Material de Escritório');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_documento_origem`
--

CREATE TABLE `fin_documento_origem` (
  `id_documento_origem` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `documento_origem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_documento_origem`
--

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_lancamento_despesa`
--

CREATE TABLE `fin_lancamento_despesa` (
  `id_lancamento_despesa` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_despesa` int(11) DEFAULT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_lancamento` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_pagamento` date DEFAULT NULL,
  `pago` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_lancamento_despesa`
--

INSERT INTO `fin_lancamento_despesa` (`id_lancamento_despesa`, `id_fornecedor`, `id_despesa`, `valor`, `data_lancamento`, `data_vencimento`, `data_pagamento`, `pago`) VALUES
(1, 5, 1, '50.00', '2021-01-08', '2021-01-08', NULL, 'S'),
(2, 5, 1, '40.00', '2021-01-08', '2021-02-08', NULL, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_lancamento_pagar`
--

CREATE TABLE `fin_lancamento_pagar` (
  `id_lancamento_pagar` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_documento_origem` int(11) NOT NULL,
  `qtde_parcela` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_a_pagar` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_pago` decimal(10,2) NOT NULL DEFAULT 0.00,
  `data_lancamento` date NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `primeiro_vencimento` date NOT NULL,
  `data_ult_parcela` date NOT NULL,
  `juros` decimal(10,2) NOT NULL DEFAULT 0.00,
  `desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `multa` decimal(10,2) NOT NULL DEFAULT 0.00,
  `acrescimo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_restante` decimal(10,2) NOT NULL DEFAULT 0.00,
  `intervalo_entre_parcela` int(11) NOT NULL,
  `finalizado` varchar(1) NOT NULL DEFAULT 'N',
  `pago` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_lancamento_pagar`
--

INSERT INTO `fin_lancamento_pagar` (`id_lancamento_pagar`, `id_fornecedor`, `id_ordem_compra`, `id_documento_origem`, `qtde_parcela`, `valor_total`, `valor_a_pagar`, `valor_pago`, `data_lancamento`, `numero_documento`, `primeiro_vencimento`, `data_ult_parcela`, `juros`, `desconto`, `multa`, `acrescimo`, `saldo_restante`, `intervalo_entre_parcela`, `finalizado`, `pago`) VALUES
(1, 2, 1, 1, 3, '90.00', '90.00', '0.00', '2021-01-08', '100', '2021-02-08', '2021-05-09', '0.00', '0.00', '0.00', '0.00', '90.00', 30, 'S', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_lancamento_receber`
--

CREATE TABLE `fin_lancamento_receber` (
  `id_lancamento_receber` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_documento_origem` int(11) NOT NULL,
  `qtde_parcela` int(11) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `valor_a_receber` decimal(10,2) NOT NULL,
  `valor_recebido` decimal(10,2) DEFAULT NULL,
  `data_lancamento` date NOT NULL,
  `data_ult_parcela` date DEFAULT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `primeiro_vencimento` date NOT NULL,
  `juros` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `multa` decimal(10,2) NOT NULL,
  `acrescimo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_restante` decimal(10,2) DEFAULT NULL,
  `intervalo_entre_parcela` int(11) NOT NULL,
  `finalizado` varchar(1) NOT NULL DEFAULT 'N',
  `pago` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_lancamento_receber`
--

INSERT INTO `fin_lancamento_receber` (`id_lancamento_receber`, `id_cliente`, `id_pedido`, `id_documento_origem`, `qtde_parcela`, `valor_total`, `valor_a_receber`, `valor_recebido`, `data_lancamento`, `data_ult_parcela`, `numero_documento`, `primeiro_vencimento`, `juros`, `desconto`, `multa`, `acrescimo`, `saldo_restante`, `intervalo_entre_parcela`, `finalizado`, `pago`) VALUES
(1, 1, 3, 1, 1, '100.00', '100.00', NULL, '2021-01-08', '2021-01-08', '120', '2021-01-08', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 'S', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_parcela_pagamento`
--

CREATE TABLE `fin_parcela_pagamento` (
  `id_parcela_pagamento` int(11) NOT NULL,
  `id_parcela_pagar` int(11) NOT NULL,
  `id_forma_pagto` int(11) DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `valor_pago` decimal(10,2) DEFAULT NULL,
  `historico` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_parcela_pagar`
--

CREATE TABLE `fin_parcela_pagar` (
  `id_parcela_pagar` int(11) NOT NULL,
  `id_lancamento_pagar` int(11) NOT NULL,
  `numero_parcela` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_parcela` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_juro` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_multa` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_desconto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_pago` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_devedor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_total_pagar` decimal(10,2) NOT NULL DEFAULT 0.00,
  `quitado` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_parcela_pagar`
--

INSERT INTO `fin_parcela_pagar` (`id_parcela_pagar`, `id_lancamento_pagar`, `numero_parcela`, `data_emissao`, `data_vencimento`, `valor_parcela`, `valor_juro`, `valor_multa`, `valor_desconto`, `valor_pago`, `saldo_devedor`, `valor_total_pagar`, `quitado`) VALUES
(1, 1, 1, '2021-01-08', '2021-02-08', '30.00', '0.00', '0.00', '0.00', '0.00', '30.00', '0.00', 'N'),
(2, 1, 2, '2021-01-08', '2021-03-10', '30.00', '0.00', '0.00', '0.00', '0.00', '30.00', '0.00', 'N'),
(3, 1, 3, '2021-01-08', '2021-04-09', '30.00', '0.00', '0.00', '0.00', '0.00', '30.00', '0.00', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_parcela_receber`
--

CREATE TABLE `fin_parcela_receber` (
  `id_parcela_receber` int(11) NOT NULL,
  `id_lancamento_receber` int(11) NOT NULL,
  `numero_parcela` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor_parcela` decimal(10,2) DEFAULT 0.00,
  `valor_juro` decimal(10,2) DEFAULT 0.00,
  `valor_multa` decimal(10,2) DEFAULT 0.00,
  `valor_desconto` decimal(10,2) DEFAULT 0.00,
  `valor_recebido` decimal(10,2) DEFAULT 0.00,
  `quitado` varchar(1) NOT NULL DEFAULT 'N',
  `emitiu_boleto` varchar(1) DEFAULT NULL,
  `saldo_devedor` decimal(10,2) DEFAULT 0.00,
  `valor_total_receber` decimal(10,2) NOT NULL DEFAULT 0.00,
  `boleto_nosso_numero` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fin_parcela_receber`
--

INSERT INTO `fin_parcela_receber` (`id_parcela_receber`, `id_lancamento_receber`, `numero_parcela`, `data_emissao`, `data_vencimento`, `valor_parcela`, `valor_juro`, `valor_multa`, `valor_desconto`, `valor_recebido`, `quitado`, `emitiu_boleto`, `saldo_devedor`, `valor_total_receber`, `boleto_nosso_numero`) VALUES
(1, 1, 1, '2021-01-08', '2021-01-08', '100.00', '0.00', '0.00', '0.00', '100.00', 'S', NULL, '0.00', '100.00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fin_parcela_recebimento`
--

CREATE TABLE `fin_parcela_recebimento` (
  `id_parcela_recebimento` int(11) NOT NULL,
  `id_parcela_receber` int(11) NOT NULL,
  `id_tipo_recebimento` int(11) NOT NULL,
  `data_recebimento` date DEFAULT NULL,
  `valor_recebido` decimal(10,2) DEFAULT NULL,
  `historico` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagto`
--

CREATE TABLE `forma_pagto` (
  `id_forma_pagto` int(11) NOT NULL,
  `forma_pagto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `forma_pagto`
--

INSERT INTO `forma_pagto` (`id_forma_pagto`, `forma_pagto`) VALUES
(1, 'Em Dinheiro'),
(2, 'Depósito'),
(3, 'Cartão de Crédito'),
(4, 'Cartão de Débito'),
(5, 'Cheque'),
(6, 'Débito Automático'),
(7, 'Transferência'),
(8, 'Boleto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor_cotacao`
--

CREATE TABLE `fornecedor_cotacao` (
  `id_fornecedor_cotacao` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `id_cotacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor_cotacao`
--

INSERT INTO `fornecedor_cotacao` (`id_fornecedor_cotacao`, `id_fornecedor`, `id_cotacao`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 5, 2),
(4, 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `qtde_atendido` int(11) DEFAULT 0,
  `qtde_reservada` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `origem` varchar(20) NOT NULL,
  `atendido` varchar(1) NOT NULL DEFAULT 'N',
  `subtotal` decimal(10,2) NOT NULL,
  `id_localizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `id_pedido`, `id_produto`, `qtde`, `qtde_atendido`, `qtde_reservada`, `valor`, `origem`, `atendido`, `subtotal`, `id_localizacao`) VALUES
(1, 1, 8, 1, 0, 0, '100.00', 'app', 'N', '100.00', NULL),
(2, 2, 8, 1, 0, 0, '100.00', 'desktop', 'N', '100.00', NULL),
(3, 3, 8, 1, 0, 0, '100.00', 'web', 'N', '100.00', 1),
(4, 4, 8, 1, 0, 0, '100.00', 'loja', 'N', '100.00', 1);

--
-- Acionadores `item`
--
DELIMITER $$
CREATE TRIGGER `TRG_SAIDA_PRODUTO` AFTER UPDATE ON `item` FOR EACH ROW IF (new.qtde_atendido <> old.qtde_atendido) THEN
  INSERT INTO historico_movimento

    (id_produto, id_tipo_movimento, entrada_saida, data_movimento, documento, descricao_movimento, qtde_movimento, valor_movimento, subtotal_movimento,trg)

    VALUES
    (new.id_produto, 4, 'S', date(now()), new.id_item, 'Saída ',new.qtde_atendido, new.valor  , new.qtde_atendido *new.valor, 'S');
    
    SELECT sum(qtde_atendido * valor) INTO @total FROM `item` WHERE id_pedido = new.id_pedido;
    
    UPDATE pedido SET total = @total WHERE id_pedido = new.id_pedido;
    
    
    
    END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_carrinho`
--

CREATE TABLE `item_carrinho` (
  `id_item_carrinho` int(11) NOT NULL,
  `id_carrinho` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_cotacao`
--

CREATE TABLE `item_cotacao` (
  `id_item_cotacao` int(11) NOT NULL,
  `id_cotacao` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_solicitacao` int(11) DEFAULT NULL,
  `id_status_item_cotacao` int(11) DEFAULT 1,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `limite_entrega` date DEFAULT NULL,
  `valor_cotacao` decimal(10,2) DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_cotacao`
--

INSERT INTO `item_cotacao` (`id_item_cotacao`, `id_cotacao`, `id_fornecedor`, `id_solicitacao`, `id_status_item_cotacao`, `id_ordem_compra`, `id_produto`, `qtde`, `data_entrega`, `limite_entrega`, `valor_cotacao`, `subtotal`) VALUES
(1, 1, 2, 1, 3, 1, 38, 3, '2021-01-06', NULL, '15.00', '45.00'),
(2, 1, 2, 2, 3, 1, 41, 3, '2021-01-06', NULL, '15.00', '45.00'),
(3, 1, 3, 1, 5, -1, 38, 3, '2021-01-06', NULL, '16.00', '48.00'),
(4, 1, 3, 2, 5, -1, 41, 3, '2021-01-06', NULL, '16.00', '48.00'),
(5, 2, 5, 7, 3, 2, 91, 1, '2021-01-08', NULL, '0.50', '0.50'),
(6, 3, 5, 8, 3, 3, 91, 10, '2021-01-08', NULL, '0.50', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_ordem_compra`
--

CREATE TABLE `item_ordem_compra` (
  `id_item_ordem_compra` int(11) NOT NULL,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_ordem_compra`
--

INSERT INTO `item_ordem_compra` (`id_item_ordem_compra`, `id_ordem_compra`, `id_produto`, `qtde`, `valor`, `subtotal`) VALUES
(1, 1, 38, 3, '15.00', '45.00'),
(2, 1, 41, 3, '15.00', '45.00'),
(3, 2, 91, 100, '0.50', '50.00'),
(4, 3, 91, 10, '0.50', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_ordem_producao`
--

CREATE TABLE `item_ordem_producao` (
  `id_item_ordem_producao` int(11) NOT NULL,
  `id_ordem_producao` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde_a_produzir` int(11) NOT NULL,
  `qtde_pedido` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_ordem_producao`
--

INSERT INTO `item_ordem_producao` (`id_item_ordem_producao`, `id_ordem_producao`, `id_produto`, `qtde_a_produzir`, `qtde_pedido`) VALUES
(1, 1, 8, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_diario`
--

CREATE TABLE `livro_diario` (
  `id_livro_diario` int(11) NOT NULL,
  `id_exercicio` int(11) NOT NULL,
  `id_conta_debito` int(11) NOT NULL,
  `id_conta_credito` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `historico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro_diario`
--

INSERT INTO `livro_diario` (`id_livro_diario`, `id_exercicio`, `id_conta_debito`, `id_conta_credito`, `data`, `valor`, `historico`) VALUES
(1, 0, 5, 138, '2021-01-01', '10000.00', '  Integralização do Capital'),
(25, 0, 5, 153, '2021-01-08', '100.00', 'Venda de Mercadoria em Dinheiro, pedido num: 3'),
(26, 0, 25, 250, '2021-01-08', '90.00', 'Compra de Matéria-Prima a Prazo, Ordem de Compra num: 1'),
(27, 0, 204, 5, '2021-01-08', '50.00', 'Pagamento de Despesa Em dinheiro, Lançamento num: 1'),
(28, 0, 204, 253, '2021-01-08', '40.00', 'Pagamento de Despesa a Prazo, Lançamento num: 2'),
(29, 0, 148, 204, '2021-01-08', '90.00', 'ARE'),
(30, 0, 153, 148, '2021-01-08', '100.00', 'ARE'),
(31, 0, 148, 146, '2021-01-08', '10.00', 'ARE'),
(32, 0, 148, 204, '2021-01-08', '0.00', 'ARE'),
(33, 0, 153, 148, '2021-01-08', '0.00', 'ARE'),
(34, 0, 148, 204, '2021-01-08', '0.00', 'ARE'),
(35, 0, 153, 148, '2021-01-08', '0.00', 'ARE'),
(36, 0, 148, 204, '2021-01-08', '0.00', 'ARE'),
(37, 0, 153, 148, '2021-01-08', '0.00', 'ARE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `id_localizacao` int(11) NOT NULL,
  `localizacao` varchar(40) NOT NULL,
  `galpao` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`id_localizacao`, `localizacao`, `galpao`) VALUES
(1, 'Estante 01', 'N'),
(2, 'Estante 02', 'N'),
(3, 'Estante 03', 'N'),
(4, 'Estante 04', 'N'),
(5, 'Estante 05', 'N'),
(100, 'Galpão de Produção', 'S'),
(101, 'Galpão de Compra', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimento`
--

CREATE TABLE `movimento` (
  `id_movimento` int(11) NOT NULL,
  `id_localizacao` int(11) DEFAULT NULL,
  `id_tipo_movimento` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_entrada_avulsa` int(11) DEFAULT NULL,
  `id_saida_avulsa` int(11) DEFAULT NULL,
  `id_ordem_producao` int(11) DEFAULT NULL,
  `id_transferencia` int(11) DEFAULT NULL,
  `entrada_saida` varchar(1) DEFAULT NULL,
  `data_movimento` date DEFAULT NULL,
  `qtde_movimento` int(11) DEFAULT 0,
  `valor_movimento` decimal(10,2) DEFAULT 0.00,
  `subtotal_movimento` decimal(10,2) DEFAULT 0.00,
  `descricao` varchar(200) DEFAULT NULL,
  `saldoestoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `movimento`
--

INSERT INTO `movimento` (`id_movimento`, `id_localizacao`, `id_tipo_movimento`, `id_produto`, `id_ordem_compra`, `id_pedido`, `id_entrada_avulsa`, `id_saida_avulsa`, `id_ordem_producao`, `id_transferencia`, `entrada_saida`, `data_movimento`, `qtde_movimento`, `valor_movimento`, `subtotal_movimento`, `descricao`, `saldoestoque`) VALUES
(1, 1, 1, 8, NULL, NULL, 1, NULL, NULL, NULL, 'E', '2021-01-06', 10, '100.00', '1000.00', 'Entrada Avulsa ID: 1', 10),
(2, 2, 1, 8, NULL, NULL, 2, NULL, NULL, NULL, 'E', '2021-01-06', 10, '100.00', '1000.00', 'Entrada Avulsa ID: 2', 20),
(3, 2, 5, 8, NULL, NULL, 1, NULL, NULL, NULL, 'S', '2021-01-06', 3, '100.00', '300.00', 'Saída Avulsa: : 1', 17),
(4, 2, 1, 117, NULL, NULL, 3, NULL, NULL, NULL, 'E', '2021-01-06', 5, '12.70', '63.50', 'Entrada Avulsa ID: 3', 5),
(5, 101, 1, 52, NULL, NULL, 4, NULL, NULL, NULL, 'E', '2021-01-06', 5, '0.50', '2.50', 'Entrada Avulsa ID: 4', 5),
(6, 2, 1, 95, NULL, NULL, 5, NULL, NULL, NULL, 'E', '2021-01-06', 5, '0.60', '3.00', 'Entrada Avulsa ID: 5', 5),
(7, 101, 1, 143, NULL, NULL, 6, NULL, NULL, NULL, 'E', '2021-01-06', 1, '1.00', '1.00', 'Entrada Avulsa ID: 6', 1),
(8, 2, 8, 117, NULL, NULL, NULL, NULL, 1, NULL, 'S', '2021-01-06', 1, '12.70', '12.70', 'Saída Para ordem de produção: : 1', 4),
(9, 101, 8, 52, NULL, NULL, NULL, NULL, 1, NULL, 'S', '2021-01-06', 2, '0.50', '1.00', 'Saída Para ordem de produção: : 1', 3),
(10, 2, 8, 95, NULL, NULL, NULL, NULL, 1, NULL, 'S', '2021-01-06', 1, '0.60', '0.60', 'Saída Para ordem de produção: : 1', 4),
(11, 101, 8, 143, NULL, NULL, NULL, NULL, 1, NULL, 'S', '2021-01-06', 1, '1.00', '1.00', 'Saída Para ordem de produção: : 1', 0),
(12, 100, 4, 8, NULL, NULL, NULL, NULL, 1, NULL, 'E', '2021-01-06', 1, '100.00', '100.00', 'Entrada por ordem de produção: : 1', 18),
(17, 1, 7, 8, NULL, 3, NULL, NULL, NULL, NULL, 'S', '2021-01-08', 1, '100.00', '100.00', 'Saída por Venda : 3', 17),
(18, 101, 3, 38, 1, NULL, NULL, NULL, NULL, NULL, 'E', '2021-01-08', 3, '15.00', '45.00', 'Entrada por ordem de compra : 1', 3),
(19, 101, 3, 41, 1, NULL, NULL, NULL, NULL, NULL, 'E', '2021-01-08', 3, '15.00', '45.00', 'Entrada por ordem de compra : 1', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nfe`
--

CREATE TABLE `nfe` (
  `id_nfe` int(10) UNSIGNED NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `chave` varchar(60) DEFAULT NULL,
  `recibo` varchar(40) DEFAULT NULL,
  `protocolo` varchar(40) DEFAULT NULL,
  `id_status` int(11) NOT NULL,
  `cUF` int(10) UNSIGNED DEFAULT NULL,
  `cNF` varchar(8) DEFAULT NULL,
  `natOp` varchar(80) DEFAULT NULL,
  `indPag` int(10) UNSIGNED DEFAULT NULL,
  `modelo` char(2) DEFAULT NULL,
  `serie` char(3) DEFAULT NULL,
  `nNF` varchar(15) DEFAULT NULL,
  `dhEmi` varchar(40) DEFAULT NULL,
  `dhSaiEnt` varchar(40) DEFAULT NULL,
  `tpNF` int(10) UNSIGNED DEFAULT NULL,
  `idDest` int(10) UNSIGNED DEFAULT NULL,
  `cMunFG` int(10) DEFAULT NULL,
  `tpImp` int(10) UNSIGNED DEFAULT NULL,
  `tpEmis` int(10) UNSIGNED DEFAULT NULL,
  `cDV` varchar(44) DEFAULT NULL,
  `tpAmb` int(10) UNSIGNED DEFAULT NULL,
  `finNFe` int(10) UNSIGNED DEFAULT NULL,
  `indFinal` int(10) UNSIGNED DEFAULT NULL,
  `indPres` int(10) UNSIGNED DEFAULT NULL,
  `procEmi` int(10) UNSIGNED DEFAULT NULL,
  `verProc` varchar(20) DEFAULT NULL,
  `dhCont` date DEFAULT NULL,
  `xJust` varchar(255) DEFAULT NULL,
  `vBC` decimal(10,4) DEFAULT NULL,
  `vICMS` decimal(10,4) DEFAULT NULL,
  `vICMSDeson` decimal(10,4) DEFAULT NULL,
  `vFCP` decimal(10,4) DEFAULT NULL,
  `vBCST` decimal(10,4) DEFAULT NULL,
  `vST` decimal(10,4) DEFAULT NULL,
  `vFCPST` decimal(10,4) DEFAULT NULL,
  `vFCPSTRet` decimal(10,4) DEFAULT NULL,
  `vProd` decimal(10,2) DEFAULT NULL,
  `vFrete` decimal(10,2) DEFAULT NULL,
  `vSeg` decimal(10,2) DEFAULT NULL,
  `vDesc` decimal(10,2) DEFAULT NULL,
  `vII` decimal(10,4) DEFAULT NULL,
  `vIPI` decimal(10,4) DEFAULT NULL,
  `vIPIDevol` decimal(10,4) DEFAULT NULL,
  `vPIS` decimal(10,4) DEFAULT NULL,
  `vCOFINS` decimal(10,4) DEFAULT NULL,
  `vOutro` decimal(10,2) DEFAULT NULL,
  `vNF` decimal(10,4) DEFAULT NULL,
  `vTotTrib` decimal(10,4) DEFAULT NULL,
  `vOrig` decimal(10,2) DEFAULT NULL,
  `vLiq` decimal(10,2) DEFAULT NULL,
  `status_nota` int(10) UNSIGNED DEFAULT NULL,
  `finalizado` varchar(1) NOT NULL DEFAULT 'N',
  `atualizacao_emitente` datetime NOT NULL DEFAULT '2017-02-20 09:11:21'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nfe`
--

INSERT INTO `nfe` (`id_nfe`, `id_pedido`, `chave`, `recibo`, `protocolo`, `id_status`, `cUF`, `cNF`, `natOp`, `indPag`, `modelo`, `serie`, `nNF`, `dhEmi`, `dhSaiEnt`, `tpNF`, `idDest`, `cMunFG`, `tpImp`, `tpEmis`, `cDV`, `tpAmb`, `finNFe`, `indFinal`, `indPres`, `procEmi`, `verProc`, `dhCont`, `xJust`, `vBC`, `vICMS`, `vICMSDeson`, `vFCP`, `vBCST`, `vST`, `vFCPST`, `vFCPSTRet`, `vProd`, `vFrete`, `vSeg`, `vDesc`, `vII`, `vIPI`, `vIPIDevol`, `vPIS`, `vCOFINS`, `vOutro`, `vNF`, `vTotTrib`, `vOrig`, `vLiq`, `status_nota`, `finalizado`, `atualizacao_emitente`) VALUES
(1, 3, '24210113083676000138550010000001511007078869', '243002193941103', '324210000000282', 7, 24, '707886', 'VENDA', 0, '55', '1', '151', '2021-01-08T15:48:11-03:00', '2021-01-08T15:48:11-03:00', 1, 1, 2402709, 1, 1, '2', 2, 1, 1, 2, 0, '3.10.31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '100.0000', '100.0000', '100.00', '100.00', NULL, 'N', '2017-02-20 09:11:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nfe_destinatario`
--

CREATE TABLE `nfe_destinatario` (
  `id_destinatario` int(11) NOT NULL,
  `id_nfe` int(10) UNSIGNED NOT NULL,
  `dest_xNome` varchar(60) DEFAULT NULL,
  `dest_IE` varchar(14) DEFAULT NULL,
  `dest_indIEDest` varchar(20) DEFAULT NULL,
  `dest_ISUF` varchar(20) DEFAULT NULL,
  `dest_IM` varchar(15) DEFAULT NULL,
  `dest_email` varchar(60) DEFAULT NULL,
  `dest_CNPJ` varchar(14) DEFAULT NULL,
  `dest_CPF` varchar(15) DEFAULT NULL,
  `dest_idEstrangeiro` varchar(20) DEFAULT NULL,
  `dest_xLgr` varchar(60) DEFAULT NULL,
  `dest_nro` varchar(60) DEFAULT NULL,
  `dest_xCpl` varchar(60) DEFAULT NULL,
  `dest_xBairro` varchar(60) DEFAULT NULL,
  `dest_cMun` int(10) UNSIGNED DEFAULT NULL,
  `dest_xMun` varchar(60) DEFAULT NULL,
  `dest_UF` char(2) DEFAULT NULL,
  `dest_CEP` varchar(8) DEFAULT NULL,
  `dest_cPais` int(11) DEFAULT NULL,
  `dest_xPais` varchar(60) DEFAULT NULL,
  `dest_fone` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nfe_destinatario`
--

INSERT INTO `nfe_destinatario` (`id_destinatario`, `id_nfe`, `dest_xNome`, `dest_IE`, `dest_indIEDest`, `dest_ISUF`, `dest_IM`, `dest_email`, `dest_CNPJ`, `dest_CPF`, `dest_idEstrangeiro`, `dest_xLgr`, `dest_nro`, `dest_xCpl`, `dest_xBairro`, `dest_cMun`, `dest_xMun`, `dest_UF`, `dest_CEP`, `dest_cPais`, `dest_xPais`, `dest_fone`) VALUES
(1, 1, 'Manoel Jailton', '', '2', NULL, NULL, 'mjailton@gmail.com', NULL, '78589452387', NULL, 'Rua Jose do Patrocinio', '09', '', 'Cohama', 2111300, 'Sao Luis', 'MA', '65074410', 1058, 'Brasil', '98999924667');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nfe_emitente`
--

CREATE TABLE `nfe_emitente` (
  `id_nfe` int(10) UNSIGNED NOT NULL,
  `em_xNome` varchar(60) DEFAULT NULL,
  `em_xFant` varchar(60) DEFAULT NULL,
  `em_IE` varchar(14) DEFAULT NULL,
  `em_IEST` varchar(14) DEFAULT NULL,
  `em_IM` varchar(15) DEFAULT NULL,
  `em_CNAE` varchar(7) DEFAULT NULL,
  `em_CRT` char(1) DEFAULT NULL,
  `em_CNPJ` varchar(18) DEFAULT NULL,
  `em_CPF` varchar(30) DEFAULT NULL,
  `em_xLgr` varchar(60) DEFAULT NULL,
  `em_nro` varchar(60) DEFAULT NULL,
  `em_xCpl` varchar(60) DEFAULT NULL,
  `em_xBairro` varchar(60) DEFAULT NULL,
  `em_cMun` int(10) UNSIGNED DEFAULT NULL,
  `em_xMun` varchar(60) DEFAULT NULL,
  `em_UF` char(2) DEFAULT NULL,
  `em_CEP` varchar(8) DEFAULT NULL,
  `em_cPais` int(11) DEFAULT NULL,
  `em_xPais` varchar(60) DEFAULT NULL,
  `em_fone` varchar(14) DEFAULT NULL,
  `em_EMAIL` varchar(60) DEFAULT NULL,
  `em_SUFRAMA` int(10) UNSIGNED DEFAULT NULL,
  `atualizacao` datetime DEFAULT '2017-02-20 09:11:21'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nfe_emitente`
--

INSERT INTO `nfe_emitente` (`id_nfe`, `em_xNome`, `em_xFant`, `em_IE`, `em_IEST`, `em_IM`, `em_CNAE`, `em_CRT`, `em_CNPJ`, `em_CPF`, `em_xLgr`, `em_nro`, `em_xCpl`, `em_xBairro`, `em_cMun`, `em_xMun`, `em_UF`, `em_CEP`, `em_cPais`, `em_xPais`, `em_fone`, `em_EMAIL`, `em_SUFRAMA`, `atualizacao`) VALUES
(1, 'Intelimax Comercio Ltda', 'mjailton Cursos', '202443086', NULL, NULL, '', '1', '13083676000138', NULL, 'Z0NA RURAL', '191', '', 'Z0NA RURAL', 2402709, 'Cerro Cora', 'RN', '59395000', 1058, 'Brasil', '9898988989', NULL, NULL, '2017-02-20 09:11:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nfe_item`
--

CREATE TABLE `nfe_item` (
  `id_item` int(10) UNSIGNED NOT NULL,
  `id_nfe` int(10) UNSIGNED DEFAULT NULL,
  `numero_item` int(10) UNSIGNED DEFAULT NULL,
  `cProd` varchar(60) DEFAULT NULL,
  `cEAN` varchar(14) DEFAULT NULL,
  `xProd` varchar(120) DEFAULT NULL,
  `NCM` varchar(8) DEFAULT NULL,
  `cBenef` varchar(20) DEFAULT NULL,
  `NVE` varchar(6) DEFAULT NULL,
  `EXTIPI` varchar(15) DEFAULT NULL,
  `CFOP` int(10) UNSIGNED DEFAULT NULL,
  `uCom` varchar(6) DEFAULT NULL,
  `qCom` decimal(10,2) DEFAULT NULL,
  `vUnCom` decimal(10,2) DEFAULT NULL,
  `vProd` decimal(10,2) DEFAULT NULL,
  `cEANTrib` varchar(14) DEFAULT NULL,
  `uTrib` varchar(6) DEFAULT NULL,
  `qTrib` decimal(10,2) DEFAULT NULL,
  `vUnTrib` decimal(10,2) DEFAULT NULL,
  `vFrete` decimal(10,2) DEFAULT NULL,
  `vSeg` decimal(10,2) DEFAULT NULL,
  `vDesc` decimal(10,2) DEFAULT NULL,
  `vOutro` decimal(10,2) DEFAULT NULL,
  `indTot` int(10) UNSIGNED DEFAULT NULL,
  `xPed` varchar(15) DEFAULT NULL,
  `nItemPed` int(10) UNSIGNED DEFAULT NULL,
  `nFCI` varchar(36) DEFAULT NULL,
  `tipo_calc_ipi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nfe_item`
--

INSERT INTO `nfe_item` (`id_item`, `id_nfe`, `numero_item`, `cProd`, `cEAN`, `xProd`, `NCM`, `cBenef`, `NVE`, `EXTIPI`, `CFOP`, `uCom`, `qCom`, `vUnCom`, `vProd`, `cEANTrib`, `uTrib`, `qTrib`, `vUnTrib`, `vFrete`, `vSeg`, `vDesc`, `vOutro`, `indTot`, `xPed`, `nItemPed`, `nFCI`, `tipo_calc_ipi`) VALUES
(1, 1, 1, '8', 'SEM GTIN', 'Panela 5', '85167910', NULL, NULL, NULL, 5102, 'UND', '1.00', '100.00', '100.00', 'SEM GTIN', 'UND', '1.00', '100.00', NULL, NULL, NULL, NULL, 1, '1', 3, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nfe_produto`
--

CREATE TABLE `nfe_produto` (
  `id_produto` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `cfop` int(11) DEFAULT NULL,
  `imagem` varchar(80) NOT NULL,
  `gtin` varchar(20) DEFAULT NULL,
  `ncm` varchar(20) DEFAULT NULL,
  `cbenef` varchar(20) DEFAULT NULL,
  `extipi` varchar(10) DEFAULT NULL,
  `mva` decimal(10,2) DEFAULT NULL,
  `nfci` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nfe_produto`
--

INSERT INTO `nfe_produto` (`id_produto`, `id_unidade`, `produto`, `preco`, `cfop`, `imagem`, `gtin`, `ncm`, `cbenef`, `extipi`, `mva`, `nfci`) VALUES
(8, 1, 'Panela 5', '100.00', 5102, 'PANELA_5.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(9, 1, 'Panela de Pressão', '100.00', 5102, 'PANELA_DE_PRESAO.png', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(10, 1, 'Frigideira Reforçada', '497.00', 5102, 'FRIGIDEIRA_REFORCADA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(11, 1, 'Frigideira Cabo Tubular', '100.00', 5102, 'FRIGIDEIRA_CABO_TUBULAR_2.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(12, 1, 'Panela Longa', '100.00', 5102, 'PANELA_LONGA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(13, 1, 'Panela Arredondada', '100.00', 5102, 'PANELA_RREDONDADA2.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(14, 1, 'Panela Laranja', '50.00', 5102, 'PANELA_LARANJA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(15, 1, 'Panela Longa 2', '100.00', 5102, 'PANELA_LONGA2.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(16, 1, 'Panela Achatada', '100.00', 5102, 'PANELA_ACHATADA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(17, 1, 'Panela Achatada 2', '100.00', 5102, 'PANELA_ACHATADA2.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(18, 1, 'Panela Verde', '100.00', 5102, 'PANELA_VERDE.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(19, 1, 'Panela Verde 2', '100.00', 5102, 'PANELA_VERDE2.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(20, 1, 'Frigideira sem Tampa Laranja', '100.00', 5102, 'FRIGIDEIRA_SEM_TAMPA_LARANJA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(21, 1, 'Frigideira Laranja', '100.00', 5102, 'FRIGIDEIRA_LARANJA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(22, 1, 'Cuscuzeira Laranja', '100.00', 5102, 'CUSCUZEIRA_LARANJA.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(31, 1, 'Cuscuzeira 3', '150.00', 5102, 'CUSCUZEIRA3.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(32, 1, 'Leiteira Tubular 3', '50.00', 5102, 'LEITEIRAS_TUBULAR3.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(33, 1, 'Leiteira com Tampa Laranja', '30.00', 5102, 'LEITEIRA_COM_TAMPA_LARANJA4.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(35, 1, 'Panela com tampa 2', '100.00', 5102, 'PANELA_COM_TAMPA_2.jpg', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(38, 1, 'ABRASIVO CEBO AMARELO', '15.70', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(41, 1, 'ALCA PARA TAMPA', '15.90', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(52, 1, 'ALÇA DE LEITEIRA', '0.50', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(57, 1, 'ALÇA PARA PANELA DE PRESSAO', '0.40', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(60, 1, 'BORRACHAS P/ PANELA PRESSAO', '0.50', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(61, 1, 'CABO CUSCUZEIRA ', '0.65', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(62, 1, 'CABO DE CAÇAROLA COD.227', '0.90', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(63, 1, 'CABO DE FRIGIDEIRA PEQ REF. 417 MCA', '5.90', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(64, 1, 'CABO DE LEITEIRA COD.2046', '1.30', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(85, 1, 'CABO PARA PANELA DE PRESSAO', '1.20', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(86, 1, 'CABO REBITADO PEQUENO 3F 90G', '0.95', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(87, 1, 'HASTE GRANDE  20 X 130', '15.90', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(91, 1, 'LIXA', '0.50', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(92, 1, 'ORELHA DE CALDEIRAO', '31.80', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(93, 1, 'PESO TIPO UNIV.PRETO S/MARCA LEVE', '1.30', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(94, 1, 'PINO 1/2 SEXT DIAM 01 R 3/8 UNF', '1.30', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(95, 1, 'POMEL COLOR', '0.60', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(103, 1, 'RALO 110', '13.70', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(107, 1, 'RIBITE 1/8  X 7   PEQUENO', '31.80', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(113, 1, 'RODA DE BRIM', '0.30', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(114, 1, 'SELO DE SEGURANÇA', '0.00', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(115, 1, 'SUPORTE ALUM. BALDE Nº02', '31.80', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(117, 1, 'DISC0 210 X 1,10', '12.70', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(142, 1, 'TAMPA LUXO 14', '1.00', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(143, 1, 'DISC0 PARA TAMPA', '1.00', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(144, 1, 'TAMPA PARA PANELA DE PRESSÃO', '1.00', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL),
(145, 1, 'VÁLVULA SEGURANÇA PANELA PRESSÃO', '1.00', 5102, '', 'SEM GTIN', '85167910', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nfe_status`
--

CREATE TABLE `nfe_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nfe_status`
--

INSERT INTO `nfe_status` (`id_status`, `status`) VALUES
(1, 'Em Digitação'),
(2, 'Pronta pra gerar XML'),
(3, 'Xml Gerado'),
(4, 'Assinada'),
(5, 'Enviada'),
(6, 'Em Processamento na SEFAZ'),
(7, 'Autorizada'),
(8, 'Cancelada'),
(9, 'Denegada'),
(10, 'Rejeitada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_compra`
--

CREATE TABLE `ordem_compra` (
  `id_ordem_compra` int(11) NOT NULL,
  `id_status_ordem_compra` int(11) DEFAULT 1,
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_cotacao` int(11) DEFAULT NULL,
  `data_emissao` date DEFAULT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `data_finalizacao` date DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT 0.00,
  `avulsa` varchar(1) NOT NULL DEFAULT 'N',
  `finalizada` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordem_compra`
--

INSERT INTO `ordem_compra` (`id_ordem_compra`, `id_status_ordem_compra`, `id_fornecedor`, `id_cotacao`, `data_emissao`, `data_aprovacao`, `data_finalizacao`, `valor_total`, `avulsa`, `finalizada`) VALUES
(1, 5, 2, 1, '2021-01-06', '2021-01-08', '2021-01-08', '90.00', 'N', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_producao`
--

CREATE TABLE `ordem_producao` (
  `id_ordem_producao` int(11) NOT NULL,
  `data_cadastro` date DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_status_ordem_producao` int(11) DEFAULT 1,
  `data_inicio_producao` date DEFAULT NULL,
  `data_finalizacao` date DEFAULT NULL,
  `avulsa` varchar(1) DEFAULT 'N',
  `finalizado` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordem_producao`
--

INSERT INTO `ordem_producao` (`id_ordem_producao`, `data_cadastro`, `id_pedido`, `id_status_ordem_producao`, `data_inicio_producao`, `data_finalizacao`, `avulsa`, `finalizado`) VALUES
(1, '2021-01-06', NULL, 6, NULL, NULL, 'S', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_contato` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `hora_pedido` time NOT NULL,
  `baixado` varchar(1) NOT NULL DEFAULT 'N',
  `finalizado` varchar(1) NOT NULL DEFAULT 'N',
  `total` decimal(10,2) NOT NULL,
  `origem` varchar(30) NOT NULL,
  `data_finalizacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_contato`, `id_status`, `data_pedido`, `hora_pedido`, `baixado`, `finalizado`, `total`, `origem`, `data_finalizacao`) VALUES
(1, 1, 2, '2021-01-06', '12:14:42', 'N', 'S', '100.00', 'app', NULL),
(2, 1, 2, '2021-01-06', '12:17:15', 'N', 'S', '100.00', 'desktop', NULL),
(3, 1, 5, '2021-01-06', '08:17:56', 'S', 'S', '100.00', 'web', '2021-01-08'),
(4, 1, 2, '2021-01-06', '08:18:31', 'N', 'S', '100.00', 'loja', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` bigint(20) UNSIGNED NOT NULL,
  `perfil` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`, `descricao`) VALUES
(1, 'Admin', 'Acesso Irrestrito'),
(2, 'Estoque', 'Permissão para operações com Estoque'),
(3, 'Financeiro', 'Permite validar bilhetes'),
(4, 'Contabil', 'Permite vender bilhetes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_permissao`
--

CREATE TABLE `perfil_permissao` (
  `id_perfil_permissao` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil_permissao`
--

INSERT INTO `perfil_permissao` (`id_perfil_permissao`, `id_perfil`, `id_permissao`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE `perfil_usuario` (
  `id_perfil_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`id_perfil_usuario`, `id_perfil`, `id_usuario`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id_permissao` int(11) NOT NULL,
  `permissao` varchar(50) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id_permissao`, `permissao`, `descricao`) VALUES
(1, 'Tela-Master', ''),
(3, 'tela-cadastro', 'faz o cadastro de cliente'),
(4, 'Entrada-view', 'Permite visualizar as entradas'),
(5, 'Entrada-Insert', 'Permite inserir entrada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_produtivo`
--

CREATE TABLE `processo_produtivo` (
  `id_processo_produtivo` int(11) NOT NULL,
  `processo_produtivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processo_produtivo`
--

INSERT INTO `processo_produtivo` (`id_processo_produtivo`, `processo_produtivo`) VALUES
(1, 'Conformação'),
(2, 'Polimento'),
(3, 'Montagem'),
(6, 'Pintura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `eh_produto` varchar(1) DEFAULT NULL,
  `eh_insumo` varchar(1) DEFAULT NULL,
  `eh_promocao` varchar(1) NOT NULL DEFAULT 'N',
  `eh_maisvendido` varchar(1) NOT NULL DEFAULT 'N',
  `eh_lancamento` varchar(1) NOT NULL DEFAULT 'N',
  `codigo_barra` varchar(20) NOT NULL,
  `preco_alto` decimal(10,2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(80) NOT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 'S',
  `estoque_inicial` int(11) DEFAULT 0,
  `estoque_minimo` int(11) DEFAULT 0,
  `estoque_maximo` int(11) DEFAULT 0,
  `estoque_atual` int(11) DEFAULT 0,
  `estoque_reservado` int(11) NOT NULL DEFAULT 0,
  `estoque_real` int(11) NOT NULL DEFAULT 0,
  `custo_atual` decimal(10,2) DEFAULT 0.00,
  `custo_medio` decimal(10,2) DEFAULT 0.00,
  `custo_producao` decimal(10,2) DEFAULT 0.00,
  `estoque_financeiro` decimal(10,2) DEFAULT 0.00,
  `gtin` varchar(20) DEFAULT NULL,
  `ncm` varchar(20) DEFAULT NULL,
  `cbenef` varchar(20) DEFAULT NULL,
  `extipi` varchar(10) DEFAULT NULL,
  `cfop` int(11) DEFAULT NULL,
  `mva` decimal(10,2) DEFAULT NULL,
  `nfci` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria`, `id_unidade`, `produto`, `eh_produto`, `eh_insumo`, `eh_promocao`, `eh_maisvendido`, `eh_lancamento`, `codigo_barra`, `preco_alto`, `preco`, `descricao`, `imagem`, `ativo`, `estoque_inicial`, `estoque_minimo`, `estoque_maximo`, `estoque_atual`, `estoque_reservado`, `estoque_real`, `custo_atual`, `custo_medio`, `custo_producao`, `estoque_financeiro`, `gtin`, `ncm`, `cbenef`, `extipi`, `cfop`, `mva`, `nfci`) VALUES
(8, 1, 1, 'Panela 5', 'S', 'N', 'S', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_5.jpg', 'S', 0, 0, 0, 17, 0, 17, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(9, 1, 1, 'Panela de Pressão', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_DE_PRESAO.png', 'S', 0, 0, 0, 9, 0, 9, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(10, 7, 1, 'Frigideira Reforçada', 'S', 'N', 'S', 'N', 'N', '', '150.00', '497.00', NULL, 'FRIGIDEIRA_REFORCADA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(11, 7, 1, 'Frigideira Cabo Tubular', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'FRIGIDEIRA_CABO_TUBULAR_2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(12, 1, 1, 'Panela Longa', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_LONGA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(13, 1, 1, 'Panela Arredondada', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_RREDONDADA2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(14, 1, 1, 'Panela Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '50.00', NULL, 'PANELA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(15, 1, 1, 'Panela Longa 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_LONGA2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(16, 1, 1, 'Panela Achatada', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_ACHATADA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(17, 1, 1, 'Panela Achatada 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_ACHATADA2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(18, 1, 1, 'Panela Verde', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_VERDE.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(19, 1, 1, 'Panela Verde 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_VERDE2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(20, 7, 1, 'Frigideira sem Tampa Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'FRIGIDEIRA_SEM_TAMPA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(21, 7, 1, 'Frigideira Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'FRIGIDEIRA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(22, 2, 1, 'Cuscuzeira Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'CUSCUZEIRA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(31, 2, 1, 'Cuscuzeira 3', 'S', 'N', 'N', 'N', 'N', '', '150.00', '150.00', NULL, 'CUSCUZEIRA3.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(32, 6, 1, 'Leiteira Tubular 3', 'S', 'N', 'N', 'N', 'N', '', '150.00', '50.00', NULL, 'LEITEIRAS_TUBULAR3.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(33, 6, 1, 'Leiteira com Tampa Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '30.00', NULL, 'LEITEIRA_COM_TAMPA_LARANJA4.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(35, 1, 1, 'Panela com tampa 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_COM_TAMPA_2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(38, 11, 1, 'ABRASIVO CEBO AMARELO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '15.70', NULL, '', 'S', 0, 0, 0, 3, 0, 3, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(41, 11, 1, 'ALCA PARA TAMPA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '15.90', NULL, '', 'S', 0, 0, 0, 3, 0, 3, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(52, 11, 1, 'ALÇA DE LEITEIRA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.50', NULL, '', 'S', 0, 0, 0, 3, 0, 3, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(57, 11, 1, 'ALÇA PARA PANELA DE PRESSAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.40', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(60, 11, 1, 'BORRACHAS P/ PANELA PRESSAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.50', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(61, 11, 1, 'CABO CUSCUZEIRA ', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.65', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(62, 11, 1, 'CABO DE CAÇAROLA COD.227', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.90', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(63, 11, 1, 'CABO DE FRIGIDEIRA PEQ REF. 417 MCA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '5.90', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(64, 11, 1, 'CABO DE LEITEIRA COD.2046', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(85, 11, 1, 'CABO PARA PANELA DE PRESSAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.20', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(86, 11, 1, 'CABO REBITADO PEQUENO 3F 90G', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.95', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(87, 11, 1, 'HASTE GRANDE  20 X 130', NULL, 'S', 'N', 'N', 'N', '', '0.00', '15.90', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(91, 11, 1, 'LIXA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.50', NULL, '', 'S', 0, 0, 0, 110, 0, 110, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(92, 11, 1, 'ORELHA DE CALDEIRAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '31.80', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(93, 11, 1, 'PESO TIPO UNIV.PRETO S/MARCA LEVE', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(94, 11, 1, 'PINO 1/2 SEXT DIAM 01 R 3/8 UNF', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(95, 11, 1, 'POMEL COLOR', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.60', NULL, '', 'S', 0, 0, 0, 4, 0, 4, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(103, 11, 1, 'RALO 110', NULL, 'S', 'N', 'N', 'N', '', '0.00', '13.70', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(107, 11, 1, 'RIBITE 1/8  X 7   PEQUENO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '31.80', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(113, 11, 1, 'RODA DE BRIM', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(114, 11, 1, 'SELO DE SEGURANÇA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(115, 11, 1, 'SUPORTE ALUM. BALDE Nº02', NULL, 'S', 'N', 'N', 'N', '', '0.00', '31.80', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(117, 11, 1, 'DISC0 210 X 1,10', NULL, 'S', 'N', 'N', 'N', '', '0.00', '12.70', NULL, '', 'S', 0, 0, 0, 4, 0, 4, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(142, 11, 1, 'TAMPA LUXO 14', 'S', 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(143, 11, 1, 'DISC0 PARA TAMPA', NULL, 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(144, 11, 1, 'TAMPA PARA PANELA DE PRESSÃO', 'S', 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(145, 11, 1, 'VÁLVULA SEGURANÇA PANELA PRESSÃO', NULL, 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_composicao`
--

CREATE TABLE `produto_composicao` (
  `id_produto_composicao` int(11) NOT NULL,
  `id_produto_pai` int(11) NOT NULL,
  `id_etapa` int(11) NOT NULL,
  `id_insumo` int(11) NOT NULL,
  `qtde_necessaria` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto_composicao`
--

INSERT INTO `produto_composicao` (`id_produto_composicao`, `id_produto_pai`, `id_etapa`, `id_insumo`, `qtde_necessaria`) VALUES
(1, 8, 1, 117, 1),
(2, 8, 3, 52, 2),
(3, 8, 3, 95, 1),
(4, 8, 3, 143, 1),
(5, 9, 5, 117, 1),
(6, 9, 6, 91, 1),
(7, 9, 7, 57, 1),
(8, 9, 7, 60, 1),
(9, 9, 7, 85, 1),
(10, 9, 7, 144, 1),
(11, 9, 7, 145, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_localizacao`
--

CREATE TABLE `produto_localizacao` (
  `id_produto_localizacao` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `estoque` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto_localizacao`
--

INSERT INTO `produto_localizacao` (`id_produto_localizacao`, `id_produto`, `id_localizacao`, `estoque`) VALUES
(1, 8, 1, 9),
(4, 8, 2, 7),
(5, 9, 3, 9),
(6, 10, 4, 0),
(7, 11, 3, 0),
(8, 18, 5, 0),
(9, 13, 2, 0),
(10, 14, 4, 0),
(11, 14, 5, 0),
(12, 9, 4, 0),
(13, 85, 1, 0),
(14, 95, 2, 4),
(15, 95, 3, 0),
(16, 95, 5, 0),
(17, 38, 1, 0),
(18, 41, 2, 0),
(19, 61, 3, 0),
(20, 87, 4, 0),
(21, 117, 2, 4),
(22, 8, 100, 1),
(23, 9, 100, 0),
(24, 10, 100, 0),
(25, 11, 100, 0),
(26, 12, 100, 0),
(27, 13, 100, 0),
(28, 14, 100, 0),
(29, 15, 100, 0),
(30, 16, 100, 0),
(31, 17, 100, 0),
(32, 18, 100, 0),
(33, 19, 100, 0),
(34, 20, 100, 0),
(35, 21, 100, 0),
(36, 22, 100, 0),
(37, 31, 100, 0),
(38, 32, 100, 0),
(39, 33, 100, 0),
(40, 35, 100, 0),
(41, 142, 100, 0),
(42, 144, 100, 0),
(43, 38, 101, 3),
(44, 41, 101, 3),
(45, 52, 101, 3),
(46, 57, 101, 0),
(47, 60, 101, 0),
(48, 61, 101, 0),
(49, 62, 101, 0),
(50, 63, 101, 0),
(51, 64, 101, 0),
(52, 85, 101, 0),
(53, 86, 101, 0),
(54, 87, 101, 0),
(55, 91, 101, 110),
(56, 92, 101, 0),
(57, 93, 101, 0),
(58, 94, 101, 0),
(59, 95, 101, 0),
(60, 103, 101, 0),
(61, 107, 101, 0),
(62, 113, 101, 0),
(63, 114, 101, 0),
(64, 115, 101, 0),
(65, 117, 101, 0),
(66, 142, 101, 0),
(67, 143, 101, 0),
(68, 144, 101, 0),
(69, 145, 101, 0),
(70, 57, 2, 0),
(71, 60, 4, 0),
(72, 91, 4, 0),
(73, 144, 2, 0),
(74, 145, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_ordem_producao` int(11) DEFAULT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `qtde_reservada` int(11) DEFAULT NULL,
  `id_localizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `id_saida` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `qtde_saida` int(11) NOT NULL,
  `valor_saida` decimal(10,0) NOT NULL,
  `subtotal_saida` decimal(10,2) DEFAULT NULL,
  `data_saida` date NOT NULL,
  `hora_saida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saida`
--

INSERT INTO `saida` (`id_saida`, `id_produto`, `id_localizacao`, `qtde_saida`, `valor_saida`, `subtotal_saida`, `data_saida`, `hora_saida`) VALUES
(1, 8, 2, 3, '100', '300.00', '2021-01-06', '05:44:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id_solicitacao` int(11) NOT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `id_status_solicitacao` int(11) DEFAULT NULL,
  `id_ordem_compra` int(11) DEFAULT NULL,
  `id_ordem_producao` int(11) DEFAULT NULL,
  `id_fornecedor` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `data_solicitacao` date DEFAULT NULL,
  `hora_solicitacao` time DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `id_usuario_solicitou` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id_solicitacao`, `id_produto`, `id_status_solicitacao`, `id_ordem_compra`, `id_ordem_producao`, `id_fornecedor`, `qtde`, `data_solicitacao`, `hora_solicitacao`, `data_entrega`, `id_usuario_solicitou`) VALUES
(1, 38, 3, 1, NULL, 2, 3, '2021-01-06', '05:53:45', NULL, NULL),
(2, 41, 3, 1, NULL, 2, 3, '2021-01-06', '05:53:55', NULL, NULL),
(3, 117, 1, NULL, 1, NULL, 1, '2021-01-06', '06:15:10', NULL, NULL),
(4, 52, 1, NULL, 1, NULL, 2, '2021-01-06', '06:15:10', NULL, NULL),
(5, 95, 1, NULL, 1, NULL, 1, '2021-01-06', '06:15:10', NULL, NULL),
(6, 143, 1, NULL, 1, NULL, 1, '2021-01-06', '06:15:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_cotacao`
--

CREATE TABLE `solicitacao_cotacao` (
  `id_solicitacao_cotacao` int(11) NOT NULL,
  `id_solicitacao` int(11) NOT NULL,
  `id_cotacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacao_cotacao`
--

INSERT INTO `solicitacao_cotacao` (`id_solicitacao_cotacao`, `id_solicitacao`, `id_cotacao`) VALUES
(2, 2, 1),
(3, 1, 1),
(4, 7, 2),
(5, 8, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_cotacao`
--

CREATE TABLE `status_cotacao` (
  `id_status_cotacao` int(11) NOT NULL,
  `status_cotacao` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_cotacao`
--

INSERT INTO `status_cotacao` (`id_status_cotacao`, `status_cotacao`, `classe`) VALUES
(1, 'Em digitação', 'EmDigitacao'),
(2, 'Aguardando Fornecedores', 'AguardandoFornecedores'),
(3, 'Pronto para Cotar', 'ProntoCotar'),
(4, 'Cotado', 'Cotado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_item_cotacao`
--

CREATE TABLE `status_item_cotacao` (
  `id_status_item_cotacao` int(11) NOT NULL,
  `status_item_cotacao` varchar(50) NOT NULL,
  `classe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_item_cotacao`
--

INSERT INTO `status_item_cotacao` (`id_status_item_cotacao`, `status_item_cotacao`, `classe`) VALUES
(1, 'Aguardando Cotação', 'Aguardandocotacao'),
(2, 'Aguardando Aprovação', 'AguardandoAprovacao'),
(3, 'Aprovado', 'Aprovado'),
(4, 'Cancelado', ''),
(5, 'Rejeitado', ''),
(6, 'Não comercializa', ''),
(7, 'Não Atende', ''),
(8, 'No Estoque', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_ordem_compra`
--

CREATE TABLE `status_ordem_compra` (
  `id_status_ordem_compra` int(11) NOT NULL,
  `status_ordem_compra` varchar(50) NOT NULL,
  `classe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_ordem_compra`
--

INSERT INTO `status_ordem_compra` (`id_status_ordem_compra`, `status_ordem_compra`, `classe`) VALUES
(1, 'Em Digitação', 'EmDigitacao'),
(2, 'Aguardando Aprovação', 'AguardandoAprovacao'),
(3, 'Aprovado', 'Aprovado'),
(4, 'Autorizado', ''),
(5, 'Finalizado', ''),
(6, 'Cancelado', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_ordem_producao`
--

CREATE TABLE `status_ordem_producao` (
  `id_status_ordem_producao` int(11) NOT NULL,
  `status_ordem_producao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_ordem_producao`
--

INSERT INTO `status_ordem_producao` (`id_status_ordem_producao`, `status_ordem_producao`) VALUES
(1, 'Em digitação'),
(2, 'Aguardando Liberação para Início'),
(3, 'Aguardando compra de insumos faltantes'),
(4, 'Liberado para Iniciar'),
(5, 'Iniciado'),
(6, 'Processo Finalizado'),
(7, 'Pausado'),
(8, 'Excluído');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `id_status_pedido` int(11) NOT NULL,
  `status_pedido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id_status_pedido`, `status_pedido`) VALUES
(1, 'Em Digitação'),
(2, 'Em Espera'),
(3, 'Em Produção'),
(4, 'Pronto para Faturar'),
(5, 'Faturado'),
(6, 'Excluído'),
(7, 'Recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_solicitacao`
--

CREATE TABLE `status_solicitacao` (
  `id_status_solicitacao` int(11) NOT NULL,
  `status_solicitacao` varchar(50) NOT NULL,
  `classe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status_solicitacao`
--

INSERT INTO `status_solicitacao` (`id_status_solicitacao`, `status_solicitacao`, `classe`) VALUES
(1, 'Em Aberto', 'EmAberto'),
(2, 'Em Cotação de Preço', 'CotacaoPreco'),
(3, 'Em Ordem de Compra', 'OrdemCompra'),
(4, 'Em Estoque', 'EmEstoque'),
(5, 'Cancelado', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_movimento`
--

CREATE TABLE `tipo_movimento` (
  `id_tipo_movimento` int(11) NOT NULL,
  `tipo_movimento` varchar(100) NOT NULL,
  `ent_sai` varchar(1) DEFAULT NULL,
  `movimenta_estoque` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_movimento`
--

INSERT INTO `tipo_movimento` (`id_tipo_movimento`, `tipo_movimento`, `ent_sai`, `movimenta_estoque`) VALUES
(1, 'Entrada Avulsa', 'E', 'S'),
(2, 'Entrada Por Ajuste Balanço', 'E', 'S'),
(3, 'Entrada por Ordem de Compra', 'E', 'S'),
(4, 'Entrada por Ordem de Produção', 'S', 'S'),
(5, 'Saída Avulsa', 'S', 'S'),
(6, 'Saída por Perda', 'S', 'S'),
(7, 'Saída por Venda do Produto', 'S', 'S'),
(8, 'Saída por Ordem de Produção', 'S', 'S'),
(9, 'Saída por Ajuste de Balanço', 'S', 'S'),
(10, 'Saída para Consumo Interno', 'S', 'S'),
(11, 'Saída por Transfência de Estqoue', 'S', 'N'),
(12, 'Entrada por Transferência de Estqoue', 'E', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `transferencia`
--

CREATE TABLE `transferencia` (
  `id_transferencia` int(11) NOT NULL,
  `id_origem` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `data_transferencia` date NOT NULL,
  `qtde_transferencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id_unidade` int(11) NOT NULL,
  `unidade` varchar(40) NOT NULL,
  `abrev` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id_unidade`, `unidade`, `abrev`) VALUES
(1, 'Unidade', 'UND');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `email`, `senha`) VALUES
(1, 'mjailton', 'mjailton@gmail.com', '123'),
(2, 'elielma', 'elielma@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `_nfe_produto`
--

CREATE TABLE `_nfe_produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `eh_produto` varchar(1) DEFAULT NULL,
  `eh_insumo` varchar(1) DEFAULT NULL,
  `eh_promocao` varchar(1) NOT NULL DEFAULT 'N',
  `eh_maisvendido` varchar(1) NOT NULL DEFAULT 'N',
  `eh_lancamento` varchar(1) NOT NULL DEFAULT 'N',
  `codigo_barra` varchar(20) NOT NULL,
  `preco_alto` decimal(10,2) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(80) NOT NULL,
  `ativo` varchar(1) NOT NULL DEFAULT 'S',
  `estoque_inicial` int(11) DEFAULT 0,
  `estoque_minimo` int(11) DEFAULT 0,
  `estoque_maximo` int(11) DEFAULT 0,
  `estoque_atual` int(11) DEFAULT 0,
  `estoque_reservado` int(11) NOT NULL DEFAULT 0,
  `estoque_real` int(11) NOT NULL DEFAULT 0,
  `custo_atual` decimal(10,2) DEFAULT 0.00,
  `custo_medio` decimal(10,2) DEFAULT 0.00,
  `custo_producao` decimal(10,2) DEFAULT 0.00,
  `estoque_financeiro` decimal(10,2) DEFAULT 0.00,
  `gtin` varchar(20) DEFAULT NULL,
  `ncm` varchar(20) DEFAULT NULL,
  `cbenef` varchar(20) DEFAULT NULL,
  `extipi` varchar(10) DEFAULT NULL,
  `cfop` int(11) DEFAULT NULL,
  `mva` decimal(10,2) DEFAULT NULL,
  `nfci` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `_nfe_produto`
--

INSERT INTO `_nfe_produto` (`id_produto`, `id_categoria`, `id_unidade`, `produto`, `eh_produto`, `eh_insumo`, `eh_promocao`, `eh_maisvendido`, `eh_lancamento`, `codigo_barra`, `preco_alto`, `preco`, `descricao`, `imagem`, `ativo`, `estoque_inicial`, `estoque_minimo`, `estoque_maximo`, `estoque_atual`, `estoque_reservado`, `estoque_real`, `custo_atual`, `custo_medio`, `custo_producao`, `estoque_financeiro`, `gtin`, `ncm`, `cbenef`, `extipi`, `cfop`, `mva`, `nfci`) VALUES
(8, 1, 1, 'Panela 5', 'S', 'N', 'S', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_5.jpg', 'S', 0, 0, 0, 17, 0, 17, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(9, 1, 1, 'Panela de Pressão', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_DE_PRESAO.png', 'S', 0, 0, 0, 9, 0, 9, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(10, 7, 1, 'Frigideira Reforçada', 'S', 'N', 'S', 'N', 'N', '', '150.00', '497.00', NULL, 'FRIGIDEIRA_REFORCADA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(11, 7, 1, 'Frigideira Cabo Tubular', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'FRIGIDEIRA_CABO_TUBULAR_2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(12, 1, 1, 'Panela Longa', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_LONGA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(13, 1, 1, 'Panela Arredondada', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_RREDONDADA2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(14, 1, 1, 'Panela Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '50.00', NULL, 'PANELA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(15, 1, 1, 'Panela Longa 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_LONGA2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(16, 1, 1, 'Panela Achatada', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_ACHATADA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(17, 1, 1, 'Panela Achatada 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_ACHATADA2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(18, 1, 1, 'Panela Verde', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_VERDE.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(19, 1, 1, 'Panela Verde 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_VERDE2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(20, 7, 1, 'Frigideira sem Tampa Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'FRIGIDEIRA_SEM_TAMPA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(21, 7, 1, 'Frigideira Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'FRIGIDEIRA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(22, 2, 1, 'Cuscuzeira Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'CUSCUZEIRA_LARANJA.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(31, 2, 1, 'Cuscuzeira 3', 'S', 'N', 'N', 'N', 'N', '', '150.00', '150.00', NULL, 'CUSCUZEIRA3.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(32, 6, 1, 'Leiteira Tubular 3', 'S', 'N', 'N', 'N', 'N', '', '150.00', '50.00', NULL, 'LEITEIRAS_TUBULAR3.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(33, 6, 1, 'Leiteira com Tampa Laranja', 'S', 'N', 'N', 'N', 'N', '', '150.00', '30.00', NULL, 'LEITEIRA_COM_TAMPA_LARANJA4.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(35, 1, 1, 'Panela com tampa 2', 'S', 'N', 'N', 'N', 'N', '', '150.00', '100.00', NULL, 'PANELA_COM_TAMPA_2.jpg', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(38, 11, 1, 'ABRASIVO CEBO AMARELO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '15.70', NULL, '', 'S', 0, 0, 0, 3, 0, 3, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(41, 11, 1, 'ALCA PARA TAMPA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '15.90', NULL, '', 'S', 0, 0, 0, 3, 0, 3, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(52, 11, 1, 'ALÇA DE LEITEIRA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.50', NULL, '', 'S', 0, 0, 0, 3, 0, 3, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(57, 11, 1, 'ALÇA PARA PANELA DE PRESSAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.40', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(60, 11, 1, 'BORRACHAS P/ PANELA PRESSAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.50', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(61, 11, 1, 'CABO CUSCUZEIRA ', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.65', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(62, 11, 1, 'CABO DE CAÇAROLA COD.227', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.90', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(63, 11, 1, 'CABO DE FRIGIDEIRA PEQ REF. 417 MCA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '5.90', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(64, 11, 1, 'CABO DE LEITEIRA COD.2046', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(85, 11, 1, 'CABO PARA PANELA DE PRESSAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.20', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(86, 11, 1, 'CABO REBITADO PEQUENO 3F 90G', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.95', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(87, 11, 1, 'HASTE GRANDE  20 X 130', NULL, 'S', 'N', 'N', 'N', '', '0.00', '15.90', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(91, 11, 1, 'LIXA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.50', NULL, '', 'S', 0, 0, 0, 110, 0, 110, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(92, 11, 1, 'ORELHA DE CALDEIRAO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '31.80', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(93, 11, 1, 'PESO TIPO UNIV.PRETO S/MARCA LEVE', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(94, 11, 1, 'PINO 1/2 SEXT DIAM 01 R 3/8 UNF', NULL, 'S', 'N', 'N', 'N', '', '0.00', '1.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(95, 11, 1, 'POMEL COLOR', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.60', NULL, '', 'S', 0, 0, 0, 4, 0, 4, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(103, 11, 1, 'RALO 110', NULL, 'S', 'N', 'N', 'N', '', '0.00', '13.70', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(107, 11, 1, 'RIBITE 1/8  X 7   PEQUENO', NULL, 'S', 'N', 'N', 'N', '', '0.00', '31.80', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(113, 11, 1, 'RODA DE BRIM', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.30', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(114, 11, 1, 'SELO DE SEGURANÇA', NULL, 'S', 'N', 'N', 'N', '', '0.00', '0.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(115, 11, 1, 'SUPORTE ALUM. BALDE Nº02', NULL, 'S', 'N', 'N', 'N', '', '0.00', '31.80', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(117, 11, 1, 'DISC0 210 X 1,10', NULL, 'S', 'N', 'N', 'N', '', '0.00', '12.70', NULL, '', 'S', 0, 0, 0, 4, 0, 4, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(142, 11, 1, 'TAMPA LUXO 14', 'S', 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(143, 11, 1, 'DISC0 PARA TAMPA', NULL, 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(144, 11, 1, 'TAMPA PARA PANELA DE PRESSÃO', 'S', 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL),
(145, 11, 1, 'VÁLVULA SEGURANÇA PANELA PRESSÃO', NULL, 'S', 'N', 'N', 'N', '', '1.00', '1.00', NULL, '', 'S', 0, 0, 0, 0, 0, 0, '0.00', '0.00', '0.00', '0.00', 'SEM GTIN', '85167910', NULL, NULL, 5102, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_banco`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`),
  ADD KEY `fk_cidade_estado1_idx` (`id_estado`);

--
-- Índices para tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD PRIMARY KEY (`id_configuracao`);

--
-- Índices para tabela `contabil_conta`
--
ALTER TABLE `contabil_conta`
  ADD PRIMARY KEY (`id_conta`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices para tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD PRIMARY KEY (`id_cotacao`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Índices para tabela `etapa_producao`
--
ALTER TABLE `etapa_producao`
  ADD PRIMARY KEY (`id_etapa_producao`);

--
-- Índices para tabela `fin_despesa`
--
ALTER TABLE `fin_despesa`
  ADD PRIMARY KEY (`id_despesa`);

--
-- Índices para tabela `fin_documento_origem`
--
ALTER TABLE `fin_documento_origem`
  ADD PRIMARY KEY (`id_documento_origem`);

--
-- Índices para tabela `fin_lancamento_despesa`
--
ALTER TABLE `fin_lancamento_despesa`
  ADD PRIMARY KEY (`id_lancamento_despesa`);

--
-- Índices para tabela `fin_lancamento_pagar`
--
ALTER TABLE `fin_lancamento_pagar`
  ADD PRIMARY KEY (`id_lancamento_pagar`);

--
-- Índices para tabela `fin_lancamento_receber`
--
ALTER TABLE `fin_lancamento_receber`
  ADD PRIMARY KEY (`id_lancamento_receber`);

--
-- Índices para tabela `fin_parcela_pagamento`
--
ALTER TABLE `fin_parcela_pagamento`
  ADD PRIMARY KEY (`id_parcela_pagamento`);

--
-- Índices para tabela `fin_parcela_pagar`
--
ALTER TABLE `fin_parcela_pagar`
  ADD PRIMARY KEY (`id_parcela_pagar`);

--
-- Índices para tabela `fin_parcela_receber`
--
ALTER TABLE `fin_parcela_receber`
  ADD PRIMARY KEY (`id_parcela_receber`);

--
-- Índices para tabela `fin_parcela_recebimento`
--
ALTER TABLE `fin_parcela_recebimento`
  ADD PRIMARY KEY (`id_parcela_recebimento`);

--
-- Índices para tabela `forma_pagto`
--
ALTER TABLE `forma_pagto`
  ADD PRIMARY KEY (`id_forma_pagto`);

--
-- Índices para tabela `fornecedor_cotacao`
--
ALTER TABLE `fornecedor_cotacao`
  ADD PRIMARY KEY (`id_fornecedor_cotacao`);

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Índices para tabela `item_carrinho`
--
ALTER TABLE `item_carrinho`
  ADD PRIMARY KEY (`id_item_carrinho`);

--
-- Índices para tabela `item_cotacao`
--
ALTER TABLE `item_cotacao`
  ADD PRIMARY KEY (`id_item_cotacao`);

--
-- Índices para tabela `item_ordem_compra`
--
ALTER TABLE `item_ordem_compra`
  ADD PRIMARY KEY (`id_item_ordem_compra`);

--
-- Índices para tabela `item_ordem_producao`
--
ALTER TABLE `item_ordem_producao`
  ADD PRIMARY KEY (`id_item_ordem_producao`);

--
-- Índices para tabela `livro_diario`
--
ALTER TABLE `livro_diario`
  ADD PRIMARY KEY (`id_livro_diario`);

--
-- Índices para tabela `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`id_localizacao`);

--
-- Índices para tabela `movimento`
--
ALTER TABLE `movimento`
  ADD PRIMARY KEY (`id_movimento`);

--
-- Índices para tabela `nfe`
--
ALTER TABLE `nfe`
  ADD PRIMARY KEY (`id_nfe`);

--
-- Índices para tabela `nfe_destinatario`
--
ALTER TABLE `nfe_destinatario`
  ADD PRIMARY KEY (`id_destinatario`);

--
-- Índices para tabela `nfe_emitente`
--
ALTER TABLE `nfe_emitente`
  ADD PRIMARY KEY (`id_nfe`);

--
-- Índices para tabela `nfe_item`
--
ALTER TABLE `nfe_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `FK_NFE_CAB_DET` (`id_nfe`);

--
-- Índices para tabela `nfe_produto`
--
ALTER TABLE `nfe_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `nfe_status`
--
ALTER TABLE `nfe_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `ordem_compra`
--
ALTER TABLE `ordem_compra`
  ADD PRIMARY KEY (`id_ordem_compra`);

--
-- Índices para tabela `ordem_producao`
--
ALTER TABLE `ordem_producao`
  ADD PRIMARY KEY (`id_ordem_producao`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `perfil_permissao`
--
ALTER TABLE `perfil_permissao`
  ADD PRIMARY KEY (`id_perfil_permissao`);

--
-- Índices para tabela `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  ADD PRIMARY KEY (`id_perfil_usuario`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id_permissao`);

--
-- Índices para tabela `processo_produtivo`
--
ALTER TABLE `processo_produtivo`
  ADD PRIMARY KEY (`id_processo_produtivo`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `produto_composicao`
--
ALTER TABLE `produto_composicao`
  ADD PRIMARY KEY (`id_produto_composicao`);

--
-- Índices para tabela `produto_localizacao`
--
ALTER TABLE `produto_localizacao`
  ADD PRIMARY KEY (`id_produto_localizacao`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Índices para tabela `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`id_saida`);

--
-- Índices para tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id_solicitacao`);

--
-- Índices para tabela `solicitacao_cotacao`
--
ALTER TABLE `solicitacao_cotacao`
  ADD PRIMARY KEY (`id_solicitacao_cotacao`);

--
-- Índices para tabela `status_cotacao`
--
ALTER TABLE `status_cotacao`
  ADD PRIMARY KEY (`id_status_cotacao`);

--
-- Índices para tabela `status_item_cotacao`
--
ALTER TABLE `status_item_cotacao`
  ADD PRIMARY KEY (`id_status_item_cotacao`);

--
-- Índices para tabela `status_ordem_compra`
--
ALTER TABLE `status_ordem_compra`
  ADD PRIMARY KEY (`id_status_ordem_compra`);

--
-- Índices para tabela `status_ordem_producao`
--
ALTER TABLE `status_ordem_producao`
  ADD PRIMARY KEY (`id_status_ordem_producao`);

--
-- Índices para tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`id_status_pedido`);

--
-- Índices para tabela `status_solicitacao`
--
ALTER TABLE `status_solicitacao`
  ADD PRIMARY KEY (`id_status_solicitacao`);

--
-- Índices para tabela `tipo_movimento`
--
ALTER TABLE `tipo_movimento`
  ADD PRIMARY KEY (`id_tipo_movimento`);

--
-- Índices para tabela `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`id_transferencia`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id_unidade`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `_nfe_produto`
--
ALTER TABLE `_nfe_produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banco`
--
ALTER TABLE `banco`
  MODIFY `id_banco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5571;

--
-- AUTO_INCREMENT de tabela `configuracao`
--
ALTER TABLE `configuracao`
  MODIFY `id_configuracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contabil_conta`
--
ALTER TABLE `contabil_conta`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `cotacao`
--
ALTER TABLE `cotacao`
  MODIFY `id_cotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `etapa_producao`
--
ALTER TABLE `etapa_producao`
  MODIFY `id_etapa_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fin_despesa`
--
ALTER TABLE `fin_despesa`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `fin_documento_origem`
--
ALTER TABLE `fin_documento_origem`
  MODIFY `id_documento_origem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `fin_lancamento_despesa`
--
ALTER TABLE `fin_lancamento_despesa`
  MODIFY `id_lancamento_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fin_lancamento_pagar`
--
ALTER TABLE `fin_lancamento_pagar`
  MODIFY `id_lancamento_pagar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fin_lancamento_receber`
--
ALTER TABLE `fin_lancamento_receber`
  MODIFY `id_lancamento_receber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fin_parcela_pagamento`
--
ALTER TABLE `fin_parcela_pagamento`
  MODIFY `id_parcela_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fin_parcela_pagar`
--
ALTER TABLE `fin_parcela_pagar`
  MODIFY `id_parcela_pagar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fin_parcela_receber`
--
ALTER TABLE `fin_parcela_receber`
  MODIFY `id_parcela_receber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `fin_parcela_recebimento`
--
ALTER TABLE `fin_parcela_recebimento`
  MODIFY `id_parcela_recebimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `forma_pagto`
--
ALTER TABLE `forma_pagto`
  MODIFY `id_forma_pagto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fornecedor_cotacao`
--
ALTER TABLE `fornecedor_cotacao`
  MODIFY `id_fornecedor_cotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `item_carrinho`
--
ALTER TABLE `item_carrinho`
  MODIFY `id_item_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `item_cotacao`
--
ALTER TABLE `item_cotacao`
  MODIFY `id_item_cotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `item_ordem_compra`
--
ALTER TABLE `item_ordem_compra`
  MODIFY `id_item_ordem_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `item_ordem_producao`
--
ALTER TABLE `item_ordem_producao`
  MODIFY `id_item_ordem_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `livro_diario`
--
ALTER TABLE `livro_diario`
  MODIFY `id_livro_diario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `id_localizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `movimento`
--
ALTER TABLE `movimento`
  MODIFY `id_movimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `nfe`
--
ALTER TABLE `nfe`
  MODIFY `id_nfe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nfe_destinatario`
--
ALTER TABLE `nfe_destinatario`
  MODIFY `id_destinatario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nfe_item`
--
ALTER TABLE `nfe_item`
  MODIFY `id_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nfe_produto`
--
ALTER TABLE `nfe_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de tabela `nfe_status`
--
ALTER TABLE `nfe_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `ordem_compra`
--
ALTER TABLE `ordem_compra`
  MODIFY `id_ordem_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ordem_producao`
--
ALTER TABLE `ordem_producao`
  MODIFY `id_ordem_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfil_permissao`
--
ALTER TABLE `perfil_permissao`
  MODIFY `id_perfil_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
  MODIFY `id_perfil_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id_permissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `processo_produtivo`
--
ALTER TABLE `processo_produtivo`
  MODIFY `id_processo_produtivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de tabela `produto_composicao`
--
ALTER TABLE `produto_composicao`
  MODIFY `id_produto_composicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produto_localizacao`
--
ALTER TABLE `produto_localizacao`
  MODIFY `id_produto_localizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `saida`
--
ALTER TABLE `saida`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `solicitacao_cotacao`
--
ALTER TABLE `solicitacao_cotacao`
  MODIFY `id_solicitacao_cotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `status_cotacao`
--
ALTER TABLE `status_cotacao`
  MODIFY `id_status_cotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `status_ordem_compra`
--
ALTER TABLE `status_ordem_compra`
  MODIFY `id_status_ordem_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `status_ordem_producao`
--
ALTER TABLE `status_ordem_producao`
  MODIFY `id_status_ordem_producao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `id_status_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `status_solicitacao`
--
ALTER TABLE `status_solicitacao`
  MODIFY `id_status_solicitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipo_movimento`
--
ALTER TABLE `tipo_movimento`
  MODIFY `id_tipo_movimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `id_transferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `_nfe_produto`
--
ALTER TABLE `_nfe_produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
