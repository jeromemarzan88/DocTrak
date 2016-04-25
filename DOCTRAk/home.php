<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
  $_SESSION['in'] ="start";
 header('Location:index.php');
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php

 	echo $_SESSION['Title']. "" .$_SESSION['Version'];
//<script src="js/bootstrap.min.js"></script>
	
?>
</title>

<link href="css/bootstrap.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<link rel="icon" href="images/home/icon/pglu.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/jquery.growl.css" />
<script src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/jquery.growl.js"></script>




</head>

<body>

    <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
    ?>

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

	<div class="content1">

    	<div class="content2">

        	<div id="post">

                    <div id="postHOME">

                      <div id="codetable">
                        <div id='docList' class="scrollHOME">
                        	
                        	<p>Select from Filter to load documents</p>
<!--                                <table id="HOMEdata">
                                	<tr>
                                            <th>DOC ID</th>
                                            <th>TITLE</th>
                                            <th>TYPE</th>
                                            <th>ORIGINATOR OFFICE</th>
                                            <th>LOCATION</th>
                                            <th>DATE RECEIVE</th>
                                            <th>FOR RELEASE DATE</th>
                                            <th>DATE RELEASED</th>
                                            <th>STATUS</th>
                                            <th>REMARKS</th>
                                      </tr>

                                      <?php

//
//                                        if ($_SESSION['GROUP']=='ADMIN' OR $_SESSION['GROUP']=='POWER ADMIN')
//                                        {
//                                             $SQLquery="select document_id,document_title,fk_documenttype_id,
//                                                     priority,fk_office_name_documentlist,office_name,received_date,
//                                                     forrelease_date,received_comment,released_comment from 
//                                                     documentlist join security_user on documentlist.fk_security_username = 
//                                                     security_user.security_username join document_type on documentlist.fk_documenttype_id = 
//                                                     document_type.documenttype_id  join documentlist_tracker on documentlist.document_id=
//                                                     documentlist_tracker.fk_documentlist_id WHERE scrap=0 and complete=0  
//                                                     group by document_id order by transdate desc";
//                                        }
//                                        else
//                                        {
//                                            $SQLquery="select document_id,document_title,fk_documenttype_id,
//                                                     priority,fk_office_name_documentlist,office_name,received_date,
//                                                     forrelease_date,received_comment,released_comment from 
//                                                     documentlist join security_user on documentlist.fk_security_username = 
//                                                     security_user.security_username join document_type on documentlist.fk_documenttype_id = 
//                                                     document_type.documenttype_id  join documentlist_tracker on documentlist.document_id=
//                                                     documentlist_tracker.fk_documentlist_id WHERE scrap=0 and complete=0  
//                                                     and fk_office_name_documentlist = '".$_SESSION['OFFICE']."'
//                                                     group by document_id order by transdate desc";
//                                        }
//                                        $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
//                                                $rowcolor='';
//                                        while ($row = mysqli_fetch_array($result))
//                                	         {
//                                                       if( SummaryFilter($row['document_id']))
//                                                       {
//                                                    if ($rowcolor=="blue")
//                                                         {
//                                                            // echo '<tr id="'.$var["DOCUMENT_ID"].'" class="usercolor" onClick="clickSearch(\''.$var["DOCUMENT_ID"].'\',\''.$var["DOCUMENT_TITLE"].'\',\''.$var["DOCUMENT_DESCRIPTION"].'\',\''.$var["DOCUMENT_FILE"].'\',\''.$var["FK_TEMPLATE_ID"].'\',\''.$var["FK_DOCUMENTTYPE_ID"].'\',\''.$var["scrap"].'\')">';
//                                                            // echo '<tr id="id" onclick="function(\'string\',\'string\')">';
//                                                            echo '<tr class="bgcolor1" onClick="addRowHandlers();"><td>';
//                                                             $rowcolor="notblue";
//                                                         }
//                                                         else
//                                                         {
//                                                             echo '<tr class="bgcolor2" onClick="addRowHandlers();"><td>';
//                                                            // echo "<tr  id='".$var["SECURITY_NAME"]."' bgcolor='#2CC1F7'> <td>";
//                                                             $rowcolor="blue";
//                                                         }
//
//
//                                                               echo $row['document_id'];
//                                                               echo "</td><td>";
//                                                               echo $row['document_title'];
//                                                               echo "</td><td>";
//                                                               echo $row['fk_documenttype_id'];
//                                                               echo "</td><td>";
//                                                               echo $row['fk_office_name_documentlist'];
//                                                               echo "</td><td>";
//                                                               echo $docLocation;
//                                                               echo "</td><td>";
//                                                               echo $dateReceived;
//                                                               echo "</td><td>";
//                                                               echo $dateForrelease;
//                                                               echo "</td><td>";
//                                                               echo $dateReleased;
//                                                               echo "</td><td>";
//                                                               echo $docStatus;
//                                                               echo "</td><td>";
//                                                               echo $docRemarks;
//                                                               echo "</td></tr>";
//
//                                                 }}
                                                               //mysqli_close($con);
                                      ?>

                                  </table>-->
                        </div>

                                    <div class="SHOWinput">
                                        <label style="float: left; padding-top: 7px; margin-right:10px;">Filter:</label>
                                            <div class="alignRIGHT">
                                              <select id="type" name="type" class="form-control" onchange="refreshList()">
                                                  <option value='All'>All Documents</option>
                                                  <option value='Pending'>Pending Documents</option>
                                                  <option value='Approved'>Approved Documents</option>
						<?php // <option value='Processing'>On Process Documents</option> ?>
                                              </select>
                                            </div>
                                        <p>*Double click document to view full details.</p>
                                    </div>
                      </div>



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

				echo $_SESSION['Copyright']. "&nbsp;<img src=images/home/icon/copyleft-icon.png width='14' height='14' />&nbsp;" .$_SESSION['Year']. "&nbsp;" .$_SESSION['Developer'];
				echo "&nbsp|";


			?>

			<a href="#">Contact Us</a> | Designed by: <a href="#">MIS</a> | <a href="#">Scroll Top</a></p>
        </div>

    </div>

