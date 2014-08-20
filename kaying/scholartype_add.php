<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>eLUEASP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="keywords" content="scholarship">
		<meta name="description" content="La Union Scholars">
		<meta name="Author" content="JKJ">
		<META NAME="robots" CONTENT="index, follow"> <!-- (Robot commands: All, None, Index, No Index, Follow, No Follow) -->
		<META NAME="revisit-after" CONTENT="30 days">
		<META NAME="distribution" CONTENT="global"> 
		<META NAME="rating" CONTENT="general">
		<META NAME="Content-Language" CONTENT="english">


		<script language="JavaScript" type="text/JavaScript" src="menu.js"></script>
		<link href="templates.css" rel="stylesheet" type="text/css">
		
		<script>
		function validateForm(setupForm){
			if (document.setupForm.typecode.value=="" | document.setupForm.typedesc.value=="" | document.setupForm.typeslot.value==""){
			alert('All fields are required.');
			return false;
		}
		}
		</script>	

	</head>

<body>
<?php include "header.php";?>

<div class="scholar">
	<table>
		<tr>
			<td valign="top">
				<?php include "menu_setup.php";?>
			</td>

			<!--edit here-->
			<td valign="top">
			<form method="post" onsubmit="return validateForm()" name="setupForm" action="scholartype_addsave.php">
			<table class="setup" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">SET-UP MENU</td>
				</tr>
				
				<tr>
					<td>Add - SCHOLAR TYPE</td>
				</tr>	
				
				<tr>
					<td width="250">
						<table class="setup" align="left">
							<tr>
								<td align="right">Scholar Type Code :&nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="typecode" name="typecode"></td>
							</tr>
							<tr>
								<td  align="right">Name : &nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="typedesc" name="typedesc" size="50"></td>
							</tr>
							<tr>
								<td  align="right">Slot : &nbsp;&nbsp;</td>
								<td colspan="2"><input type="text" id="typeslot" name="typeslot" size="50"></td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td align="right">
						<input type="submit" value="Save" style="height:25px; width:60px">&nbsp;
						<input type="button" value="Cancel" style="height:25px; width:60px" onclick="window.location.href=('scholartype_browse.php')"></a>
					</td>
				</tr>		
			</table>
			</form>
			</td>
			
			<!--until here-->
		</tr>
	</table>
</div>

<?php include "footer.php";?>

</table>
</body>
</html>