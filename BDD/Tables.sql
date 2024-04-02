SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `users`;            
DROP TABLE IF EXISTS `tutors`;           
DROP TABLE IF EXISTS `skills`;           
DROP TABLE IF EXISTS `Contains`;         
DROP TABLE IF EXISTS `campus`;           
DROP TABLE IF EXISTS `offers`;           
DROP TABLE IF EXISTS `Reviews`;          
DROP TABLE IF EXISTS `Is_about`;         
DROP TABLE IF EXISTS `Manages`;          
DROP TABLE IF EXISTS `Wishlists`;        
DROP TABLE IF EXISTS `regions`;          
DROP TABLE IF EXISTS `students`;         
DROP TABLE IF EXISTS `firms`;            
DROP TABLE IF EXISTS `Looks_for`;        
DROP TABLE IF EXISTS `Concerns`;         
DROP TABLE IF EXISTS `admins`;           
DROP TABLE IF EXISTS `Candidates`;       
DROP TABLE IF EXISTS `cities`;           
DROP TABLE IF EXISTS `address`;          
DROP TABLE IF EXISTS `activity_sectors`; 
DROP TABLE IF EXISTS `Is_at`;            
DROP TABLE IF EXISTS `Possesses`;        
DROP TABLE IF EXISTS `promotions`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS promotions(
   promotion_id INT AUTO_INCREMENT,
   promotion_name VARCHAR(50)  NOT NULL,
   PRIMARY KEY(promotion_id)
);

CREATE TABLE IF NOT EXISTS address(
   address_id INT AUTO_INCREMENT,
   street_name VARCHAR(70)  NOT NULL,
   street_number VARCHAR(5) ,
   PRIMARY KEY(address_id)
);

CREATE TABLE IF NOT EXISTS firms(
   firm_id INT AUTO_INCREMENT,
   firm_name VARCHAR(50)  NOT NULL,
   description_firm TEXT,
   website TEXT ,
   logo TEXT,
   inactif BOOLEAN NOT NULL,
   PRIMARY KEY(firm_id)
);

CREATE TABLE IF NOT EXISTS activity_sectors(
   activity_sector_id INT AUTO_INCREMENT,
   activity_sector_name VARCHAR(50)  NOT NULL,
   PRIMARY KEY(activity_sector_id)
);

CREATE TABLE IF NOT EXISTS offers(
   offer_id INT AUTO_INCREMENT,
   description_offer TEXT,
   title VARCHAR(50)  NOT NULL,
   duration SMALLINT NOT NULL,
   remuneration DECIMAL(19,4) NOT NULL,
   start_date DATE NOT NULL,
   available_places SMALLINT NOT NULL,
   closed BOOLEAN NOT NULL,
   address_id INT NOT NULL,
   firm_id INT NOT NULL,
   PRIMARY KEY(offer_id),
   FOREIGN KEY(address_id) REFERENCES address(address_id),
   FOREIGN KEY(firm_id) REFERENCES firms(firm_id)
);

CREATE TABLE IF NOT EXISTS skills(
   skill_id INT AUTO_INCREMENT,
   skill_name VARCHAR(70)  NOT NULL,
   PRIMARY KEY(skill_id)
);

CREATE TABLE IF NOT EXISTS regions(
   region_id INT AUTO_INCREMENT,
   region_name VARCHAR(50)  NOT NULL,
   PRIMARY KEY(region_id)
);

CREATE TABLE IF NOT EXISTS users(
   user_id INT AUTO_INCREMENT,
   username VARCHAR(35)  NOT NULL,
   password TEXT  NOT NULL,
   email VARCHAR(50) ,
   surname VARCHAR(50)  NOT NULL,
   name VARCHAR(50)  NOT NULL,
   phone_number VARCHAR(25)  NOT NULL,
   birthdate DATE,
   picture TEXT,
   address_id INT NOT NULL,
   first_connection BOOLEAN DEFAULT 0,
   PRIMARY KEY(user_id),
   FOREIGN KEY(address_id) REFERENCES address(address_id)
);

