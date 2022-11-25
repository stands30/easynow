  <style type="text/css">
    .color-grey
    {
      background-color:#9eacad !important;
    }
  </style>

  <?php 

    $empData              = $this->team_model->getTeamById($emp_id); 
    $empEncryptedId       = $this->nextasy_url_encrypt->encrypt_openssl($emp_id);
    $employeeType           = $this->home_model->getGenPrmResultByGroup('employee_type','result_array');
    $employeeTypeF1KeyArray = array_column($employeeType, 'f1');

  ?>

  <aside class="profile-nav col-lg-2 sidebar-menu-list">
     <section class="panel">
        <div class="user-heading round color-primary">
           <h1><?php echo $empData->emp_name; ?></h1>
           <p class="user-heading-designation"><?php if($empData->emp_designation != ''){ echo $empData->emp_designation; }?></p>
        </div>
         <div class="actions actions-sidebar">
          <div class="btn-group text-center">
            <a class="btn-view-more" ></a>
          </div>
        </div>
        <ul class="nav nav-pills nav-stacked color-primary nav-stack">
           <li id="employee-details" class="employee_link">
              <a href="<?php echo base_url().'team-details-'.$empEncryptedId; ?>">
                  <span>Team</span>
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
                  <span class="sidebar-badge"><?php echo $employeeTypeVisible; ?></span>
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
