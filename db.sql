receiver_type
id, type, enabled

CREATE TABLE receiver_type
(
	id INT,
	type VARCHAR(20),
	enabled TINYINT
)

CREATE TABLE receiver
(
	config_id INT,
	receiver_type_id INT,
	receiver VARCHAR(20)
)

timer
id, config_id, time

day
id, name

timer_day
timer_id, day_id
