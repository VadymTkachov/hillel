CREATE DEFINER=`root`@`localhost` PROCEDURE `user_add`(
	IN `user_name` VARCHAR(50),
	IN `user_surname` VARCHAR(50),
	IN `user_age` INT,
	IN `user_email` VARCHAR(50),
	IN `user_phone` VARCHAR(50)


)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
SQL SECURITY DEFINER
COMMENT 'Add user'
BEGIN
INSERT INTO hl_users (name,surname,age,email,phone) VALUES (user_name,user_surname,user_age,user_email,user_phone) ;
END