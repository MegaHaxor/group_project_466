INSERT INTO User(accountID, name, pass)
    Values('1',
           'Dave',
           '1111');

INSERT INTO User(accountID, name, pass)
    Values('2',
           'Mike',
           '2222');

INSERT INTO User(accountID, name, pass)
    Values('3',
           'Mike',
           '3333');

INSERT INTO Weighs(accountID, dateTime, pounds)
    Values('1',
           '2020-11-1',
           '150');

INSERT INTO Weighs(accountID, dateTime, pounds)
    Values('1',
           '2020-11-2',
           '150');

INSERT INTO Weighs(accountID, dateTime, pounds)
    Values('1',
           '2020-11-3',
           '149');

INSERT INTO Weighs(accountID, dateTime, pounds)
    Values('1',
           '2020-11-4',
           '148');

INSERT INTO Exercise(exerciseName, type, calsMinute) 
    VALUES('Running',
           'Cardio',
           '120');

INSERT INTO Exercise(exerciseName, type, calsMinute)
    VALUES('Walking',
           'Cardio',
           '60');

INSERT INTO Exercise(exerciseName, type, calsMinute) 
    VALUES('Pushups',
           'bodyWeight',
           '80');

INSERT INTO Workout(accountID, exerciseName, intensity, length, dateTime)
    VALUES('1',
           'Running',
           'light',
           '50',
           '2020-11-1');

INSERT INTO Workout(accountID, exerciseName, intensity, length, dateTime)
    VALUES('1',
           'Walking',
           'normal',
           '60',
           '2020-11-2');

INSERT INTO Workout(accountID, exerciseName, intensity, length, dateTime)
    VALUES('1',
           'Pushups',
           'heavy',
           '10',
           '2020-11-3');

INSERT INTO Workout(accountID, exerciseName, intensity, length, dateTime)
    VALUES('2',
           'Running',
           'light',
           '70',
           '2020-11-1');

INSERT INTO Workout(accountID, exerciseName, intensity, length, dateTime)
    VALUES('2',
           'Walking',
           'normal',
           '100',
           '2020-11-2');

INSERT INTO Workout(accountID, exerciseName, intensity, length, dateTime)
    VALUES('2',
           'Pushups',
           'heavy',
           '50',
           '2020-11-3');

-- rest of data needs to change eventually
INSERT INTO Chemical(chemName, daily)
    VALUES('Calcium',
           '1300');

INSERT INTO Chemical(chemName, daily)
    VALUES('Vitamin A',
           '0.9');

INSERT INTO Chemical(chemName, daily)
    VALUES('Vitamin C',
           '90');

INSERT INTO Chemical(chemName, daily)
    VALUES('Cholesterol',
           '300');

INSERT INTO Chemical(chemName, daily)
    VALUES('Sodium',
           '2300');

INSERT INTO Edible(edibleName, amountServing, calsServing, gramsFat,
    gramsProtein, gramsCarbs, units, `type`)
    VALUES('Big Mac',
           '100',
           '550',
           '30',
           '25',
           '45',
           'grams',
           'food');

INSERT INTO Edible(edibleName, amountServing, calsServing, gramsFat,
    gramsProtein, gramsCarbs, units, `type`)
    VALUES('McChicken',
           '74',
           '400',
           '21',
           '14',
           '39',
           'grams',
           'food');

INSERT INTO Edible(edibleName, amountServing, calsServing, gramsFat,
    gramsProtein, gramsCarbs, units, `type`)
    VALUES('McNuggets',
           '73',
           '420',
           '25',
           '23',
           '25',
           'grams',
           'food');

INSERT INTO Contains(edibleName, chemName, amountChem)
    VALUES('Big Mac',
           'Calcium',
           '100');

INSERT INTO Contains(edibleName, chemName, amountChem)
    VALUES('McChicken',
           'Calcium',
           '20');

INSERT INTO Contains(edibleName, chemName, amountChem)
    VALUES('McNuggets',
           'Calcium',
           '20');

INSERT INTO Contains(edibleName, chemName, amountChem)
    VALUES('Big Mac',
           'Sodium',
           '1010');

INSERT INTO Contains(edibleName, chemName, amountChem)
    VALUES('McChicken',
           'Sodium',
           '560');

INSERT INTO Contains(edibleName, chemName, amountChem)
    VALUES('McNuggets',
           'Sodium',
           '840');

INSERT INTO Eat(accountID, edibleName, dateTime, amount)
    VALUES('1',
           'Big Mac',
           '2020-11-1 3:33',
           '100');

INSERT INTO Eat(accountID, edibleName, dateTime, amount)
    VALUES('1',
           'McChicken',
           '2020-11-1 8',
           '74');

INSERT INTO Eat(accountID, edibleName, dateTime, amount)
    VALUES('1',
           'McNuggets',
           '2020-11-1 13:10:25',
           '73');

INSERT INTO Eat(accountID, edibleName, dateTime, amount)
    VALUES('1',
           'Big Mac',
           '2020-11-2 3:33',
           '100');

INSERT INTO Eat(accountID, edibleName, dateTime, amount)
    VALUES('1',
           'McChicken',
           '2020-11-3 8',
           '74');

INSERT INTO Eat(accountID, edibleName, dateTime, amount)
    VALUES('1',
           'McNuggets',
           '2020-11-4 13:10:25',
           '73');