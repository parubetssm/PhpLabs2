<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>������������ ������ �3</h2>
<h4 align="left">�������</h4>
<p align="left"> �������� ������� � ����������� (��������, ��������������_�����), ������� ������� ������ ������� � ������� � ������ ������� ��������������_�����.
	<div align="center"  width = "100%">
		
		<h4 align="left">�������� ������</h4>
		<FORM method="POST" ACTION="index3.php" align="left" >
			<p align="left"> ������� ����������� �������</br>
				<input type="text" name="arraySize" size="10"></input>
			<p align="left"> ������� ������ ��� ���������� �������</br>
				<input type="text" name="arrayContentString" size="10"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="������"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> ���������� ������ �������</h4>

	<p align="left"> ��������� ����������� �������: <?php if(isset($_REQUEST['arraySize'])) print_r($_REQUEST['arraySize']); ?>
	
	<p align="left"> ��������� ������-�����������: <?php if(isset($_REQUEST['arrayContentString']))print_r($_REQUEST['arrayContentString']); ?>
	
	<p align="left"> 
	
<?php function getArray($enteredMatrixSize,$contentString)
{
	$numericEnteredMatrixSize = (int)$enteredMatrixSize;
	
	//���������� �������
	$arrayMatrix = array();
	
	// ������� ���������� �������
	print_r("<p align='left'>������� ���������� �������: ");
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
	
	// �������� ���������� ������� //print_r($arrayMatrix);
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
	
	// ��������� �������, ����������� ���������
	print_r("<p align='left'> ����������� �������� ����������. ���������� ������� ���������� �� ������. ������ ����� ������� �� ���������, ������������� ����������� ��� �������������. ��� ������ ����� ���������� ����������� ����������. ����������� ���������� ���������� ������������� ����������� � ������");
	print_r("<table><tr><td>����� </br> �����</td><td>����� </br> �����</td><td>����������� ����� </br>1-������,2-����,</br>3-�����,0-�����</td></tr>");
	// ����� �����: 1,2,3...
	$numberLine = 0;
	// ����� ��������� � �����
	$lineLenth = $numericEnteredMatrixSize; 
	// ������� ��������� ������� ��� ��������� ����������
	$v = -1;
	$g = 0;
	$definedElementNumber = 0;
	while($lineLenth > 0)
	{
		$numberLine = $numberLine + 1;
		$priznakNapravlennosti = (int)$numberLine%4;
		//print_r($numberLine);print_r('  ');print_r($lineLenth);print_r('  ');print_r($priznakNapravlennosti);print_r('</br>');
		print_r("<tr><td>");print_r($numberLine);print_r("</td><td>");print_r($lineLenth);print_r("</td><td>");print_r($priznakNapravlennosti);print_r("</td></tr>");
		
		// ��������� �� �����, �������� ����������� � ��� ��������
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
	
	// �������� ���������� ������� //print_r($arrayMatrix);
	print_r("<p align='left'>��������� ��������� ����������:<table>");
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
	������� ���� �� �����������. ������� ������ "������" �� �������������
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>