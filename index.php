<html>
	<head>
		<title>Расчет высоты треугольника</title>		
	</head>
	<body>
		<?php	
	    
		    $value1 = '';
			$value2 = '';
			$value3 = '';
			if (isset($_GET['value1'])) {
				$value1 = $_GET['value1'];
			}
			if (isset($_GET['value2'])) {
				$value2 = $_GET['value2'];
			}
			if (isset($_GET['value3'])) {
				$value3 = $_GET['value3'];
			}
		?>
		<img src="area_triangle.png" alt="Обозначение входных величин">		
		<p>Рассчет высоты <b>h</b> к стороне <b>а</b>: </p>
		<form action="index.php" method="GET">
			Сторона a:
			<input type="text" name="value1"
				value="<?= htmlspecialchars($value1)?>">
				<br><br>
			Сторона b:	
			<input type="text" name="value2"
				value="<?= htmlspecialchars($value2)?>">
				<br><br>
			Сторона c:
			<input type="text" name="value3"
				value="<?= htmlspecialchars($value3)?>">
				<br><br>
			<input type="submit" name="operation" value="Рассчитать высоту">			
		</form>
		<?php				
			// Проверка нажатия кнопки
			if (isset($_GET['operation'])) {
				// Проверка, чтобы были введены все три значения, причем числовые и больше нуля
				if (isset($_GET['value1']) && is_numeric($_GET['value1']) && ($_GET['value1'])>0 && isset($_GET['value2']) && is_numeric($_GET['value2']) && ($_GET['value2'])>0 && isset($_GET['value3']) && is_numeric($_GET['value3']) && ($_GET['value3'])>0){	
					//проверка на существавание треугольника (сумма двух любых сторон должна быть больше третьей)
					if ((($_GET['value1'])+($_GET['value2']))>($_GET['value3']) && (($_GET['value2'])+($_GET['value3']))>($_GET['value1']) && (($_GET['value1'])+($_GET['value3']))>($_GET['value2'])){	
						$P = 1/2*($_GET['value1']+$_GET['value2']+$_GET['value3']);
						$H = number_format((2*sqrt($P*($P-$_GET['value1'])*($P-$_GET['value2'])*($P-$_GET['value3'])))/$_GET['value1'],2, ',','');
						echo "Высота треугольника: $H";
					}else {
					echo "Треугольника с такими сторонами не существует";
					}			
				}
				else {
					echo "Проверьте корректность введенных данных!";
				}
			}			
		?>
	</body>
</html>