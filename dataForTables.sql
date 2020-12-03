INSERT INTO User(Userid, name, pass)
    Values('DaveA',
           'Dave',
           '1111');

INSERT INTO User(Userid, name, pass)
    Values('MikeB',
           'Mike',
           '2222');

INSERT INTO User(Userid, name, pass)
    Values('TomC',
           'Tom',
           '3333');

INSERT INTO User(Userid, name, pass)
    Values('Chrix',
           'Chris',
           '4444');

INSERT INTO Weighs(Userid, dateTime, pounds)
    Values('DaveA',
           '2020-11-1',
           '150');

INSERT INTO Weighs(Userid, dateTime, pounds)
    Values('DaveA',
           '2020-11-2',
           '150');

INSERT INTO Weighs(Userid, dateTime, pounds)
    Values('DaveA',
           '2020-11-3',
           '149');

INSERT INTO Weighs(Userid, dateTime, pounds)
    Values('DaveA',
           '2020-11-4',
           '148');

INSERT INTO Exercise(exerciseName, type, calsHour) 
    VALUES('Running',
           'Cardio',
           '120');

INSERT INTO Exercise(exerciseName, type, calsHour)
    VALUES('Walking',
           'Cardio',
           '60');

INSERT INTO Exercise(exerciseName, type, calsHour) 
    VALUES('Pushups',
           'bodyWeight',
           '80');

INSERT INTO Workout(Userid, exerciseName, intensity, length, dateTime)
    VALUES('DaveA',
           'Running',
           'light',
           '50',
           '2020-11-1');

INSERT INTO Workout(Userid, exerciseName, intensity, length, dateTime)
    VALUES('DaveA',
           'Walking',
           'normal',
           '60',
           '2020-11-2');

INSERT INTO Workout(Userid, exerciseName, intensity, length, dateTime)
    VALUES('DaveA',
           'Pushups',
           'heavy',
           '10',
           '2020-11-3');

INSERT INTO Workout(Userid, exerciseName, intensity, length, dateTime)
    VALUES('MikeB',
           'Running',
           'light',
           '70',
           '2020-11-1');

INSERT INTO Workout(Userid, exerciseName, intensity, length, dateTime)
    VALUES('MikeB',
           'Walking',
           'normal',
           '100',
           '2020-11-2');

INSERT INTO Workout(Userid, exerciseName, intensity, length, dateTime)
    VALUES('MikeB',
           'Pushups',
           'heavy',
           '50',
           '2020-11-3');

INSERT INTO Chemical(chemName, daily)
    VALUES('Calcium',
           '130');

INSERT INTO Chemical(chemName, daily)
    VALUES('Vitamin D',
           '62.9');

INSERT INTO Chemical(chemName, daily)
    VALUES('Iron',
           '90');

INSERT INTO Chemical(chemName, daily)
    VALUES('Potassium',
           '300');

INSERT INTO Tasty (TastyName,CalsServing,GramsFat,GramsProtein,GramsCarbs,Vitamin_d,GramsCalcium,GramsIron,GramsPotassium) 
 values("Spaghetti",175.5,10,10.2,15.5,20.1,25.5,30.3,35.5);

INSERT INTO Eats(Userid,TastyName,AmountServing,eating_date)
 values("Chrix","Spaghetti",1.25,'2020-10-02');
 
INSERT INTO Eats(Userid,TastyName,AmountServing,eating_date)
 values("Chrix","Spaghetti",2.2,'2020-10-02');
