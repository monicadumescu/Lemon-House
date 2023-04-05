<?php
	$host = 'denismana.ddns.net';
	$user = 'denis';
	$pass = 'denis123';
	$database = 'questions';
	$conn = new mysqli($host, $user, $pass, $database);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$questionNewCount = $_POST['questionNewCount'];
	$sql= "SELECT * FROM questionstable LIMIT 1 OFFSET {$questionNewCount}";
	$result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
		$question_id = "ans" . "{$row['id_question']}";
		echo "{$row['name']}<br>";
		$sql_out2 = "SELECT * from answerstable WHERE id_question_a = {$row['id_question']}";
		$result_out2 = mysqli_query($conn, $sql_out2);
		while ($row2 = $result_out2->fetch_assoc()) {
			$name_answer = $row2['name_answer'];
			echo "<input type='radio' name={$question_id} id={$name_answer} value={$name_answer} required>";
			echo "<label for={$name_answer}>{$name_answer}</label><br>";
		}
	}
?>
		