--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.3.148.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 07.05.2018 16:10:19
-- Версия сервера: 5.5.5-10.1.19-MariaDB
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE mtt;

--
-- Удалить таблицу "user"
--
DROP TABLE IF EXISTS user;

--
-- Установка базы данных по умолчанию
--
USE mtt;

--
-- Создать таблицу "user"
--
CREATE TABLE user (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  username varchar(50) DEFAULT NULL,
  auth_key char(32) NOT NULL,
  password_hash varchar(60) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы user
--
INSERT INTO user VALUES
(1, 'test', 'fb469d7ef430b0baf0cab6c436e70375', '9f644a872d0fc4bca17796e14f177f06');
-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
