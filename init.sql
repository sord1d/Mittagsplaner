CREATE TABLE speisen (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR (100) NOT NULL,
  bild VARCHAR (255) NOT NULL,
  datum DATE NOT NULL,
  anzahl INT (10) DEFAULT 0
);
