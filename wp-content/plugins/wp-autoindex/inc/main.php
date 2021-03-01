<?php
$get=file_get_contents(plugin_dir_path(__FILE__).'config.txt');
$data=json_decode($get);
$email=$data->email;


$get=file_get_contents(plugin_dir_path(__FILE__).'mainconfig.txt');
$data=json_decode($get);

$text=$data->s_f_t;


if($data->s_f==1){
    add_action('wp_footer', 'wpshout_action_example3');

}

if($data->s_n==1){
    add_action( 'admin_notices', 'sample_admin_notice__error' );

}


if($data->un_verified==1){
    add_action( 'admin_notices', 'sample_admin_notice__error_unverify' );

}


function sample_admin_notice__error_unverify() {
    $get=file_get_contents(plugin_dir_path(__FILE__).'mainconfig.txt');
    $data=json_decode($get);
    $class = 'notice notice-warning';
    $message = __( $data->verify_mesg, 'sample-text-domain' );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ),  $message  );
}


function sample_admin_notice__error() {
    $get=file_get_contents(plugin_dir_path(__FILE__).'mainconfig.txt');
    $data=json_decode($get);
    $class = 'notice notice-warning';
    $message = __( $data->s_n_t, 'sample-text-domain' );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ),  $message  );
}

function wpshout_action_example3($text) {
    $get=file_get_contents(plugin_dir_path(__FILE__).'mainconfig.txt');
    $data=json_decode($get);
   // var_dump($data->s_f_t);
    echo $data->s_f_t;
}

?>