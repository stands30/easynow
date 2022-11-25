<?php

function getGenPrmResult($type, $gpm_group, $fieldName, $value = false, $returntype,$customElements='')
{
  $CI = & get_instance();
  $genPrmBenchmarkStart = $CI->benchmark->mark('genPrmBenchmarkStart');
  $result = $CI->home_model->getGenPrmResultByGroup($gpm_group, $returntype);
  // print_r($result );
  $str = '';
  switch ($type)
  {
  case 'dropdown':
    foreach($result as $resultkey)
    {
      $selected = '';
      if ($value)
      {
        if ($value == $resultkey->f1)
        {
          $selected = 'selected="selected"';
        }
      }

      $str.= '<option value="' . $resultkey->f1 . '"' . $selected . '>' . $resultkey->f2 . '</option>';
    }

    break;

  case 'radio':
    foreach($result as $resultkey)
    {
      $selected = '';
      if ($value)
      {
        if ($value == $resultkey->f1)
        {
          $selected = 'checked="checked"';
        }
      }

      $str.='<div class="md-radio">
                <input type="radio" id="custom_radio_'.$resultkey->f1.'" data-name="' . $fieldName . '" name="' . $fieldName . '" value="' . $resultkey->f1 . '" ' . $selected . ' class="md-radiobtn">
                <label for="custom_radio_'.$resultkey->f1.'">
                    <span></span>
                    <span class="check"></span>
                    <span class="box"></span> '. $resultkey->f2 . ' </label>
            </div>';
    }

    break;

 case 'switch-checkbox':
                  $group_array = array();
                  if (!empty($value)) 
                 {
                   $group_array = explode(',',$value);
                 }
                 foreach ($result as $resultkey) 
                {

                  $selected='';
                   if(in_array($resultkey->f1,$group_array))
                   {
                      $selected = 'checked="checked"';
                   }
                   else
                   {
                      $selected = '';
                   }

                  $str .='<div class="col-xs-6 col-sm-3 checkbox-custom">'.$resultkey->f2.'
                  <input type="checkbox" data-name="'.$resultkey->f2.'" name="'.$fieldName.'" value="'.$resultkey->f1.'" '.$selected.' class="make-switch custom-'.$fieldName.'-'.$resultkey->f1.' " data-size="small">
                  </div>';
                }
                break;
 case 'switch-checkbox-detail':
                  $group_array = array();
                  if (!empty($value)) 
                 {
                   $group_array = explode(',',$value);
                 }
                 if(isset($result) && $result != '')
                 {
                  foreach ($result as $resultkey) 
                  {

                    $selected='';
                     if(in_array($resultkey->f1,$group_array))
                     {
                        $selected = 'checked="checked"';
                     }
                     else
                     {
                        $selected = '';
                     }

                    $str .='<div class="col-xs-6  col-sm-3 col-md-2 checkbox-custom">'.$resultkey->f2.'
                    <input type="checkbox" data-name="'.$resultkey->f2.'" name="'.$fieldName.'" value="'.$resultkey->f1.'" '.$selected.' class="make-switch custom-'.$fieldName.'-'.$resultkey->f1.' " data-size="small">
                    </div>';
                  }
                 }
                 
                break;
 case 'people-switch-checkbox-detail':
                  $group_array = array();
                  if (!empty($value)) 
                 {
                   $group_array = explode(',',$value);
                 }
                 foreach ($result as $resultkey) 
                {
                  $selected='';
                   if(in_array($resultkey->f1,$group_array))
                   {
                      $selected = 'checked="checked"';
                   }
                   else
                   {
                      $selected = '';
                   }
                 if(in_array($resultkey->f1,$customElements))
                   {
                     $str .='<div class="col-xs-6  col-sm-3 col-md-2 checkbox-custom">'.$resultkey->f2.'
                      <input type="checkbox" data-name="'.$resultkey->f2.'" name="'.$fieldName.'" value="'.$resultkey->f1.'" '.$selected.' class="make-switch custom-'.$fieldName.'-'.$resultkey->f1.' " data-size="small">
                      </div>';
                   }  
                }
                break;
  default:
    $str = '';
    break;
  }

  $genPrmBenchmarkEnd = $CI->benchmark->mark('genPrmBenchmarkEnd');
  return $str;
}

