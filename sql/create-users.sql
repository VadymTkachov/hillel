CREATE TABLE `hl_users` (
    `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `surname` varchar(30) NOT NULL,
    `age` smallint(2) UNSIGNED NOT NULL,
    `email` varchar(30) NOT NULL UNIQUE,
    `phone` varchar(20) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
);
