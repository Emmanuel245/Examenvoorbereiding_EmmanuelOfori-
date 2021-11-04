CREATE DATABASE finalproject;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) UNIQUE NOT NULL,
email VARCHAR(255) NOT NULL,
password varchar(255) NOT NULL,
created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE locatie (
locatieid INT(6) AUTO_INCREMENT PRIMARY KEY,
locatienaam VARCHAR(255) NOT NULL
);

CREATE TABLE product (
productid INT(11) AUTO_INCREMENT PRIMARY KEY,
productnaam VARCHAR(255) NOT NULL,
type VARCHAR(255) NOT NULL,
fabriek VARCHAR(255) NOT NULL,
prijs decimal(6.2) NOT NULL
);

CREATE TABLE bestellijst (
datum date,
productid INT(11) NOT NULL,
locatieid INT (11) NOT NULL,
mininumaantal INT(11) NOT NULL,
Aantal_te_bestellen INT(11) NOT NULL,
PRIMARY KEY (datum),
CONSTRAINT FK_productid FOREIGN KEY (productid)
REFERENCES product(productid),
CONSTRAINT FK_locatieid FOREIGN KEY (locatieid)
REFERENCES locatie(locatieid)
);

CREATE TABLE waardevoorraad (
datum date,
productid INT(11) NOT NULL,
locatieid INT (11) NOT NULL,
aantal INT(11) NOT NULL,
waarde_inkoop INT(11) NOT NULL,
waarde_verkoop INT(11) NOT NULL,
PRIMARY KEY (datum),
CONSTRAINT FK1_productid FOREIGN KEY (productid)
REFERENCES product(productid),
CONSTRAINT FK1_locatieid FOREIGN KEY (locatieid)
REFERENCES locatie(locatieid)
);

INSERT INTO `locatie` (`locatieid`, `locatienaam`) VALUES (NULL, 'Amsterdam');

INSERT INTO `product` (`productid`, `productnaam`, `type`, `fabriek`, `prijs`) VALUES (NULL, 'Oude kaas', 'Kaas', 'Kaasland', '5,25');

INSERT INTO `bestellijst` (`datum`, `productid`, `locatieid`, `mininumaantal`, `Aantal_te_bestellen`) VALUES ('2021-10-29', '1', '1', '20', '30');







