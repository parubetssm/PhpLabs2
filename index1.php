<HTML>
<head>

</head>

<BODY>
<div align="center" width = "100%">
<h2>������������ ������ �1</h2>
<h4 align="left">�������</h4>
<p align="left"> 1.	�������� �������� ���� ���������� ��� ������������� �������. 
	<div align="center"  width = "100%">
		
		<h4 align="left">�������� ������</h4>
		<FORM method="POST" ACTION="index.php" align="left" >
			<p align="left"> ������� �������� 1-� ���������� </br>
				<input type="text" name="Variable1" size="10"></input>
			<p align="left"> ������� �������� 2-� ���������� </br>
				<input type="text" name="Variable2" size="10"></input>
			<p align="center"> 
				<input type="submit" name="calculateButton" value="������"></input>
		</form>
	</div>


	<div align="center"  width = "100%">
	
		<h4  align="left"> ���������� ������ �������</h4>

	<p align="left"> �������: ����� ��������� �������� � ���������� ����, ������� ������������ ��� *��� ��������� ����. ����� ��� ���������� �����������������

<?php if(isset($_REQUEST['calculateButton'])) { 
echo '<p align="left">�������� �������� 1-� ���������� '.$_REQUEST['Variable1'];
echo '<p align="left">�������� �������� 2-� ���������� '.$_REQUEST['Variable2'];
$_REQUEST['Variable1'] = $_REQUEST['Variable1'].$_REQUEST['Variable2'];
 echo '<p align="left">������������� �������� 1-� ���������� '.$_REQUEST['Variable1']; 
$_REQUEST['Variable2'] = substr($_REQUEST['Variable1'],0,strlen($_REQUEST['Variable1'])-strlen($_REQUEST['Variable2']));
$_REQUEST['Variable1'] = substr($_REQUEST['Variable1'],strlen($_REQUEST['Variable2']));
echo '<p align="left" style="color:green">�������� �������� 1-� ���������� '.$_REQUEST['Variable1'];
echo '<p align="left" style="color:green">�������� �������� 2-� ���������� '.$_REQUEST['Variable2'];
?>
	
<?php } else { ?>
	������� ���� �� �����������. ������� ������ "������" �� �������������
	������������ ���� �� �����������. ������� ������ ������ �� �������������
<?php }; ?>

				
		
	</div>

	</div>


</BODY>
</HTML>