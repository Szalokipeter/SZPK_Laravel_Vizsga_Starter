DROP DATABASE IF EXISTS spaceMissionsDB;

SET SQL_MODE = 'TRADITIONAL';

-- Adatbázis létrehozása
CREATE DATABASE spaceMissionsDB
    CHARACTER SET utf8
    COLLATE utf8_hungarian_ci;

-- Set default database
USE spaceMissionsDB;

DROP TABLE IF EXISTS space_agencies;
-- 'space_agencies' tábla létrehozása
CREATE TABLE space_agencies (
    _id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    country VARCHAR(100),
    founded YEAR
)
ENGINE = INNODB;

DROP TABLE IF EXISTS missions;
-- 'missions' tábla létrehozása (1:N kapcsolat a space_agencies táblával)
CREATE TABLE missions (
    _id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    agency_id INT NOT NULL,
    launch_date DATE,
    FOREIGN KEY (agency_id) REFERENCES space_agencies(_id) ON DELETE RESTRICT
)
ENGINE = INNODB;

DROP TABLE IF EXISTS mission_commanders;
-- 'mission_commanders' tábla létrehozása (1:1 kapcsolat a missions táblával)
CREATE TABLE mission_commanders (
    mission_id INT PRIMARY KEY,
    commander_name VARCHAR(100),
    experience_years INT,
    FOREIGN KEY (mission_id) REFERENCES missions(_id) ON DELETE RESTRICT
)
ENGINE = INNODB;

-- Adatok beszúrása a 'space_agencies' táblába
INSERT INTO space_agencies (_id, name, country, founded) VALUES
    (1, 'NASA', 'United States', 1958),
    (2, 'ESA', 'Europe', 1975),
    (3, 'Roscosmos', 'Russia', 1992),
    (4, 'ISRO', 'India', 1969),
    (5, 'CNSA', 'China', 1993);

-- Adatok beszúrása a 'missions' táblába (legalább 20 misszió)
INSERT INTO missions (_id, name, agency_id, launch_date) VALUES
    (1, 'Apollo 11', 1, '1969-07-16'),
    (2, 'Mars Express', 2, '2003-06-02'),
    (3, 'Soyuz MS-10', 3, '2018-10-11'),
    (4, 'Chandrayaan-2', 4, '2019-07-22'),
    (5, 'Tianwen-1', 5, '2020-07-23'),
    (6, 'Voyager 1', 1, '1977-09-05'),
    (7, 'Voyager 2', 1, '1977-08-20'),
    (8, 'Hubble Space Telescope', 1, '1990-04-24'),
    (9, 'Pioneer 10', 1, '1972-03-02'),
    (10, 'Pioneer 11', 1, '1973-04-05'),
    (11, 'Rosetta', 2, '2004-03-02'),
    (12, 'ExoMars', 2, '2016-03-14'),
    (13, 'Luna 2', 3, '1959-09-12'),
    (14, 'Luna 9', 3, '1966-01-31'),
    (15, 'Sputnik 1', 3, '1957-10-04'),
    (16, 'Gaganyaan', 4, '2024-08-15'),
    (17, 'Mangalyaan', 4, '2013-11-05'),
    (18, 'Tiangong', 5, '2011-09-29'),
    (19, 'Shenzhou 5', 5, '2003-10-15'),
    (20, 'Chang_e 4', 5, '2018-12-07');

-- Adatok beszúrása a 'mission_commanders' táblába
INSERT INTO mission_commanders (mission_id, commander_name, experience_years) VALUES
    (1, 'Neil Armstrong', 10),
    (2, 'Michael Foale', 15),
    (3, 'Alexey Ovchinin', 12),
    (4, 'Rakesh Sharma', 8),
    (5, 'Nie Haisheng', 20),
    (6, 'James Van Allen', 14),
    (7, 'Richard Truly', 16),
    (8, 'Edwin Hubble', 18),
    (9, 'Charles Hall', 12),
    (10, 'William Sjogren', 13),
    (11, 'Jean-Pierre Haigneré', 17),
    (12, 'Frank De Winne', 14),
    (13, 'Sergei Korolev', 20),
    (14, 'Georgy Grechko', 10),
    (15, 'Yuri Gagarin', 19),
    (16, 'Ravi Kumar', 7),
    (17, 'Ajay Sharma', 9),
    (18, 'Yang Liwei', 11),
    (19, 'Jing Haipeng', 15),
    (20, 'Liu Wang', 13);

-- Idegen kulcs hozzáadása az 'agency_id' mezőhöz
ALTER TABLE missions
ADD CONSTRAINT fk_agency FOREIGN KEY (agency_id) REFERENCES space_agencies(_id);
