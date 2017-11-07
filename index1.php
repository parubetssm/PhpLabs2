<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>Лабораторная работа №1</h2>
<h4 align="left">Задание</h4>
<p align="left"> 1.	Обменять значения двух переменных без использования третьей. 
	<div align="center"  width = "100%">
		
		<h4 align="left">Входящие данные</h4>
		<FORM method="POST" ACTION="index.php" align="left" >
			<p align="left"> Введите значение 1-й переменной </br>
				<input type="text" name="Variable1" size="10"></input>
			<p align="left"> Введите значение 2-й переменной </br>
				<input type="text" name="Variable2" size="10"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="Решить"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> Результаты работы скрипта</h4>

	<p align="left"> Принцип: любая перменная сводится к строковому типу, знаения обмениваются как *ето приведено ниже. Затем тип переменных восстанавливается

<?php if(isset($_REQUEST['calculateButton'])) { 
echo '<p align="left">ИСХОДНОЕ Значение 1-й переменной '.$_REQUEST['Variable1'];
echo '<p align="left">ИСХОДНОЕ Значение 2-й переменной '.$_REQUEST['Variable2'];
$_REQUEST['Variable1'] = $_REQUEST['Variable1'].$_REQUEST['Variable2'];
 echo '<p align="left">ПРОМЕЖУТОЧНОЕ Значение 1-й переменной '.$_REQUEST['Variable1']; 
$_REQUEST['Variable2'] = substr($_REQUEST['Variable1'],0,strlen($_REQUEST['Variable1'])-strlen($_REQUEST['Variable2']));
$_REQUEST['Variable1'] = substr($_REQUEST['Variable1'],strlen($_REQUEST['Variable2']));
echo '<p align="left" style="color:green">ИТОГОВОЕ Значение 1-й переменной '.$_REQUEST['Variable1'];
echo '<p align="left" style="color:green">ИТОГОВОЕ Значение 2-й переменной '.$_REQUEST['Variable2'];
?>
	
<?php } else { ?>
	Расчеты пока не выполнялись. Нажатие кнопки "Решить" не производилось
	йййййРасчеты пока не выполнялись. Нажатие кнопки Решить не производилось
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>