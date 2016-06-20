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
<link rel="stylesheet" type="text/css" href="css/bootstrap-table.css" />
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.growl.js"></script>


<script src="js/bootstrap-table.js"></script>



<link href="css/bootstrap-submenu.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />

<script src="js/bootstrap-select.js"></script>

</head>

<body>
<!------------------------------------------- header -------------------------------->
    <?php
    $PROJECT_ROOT= '';
    include_once('header.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
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
		
		<div id="rightmenu">
		
		    
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
				<div class="container">
    				<div class="row">

			        	<div class="col-md-12 postTable">
			
											<div class="card">
													<ul class="nav nav-tabs" role="tablist">
														<li class="active" role="presentation"><a href="#home" aria-controls="profile" role="tab" data-toggle="tab">Docs</a></li>
														<li role="presentation"><a href="#stats" aria-controls="home" role="tab" data-toggle="tab">Statistics</a></li>
														
														<li role="presentation"><a href="#info" aria-controls="messages" role="tab" data-toggle="tab">Info</a></li>
														
													</ul>

														<div class="tab-content">
															
														  <div id="home" class="tab-pane fade in active">
														  	
														  	
														  	
														  	
																<div class="row">
																<div class="col-md-4">
																
																
																
																		<div id='docList' class="containers">
																			
																						<table id="tblprocess"
															             	data-height="405"
															               data-toggle="table"
															               class="display table table-bordered"
															               >
															             <thead>
													            <tr>
													                <th data-field="barcode" data-sortable="true">Barcode</th>
													                <th data-field="title" data-sortable="true">Title</th>
													                <th data-field="office" data-sortable="true">Office</th>
													               
													               
													            </tr>
													            </thead>
															        </table>
																		</div>
																		
																		</div>
																		
																		
																		<div class="col-md-8">
																			<div id="docinfo">
																				
																				
																				
																				
																			</div>
																		
																		
																		</div>
														
														
														
														</div>
														
														
														
														
														
																		
																
														  </div>
														  <div id="stats" class="tab-pane fade">
<!------------------------------------------- STATS  --------------------------------><!------------------------------------------- STATS  -------------------------------->
<!------------------------------------------- STATS  --------------------------------><!------------------------------------------- STATS  -------------------------------->
															
														
															
															
<!------------------------------------------- STATS --------------------------------><!------------------------------------------- STATS  -------------------------------->
<!------------------------------------------- STATS  --------------------------------><!------------------------------------------- STATS  -------------------------------->
															<p>
															
															
															</p>
														  </div>
														
														</div>
											</div>
			
			                    
			            	 <div class="tfclear"></div>
			
			
			            </div>
			            

        		</div>
				</div>
    </div>

</div>
<!------------------------------------------- end content -------------------------------->

<!------------------------------------ footer ------------------------------------->
	<?php
    $PROJECT_ROOT= '';
    include_once('footer.php');
    //require_once("/procedures/connection.php");
    include_once($PROJECT_ROOT.'qvJscript.php');
   
   
   
  ?>
<!------------------------------------ end footer ------------------------------------->
   <!-- Modal -->
       <?php
       include('modal.php');
       ?>
<!-- End Modal -->





<script type="text/javascript">
    //AUTOFUNCTION ON LOAD
    function refreshList(retrieveAlldata)
    {
        //alert(document.getElementById("type").value);
        
        var myData = document.getElementById("type").value;
       jQuery.ajax({
                type: "POST",
                url:"renderHome.php",
                dataType:"json", // Data type, HTML, json etc.
                data:{action:myData,retrieveAll:retrieveAlldata},
                beforeSend: function() {
                           // $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
                          $('#tableBootstrap').bootstrapTable("showLoading");
                    },
//                ajaxError: function() {
//                            $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' /></div>");
//                    },
                success:function(response){
                            //$("#docList").html(response);
                            $('#tableBootstrap').bootstrapTable("hideLoading");
                            
                             $('#tableBootstrap').bootstrapTable("load",response);

                },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(thrownError);
                }
            });
             $(window).load(function(){
            //$('#myModal').modal('show');
        }); 
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

	alert("Docprocess update use only");
		$('#feedbackDiv').feedBackBox();
		renderDocProcessList();
		//refreshList(true);
		
//		$('#chkRecord').click(function() {
//			 
//        if ($("#chkRecord").prop('checked'))
//        {
//        	refreshList(true);
//        
//        }
//        else
//        	{
//        		refreshList(false);
//        	
//        	}
//    });
//		
//		$('.selectpicker').selectpicker();

 $("select").change(function(event) {
        // this.append wouldn't work
        alert(event.target.id);
    });
  

 
});
		
function sendData(id,value)
{
	var mod="updateDocProcess";
	jQuery.ajax({
      type: "POST",
      url:"docprocess/crud.php",
      dataType:"text", // Data type, HTML, json etc.
      data:{module:mod,trackerid:id,processvalue:value},
      beforeSend: function() {
                 // $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
               // $('#tblprocess').bootstrapTable("showLoading");
          },

      success:function(response){
					if (response=='success')
					{
						
							$.growl.notice({ message: "Update success" });
					}
					else
						{
							$.growl.error({ message: response });
						}
							
						
      },
      error:function (xhr, ajaxOptions, thrownError){
//          alert(thrownError);
          	$.growl.error({ message: thrownError });
      }
            });
	
}
	
function renderDocProcessList()
{
	var mod="renderDocProcessList";
	jQuery.ajax({
      type: "POST",
      url:"docprocess/crud.php",
      dataType:"json", // Data type, HTML, json etc.
      data:{module:mod},
      beforeSend: function() {
                 // $("#docList").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
                $('#tblprocess').bootstrapTable("showLoading");
          },

      success:function(response){
                  //$("#docList").html(response);
                  $('#tblprocess').bootstrapTable("hideLoading");
                 
                   $('#tblprocess').bootstrapTable("load",response);

      },
      error:function (xhr, ajaxOptions, thrownError){
          alert(thrownError);
      }
            });
}

function renderProcessListInfo(barcodeNo)
{
	var mod="renderProcessListInfo";
	
	jQuery.ajax({
      type: "POST",
      url:"docprocess/crud.php",
      dataType:"html", // Data type, HTML, json etc.
      data:{module:mod,docID:barcodeNo},
      beforeSend: function() {
                  $("#docinfo").html("<div id='loading'><img src='images/home/ajax-loader.gif' align='middle' /></div>");
              //  $('#tblprocess').bootstrapTable("showLoading");
          },

      success:function(response){
                  $("#docinfo").html(response);
                //  $('#tblprocess').bootstrapTable("hideLoading");
                 
                 //  $('#tblprocess').bootstrapTable("load",response);

      },
      error:function (xhr, ajaxOptions, thrownError){
          alert(thrownError);
      }
            });
	
}




$('#tblprocess').on('click-row.bs.table', function (e, row, $element) {
 //    console.log(row);
   renderProcessListInfo(row['barcode']);
   
});


        
//function getName()
//{
//		//alert($(this).attr('name'));
//		 alert(event.target.id);
//}
// 


</script>




</body>
</html>
