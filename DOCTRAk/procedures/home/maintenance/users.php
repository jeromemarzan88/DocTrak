<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
		$_SESSION['in'] ="start";
		header('Location:../../../index.php');
	}

	if($_SESSION['GROUP']!='POWER ADMIN')
	{
		header('Location:../../../index.php');
	}


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
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-select.css" />
<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="../../../css/jquery.growl.css" />
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-table.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="../../../js/jquery.growl.js"></script>


<script src="../../../js/bootstrap-table.js"></script>

<script src="../../../js/bootstrap-select.js"></script>

<link href="../../../css/bootstrap-submenu.min.css" rel="stylesheet" />
</head>

<body>
<!------------------------------------------- header -------------------------------->
<?php
  $PROJECT_ROOT= '../../../';
  include_once($PROJECT_ROOT.'qvJscript.php');
  include_once('../../../header.php');
?>
<!------------------------------------------- end header -------------------------------->

<!------------------------------------------- content -------------------------------->
<div class="content">

	<div id="leftmenu">
			<div id='cssmenu'>
				<ul>
				   <li class="bottomline topraduis"><a href='#'><span>DOC</span></a>
				      <ul>
								 	<li><a href='javascript:newDocument()'><span>New</span></a></li>
								 	<li><a href='javascript:receiveDocument()'><span>Receive</span></a></li>
							 		<li><a href='javascript:releaseDocument()'><span>Release</span></a></li>
							 		<li><a href='javascript:forpickupDocument()'><span>For Release</span></a></li>
				      </ul>
				   </li>
				   <?php
				   if ($_SESSION['BAC']==1 OR $_SESSION['GROUP']=='POWER ADMIN')
				   {
				      /* echo '<li class="bottomraduis"><a href="#"><span>BAC</span></a>
				      <ul>
							 	<li><a href="javascript:bacDocument()"><span>New</span></a></li>
							 	<li><a href="#"><span>Check In</span></a></li>
						 		<li><a href="#"><span>Backlog</span></a></li>
				      </ul>
				   </li>'; */
				   }
				   ?>
		
				</ul>
		  </div>
	</div>

	<div class="main">
      <div id="post">
         	<div class="container">
						<div class="row">
								<div class="post">
            					<div id="post100" class="col-xs-12 col-md-8">
                        <h2>USERS</h2>
                        <hr class="hrMargin" style="margin-bottom:10px;">
                        
                             	<form name="process" method="post" action="user/process.php" onsubmit="return validate();">

											    					<div class="table1 form-horizontal">
											    						
											    						<div class="form-group">
																			    <label class="col-sm-2 control-label">Username:</label>
																			    <div class="col-sm-10">
																			    		<input id="primarykey" name="primarykey" type="hidden" />
											                        <input id="username" name="username" type="text" class="form-control" /> 
																			    </div>
																		  </div>
																		  
																		  <div class="form-group">
																			    <label class="col-sm-2 control-label">Password:</label>
																			    <div class="col-sm-10">
											                        <input id="password" name="password" type="password" class="form-control" /> 
																			    </div>
																		  </div>
																		  
																		  <div class="form-group">
																			    <label class="col-sm-2 control-label">Verify:</label>
																			    <div class="col-sm-10">
											                        <input id="verify" name="verify" type="password" class="form-control" /> 
																			    </div>
																		  </div>
																		  
																		  <div class="form-group">
																			    <label class="col-sm-2 control-label">Fullname:</label>
																			    <div class="col-sm-10">
											                        <input id="name" name="name" type="text" class="form-control" /> 
																			    </div>
																		  </div>
																		  
																		  <div class="form-group">
																			    <label class="col-sm-2 control-label">Group:</label>
																			    <div class="col-sm-10">
											                       <select id="group" name="group" class="form-control" > <option>Select Here</option>
											
																				       <?php
																				           require_once("../../connection.php");
																				
																				           $query=select_info_multiple_key("select SECURITY_GROUPNAME from security_group");
																				           foreach($query as $var) {
																				              echo "<option>".$var['SECURITY_GROUPNAME']."</option>";
																				           }
																						
																						
																						   ?>
								                             </select>
																			    </div>
																		  </div>
																		  
																		  <div class="form-group">
																			    <label class="col-sm-2 control-label">Office:</label>
																			    <div class="col-sm-10">
											                       <select id="office" name="office" class="form-control selectpicker" data-live-search="true"> <option>Select Here</option>
											
																					       <?php
																					           require_once("../../connection.php");
																					
																					           $query=select_info_multiple_key("select OFFICE_NAME, OFFICE_DESCRIPTION from office");
																					           foreach($query as $var) {
																					              echo "<option data-subtext='".$var['OFFICE_DESCRIPTION']."'>".$var['OFFICE_NAME']."</option>";
																					           }
																					
																					
																					    		?>
								                             </select>
																			    </div>
																		  </div>
											
											                    <?php
											            
																		           if($_SESSION['operation']=='save'){
																		
																		                echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Saved Successfully </div>";
																		
																		            }  elseif($_SESSION['operation']=='delete'){
																		
																		                     echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Deleted Successfully </div>";
																		                }
																		           elseif($_SESSION['operation']=='update'){
																		
																		               echo"<div id='fade' style='color:#000; text-align:center;font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;'>Updated Successfully </div>";
																		           }
																		
																		               $_SESSION['operation']='clear';
																					

																					?>
											
											                  		 <!--- BUTTONS ACTIVITY START --->
											
											                        <div class="input1">
												                         	<input id="security_user" name="security_user" type="hidden" value="0"/>
												                        	<input  type="submit" value="Delete"  onClick="document.getElementById('security_user').value='delete';" class="btn btn-danger" />
												                         	<input type="submit" value="Save" onClick="document.getElementById('security_user').value='save';" class="btn btn-primary" />
												                          <input type="button" value="New" onClick="javascript:cleartext();" class="btn btn-primary" />
											                        </div>
											                           <!--- BUTTONS ACTIVITY END--->
											
											              </div>

						   								</form>



                  		</div>
                        
                        <div id="postright0" class="col-xs-6 col-md-4">
                        
                        	
                            	<form id="tfnewsearch" method="post">
                                    
                                        <div class="input-group">
                                                <input id="search_string" type="text" name="search_string" class="form-control" placeholder="search..." />
                                                <span class="input-group-btn">
                                                	<button id="search_user" class="btn btn-default">Search </button>
                                              	</span>
                                        </div>
                                    
															</form>	
                                
                          
                            	<hr class="hrMargin">
                            
	                          <div class="postright"> 
	                            <div class="scroll">
	                        	                                    
	                                <table id="responds">
																    <tr class='usercolortest'>
																			<th class="sizeUSERname">USERNAME</th>
																			<th>NAME</th>
																    </tr>
	                                </table>
	                            </div>
	                          </div>
                        </div>
                        
                        
                        <div class="tfclear"></div>
                </div>
						</div>
					</div>
      </div>
  </div>

</div>
<!------------------------------------ end content ------------------------------------->

<!------------------------------------------- footer -------------------------------->
    <?php
	    $PROJECT_ROOT= '../../../';
	    include_once($PROJECT_ROOT.'qvJscript.php');
	    include_once('../../../footer.php');
		?>
<!------------------------------------------- end footer -------------------------------->

    <!-- Feedback-->
<div id="feedbackDiv"></div>
<!-- End Feedback -->
<!-- Modal -->
       <?php
       include('../../../modal.php');
       ?>
<!-- End Modal -->
    
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
            url:"user/search.php",
            dataType:"text", // Data type, HTML, json etc.
            data:myData,
            beforeSend: function() {
                    $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            ajaxError: function() {
                    $("#responds").html("<div id='loading' style='width:340px;'><img src='../../../images/home/ajax-loader.gif' /></div>");
            },
            success:function(response){
                    $("#responds").html(response);
       //alert (response);
            },
            error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
            }
            });
	});

$('#feedbackDiv').feedBackBox();

    });


document.addEventListener("mousemove", function() {
    myFunction(event);
});

function myFunction(e) {
	$("#fade").fadeTo(3000,0.0);
	

}
    
	
    
/*]]>*/
</script>
</body>
</html>
