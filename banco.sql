CREATE SCHEMA IF NOT EXISTS `sistema_reservas` DEFAULT CHARACTER SET utf8 ;
USE `sistema_reservas` ;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` TEXT NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `espaco` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `localizacao` VARCHAR(255),
  `capacidade` INT,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descricao` TEXT,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `reserva` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_hora_inicio` DATETIME NOT NULL,
  `data_hora_fim` DATETIME NOT NULL,
  `usuario_id` INT NOT NULL,
  `espaco_id` INT NOT NULL,
  `evento_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  FOREIGN KEY (`espaco_id`) REFERENCES `espaco` (`id`),
  FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`)
);