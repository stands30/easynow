<div class="col-md-2 half-side-padding">
    <div class="inbox-sidebar">
       <!--  <a href="<?php echo base_url('email-compose'); ?>" data-title="Compose" data-toggle="modal" data-target="#compose-modal" class="btn red compose-btn btn-block">
            <i class="fa fa-edit"></i> Compose </a> -->
        <a href="#" data-title="Compose" onclick="composeOpen()" class="btn red compose-btn btn-block">
            <i class="fa fa-edit"></i> Compose
        </a>
        <ul class="inbox-nav">
            <li class="active">
                <a href="<?php echo base_url('email-compose'); ?>" data-type="inbox" data-title="Compose"><i class="fa fa-edit"></i> Compose</a>
            </li>
            
            <li>
                <a href="<?php echo base_url('email-sent'); ?>" data-type="sent" data-title="Sent"><i class="fab fa-telegram-plane"></i> Sent </a>
            </li>
            <li>
                <a href="<?php echo base_url('email-draft') ?>" data-type="draft" data-title="Draft"><i class="fas fa-file"></i> Draft
                    <span class="badge badge-danger">8</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('email-template-add'); ?>" data-type="draft" data-title="Add Template"><i class="fas fa-mail-bulk"></i> Add Template</a>
            </li>
            
        </ul>
    </div>
</div>


