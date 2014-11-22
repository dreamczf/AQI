CREATE TABLE receiver_type
(
	id INT,
	name VARCHAR(20),
	enabled TINYINT
);
use receiver_type;
INSERT INTO receiver_type (name, enabled) VALUES ("SMS", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("WECHAT", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("QQ", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("QQ GROUP", 1);
INSERT INTO receiver_type (name, enabled) VALUES ("EMAIL", 1);

CREATE TABLE receiver
(
	config_id INT,
	receiver_type_id INT,
	receiver VARCHAR(20)
)

CREATE TABLE timer
(
	id TINYINT,
	config_id INT,
	time TIME
)

CREATE TABLE day
(
	id TINYINT,
	name CHAR(3)
)
use day;
INSERT INTO day (id, name) VALUES (0, 'Mon');
INSERT INTO day (id, name) VALUES (1, 'Tue');
INSERT INTO day (id, name) VALUES (2, 'Wed');
INSERT INTO day (id, name) VALUES (3, 'Thu');
INSERT INTO day (id, name) VALUES (4, 'Fri');
INSERT INTO day (id, name) VALUES (5, 'Sat');
INSERT INTO day (id, name) VALUES (6, 'Sun');

CREATE TABLE timer_day
(
	timer_id INT,
	day_id INT
)
