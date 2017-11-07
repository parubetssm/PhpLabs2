<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>Лабораторная работа №6</h2>
<h4 align="left">Задание</h4>
<p align="left">Devise a function that gets one word as parameter and returns all the anagrams for it from the file words.txt.

 "Anagram": An anagram is a type of word play, the result of rearranging the letters of a word or
phrase to produce a new word or phrase, using all the original letters exactly once; for example
orchestra can be rearranged into carthorse.

You can not use permutations to generate the possible words.

<p align="left"> anagrams("horse") should return:
['heros', 'horse', 'shore']

	<div align="center"  width = "100%">
		
		<h4 align="left">Входящие данные</h4>
		<FORM method="POST" ACTION="index6.php" align="left" >
			<p align="left"> Введите значение строки, для которой требуется искать анаграммы</br>
				<input type="text" name="anagrammString" size="25"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> Результаты работы скрипта</h4>

	<p align="left"> В текстовое поле вводится строка, анаграммы для которой будут разыскиваться. Защита от неправильного ввода строки не предусмотрена. Файл с данными находится в том же каталоге, что и файл данной страницы
	
	<p align="left"> Для примера можно выбрат любую строку, например abound
	
	<p align="left"> Введенная строка имеет вид:
	
<?php 
function getAllAnagrams($angrammString)
{
	// считываем текстовый файл в строковую переменную
	$forSearchingString = file_get_contents('words.txt');
	//print_r("<p align='left'>");print_r($forSearchingString);
	
	// сводим строки, в которой и по котрой будет вестись поиск анаграмм, к нижнему регистру символов
	$lowRegistrAngrammString = strtolower($angrammString);
	$lowRegistrForSearchingString = strtolower($forSearchingString);
	$anagramStringLenth = strlen($lowRegistrAngrammString);
	
	// защищаемся от пустой строки, по которой будет вестись поиск
	if(strlen(trim($lowRegistrAngrammString)) <> 0)
	{
		// если строка, для которой будут разыскиваться анаграммы, не пуста, то производим поиск
		// строка с информацией из файла сводится в массив, сортируется, сводится обратно к строке
		$lowRegistrAngrammStringArray = str_split($lowRegistrAngrammString);
		asort($lowRegistrAngrammStringArray);
		$sortLowRegistrAngrammString = implode("", $lowRegistrAngrammStringArray);
		
		print_r("<p align='left'> Найденные анаграммы: ");
		
		// из стоковой переменной, содержащей текст из файла, начинают вырезаться слова аналогичные по длине строке, по которой будет вестись поиск
		for($i = 0; $i <= strlen($lowRegistrForSearchingString) - 1 - $anagramStringLenth; $i++)
		{
			$fileCopySubstring = substr($lowRegistrForSearchingString, $i, $anagramStringLenth);
			//каждая полученная подстрока сводится к массиву, сортируется, сводится обратно к строке
			$arrayForSearching = str_split($fileCopySubstring);
			asort($arrayForSearching);
			$sortLowRegistrForSearchingSubstring = implode("", $arrayForSearching);
			// сравнение строки по которой ведется поиск, и подстроки, полученной из файла
			if (strcmp($sortLowRegistrForSearchingSubstring,$sortLowRegistrAngrammString) == 0)
			{
				// если строки одинаковы, то найдена анаграмма, выводим ее
				print_r("<p align='left'>Позиия ");print_r(" ");print_r($i);print_r(" ");print_r($fileCopySubstring);print_r("; ");
			};
		};
	};
};

if(isset($_REQUEST['calculateButton'])) { 
print_r("<p align='left'>");
print_r($_REQUEST['anagrammString']); print_r("\t");
$lenth = strlen($_REQUEST['anagrammString']);
print_r($lenth);

getAllAnagrams($_REQUEST['anagrammString']);

?>
	
<?php } else { ?>
	<p align='left'> Расчеты пока не выполнялись. Нажатие кнопки "Решить" не производилось
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>