</div>


        <?php
        
        //FILTER SELECT QUERY TO SHOW (SHOW ALL,PENDING DOCS, APPROVED DOCS)
//        function SummaryFilter($docid)
//        
//        {
//            global $DB_HOST, $DB_USER,$DB_PASS, $BD_TABLE;
//            $con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$BD_TABLE);
//          global $dateReceived;
//          global $dateReleased;
//          global $dateForrelease;
//          global $docStatus;
//          global $docRemarks;
//          global $docLocation;
//          
////
////          switch ($filterDefinition)
////          {
////             case 'showAll':
//                $SQLquery='SELECT received_date,released_date,forrelease_date,office_name,
//                            released_comment,forrelease_comment,received_comment
//                            FROM documentlist_tracker WHERE fk_documentlist_id = "'.$docid.'"  AND
//                            RECEIVED_DATE IS NOT null ORDER BY sortorder DESC LIMIT 1';
//                
//                $result=mysqli_query($con,$SQLquery)or die(mysqli_error($con));
//                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
//                {
//                    $dateReceived=$row['received_date'];
//                    $dateReleased=$row['released_date'];
//                    $dateForrelease=$row['forrelease_date'];
//                    $docLocation=$row['office_name'];
//                   
//                    if ($row['released_date']<>'')
//                    {
//                        $docStatus='Released';
//                        $docRemarks=$row['released_comment'];
//                        return true;
//                    }
//                    elseif (($row['forrelease_date']<>'') AND ($row['released_date']=='')) 
//                    {
//                        $docStatus='For Pickup';
//                        $docRemarks=$row['forrelease_comment'];
//                        return true;
//                    }
//                    else
//                    {
//                        $docStatus='On Process';
//                        $docRemarks=$row['received_comment'];
//                        return true;
//                    }
//                    
//                
//                   
//                }
//                
////                break;
////          }
//      }
//               
//               
//               
//               
//        function SeekFilter($docid,$filterDefinition)
//            {
//
//                global $RecieveAt;
//                global $ReceivedDate;
//                $ReceivedDate='';
//
//
//                $sqlquery=select_info_multiple_key("SELECT FORRELEASE_VAL,RELEASED_VAL,RECEIVED_VAL,OFFICE_NAME, DOCUMENTLIST_TRACKER_ID, FK_DOCUMENTLIST_ID,SORTORDER,RECEIVED_DATE FROM documentlist_tracker WHERE FK_DOCUMENTLIST_ID = '".$docid."' ORDER BY SORTORDER ASC");
//                if (!$sqlquery)
//                {
//                    return false;
//
//                }
//
//
//                    switch($filterDefinition)
//
//                    {
//                        case 'DocumentsOnOffice':
//                            foreach($sqlquery as $rows)
//                            {
//                                if ($rows['OFFICE_NAME']==$_SESSION['OFFICE'])
//                                {
//                                    if ($rows['RELEASED_VAL']!=1 && $rows['RECEIVED_VAL']==1 )
//                                    {
//                                        //$_SESSION['keytracker']=$rows['DOCUMENTLIST_TRACKER_ID'];
//                                        $ReceivedDate=$rows['RECEIVED_DATE'];
//                                        return true;
//                                    }
//
//                                }
//                            }
//                            return false;
//
//                        case 'ReceivableDocument':
//                             foreach($sqlquery as $rows)
//                            {
//                                if ($rows['FORRELEASE_VAL']==1 and $rows['RELEASED_VAL']!=1)
//                                {
//                                    $RecieveAt=$rows['OFFICE_NAME'];
//                                   // $RecieveAt="adasdasd";
//                                        return true;
//                                }
//                            }
//                            return false;
//
//                    }
//
//
//
//                }


            ?>


    <!-- Modal -->
       <?php
       include('modal.php');
       ?>
