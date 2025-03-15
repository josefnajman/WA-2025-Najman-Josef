CREATE TABLE wa_test (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    age INT DEFAULT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);

INSERT INTO wa_test (user_name, user_surname, user_email, user_age) VALUES 
 ('Petr','Novák','petr@example.com',25), 
 ('Jana','Koutná','jana@example.com',30), 
 ('Jiří','Janota','jiri.janota@example.com',52), 
 ('Zbyněk','Hubáček','zbynek@example.com',54);