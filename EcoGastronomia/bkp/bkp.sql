-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para ecogastronomia
CREATE DATABASE IF NOT EXISTS `ecogastronomia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ecogastronomia`;

-- Copiando estrutura para tabela ecogastronomia.cadastra_usuario
CREATE TABLE IF NOT EXISTS `cadastra_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `id_endereco` int DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `pais` varchar(15) DEFAULT NULL,
  `apelido` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_endereco_idx` (`id_endereco`),
  CONSTRAINT `id_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela ecogastronomia.cadastra_usuario: ~3 rows (aproximadamente)
INSERT INTO `cadastra_usuario` (`id_usuario`, `nome`, `email`, `senha`, `id_endereco`, `data_nascimento`, `genero`, `telefone`, `pais`, `apelido`) VALUES
	(6, 'Yan Ambrósio', 'yan@gmail.com', 'MQ==', NULL, '2023-11-06', 'Outro', '11988815735', 'Brasil', 'Yan'),
	(7, 'Sofia Estrela', 'sofiacarvalho100208@gmail.com', 'c29zb2xpbmRhMTAw', NULL, '2008-02-10', 'Outro', '1112111312', 'Bolívia', 'gostosa'),
	(8, 'Kathelynn Frankclinn Carvalho Cruz', 'frankclinnkathelynn@gmail.com', 'MA==', NULL, '2011-06-17', 'Feminino', '11915645234', 'Brasil', 'Kitéria'),
	(9, 'PEDRO HENRIQUE LEAL DOS SANTOS SILVA', 'phleal.dev@gmail.com', 'MTIzNA==', NULL, '2007-12-18', NULL, NULL, NULL, NULL),
	(10, 'p', 'phleal.dev@gmail.com', 'MQ==', NULL, '1111-11-11', NULL, NULL, NULL, NULL),
	(11, '1', '111@11.com', 'MQ==', NULL, '1111-11-11', 'Masculino', '1111111111', 'Brasil', '11111111');

-- Copiando estrutura para tabela ecogastronomia.compra_usuario
CREATE TABLE IF NOT EXISTS `compra_usuario` (
  `idcompra_usuario` int NOT NULL AUTO_INCREMENT,
  `data_da_compra` datetime NOT NULL,
  `id_usuario` int NOT NULL,
  `id_produto` int NOT NULL,
  PRIMARY KEY (`idcompra_usuario`),
  KEY `id_produto_idx` (`id_produto`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `cadastra_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela ecogastronomia.compra_usuario: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela ecogastronomia.endereco
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int NOT NULL AUTO_INCREMENT,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `numero_da_casa` int NOT NULL,
  `cep` int NOT NULL,
  `pais` varchar(3) NOT NULL,
  `bloco_ap` varchar(25) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela ecogastronomia.endereco: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela ecogastronomia.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `categoria_produto` varchar(45) NOT NULL,
  `descricao_produto` longtext NOT NULL,
  `img_produto` varchar(200) NOT NULL,
  `valor_produto` varchar(8) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela ecogastronomia.produto: ~5 rows (aproximadamente)
INSERT INTO `produto` (`id_produto`, `nome_produto`, `categoria_produto`, `descricao_produto`, `img_produto`, `valor_produto`) VALUES
	(13, 'Kit utensílios bambu 5 peças', 'utensílios', 'Jogo de Utensílios de Bambu para Cozinha: Práticos e versáteis, esses utensílios de 28cm destacam-se por sua simplicidade, rusticidade e elegância. Ideal para cozinhar, seu design rústico também embeleza a cozinha, conferindo um toque de sofisticação ao ambiente.', './imagens/kit_bambu_5.jpg', '24,99'),
	(14, 'Cozinhando sem desperdício', 'livros', '"Cozinhando sem desperdício" guia o gourmet consciente por receitas sustentáveis, transformando ingredientes com sabedoria. Uma jornada culinária que une sabor e responsabilidade ambiental.', './imagens/cozinhando_livro.jpg', '59,99'),
	(15, 'Avental em algodão reciclado', 'acessorios', 'Inspirador e prático, "Avental em Algodão Reciclado" mergulha na sustentabilidade com estilo. Descubra projetos cativantes, guias detalhados e dicas inovadoras para criar aventais ecológicos, destacando a beleza da moda sustentável.', './imagens/avental.jpg', '24,99'),
	(16, 'Maço de Agrião', 'ingredientes', ' O agrião, com seu sabor leve e ligeiramente picante, é uma folha verde vibrante repleta de nutrientes. Rico em vitaminas e minerais, este maço de agrião adiciona um toque refrescante e saudável a saladas e pratos diversos, elevando o valor nutricional e proporcionando uma explosão de frescor ao paladar. ', './imagens/agriao.avif', '6,99'),
	(17, 'Liquidificador Mondial Power- L-550 2 Velocidades + Pulsar 550W - Preto', 'diversos', 'Potente e versátil, o Liquidificador Mondial Power-L550 é a escolha ideal para preparar receitas com eficiência. Com 550W de potência, oferece 2 velocidades e função pulsar, garantindo resultados precisos. Seu design moderno em preto combina estilo e desempenho na sua cozinha.', './imagens/liquidificador.avif', '84,99');

