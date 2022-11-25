<script src="<?php echo base_url(); ?>assets/project/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/pages/scripts/components-editors.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/project/app/scripts/inbox.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/project/project-scripts/inbox-modal.js" type="text/javascript"></script> 

<div id="compose-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-list-content">
      <div class="modal-header">
        <button type="button" class="email-modal-close" data-dismiss="modal" title="Close">&times;</button>
        <h4 class="modal-title modal-email-title text-center bold">Compose</h4>
      </div>
      <div class="modal-body">
        <div class="inbox-content">
            <form class="inbox-modal-compose form-horizontal">
              <div class="inbox-form-group mail-to">
                  <label class="control-label">To:</label>
                  <div class="controls-modal controls-modal-to">
                    <input type="text" name="to" class="form-control" data-role="tagsinput" >
                      <!-- <input type="text" class="form-control" name="to"> -->
                      <span class="inbox-modal-cc-bcc ">
                          <span class="inbox-modal-cc"> Cc </span>
                          <span class="inbox-modal-bcc"> Bcc </span>
                      </span>
                  </div>
              </div>
              <div class="inbox-form-group input-modal-cc display-hide">
                  <a href="javascript:;" class="close"> </a>
                  <label class="control-label">Cc:</label>
                  <div class="controls controls-modal-cc">
                    <input type="text" name="cc" class="form-control" data-role="tagsinput" >
                  </div>
              </div>
              <div class="inbox-form-group input-modal-bcc display-hide">
                  <a href="javascript:;" class="close"> </a>
                  <label class="control-label">Bcc:</label>
                  <div class="controls controls-modal-bcc">
                    <input type="text" name="bcc" class="form-control" data-role="tagsinput" >
                  </div>
              </div>

              <div class="inbox-form-group">
                <label class="control-label">Subject:</label>
                <div class="controls-modal">
                  <input type="text" class="form-control" name="subject">
                </div>
              </div>

              	<div class="inbox-form-group">
                  <textarea name="modal-note" class="form-control" id="email-modal-desc"></textarea>
              	</div>

               <div class="inbox-compose-attachment">
                  	<div class="files" id="files2">
                      	<span class="btn default btn-file">
                          	<i class="fa fa-plus"></i> <span>Add files...</span>
                            <!-- <input type="file" name="addfile" multiple style="width: 1px;height: 1px;" /> -->
                            <input type="file" class="modal-file-upload" name="addfile" multiple />
                      	</span>
                      	<br />
                      	<ul class="fileList"></ul>
                  	</div>
              	</div>

            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn green"><i class="fa fa-check"></i>&nbsp; Send</button>
        <button type="button" class="btn default">Discard</button>
        <button type="button" class="btn default">Draft</button>
        <button type="button" class="btn default">Save As Template</button>
        <button type="button" class="btn default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script src="<?php echo base_url(); ?>assets/module/email/js/email-file-upload.js" type="text/javascript"></script>
<script type="text/javascript">
  function composeOpen(){        
  $("#compose-modal").modal('show');
  $('#email-modal-desc').summernote({height:300});
}
</script>



