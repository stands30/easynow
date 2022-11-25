<?php

function getGenPrmResult($type, $gpm_group, $fieldName, $value = false, $returntype)
{
  $CI = & get_instance();
  $genPrmBenchmarkStart = $CI->benchmark->mark('genPrmBenchmarkStart');
  $result = $CI->home_model->getGenPrmResultByGroup($gpm_group, $returntype);
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

      // $str.= '<input type="radio" name="' . $resultkey->f1 . '" data-name="' . $resultkey->f2 . '" name="' . $fieldName . '" value="' . $resultkey->f1 . '" ' . $selected . '>&nbsp;&nbsp' . $resultkey->f2 . ' &nbsp;&nbsp';

       $str.= '<input class="md-radiobtn" type="radio" name="' . $resultkey->f1 . '" data-name="' . $resultkey->f2 . '" name="' . $fieldName . '" value="' . $resultkey->f1 . '" ' . $selected . '><label for="' . $resultkey->f1 . '"><span></span><span class="check"></span><span class="box"></span>&nbsp;&nbsp' . $resultkey->f2. ' &nbsp;&nbsp</label>';
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
    return '0000-00-00';
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
    return '0000-00-00';
  }
  else
  {
    return date('d M,Y', strtotime($datefromuser));
  }
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
  if ($value != '')
  {
    $mysql_date = date('d/m/Y', strtotime($value));
  }
  else
  {
    $mysql_date = $value;
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
      $sql = "SELECT GROUP_CONCAT('<option selected value=',prd_id,'>',prd_name,'</option>') group_name from product where prd_id IN (" . $value . ") ";
      break;

    case 'prod-span':
      $sql = "SELECT GROUP_CONCAT('<span class=" . 'people-tag' . ">',prd_name, '</span>' SEPARATOR '&nbsp;'  ) group_name from product where prd_id IN (" . $value . ") ";
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

function getTags($value)
{
  $CI = & get_instance();
  $result = '';
  if (isset($value) && !empty($value))
  {
    $sql = "select tgs_id,tgs_name from tags where tgs_id IN (" . $value . ")";
    $queryResult = $CI->home_model->executeSqlQuery($sql, 'result');
    foreach($queryResult as $key)
    {
      $tgs_id = $CI->nextasy_url_encrypt->encrypt_openssl($key->tgs_id);
      $tgs_encrypt_name = $CI->nextasy_url_encrypt->encrypt_openssl($key->tgs_name);
      $result.= '<a href="' . base_url('tag-people-list-' . $tgs_id . '-' . $tgs_encrypt_name) . '" class="people-tag" target="_blank" >' . $key->tgs_name . '</a> &nbsp;';
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
?>
