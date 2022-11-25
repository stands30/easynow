  <style type="text/css">
    .color-grey
    {
      background-color:#9eacad !important;
    }
  </style>

  <?php

    $prdData              = $this->product_model->getProductById($prd_id);
    $prdEncryptedId       = $this->nextasy_url_encrypt->encrypt_openssl($prd_id);
    $employeeType           = $this->home_model->getGenPrmResultByGroup('employee_type','result_array');
    $employeeTypeF1KeyArray = array_column($employeeType, 'f1');

  ?>

  <aside class="profile-nav col-lg-3">
     <section class="panel">
        <div class="user-heading round color-primary">
           <h1><?php echo $empData->emp_name; ?></h1>
           <p><?php if($empData->emp_designation != ''){ echo '<i class="fa fa-globe" aria-hidden="true"></i> '.$empData->emp_designation; }?></p>
        </div>
        <ul class="nav nav-pills nav-stacked color-primary">
           <li id="employee-details" class="employee_link">
              <a href="<?php echo base_url().'product-details-'.$empEncryptedId; ?>">
                  <span>Product</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>
      <?php
      if(!empty($employeeType))
      {
        foreach ($employeeType as $employeeTypekey)
        {
          $employeeTypeVisibleClass = '';
          switch ($employeeTypekey['f1']) {
              case COMPANY_TYPE_PEOPLE:
                  $employeeTypeLink = 'employee-people-detail-';
                  $employeeTypeVisible = $empData->emp_ppl_count;
                  break;
              default:
                  $employeeTypeLink = '';
                  break;
              }
              if($employeeTypeVisible <= 0)
              {
                $employeeTypeVisibleClass = 'color-grey';
              }
              ?>
            <li id="employee-details" class="employee_link <?php echo $employeeTypeVisibleClass; ?>"  >
              <a href="<?php echo base_url().$employeeTypeLink.$empEncryptedId; ?>">
                  <span><?php echo $employeeTypekey['f2']; ?></span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>
          <?php
        }
      }
      ?>
         <!--  <li id="employee-details" class="employee_link "  >
              <a href="<?php echo base_url('employee-login'); ?>">
                  <span>Login</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>    -->
        </ul>
     </section>
  </aside>
