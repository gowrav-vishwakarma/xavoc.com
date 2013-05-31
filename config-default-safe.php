<?php

define('SALE','Sale');
// Changed to 5 ob_get_level(oid)
define('DISTRIBUTE','200,150,125,100,75');

$config['atk']['base_path']='./atk4/';
$config['dsn']='mysql://root:winserver@localhost/sv';

$config['url_postfix']='';
$config['url_prefix']='?page=';

$config['logger']['log_dir']='./';


$config['tmail']['transport'] = "PHPMailer";
$config['tmail']['phpmailer']['from'] = "your_email_id@xavoc.com";
$config['tmail']['from'] = "your_email_id@xavoc.com";
$config['tmail']['phpmailer']['from_name'] = "Xavoc International";
$config['tmail']['smtp']['host'] = "ssl://mail.xavoc.com";
$config['tmail']['smtp']['port'] = 465;
$config['tmail']['phpmailer']['username'] = "your_email_id@xavoc.com";
$config['tmail']['phpmailer']['password'] = "Your Password here";
$config['tmail']['phpmailer']['reply_to'] = "your_email_id@xavoc.com";
$config['tmail']['phpmailer']['reply_to_name'] = "Xavoc International";

$config['map']['google']['key']="Your Key Here";

date_default_timezone_set('Asia/Calcutta');
// echo date('H:i:s', time()); 

# Agile Toolkit attempts to use as many default values for config file,
# and you only need to add them here if you wish to re-define default
# values. For more options look at:
#
#  http://www.atk4.com/doc/config

