<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>


<?php





if(isset($_POST['testbing'])){
    include_once('bingtest.php');
    $get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
    $data=json_decode($get);
     $site=$data->url;
    $checkget=file_get_contents(plugin_dir_path(__FILE__).'mainconfig.txt');
    $datacheck=json_decode($checkget);
    $bingapi=$data->bingapi;
    $file=$data->google_json_file;


    $result=bing($site,$site,$bingapi);


if($result->ErrorCode==3){
 echo "<div class='notice notice-error'>".$result->Message."</div>";
}else {
    echo "<div class='notice notice-success'>Please Check in Bing Webmaster  Submit Urls</div>";

}

}
if(isset($_POST['testgoogle'])){
    include_once('bingtest.php');
    $get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
    $data=json_decode($get);
    $site=$data->url;

    $bingapi=$data->bingapi;
    $file=$data->google_json_file;
    $result=google($site,$file);
    if($result['err']==1){
        echo "<div class='notice notice-error'>".$result['msg']."</div>";
    }else {
        echo "<div class='notice notice-success'>Success</div>";

    }
}


if(isset($_POST['submit'])){

    $url=$_POST['url'];
    $bingapi=$_POST['bingapi'];

    $target_dir = plugin_dir_path(__FILE__)."upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;

    $data=[];
    $data["url"]=$url;
    $data["bingapi"]=$bingapi;
    $data['enable_bing']=$_POST['enable_bing'];
    $data['enable_google']=$_POST['enable_google'];
    $data['email']=$_POST['email'];
    $email=$_POST['email'];



    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $data['google_json_file']=$target_dir . $_FILES["file"]["name"];
        file_put_contents(plugin_dir_path(__FILE__).'config.txt','');

        file_put_contents(plugin_dir_path(__FILE__).'config.txt',json_encode($data));

        //  include_once('bingtest.php');

    } else {

        $data['google_json_file']=$_POST['google_json_value'];
        file_put_contents(plugin_dir_path(__FILE__).'config.txt','');


        file_put_contents(plugin_dir_path(__FILE__).'config.txt',json_encode($data));

    }

    $postRequest = [
       "add"=>"3",
        "email" => $email,
        "site" =>$site
    ];


    $cURLConnection = curl_init('https://theonlinevoting.com/Autoindex/auto-index.php');
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);

    // echo $url;


}


?>

<?php
if(file_exists(plugin_dir_path(__FILE__).'config.txt')){
    $get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
    $data=json_decode($get);
    $email=$data->email;
    $site=$data->url;
    $enablegoogle=$data->enable_google;
    $enablebing=$data->enable_bing;
    $bingapi=$data->bingapi;
    $file=$data->google_json_file;

}

?>
<div class="container">
  <h2>AutoFast Indexing Settings</h2>
  <form class="form-horizontal" method="post" enctype="multipart/form-data" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Site:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="url" placeholder="https://" name="url" value="<?php echo $site; ?>">
      </div>
    </div>

<div class="form-group">     
 <label class="control-label col-sm-2" for="pwd">Enable Api:</label>   
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
            <?php if($enablegoogle=='on'){ ?>
          <label><input type="checkbox"   name="enable_google" checked> Google Indexing</label>
            <?php }else{ ?>
                <label><input type="checkbox"   name="enable_google"> Google Indexing</label>

            <?php } ?>
        </div>
         <div class="checkbox">

             <?php if($enablebing=='on'){ ?>
                 <label><input type="checkbox" id="check"   name="enable_bing" checked>Bing Indexing</label>


             <?php }else{ ?>
                 <label><input type="checkbox"  id="check" name="enable_bing">Bing Indexing</label>

             <?php } ?>


         </div>
      </div>
    </div>

 <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Bing Api Key:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pwd" placeholder="" name="bingapi" value="<?php echo $bingapi; ?>">
      </div>
    </div>

 <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Upload Google Json:</label>
      <div class="col-sm-10">
          <?php if($file){ ?>
              <button type="button" name="submit" class="btn btn-default" onclick="$(this).next().toggle();">Edit</button>
              <input type="file" class="form-control" id="pwd" style="display:none;" placeholder=""  name="file">
<input name="google_json_value" type="hidden" value="<?php echo $file; ?>"/>



          <?php }else{ ?>

        <input type="file" class="form-control" id="pwd" placeholder="https://" name="file">

          <?php } ?>

      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
<div class="row">
    <?php if($enablebing=='on'){ ?>
          <form method="post">
            <input type="hidden" name="site" value="<?php echo $site; ?>"/>
            <button type="submit" name="testbing" class="btn btn-default">Test Bing</button>

        </form>

    <?php } ?>
    <?php if($enablegoogle=='on'){ ?>
        <form method="post">
            <input type="hidden" name="site" value="<?php echo $site; ?>"/>
            <button type="submit" name="testgoogle" class="btn btn-default">Test Google</button>

        </form>

    <?php } ?>
</div>
</div>
<script>

    $('#check').change(function(e) {
        $(e).val($(this).is(':checked'));
        if($(e).val()==1){
            $(e).val(0);
        }else{
            $(e).val(1);
        }

    });


</script>


<script>

  </script>

</body>
</html>
