CREATE TABLE system
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	region VARCHAR(30) NOT NULL,
	public_org VARCHAR(50) NOT NULL,
	update_time DATETIME NOT NULL,
	city_title VARCHAR(50) NOT NULL,
	pointer_title VARCHAR(50) NOT NULL,
	maps_title VARCHAR(50) NOT NULL,
	timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE city
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(30) NOT NULL,
	data_time DATE NOT NULL,
	aqi INT NOT NULL,
	aqi_level VARCHAR(20) NOT NULL,
	level_index TINYINT NOT NULL,
	max_poll VARCHAR(10) NOT NULL,
	color VARCHAR(10) NOT NULL,
	intro VARCHAR(100) NOT NULL,
	tips VARCHAR(100) NOT NULL,
);

CREATE TABLE pointer
(
	id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(30) NOT NULL,
	data_time DATE NOT NULL,
	aqi INT NOT NULL,
	aqi_level VARCHAR(20) NOT NULL,
	level_index TINYINT NOT NULL,
	max_poll VARCHAR(10) NOT NULL,
	color VARCHAR(10) NOT NULL,
	intro VARCHAR(100) NOT NULL,
	tips VARCHAR(100) NOT NULL,
	lng,
	lat
);

CREATE TABLE system_city
(
	system_id INT UNSIGNED NOT NULL;
	city_id INT UNSIGNED NOT NULL;
);

CREATE TABLE city_pointer
(
	city_id INT UNSIGNED NOT NULL;
	pointer_id INT UNSIGNED NOT NULL;
);
