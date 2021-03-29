CREATE TABLE `users` (
      `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `fullname` VARCHAR( 50 ) NOT NULL ,
      `foto` VARCHAR( 100 ) NOT NULL ,
      `email` VARCHAR( 100 ) NOT NULL ,
      `telephone` VARCHAR( 100 ) NOT NULL ,
      PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;