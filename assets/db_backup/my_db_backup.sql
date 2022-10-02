#
# TABLE STRUCTURE FOR: accounts
#

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `class` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `accounts` (`username`, `password`, `class`, `date_created`) VALUES ('A11722988', 'qeqe', 'Student', '2022-05-20');
INSERT INTO `accounts` (`username`, `password`, `class`, `date_created`) VALUES ('K11721653', 'qeqe', 'Student', '2022-05-24');
INSERT INTO `accounts` (`username`, `password`, `class`, `date_created`) VALUES ('K11722987', 'kama', 'Student', '2022-05-12');
INSERT INTO `accounts` (`username`, `password`, `class`, `date_created`) VALUES ('K11724134', 'lee', 'Student', '2022-05-12');
INSERT INTO `accounts` (`username`, `password`, `class`, `date_created`) VALUES ('K11724480', 'thu', 'Faculty', '2022-05-11');


#
# TABLE STRUCTURE FOR: appointment
#

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `date_created` date NOT NULL,
  `date_appoint` date NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `appointment` (`date_created`, `date_appoint`, `guardian`, `contact_num`, `email`, `username`, `status`) VALUES ('2022-06-05', '2022-06-10', 'Marites Esteban', '+639759912345', 'iesteban.k11721653@umak.edu.ph', 'K11721653', 'On-going');
INSERT INTO `appointment` (`date_created`, `date_appoint`, `guardian`, `contact_num`, `email`, `username`, `status`) VALUES ('2022-06-05', '2022-06-08', 'Maricel Camarador', '+639759994896', 'jcamarador.k11722986@umak.edu.ph', 'K11722987', 'On-going');
INSERT INTO `appointment` (`date_created`, `date_appoint`, `guardian`, `contact_num`, `email`, `username`, `status`) VALUES ('2022-06-05', '2022-06-10', 'Andres Evangelista', '+639751115467', 'revangelista.k11724480@umak.edu.ph', 'K11724480', 'On-going');


#
# TABLE STRUCTURE FOR: consultation
#

DROP TABLE IF EXISTS `consultation`;

