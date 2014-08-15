<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd']))
{
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PGLU DOCTRAK</title>
<script src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">

<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/
function cleartext() {
  document.getElementById("username").value="";
  document.getElementById("password").value="";
  document.getElementById("verify").value="";
  document.getElementById("name").value="";
  document.getElementById("primarykey").value="";
  document.getElementById("office").value="Select Here";
  document.getElementById("group").value="Select Here";

}
function clickSearch(username,name,groupname,officename) {
  //alert (officename);
         document.getElementById("office").value=officename;
document.process.username.value=username;
    document.process.name.value=name;
    document.getElementById("primarykey").value=username;
  document.getElementById("group").value=groupname;

    //document.getElementById("verify").value=groupname;
}


function validate() {

    if (document.getElementById('security_user').value=='delete') {
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



    if (document.process.username.value=="")   {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.password.value=="") {

            alert("Fill up necessary inputs.");
            return false;
        }

    else if (document.process.name.value==""){
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.group.value=="Select Here") {
        alert("Select Group.");
        return false;
    }
    else if (document.process.office.value=="Select Here") {
        alert("Select Office.");
        return false;
    }
    else {

        if (document.process.password.value != document.process.verify.value){
            alert("Check password verification.");
            return false;
        }
            else {
                return true;
            }


    }




}

$(document).ready(function() {
    $("#search_user").click(function (e) {
        
    e.preventDefault();
    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
    jQuery.ajax({
			type: "POST",
            url:"procedures/home/user/search.php",
            dataType:"text", // Data type, HTML, json etc.
			data:myData,
			success:function(response){
				$("#responds").html(response);
                   //alert (response);
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
        
        		<img src="images/home/doctraklogo2.png" width="125" height="120" alt="PGLU" title="PGLU" align="left" /><h2>PGLU DOCTRAK</h2><p>Management Information System</p>
        
        </div>

        <div id="menu">
        	


            
            <ul class="menu">
        <li><a href="index.php" class="parent"><span>HOME</span></a></li>
        <li><a href="#" class="parent"><span>DOCUMENT</span></a>
        	<ul>
                <li><a href="newdoc.php"><span>NEW DOCUMENT</span></a></li>
                            <li><a href="receiveddoc.php"><span>RECEIVED DOCUMENT</span></a></li>
                            <li><a href="releasedoc.php"><span>RELEASE DOCUMENT</span></a></li>
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
		
        <div id="tfheader">
        <div class="admin">
         <?php
          session_start();
          echo "Hi, ".$_SESSION['security_name']."";


        ?>
        </div>
					<form id="tfnewsearch" method="POST" action="procedures/home/user/search.php">
		        	<input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />

                    <button id="search_user" class="tfbutton">Search </button>
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
            
            			<div id="post10">
                        <h2>USERS</h2>
                        
                             <form name="process" method="post" action="procedures/home/user/process.php" onsubmit="return validate();">

    					<div class="table1">
    				<table >
                  	<tr>
                    	<td>Username:</td>

                        <td class="usertext">
                            <input id="primarykey" name="primarykey" type="hidden" />
                            <input id="username" name="username" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Password:</td>
                        <td class="usertext"><input id="password" name="password" type="password" /> </td>
                    </tr>
                    <tr>
                    	<td>Verify:</td>
                        <td class="usertext"><input id="verify" name="verify" type="password" /> </td>
                    </tr>
                    <tr>
                    	<td>Name:</td>
                        <td class="usertext"><input id="name" name="name" type="text" /> </td>
                    </tr>

                    <tr>
                    	<td>Group: </td>
                         <td class="select01">
                             <select id="group" name="group"> <option>Select Here</option>

       <?php
           require_once("procedures/connection.php");

           $query=select_info_multiple_key("select SECURITY_GROUPNAME from SECURITY_GROUP");
           foreach($query as $var) {
              echo "<option>".$var['SECURITY_GROUPNAME']."</option>";
           }


    ?>
                              </select>
                               </td>

                    </tr>
                    <tr>
                    	<td>Office: </td>
                         <td class="select01">
                             <select id="office" name="office"> <option>Select Here</option>

       <?php
           require_once("procedures/connection.php");

           $query=select_info_multiple_key("select OFFICE_NAME from OFFICE");
           foreach($query as $var) {
              echo "<option>".$var['OFFICE_NAME']."</option>";
           }


    ?>
                              </select>
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

                        <div class="input1">
                         <input id="security_user" name="security_user" type="hidden" value="0"/>
                         <input type="button" value="New" onClick="javascript:cleartext();"/>
                         <input  type="submit" value="Delete"  onClick="document.getElementById('security_user').value='delete';"/>
                         <input type="submit" value="Save" onClick="document.getElementById('security_user').value='save';"/>
                         </div>
                           <!--- BUTTONS ACTIVITY END--->

                  </div>

						   </form>



                        </div>
                        
                        <div id="postright">
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

<div class="footer">

	<div class="footer1">
    
    			<div id="footer2">
                	<p>Copyright &copy; 2014-2015 TJ and Jerome | <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
                </div>
    
    </div>
	
</div>

</body>
</html>
