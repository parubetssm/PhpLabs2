<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>Лабораторная работа №3</h2>
<h4 align="left">Задание</h4>
<p align="left"> Написать функцию с параметрами (“строка”, “положительное_число”), которая выводит строку змейкой в квадрат с длиной стороны “положительное_число”.
	<div align="center"  width = "100%">
		
		<h4 align="left">Входящие данные</h4>
		<FORM method="POST" ACTION="index3.php" align="left" >
			<p align="left"> Введите размерность массива</br>
				<input type="text" name="arraySize" size="10"></input>
			<p align="left"> Введите строку для заполнения массива</br>
				<input type="text" name="arrayContentString" size="10"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> Результаты работы скрипта</h4>

	<p align="left"> Введенная размерность массива: <?php if(isset($_REQUEST['arraySize'])) print_r($_REQUEST['arraySize']); ?>
	
	<p align="left"> Введенная строка-заполнитель: <?php if(isset($_REQUEST['arrayContentString']))print_r($_REQUEST['arrayContentString']); ?>
	
	<p align="left"> 
	
<?php function getArray($enteredMatrixSize,$contentString)
{
	$numericEnteredMatrixSize = (int)$enteredMatrixSize;
	
	//Объявление массива
	$arrayMatrix = array();
	
	// Пробное заполнение массива
	print_r("<p align='left'>Пробное заполнение массива: ");
	for($i=0; $i<=$numericEnteredMatrixSize-1; $i++)
	{
		//print_r("</br>");
		$arrayMatrixRow = array();
		for($k=0; $k<=$numericEnteredMatrixSize-1; $k++)
		{
			//print_r($i);print_r(" ");print_r($k);print_r("</br>");
			array_push($arrayMatrixRow, $i);
		};
		array_push($arrayMatrix,$arrayMatrixRow);
		
	};
	
	// Черновая Распечатка массива //print_r($arrayMatrix);
	print_r("<p align='left'><table>");
	for($i=0; $i<=$numericEnteredMatrixSize-1; $i++)
	{
		print_r("<tr>");
		for($k=0; $k<=$numericEnteredMatrixSize-1; $k++)
		{
			print_r("<td>");print_r($arrayMatrix[$i][$k]);print_r("</td>");
		};
		print_r("</tr>");
		
	};
	print_r("</table>");
	
	// Изменение массива, иллюстрация изменения
	print_r("<p align='left'> Иллюстрация процесса заполнения. Заполнение массива происходит по линиям. Каждая линия состоит из элементов, расположенных вертикально или горизонтально. Для каждой линии существует направление заполнения. Направление заполнения фактически соответствует направлению в змейке");
	print_r("<table><tr><td>Номер </br> линии</td><td>Длина </br> линии</td><td>Направление линии </br>1-вправо,2-вниз,</br>3-влево,0-вверх</td></tr>");
	// номер линии: 1,2,3...
	$numberLine = 0;
	// число элементов в линии
	$lineLenth = $numericEnteredMatrixSize; 
	// Индексы элементов массива для чистового заполнения
	$v = -1;
	$g = 0;
	$definedElementNumber = 0;
	while($lineLenth > 0)
	{
		$numberLine = $numberLine + 1;
		$priznakNapravlennosti = (int)$numberLine%4;
		//print_r($numberLine);print_r('  ');print_r($lineLenth);print_r('  ');print_r($priznakNapravlennosti);print_r('</br>');
		print_r("<tr><td>");print_r($numberLine);print_r("</td><td>");print_r($lineLenth);print_r("</td><td>");print_r($priznakNapravlennosti);print_r("</td></tr>");
		
		// Двигаемся по линии, заполняя относящиеся к ней элементы
		for($j=1; $j<=$lineLenth; $j++)
		{
			switch ($priznakNapravlennosti) 
			{
				case 1: $v++; break;
				case 2: $g++; break;
				case 3: $v--; break;
				case 0: $g--; break;
			};

			//$arrayMatrix[$g][$v] = $numberLine;
			$arrayMatrix[$g][$v] = substr($contentString,($definedElementNumber)%strlen($contentString),1);
			$definedElementNumber++;			
		};
		
		$priznakIzmeneniyaDliniLinii = (int)$numberLine%2;
		if ($priznakIzmeneniyaDliniLinii == 1) $lineLenth = $lineLenth - 1;
		
	};
	print_r("</table>");
	
	// Чистовая Распечатка массива //print_r($arrayMatrix);
	print_r("<p align='left'>Результат чистового заполнения:<table>");
	for($i=0; $i<=$numericEnteredMatrixSize-1; $i++)
	{
		print_r("<tr>");
		for($k=0; $k<=$numericEnteredMatrixSize-1; $k++)
		{
			print_r("<td>");print_r($arrayMatrix[$i][$k]);print_r("</td>");
		};
		print_r("</tr>");
		
	};
	print_r("</table>");
	
};


if(isset($_REQUEST['calculateButton'])) { 
	
	getArray($_REQUEST['arraySize'],$_REQUEST['arrayContentString']);
	
?>
	
<?php } else { ?>
	Расчеты пока не выполнялись. Нажатие кнопки "Решить" не производилось
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>