function doc_upload($doc_path, $resize_doc_path, $file_id, $type = '')
{
  $CI = & get_instance();
  $doc_name = '';
  log_message('nexlog', ' upload_doc >> doc file_id  = ' . $file_id);
  if (isset($_FILES[$file_id]['name']))
  {
    log_message('nexlog', 'doc_path  = ' . $doc_path . ' resize_doc_path = ' . $resize_doc_path . ' doc name : ' . $_FILES[$file_id]['name']);
    if (file_exists($doc_path . $_FILES[$file_id]['name']))
    {
      $doc = $CI->home_model->getFileName($_FILES[$file_id]['name']);
      if (file_exists($doc_path . $_FILES[$file_id]["name"]))
      {
        $doc_name = $CI->home_model->getFileName($_FILES[$file_id]['name']);
      }
      else
      {
        $doc_name = $_FILES[$file_id]["name"];
      }
    }
    else
    {
      $doc_name = $_FILES[$file_id]["name"];
    }

    $sourcePath = $_FILES[$file_id]['tmp_name']; // Storing source path of the file in a variable
    $targetPath = $doc_path . $doc_name; // Target path where file is to be stored
    log_message('nexlog', '>> doc sourcePath  = ' . $sourcePath);
    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file

    if ($type == '')
    {
      copy($doc_path . $_FILES[$file_id]["name"], $resize_doc_path . $_FILES[$file_id]["name"]);
      $data = getimagesize($doc_path . $_FILES[$file_id]['name']);
      $width = $data[0];
      $height = $data[1];
      $doc_height = (DOC_SIZE * $height) / $width;

      // CONTROLLING IMAGE WIDTH Large

      $config['image_library'] = 'gd2';
      $config['source_image'] = $resize_doc_path . $_FILES[$file_id]['name']; //get original image

      // $config['create_thumb'] = TRUE;

      $config['maintain_ratio'] = TRUE;
      $config['file_name'] = $doc_name;
      $config['width'] = DOC_SIZE;
      $config['height'] = $image_height;
      $CI->image_lib->initialize($config);
      if (!$CI->image_lib->resize())
      {
        $CI->handle_error($CI->image_lib->display_errors());
      }

      // END OF CONTROLLING IMAGE WIDTH CODE

    }

    log_message('nexlog', ' upload_doc >> doc name  = ' . $doc_name);
  }

  return $doc_name;
}

function mysqldate($datefromuser = '')
{
  if (empty($datefromuser))
  {
    return '';
  }
  else
  {

    // echo ' $datefromuser : '.$datefromuser;

    $sqlDate = date('Y-m-d', strtotime($datefromuser));
    return $sqlDate;
  }
}

function display_date($datefromuser = '')
{
  if (empty($datefromuser))
  {
    return '';
  }
  else
  {
    return date(DISPLAY_DATE_FORMAT, strtotime($datefromuser));
  }
}

function mysqldatebymeridian($date, $time = '0:00 AM')
{
  return date("Y-m-d H:i:s", strtotime($date.' '.$time));
}

function upload_multiple_doc($doc_path, $resize_doc_path, $file_id, $i, $type = '')
{
  $CI = & get_instance();
  log_message('nexlog', ' upload_doc >> doc file_id  = ' . $file_id);
  if (file_exists($doc_path . $_FILES[$file_id]['name'][$i]))
  {
    $doc = $CI->home_model->getFileName($_FILES[$file_id]['name'][$i]);
    if (file_exists($doc_path . $_FILES[$file_id]["name"][$i]))
    {
      $doc_name = $CI->home_model->getFileName($_FILES[$file_id]['name'][$i]);
    }
    else
    {
      $doc_name = $_FILES[$file_id]["name"][$i];
    }
  }
  else
  {
    $doc_name = $_FILES[$file_id]["name"][$i];
  }

  $sourcePath = $_FILES[$file_id]['tmp_name'][$i]; // Storing source path of the file in a variable
  $targetPath = $doc_path . $doc_name; // Target path where file is to be stored
  log_message('nexlog', '>> doc targetPath  = ' . $targetPath);
  move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file

  // CONTROLLING IMAGE WIDTH Large

  if ($type == '')
  {
    copy($doc_path . $_FILES[$file_id]["name"][$i], $resize_doc_path . $doc_name);
    $data = getimagesize($doc_path . $doc_name);
    $width = $data[0];
    $height = $data[1];
    $doc_height = (DOC_SIZE * $height) / $width;

    $config['image_library'] = 'gd2';
    $config['source_image'] = $resize_doc_path . $doc_name; //get original image

    // $config['create_thumb'] = TRUE;

    $config['maintain_ratio'] = TRUE;
    $config['file_name'] = $doc_name;
    $config['width'] = DOC_SIZE;
    $config['height'] = $doc_height;
    $CI->image_lib->initialize($config);
    if (!$CI->image_lib->resize())
    {
      $CI->handle_error($CI->image_lib->display_errors());
    }
  }
  // END OF CONTROLLING IMAGE WIDTH CODE

  log_message('nexlog', ' upload_image << image name  = ' . $doc_name);
  return $doc_name;
}

