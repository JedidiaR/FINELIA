<!DOCTYPE html>
<html>
<head>
	<title>TABLE <?php echo $this->table; ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Views/front.css">
</head>
<body>
	<form method="GET" action="">

		<table border="1" class="content-table">
			<tr class='content-row'>
				<?php

					foreach ($this->data as $key => $value) {
						echo "<th>$key</th>";
					}
					
				?>			

			</tr>

			<?php
					$req = "SELECT * FROM ".$this->table;
					$fetch = $this->db->query($req)or die("ERROR");

					while($row = $fetch->fetchArray()){
						echo "<tr>";
						foreach ($this->data as $key => $value) {
							
							echo "<td>".$row[$key]."</td>";
						}
						echo "</tr>";

					}
					
					
				?>
		</table>
	</form>



</body>
</html>