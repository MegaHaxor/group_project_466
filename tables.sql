/*
DROP TABLE `Contains`;
DROP TABLE Eat;
DROP TABLE Weighs;
DROP TABLE Workout;
DROP TABLE Exercise;
DROP TABLE Chemical;
DROP TABLE Edible;
DROP TABLE `User`;
*/

CREATE TABLE `User` (
    accountId         INT UNSIGNED PRIMARY KEY,
    name              CHAR(15) NOT NULL,
    pass              CHAR(32) NOT NULL
);

CREATE TABLE Edible (
    edibleName        CHAR(15) PRIMARY KEY,
    amountServing     INT UNSIGNED,
    calsServing       INT UNSIGNED,
    gramsFat          INT UNSIGNED,
    gramsProtein      INT UNSIGNED,
    gramsCarbs        INT UNSIGNED,
    units             CHAR(15) NOT NULL,
    `type`            CHAR(8) NOT NULL
);

CREATE TABLE Exercise (
    exerciseName      CHAR(15),
    `type`            CHAR(20), 
    calsMinute        FLOAT UNSIGNED NOT NULL,

    PRIMARY KEY (exerciseName)
);

CREATE TABLE Chemical (
    chemName          CHAR(15) PRIMARY KEY,
    daily             INT UNSIGNED
);

CREATE TABLE Workout (
    accountID         INT UNSIGNED,
    exerciseName      CHAR(15),
    intensity         CHAR(6) NOT NULL,
    `length`          INT UNSIGNED NOT NULL,
    `dateTime`        DATETIME, -- date and time of the activity

    PRIMARY KEY (exerciseName, accountID, `datetime`),
    FOREIGN KEY (exerciseName) REFERENCES Exercise(exerciseName),
    FOREIGN KEY (accountID) REFERENCES `User`(accountID)
);

CREATE TABLE Weighs (
    accountID         INT UNSIGNED,
    `dateTime`        DATETIME,
    pounds            INT UNSIGNED NOT NULL,
    
    PRIMARY KEY (accountID, `dateTime`)
);

CREATE TABLE Eat (
    accountID         INT UNSIGNED,
    edibleName        CHAR(15),
    `dateTime`        DATETIME,
    amount            INT UNSIGNED NOT NULL,
    
    PRIMARY KEY (accountID, `datetime`, edibleName),
    FOREIGN KEY (accountID) REFERENCES `User`(accountID),
    FOREIGN KEY (edibleName) REFERENCES Edible(edibleName)
);

CREATE TABLE `Contains` (
    edibleName        CHAR(15),
    chemName          CHAR(15),
    amountChem        INT UNSIGNED NOT NULL,
    
    PRIMARY KEY (edibleName, chemName),
    FOREIGN KEY (edibleName) REFERENCES Edible(edibleName),
    FOREIGN KEY (chemName) REFERENCES Chemical(chemName)
);