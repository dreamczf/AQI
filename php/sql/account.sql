CREATE TABLE account 
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	hashed_passwd VARCHAR(32) NOT NULL,
	timestamp TIMESTAMP NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);