CREATE TABLE IF NOT EXISTS admins(
   user_id INT,
   PRIMARY KEY(user_id),
   FOREIGN KEY(user_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS campus(
   campus_id INT AUTO_INCREMENT,
   campus_name VARCHAR(50)  NOT NULL,
   address_id INT NOT NULL,
   PRIMARY KEY(campus_id),
   FOREIGN KEY(address_id) REFERENCES address(address_id)
);

CREATE TABLE IF NOT EXISTS cities(
   city_id INT AUTO_INCREMENT,
   city_name VARCHAR(50)  NOT NULL,
   postal_code VARCHAR(10)  NOT NULL,
   region_id INT NOT NULL,
   PRIMARY KEY(city_id),
   FOREIGN KEY(region_id) REFERENCES regions(region_id)
);

ALTER TABLE cities  
  ADD CONSTRAINT unique_Combo UNIQUE(city_name , postal_code);

CREATE TABLE IF NOT EXISTS students(
   user_id INT,
   campus_id INT NOT NULL,
   promotion_id INT NOT NULL,
   PRIMARY KEY(user_id),
   FOREIGN KEY(user_id) REFERENCES users(user_id),
   FOREIGN KEY(campus_id) REFERENCES campus(campus_id),
   FOREIGN KEY(promotion_id) REFERENCES promotions(promotion_id)
);

CREATE TABLE IF NOT EXISTS tutors(
   user_id INT,
   campus_id INT NOT NULL,
   PRIMARY KEY(user_id),
   FOREIGN KEY(user_id) REFERENCES users(user_id),
   FOREIGN KEY(campus_id) REFERENCES campus(campus_id)
);

CREATE TABLE IF NOT EXISTS Reviews(
   user_id INT,
   firm_id INT,
   note DECIMAL(2,1)   NOT NULL,
   comment TEXT,
   PRIMARY KEY(user_id, firm_id),
   FOREIGN KEY(user_id) REFERENCES users(user_id),
   FOREIGN KEY(firm_id) REFERENCES firms(firm_id)
);

CREATE TABLE IF NOT EXISTS Manages(
   user_id INT,
   promotion_id INT,
   PRIMARY KEY(user_id, promotion_id),
   FOREIGN KEY(user_id) REFERENCES tutors(user_id),
   FOREIGN KEY(promotion_id) REFERENCES promotions(promotion_id)
);

CREATE TABLE IF NOT EXISTS Possesses(
   promotion_id INT,
   campus_id INT,
   PRIMARY KEY(promotion_id, campus_id),
   FOREIGN KEY(promotion_id) REFERENCES promotions(promotion_id),
   FOREIGN KEY(campus_id) REFERENCES campus(campus_id)
);

CREATE TABLE IF NOT EXISTS Contains(
   address_id INT,
   city_id INT,
   PRIMARY KEY(address_id, city_id),
   FOREIGN KEY(address_id) REFERENCES address(address_id),
   FOREIGN KEY(city_id) REFERENCES cities(city_id)
);

CREATE TABLE IF NOT EXISTS Is_about(
   firm_id INT,
   activity_sector_id INT,
   PRIMARY KEY(firm_id, activity_sector_id),
   FOREIGN KEY(firm_id) REFERENCES firms(firm_id),
   FOREIGN KEY(activity_sector_id) REFERENCES activity_sectors(activity_sector_id)
);

CREATE TABLE IF NOT EXISTS Looks_for(
   offer_id INT,
   skill_id INT,
   PRIMARY KEY(offer_id, skill_id),
   FOREIGN KEY(offer_id) REFERENCES offers(offer_id),
   FOREIGN KEY(skill_id) REFERENCES skills(skill_id)
);

CREATE TABLE IF NOT EXISTS Is_at(
   address_id INT,
   firm_id INT,
   PRIMARY KEY(address_id, firm_id),
   FOREIGN KEY(address_id) REFERENCES address(address_id),
   FOREIGN KEY(firm_id) REFERENCES firms(firm_id)
);

CREATE TABLE IF NOT EXISTS Wishlists(
   user_id INT,
   offer_id INT,
   PRIMARY KEY(user_id, offer_id),
   FOREIGN KEY(user_id) REFERENCES students(user_id),
   FOREIGN KEY(offer_id) REFERENCES offers(offer_id)
);

CREATE TABLE IF NOT EXISTS Candidates(
   user_id INT,
   offer_id INT,
   resume TEXT NOT NULL,
   application_letter TEXT,
   status VARCHAR(15)  NOT NULL,
   PRIMARY KEY(user_id, offer_id),
   FOREIGN KEY(user_id) REFERENCES students(user_id),
   FOREIGN KEY(offer_id) REFERENCES offers(offer_id)
);

CREATE TABLE IF NOT EXISTS Concerns(
   promotion_id INT,
   offer_id INT,
   PRIMARY KEY(promotion_id, offer_id),
   FOREIGN KEY(promotion_id) REFERENCES promotions(promotion_id),
   FOREIGN KEY(offer_id) REFERENCES offers(offer_id)
);
