  <style type="text/css">
    .color-grey
    {
      background-color:#9eacad !important;
    }
  </style>

  <?php 

    $evtData              = $this->event_model->getEventById($evt_id); 
    $evtEncryptedId       = $this->nextasy_url_encrypt->encrypt_openssl($evt_id);
    $eventType           = $this->home_model->getGenPrmResultByGroup('event_type','result_array');
    $eventTypeF1KeyArray = array_column($eventType, 'f1');

  ?>

  <aside class="profile-nav col-lg-2 sidebar-menu-list">
     <section class="panel">
        
        <div class="user-heading round color-primary">
            <p class="sidebar-title">Event Details</p>
           <h1><?php echo $evtData->evt_name; ?></h1>
        </div>
        <div class="actions actions-sidebar">
          <div class="btn-group text-center">
            <a class="btn-view-more" ></a>
          </div>
        </div>
        <ul class="nav nav-pills nav-stacked color-primary nav-stack">
           <li id="event-details" class="event_link">
              <a href="<?php echo base_url().'event-details-'.$evtEncryptedId; ?>">
                  <span>Event</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>
      <?php 
      if(!empty($eventType)) 
      { 
        foreach ($eventType as $eventTypekey)
        { 
          $eventTypeVisibleClass = '';
          switch ($eventTypekey['f1']) {
              case COMPANY_TYPE_PEOPLE:
                  $eventTypeLink = 'event-people-detail-';
                  $eventTypeVisible = $evtData->evt_ppl_count;
                  break;
              default:
                  $eventTypeLink = '';
                  break;
              }
              if($eventTypeVisible <= 0)
              {
                $eventTypeVisibleClass = 'color-inactive';
              }
              ?>
            <li id="event-details" class="event_link <?php echo $eventTypeVisibleClass; ?>"  >
              <a href="<?php echo base_url().$eventTypeLink.$evtEncryptedId; ?>">
                  <span><?php echo $eventTypekey['f2']; ?></span>
                  <span class="sidebar-badge"><?php echo $eventTypeVisible; ?></span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>   
          <?php
        }
      }
      ?>
          <!-- <li id="event-details" class="event_link "  >
              <a href="<?php echo base_url('event-login'); ?>">
                  <span>Login</span>
                  <i class="fas fa-caret-right"></i>
              </a>
           </li>    -->
        </ul>
     </section>
  </aside>
