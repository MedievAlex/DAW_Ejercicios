-- --------------------------------------------------------
-- Ostalaria:                    127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Bertsioa:            12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for patronmvc
DROP DATABASE IF EXISTS `patronmvc`;
CREATE DATABASE IF NOT EXISTS `patronmvc` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `patronmvc`;

-- Dumping structure for taula patronmvc.personas
DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `edad` int(11) NOT NULL DEFAULT 0,
  `estatura` decimal(20,6) NOT NULL DEFAULT 0.000000,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Dumping data for table patronmvc.personas: ~5 rows (approximately)
INSERT INTO `personas` (`id`, `nombre`, `edad`, `estatura`) VALUES
	(1, 'Bruno', 16, 1.650000),
	(2, 'Adolfo', 54, 1.820000),
	(3, 'Olga', 32, 1.680000),
	(4, 'Sara', 15, 1.590000),
	(9, 'Lucas', 82, 1.730000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
