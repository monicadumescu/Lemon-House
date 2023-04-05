<?php
			$host = 'denismana.ddns.net';
			$user = 'denis';
			$pass = 'denis123';
			$database = 'questions';
			$conn = new mysqli($host, $user, $pass, $database);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$questionnr = $_SESSION['questions'];
			$sql_out = "SELECT name from questionstable WHERE id_question = $questionnr";
			
			$result_out = mysqli_query($conn, $sql_out);
			while ($row = $result_out->fetch_assoc()) {
				echo "sunt aici";
				$question_id = "ans" . "{$row['id_question']}";
				echo "{$row['name']}<br><br>";
				$sql_out2 = "SELECT * from answerstable WHERE id_question_a = $questionnr";
				$result_out2 = mysqli_query($conn, $sql_out2);
				while ($row2 = $result_out2->fetch_assoc()) {
					$name_answer = $row2['name_answer'];
					echo "<input type='radio' name={$question_id} id={$name_answer} value={$name_answer} required>";
					echo "<label for={$name_answer}>{$name_answer}</label><br>";
				}
			}
		$_SESSION['questions'] = $_SESSION['questions'] + 1;
		echo $_SESSION['questions'];
		$conn->close();
?>
