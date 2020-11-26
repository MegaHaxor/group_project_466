-- DROP TABLE `Contains`;
-- DROP TABLE Eat;
-- DROP TABLE Weighs;
-- DROP TABLE Workout;
-- DROP TABLE Exercise;
-- DROP TABLE Chemical;
-- DROP TABLE Edible;
-- DROP TABLE `User`;

CREATE TABLE `User` (
    accountId         INT PRIMARY KEY,
    name              CHAR(15),
    pass              CHAR(32)
);

CREATE TABLE Edible (
    edibleName        CHAR(15) PRIMARY KEY,
    amountServing     INT,
    calsServing       INT,
    gramsFat          INT,
    gramsProtein      INT,
    gramsCarbs        INT,
    units             CHAR(15),
    `type`            CHAR(8)
);

CREATE TABLE Exercise (
    exerciseName      CHAR(15),
    `type`            CHAR(20), 
    calsMinute        FLOAT,

    PRIMARY KEY (exerciseName)
);

CREATE TABLE Chemical (
    chemName          CHAR(15) PRIMARY KEY,
    daily             INT
);

CREATE TABLE Workout (
    accountID         INT,
    exerciseName      CHAR(15),
    intensity         CHAR(15),
    `length`          INT,
    `dateTime`        DATETIME, -- date and time of the activity

    PRIMARY KEY (exerciseName, accountID, `datetime`),
    FOREIGN KEY (exerciseName) REFERENCES Exercise(exerciseName),
    FOREIGN KEY (accountID) REFERENCES `User`(accountID)
);

CREATE TABLE Weighs (
    accountID         INT,
    `dateTime`        DATETIME,
    pounds            INT,
    
    PRIMARY KEY (accountID, `dateTime`)
);

CREATE TABLE Eat (
    accountID         INT,
    edibleName        CHAR(15),
    `dateTime`        DATETIME,
    amount            INT,
    
    PRIMARY KEY (accountID, `datetime`, edibleName),
    FOREIGN KEY (accountID) REFERENCES `User`(accountID),
    FOREIGN KEY (edibleName) REFERENCES Edible(edibleName)
);

CREATE TABLE `Contains` (
    edibleName        CHAR(15),
    chemName          CHAR(15),
    amountChem        INT,
    
    PRIMARY KEY (edibleName, chemName),
    FOREIGN KEY (edibleName) REFERENCES Edible(edibleName),
    FOREIGN KEY (chemName) REFERENCES Chemical(chemName)
);