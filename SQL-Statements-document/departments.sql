-- De rest van je tabellen heb je hierboven

CREATE TABLE departments (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(255) NOT NULL UNIQUE,
	post_code VARCHAR(6) NOT NULL, -- Als je alle postcode opslaat als 0000AA, dan hoeft dit nooit langer te zijn dan 6 karakters!
	city VARCHAR(255) NOT NULL,
	street VARCHAR(255) NOT NULL,
	number INT NOT NULL,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY (id),
	INDEX(name),
	UNIQUE(post_code, city, street, number) -- Dit betekent dat elke combinatie van postcode+plaats+straat+nummer maximaal één keer voor mag komen
);

CREATE TABLE department_user (
	department_id INT NOT NULL,
	user_id INT NOT NULL,

	FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
	UNIQUE(department_id, user_id)
);

-- De rest van je INSERTS heb je hiertussen

INSERT INTO departments (name, post_code, city, street,number)
VALUES
	("West", "1000RB", "Hamsterdam", "Barbaralaan", 8),
	("Zuidoost", "1100RN", "Hamsterdam", "Ravenkooi", 14);
