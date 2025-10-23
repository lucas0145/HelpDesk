create database db_bhm;
use db_bhm;

CREATE TABLE `tbl_chamados` (
  `id_chamada` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  FOREIGN KEY (`id_user`) REFERENCES tbl_users(`id_user`) ON DELETE CASCADE,
  `prioridade` tinyint(1) NOT NULL,
  `dataHora` datetime NOT NULL,
  `assunto` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`id_chamada`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isAdmin` tinyint(1) NOT NULL,
  `matriculaSimples` int NOT NULL,
  `senha` varchar(45) NOT NULL,
  `setor` varchar(45) NOT NULL,
  `ramal` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `bhmest` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

select * from db_bhm.tbl_users;
select * from db_bhm.tbl_chamados;