<!-- End Modal -->




    <script type="text/javascript">
    //AUTOFUNCTION ON LOAD
    function refreshList()
    {
        //alert(document.getElementById("type").value);
        var myData = 'action='+ document.getElementById("type").value;
       jQuery.ajax({
                type: "POST",
                url:"renderHome.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
                            $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
                    },
                ajaxError: function() {
                            $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                success:function(response){
                            $("#docList").html(response);
                            

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        }); 
    }

    //FUNCTION THAT REFRESH THE LIST OF DOCUMENTS WHEN CHANGED ON COMBOBOX 
    function addRowHandlers()
    {
       
            var table = document.getElementById('HOMEdata');
             //alert (table);

        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                                            var cell = row.getElementsByTagName("td")[0];
                                            var id = cell.innerHTML;


                                           retrieveDocument(id);
                                           $('#myModal').modal('show');
                                     };
                };

            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    
    //FUNCTION THAT RETRIEVES THE DOCUMENT FROM addRowHandlers() AND OPENS MODAL FORM
    function retrieveDocument(BarcodeId)
    {
            var myData = 'documentTracker='+BarcodeId; //build a post data structure
            jQuery.ajax({
                type: "POST",
                url:"procedures/home/document/common/retrievedata.php",
                dataType:"text", // Data type, HTML, json etc.
                data:myData,
                beforeSend: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                ajaxError: function() {
                    $("#responds").html("<div id='loadingModal'><img src='images/home/ajax-loader.gif' /></div>");
                    },
                success:function(response){
                    $("#responds").html(response);
                

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        });

        }

   
$(document).ready(function(){
//refreshList();
});

</script>
</body>
</html>