function UnlinkFile($file)
{
  if (file_exists($file))
  {
    $image_name = unlink($file);
  }
  else
  {
    $image_name = $file;
  }

  return $image_name;
}

function convertToMySqlDateFormat($date = '')
{
  if (empty($datefromuser))
  {
    return '0000-00-00';
  }
  else
  {
    return date('Y-m-d', strtotime($datefromuser));
  }
}

function mysqlDateFormat($value = '')
{
  $date = str_replace('/', '-', $value);
  if ($value != '')
  {
    $mysql_date = date('Y-m-d', strtotime($date));
  }
  else
  {
    $mysql_date = $value;
  }

  return $mysql_date;
}

function DisplayDate($value = '')
{
  if ($value != '' && $value != '0000-00-00')
  {
    $mysql_date = date('d M, Y', strtotime($value));
  }
  else
  {
    $mysql_date = '';
  }

  return $mysql_date;
}

function check_logged()
{
  $CI = & get_instance();
  $ppl_id = $CI->session->userdata(PEOPLE_SESSION_ID);
  if (empty($ppl_id))
  {
    redirect('', 'refresh');
    exit;
  }
}

function GetTagData($value, $type)
{
  $CI = & get_instance();
  if ($value != '')
  {
    switch ($type)
    {
    case 'span':
      $sql = "SELECT GROUP_CONCAT('<span class=" . 'people-tag' . ">',tgs_name, '</span>' SEPARATOR '&nbsp;'  ) group_name from tags where tgs_id IN (" . $value . ")";
      break;

    case 'select2':
      $sql = "SELECT GROUP_CONCAT('<option selected value=',tgs_id,'>',tgs_name,'</option>') group_name from tags where tgs_id IN (" . $value . ") ";
      break;

    case 'prod-select2':
      $sql = "SELECT GROUP_CONCAT('<option selected=selected value=',prd_id,'>',prd_name,'</option>' SEPARATOR '') group_name from product where prd_id IN (" . $value . ") ";
      break;

    case 'prod-span':
      $sql = "SELECT GROUP_CONCAT('<span class=" . 'people-tag' . ">',prd_name, '</span>' SEPARATOR '&nbsp;'  ) group_name from product where prd_id IN (" . $value . ") ";
      break;

    case 'company-select2':
      $sql = "SELECT GROUP_CONCAT('<option selected value=',cmp_id,'>',cmp_name,'</option>') group_name from company where cmp_id IN (" . $value . ") ";
      break;

    case 'people-select2':
      $sql = "SELECT GROUP_CONCAT('<option selected value=',ppl_id,'>',ppl_name,'</option>') group_name from people where ppl_id IN (" . $value . ") ";
      break;
    case 'people-span':
      $sql = "SELECT GROUP_CONCAT('<span class=" . 'people-tag' . ">',ppl_name, '</span>' SEPARATOR '&nbsp;'  ) group_name from people where ppl_id IN (" . $value . ") and ppl_status = ".ACTIVE_STATUS."";
      break;
    default:
      $sql = '';
      break;
    }

    $queryResult = $CI->home_model->executeSqlQuery($sql, 'row');
    if (!empty($queryResult))
    {
      $value = $queryResult->group_name;
    }
    else
    {
      $value = '';
    }
  }
  else
  {
    $value = '';
  }

  return $value;
}

