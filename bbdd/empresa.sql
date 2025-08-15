
CREATE DATABASE `empresa`;

CREATE TABLE `empresa`.`clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `dni` varchar(35) DEFAULT NULL,
  `telefono_1` varchar(25) DEFAULT NULL,
  `telefono_2` varchar(25) DEFAULT NULL,
  `direccion_entrega` varchar(190) DEFAULT NULL,
  `email` varchar(190) DEFAULT NULL
);

ALTER TABLE `empresa`.`clientes`
  ADD PRIMARY KEY (`id_cliente`);

ALTER TABLE `empresa`.`clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
