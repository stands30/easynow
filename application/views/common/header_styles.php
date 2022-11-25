<?php 
        $globalCacheHVersion = global_asset_version();
?>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="<?php echo base_url() ?>assets/project/fonts/google_fonts.min.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/project/global/plugins/bootstrap/css/bootstrap.min.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />
        
        <!-- <link href="<?php echo base_url(); ?>assets/project/global/plugins/font-awesome/css/font-awesome.min.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" /> -->

        <link href="<?php echo base_url(); ?>assets/project/global/plugins/font-awesome/css/all.min.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/flaticon/font/flaticon.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/simple-line-icons/simple-line-icons.min.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>assets/project/css/mandatory_styles.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />

       
        <link href="<?php echo base_url(); ?>assets/project/css/style.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>assets/project/css/custom-style.less<?php echo $globalCacheHVersion; ?>">
        <script src="<?php echo base_url();?>assets/project/js/less.js<?php echo $globalCacheHVersion; ?>"></script>
        <link href="<?php echo base_url(); ?>assets/project/global/plugins/autocomplete/easy-autocomplete.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/project/sweetalert/dist/sweetalert.css<?php echo $globalCacheHVersion; ?>" rel="stylesheet" type="text/css" />
        <?php $this->load->view('email/common/email_styles'); ?>
        <!-- <link rel="icon" type="image/x-icon" href="./favicon.ico"> -->
        <link rel="icon" href="<?php echo base_url()?>assets/project/images/favicon.png<?php echo $globalCacheHVersion; ?>" />    
        <!-- END THEME LAYOUT STYLES -->