<?php

function checkapi(){




}

$get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
$data=json_decode($get);
$site=$data->url;

$bingapi=$data->bingapi;
$file=$data->google_json_file;
$permalink = get_permalink( $id );
include_once('bingtest.php');
checkcredentials();
if($data->enable_google=='on'){

   $result=google($permalink,$file);


}
if($data->enable_bing=='on'){

    $result=bing($site,$permalink,$bingapi);

}







?>