function getTags($value,$type = '')
{
  $CI = & get_instance();
  $result = '';
  switch ($type) {
    case 'people':
      $url = 'tag-people-list-';
      break;
    case 'company':
      $url = 'tag-company-list-';
      break;
      default:
       $url = 'tag-company-list-';
  }
  if (isset($value) && !empty($value))
  {
    $sql = "select tgs_id,tgs_name from tags where tgs_id IN (" . $value . ") and tgs_status != ".DELETE_STATUS;
    $queryResult = $CI->home_model->executeSqlQuery($sql, 'result');
    foreach($queryResult as $key)
    {
      $tgs_id = $CI->nextasy_url_encrypt->encrypt_openssl($key->tgs_id);
      $tgs_encrypt_name = $CI->nextasy_url_encrypt->encrypt_openssl($key->tgs_name);
      $result.= '<a href="' . base_url($url . $tgs_id . '-' . $tgs_encrypt_name) . '" class="people-tag" target="_blank" >' . $key->tgs_name . '</a> &nbsp;';
    }
  }

  return $result;
}

function getPeopleLink($value)
{
  $CI = & get_instance();

  if (isset($value) && !empty($value))
  {
    $result = '';
    $sql = "select ppl_id,fnGetPeopleNameByID(ppl_id) ppl_name from people where ppl_id IN (" . $value . ") and ppl_status != ".DELETE_STATUS;
    $queryResult = $CI->home_model->executeSqlQuery($sql, 'result');
    foreach($queryResult as $key)
    {
      $ppl_id = $CI->nextasy_url_encrypt->encrypt_openssl($key->ppl_id);
      $result .= '<a href="' . base_url('people-details-' . $ppl_id ) . '" class="people-tag" target="_blank" >' . $key->ppl_name . '</a> &nbsp;';
    }
  }

  return $result;
}

