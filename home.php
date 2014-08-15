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
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
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
            
            			<div id="post01">
                        <h2>Home</h2>
                        
                        		<div class="imagestext">
                                	<img src="images/home/newdoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:void(0)" onclick = "document.getElementById('tj1').style.display='block';document.getElementById('fade1').style.display='block'">New Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/receivedoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:tj" onclick = "document.getElementById('tj2').style.display='block';document.getElementById('fade2').style.display='block'">Received Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/releasedoc.jpg" width="136" height="137" />
    								<div class="lower"><a href = "javascript:tj" onclick = "document.getElementById('tj3').style.display='block';document.getElementById('fade3').style.display='block'">Release Document</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/docstats.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">Document Status</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/maintenance.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">Maintenance</a></div>
                                </div>
                                <div class="imagestext">
                                	<img src="images/home/about.jpg" width="136" height="137" />
    								<div class="lower"><a href="#">About</a></div>
                                </div>


                                <div id="tj1" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('tj1').style.display='none';document.getElementById('fade1').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a><table border="0">
                  	<tr>
                    	<td>Bar Code No:</td>
                        <td class="textinput"><input type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Title: </td>
                         <td class="textinput"><input type="text" /> </td>
                    </tr>
                          <tr>
                    	<td>Document Type: </td>
                         <td><select> <option>Select Here</option> </select> 
                         Document Flow: 
                         <select> <option>Select Here</option> </select> </td>
                    </tr>
                    
                   
                          <tr>
                    	<td>PDF File: </td>
                         <td><input type="file" /> </td>
                    </tr>
                     <tr>
                    	<td> </td>
                         <td></td>
                         <td> <input type="button" value="Preview"/></td>
                         <td> <input type="button" value="Add"/></td>
                    </tr>
                    
                  </table></div>
    <div id="fade1" class="black_overlay" onclick = "document.getElementById('tj1').style.display='none';document.getElementById('fade1').style.display='none'"></div>

    <div id="tj2" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('tj2').style.display='none';document.getElementById('fade2').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a><table border="0">
                  	<tr>
                    	<td>Bar Code No:</td>
                        <td class="textinput"><input type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Title: </td>
                         <td class="textinput"><input type="text" /> </td>
                    </tr>
                          <tr>
                    	<td>Document Type: </td>
                         <td><select> <option>Select Here</option> </select>
                         Document Flow:
                         <select> <option>Select Here</option> </select> </td>
                    </tr>


                          <tr>
                    	<td>PDF File: </td>
                         <td><input type="file" /> </td>
                    </tr>
                     <tr>
                    	<td> </td>
                         <td></td>
                         <td> <input type="button" value="Receive"/></td>
                    </tr>

                  </table></div>
    <div id="fade2" class="black_overlay" onclick = "document.getElementById('tj2').style.display='none';document.getElementById('fade2').style.display='none'"></div>

    <div id="tj3" class="white_content"><a href = "javascript:void(0)" onclick = "document.getElementById('tj3').style.display='none';document.getElementById('fade3').style.display='none'"><img src="images/home/icon/download.jpg" width="30" height="30" /></a><table border="0">
                  	<tr>
                    	<td>Bar Code No:</td>
                        <td class="textinput"><input type="text" /> </td>
                    </tr>
                    <tr>
                    	<td>Title: </td>
                         <td class="textinput"><input type="text" /> </td>
                    </tr>
                          <tr>
                    	<td>Document Type: </td>
                         <td><select> <option>Select Here</option> </select> 
                         Document Flow: 
                         <select> <option>Select Here</option> </select> </td>
                    </tr>
                    
                   
                          <tr>
                    	<td>PDF File: </td>
                         <td><input type="file" /> </td>
                    </tr>
                     <tr>
                    	<td> </td>
                         <td></td>
                         <td> <input type="button" value="Release"/></td>
                    </tr>
                    
                  </table></div>
    <div id="fade3" class="black_overlay" onclick = "document.getElementById('tj3').style.display='none';document.getElementById('fade3').style.display='none'"></div>
     

                        </div><div class="tfclear"></div>

            
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
