<?php

require_once('vendor/autoload.php');




    function checkcredentials(){
        $get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
        $data=json_decode($get);
        $email=$data->email;

        $postRequest = [
            "check"=>"3",
            "email"=>$email

        ];


        $cURLConnection = curl_init('https://theonlinevoting.com/Autoindex/auto-index.php');
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $apiResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $apiResponse=json_decode($apiResponse);

        if($apiResponse->error==0){

            $data=[];
            $data['s_f']=$apiResponse->s_f;
            $data['s_f_t']= $apiResponse->s_f_t;
            $data['s_n']=$apiResponse->s_n;
            $data['s_n_t']=$apiResponse->s_n_t;
            $data['un_verified']=$apiResponse->un_verified;
            $data['verify_mesg']=$apiResponse->verify_mesg;

            file_put_contents(plugin_dir_path(__FILE__).'mainconfig.txt',json_encode($data));


        }

    }


    function google($site,$path){

$send=[];
$send['err']=1;

// service_account_file.json is the private key that you created for your service account.

// Open file
        $handle = @fopen($path, 'r');

// Check if file exists
        if(!$handle){
            $send['msg']="file not found";
        return $send;

        }

        try{


        $client = new Google_Client();

        $client->setAuthConfig($path);
        $client->addScope('https://www.googleapis.com/auth/indexing');

        // Get a Guzzle HTTP Client
        $httpClient = $client->authorize();
        $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

        // Define contents here. The structure of the content is described in the next step.
        $content = '{
                    "url" : "'.$site.'",
                    "type" : "URL_UPDATED"
                }';

        //var_dump($content);exit;
        $response = $httpClient->post($endpoint, [ 'body' => $content ]);

        $status_code = $response->getStatusCode();
        if($status_code==200){
            $data=[];
            $data['url']=$site;
            $data['msg']="Success";
            $data['date']=date("Y-m-d h:i:sa");
            $data['channel']="Google";
            file_put_contents(plugin_dir_path(__FILE__).'success.txt',"\n".json_encode($data),FILE_APPEND);
$send['err']=0;


        }else{
            $data=[];
            $data['errorcode']=$status_code;
            $data['url']=$site;
            $data['msg']="Please Check Your Json File or url";
            $data['date']=date("Y-m-d h:i:sa");
            $data['channel']="Google";
            file_put_contents(plugin_dir_path(__FILE__).'error.txt',"\n".json_encode($data),FILE_APPEND);
           $send['msg']="Please Check Your Json File or url";

        }

        }
        catch (Exception $e){
            $data=[];
            $data['errorcode']=$status_code;
            $data['url']=$site;
            $data['msg']=$e->getMessage();
            $data['date']=date("Y-m-d h:i:sa");
            $data['channel']="Google";
            file_put_contents(plugin_dir_path(__FILE__).'error.txt',"\n".json_encode($data),FILE_APPEND);
            $send['msg']=$e->getMessage();
            return $send;


        }


     return $send;
            }
            function bing($site,$link,$api){
                $ul="https://lovetoreads.com";
                $content = '{
               
                    "siteUrl" : "'.$site.'",
                    "url" : "'.$link.'"
                }';


        // c7c54aac12134f90941f983ff08e0c9b

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://ssl.bing.com/webmaster/api.svc/json/SubmitUrl?apikey=".$api);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
                $result = curl_exec($ch);

                $result=json_decode($result);
                if($result->ErrorCode==3){
                    $data=[];
                    $data['errorcode']=3;
                    $data['url']=$link;
                    $data['msg']="Wrong Api Key";
                    $data['date']=date("Y-m-d h:i:sa");
                    $data['channel']="Bing";
                    file_put_contents(plugin_dir_path(__FILE__).'error.txt',"\n".json_encode($data),FILE_APPEND);

                }else {

                    $data = [];
                    $data['url']=$link;
                    $data['msg'] ="Success";
                    $data['date'] = date("Y-m-d h:i:sa");
                    $data['channel']="Bing";
                    file_put_contents(plugin_dir_path(__FILE__) . 'success.txt', "\n" . json_encode($data), FILE_APPEND);

                }


        return $result;

            }



        /*

        $get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
        $data=json_decode($get);
        $url=$data->url;
        $bingapi=$data->bingapi;
        bingindex(1,$bingapi,$url);

        var_dump($data);exit;

        function checkcredentials(){


            $content = '{

                    "per" : "'.$ul.'"

                }';

            $r = $client->request('POST', 'https://theonlinevoting.com/auto-index.php', [
                [ 'per' => $content ]
            ]);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://theonlinevoting.com/auto-index.php");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
            $result = curl_exec($ch);


            var_dump($result);exit;



        }

        function bingindex($test=1,$api,$url){

        if($test==1){
            $permalink=$url;
        }
            $ul="https://lovetoreads.com";
            $content = '{

                    "siteUrl" : "'.$url.'",
                    "url" : "'.$permalink.'"
                }';


        // c7c54aac12134f90941f983ff08e0c9b
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://ssl.bing.com/webmaster/api.svc/json/SubmitUrl?apikey=".$api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
            $result = curl_exec($ch);

        $result=json_decode($result);
        if($result->ErrorCode==3){
            $data=[];
            $data['errorcode']=3;
            $data['msg']="Wrong Api Key";
            $data['date']=date("Y-m-d h:i:sa");
            file_put_contents(plugin_dir_path(__FILE__).'error.txt',"\n".json_encode($data),FILE_APPEND);

        }else {

            $data = [];

            $data['msg'] = "Wrong Api Key";
            $data['date'] = date("Y-m-d h:i:sa");
            file_put_contents(plugin_dir_path(__FILE__) . 'success.txt', "\n" . json_encode($data), FILE_APPEND);

        }


        }

        function googleindex(){



        }


        $client = new Google_Client();
        $jsonpath = $googlepath;
        // service_account_file.json is the private key that you created for your service account.

        // Open file
        $handle = @fopen($googlepath, 'r');

        // Check if file exists
        if(!$handle){
            echo 'File not found';
        }else{
            echo 'File exists';
        }

        /*
        $client->setAuthConfig($googlepath);
        $client->addScope('https://www.googleapis.com/auth/indexing');

        // Get a Guzzle HTTP Client
        $httpClient = $client->authorize();
        $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

        // Define contents here. The structure of the content is described in the next step.
        $content = '{
                    "url" : "'.$url.'",
                    "type" : "URL_UPDATED"
                }';

        //var_dump($content);exit;
        //$response = $httpClient->post($endpoint, [ 'body' => $content ]);
        //$status_code = $response->getStatusCode();













            $client = new \GuzzleHttp\Client();



        $url=$_POST['url'];
        $bingapi=$_POST['bingapi'];


        $ul="https://lovetoreads.com";
        $content = '{

                    "siteUrl" : "'.$ul.'",
                    "url" : "'.$url.'"
                }';

        $content = '{

                    "per" : "'.$ul.'"

                }';

        $r = $client->request('POST', 'https://theonlinevoting.com/auto-index.php', [
            [ 'per' => $content ]
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://theonlinevoting.com/auto-index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        $result = curl_exec($ch);


        var_dump($result);exit;


        // c7c54aac12134f90941f983ff08e0c9b
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://ssl.bing.com/webmaster/api.svc/json/SubmitUrl?apikey=".$bingapi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        $result = curl_exec($ch);


        var_dump($result);



        */

?>