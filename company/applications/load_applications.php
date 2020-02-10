<?php
$sql = "SELECT * FROM application WHERE forCompanyID=$requested_appli_id";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$byUserID = $row["byUserID"];
				$forCompanyID = $row["forCompanyID"];
				$forRank = $row["forRank"];
				$appli_status = $row["status"];
					}
		} else {
			echo("Keine Bewebungen gefunden!")
		}
		?>
