<?php defined('BASEPATH') OR exit('No direct script access allowed');


$config['use_ssl'] = TRUE;


$config['verify_peer'] = TRUE;


$config['access_key'] = 'AKIAJHJ762GWZKG26TMA';


$config['secret_key'] = '8VTCMW6hnlpxb56eDhWUAY4aoVbKH1oUZtWM0KvP';


$config['bucket_name'] = 'cdsaws';


$config['folder_name'] = 'vou/';


$config['s3_url'] = 'https://cdsaws.s3.amazonaws.com/';


$config['get_from_enviroment'] = FALSE;


$config['access_key_envname'] = 'S3_KEY';


$config['secret_key_envname'] = 'S3_SECRET';


if ($config['get_from_enviroment']){
	$config['access_key'] = getenv($config['access_key_envname']);
	$config['secret_key'] = getenv($config['secret_key_envname']);

}