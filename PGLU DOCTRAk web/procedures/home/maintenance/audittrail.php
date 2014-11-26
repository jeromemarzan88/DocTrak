<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
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
    <script src="../../../js/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../css/home.css" />
	<link rel="icon" href="../../../images/home/icon/pglu.ico" type="image/x-icon">
    <script language="JavaScript" type="text/javascript">


	    $(document).ready(function() {
		    $("#search_document").click(function (e) {
			    e.preventDefault();
			    var myData = 'search_string='+ $("#search_string").val(); //build a post data structure
			    jQuery.ajax({
				    type: "POST",
				    url:"history/search.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:myData,
				    success:function(response){
					    $("#historydata").html(response);

				    },
				    error:function (xhr, ajaxOptions, thrownError){
					    alert(thrownError);
				    }
			    });
		    });



		    $("#filter").click(function (e) {
			    e.preventDefault();
			    //var myData = 'datefrom='+ $("#datefrom").val(); //build a post data structure
			    //var myData2 = 'dateto='+ $("#dateto").val();
			    var datefrom=document.getElementById('datefrom').value;
			    var dateto=document.getElementById('dateto').value;
			    //var dateString = today.format("dd-m-yy");
			    //var newdateto = new Date();

				//add a day to the date
			    //newdateto.setDate(newdateto.getDate() + 1);
			    //alert(newdateto.format("Y-m-d\\TH:i:sP"));
			   //dateto=newdateto.format("dd-m-yy");
			    jQuery.ajax({
				    type: "POST",
				    url:"history/filter.php",
				    dataType:"text", // Data type, HTML, json etc.
				    data:'datefrom='+datefrom+'&dateto='+dateto,
				    success:function(response){
					    $("#historydata").html(response);
						//alert(response)

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
<?php
    $PROJECT_ROOT= '../../../';
    include_once('../../../header.php');
?>


    
    
<div class="content">

    <div class="content1">

        <div class="content2">

            <div id="post">

                <div id="post01">
                    <h2>AUDIT TRAIL</h2>


                    	<div id="headform">

                                				<div id="headtable">
                                        		<table>
                                                	
                                                </table>
                                                </div>


		                    <form name="history">
		                    <div id="headsearch">
			                    <input id="search_string" type="text" name="search_string" class="tftextinput" placeholder="search..." />
			                    <button id="search_document" class="tfbutton">Search </button>
		                    </div>
		                        </form>
                                <div class="tfclear"></div>

                        </div>
                        <div id="codetable">
                        		<table id="historydata">
                                	<tr>
                                    	<th>USER</th>
                                        <th>ACTION</th>
                                        <th>TYPE</th>
                                        <th>DATE</th>
                                        <th>IP</th>
                                    </tr>


			                        

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
            <p>
                <?php
              
                echo $_SESSION['Copyright']. "&nbsp;<img src=../../../images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
                echo "&nbsp|";
                mysqli_close($con);
                ?>

                <a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>

    </div>

</div>

</body>
</html>