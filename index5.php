<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>������������ ������ �5</h2>
<h4 align="left">�������</h4>
<p align="left"> �������� �������, ������� ��������� ������� ������ 'n' (����� �����) � ���������� ������, ������� �������� ���������� ������������� ����� ����� ��������������� �������� ����� ������ 3 ����. �� �� ������ ������ ������ � ������� ���������� ������� ��������������, ������� ����� ��������� ���
������ ��������������.
	<div align="center"  width = "100%">
		
		<h4 align="left">�������� ������</h4>
		<FORM method="POST" ACTION="index5.php" align="left" >
			<p align="left"> ������� �������� �����</br>
				<input type="text" name="containNumberString" size="10"></input>
			
			<p align="center"> 
				<input type="submit" name="calculateButton" value="������"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> ���������� ������ �������</h4>

	<p align="left"> ������� �����
	
<?php function getFormatedString($enteredString)
{
	// ����������� �������� ����� (� ������� ���������, ��� ������ �����)
	$numericStringView = (float)$enteredString;
	$processingString = (string)$numericStringView;
	
	/*print_r("<p align='left'>");
	print_r($processingString);*/
	
	// ��������� ������ ������ ��������� �� ����� �������� � ������ �������� 3
	if (strlen($processingString) %3 == 1)	{$processingString = ' '.' '.$processingString;};
	if (strlen($processingString) %3 == 2)	{$processingString = ' '.$processingString;};
	
	/*print_r("<p align='left'>");
	print_r($processingString);*/
	
	// ���������� ����� ����� ���� � �����
	$symbolTrioCount = strlen($processingString) / 3;
	
	/*print_r("<p align='left'>");
	print_r($symbolTrioCount);*/
	
	$answerString = "";
	print_r("<p align='left'> ��������� �������� ��������� ������, ���������� �� ���������� ����� ");

	// ���������� ������ ���� �����, �������� �� �� ������ ����� ������
	for($i=1; $i<=$symbolTrioCount; $i++)
	{
		// ��������� ������, ������� ����� ��������� ��������������� �����
		if ($answerString == "") {$answerString = substr($processingString,0,3);}
		else {$answerString = $answerString.'.'.substr($processingString,0,3);};
		
		// �������� �� �������� ������ �������� ������ ��������
		if ($processingString != '') {$processingString = substr($processingString,3);};
		
		// ����� ������, �������������� ������� ���������, ��� �� ���� �� ������ ��������
		print_r("</br> ����� �������� "); print_r($i);
		print_r(" ������ ������ "); print_r($answerString);
		print_r(" �������� ������ "); print_r($processingString);
		
		
	};
	
	return $answerString;
}


if(isset($_REQUEST['calculateButton'])) { 
	print_r("<p align='left'>");
	print_r($_REQUEST['containNumberString']);
	$formatedString = getFormatedString($_REQUEST['containNumberString']);
	print_r("<p align='left'> ���������� �����");
	print_r("<p align='left'> ");
	print_r($formatedString);
?>
	
<?php } else { ?>
	������� ���� �� �����������. ������� ������ "������" �� �������������
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>