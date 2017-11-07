<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>Лабораторная работа №5</h2>
<h4 align="left">Задание</h4>
<p align="left"> Создайте функцию, которая принимает входные данные 'n' (целое число) и возвращает строку, которая является десятичное представление этого числа сгруппированное запятыми после каждых 3 цифр. Вы не можете решить задачу с помощью встроенной функции форматирования, которая может выполнить все
задачи самостоятельно.
	<div align="center"  width = "100%">
		
		<h4 align="left">Входящие данные</h4>
		<FORM method="POST" ACTION="index5.php" align="left" >
			<p align="left"> Введите значение числа</br>
				<input type="text" name="containNumberString" size="10"></input>
			
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> Результаты работы скрипта</h4>

	<p align="left"> Введено число
	
<?php function getFormatedString($enteredString)
{
	// иллюстрация принятия числа (в условии говорится, что задано число)
	$numericStringView = (float)$enteredString;
	$processingString = (string)$numericStringView;
	
	/*print_r("<p align='left'>");
	print_r($processingString);*/
	
	// дополняем строку справа пробелами до числа символов в строке кратного 3
	if (strlen($processingString) %3 == 1)	{$processingString = ' '.' '.$processingString;};
	if (strlen($processingString) %3 == 2)	{$processingString = ' '.$processingString;};
	
	/*print_r("<p align='left'>");
	print_r($processingString);*/
	
	// определяем число троек цифр в числе
	$symbolTrioCount = strlen($processingString) / 3;
	
	/*print_r("<p align='left'>");
	print_r($symbolTrioCount);*/
	
	$answerString = "";
	print_r("<p align='left'> Отражение процесса обработки строки, полученной из введенного числа ");

	// перебираем тройки цифр числа, формируя на их основе новую строку
	for($i=1; $i<=$symbolTrioCount; $i++)
	{
		// формируем строку, которая будет содержать преобразованное число
		if ($answerString == "") {$answerString = substr($processingString,0,3);}
		else {$answerString = $answerString.'.'.substr($processingString,0,3);};
		
		// вырезаем из исходной строки учтенную тройку символов
		if ($processingString != '') {$processingString = substr($processingString,3);};
		
		// вывод строки, иллюстрирующей процесс обработки, как он есть на донной итерации
		print_r("</br> номер итерации "); print_r($i);
		print_r(" строка ответа "); print_r($answerString);
		print_r(" исходная строка "); print_r($processingString);
		
		
	};
	
	return $answerString;
}


if(isset($_REQUEST['calculateButton'])) { 
	print_r("<p align='left'>");
	print_r($_REQUEST['containNumberString']);
	$formatedString = getFormatedString($_REQUEST['containNumberString']);
	print_r("<p align='left'> Полученный ответ");
	print_r("<p align='left'> ");
	print_r($formatedString);
?>
	
<?php } else { ?>
	Расчеты пока не выполнялись. Нажатие кнопки "Решить" не производилось
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>