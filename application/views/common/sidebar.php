  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar navbar-collapse collapse" aria-expanded="false" style="height: 0px;">
          <!-- BEGIN SIDEBAR MENU -->
          <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
              
              <li class="sidebar-toggler-wrapper hide">
                  <div class="sidebar-toggler">
                      <span></span>
                  </div>
              </li>

              <?php

                $res = $this->form_access_model->getMenu();
                $i = 1;

                foreach ($res->result() as $row)
                {
                    $link = '';
                    $res1 = $this->form_access_model->getsubMenu($row->MNU_id);

                    if ($row->MNU_link == '')
                    {
                        $link = 'javascript:;';

                        echo '<li id="'.$row->MNU_id.'" class="nav-item">
                                <a href="'.$link.'" class="nav-link nav-toggle">
                                  <i class="'.$row->MNU_logo.'"></i>
                                  <span class="title">'.$row->MNU_name.'</span>
                                </a>';

                        if (!empty($res1))
                        {
                            echo '<ul class="sub-menu">';

                            foreach ($res1->result() as $rw)
                            {
                                $res2 = $this->form_access_model->getpages($rw->sbm_id, $rw->sbm_mnu_id);

                                if ($rw->sbm_link == '')
                                {
                                    $link1 = 'javascript:;';

                                    echo  '<li id="'.$rw->sbm_id.'" class="nav-item">
                                            <a href="'.$link1.'" class="nav-link nav-toggle">
                                              <i class="'.$rw->sbm_icon.'"></i>
                                              <span class="title">'.$rw->sbm_name.'</span>
                                            </a>';

                                    if (!empty($res2))
                                    {
                                      echo '<ul class="sub-menu">';
                                      foreach ($res2->result() as $rw1)
                                      {
                                        $class3 = "";
                                        if ($this->uri->segment(1) == $rw1->form_name)
                                        {
                                            $class3 = " active open ";
                                            echo '<script type="text/javascript">';
                                            echo 'document.getElementById("'.$row->MNU_id.'").className = "nav-item active open";';
                                            echo 'document.getElementById("arrow'.$row->MNU_id.'").className = "arrow open";';
                                            echo 'document.getElementById("'.$rw->sbm_id.'").className = "nav-item active open";';
                                            echo 'document.getElementById("arrow'.$rw->sbm_id.'").className = "arrow open" ;';
                                            echo '</script>';
                                        }
                                        else
                                        {
                                            $class3 = "";
                                        }

                                        echo '<li class="nav-item '.$class3.'">
                                                <a  href="'.site_url("/".$rw1->form_name).'" class="nav-link">
                                                <i class="'.$rw1->SBM_logo.'"></i>&nbsp; 
                                                <span class="title">&nbsp;'.$rw1->form_title.'</span> 
                                                </a>
                                              </li>';
                                      }

                                        echo '</ul>';
                                    }
                                }
                                else
                                {
                                    $link = site_url($rw->sbm_link);
                                    $class2 = "";
                                    if ($this->uri->segment(1) == $rw->sbm_link)
                                    {
                                        $class2 = " active open ";
                                        echo '<script type="text/javascript">document.getElementById("'.$row->MNU_id.'").className = "nav-item active open";</script>';
                                    }
                                    else
                                    {
                                        $class2 = "";
                                    }

                                    echo '<li class="nav-item '.$class2.'">
                                            <a  href="'.$link.'" class="nav-link" >
                                                <i class="'.$rw->sbm_icon.'"></i>&nbsp;'.$rw->sbm_name.'
                                            </a>';
                                }

                                echo '</li>';
                            }

                            echo '</ul>';
                        }

                        echo '</li>';
                    }
                    else
                    {
                        $link = site_url($row->MNU_link);
                        $class1 = "";
                        if ($this
                            ->uri
                            ->segment(1) == $link)
                        {
                            $class1 = "active open";
                        }
                        else
                        {
                            $class1 = "";
                        }

                        echo '<li class="nav-item '.$class1.'" >
                                <a href="'.$link.'" class="nav-link nav-toggle">
                                    <i class="'.$row->MNU_logo.'" aria-hidden="true"></i>
                                    <span class="title">'.$row->MNU_name.'</span>
                                   
                                    <span class="selected"></span>
                                </a>';
                        echo '</li>';
                    }

                    $i++;
                }

                ?>
                <!-- <li class="nav-item ">
                  <a href="<?php echo base_url('resources-list'); ?>" class="nav-link nav-toggle">
                    <i class="fas fa-project-diagram icon-project"></i>
                    <span class="title">Resources</span>
                  </a>
                </li> -->
          </ul>
          <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
  </div>
  <!-- END SIDEBAR -->
