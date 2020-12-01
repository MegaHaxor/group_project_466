/*
start with what user ate
calculate how many servings they ate
match food up with its chemicals
calculate how much of chemical they ate
compare with daily value for the chemical
*/

SELECT date, SUM(chemIntake) intake,
  (SELECT daily from Chemical WHERE chemName='Calcium') recommended
  FROM (
    SELECT DATE(dateTime) `date`, chemName,
      -- next column is num of servings times chem amount per serving
      Eat.amount / Edible.amountServing * Contains.amountChem AS chemIntake
    -- join eat, edible, and `contains` tables together
    FROM Eat, Edible, `Contains`
    WHERE accountID = 1 AND 
      Eat.edibleName = Edible.edibleName AND
      Edible.edibleName = Contains.edibleName
) AS chemTrack
  WHERE chemName = 'calcium'
  GROUP BY date;