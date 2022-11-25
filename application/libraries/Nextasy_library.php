<?php 
class Nextasy_library
{
    public  $CI;
    public function __construct()
    {
        $this->CI           = &get_instance();
    }
    function ci_breadcrumbs($breadcrumb_array)
    {
        $crumb_html =               '<ul class="breadcrumb" style="padding: 12px 0px !important; margin: 0px; " >';

        for($i = 0; $i < count($breadcrumb_array); $i++)
        {
            if(array_key_exists(1, $breadcrumb_array[$i]))
                $crumb_html .=      '<li><a href="'.$breadcrumb_array[$i][1].'">'.$breadcrumb_array[$i][0].'</a></li>';
            else
                $crumb_html .=      '<li><span>'.$breadcrumb_array[$i][0].'</span></li>';
        }


        $crumb_html .=  '</ul>';

        return $crumb_html;
    }
}
 ?>
