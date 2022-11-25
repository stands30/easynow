    <!DOCTYPE html>
    <html lang="en">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
        <head>
            <link rel="shortcut icon" href="favicon.ico" />
            <?php $this->load->view('common/header_styles'); ?> 
        </head>
        <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
            <?php $this->load->view('common/header'); ?> 
            <!-- OPTIONAL LAYOUT STYLES -->
             <link href="<?php echo base_url(); ?>assets/module/cashbook/css/cashbook-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
           <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
            <div class="clearfix"> </div>
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <?php $this->load->view('common/sidebar'); ?> 
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar" id="breadcrumbs-list">
                            <?php echo $breadcrumb; ?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- END PAGE HEADER-->
                 
                                <!-- END PAGE HEADER-->
                                    <!-- -----MAIN CONTENTS START HERE----- -->
                                  
                                  <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!-- <i class="icon-settings font-dark"></i> -->
                                        <span class="caption-subject bold">Cashbook List</span> &nbsp;
                                       
                                        <div class="btn-group">
                                            <a id="sample_editable_1_new" href="<?php echo base_url('expense-add'); ?>" class="btn green"> Add Expense
                                                <i class="fa fa-plus"></i>
                                            </a>
                                       </div>
                                        <div class="btn-group">
                                             <a id="sample_editable_1_new" href="<?php echo base_url('income-add'); ?>" class="btn green"> Add Income
                                                <i class="fa fa-plus"></i>
                                            </a>
                                       </div>

                                       <div class="btn-group">
                                             <a id="sample_editable_1_new" onclick="return ConverToApproved()" class="btn green"> Approve
                                                <i class="fa fa-check"></i>
                                            </a>
                                       </div>

                                       <div class="btn-group">
                                             <a id="sample_editable_1_new" onclick="return ConverToRejected()" class="btn green"> Reject
                                                <i class="fa fa-close"></i>
                                            </a>
                                       </div>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                	<form method="post" enctype="multipart/form-data" id="frmListing">
	                                    <table class="table table-striped table-bordered table-hover table-list cashbook-list" id="sample_1">
	                                        <thead>
	                                            <tr>
	                                            	<th> </th>
	                                                <th><i class="fas fa-th-list list-level"></i>Particular</th>
								                    <th><i class="fas fa-rupee-sign list-level"></i>Amount </th>
								                    <th><i class="fas fa-calendar-alt list-level"></i>Date</th>
								                    <th><i class="fas fa-money-bill-alt list-level"></i>Type</th>
								                    <th><i class="far fa-money-bill-alt list-level"></i>Account </th>
								                    <th><i class="fas fa-info-circle list-level"></i>Status </th>
	                                                <th><i class="fas fa-cog list-level"></i>Action</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                        </tbody>
	                                    </table>
	                                </form>
                                </div>
                            </div>
                                <!-- -----MAIN CONTENTS END HERE----- -->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <div class="js-scripts">
                <?php $this->load->view('common/footer_scripts'); ?> 
                
                <!-- OPTIONAL SCRIPTS -->
                
                <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/module/cashbook/js/cashbook-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
        <script type="text/javascript">

			$(document).ready(function(){
          			getCashbooklist();          
        	});

        	function getCashbooklist()
        	{
        		var customDataTableElement = '.cashbook-list';
        		$(customDataTableElement).DataTable().destroy();
	            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
	            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
	            var customDataTableUrl     =  baseUrl + 'getcashbooklist?table_data_count='+customDataTableCount;
	            var customDataTableColumns = [
	            	
	             {   'data'  : 'csb_id' ,
	                'render': function(data, type, row, meta)
	                {
	                  if(type === 'display'){
	                    link = `
	                            <input name="chkId[]" value="`+row.csb_id+`" type="checkbox" class="checkthis" />
	                            
	                          `;
	                  }
	                  return link;
	                }
	              },
	             {   'data'  : 'csb_particular' ,
	                'render': function(data, type, row, meta)
	                {
	                  if(type === 'display'){
	                    link = `
	                           <a href="`+baseUrl+`cashbook-detail-`+row.csb_id_encrypt+`" title=" Detail View "> `+row.csb_particular+`</a>
	                          `;
	                  }
	                  return link;
	                }
	              },
	              {   'data'  : 'csb_amount' },
	              {   'data'  : 'csbdate' },
	              {   'data'  : 'csb_type_name' },
	              {   'data'  : 'csb_acc_name' },
	              {   'data'  : 'csb_approve_name' },
	              {   'data'  : 'csb_id_encrypt' ,
	                'render': function(data, type, row, meta)
	                {
	                  if(type === 'display'){
	                    link = `
	                            <a href="`+baseUrl+row.csb_type_1+`-edit-`+row.csb_id_encrypt+`" title="Edit Details ">
	                            <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
	                             <a  onclick="deleteCashbook('`+row.csb_id_encrypt+`')" title="Delete Details ">
	                            <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;
	                          `;
	                  }
	                  return link;
	                }
	              }
	            
	            ];

	            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
        	}

        	function deleteCashbook(cashbookid)
	        {
	          if(!confirm('Do you really want to delete this entry'))
	          {
	            return;
	          }

	          $.ajax(
	          {
	            type: "POST",
	            url: baseUrl + "cashbook-delete-"+cashbookid,
	            success: function(response)
	            {
	              response = JSON.parse(response);
	              
	              if (response.success == true)
	              {
	                swal({
	                  title: "Done",
	                  text: response.message,
	                  type: "success",
	                  icon: "success",
	                  button: true,
	                }).then(()=>{
	                  getCashbooklist();
	                });
	              }
	              else
	              {
	                swal({
	                  title: "Opps",
	                  text: "Something Went wrong",
	                  type: "error",
	                  icon: "error",
	                  button: true,
	                });
	              }
	            }
	          });
	        }

	        function ConverToApproved()
	        {
	        	
	        	
		        var checked = jQuery('input[name="chkId[]"]:checked').length > 0;

	            if (!checked){
	                alert("Please select at least one record to Approved");
	                return false;
	            }

		        if(!confirm('Do you really want to approve this entries'))
		        {
		            return;
		        }
		        var dataString = $('#frmListing').serialize();
		          $.ajax(
		          {
		            type: "POST",
		            url: baseUrl + "cashbook-approve",
		            data : dataString,
		            success: function(response)
		            {
		              response = JSON.parse(response);
		              
		              if (response.success == true)
		              {
		                swal({
		                  title: "Done",
		                  text: response.message,
		                  type: "success",
		                  icon: "success",
		                  button: true,
		                }).then(()=>{
		                  getCashbooklist();
		                });
		              }
		              else
		              {
		                swal({
		                  title: "Opps",
		                  text: "Something Went wrong",
		                  type: "error",
		                  icon: "error",
		                  button: true,
		                });
		              }
		            }
		          });
	        }


	        function ConverToRejected()
	        {
	        
		        var checked = jQuery('input[name="chkId[]"]:checked').length > 0;

	            if (!checked){
	                alert("Please select at least one record to reject");
	                return false;
	            }

		        if(!confirm('Do you really want to reject this entries'))
		        {
		            return;
		        }
		        var dataString = $('#frmListing').serialize();
		          $.ajax(
		          {
		            type: "POST",
		            url: baseUrl + "cashbook-reject",
		            data : dataString,
		            success: function(response)
		            {
		              response = JSON.parse(response);
		              
		              if (response.success == true)
		              {
		                swal({
		                  title: "Done",
		                  text: response.message,
		                  type: "success",
		                  icon: "success",
		                  button: true,
		                }).then(()=>{
		                  getCashbooklist();
		                });
		              }
		              else
		              {
		                swal({
		                  title: "Opps",
		                  text: "Something Went wrong",
		                  type: "error",
		                  icon: "error",
		                  button: true,
		                });
		              }
		            }
		          });
	        }


        		
            </script>
        </div>
    </body>
</html>