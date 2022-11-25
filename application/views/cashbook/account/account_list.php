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
             <link href="<?php echo base_url(); ?>assets/module/cashbook/accounts/css/account-customs.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
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
                                        <span class="caption-subject bold">Account List</span> &nbsp;
                                        <div class="btn-group">
                                                <a id="sample_editable_1_new" href="<?php echo base_url('account-add'); ?>" class="btn green"> Add New
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                       </div>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-list account-list" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th><i class="fas fa-university list-level"></i>Name</th>
                                                <th><i class="far fa-credit-card list-level"></i>Description</th>
                                                <th><i class="fas fa-rupee-sign list-level"></i>Net amount</th>
                                                <th><i class="fas fa-cog list-level"></i>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
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
        <script src="<?php echo base_url(); ?>assets/module/cashbook/accounts/js/account-customs.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
       <script src="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>
		        <!-- <script src="<?php //echo base_url(); ?>assets/project/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script> -->



        <script type="text/javascript">

			$(document).ready(function(){
          			getAccountlist();          
        	});

        	

        	function getAccountlist()
        	{
        		var customDataTableElement = '.account-list';
        		$(customDataTableElement).DataTable().destroy();
	            var customDataTableCount   = '<?php echo $dataTableData->table_data_count; ?>';
	            var customDataTableServer  = <?php echo $dataTableData->table_server_status; ?>;
	            var customDataTableUrl     =  baseUrl + 'getaccountlist?table_data_count='+customDataTableCount;
	            var customDataTableColumns = [
	            	
	               {   'data'  : 'acc_name' ,
	                'render': function(data, type, row, meta)
	                {
	                  if(type === 'display'){
	                    link = `
	                           <a href="`+baseUrl+`account-detail-`+row.acc_id_encrypt+`" title=" Detail View "> `+row.acc_name+`</a>
	                          `;
	                  }
	                  return link;
	                }
	              },
	              {   'data'  : 'acc_desc' },
	              {   'data'  : 'net_amount' },
	              {   'data'  : 'acc_id_encrypt' ,
	                'render': function(data, type, row, meta)
	                {


	                  if(type === 'display'){
	                    link = `
	                            <a href="`+baseUrl+`account-edit-`+row.acc_id_encrypt+`" title="Edit Details ">
	                            <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;
	                            <a  onclick="deleteAccount('`+row.acc_id_encrypt+`')" title="Delete Details ">
	                            <i style="font-size: 18px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;

	                          `;

	                       if(row.acc_default == 1)
	                       {
	                       	link += `  Default &nbsp;  `;
	                       }
	                       else{
	                       	link += ` <a  onclick="defaultAccount('`+row.acc_id_encrypt+`')" title="Delete Details ">Make Default</a>&nbsp; `;
	                       }
	                  }
	                  return link;
	                }
	              }
	            
	            ];

	            customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
        	}

        	function deleteAccount(accountid)
	        {
	          if(!confirm('Do you really want to delete this entry'))
	          {
	            return;
	          }

	          $.ajax(
	          {
	            type: "POST",
	            url: baseUrl + "account-delete-"+accountid,
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
	                  getAccountlist();
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

	        function defaultAccount(accountid)
	        {
	          if(!confirm('Do you really want to change default account'))
	          {
	            return;
	          }

	          $.ajax(
	          {
	            type: "POST",
	            url: baseUrl + "account-default-"+accountid,
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
	                  getAccountlist();
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