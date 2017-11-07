<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>Лабораторная работа №2</h2>
<h4 align="left">Задание</h4>
<p align="left"> Напишите на PHP функцию, получающую на входе строку, содержащую математическое выражение в обратной польской нотации (например, «5 8 3 + *»), и возвращающую значение этого выражения (в примере — 55). 
	<div align="center"  width = "100%">
		
		<h4 align="left">Входящие данные</h4>
		<FORM method="POST" ACTION="index2.php" align="left" >
			<p align="left"> Введите значение строки, разделяя числа и знаки математических оераций пробелами</br>
				<input type="text" name="polishNotationString" size="10"></input>
			
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> Результаты работы скрипта</h4>

	<p align="left"> Введена строка формата польской записи (мусорные символы отличные от тех, из которых состоит число, и символов {*,-,+,/,} будут игнорироваться). Т.е. число из чисто мусорных символов будет восприниматься как 0. Защита от неправильного ввода строки не предусмотрена. Введенная строка имеет вид:
	
<?php if(isset($_REQUEST['calculateButton'])) { 
print_r("<p align='left'>");
print_r($_REQUEST['polishNotationString']);

function getPolandNotationString($enteredString)
{
	$_givenArray = explode(" ",$enteredString);

	if ($_givenArray[0] == "-")
	{
		// Удаляем "-" - первый элемент массива
		array_shift($_givenArray);
		/*print_r($_givenArray); print_r('</br>');*/
		// Запиминаем второй элемент массива, удалив его из массива
		$tempThirdElement = array_shift($_givenArray);
		// Добавляем элементы в массив, добиваясь нахождения "-" справа от цифр: защита от пустого стека
		array_unshift($_givenArray,'-');
		/*print_r($_givenArray); print_r('</br>');*/
		array_unshift($_givenArray,$tempThirdElement);
		/*print_r($_givenArray); print_r('</br>');*/
		array_unshift($_givenArray,'0');
		/*print_r($_givenArray); print_r('</br>');*/
	};

	print_r("<p align='left'>Массив, принимающий введенную строку:"); print_r('</br>');
	print_r($_givenArray); print_r('</br>');

	$_steckArray = array();
	$_operationSymbolArray = array('*','/','+','-');

	print_r("<p align='left'>Порядок обработки:"); print_r('</br>');
	echo '<table border="1">';
	echo '<td>'; print_r("Извлекаемый элемент");	echo '</td>';
	echo '<td>'; print_r("Исходный массив после извлечения");				echo '</td>';
	echo '<td>'; print_r("Стек после добавления извлекаемого элемента");				echo '</td>';
	while(count($_givenArray) > 0)
	{
		echo '<tr>';
		$shiftingArrayElement = array_shift($_givenArray);
		/*print_r($shiftingArrayElement.'</br>');*/
		if (! in_array($shiftingArrayElement,$_operationSymbolArray))
		{
			array_push($_steckArray,(float)$shiftingArrayElement);
		}
		else
		{
			$variableForCalculate1 = array_pop($_steckArray);
			$variableForCalculate2 = array_pop($_steckArray);
			
			switch($shiftingArrayElement) 
			{
				case "*": $calculateResult = $variableForCalculate1 * $variableForCalculate2; break;
				case "/": $calculateResult = $variableForCalculate1 / $variableForCalculate2; break;
				case "+": $calculateResult = $variableForCalculate1 + $variableForCalculate2; break;
				case "-": $calculateResult = $variableForCalculate1 - $variableForCalculate2; break;
			}
			
			array_push($_steckArray,$calculateResult);
			/*print_r($_steckArray);*/
		}
		echo '<td>'; print_r($shiftingArrayElement);	echo '</td>';
		echo '<td>'; print_r($_givenArray);				echo '</td>';
		echo '<td>'; print_r($_steckArray);				echo '</td>';
		echo '</tr>';	
	}
	echo '</table>';
}

getPolandNotationString($_REQUEST['polishNotationString']);

?>
	
<?php } else { ?>
	Расчеты пока не выполнялись. Нажатие кнопки "Решить" не производилось
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>