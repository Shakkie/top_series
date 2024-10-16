-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 12:50:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `top_series`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `ISAN` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `Puntuacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `ISAN` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estreno` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `serie`
--

INSERT INTO `serie` (`ISAN`, `titulo`, `descripcion`, `estreno`) VALUES
(12345678, 'White Collar', 'Neal Caffrey, un estafador, falsificador y ladrón es capturado después de jugar tres años al gato y al ratón con el FBI. Con tres años cumplidos en la prisión, se escapa de una prisión federal de máxima seguridad para encontrar a Kate, su exnovia. Peter Burke, el agente del FBI que inicialmente capturó a Caffrey, lo encuentra en un callejón sin salida en su búsqueda y vuelve a la cárcel con Caffrey. Esta vez Caffrey da información a Burke sobre pruebas en otro caso, sin embargo, esta información tiene un precio: Burke debe tener una reunión con Caffrey. En esta reunión, Caffrey propone un trato: ayudará a Burke a atrapar a los criminales de otros casos como parte de un programa de trabajo de liberación.', '2009'),
(14785236, 'The leftovers', 'El dos por ciento de la población mundial desaparece drásticamente y sin ningún tipo de explicación, los supervivientes tratan de buscar una explicación para entender lo ocurrido, y por lo tanto, qué tienen que hacer al respecto.', '2014'),
(19283746, 'Peaky blinders', 'Birmingham, 1939. Thomas Shelby es el violento líder de una conocida banda; un jefe del crimen organizado dispuesto a llegar a lo más alto sin importar el precio.', '2013'),
(20050327, 'Grey\'s Anatomy', 'La serie sigue a Meredith Grey, la hija de una cirujana general de renombre llamada Ellis Grey, luego de ser aceptada en el programa de residencia en el ficticio Seattle Grace Hospital. Durante su tiempo como residente, Grey trabaja junto con las doctoras Cristina Yang, Izzie Stevens, Alex Karev y George O\'Malley, quienes luchan por equilibrar sus vidas personales con el trabajo agitado y los horarios de entrenamiento.', '2005'),
(20201105, 'Supernatural', 'Cuando eran pequeños, Sam y Dean Winchester se quedaron sin su madre por culpa de una misteriosa fuerza diabólica. Debido a eso, su padre los crio para luchar contra lo sobrenatural.', '2005'),
(23456789, 'Fleabag', 'Una joven de Londres, con dudosas intenciones y sexualmente activa, intenta lidiar con la vida en la gran ciudad mientras acepta una tragedia reciente que le ha cambiado.', '2016'),
(25122020, 'Bridgerton', 'La serie está ambientada en la alta sociedad londinense durante el período Regencia inglés de principios del siglo XIX. La historia se centra en dos familias, los Bridgerton y los Featherington.', '2020'),
(45678921, 'El Señor de los Anillos: los Anillos de Poder', 'Los héroes se enfrentan al temido resurgimiento del mal en la Tierra Media, forjando legados que perdurarán mucho tiempo después de su desaparición.', '2022'),
(74380152, 'The Boys', 'Cuando los superhéroes abusan de sus poderes, un grupo de vigilantes llamados \"The Boys\" hace todo lo posible por frenarlos, independientemente de los riesgos que ello conlleva.', '2019'),
(76985243, 'Ozark', 'Marty Byrde es un asesor financiero de Chicago con una vida aparentemente normal en el trabajo y en su familia. Casado con Wendy y con dos hijos, Charlotte y Jonah, todos llevan una rutina apacible y ordinaria. Pero bajo esa apariencia la vida de Marty esconde un gran secreto: es el encargado de blanquear el dinero de uno de los cárteles de droga más importantes de México.', '2017'),
(83838383, 'How I met your mother', 'Ted le cuenta a sus dos hijos adolescentes la historia de cómo conoció al amor de su vida 25 años después de haber sucedido. Todo comienza cuando su mejor amigo, Marshall, le pide matrimonio a su novia de toda la vida, Lily.', '2005'),
(88888888, 'El internado', 'Cuando extraños sucesos empiezan a ocurrir en La Laguna Negra, un prestigioso internado, un grupo de estudiantes descubrirá oscuros secretos sobre el pasado del lugar.', '2007'),
(98765432, 'The Good Place', 'Al morir, la frívola Eleanor Shellstrop llega a un lugar tan bueno que intenta convertirse en mejor persona para poder quedarse.', '2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `User` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `Rol` enum('administrador','comun') NOT NULL DEFAULT 'comun'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `User`, `Email`, `Password`, `Rol`) VALUES
(1, 'Administrador', 'admin', 'admin@gmail.com', '1234', 'administrador'),
(2, 'Pepito', 'peps888', 'pepito8@gmail.com', 'Pepito1234', 'comun');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`ISAN`,`ID`),
  ADD KEY `puntuacion_usuario_FK` (`ID`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`ISAN`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Usuario_unique` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `puntuacion_serie_FK` FOREIGN KEY (`ISAN`) REFERENCES `serie` (`ISAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puntuacion_usuario_FK` FOREIGN KEY (`ID`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
