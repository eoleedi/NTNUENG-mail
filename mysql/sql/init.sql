CREATE DATABASE IF NOT EXISTS `storage`; 
USE storage;
CREATE TABLE goods(
    `id` int(8) NOT NULL AUTO_INCREMENT,
    `cdate` date DEFAULT NULL,
    `senderUnit` varchar(255) NULL,
    `receiver` varchar(255) NULL,
    `receiveDateTime` datetime DEFAULT NULL,
    `signer` varchar(255) NULL,
    `mailType` varchar(255) NULL,
    `mailNumber` text NULL,
    `placementDateTime` datetime DEFAULT NULL,
    `placementLocation` varchar(255) NULL,

    `udate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE userdata(
	`id` int(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `hashed_password` VARCHAR(255) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;