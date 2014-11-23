CREATE TABLE receiver
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	receiver_type_id INT NOT NULL,
	receiver VARCHAR(20) NOT NULL,
	account_id INT UNSIGNED NOT NULL
);

CREATE TABLE receiver_type
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(20) NOT NULL,
	enabled TINYINT NOT NULL DEFAULT 1
);
INSERT INTO receiver_type (name, enabled) VALUES ("SMS", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("WECHAT", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("QQ", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("QQ GROUP", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("EMAIL", 1);
