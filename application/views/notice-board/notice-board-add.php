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
  <head>
    <?php $this->load->view('common/header_styles'); ?>
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
    <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/module/notice-board/css/notice-board-custom.css<?php echo $global_asset_version; ?>" rel="stylesheet" type="text/css" /> <!-- BEGIN PAGE LEVEL PLUGINS -->
    <div class="clearfix">
    </div>
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
          <div class="portlet portlet-fluid-background">
            <div class="row">
              <!-- END PAGE HEADER-->
              <!-- START PAGE CONTENT-->
              <div class="container-fluid">

                <div class="text-center title_wrap mt-20">
                  <h3 class="page-title text-center">Add Notice Board
                  </h3>
                  <span class="sp_line color-primary">
                  </span>
                </div>
                  <form role="form" id="notice_board_add" class="col-md-push-2 col-md-8 form_edit">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea name="summernote" class="form-control" id="summernote_1"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group youtube-link-url">
                            <div class="input-group">
                                <span class="input-group-addon input-video-link">
                                  URL
                                </span>
                                <input type="text" class="form-control input-video" placeholder="Youtube URL">
                            </div>
                              
                          </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-md-12">
                          
                          <div class="box" style="display: contents;">
                            <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                            <label for="file-1" title="Add Photo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Photo</span></label>
                          </div>
                          <a href="#" class="notice-custom-button notice-board-video" title="Add Youtube Link"><i class="fab fa-youtube list-level"></i> Video</a>
                      </div>
                          
                    </div>
                      
                    <div class="row">
                      <div class="col-md-12">
                        <div id="image_preview" class="image_preview"></div>
                      </div>
                      <div class="col-md-12">
                       
                      </div>
                    </div>
                    
                </div>
              </div>
              <?php $this->load->view('common/footer-buttons',array('view_type' => VIEW_TYPE_ADD)); ?>   
              
              </form>
          </div>
        </div>
      <!-- END CONTAINER -->
      <div class="js-scripts">
        <?php $this->load->view('common/footer_scripts'); ?>
        <script src="<?php echo base_url(); ?>assets/module/notice-board/js/custom-input.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js<?php echo $global_asset_version; ?>" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $(".youtube-link-url").hide(); 
             $('.notice-board-video').click(function(){
                 $(".youtube-link-url").slideToggle();
             });
              
          });
        </script>
        <script type="text/javascript">
          $('.inputfile-1').change(function(e) {
            preview_image(e);
          });

          function preview_image(event) {
            var total_file = $('.inputfile-1')[0].files.length;
            $('#image_preview').html('');
            for(var i = 0; i < total_file; i++) {
              $('#image_preview').append("<span class=\"pip\">" + "<img class=\"imageThumb\" src=\"" + URL.createObjectURL(event.target.files[i]) + "\" width=\"auto\" height=\"160px\"  />" + "</span>");
            }
          }
        </script>
        <script type="text/javascript">
          $('#summernote_1').summernote({
                placeholder: "What's on your mind ?",height: 100
              });
        </script>

    



        

        <!-- OPTIONAL SCRIPTS -->
      </div>


</body>
</html>