-- Copiando estrutura para tabela ecogastronomia.receitas
CREATE TABLE IF NOT EXISTS `receitas` (
  `id_receitas` int NOT NULL AUTO_INCREMENT,
  `nome_receita` varchar(85) NOT NULL,
  `descricao_receita` longtext NOT NULL,
  `img_receita` varchar(100) NOT NULL,
  `categoria_receita` varchar(45) NOT NULL,
  `modo_preparo` longtext NOT NULL,
  `ingredientes` longtext NOT NULL,
  `quantidade_pessoas` int NOT NULL,
  PRIMARY KEY (`id_receitas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela ecogastronomia.receitas: ~8 rows (aproximadamente)
INSERT INTO `receitas` (`id_receitas`, `nome_receita`, `descricao_receita`, `img_receita`, `categoria_receita`, `modo_preparo`, `ingredientes`, `quantidade_pessoas`) VALUES
	(1, 'Pudim de pão de liquidificador', 'O pudim de pão amanhecido reinventa sobras, combinando a maciez do pão com a cremosidade de leite, ovos e açúcar. Cada fatia revela camadas de sabor, da doçura caramelizada ao núcleo reconfortante de migalhas macias. Uma sobremesa simples torna-se uma experiência cativante.', './imagens/pudim_de_pao.png', 'doces', 'Misture todos os ingredientes no liquidificador e bata bem.;Reserve.;Em uma forma própria para pudim derreta o açúcar para fazer a calda, espere endurecer um pouco e coloque o líquido que está no liquidificador.;Leve ao fogo por uns 35 minutos ou até você enfiar um garfo e ele sair limpo.', '4 ovos;3 pães francês amanhecidos;1 lata de leite condensado;2 medidas de leite (medir na lata de leite condensado);1 xícara de açúcar para a calda;1 colher de margarina;1/2 xícara de açúcar.', 4),
	(2, 'Brigadeiro de casca de banana', 'O brigadeiro de casca de banana combina sustentabilidade e sabor. Feito com cascas maduras processadas, revela uma textura suave e sabor agridoce. Cada mordida oferece a doçura natural das bananas, adicionando uma nota sofisticada. Uma experiência gourmet consciente, aproveitando ingredientes descartados.', './imagens/brigadeiro_banana.png', 'doces', 'Bata todos os ingredientes no liquidificador;Leve a mistura ao fogo baixo para ferver, mexendo sempre até começar a soltar do fundo;Desligue e deixe esfriar;Depois, você pode enrolar e passar no granulado ou servir em copinhos.', 'Cascas de 2 bananas, bem lavadas e picadas;1 lata de leite condensado;4 colheres (sopa) de chocolate em pó;1 colher (sopa) de margarina ou manteiga', 6),
	(3, 'Suco de casca de abacaxi com capim cidreira', 'Refrescante e nutritivo, o suco de casca de abacaxi com capim-cidreira é uma explosão tropical de sabores. Utilizando cascas ricas em fibras e nutrientes, combinadas ao toque cítrico do capim-cidreira, oferece uma experiência única e sustentável. Ideal para dias quentes, sua doçura e acidez equilibradas tornam-no uma opção saudável e deliciosamente refrescante.', './imagens/suco_abacaxi.png', 'diversos', 'Bata no liquidificador as cascas de abacaxi, o capim cidreira e a água;Coe ele;Adoce a gosto.', 'Cascas de 1 abacaxi, bem lavadas;1 xícara (chá) de capim cidreira;1 litro de água;Açúcar a gosto (opcional)', 3),
	(4, 'Panqueca de talos de espinafre com ricota', 'Panqueca leve e nutritiva de talos de espinafre e ricota. Uma fusão saudável, utilizando talos ricos em fibras e a cremosidade da ricota. Cada mordida oferece sabor equilibrado e textura macia.Uma opção deliciosa para refeições leves. ', './imagens/panqueca_talos.jpg', 'lanches', 'Bata o leite com os talos de espinafre no liquidificador até triturar bem.;Passe por uma peneira e volte a mistura para o copo do liquidificador.;Junte o ovo, a farinha e o sal e bata bem até homogeneizar.;Aqueça uma frigideira antiaderente (16 cm de diâmetro) pincelada com manteiga.;Espalhe de 3 a 4 colheres (sopa) da massa, girando a frigideira rapidamente para que se espalhe por igual.;Quando dourar o lado de baixo, vire a panqueca para dourar o outro lado. Repita a operação até acabar a massa.;Espalhe 4 colheres (sopa) do recheio sobre cada disco de panqueca e enrole.;Acomode em refratário e regue com o molho (basta misturar os ingredientes).;Polvilhe o parmesão e leve ao forno médio preaquecido (200 °C) por 15 minutos ou até dourar ligeiramente.;Recheio:;Refogue a cebola na manteiga até murchar.;Transfira para uma tigela, misture os ingredientes restantes e tempere com sal e noz-moscada a gosto.', '2 xícaras (chá) de leite (400 ml);1 xícara (chá) de talos de espinafre aferventados;1 ovo;1 e 1/2 xícara (chá) de farinha de trigo;1 pitada de sal;Manteiga para untar;5 colheres (sopa) de parmesão ralado para polvilhar;Recheio:;1 cebola pequena picada;2 colheres (sopa) de manteiga;300 g de ricota peneirada;150 g de muçarela ralada;2 colheres (sopa) de cebolinha verde picada;Sal e noz-moscada ralada;Molho:;1 copo de requeijão cremoso;1/4 de xícara (chá) de leite morno (50 ml)', 4),
	(5, 'Bolinhos de talos', 'Deliciosos bolinhos de talos, uma receita sustentável que transforma restos em sabores incríveis. Combinando talos de vegetais frescos, ervas aromáticas e um toque crocante, esses bolinhos são uma explosão de sabor e uma maneira brilhante de reduzir o desperdício alimentar. Experimente essa mistura única de sustentabilidade e prazer gastronômico em cada mordida! ', './imagens/bolinho_talos.jpg', 'saudáveis', 'Lave bem os talos e corte em cubinhos.;Dar uma pré fervura somente nos cubinhos da couve.;Bata os ovos e acrescente o restante dos ingredientes, coloque o fermento em pó por último.;Misture bem.;Frite os bolinhos ás colheradas em óleo quente.', '1 xícara de talos de couve ou agrião;5 colheres (sopa) de farinha de trigo;2 colheres (sopa) de leite aproximadamente;1 colher (sopa) rasa de fermento em pó;2 ovos;1/2 cebola picada;Orégano, sal e pimenta a gosto', 6),
	(6, 'Canoa de Abobrinha Recheada com Carne Moída', 'Delicie-se com uma canoa de abobrinha recheada com carne moída. Uma mistura suculenta e aromática, a carne temperada complementa a textura leve da abobrinha. Uma opção nutritiva e cheia de sabor para uma refeição equilibrada.', './imagens/canoa_abobrinha.jpg', 'carne', 'Corte as abobrinhas de uma ponta a outra, retire todo o meio dela e reserve.;Deixe-a com a espessura de 1 dedo, coloque-as para ferver por 10 minutos com uma pitada de sal, escorra e reserve.;Em uma panela, refogue o alho e a cebola, coloque o tempero completo de carne a polpa de tomate e cozinhe o miolo da abobrinha junto a carne moída, coloque a água.;Depois de cozido e reduzido o caldo, quando estiver parecendo uma pasta, coloque as abobrinhas em um refratário, encha-as com a pasta de carne moída, polvilhe com queijo parmesão e coloque no forno até gratinar.;Pode servir com arroz integral ou com purê de batatas.', '3 abobrinhas;300g de carne moída;100g de queijo ralado;2 dentes de alho;1 cebola;3 colheres (sopa) de molho de tomate;1 copo de água;Sal a gosto;1 colher (sopa) tempero completo para carne', 4),
	(7, 'Macarrão com ramas de cenoura', 'Macarrão com ramas de cenoura é uma explosão de cores e sabores saudáveis. As ramas, ricas em nutrientes, adicionam frescor ao prato. Um encontro perfeito entre a textura do macarrão e a crocância da cenoura, oferecendo uma experiência leve e deliciosa.', './imagens/macarrao_cenoura.jpg', 'massas', 'Em uma panela, refogue a cebola e o alho até dourar.;Acrescente os talos de agrião e as ramas de cenoura e continue refogando.;Tempere com noz moscada e sal a gosto.;Use o refogado como molho para o macarrão cozido.;Se quiser, acrescente queijo ralado.', '1 cebola pequena picada;6 dentes de alho;2 xícaras de talos de agrião;1 xícara de ramas de cenoura;Noz moscada e sal a gosto;2 1/2 xícaras do macarrão de sua preferência.', 3),
	(8, 'Sopa de fubá com talos e folhas', 'Saborosa e nutritiva, a sopa de fubá com talos e folhas é um prato reconfortante que une a cremosidade do fubá com a riqueza dos vegetais. Uma combinação única que proporciona uma experiência gastronômica equilibrada e saudável. ', './imagens/sopa_fuba.jpg', 'sopas', 'Picar bem os talos ou batê-los no liquidificador com um pouco de água.;Numa panela, colocar os talos, os demais ingredientes e levar ao fogo para cozinhar até que os legumes estejam macios.;Preparar com talos de acelga, couve, agrião, folhas de beterraba, cenoura, nabo, rabanete etc.', '2 xícaras (chá) de talos bem lavados;2 batatas picadas;1 cenoura picada;1 1/2 litro de água;1 xícara (chá) de fubá;temperos e sal a gosto', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
