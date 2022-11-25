<form class="inbox-compose form-horizontal" id="fileupload" action="#" method="POST" enctype="multipart/form-data">
    <div class="inbox-compose-btn">
        <button class="btn green">
            <i class="fa fa-check"></i>Send</button>
        <button class="btn default inbox-discard-btn">Discard</button>
        <button class="btn default">Draft</button>
    </div>
    <div class="inbox-form-group mail-to">
        <label class="control-label">To:</label>
        <div class="controls controls-to">
            <input type="text" class="form-control" name="to">
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
            <input type="text" name="cc" class="form-control"> </div>
    </div>
    <div class="inbox-form-group input-bcc display-hide">
        <a href="javascript:;" class="close"> </a>
        <label class="control-label">Bcc:</label>
        <div class="controls controls-bcc">
            <input type="text" name="bcc" class="form-control"> </div>
    </div>
    <div class="inbox-form-group">
        <label class="control-label">Subject:</label>
        <div class="controls">
            <input type="text" class="form-control" name="subject"> </div>
    </div>
    <div class="inbox-form-group">
        <textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea>
    </div>
    <div class="inbox-compose-attachment">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <span class="btn green btn-outline fileinput-button">
            <i class="fa fa-plus"></i>
            <span> Add files... </span>
            <input type="file" name="files[]" multiple> </span>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped margin-top-10">
            <tbody class="files"> </tbody>
        </table>
    </div>
    
    <div class="inbox-compose-btn">
        <button class="btn green">
            <i class="fa fa-check"></i>Send</button>
        <button class="btn default">Discard</button>
        <button class="btn default">Draft</button>
    </div>
</form>