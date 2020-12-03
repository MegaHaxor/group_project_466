<?php 
	function draw_table($table) {
		echo "<table border=1 cellspacing=1>";
		echo "<tr>";
		foreach($table[0] as $key => $item) {
			echo "<th>$key</th>";
		}
		echo "</tr>";
		foreach($table as $row) {
			echo "<tr>";
			foreach($row as $cell) {
				echo "<td>$cell</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function makepdo() {
		try {
			$dsn = "mysql:host=courses;dbname=z1880484";
			$pdo = new PDO($dsn, "z1880484", "2000Nov16");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;
		}
		catch(PDOexception $e) {
			echo "Connection to database failed: " . $e->getMessage();
		}
	}

	function draw_sql_table($pdo, $tablename) {
		$rs = $pdo->query("SELECT * FROM $tablename;");
		$rs = $rs->fetchAll(PDO::FETCH_ASSOC);
		draw_table($rs);
	}



	?>