function loginTransaction($ppl_id, $type)
{
  $CI = & get_instance();
  if ($type == TRANSACTION_LOGIN)
  {
    $status = ACTIVE_STATUS;
  }
  else
  {
    $status = INACTIVE_STATUS;
  }

  $loginData = array(
    'lgt_type' => $type,
    'lgt_ppl_id' => $ppl_id,
    'lgt_ip_addr' => $_SERVER['REMOTE_ADDR'],
    'lgt_status' => $status
  );
  $inserted_id = $CI->home_model->insert('login_transaction', $loginData);
}
function removeLastCharacter($value,$char)
  {
    $updatedValue = '';
    if($value != '')
    {
      $updatedValue = rtrim($value,$char);
    }
    return $updatedValue;
  }
  function checkImage($image)
  {
    if($image != '')
    {
      $value = $image;
    }
    else
    {
      $value = '';
    }
    return $value;
  }

  function datePickerDisplayDate($value = '')
  {
    if ($value != '' && $value != '0000-00-00')
    {
      $mysql_date = date('d-m-Y', strtotime($value));
    }
    else
    {
      $mysql_date = '';
    }

    return $mysql_date;
  }

  function encrypt_key_in_array($data, $key_val_arr)
  {
    $CI = & get_instance();
    $key = array_keys($key_val_arr);
   
    $x = 'a';

    for($i = 0; $i < count($data); $i++)
    {
      for($j = 0; $j < count($key); $j++)
      {
        $data[$i]->{$key_val_arr[$key[$j]]} = $CI->nextasy_url_encrypt->encrypt_openssl($data[$i]->{$key[$j]});
      }
    }

    return $data;
  }

  function insert_type_in_array($data, $key_val_arr)
  {
    $CI = & get_instance();
    $key = array_keys($key_val_arr);

    $x = 'a';

    for($i = 0; $i < count($data); $i++)
    {
      for($j = 0; $j < count($key); $j++)
      {
        $data[$i]->{$key_val_arr[$key[$j]]} = $CI->nextasy_url_encrypt->encrypt_openssl($data[$i]->{$key[$j]});
      }
    }

    return $data;
  }

  function getTaskTags($value,$type = '')
  {

    $CI = & get_instance();
    $result = '';
    switch ($type) {
      case 'people':
        $url = 'people-details-';
        $sql = "select ppl_id as id,ppl_name as name from people where  ppl_id IN (" . $value . ") and ppl_status != ".DELETE_STATUS;
        break;
      case 'company':
        $sql = "select cmp_id as id,cmp_name as name from company where cmp_id IN (" . $value . ") and cmp_status != ".DELETE_STATUS;
        $url = 'company-details-';
        break;
      case 'product':
        $sql = "select prd_id as id,prd_name as name from product where  prd_id IN (" . $value . ") and prd_status != ".DELETE_STATUS;
        $url = 'product-details-';
        break;
    }
    if (isset($value) && !empty($value))
    {
      $queryResult = $CI->home_model->executeSqlQuery($sql, 'result');

      $result = array();

      foreach($queryResult as $key)
      {

        $encrypted_id = $CI->nextasy_url_encrypt->encrypt_openssl($key->id);
        array_push($result, '<a href="' . base_url($url . $encrypted_id) . '" target="_blank" >' . $key->name . '</a>');
      }

      return implode(', ', $result);
    }

  }
  
  function convertToMysqlDate($date, $format, $delimiter)
  {
    $d = explode($date, $delimiter)[strpos($format, 'd')];
    $m = explode($date, $delimiter)[strpos($format, 'm')];
    $y = explode($date, $delimiter)[strpos($format, 'y')];
    return $y.'-'.$m.'-'.$d;
  }

  function getMenubyRoute($routename)
  {
    $CI = & get_instance();

    //$routename = getRouteName($_this); // no route available in menu_master for linking 

    $menu_sql = "select null sbm_id, mnu_id from menu_master where mnu_link = '".$routename."'";
    $menu_data = $CI->db->query($menu_sql)->row();

    if($menu_data)
      return $menu_data;
    else
    {
      $sub_menu_sql = "select sbm_id, sbm_mnu_id mnu_id from sub_menu_master where sbm_link = '".$routename."'";
      $sub_menu_data = $CI->db->query($sub_menu_sql)->row();
      return $sub_menu_data;
    }    
  }

  function checkaccess($routename, $access_type = '')
  {
    $CI = & get_instance();

    $menu = getMenubyRoute($routename);
    $mnu_id     = $menu->mnu_id;
    $sub_mnu_id = $menu->sbm_id;

    if($access_type)
    {
      $sql = 'select count(fma_id) cnt from form_access where fma_usr_id = "'.$CI->session->userdata(PEOPLE_SESSION_ID).'" and fma_mnu_id = "'.$mnu_id.'" and fma_sbm_id = "'.$sub_mnu_id.'" and fma_'.$access_type.' = '.ACTIVE_STATUS;

      if($CI->db->query($sql)->row()->cnt > 0)
        return true;
      else
        return false;
    }
    else
    {
      $sql = 'select fma_access all_access, fma_add add_access, fma_edit edit_access, fma_delete delete_access, fma_detail detail_access, fma_list list_access, fma_export export_access, fma_print print_access from form_access where fma_usr_id = "'.$CI->session->userdata(PEOPLE_SESSION_ID).'" and fma_mnu_id = "'.$mnu_id.'" and fma_sbm_id = "'.$sub_mnu_id.'"';

      return $CI->db->query($sql)->row_array();
    }
  }

  function checkPrivate($routename, $crdt_by_col_name)
  {
    $CI = & get_instance();

    $menu = getMenubyRoute($routename);
    $mnu_id     = $menu->mnu_id;
    $sub_mnu_id = $menu->sbm_id;

    $sql = 'select ifnull(fma_private, "0") fma_private from form_access where fma_usr_id = "'.$CI->session->userdata(PEOPLE_SESSION_ID).'" and fma_mnu_id = "'.$mnu_id.'" and fma_sbm_id = "'.$sub_mnu_id.'"';

    if($CI->db->query($sql)->row()->fma_private)
      return ', CASE WHEN '.$crdt_by_col_name.' = "'.$CI->session->userdata(PEOPLE_SESSION_ID).'" THEN 1 ELSE 0 END as private_access ';
    else
      return '';
  }

  function getRouteName($_this)
  {
    $url =  explode('-', $_this->uri->uri_string);
    $url_segment = $_this->uri->rsegments;

    $url_cnt = count($url);
    $url_segment_cnt = count($url_segment);

    $offsetKey = $url_segment_cnt - 2;

    if($offsetKey > 0){
      $offsetKey = $url_segment_cnt - ($url_segment_cnt - 2);
      $n = array_keys($url);
      $count = array_search($offsetKey, $n);
      $new_arr = array_slice($url, 0, $count+1 ,true);
      return implode('-', $new_arr);
    }
    else
      return $_this->uri->uri_string;
  }

  function getLogo()
  {
    $CI = & get_instance();
    $sql = 'select gls_image from gallery_set where gls_type = "'.GALLERY_SET_TYPE_LOGO.'" and gls_order_by = 1 and gls_status = '.ACTIVE_STATUS;
    $image_row = $CI->db->query($sql)->row();

    if($image_row)
      return GALLERY_SET_IMAGE_PATH.$image_row->gls_image;
    else
      return GALLERY_SET_IMAGE_PATH.'new-logo.png';
  }
  
  function isadmin()
  {
    $CI = &get_instance();
    $ppl_id  = $CI->session->userdata(PEOPLE_SESSION_DEPT);
    return ($ppl_id == PEOPLE_ADMIN) ? 'true' : 'false';
  }

  function getPrevNextBtn($route, $ppl_id)
  {
    $CI = &get_instance();

    $sql = "select 
    (IFNULL((select MIN(ppl_id) from people where ppl_id > '" . $ppl_id . " and ppl_status = ".ACTIVE_STATUS."'),(SELECT MIN(ppl_id) from people where ppl_status = ".ACTIVE_STATUS."))) next_people,
    (IFNULL((select MAX(ppl_id) from people where ppl_id < '" . $ppl_id . " and ppl_status = ".ACTIVE_STATUS."'),(SELECT MAX(ppl_id) from people where ppl_status = ".ACTIVE_STATUS."))) prev_people";
    
    $people = $CI->db->query($sql)->row();

    $prev_people = $CI->db->query('select ppl_name from people where ppl_id = '.$people->prev_people)->row()->ppl_name;
    $next_people = $CI->db->query('select ppl_name from people where ppl_id = '.$people->next_people)->row()->ppl_name;

    $prev_ppl_encrypted_id    = $CI->nextasy_url_encrypt->encrypt_openssl($people->prev_people);
    $prev_ppl_encrypted_name  = $CI->nextasy_url_encrypt->encrypt_openssl($prev_people);

    $next_ppl_encrypted_id    = $CI->nextasy_url_encrypt->encrypt_openssl($people->next_people);
    $next_ppl_encrypted_name  = $CI->nextasy_url_encrypt->encrypt_openssl($next_people);

    $prev_url = base_url().$route.'-'.$prev_ppl_encrypted_id.'-'.$prev_ppl_encrypted_name;
    $next_url = base_url().$route.'-'.$next_ppl_encrypted_id.'-'.$next_ppl_encrypted_name;

    return '<div class="breadcrumb-button breadcrumb-button-custom">
              <a href="'.$prev_url.'" class="previous" title="Previous">
                  <button class="btn green">
                      <i class="fa fa-arrow-left"></i>                                    
                  </button>
              </a>
              <a href="'.$next_url.'" class="next" title="Next">
                  <button class="btn green">
                      <i class="fa fa-arrow-right"></i>
                  </button>
              </a>
            </div>';
  }

  function sanitizeURL($url)
  {
    $weblink = (object)array(
        'url'   =>  '',
        'text'  =>  ''
    );

    if((strpos($url, 'http://') !== false) || (strpos($url, 'https://') !== false) || (strpos($url, 'www') !== false))
    {

      $url = str_replace('https://', '', $url);
      $url = str_replace('http://', '', $url);
      $text = 'http://'.$url;

      $weblink->url   = $url;
      $weblink->text  = $text;
    }
    
    return $weblink;
  }
  function checkValueIsset($value,$default_value='')
  {
    return isset($value) ? $value:$default_value;
  }
?>
