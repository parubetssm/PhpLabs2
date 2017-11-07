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
	$forSearchingString = file_get_contents('words.txt');
	//print_r("<p align='left'>");print_r($forSearchingString);
	
	$lowRegistrAngrammString = strtolower($angrammString);
	$lowRegistrForSearchingString = strtolower($forSearchingString);
	$anagramStringLenth = strlen($lowRegistrAngrammString);
	
	if(strlen(trim($lowRegistrAngrammString)) <> 0)
	{
		$lowRegistrAngrammStringArray = str_split($lowRegistrAngrammString);
		asort($lowRegistrAngrammStringArray);
		$sortLowRegistrAngrammString = implode("", $lowRegistrAngrammStringArray);
		
		print_r("<p align='left'> Найденные анаграммы: ");
		
		for($i = 0; $i <= strlen($lowRegistrForSearchingString) - 1 - $anagramStringLenth; $i++)
		{
			$fileCopySubstring = substr($lowRegistrForSearchingString, $i, $anagramStringLenth);
			//print_r("<p align='left'>");print_r($i);print_r(" ");print_r($fileCopySubstring);
			$arrayForSearching = str_split($fileCopySubstring);
			asort($arrayForSearching);
			$sortLowRegistrForSearchingSubstring = implode("", $arrayForSearching);
			if (strcmp($sortLowRegistrForSearchingSubstring,$sortLowRegistrAngrammString) == 0)
			{
				//
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