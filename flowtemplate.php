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
<script src="js/jquery-1.10.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PGLU DOCTRAK</title>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
$(document).ready(function() {
	//##### send add record Ajax request to response.php #########

    $('.del_wrapper').click(function() {alert();
        //   var id = $(this).parent().get(0).id;
        $(this).parent().remove();
    });

	$("#add_office").click(function (e) {
			e.preventDefault();
		  // alert("gdg");
            var myData = 'office='+ $("#Office").val(); //build a post data structure
			jQuery.ajax({
			type: "POST", // HTTP method POST or GET
			url:"procedures/home/flowtemplate/process.php", //Where to make Ajax calls
			dataType:"text", // Data type, HTML, json etc.
			data:myData,
			    success:function(response){
				$("#responds").append(response);

			    },
			error:function (xhr, ajaxOptions, thrownError){
				alert(thrownError);
			}
			});
	});



});






/*]]>*/
</script>



</head>

<body>
<div class="header">

	<div class="header1">
    
    	<div class="headerline">
    
    	<div class="headerbanner">
        
        		<img src="images/home/pglu.png" alt="PGLU" title="PGLU" align="left" /><h2>PGLU DOCTRAK</h2><p>Management Information System</p>
        
        </div>

        <div id="menu">
        	


            
            <ul class="menu">
        <li><a href="index.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
            </ul>
        </li>
        <li><a href="#"><span>REPORT</span></a>
        	<ul>
                <li><a href="dochistory.php"><span>DOCUMENT HISTORY</span></a></li>

            </ul>
        </li>
        <li><a href="#"><span>MAINTENANCE</span></a>
        <ul>
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

        <li class="last"><?php
          session_start();
          echo "Hi, ".$_SESSION['Security_Name']."";

        ?>  </li>

    </ul>

         <div id="tfheader">
					<form id="tfnewsearch" method="get" action="http://www.google.com">
		        	<input type="text" class="tftextinput" placeholder="search..." name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
					</form>
				<div class="tfclear"></div>
				</div>   
            
            
        </div>
        
        </div>
    
    </div>

</div>

<div class="content">

	<div class="content1">
    
    	<div class="content2">
        
        	<div id="post">

            			<div id="post1">
                        <h2>FLOW TEMPLATE</h2>





                              <form method="post" action="procedures/home/office/process.php">

    					<div class="table1">
    				<table>
                  	<tr>
                    	<td>Template:</td>

                        <td class="textinput"><input id="office_name" name="office_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>

                        <td class="textinput"><input id="office_name" name="office_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Office:</td>
                        <td class="select01"><select name='office' id='Office'>
        <?php
        require_once("procedures/connection.php");
        session_start();
      //  $_SESSION['guid']=uniqid();
       // echo "".$_SESSION['guid']."";
        $_SESSION['number_counter']=0;
        $query=select_info_multiple_key("select OFFICE_NAME from OFFICE ORDER BY OFFICE_NAME");
        foreach($query as $var) {
            echo "<option>".$var['OFFICE_NAME']."</option>";
        }
        ?>
                                </select>
                                <button id="add_office">Add Office</button></td>
                    </tr>


                  </table>

                    <?php
            session_start();
           if($_SESSION['operation']=='save'){

                echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";

            }  elseif($_SESSION['operation']=='delete'){

                     echo"<div style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
                }

               $_SESSION['operation']='clear';

            ?>







     <!---
    <li class="orange"><a href="#">Download</a></li>
    <li class="blue"><a href="#">Download</a></li>
    <li class="green"><a href="#">Download</a></li>
    <li class="purple"><a href="#">Download</a></li>
    <li class="gold"><a href="#">Download</a></li>
        --->

                        <!---
						 <table id="responds" cellpadding="0" cellspacing="0">



                         </table>
                          --->


                          <ul id="responds">





                          </ul>
                              <!--- BUTTONS ACTIVITY START --->


                        <div class="input">
                         <input id="office_mode" name="office_mode" type="hidden" value="0"/>
                         <input type="button" value="Clear" onClick="javascript:newoffice();"/>
                         <input  type="submit" value="Delete"  onClick="document.getElementById('office_mode').value='delete';"/>
                         <input type="submit" value="Save" onClick="document.getElementById('office_mode').value='save';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->
                           </div>

						   </form>
                        </div>


                        <div class="tfclear"></div>

            
            </div>

        </div>
    
    </div>

</div>

<div class="footer">

	<div class="footer1">
    
    			<div id="footer2">
                	<p>Copyright &copy; 2014-2015 Sir TJ and Jerome | <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
                </div>
    
    </div>
	
</div>

</body>
</html>
