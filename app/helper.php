<?php

if(!function_exists('formatRupiah')){
    function formatRupiah($amount)
    {
        return 'Rp. '.number_format($amount,0,',','.');
    }
}

// tambahkan di composer.json 
// dibagian autoload : files : ['app/helper.php']
// composer dump-autoload