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

    <!-- OPTIONAL LAYOUT STYLES -->
    <?php $this->load->view('email/common/email_styles'); ?>
    <!-- END OPTIONAL LAYOUT STYLES -->
  </head>
  <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <?php $this->load->view('common/header'); ?>
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

          <div class="portlet portlet-fluid-background email-background">
            <div class="inbox">
                <div class="col-md-12 no-side-padding inbox-row">
                    <?php $this->load->view('email/common/email_sidebar'); ?>
                    <div class="col-md-10 half-side-padding">
                        <div class="inbox-body">
                            <div class="inbox-header">
                                <h1 class="pull-left page-title page-list-title">Compose</h1>
                                <!-- <div class="form-group form-compose pull-right">
                                  <input type="text" placeholder="Search" name="email-search" class="form-control form-control-search">
                                  <button class="btn-search-mail" title="Search">
                                    <i class="fas fa-search"></i>
                                  </button>
                                </div> -->
                            </div>
                            <div class="inbox-content">
                                  <form class="inbox-compose form-horizontal" id="fileupload">
                                      <div class="inbox-compose-btn">
                                          <button class="btn green">
                                              <i class="fa fa-check"></i>&nbsp; Send</button>
                                          <button class="btn default inbox-discard-btn">Discard</button>
                                          <button class="btn default">Draft</button>
                                          <!-- <button class="btn default">Draft</button> -->
                                          <button class="btn default">Save As Template</button>

                                      </div>
                                      <div class="inbox-form-group mail-to">
                                          <label class="control-label">To:</label>
                                          <div class="controls controls-to">
                                            <input type="text" name="to" class="form-control" data-role="tagsinput" >
                                              <!-- <input type="text" class="form-control" name="to"> -->
                                              <span class="inbox-cc-bcc">
                                                  <span class="inbox-cc"> Cc </span>
                                                  <span class="inbox-bcc"> Bcc </span>
                                              </span>
                                          </div>
                                      </div>
                                      <div class="inbox-form-group input-cc display-hide">
                                          <a href="javascript:;" class="close"> </a>
                                          <label class="control-label">Cc:</label>
                                          <div class="controls controls-cc">
                                            <input type="text" name="cc" class="form-control" data-role="tagsinput" >
                                              <!-- <input type="text" name="cc" class="form-control"> --> </div>
                                      </div>
                                      <div class="inbox-form-group input-bcc display-hide">
                                          <a href="javascript:;" class="close"> </a>
                                          <label class="control-label">Bcc:</label>
                                          <div class="controls controls-bcc">
                                            <input type="text" name="bcc" class="form-control" data-role="tagsinput" >
                                              <!-- <input type="text" name="bcc" class="form-control" data-role="tagsinput"> --> </div>
                                      </div>
                                      <div class="inbox-form-group">
                                          <label class="control-label">Subject:</label>
                                          <div class="controls">
                                              <input type="text" class="form-control" name="subject"> </div>
                                      </div>
                                      <div class="inbox-form-group">
                                          <!-- <textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea> -->

                                          <!-- <textarea class="wysihtml5 form-control" name="message" rows="12"></textarea> -->
                                          <textarea name="email-preview-summernote" class="email-preview-summernote" id="email-preview-summernote"></textarea>
                                      </div>
                                      <div class="inbox-compose-attachment">
                                          <div class="files" id="files1">
                                              <span class="btn default btn-file">
                                                  <i class="fa fa-plus"></i> <span>Add files...</span>
                                                  <input type="file" class="preview-file-email" name="addfile" multiple />
                                              </span>
                                              <br />
                                              <ul class="fileList"></ul>
                                          </div>
                                      </div>
                                      <!-- <div class="inbox-compose-attachment">
                                          
                                          <span class="btn green btn-outline fileinput-button">
                                              <i class="fa fa-plus"></i>
                                              <span> Add files... </span>
                                              <input type="file" name="files[]" multiple> </span>
                                          
                                          <table role="presentation" class="table table-striped margin-top-10">
                                              <tbody class="files"> </tbody>
                                          </table>
                                      </div> -->


                                      
                                      <div class="inbox-compose-btn">
                                          <button class="btn green">
                                              <i class="fa fa-check"></i> &nbsp;Send</button>
                                          <button class="btn default">Discard</button>
                                          <button class="btn default">Draft</button>
                                          <button class="btn default">Save As Template</button>
                                      </div>
                                  </form>     
                            </div>
                         
                        </div>
                    </div>
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
      
     
      <script type="text/javascript">
        $(document).ready(function() {
          $('#email-preview-summernote').summernote({height:300});
        });
        
      </script>
      
    </div>
  </body>
</html>