CREATE TABLE `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Bday` date NOT NULL,
  `guardian` varchar(100) NOT NULL,
  `contact_num` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `med_history` varchar(1000) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `bmi` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `pulse` varchar(50) NOT NULL,
  `respiration` varchar(50) NOT NULL,
  `blood_pressure` varchar(50) NOT NULL,
  `chief_complaint` varchar(1000) NOT NULL,
  `diagnosis` varchar(1000) NOT NULL,
  `treatment` varchar(1000) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (2, 'Student', '2022-05-25', 'Camarador', 'John Kenneth', 'Samson', 'Male', '2000-05-05', 'Maricel Camarador', '+639759994896', 'jcamarador.k11722986@umak.edu.ph', 'None', '60', '175', '19.59 - Normal Weight', '37.8', '70', '13', '110/70', 'Dizziness, Bleeding, Rashes, Insomia', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Lee Boiyah', 'K11722987', '2022-05-25');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (3, 'Student', '2022-05-25', 'Esteban', 'Israel', 'Vela', 'Male', '1999-11-24', 'Marites Esteban', '+639759912345', 'iesteban.k11721653@umak.edu.ph', 'Allergy (Food/Meds), Chicken Pox (Bulutong), Dengue Fever', '69', '178', '21.78 - Normal Weight', '37.8', '70', '13', '110/70', 'Fever, Cough, Head Ache, Nausea, Dizziness', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Lee Boiyah', 'K11721653', '2022-05-25');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (4, 'Student', '2022-05-25', 'Rebodos', 'Lee Rasheed', 'Macalma', 'Female', '2001-04-28', 'Jose Rebodos', '+639751115467', 'lrebodos.k11724134@umak.edu.ph', 'Allergy (Food/Meds), Mumps (Beke), Chicken Pox (Bulutong)', '80', '180', '24.69 - Normal Weight', '37.8', '70', '13', '110/70', 'Fever, Cough, Sore Throat, Head Ache', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11724134', '2022-05-25');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (6, 'Faculty', '2022-05-26', 'Evangelista', 'Russel', 'Sadural', 'Male', '2000-06-21', 'Andres Evangelista', '+639751115467', 'revangelista.k11724480@umak.edu.ph', 'Allergy (Food/Meds), Mumps (Beke), Epilepsy (Pangingisay), Typhoid Fever (Tipus)', '80', '178', '25.25 - Over Weight', '37.8', '70', '13', '110/70', 'Cough, Fatigue, Nausea', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11724480', '2022-05-26');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (7, 'Student', '2022-05-26', 'Rebodos', 'Lee Rasheed', 'Macalma', 'Female', '2001-04-28', 'Jose Rebodos', '+639751115467', 'leeboiyahmapagmahal@yahoo.com', 'Measles (Tigdas), Typhoid Fever (Tipus), Liver Disease, Diabetes Mellitus', '80', '180', '24.69 - Normal Weight', '37.8', '70', '13', '110/70', 'Fatigue, Nausea, Body Ache, Abdominal Pain', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11724134', '2022-05-26');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (8, 'Student', '2022-05-29', 'Camarador', 'John Kenneth', 'Samson', 'Male', '2000-05-05', 'Maricel Camarador', '+639759994896', 'jcamarador.k11722986@umak.edu.ph', 'Allergy (Food/Meds)', '60', '175', '19.59 - Normal Weight', '37.8', '70', '13', '110/70', 'None', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11722987', '2022-06-01');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (9, 'Faculty', '2022-05-29', 'Evangelista', 'Russel', 'Sadural', 'Male', '2000-06-21', 'Andres Evangelista', '+639751115467', 'revangelista.k11724480@umak.edu.ph', 'None', '60', '175', '19.59 - Normal Weight', '37.8', '70', '13', '110/70', 'Fever', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11724480', '2022-07-07');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (10, 'Student', '2022-06-05', 'Esteban', 'Israel', 'Vela', 'Male', '1999-11-24', 'Marites Esteban', '+639759912345', 'iesteban.k11721653@umak.edu.ph', 'None', '60', '175', '19.59 - Normal Weight', '37.8', '70', '13', '110/70', 'Nausea, Body Ache', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11721653', '2022-06-08');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (11, 'Student', '2022-06-05', 'Camarador', 'John Kenneth', 'Samson', 'Male', '2000-05-05', 'Maricel Camarador', '+639759994896', 'camaradorjk@yahoo.com', 'Hepa B, Liver Disease, Kidney Disease', '60', '175', '19.59 - Normal Weight', '37.8', '70', '13', '110/70', 'Cough', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11722987', '2022-06-15');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (12, 'Faculty', '2022-06-05', 'Evangelista', 'Russel', 'Sadural', 'Male', '2000-06-21', 'Lee Boiyah', '+639759994896', 'camaradorjk@yahoo.com', 'None', '60', '175', '19.59 - Normal Weight', '37.8', '70', '13', '110/70', 'Chest Pain, Abdominal Pain', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11724480', '2022-06-16');
