<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />     
    <meta content="" name="author" />
    <title><?php echo $title.' | '.TITLE_POSTFIX; ?></title>
    <head>
      <?php $this->load->view('common/header_styles'); ?>
    </head>
     
      <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <?php $this->load->view('common/header'); ?>
        <div class="clearfix"> </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('common/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content page-content-detail">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar" id="breadcrumbs-list">
                        <?php echo $breadcrumb; ?>
                        <div class="breadcrumb-button">
                            <a href="<?php echo base_url('product-details-'.$productdata->prev_encrypt) ?>" class=" previous" title="">
                                <button id="newlead" class="btn green">
                                    <i class="fa fa-arrow-left"></i>
                                    <!-- Previous  -->
                                </button>
                            </a>
                            <a href="<?php echo base_url('product-details-'.$productdata->next_encrypt) ?>" class="next">
                                <button id="newlead" class="btn green">
                                    <!-- Next --><i class="fa fa-arrow-right"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="portlet">
                        <div class="row">
                            <!-- END PAGE HEADER-->
                            <div class="container-fluid">
                                <!-- -----MAIN CONTENTS START HERE----- -->
     
                              <?php
                              $prdData['prd_id'] = $productdata->prd_id;
                              $prdencryptedId = $this->nextasy_url_encrypt->encrypt_openssl($productdata->prd_id);
                              // $this->load->view('product/product_sidebar',$prdData);
                              ?>
     
                                  <aside class="profile-info col-lg-12">
                                     <section class="panel">
                                        <div class="panel-body bio-graph-info panel-body-detail-view panel-detail-view">
                                         <!--  <div>
                                             <span class="detail-list-heading">Product Details</span> 
                                          </div> -->
                                         <!--  <div class="col-md-12">
                                            <span class="detail-list-heading">Product Details</span>
                                          </div> -->
                                          
                                           <div class="text-center invoice-btn col-lg-offset-10">
                                           </div>
                                           <header class="panel-heading color-primary panelHeading">
                                            <div class="row detail-box">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
     
                                                <div class="row inner-row">
                                                   
                                            <span class="detail-list-heading">Product Details</span><br>
                                         
                                                  <span class="panel-title"><?php 
                                                 
                                                  if(isset($productdata->prd_name)) echo $productdata->prd_name; ?> - <?php if(isset($productdata->prd_unit_name)) echo $productdata->prd_unit_name; 
                                                   echo isset($productdata->prd_code) ?  ' '.$productdata->prd_code:'';?></span>&nbsp;&nbsp;
                                                   <?php if(!property_exists($productdata, 'private_access') || (property_exists($productdata, 'private_access') && $productdata->private_access == 1)) { ?>
                                                  <?php if($edit_access) { ?>
                                                    <a class="btn-edit" href="<?php echo base_url('product-edit-'.$productdata->prd_id_encrypt) ?>">
                                                     <i class="fa fa-edit">
                                                    </i>
                                                    <span class="btn-text"> Edit
                                                    </span>
                                                  </a>
                                                  <?php } ?>
                                                  <?php if($delete_access) { ?>
                                                    <a class="btn-edit" onclick="deleteProduct('<?php echo $productdata->prd_id_encrypt; ?>');">
                                                     <i class="fa fa-trash">
                                                    </i>
                                                    <span class="btn-text"> Delete
                                                    </span>
                                                  </a>
                                                  <?php }  }?>
                                                </div>
                                              </div>
                                              <div class="col-md-6 col-sm-6 col-xs-12 created-title created-title-view-list">
                                                <span class="created">Created By: <?php if(isset($productdata->prd_crdt_by_name)) echo $productdata->prd_crdt_by_name; ?>
                                                </span>
                                                <br>
                                                <span class="sp-date">Created On: <?php if(isset($productdata->prd_crdt_dt)) echo display_date($productdata->prd_crdt_dt); ?>
                                                </span>
                                              </div>
                                            </div>
                                          </header>
                                           <div class="table-responsive">
                                              <table class="table table-detail-custom table-style">
                                                 <tbody>
                                                  <tr>
                                                    <td><i class="fas fa-project-diagram list-level"></i>Product Category</td>
                                                    <td colspan="<?php echo ($product_unit == '1') ? '':3; ?>"><?php  echo isset($productdata->prd_category_name) ? $productdata->prd_category_name:''; ?></td>
                                                    <?php  if($product_unit == '1'){ ?>
                                                    <td><i class="fas fa-ruler-combined color-pink list-level"></i>Unit</td>
                                                    <td><?php  echo isset($productdata->prd_unit_name) ? $productdata->prd_unit_name:''; ?></td>
                                                  <?php } ?>
                                                    <!-- <td><i class="fas fa-coins list-level"></i>Cost</td>
                                                    <td><?php if(isset($productdata->prd_price)) echo number_format($productdata->prd_price); ?></td> -->
                                                  </tr>
                                                  <tr>
                                                    <!--  <td>Name</td>
                                                     <td><?php if(isset($productdata->prd_name)) echo $productdata->prd_name; ?></td> -->
                                                     
                                                     <td><i class="fas fa-address-card list-level"></i>HSN</td>
                                                     <td><?php if(isset($productdata->prd_hsn_code)) echo $productdata->prd_hsn_code; ?></td>
                                                     <td><i class="fas fa-id-card list-level"></i>Tax</td>
                                                     <td><?php if(isset($productdata->prd_gst)) echo $productdata->prd_gst; ?></td>
                                                  </tr>
                                                 <!--  <tr>
                                                    <td><i class="fas fa-weight-hanging color-pink list-level"></i>Size</td>
                                                    <td>1200</td>
                                                    <td><i class="fas fa-ruler-combined color-pink list-level"></i>Unit</td>
                                                    <td>gms</td>
                                                  </tr> -->
                                                  
                                                    <?php if($product_size != '1'){ 
                                                        foreach ($product_variant as $product_variant_key) { ?>
                                                        <tr>
                                                          <td><i class="fas fa-weight-hanging color-pink list-level" aria-hidden="true"></i>Cost</td>
                                                          <td><?php echo  $product_variant_key->prv_price; ?></td>
                                                          <td><i class="fas fa-qrcode color-dark-blue list-level" aria-hidden="true"></i>Barcode</td>
                                                          <td><?php echo  $product_variant_key->prv_barcode; ?></td>
                                                        </tr>
                                                      <?php } 
                                                 } ?>
                                                 <tr>
                                                    <td><i class="fa fa-comments list-level" aria-hidden="true"></i>Description</td>
                                                    <td colspan="3"><?php  echo isset($productdata->prd_desc) ? $productdata->prd_desc:''; ?></td>
                                                  </tr>
                                                 </tbody>
                                              </table>
                                           </div>
                                        </div>
                                     </section>
                                  </aside>
                              <?php if($product_size == '1'){ ?>
                                  <aside class="profile-info col-md-12 mb-20">
                                      <section>
                                          <div>
                                              <div class="flip-scroll table-div">
                                                  <table class="table table-bordered table-striped table-condensed flip-content custom-flip-content">
                                                      <thead class="flip-content">
                                                          <tr>
                                                              <th>SKU</th>
                                                              <th>Variant</th>
                                                              <th>Cost</th>
                                                              <th>Barcode</th>
                                                              
                                                          </tr>
                                                      </thead>
                                                      <?php foreach ($product_variant as $product_variant_key) { ?>
                                                        <tr>
                                                          <td><?php echo  $product_variant_key->prv_sku; ?></td>
                                                          <td><?php echo  $product_variant_key->prv_variant_name; ?></td>
                                                          <td><?php echo  $product_variant_key->prv_price; ?></td>
                                                          <td><?php echo  $product_variant_key->prv_barcode; ?></td>
                                                        </tr>
                                                      <?php } ?>
                                                  </table>
                                              </div>
                                              
                                          </div>
                                      </section>
                                  </aside>
                              <?php } ?>
                                <!-- -----MAIN CONTENTS END HERE----- -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <div class="js-scripts">
     
          <?php $this->load->view('common/footer_scripts'); ?>
         
        </div>
        <script type="text/javascript">
          
            function deleteProduct(prd_id)
            {
              cswal({
                text : 'Do you want to delete this Product?', 
                title   : 'Done', 
                type    : 'delete', 
                onyes : function(){
                  $.ajax({
                    type: "POST",
                    url: "product/deleteProduct",
                    data:{prd_id:prd_id},
                    success: function(response) {
                      response = JSON.parse(response);
                      if(response.success == true) {
                        swal({
                          title: "Done",
                          text: response.message,
                          type: "success",
                          icon: "success",
                          button: true,
                        })
                      } else {
                        swal({
                          title: "Opps",
                          text: "Something Went wrong",
                          type: "error",
                          icon: "error",
                          button: true,
                        });
                      }
                      location.href = response.linkn;
                    }
                  });
                }
              });
            }
        </script>
    </body>
     
</html>
