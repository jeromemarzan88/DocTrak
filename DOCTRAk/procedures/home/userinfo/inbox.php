<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:../../../index.php');
}
date_default_timezone_set($_SESSION['Timezone']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php

 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
?>
</title>
   <link href="../../../css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<script src="../../../js/jquery-1.10.2.min.js"></script>
<script src="../../../js/bootstrap.min.js"></script> 




</head>

<body>
 <?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
    include_once($PROJECT_ROOT.'qvJscript.php');
    ?>

<div class="content">

<div id="leftmenu">
<nav class="social">
          <ul>
              <li><a href="javascript:newDocument()">New<i><img src="../../../images/home/icon/newdoc1.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:receiveDocument()">Receive<i><img src="../../../images/home/icon/receivedoc1.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:releaseDocument()">Release<i><img src="../../../images/home/icon/releasedoc.gif" width="25px" height="25px" /></i></a></li>
              <li><a href="javascript:forpickupDocument()">For Pickup<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>
              <?php
                 if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
                {
              echo '<li><a href="javascript:bacDocument()">BAC<i><img src="../../../images/home/icon/forpickup.gif" width="25px" height="25px" /></i></a></li>';
                }
              ?>

          </ul>
      </nav>
</div>

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post01">
                        <h2>INBOX</h2>
                        
                        	<div class="groupnav">
                            
                                        <div id="nav">
                                                <h4>PROFILE</h4>
                                                <ol>
                                                        <li><a href="editprofile.php"><span>EDIT PROFILE</span></a></li>
                                                        <li><a href="editpassword.php"><span>EDIT PASSWORD</span></a></li>
                                                </ol>
                                        </div>
                                        
                                        <div id="nav">
                                                <h4>MESSAGE</h4>
                                                <ol style="height: 345px;">
                                                        <li><a href="inbox.php"><span>INBOX</span></a></li>
                                                        <li><a href="sentitems.php"><span>SENT ITEMS</span></a></li>
                                                        <li><a href="newmessage.php"><span>NEW MESSAGE</span></a></li>
                                                </ol>
                                        </div>
                                        
                              </div>
                              <div class="inbox">
                              			
                                        <div id="inboxtable">
                                        		<table id="MailData" cellpadding="0" class="fix">
                                                	<tr class="bg1">
                                                            <td>Sender</td>
                                                            <td>Title</td>
                                                            <td>Message</td>
                                                            <td></td>
                                                            <td>Date</td>
                                                    </tr>

                    <?php

                            require_once("../../connection.php");
                            global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
                            $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
                            $query="SELECT MAIL_ID,MAILCONTENT, MAILTITLE, MAILDATE,MAILSTATUS,SECURITY_NAME FROM mail JOIN security_user ON
                                    mail.FK_SECURITY_USERNAME_SENDER = security_user.SECURITY_USERNAME WHERE FK_SECURITY_USERNAME_OWNER
                                    = '".$_SESSION['usr']."'  ORDER BY MAILDATE DESC";
                                    
//                            echo $query;
//                            die();
                            $RESULT=mysqli_query($con,$query) or die(mysqli_error($con));
                            echo "<input id='mailid' type='hidden'/>";

                            while ($row = mysqli_fetch_array($RESULT))
                            {
                                    $date = date_create($row['MAILDATE']);
                                if ($row['MAILSTATUS']==0)
                                        {
                                echo "<tr id=".$row["MAIL_ID"]." class='bg' onClick='OpenMail(".$row['MAIL_ID'].")'>";
                                            $class='bg01';
                                            }

                                    else
                                            {
                                            echo "<tr id=".$row["MAIL_ID"]." class='bg01' onClick='OpenMail(".$row['MAIL_ID'].")'>";
                                            $class='bg';
                                            }

            echo    "<td>".$row['SECURITY_NAME']."</td>
                <td>".$row['MAILTITLE']."</td><td><font style='color:#666;'><div class='y6'>".substr($row['MAILCONTENT'],0,60)."</font></div></td>
                <td></td>
                <td>".date_format($date,'M d, Y-H:i')."</td>
                                    </tr>";


                            }

                    ?>


                                                </table>
                                        </div> 
                                         
                              </div>
                              <div class="tfclear"></div>	
    
    
							
                        </div>
                        <div class="tfclear"></div>

            
            </div>
        
        </div>
    
    </div>

</div>

<div class="footer">

	<div class="footerbg">
    
    			<div id="footer2">
            <p>
			<?php
				
				echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->

    <script language="JavaScript" type="text/javascript">



	function OpenMail(MailId){
                var module_name='OpenMail';
		var mail_id = MailId; //build a post data structure
		jQuery.ajax({
			type: "POST",
			url:"messaging/readmessage.php",
			dataType:"text", // Data type, HTML, json etc.
			data:{MailId:mail_id,module:module_name},
                         beforeSend: function() {
                             $("#MailData").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
		        $("#ajaxhistory").html("<div style='margin:115px 0 0 320px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
                            },
                        ajaxError: function() {
                                    $("#MailData").html("<div id='loading'><img src='../../../images/home/ajax-loader.gif' /></div>");
                            },
			success:function(response){

				$("#MailData").html(response);
                                CheckMail();
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
                        
		});
	}
        
        function CheckMail()
        {
            
                var module_name='CheckMail';
		jQuery.ajax({
			type: "POST",
			url:"messaging/readmessage.php",
			dataType:"text", // Data type, HTML, json etc.
			data:{module:module_name},
			success:function(response)
                        {
                            $('#mailNoti').html(response);
			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
                        
		});
        }

</script>
</body>
</html>
