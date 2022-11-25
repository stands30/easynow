<?php
if ( ! function_exists('ci_asset_versn'))
    {
        function ci_asset_versn()
        {
            return '?v='.date('ymdHis');
        }
    }

    function global_asset_version()
    {
        return '?v='.date('Ymd',strtotime(GLOBAL_CACHE_VERSION_DATE."+ 10 year"));
    }
?>
