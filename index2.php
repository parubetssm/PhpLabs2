<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>������������ ������ �2</h2>
<h4 align="left">�������</h4>
<p align="left"> �������� �� PHP �������, ���������� �� ����� ������, ���������� �������������� ��������� � �������� �������� ������� (��������, �5 8 3 + *�), � ������������ �������� ����� ��������� (� ������� � 55). 
	<div align="center"  width = "100%">
		
		<h4 align="left">�������� ������</h4>
		<FORM method="POST" ACTION="index2.php" align="left" >
			<p align="left"> ������� �������� ������, �������� ����� � ����� �������������� ������� ���������</br>
				<input type="text" name="polishNotationString" size="10"></input>
			
			<p align="center"> 
				<input type="submit" name="calculateButton" value="������"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> ���������� ������ �������</h4>

	<p align="left"> ������� ������ ������� �������� ������ (�������� ������� �������� �� ���, �� ������� ������� �����, � �������� {*,-,+,/,} ����� ��������������). �.�. ����� �� ����� �������� �������� ����� �������������� ��� 0. ������ �� ������������� ����� ������ �� �������������. ��������� ������ ����� ���:
	
<?php if(isset($_REQUEST['calculateButton'])) { 
print_r("<p align='left'>");
print_r($_REQUEST['polishNotationString']);

function getPolandNotationString($enteredString)
{
	$_givenArray = explode(" ",$enteredString);

	if ($_givenArray[0] == "-")
	{
		// ������� "-" - ������ ������� �������
		array_shift($_givenArray);
		/*print_r($_givenArray); print_r('</br>');*/
		// ���������� ������ ������� �������, ������ ��� �� �������
		$tempThirdElement = array_shift($_givenArray);
		// ��������� �������� � ������, ��������� ���������� "-" ������ �� ����: ������ �� ������� �����
		array_unshift($_givenArray,'-');
		/*print_r($_givenArray); print_r('</br>');*/
		array_unshift($_givenArray,$tempThirdElement);
		/*print_r($_givenArray); print_r('</br>');*/
		array_unshift($_givenArray,'0');
		/*print_r($_givenArray); print_r('</br>');*/
	};

	print_r("<p align='left'>������, ����������� ��������� ������:"); print_r('</br>');
	print_r($_givenArray); print_r('</br>');

	$_steckArray = array();
	$_operationSymbolArray = array('*','/','+','-');

	print_r("<p align='left'>������� ���������:"); print_r('</br>');
	echo '<table border="1">';
	echo '<td>'; print_r("����������� �������");	echo '</td>';
	echo '<td>'; print_r("�������� ������ ����� ����������");				echo '</td>';
	echo '<td>'; print_r("���� ����� ���������� ������������ ��������");				echo '</td>';
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
	������� ���� �� �����������. ������� ������ "������" �� �������������
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>