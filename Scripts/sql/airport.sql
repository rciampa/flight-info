 
CREATE TABLE IF NOT EXISTS `airline` (
  `name` VARCHAR(27) NOT NULL COMMENT 'Name of airlines',
  `website` VARCHAR(45) NULL COMMENT 'Company FQDN',
  `phone` VARCHAR(14) NULL COMMENT 'Primary phone number',
  `updated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`))
ENGINE = InnoDB;

INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('Alaska Airlines', 'alaskaair.com', '800-252-7522');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('American Airlines', 'aa.com', '800-433-7300 ');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('Delta Air Lines', 'delta.com', '800-221-1212');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('Hawaiian Airlines', 'hawaiianair.com', '800-367-5320');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('JetBlue Airways', 'jetblue.com', '800-538-2583');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('Southwest Airlines', 'southwest.com', '800-435-9792');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('United Airlines', 'united.com', '800-864-8331');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('Virgin America', 'virginamerica.com', '877-359-8474');
INSERT INTO `airline` (`name`, `website`, `phone`) VALUES ('British Airways', 'britishairways.com', '800-247-9297');


CREATE TABLE IF NOT EXISTS `passenger` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first` VARCHAR(25) NOT NULL COMMENT 'First name',
  `last` VARCHAR(35) NOT NULL COMMENT 'Last name',
  `dob` DATE NOT NULL COMMENT 'Date of birth',
  `phone` VARCHAR(14) NOT NULL COMMENT 'Phoone number',
  `email` VARCHAR(45) NOT NULL COMMENT 'Email address',
  `updated` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Alfreds', 'Futterkiste', '12/8/1968', '310-538-6987', 'futt@aol.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Nancy', 'Davolio', '11/10/1973', '562-568-1489', 'davolio@live.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Andrew', 'Fuller', '2/19/1952', '818-698-3678', 'me456@gmail.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Janet', 'Leverling', '8/30/1963', '831-568-4587', 'jl@gmx.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Margaret', 'Peacock', '9/19/1958', '714-568-6542', 'peacock@hotmail.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Steven', 'Buchanan', '3/4/1955', '619-659-7891', 'buck@outlook.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Michael', 'Suyama', '7/2/1963', '602-965-4895', 'yama@apple.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Robert', 'King', '5/29/1960', '424-698-2569', 'king@live.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Laura', 'Callahan', '1/9/1958', '310-689-5987', 'callahan@earthlink.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Anne', 'Dodsworth', '7/2/1969', '626-698-2358', 'doda@gmail.com');
INSERT INTO `passenger` (`first`, `last`, `dob`, `phone`, `email`) VALUES ('Adam', 'West', '3/9/1991', '831-698-5897', 'awest@mindspring.com');



CREATE TABLE IF NOT EXISTS `aircraft` (
  `nNumber` VARCHAR(10) NOT NULL COMMENT 'Aircraft tail number',
  `make` VARCHAR(20) NULL COMMENT 'Manufaturer',
  `model` VARCHAR(45) NULL COMMENT 'Model number',
  `airlineId` VARCHAR(27) NULL COMMENT 'Airline ID and call sign',
  PRIMARY KEY (`nNumber`))
ENGINE = InnoDB;

INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N58746', 'Embraer', '190', 'jetblue');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N69578', 'Airbus', '321', 'jetblue');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N69875', 'Airbus', '320', 'jetblue');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N98654', 'Airbus', '321', 'jetblue');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N87954', 'Embraer', '190', 'jetblue');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N25698', 'Embraer', '190', 'jetblue');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N46897', 'Boeing', '737-300', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N26548', 'Boeing', '737-500', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N95687', 'Boeing', '737-500', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N35698', 'Boeing', '737-300', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N26125', 'Boeing', '737-300', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N99158', 'Boeing', '737-700', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03698', 'Boeing', '737-800', 'southwest');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03615', 'Airbus', 'A319', 'redwood');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03605', 'Airbus', 'A319', 'redwood');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03619', 'Airbus', 'A319', 'redwood');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N70615', 'Airbus', 'A320-200', 'redwood');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03617', 'Airbus', 'A320-200', 'redwood');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03991', 'Airbus', 'A320-200', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03087', 'Airbus', 'A320-100', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03887', 'Airbus', 'A321-200', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N13997', 'Airbus', 'A320-200', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03997', 'Boeing', '737-800', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03907', 'Boeing', '737-800', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03117', 'Boeing', '757-200', 'american');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03217', 'Boeing', '757-200', 'speedbird');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03127', 'Boeing', '757-400', 'speedbird');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03317', 'Boeing', '767-200', 'speedbird');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03107', 'Boeing', '777-200', 'speedbird');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03177', 'Boeing', '747-200', 'speedbird');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03999', 'Boeing', '737-200', 'alaska');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03990', 'Boeing', '737-200', 'alaska');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03919', 'Boeing', '737-900', 'alaska');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03929', 'Boeing', '737-800', 'alaska');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03949', 'Boeing', '737-800', 'united');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03969', 'Boeing', '737-300', 'united');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03499', 'Boeing', '757-300', 'united');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03429', 'Boeing', '757-300', 'united');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03439', 'Boeing', '767-300', 'united');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03049', 'Boeing', '767-300', 'delta');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03509', 'Boeing', '757-300', 'delta');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03549', 'Boeing', '737-300', 'delta');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03594', 'Boeing', '737-300', 'delta');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03449', 'Airbus', 'A319-200', 'delta');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N03459', 'Airbus', 'A319-200', 'delta');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N01999', 'Airbus', 'A330-200', 'hawaiian');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N01997', 'Airbus', 'A330-200', 'hawaiian');
INSERT INTO `aircraft` (`nNumber`, `make`, `model`, `airlineId`) VALUES ('N01909', 'Airbus', 'A339-200', 'hawaiian');
