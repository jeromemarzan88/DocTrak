<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
session_start();
 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
?>
</title>
<script src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<script language="JavaScript" type="text/javascript">



function cleartext() {
  document.getElementById("barcodeno").value="";
  document.getElementById("title").value="";
  document.getElementById("documenttype").value="";
  document.getElementById("template").value="";
  document.getElementById("pdf").value="";
  document.getElementById("primarykey").value="";

}
function clickSearch(barcodeno,title,documenttype,template,pdf,a) {
   // document.getElementById('primarykey').value=barcode;
    document.process.barcodeno.value=barcodeno;
    document.process.title.value=title;
    document.process.documenttype.value=documenttype;
    document.process.template.value=template;
    //document.process.file.value=a;
    document.process.primarykey.value=barcodeno;
	retrieveAttachment(pdf);
    //alert (type);
  //  document.getElementById("group").value=username;
}


function retrieveAttachment(barcodeID){
        var myData = 'attachment='+barcodeID; //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"procedures/home/document/for release/retrieveAttachment.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            success:function(response){

                $("#attachment").html(response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
	
	
function validate() {

    if (document.getElementById('forrelease_hidden').value=='delete') {
        if (document.getElementById('primarykey').value != ""){
        if (confirm("Are you sure you want to delete?") == true) {
            return true;
        }
        else {
            return false;
        }

        }
        else {
            alert("Nothing to delete.");
            return false;
        }


    }



    if (document.process.barcodeno.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.title.value=="") {

            alert("Fill up necessary inputs.");
            return false;
        }
    else if (document.process.documenttype.value=="") {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.template.value=="") {
        alert("Fill up necessary inputs.");
        return false;
    }





}

$(document).ready(function() {
    $("#search_forrelease").click(function (e) {

    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"procedures/home/document/for release/search.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
			success:function(response){
				$("#responds").html(response);

			},
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	});



    });

</script>
</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>
				<?php
						session_start();
						echo $_SESSION['Title']. "<span style='font-size:12px;'>&nbsp;" .$_SESSION['Version'];
						echo "</span>";
				?>
				
				</h2><p>Management Information System</p>
        
        </div>

        <div id="menu">
        	


            
            <ul class="menu">
        <li><a href="index.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
                            <li><a href="forreleasedoc.php"><span>FOR RELEASE</span></a></li>
                            <li><a href="documenttracker.php"><span>DOCUMENT TRACKER</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul>
                <li><a href="dochistory.php"><span>DOCUMENT HISTORY</span></a></li>

            </ul>
        </li>
        <li><a href="#"><span>MAINTENANCE</span></a>
        <ul>
                <li><a href="documenttype.php"><span>DOCUMENT TYPE</span></a></li>
                <li><a href="office.php"><span>OFFICES</span></a></li>
                <li><a href="flowtemplate.php"><span>FLOW TEMPLATE</span></a></li>
                <li><a href="#" class="parent"><span>SECURITY</span></a>
                    <ul>
                        <li><a href="users.php"><span>USERS</span></a></li>
                        <li><a href="group.php"><span>GROUP</span></a></li>
                    </ul>
                </li>
        </ul>
        </li>
        <li><a href="about.php"><span>ABOUT</span></a></li>
        <li><a href="procedures/home/logout.php"><span>LOGOUT</span></a></li>

        </ul>
		
        
        <div class="admin">
         <?php
          session_start();
          echo "Hi, ".$_SESSION['security_name']."";


        ?>
        </div>
            
            
        </div>
        
        </div>
    
    </div>

</div>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">
            
            			<div id="post10">
                        <h2>FOR RELEASE</h2>

                            <form name="process" method="post" action="procedures/home/document/for release/process.php" onsubmit="return validate();" enctype="multipart/form-data">

    					<div class="table1">
    				<table >
                    <tr>
                    	<td>BarCode No:</td>

                        <td class="usertext">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="barcodeno" readonly="readonly" name="barcodeno" type="text" />
                            </td>
                    </tr>
                    <tr>
                    	<td>Title:</td>
                        <td class="usertext"><input id="title" readonly="readonly" name="title" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Document Type:</td>
                        <td class="usertext"><input id="documenttype" readonly="readonly" name="documenttype" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Template:</td>
                        <td class="usertext"><input id="template" readonly="readonly" name="template" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Comment:</td>
                        <td class="usertext"><textarea rows="5" id="comment" name="comment" type="text"></textarea> </td>
                    </tr>
                    <tr>
                    	<td>Attachment: </td>
                         <td id="attachment">
                         
                         
                         </td>
                    </tr>
                  </table>

                    <?php
            session_start();
           if($_SESSION['operation']=='save'){

                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }
           elseif($_SESSION['operation']=='update'){

               echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
           }

               $_SESSION['operation']='clear';






?>

                  		 <!--- BUTTONS ACTIVITY START --->

                        <div class="input2">
                         <input id="forrelease_hidden" name="forrelease_hidden" type="hidden" value="0"/>
                         <input type="submit" value="For Release" onClick="document.getElementById('forrelease_hidden').value='forrelease';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>




                        </div>

                        <div id="postright">
                        
                        	<div id="tfheader">
                            	<form id="tfnewsearch" method="POST">
		        				<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
                    			<button id="search_forrelease" class="tfbutton">Search </button>
								</form>								
                            </div>
                            <div class="tfclear"></div>
                            
                            <div class="scroll">
                        	<table id="responds">


                			</table>

                            </div>
                         </div>	
    
    
							
                        
                        <div class="tfclear"></div>
						</div>
            
            </div>
        
        </div>
    
    </div>

</div>

<div class="footer">

	<div class="footer1">
    
    			<div id="footer2">
            <p>
			<?php
				session_start();
				echo $_SESSION['Copyright']. "&nbsp;<img src=images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";
			?>
			
			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>
    
    </div>
	
</div>

</body>
</html>
