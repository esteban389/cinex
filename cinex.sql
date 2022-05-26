-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2022 a las 20:14:45
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `peli_id` int(2) NOT NULL,
  `peli_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `peli_date` date NOT NULL,
  `peli_descripcion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `peli_foto` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`peli_id`, `peli_nombre`, `peli_date`, `peli_descripcion`, `peli_foto`) VALUES
(1, 'animales fantásticos', '2016-05-10', 'El magizoólogo Newt Scamander, dos hermanas y un No-Maj luchan contra las fuerzas oscuras mientras persiguen a las criaturas mágicas liberadas en el mundo mágico del Nueva York de 1926.', 'animales-fantasticos.jpg'),
(2, 'aquaman', '2018-12-21', '\"Aquaman\" nos devela los orígenes de Arthur Curry, mitad humano y mitad atlante, que emprende el viaje de su vida para descubrir si es merecedor de su destino: ser rey.', 'aquaman.jpg'),
(3, 'batman', '2018-07-12', 'Dos años de acechar las calles como Batman y sembrar el miedo entre los criminales llevaron a Bruce Wayne a las sombras más oscuras de Ciudad Gótica.', 'batman.jpg'),
(5, 'cómo entrenar a tu dragon', '2014-07-18', 'Cinco años después de que Hipo y Chimuelo unieran a dragones y vikingos, deben unir fuerzas con un misterioso guerrero para proteger a Berk.', 'como-entrenar-a-tu-dragon.jpg'),
(6, 'duna', '2022-02-28', 'Dune, una mítica y heroica aventura llena de emoción, narra la historia de Paul Atreides, un joven brillante que nació con un destino que va más allá de su imaginación y que debe viajar al planeta más peligroso del universo.', 'duna.jpg'),
(7, 'gato con botas', '2017-08-30', 'El legendario Gato con Botas se embarca en una aventura con sus amigos Kitty Patamansa y Humpty Dumpty para salvar su pueblo. En el camino aparecen Jack y Jill, dos bandidos que harán cualquier cosa para que el Gato y su grupo fracasen.', 'gato-con-botas.jpg'),
(8, 'gatubela', '2004-03-15', 'Una mujer dotada con la velocidad, los reflejos y los sentidos de una gata camina por la delgada línea que separa a los criminales de los héroes mientras un tenaz detective la persigue, fascinado por su doble personalidad.', 'gatubela.jpg'),
(9, 'godzila vs kong', '2021-05-25', 'Godzilla y Kong se enfrentan en una batalla inolvidable. Los titanes se embarcan en una misión en tierras inexploradas, mientras una conspiración humana amenaza con eliminarlos.', 'godzila-kingkong.jpg'),
(10, '¿qué pasó ayer?', '2009-06-21', 'Planearon una despedida de soltero a Las Vegas que jamás podrán olvidar. ¡Pero ahora, necesitan realmente recordar qué es lo que sucedió!', 'hangover.jpg'),
(11, 'hombres de negro', '2002-04-05', 'Cuando la Tierra vuelve a estar bajo amenaza, el agente Jay debe restaurar la memoria del agente Kay, que ahora trabaja en el correo, para conseguir su ayuda y derrotar a los alienígenas.', 'hombres-de-negro.jpg'),
(12, 'hotel transilvania', '0000-00-00', 'La tranquilidad de Drácula se ve alterada cuando un humano despistado llega a su hotel exclusivo para monstruos y se enamora de su hija.', 'hotel-transilvania.jpg'),
(13, 'it (eso)', '2017-12-07', 'Cuando los niños del pueblo comienzan a desaparecer, un grupo de chicos se enfrentan a sus peores temores al encarar al malvado payaso Pennywise. Basada en la novela de Stephen King.', 'it.jpg'),
(14, 'jurassic world', '2015-04-24', 'Todo parece ir a la perfección en el nuevo Mundo Jurásico hasta que un nuevo dinosaurio modificado genéticamente escapa, desatando el caos.', 'jurassic-world.jpg'),
(15, 'lego', '2014-07-28', 'The LEGO movie sigue a Emmet, quien se encuentra en una aventura épica para detener a un malvado tirano que quiere pegar el universo, una aventura para la cual él no está preparado.', 'lego.jpg'),
(16, 'madagascar', '2005-04-10', 'Cuatro mimados animales del zoológico de Nueva York naufragan en la exótica Madagascar y descubren que la vida allí es realmente salvaje.', 'madagascar.jpg'),
(17, 'madagascar 2', '2008-01-24', 'El avión que lleva a Alex, Marty, Melman y Gloria de regreso a Nueva York se estrella en el medio del África. Allí, Alex se reencuentra con su familia, y los cuatro amigos parecen encontrar por fin el hogar perfecto.', 'madagascar2.jpg'),
(18, 'megamente', '2010-07-28', 'Cuando el supervillano Megamente logra por fin vencer a su archienemigo, se da cuenta de que ya nada tiene sentido. Con la llegada de un nuevo villano que trae caos y destrucción a la ciudad, ¿podrá esta gran mente convertirse en héroe?', 'megamente.jpg'),
(19, 'minions', '2015-08-24', 'Los minions están en busca de un nuevo amo malvado. Por suerte se topan con Scarlet Overkill, quien trama un plan para dominar al mundo.', 'minions.jpg'),
(20, 'mortal kombat', '2021-06-14', 'El peleador de MMA Cole Young debe entrenar para desbloquear su verdadero poder y luchar por el universo junto a los grandes campeones de la Tierra contra los enemigos de Outworld.', 'mortal-kombat.jpg'),
(21, 'Ready player one', '2018-03-19', 'Del cineasta Steven Spielberg, llega la aventura Ready Player One, basada en el exitoso libro de Ernest Cline del mismo nombre, el cual se ha convertido en un fenómeno mundial.', 'ready-player-one.jpg'),
(22, 'red social', '2010-05-06', 'La invención de Facebook® es relatada en este filme ganador del Globo de Oro® a mejor película, guión original y dirección (David Fincher).', 'red-social.jpg'),
(23, 'sherlock holmes', '2009-04-18', 'Muestra al legendario detective como un audaz hombre de acción, dotado de un inigualable intelecto.', 'sherlock-holmes.jpg'),
(24, 'soy leyenda', '2007-06-21', 'De alguna forma, el virólogo militar Robert Neville, es inmune a un imparable e incurable virus, siendo el último hombre sobreviviente en la Ciudad de Nueva York y quizás, en el mundo.', 'soy-leyenda.jpg'),
(25, 'space jam', '2022-04-12', '¡Te damos la bienvenida al mundo de Space Jam! El ícono mundial de la NBA LeBron James se embarca en una aventura épica junto al personaje clásico Bugs Bunny en un evento que combina animación y actores reales, Space Jam: Una nueva era.', 'space-jam.jpg'),
(26, 'el hombre araña', '2002-07-14', 'Luego de ser mordido por una araña genéticamente alterada, Peter Parker lucha contra el mal como Spider-Man.', 'spiderman.jpg'),
(27, 'tom y jerry', '2021-09-24', 'Una nostálgica rivalidad se reaviva cuando la organizadora de \'\'la boda del siglo\'\', en el mejor hotel de Nueva York, se ve obligada a contratar a Tom para deshacerse de Jerry.', 'tom-y-jerry.jpg'),
(28, 'tortugas ninja 2', '2016-05-20', 'as tortugas ninja, ayudadas por April ONeil y su nuevo aliado, Casey Jones, se enfrentan nuevamente a Shredder y a su mayor amenaza: el malvado alienígena Krang.', 'tortugas-ninja.jpg'),
(29, 'transformers', '2007-11-21', 'Cuando el joven terrícola Sam Witwicky consigue su primer coche, descubre una pista que lleva hasta el Allspark, un talismán poderoso por el que Autobots y Decepticons libran una guerra interestelar.', 'transformers.jpg'),
(30, 'troya', '2004-03-15', 'Brad Pitt levanta su espada y nos ofrece su musculosa apariencia y grandiosa actuación en el papel de Aquiles, el gran guerrero griego, en esta espectacular versión de La Ilíada.', 'troya.jpg'),
(31, 'la ultima ola', '2015-01-31', 'Un geólogo atrapado en al pie de una montaña en medio de un gigantesco tsunami cuenta con apenas diez minutos para salvar a todo un pueblo.', 'ultima-ola.jpg'),
(32, 'venom', '2021-10-28', 'Tom Hardy y Woody Harrelson interpretan a Eddie Brock y Cletus Kasady en una batalla mortal junto a sus simbiontes Venom y Carnage.', 'venom.jpg'),
(33, 'mujer maravilla', '2017-05-24', 'Antes de convertirse en Wonder Woman, ella solía ser Diana, Princesa de las Amazonas, entrenada para ser una guerrera inconquistable.', 'wonder-woman.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user_id` int(2) NOT NULL,
  `user_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user_correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `user_pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user_uname` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user_id`, `user_nombre`, `user_correo`, `user_pass`, `user_uname`) VALUES
(1, 'Esteban Andres Murcia Acuña', 'mail@mail.com', 'pass', 'esteban389'),
(2, 'Andres Jesus', 'ajeu@mail.com', 'pass', 'Ajeu'),
(3, 'loaiza', 'loaiza@mail.com', 'pass', 'loaiza'),
(4, 'camila andrea', 'camidrea@mail.com', 'pass', 'camidrea');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`peli_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `peli_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
