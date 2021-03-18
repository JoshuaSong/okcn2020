<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'third_party/aws/aws-autoloader.php';
class Aws_model extends CI_Model
{
	public function SendAwsSms($number,$messege){
		$params = array(
		'credentials'=> array(
		'key'=>'AKIA275QIEN4K35WJQOY',
		'secret'=>'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',
		),
		'region'=>'us-west-1',
		'version'=>'latest'
		);
		$sns = new \Aws\Sns\SnsClient($params);
		$args = array(
		"SenderID"=>"OKCN Radio",
		"SMSType"=>"Transactional",
		"Message"=>$messege,
		"PhoneNumber"=>$number,
		);
		return $sns->publish($args);
		}
		
		
}

