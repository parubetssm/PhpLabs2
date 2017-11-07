<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>Лабораторная работа №4</h2>
<h4 align="left">Задание</h4>
<p align="left"> Есть крыша различной высоты. Картинка представлена массивом целых чисел, где индекс — это точка на оси X, а значение каждого индекса — это глубина крыши (значение по оси Y). Картинке выше соответствует массив [2,5,1,2,3,4,7,7,6].
<p align="left">Теперь представьте: идет дождь. Сколько воды соберется в «лужах» между пазами крыши? Мы считаем единицей объема воды квадратный блок 1х1. На картинке выше все, что расположено слева от точки 1, выплескивается. Вода справа от точки 7 также прольется. У нас остается лужа между 1 и 6 — таким образом, получившийся объем воды равен 10.
Ввести дополнительный угол в градусах, на который наклонена крыша (влево или вправо). 


	<div align="center"  width = "100%">
		
		<h4 align="left">Входящие данные</h4>
		<FORM method="POST" ACTION="index.php" align="left" >
			<p align="left"> Введите строку для заполнения массива, разделяя *елементы массива пробелами</br>
				<input type="text" name="arrayString" size="35"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> Результаты работы скрипта</h4>


	
<?php 
function getArray($contentString)
{
	$_givenArray = explode(" ",trim($contentString));
	
	$arraySize = count($_givenArray);
	
	$pools = array();
	
	//print_r($arraySize);print_r("yyyyyyy");print_r($_givenArray[0]);
	
	//if(count($_givenArray)<=2) ...
	
	
	if ($arraySize < 3)
	{
		$pools = array();
	}
	else
	{
		$poolStart = 0;
		$poolEnd = 1;
		
		// перебираем *елементы на предмет налиия правее них озер (pools); для каждого рассматриваемого
		//*елемента находим ближайшее озеро (pool) справа от него
		while($poolStart <= $arraySize - 1)
		//	идем слева направо вдоль *елементов массива, рассматривая текущий и следующий *елемент
		{
			// индекс *елемента области справа, лежащей ниже рассматриваемого *елемента
			//$poolEndMax = -1;
			
			if($_givenArray[$poolStart]<=$_givenArray[$poolEnd])
			// Если правее рассматриваемого *елемента находится *елемент выше (Идем в область выше), то озера правее
			// пока не намечается. В *етом слуае просто переходим к следующему *елементу
			{
				echo (string)$_givenArray[$poolStart]."(".(string)$poolStart.")"."->";
				if($poolStart < $arraySize - 2)
				{
					$poolStart++;
					$poolEnd++;
				}
				else
				{
					echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")";
					$poolStart = $arraySize;
					$poolEnd = $arraySize;
				};
				
			}
			else
			{	
				// Если правее рассматриваемого *елемента находится *елемент меньше/ниже, то правее
				// может быть озеро. В *етом случае Идем в/Спускаемся в/исследуем область ниже рассматриваемого *елемента 
				// вплоть до нахождения правого берега
				echo "s";
				echo (string)$_givenArray[$poolStart]."(".(string)$poolStart.")"."|";
				// проброс до минимума
				
				while(($poolEnd < $arraySize - 1)&&($_givenArray[$poolEnd]<=$_givenArray[$poolEnd-1]))
				{
					echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
					$poolEnd++;
				};
				//echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
				$poolEnd--;
				$poolEndMax = $poolEnd;
				while(($poolEnd < $arraySize - 1)&&($_givenArray[$poolStart] > $_givenArray[$poolEnd+1]))  //<=
				{
					echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
					echo "[".(string)$_givenArray[$poolEndMax]."(".(string)$poolEndMax.")"."]:";
					$poolEnd++;
					if($_givenArray[$poolEnd] > $_givenArray[$poolEndMax])$poolEndMax = $poolEnd;
					
					
				};
				echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
				echo "[".(string)$_givenArray[$poolEndMax]."(".(string)$poolEndMax.")"."]->";
				
				// Постобработка поиска/прохода до правого края озера		
				if($poolEnd == $arraySize - 1)
				//	Все *лементы правее рассматриваемого меньше *етого рассматриваемого *елемента
				{
					if($poolEndMax <> $poolStart + 1)
					//	правее рассматриваемого *елемента вплоть до конца массива область ниже, но есть максимум, т.е.
					//	найден правый край озера меньше рассматриваемого *елемента
					{
						$pool = array();
						array_push($pool,$poolStart);
						array_push($pool,$poolEndMax);
						array_push($pools,$pool);
						if ($poolEndMax < $arraySize - 2) 
						{
							$poolStart = $poolEndMax;
							$poolEnd = $poolStart + 1;
							echo "x";
						}
						else
						{
							// Вводим знаение, вынуждающее завершиться цикл перебора области ниже (внутренний цикл)
							$poolEnd = $arraySize;
							// Вводим знаение, вынуждающее завершиться цикл перебора рассматриваемых *елементов (внешний цикл)
							$poolStart = $arraySize;
							echo "y";
						};
					}
					else
					//	правее рассматриваемого *елемента идет снижение без максимумов до конца массива: 
					//	правый край у озера отсутствует
					{
						// Вводим знаение, вынуждающее завершиться цикл перебора области ниже (внутренний цикл)
						$poolEnd = $arraySize;
						// Вводим знаение, вынуждающее завершиться цикл перебора рассматриваемых *елементов (внешний цикл)
						$poolStart = $arraySize;
						echo "z";
					};
				}
				else //($poolEnd != $arraySize - 1))
				//	Правее рассматриваемого *елемента найден правый край озера больше рассматриваемого *елемента или равный ему
				{
					$pool = array();
					array_push($pool,$poolStart);
					array_push($pool,$poolEnd+1);
					array_push($pools,$pool);
					if ($poolEndMax < $arraySize - 2) 
					{
						$poolStart = $poolEnd + 1;
						$poolEnd = $poolStart + 1;
						echo "m";
					}
					else
					{
						// Вводим знаение, вынуждающее завершиться цикл перебора области ниже (внутренний цикл)
						$poolEnd = $arraySize;
						// Вводим знаение, вынуждающее завершиться цикл перебора рассматриваемых *елементов (внешний цикл)
						$poolStart = $arraySize;
						echo "mm";
					};
				};
			};
		};
	};
	print_r("<p align='left'");
	print_r($pools);
	
	// уточняем правые границы озер/лужь
	foreach($pools as $pool)
	{
		$leftBorder = $pool[1];
		for($i=$pool[1]-1; $i>=$pool[0]; $i--)
		{
			if ($_givenArray[$i] >= $leftBorder)
			{
				$leftBorder = $_givenArray[$i];
				break(1);
			};
		};
		$pool[0] = $leftBorder;
	};
	print_r("<p align='left'");
	print_r($pools);
	

	
}

if(isset($_REQUEST['calculateButton'])) 
{ 
	print_r("<p align='left'> Введенная строка-заполнитель: "); print_r($_REQUEST['arrayString']); 	print_r(" Длина массива "); print_r(count(explode(" ",trim($_REQUEST['arrayString'])))); 
	
	print_r("<p align='left'>");
	
	getArray($_REQUEST['arrayString']);
	
	
?>
	
<?php } else { ?>
	<p align="left"> Расчеты пока не выполнялись. Нажатие кнопки "Решить" не производилось
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>