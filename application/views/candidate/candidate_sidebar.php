  <style type="text/css">
    .color-grey
    {
      background-color:#9eacad !important;
    }
  </style>

  <?php 

    $cdtData              = $this->candidate_model->getCandidateById($cdt_id); 
    $cdtEncryptedId       = $this->nextasy_url_encrypt->encrypt_openssl($cdt_id);
    $candidateType           = $this->home_model->getGenPrmResultByGroup('candidate_type','result_array');
    $candidateTypeF1KeyArray = array_column($candidateType, 'f1');

  ?>

  <aside class="profile-nav col-lg-3">
     <section class="panel">
        <div class="user-heading round color-primary">
           <h1><?php echo $cdtData->cdt_name; ?></h1>
           <p><?php if($cdtData->cdt_role_name != ''){ echo '<i class="fa fa-globe" aria-hidden="true"></i> '.$cdtData->cdt_role_name; }?></p>
        </div>
        <ul class="nav nav-pills nav-stacked color-primary">
           <li id="candidate-details" class="candidate_link">
              <a href="<?php echo base_url().'candidate-details-'.$cdtEncryptedId; ?>">
                  <span>Candidate</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>
      <?php 
      if(!empty($candidateType)) 
      { 
        foreach ($candidateType as $candidateTypekey)
        { 
          $candidateTypeVisibleClass = '';
          switch ($candidateTypekey['f1']) {
              case COMPANY_TYPE_PEOPLE:
                  $candidateTypeLink = 'candidate-people-detail-';
                  $candidateTypeVisible = $cdtData->cdt_ppl_count;
                  break;
              default:
                  $candidateTypeLink = '';
                  break;
              }
              if($candidateTypeVisible <= 0)
              {
                $candidateTypeVisibleClass = 'color-grey';
              }
              ?>
            <li id="candidate-details" class="candidate_link <?php echo $candidateTypeVisibleClass; ?>"  >
              <a href="<?php echo base_url().$candidateTypeLink.$cdtEncryptedId; ?>">
                  <span><?php echo $candidateTypekey['f2']; ?></span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>   
          <?php
        }
      }
      ?>
          <!-- <li id="candidate-details" class="candidate_link "  >
              <a href="<?php //echo base_url('candidate-login'); ?>">
                  <span>Login</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>    -->
        </ul>
     </section>
  </aside>
