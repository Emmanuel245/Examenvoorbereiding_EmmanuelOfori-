-- De rest van de tables heb je hierboven staan

CREATE TABLE hours (
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	starts_at DATETIME NOT NULL,
	ends_at DATETIME NOT NULL,
	created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP,

	PRIMARY KEY(id),
	-- INDEX de dingen waarvan je denkt dat erop gezocht wordt
	INDEX(starts_at),
	INDEX(ends_at),
	INDEX(created_at),
	-- ON DELETE CASCADE betekent: "Zodra de user waar user_id naar wijst verwijderd is, verwijder deze rij dan ook"
	FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Default data in SQL heb je hieronder staan