INSERT INTO `consultation` (`id`, `class`, `date_created`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Bday`, `guardian`, `contact_num`, `email`, `med_history`, `weight`, `height`, `bmi`, `temp`, `pulse`, `respiration`, `blood_pressure`, `chief_complaint`, `diagnosis`, `treatment`, `doctor`, `username`, `date`) VALUES (13, 'Student', '2022-06-05', 'Esteban', 'Israel', 'Vela', 'Male', '1999-11-24', 'Marites Esteban', '+639759912345', 'iesteban.k11721653@umak.edu.ph', 'None', '80', '175', '26.12 - Over Weight', '37.8', '70', '13', '110/70', 'Fever', 'X-ray, blood tests', 'Antibiotics, Paracetamol', 'Dr. Israel Esteban', 'K11721653', '2022-06-08');


#
# TABLE STRUCTURE FOR: info_facul
#

DROP TABLE IF EXISTS `info_facul`;

CREATE TABLE `info_facul` (
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Bday` date NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `info_facul` (`LastName`, `FirstName`, `MiddleName`, `Department`, `Gender`, `Bday`, `username`) VALUES ('Evangelista', 'Russel', 'Sadural', 'Security', 'Male', '2000-06-21', 'K11724480');


#
# TABLE STRUCTURE FOR: info_stud
#

DROP TABLE IF EXISTS `info_stud`;

CREATE TABLE `info_stud` (
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `College` varchar(50) NOT NULL,
  `Course` varchar(50) NOT NULL,
  `YearLevel` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Bday` date NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `info_stud` (`LastName`, `FirstName`, `MiddleName`, `College`, `Course`, `YearLevel`, `Gender`, `Bday`, `username`) VALUES ('test', 'test', 'test', 'test', 'test', '1', 'Female', '2022-05-12', 'A11722988');
INSERT INTO `info_stud` (`LastName`, `FirstName`, `MiddleName`, `College`, `Course`, `YearLevel`, `Gender`, `Bday`, `username`) VALUES ('Esteban', 'Israel', 'Vela', 'CCIS', 'BSCDS', '3', 'Male', '1999-11-24', 'K11721653');
INSERT INTO `info_stud` (`LastName`, `FirstName`, `MiddleName`, `College`, `Course`, `YearLevel`, `Gender`, `Bday`, `username`) VALUES ('Camarador', 'John Kenneth', 'Samson', 'CCIS', 'BSCDS', '3', 'Male', '2000-05-05', 'K11722987');
INSERT INTO `info_stud` (`LastName`, `FirstName`, `MiddleName`, `College`, `Course`, `YearLevel`, `Gender`, `Bday`, `username`) VALUES ('Rebodos', 'Lee Rasheed', 'Macalma', 'CCIS', 'BSCDS', '5', 'Female', '2001-04-28', 'K11724134');


#
# TABLE STRUCTURE FOR: notification
#

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `isread` tinyint(1) NOT NULL,
  `reason` varchar(3000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (3, 'K11722987', '2022-05-25', 1, 'Your appointment on 2022-05-31 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (5, 'K11722987', '2022-05-25', 1, 'Your appointment on 2022-05-28 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (7, 'K11724134', '2022-05-25', 1, 'Your appointment on 2022-05-28 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (8, 'K11722987', '2022-05-26', 1, 'Your appointment on 2022-05-28 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (9, 'K11724480', '2022-05-28', 1, 'Your appointment on 2022-06-04 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (10, 'K11724480', '2022-05-28', 1, 'Your appointment on 2022-06-11 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (11, 'K11724480', '2022-05-28', 1, 'Your appointment on 2022-06-07 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (12, 'K11724480', '2022-05-28', 1, 'Your appointment on 2022-06-05 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (13, 'K11722987', '2022-05-28', 1, 'Your appointment on 2022-06-01 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (14, 'K11724480', '2022-05-28', 1, 'Your appointment on 2022-05-31 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (15, 'K11722987', '2022-05-28', 1, 'Your appointment on 2022-05-31 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (17, 'K11724480', '2022-05-29', 1, 'Your appointment on 2022-06-09 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (18, 'K11724480', '2022-05-29', 1, 'Your appointment on 2022-06-02 was declined. Reason: Fully booked.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (19, 'K11722987', '2022-05-29', 1, 'Your appointment on 2022-05-31 was declined. Reason: No available Doctors.', 0);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (20, 'K11721653', '2022-06-05', 1, 'Your appointment on 2022-06-08 was approved. You can visit the clinic between 8AM to 5PM.', 1);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (21, 'K11722987', '2022-06-05', 0, 'Your appointment on 2022-06-15 was approved. You can visit the clinic between 8AM to 5PM.', 1);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (22, 'K11724480', '2022-06-05', 0, 'Your appointment on 2022-06-16 was approved. You can visit the clinic between 8AM to 5PM.', 1);
INSERT INTO `notification` (`id`, `username`, `date`, `isread`, `reason`, `status`) VALUES (23, 'K11721653', '2022-06-05', 0, 'Your appointment on 2022-06-08 was approved. You can visit the clinic between 8AM to 5PM.', 1);


