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
<title>PGLU DOCTRAK</title>
    <script src="js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<script language="JavaScript" type="text/javascript">
/*<![CDATA[*/

/*]]>*/

function validate() {


    if (document.getElementById('office_mode').value=='delete') {

        if (confirm("Are you sure you want to delete?") == true) {
            return true;
        }
        else {
            return false;
        }



    }


    if (document.process.office_name.value == "") {
        alert("Fill up necessary inputs.");
        return false;
    }
    else if (document.process.office_description.value == "") {
        alert("Fill up necessary inputs.");
        return false;
    }
    else {
        return true;

    }


}

function newoffice() {
    document.getElementById("office_name").value="";
    document.getElementById("office_description").value="";
}

function clickSearch(office,description) {

    document.process.office_name.value=office;
    document.process.office_description.value=description;

}


$(document).ready(function() {
    $("#search_office").click(function (e) {

        e.preventDefault();
        var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
        jQuery.ajax({
            type: "POST",
            url:"procedures/home/office/search.php",
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
                <form id="tfnewsearch" method="POST" action="procedures/home/office/search.php">
                    <input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />

                    <button id="search_office" class="tfbutton">Search </button>
                </form>
                <div class="tfclear">


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
                        <h2>OFFICES</h2>


                         <form name="process" method="post" action="procedures/home/office/process.php" onsubmit="return validate();">

    					<div class="table1">
    				<table border="0">
                  	<tr>
                    	<td>Office Name:</td>

                        <td class="textinput"><input id="office_name" name="office_name" type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Description:</td>
                        <td class="textinput"><input id="office_description" name="office_description" type="text" /> </td>
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
                        
                        <div id="postright">
                            <div class="scroll">
                                <table id="responds"  >


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
