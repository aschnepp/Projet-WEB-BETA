SET GLOBAL local_infile = ON;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/regions-france.csv'
INTO TABLE regions
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/communes-departement-region.csv'
INTO TABLE cities
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(@col1,@col2,@col3,@col4,@col5,@col6,@col7,@col8,@col9,@col10,@col11,@col12,@col13,@col14,@col15) set city_name=@col10,postal_code=@col3,region_id=@col14;

UPDATE cities
SET postal_code = LPAD(postal_code,5,"0"); 

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/promotions.csv'
INTO TABLE promotions  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/address.csv'
INTO TABLE address  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/firms.csv'
INTO TABLE firms  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n' 
IGNORE 1 ROWS
(firm_id,firm_name,description_firm,website,logo,@var) 
SET inactif = (@var = 'true');

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/activity sectors.csv'
INTO TABLE activity_sectors 
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/offers.csv'
INTO TABLE offers  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(offer_id,description_offer,title,duration,remuneration,start_date,available_places,@var,address_id,firm_id) 
SET closed = (@var = 'true');

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/skills.csv'
INTO TABLE skills  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Users.csv'
INTO TABLE users  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/admins.csv'
INTO TABLE admins  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/campus.csv'
INTO TABLE campus  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/students.csv'
INTO TABLE students  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/tutors.csv'
INTO TABLE tutors  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Reviews.csv'
INTO TABLE Reviews  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Manages.csv'
INTO TABLE Manages  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Possesses.csv'
INTO TABLE Possesses  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Contains.csv'
INTO TABLE `Contains`  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(address_id, @cp) SET city_id = (SELECT city_id FROM cities WHERE postal_code = LPAD(@cp,5,"0") LIMIT 1);

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/is_about.csv'
INTO TABLE Is_about  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Looks_for.csv'
INTO TABLE Looks_for  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Is_at.csv'
INTO TABLE Is_at  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Wishlists.csv'
INTO TABLE Wishlists  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Candidates.csv'
INTO TABLE Candidates  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA LOCAL INFILE '/home/Guigui/Cours/A2/100 Blocs/004 Développement Web/Projet/Projet-WEB/BDD/Concerns.csv'
INTO TABLE Concerns  
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

SET GLOBAL local_infile = OFF;