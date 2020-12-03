DROP TABLE Sorter;
DROP TABLE Eats;
DROP TABLE Weighs;
DROP TABLE Workout;
DROP TABLE Exercise;
DROP TABLE Chemical;
DROP TABLE Tasty;
DROP TABLE `User`;


CREATE TABLE `User` (
    Userid            VARCHAR(26) PRIMARY KEY,
    name              CHAR(15) NOT NULL,
    pass              CHAR(32) NOT NULL
);

CREATE TABLE Tasty(
 TastyName varchar(26) NOT NULL, 
 CalsServing FLOAT(10,2) NOT NULL,
 GramsFat FLOAT(10,2), 
 GramsProtein FLOAT(10,2), 
 GramsCarbs FLOAT(10,2) ,
 Vitamin_d FLOAT(10,2),
 GramsCalcium FLOAT(10,2),
 GramsIron FLOAT(10,2), 
 GramsPotassium FLOAT(10,2), 
 
 PRIMARY KEY(TastyName)
);
 
CREATE TABLE Exercise (
    exerciseName      CHAR(15),
    `type`            CHAR(20), 
    calsHour          INT UNSIGNED NOT NULL,

    PRIMARY KEY (exerciseName)
);

CREATE TABLE Chemical (
    chemName          CHAR(15) PRIMARY KEY,
    daily             FLOAT(10,2) UNSIGNED
);

CREATE TABLE Workout (
    Userid            VARCHAR(26),
    exerciseName      CHAR(15),
    intensity         CHAR(6) NOT NULL,
    `length`          INT UNSIGNED NOT NULL,
    `dateTime`        DATETIME, -- date and time of the activity

    PRIMARY KEY (exerciseName, Userid, `datetime`),
    FOREIGN KEY (exerciseName) REFERENCES Exercise(exerciseName),
    FOREIGN KEY (Userid) REFERENCES `User`(Userid)
);

CREATE TABLE Weighs (
    Userid            VARCHAR(26),
    `dateTime`        DATETIME,
    pounds            INT UNSIGNED NOT NULL,
    
    PRIMARY KEY (Userid, `dateTime`)
);

CREATE TABLE Eats(
 EatsID int NOT NULL AUTO_INCREMENT,
 Userid varchar(26) NOT NULL, 
 TastyName varchar(26) NOT NULL, 
 AmountServing FLOAT(10,2) NOT NULL, 
 eating_date DATE NOT NULL, 
 
 PRIMARY KEY (EatsID), 
 FOREIGN KEY (Userid) REFERENCES `User`(Userid),
 FOREIGN KEY(TastyName) REFERENCES Tasty(TastyName)
);

-- used to display info on foods for a given user
CREATE TABLE Sorter(
 sortID int NOT NULL AUTO_INCREMENT,
 TastyName varchar(26) NOT NULL, 
 AmountServing FLOAT(10,2) NOT NULL,
 eating_date DATE NOT NULL,
 CalsServing FLOAT(10,2) NOT NULL, 
 GramsFat FLOAT(10,2), 
 GramsProtein FLOAT(10,2), 
 GramsCarbs FLOAT(10,2), 

 PRIMARY KEY(sortID),
 FOREIGN KEY(TastyName) REFERENCES Tasty(TastyName)
);