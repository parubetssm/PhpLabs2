<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>������������ ������ �4</h2>
<h4 align="left">�������</h4>
<p align="left"> ���� ����� ��������� ������. �������� ������������ �������� ����� �����, ��� ������ � ��� ����� �� ��� X, � �������� ������� ������� � ��� ������� ����� (�������� �� ��� Y). �������� ���� ������������� ������ [2,5,1,2,3,4,7,7,6].
<p align="left">������ �����������: ���� �����. ������� ���� ��������� � ������� ����� ������ �����? �� ������� �������� ������ ���� ���������� ���� 1�1. �� �������� ���� ���, ��� ����������� ����� �� ����� 1, ��������������. ���� ������ �� ����� 7 ����� ���������. � ��� �������� ���� ����� 1 � 6 � ����� �������, ������������ ����� ���� ����� 10.
������ �������������� ���� � ��������, �� ������� ��������� ����� (����� ��� ������). 


	<div align="center"  width = "100%">
		
		<h4 align="left">�������� ������</h4>
		<FORM method="POST" ACTION="index4.php" align="left" >
			<p align="left"> ������� ������ ��� ���������� �������, �������� *�������� ������� ���������</br>
				<input type="text" name="arrayString" size="35"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="������"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
	
	<h4  align="left"> ������� �������</h4>
		<p align='left'> ����� ������ �����, � ��������� ����� �������� ������� �� �������, �������� �� ���� ������ ������ ��� �����. ������� �������� �� ������, ������-�� ������, ��� �������� ����� ���������� �����, � �� ���������� � ���. ������ �� ����� ���� ������ ������ ����� ���� ����� ������� ������. �� ��������� ������� ��������� ����� ����, ������� � ���� ������� ����� ����������...
����� �������, ��������� ������ - ��� �� �������, � �������. ���� ������� ����� ������ �� �������. ���� 2 �������� ����� �����. � ����� ������� ���� ��� ... � ��� �� ������... �� ��� �� �����...
		<h4  align="left"> ���������� ������ �������</h4>
		

	
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
		
		// ���������� *�������� �� ������� ������ ������ ��� ���� (pools); ��� ������� ����������������
		//*�������� ��������� ������ ����� (pool) ������ �� ����� ��������
		while($poolStart <= $arraySize - 1)
		//	���� ����� ������� ����� *��������� �������, ������������ ������� � ��������� *�������
		{
			if($_givenArray[$poolStart] <= $_givenArray[$poolEnd])
			// ���� ������ ���������������� *�������� ��������� *������� ���� (���� � ������� ����), �� ����� ������
			// ���� �� ����������. � *���� ����� ������ ��������� � ���������� *��������
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
				// ���� ������ ���������������� *�������� ��������� *������� ������/����, �� ������
				// ����� ���� �����: ���������� ������. � *���� ������ ���� �/���������� �/��������� ������� ���� ���������������� *�������� 
				// ������ �� ���������� ������� ������
				echo "s";
				echo (string)$_givenArray[$poolStart]."(".(string)$poolStart.")"."|";
				// ������� �� ���������� ��������
				while(($poolEnd <= $arraySize - 1)&&($_givenArray[$poolEnd]<=$_givenArray[$poolEnd-1]))
				{
					echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
					$poolEnd++;
				};
				//echo (string)$_givenArray[$poolEnd]."(".(string)$poolEnd.")".":";
				$poolEnd--;
				// ���� ������� ��������� �� ����� �������, �� ����������� ����� ���
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
				
				// ������������� ������/������� �� ������� ���� �����		
				if($poolEnd == $arraySize - 1)
				//	��� *������� ������ ���������������� ������ *����� ���������������� *��������
				{
					if($poolEndMax <> $poolStart + 1)
					//	������ ���������������� *�������� ������ �� ����� ������� ������� ����, �� ���� ��������, �.�.
					//	������ ������ ���� ����� ������ ���������������� *��������
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
							// ������ �������, ����������� ����������� ���� �������� ������� ���� (���������� ����)
							$poolEnd = $arraySize;
							// ������ �������, ����������� ����������� ���� �������� ��������������� *��������� (������� ����)
							$poolStart = $arraySize;
							echo "y";
						};
					}
					else
					//	������ ���������������� *�������� ���� �������� ��� ���������� �� ����� �������: 
					//	������ ���� � ����� �����������
					{
						// ������ �������, ����������� ����������� ���� �������� ������� ���� (���������� ����)
						$poolEnd = $arraySize;
						// ������ �������, ����������� ����������� ���� �������� ��������������� *��������� (������� ����)
						$poolStart = $arraySize;
						echo "z";
					};
				}
				else //($poolEnd != $arraySize - 1))
				//	������ ���������������� *�������� ������ ������ ���� ����� ������ ���������������� *�������� ��� ������ ���
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
						// ������ �������, ����������� ����������� ���� �������� ������� ���� (���������� ����)
						$poolEnd = $arraySize;
						// ������ �������, ����������� ����������� ���� �������� ��������������� *��������� (������� ����)
						$poolStart = $arraySize;
						echo "mm";
					};
				};
			};
		};
	};
	print_r("<p align='left'");
	print_r($pools);
	
	// �������� ����� ������� ����/����, ������� ����� ����
	print_r("<p align = 'left'> ��������� �������: ");
	foreach($pools as $pool)
	{
		//��������� ����� ������� �����
		$rightBorder = $pool[1];
		$k = $pool[1] - 1;
		print_r("<p align='left'");print_r((string)$k);
		while(($_givenArray[$k] < $_givenArray[$rightBorder]) && ($k <> $pool[0]))
		{
			(int)$k--;
			print_r("<p align='left'");print_r((string)$k);
		};
		$pool[0] = $k;
		
		// ��������� ������� ������ �����
		if($_givenArray[$pool[0]] < $_givenArray[$pool[1]]){$minBorder = $pool[0];} else {$minBorder = $pool[1];};
		
		// ���������� �������� ������ ���� (������� ������� ����)
		(int)$s = 0;
		for($j = $pool[0] + 1; $j < $pool[1]; $j++)
		{
			$s = $s + $_givenArray[$minBorder] - $_givenArray[$j];
		};
		
		print_r("<p align = 'left'>");print_r("<p align = 'left'>");print_r((string)$_givenArray[$pool[0]]);print_r("[");print_r((string)$pool[0]);print_r("] - ");
		print_r((string)$_givenArray[$pool[1]]);print_r("[");print_r((string)$pool[1]);print_r("] : ����� ");print_r((string)$s);
		
	};
	
	
}

if(isset($_REQUEST['calculateButton'])) 
{ 
	print_r("<p align='left'> ��������� ������-�����������: "); print_r($_REQUEST['arrayString']); 	//print_r(" ����� ������� "); print_r(count(explode(" ",trim($_REQUEST['arrayString'])))); 
	
	print_r("<p align='left'>");
	
	getArray($_REQUEST['arrayString']);
	
	
?>
	
<?php } else { ?>
	<p align="left"> ������� ���� �� �����������. ������� ������ "������" �� �������������
	
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>