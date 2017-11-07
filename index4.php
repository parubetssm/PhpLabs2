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
		<FORM method="POST" ACTION="index4.php" align="left" >
			<p align="left"> Введите строку для заполнения массива, разделяя *елементы массива пробелами</br>
				<input type="text" name="arrayString" size="35"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
	
	<h4  align="left"> Порядок решения</h4>
		<p align='left'> Решал задачу долго, в перерывах между основной работой на коленке, зачастую не имея текста задачи под рукой. Обратив внимание на чертеж, почему-то уяснил, что вводимые числа обозначают крышу, а не углубления в ней. Исходя из этого стал решать именно такую чуть более сложную задачу. По заданному рельефу вычислить объем воды, который в этом рельефе может затеряться...
Таким образом, введенный массив - это не глубины, а вершины. Угол наклона крыши учесть не успеваю. Есть 2 варианта этого учета. В обеих случаях знаю как ... и это не трудно... но уже не успею...
		<h4  align="left"> Результаты работы скрипта</h4>
		

	
<?php 
function getArray($contentString)
{
	$_givenArray = explode(",",trim($contentString));
	
	$arraySize = count($_givenArray);
	
	$pools = array();
	
	if ($arraySize < 3)
	{
		$pools = array();
	}
	else
	{
		$poolStart = 0;
		$poolEnd = 1;
		
		// перебираем *елементы на предмет налиия правее них озер (pools); для каждого рассматриваемого
		//*елемента фиксируем начало озера (pool) справа от этого элемента
		while($poolStart <= $arraySize - 1)
		//	идем слева направо вдоль *елементов массива, рассматривая текущий и следующий *елемент
		{
			if($_givenArray[$poolStart] <= $_givenArray[$poolEnd])
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
				// может быть озеро: начинается низина. В *етом случае Идем в/Спускаемся в/исследуем область ниже рассматриваемого *елемента 
				// вплоть до нахождения правого берега
				echo "s";
				echo (string)$_givenArray[$poolStart]."(".(string)$poolStart.")"."|";
				// проброс до ближайшего минимума
				while(($poolEnd <= $arraySize - 1)&&($_givenArray[$poolEnd]<=$_givenArray[$poolEnd-1]))
				{
					echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
					$poolEnd++;
				};
				//echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
				$poolEnd--;
				// если проброс произошел до конца массива, то заканчиваем поиск луж
				if($poolEnd == $arraySize - 1) break; 
				$poolEndMax = $poolEnd;
				while(($poolEnd < $arraySize - 1) && ($_givenArray[$poolStart] > $_givenArray[$poolEnd + 1]))  //<=
				{
					echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
					echo "[".(string)$_givenArray[$poolEndMax]."(".(string)$poolEndMax.")"."]:";
					$poolEnd++;
					if($_givenArray[$poolEnd] > $_givenArray[$poolEndMax]) $poolEndMax = $poolEnd;
					
					
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
	
	// уточняем левые границы озер/лужь, считаем объем лужи
	print_r("<p align = 'left'> Найденные водоемы: ");
	foreach($pools as $pool)
	{
		//уточнение левой границы озера
		$rightBorder = $pool[1];
		$k = $pool[1] - 1;
		print_r("<p align='left'");print_r((string)$k);
		while(($_givenArray[$k] < $_givenArray[$rightBorder]) && ($k <> $pool[0]))
		{
			(int)$k--;
			print_r("<p align='left'");print_r((string)$k);
		};
		$pool[0] = $k;
		
		// выяснение нижнего берега озера
		if($_givenArray[$pool[0]] < $_givenArray[$pool[1]]){$minBorder = $pool[0];} else {$minBorder = $pool[1];};
		
		// нахождение плоского объема лужи (площади сечения лужи)
		(int)$s = 0;
		for($j = $pool[0] + 1; $j < $pool[1]; $j++)
		{
			$s = $s + $_givenArray[$minBorder] - $_givenArray[$j];
		};
		
		print_r("<p align = 'left'>");print_r("<p align = 'left'>");print_r((string)$_givenArray[$pool[0]]);print_r("[");print_r((string)$pool[0]);print_r("] - ");
		print_r((string)$_givenArray[$pool[1]]);print_r("[");print_r((string)$pool[1]);print_r("] : Объем ");print_r((string)$s);
		
	};
	
	
}

if(isset($_REQUEST['calculateButton'])) 
{ 
	print_r("<p align='left'> Введенная строка-заполнитель: "); print_r($_REQUEST['arrayString']); 	//print_r(" Длина массива "); print_r(count(explode(" ",trim($_REQUEST['arrayString'])))); 
	
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