

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS  `exemplocurso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE  `exemplocurso`;

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `produtos` (`id`, `nome`, `estoque`) VALUES
(1, 'Carrinho de Controle Remoto', 15),
(2, 'Boneca Articulada', 22), 
(3, 'Lego Creator 500 peças', 8),
(4, 'Quebra-Cabeça 1000 peças', 12),
(5, 'Bola de Futebol Oficial', 30),
(6, 'Kit de Massinha de Modelar', 18),
(7, 'Jogo de Tabuleiro Banco Imobiliário', 10),
(8, 'Boneco de Ação Super-Herói', 25),
(9, 'Pistola de Água', 35),
(10, 'Triciclo Infantil', 5),
(11, 'Kit de Pintura a Dedo', 14),
(12, 'Dominó Gigante', 7),
(13, 'Brinquedo Educativo Alfabeto', 20),
(14, 'Foguetinho de Espuma', 28),
(15, 'Kit de Magia para Crianças', 9),
(16, 'Bambolê', 40),
(17, 'Pula-Pula Inflável', 3),
(18, 'Corda para Pular', 32),
(19, 'Boneco de Pelúcia Urso', 19),
(20, 'Jogo de Memória', 11);

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `produtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;