<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <title>
    <?php echo $title.' | '.TITLE_POSTFIX; ?>
  </title>
  <style type="text/css">
    .add-inv-wrap{
      text-align: right;
    }
    .table td:nth-child(odd){
      background-color: transparent !important;
    }
    .receipt-wrap p{
      margin-top: 2px;
      margin-bottom: 2px;
    }
    .print-wrap{
      text-align: right;
    }
   
    .tbl-head {
      background: #1f1c1c!important; 
      color: white!important;
      -webkit-print-color-adjust: exact; 
    }
    .bill-details{
      padding-left: 30px !important;
      padding-right: 15px !important;
    }
    .inner-left{
      text-align: justify;
    }
    .inner-right{
      text-align: right;
      padding-right: 10px!important;
    }
    td
    {
      text-align: center;
      padding-right: 10px!important;
    }
    .clsng-bal
    {
      font-size: 20px;
    }
    .table-scrollable>.table{
      width: 100%!important;
      border: 1px solid #e7ecf1!important;
    }
    .table {
        width: 100%!important;
        margin-bottom: 20px;
        border: 1px solid #e7ecf1!important;
    }
    /*th, td { white-space: nowrap; } div.dataTables_wrapper { width: 1300px; margin: 0 auto; }*/
  </style>
    <?php $this->load->view('common/header_styles'); ?> 
  
      <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
  <head>
    <link rel="shortcut icon" href="favicon.ico" />
    <?php $this->load->view('common/header_styles'); ?> 
    <!-- OPTIONAL LAYOUT STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $global_asset_version ?>" rel="stylesheet" type="text/css" media="print" />    
    <!-- END OPTIONAL LAYOUT STYLES -->  
  </head>
  <body>
   <div class="portlet light" style="margin-bottom: 0px;">
      <div class="row">
        <!-- END PAGE HEADER-->
        <div class="container-fluid">
          <header>
            <div class="col-md-6 col-lg-6 col-xs-6">
              <div class="print-logo">
                <img src="<?php echo base_url().getLogo(); ?>"  alt="logo" class="logo-image" />
              </div>
              <address>
                  <?php  $due_amt       =  isset($company->due_amt) ? $company->due_amt:0; 
                          $bill_amt      =  isset($company->bill_amt) ? $company->bill_amt:0;
                          $paid_amt      =  isset($company->paid_amt) ? $company->paid_amt:0;
                          $on_acc        =  isset($company->on_acc) ? $company->on_acc:0;
                          $amount        =  $paid_amt; 
                          $ots_amt       =  $bill_amt-$amount; 
                          $pending_amt   =  isset($company->pending_amt) ? $company->pending_amt:0;
                          $total_due_amt =  $due_amt-$on_acc; 
                          $disc_amt      =  isset($company->disc_amt) ? $company->disc_amt:0; ?>
                <div style="margin-bottom: 8px;margin-top: 20px;">
                  <strong class="" style="font-size: 18px;text-transform: capitalize;" ><?php echo isset($company->cmp_name) ? $company->cmp_name:''; ?></strong>
                </div>
                <div style="margin-bottom: 5px;"><b><?php echo isset($company->cmp_address) ? $company->cmp_address:''; ?></b></div>
                <div style="margin-bottom: 5px;font-size: 14px;">
                   <b><?php echo isset($company->cmp_gst_no) ? ' GSTN - '.$company->cmp_gst_no:''; ?></b>
                </div>
              </address>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-6 add-inv-wrap">
              <h1 style="font-size: 28px;">OUTSTANDING REPORT</h1>
              <div style="vertical-align: baseline;padding-top: 70px;">
                <table style="float: right;">
                   <tr>
                  <td>Closing Balance :</td>
                  <td class="inner-right clsng-bal"><b> <?php  echo number_format($ots_amt,2); ?></b></td>
                </tr>
                <tr>
                  <td>As On :</td>
                  <td><b> <?php echo date('d M, Y'); ?></b></td>
                </tr>
               
              </table>
              </div>
            </div>
          </header>
          <div class="clearfix"></div>
          <!-- <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;"> -->
          <!-- <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
              <table class="table table-bordered table-hover">
                <tbody>
                  <tr>
                    <td style="padding-left: 2px!important;">Billed Amount </td>
                    <td style="padding-left: 2px!important;"><b>1,11,21,240.00 </b></td>
                    <td style="padding-left: 2px!important;">Paid Amount </td>
                    <td style="padding-left: 2px!important;"><b>11,10,000.00</b></td>
                    <td style="padding-left: 2px!important;">On Account</td>
                    <td style="padding-left: 2px!important;"><b>11,14,100.00</b></td>
                    
                  </tr>
                  <tr>
                    <td style="padding-left: 2px!important;">Closing Balance</td>
                    <td style="padding-left: 2px!important;"><b>11,11,240.00</b></td>
                    <td style="padding-left: 2px!important;">Pending Bills </td>
                    <td style="padding-left: 2px!important;"><b>11,15,340.00</b></td>
                    <td style="padding-left: 2px!important;">  Outstanding Amount</td>
                    <td style="padding-left: 2px!important;"><b>11,11,240.00</b></td>
                    
                  </tr>
                  <tr>
                    <td style="padding-left: 2px!important;">Due Amount</td>
                    <td style="padding-left: 2px!important;"><b>11,11,1240.00</b></td>
                    <td style="padding-left: 2px!important;">Discount Given</td>
                    <td colspan="3" style="padding-left: 2px!important;"><b>11,11,000.00</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div> -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
              <table class="table table-bordered table-hover">
                <tbody>
                 
                  <tr>
                    <td style="width:12%; padding-left: 2px!important;">Billed Amount </td>
                    <td style="padding-left: 2px!important;"><b><?php  echo number_format($bill_amt,2); ?></b></td>
                    <td style="width:12%;padding-left: 2px!important;">Paid Amount </td>
                    <td style="padding-left: 2px!important;"><b><?php  echo number_format($paid_amt,2); ?></b></td>
                    <td style="width:12%;padding-left: 2px!important;">On Account</td>
                    <td style="padding-left: 2px!important;"><b><?php  echo number_format($on_acc,2); ?></b></td>
                    <td style="width:12%;padding-left: 2px!important;">Closing Balance</td>
                    <td style="padding-left: 2px!important;"><b><?php  echo number_format($ots_amt,2); ?></b></td>
                  </tr>
                  <tr>
                    
                    <td style="padding-left: 2px!important;">Pending Bills </td>
                    <td style="padding-left: 2px!important;"><b><?php  echo number_format($pending_amt,2); ?></b></td>
                    <td style="padding-left: 2px!important;">  Outstanding Amount</td>
                    <td style="padding-left: 2px!important;"><b><?php  echo  ($ots_amt > 0) ? number_format($ots_amt,2):0; ?></b></td>
                    <td style="padding-left: 2px!important;">Due Amount</td>
                    <td style="padding-left: 2px!important;"><b><?php   echo ($total_due_amt) ? number_format($total_due_amt,2):0.00; ?></b></td>
                    <td style="padding-left: 2px!important;">Adjustment</td>
                    <td colspan="3" style="padding-left: 2px!important;"><b><?php echo number_format($disc_amt,2)?></b></td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
          <!-- <hr style="border-top: 1px solid #00607e; margin: 5px 0 10px 0;"> -->
          <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
              <table class="table" id="ots_payment_list">
                <thead class="tbl-head">
                  <tr>
                    <th style="text-align: center;">Sr No.</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Transaction No</th>
                    <th style="text-align: center;">Generate Date</th>
                    <th style="text-align: center;">Payment Date</th>
                    <!-- <th style="text-align: center;">Invoice Age</th> -->
                    <th style="text-align: center;">Debit Amt</th>
                    <th style="text-align: center;">Credit Amt</th>
                    <th style="text-align: center;">Net Amt</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                 <tfoot>
                <tr>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                    <td class="firstdata">  Total</td>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  </tr>
                 
              </tfoot> 
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
              <div style="background-color: #F5F5F5;padding:10px 15px;">
                <p style="margin-top: 0px;margin-bottom: 10px;">
                  <b>Payment Term</b>
                </p>
                <p style="margin-top: 0px;margin-bottom: 10px;">
                   <?php echo isset($company->cmp_payment_terms) ? $company->cmp_payment_terms:''; ?>
                </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 mt-40 print-wrap">
              <a class="btn green-haze hidden-print uppercase print-btn" onclick="javascript:window.print();">Print</a>
            </div>
          </div>
          <!-- <div class="row invoice-cust-add" style="margin-bottom: 10px;">
            <table class="table " style=" margin-bottom: 0px;">
              <tbody>
                <tr style="">
                  <td style="width: 15%;border-top: 0px solid #e7ecf1; padding-bottom: 5px;padding-top: 5px;">Billing Address <span class="pull-right" style="padding-right: 10px;">:</span></td>
                  <td>6/52, First Floor, Shree Ganesh Krupa CHS Opp Bharat Petrol Pump, Boraspada Road, New Link Rd, Kandivali West, </td>
                </tr>
              </tbody>
            </table>
          </div> -->
        </div>
      </div>
    </div>
      <?php $this->load->view('common/footer_scripts'); ?> 
        <script src="<?php echo base_url(); ?>assets/project/global/scripts/datatable.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
          <script src="<?php echo base_url(); ?>assets/project/global/plugins/datatables/datatables.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
              $(document).ready(function(){
                        getDataTableList();
                        datatableNoScroll();
                    });
                    function getDataTableList()
                    {
                        var customDataTableElement = '#ots_payment_list';
                        $(customDataTableElement).DataTable().destroy();
                       /* var customDataTableCount   = '<?php isset($dataTableData->table_data_count) ? $dataTableData->table_data_count:''; ?>';
                        var customDataTableServer   = '<?php isset($dataTableData->table_server_status) ? $dataTableData->table_server_status:''; ?>';*/
                         var customDataTableCount   = 0;
                        var customDataTableServer   = 0;
                        var customDataTableUrl     = baseUrl + 'outstanding/getCompanyOutstandingsList?table_data_count='+customDataTableCount+'&cmp_id='+<?php echo isset($company->inv_cmp_id) ? $company->inv_cmp_id:0; ?>;
                        var  columnDefs= [
                                              { className: "inner-right", "targets": [ 5 ] },
                                              { className: "inner-right", "targets": [ 6 ] },
                                              { className: "inner-right", "targets": [ 7 ] },
                                            ];
                        var customDataTableColumns = [
                            {   'data'  : 'payment_detail_id' },
                            {   'data'  : 'inv_payment_status_name' },
                            {   'data'  : 'payment_code'  },
                            {   'data'  : 'generated_date' },
                            {   'data'  : 'payment_date' },
                            
                            {   'data'  : 'payment_debit' },
                            {   'data'  : 'payment_credit' },
                            {   'data'  : 'payment_credit' ,
                                'render': function(data, type, row, meta)
                                {
                                  // nexlog(meta);
                                  var prev_row = meta.row;
                                    var prev_net=0;
                                  if(prev_row > 0)
                                  {
                                    prev_net_string=meta.settings.aoData[meta.row-1].anCells[7].innerText;
                                    prev_net = parseFloat(prev_net_string.replace(",", ''));
                                    // nexlog('prev_net'+parseFloat(prev_net_string.replace(",", ''))+' || row.payment_debit'+row.payment_debit+' || row.payment_credit ' +row.payment_credit);
                                  }
                                   if(row.payment_debit > 0 )
                                   {
                                    net  =parseFloat(row.payment_debit)+prev_net;
                                   }
                                   else
                                   {
                                    net  =prev_net-parseFloat(row.payment_credit);
                                   }
                                   /* if(row.payment_debit > 0 )
                                   {
                                    net  =row.payment_debit;
                                   }
                                   else
                                   {
                                    net  =row.payment_credit;
                                   }*/
                                       net = indiancurrency(parseFloat(net).toFixed(2));
                                       return net;
                                },
                            },
                     /*       {   'data'  : 'inv_id' ,
                                'render': function(data, type, row, meta)
                                {
                                  var link = '';
                                  if(row.private_access == 0)
                                    return "<?php echo FORM_INACCESS_MESSAGE; ?>";
                                  <?php if($edit_access) { ?>
                                     link += '<a href="'+baseUrl+'payment-details-'+row.ipt_encrypted_id+'" title="View Details "><i style="font-size: 15px; color:#EF7F1A;" class="fa fa-book" aria-hidden="true"></i></a>&nbsp;';
                                  <?php }?>
                                  <?php if($delete_access) { ?>
                                    link += '<a href="javascript:;" title="Delete Quotation" data-toggle="tooltip" onclick=deleteData("'+row.ipt_id+'")><i style="font-size: 18px; color:#EF7F1A;" class="fa fa-trash" aria-hidden="true"></i></a>&nbsp;';
                                  <?php } ?>
                                  return link;
                                }
                            }*/
                        ];
                       
                        var footerCallback =  function ( row, data, start, end, display ) {
                                      var api = this.api(), data;
                           
                                      // converting to interger to find total
                                      var intVal = function ( i ) {
                                          return typeof i === 'string' ?
                                              i.replace(/[\$,]/g, '')*1 :
                                              typeof i === 'number' ?
                                                  i : 0;
                                      };
                                        console.log(' api >>');
                                       

                                        console.log(' api <<');
                                      // computing column Total of the complete result 
                                      var debit_total = api
                                          .column(5)
                                          .data()
                                          .reduce( function (a, b) {
                                              return intVal(a) + intVal(b);
                                          }, 0 );
                                  
                                      var credit_Total = api
                                          .column(6)
                                          .data()
                                          .reduce( function (a, b) {
                                            console.log($(this));
                                              return intVal(a) + intVal(b);
                                          }, 0 );
                                    
                                     
                                      var net_Total = parseFloat(debit_total)-parseFloat(credit_Total);
                                      var closing_balance = parseFloat(debit_total)-parseFloat(net_Total);
                                       debit_total = indiancurrency(debit_total.toFixed(2));
                                       credit_Total = indiancurrency(credit_Total.toFixed(2));
                                       net_Total = indiancurrency(net_Total.toFixed(2));
                                    // console.log(' debit_total : '+debit_total+' credit_Total : '+credit_Total+' net_Total : '+net_Total);
                                
                                      // Update footer by showing the total with the reference of the column index 
                                // $( api.column( 0 ).footer() ).html('Total');
                                      $( api.column(5).footer() ).html(debit_total);
                                      $( api.column(6).footer() ).html(credit_Total);
                                      $( api.column(7).footer() ).html(net_Total);

                                  }
                        
                        customDatatablex({
                          element: customDataTableElement, 
                          url: customDataTableUrl, 
                          columns: customDataTableColumns, 
                          buttons : false, 
                          serverSide : customDataTableServer,
                          delay : 1000,
                          optParam : {
                         /*  <?php 
                              if($export_access)
                                echo 'exportAccess : true,';
                              if($print_access)
                                echo 'printAccess : true,';
                            ?>*/
                          },
                          sr_no: true,
                          footerCallback:footerCallback,
                          columnDefs:columnDefs,
                          searching: false,
                          paging: false,
                          info: false,
                        });
                        //customDatatable(customDataTableElement, customDataTableUrl, customDataTableColumns, true, customDataTableServer);
                    }

                    function datatableNoScroll(){
                      $(".table-scrollable").removeClass("table-scrollable");
                    }


        </script>
  </body>
</html>