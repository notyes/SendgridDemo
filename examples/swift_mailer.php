<?php

//  This file is a backup file ,, to development

// show error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

# The following example builds the X-SMTPAPI headers and adds them to swiftmailer. [Swiftmailer](http://swiftmailer.org/) then sends the email through SendGrid. You can use this same code in your application or optionally you can use [sendgrid-php](http://github.com/sendgrid/sendgrid-php).

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/lib/Smtpapi.php';
require dirname(__DIR__).'/lib/Smtpapi/Header.php';
use Smtpapi\Header;

// set load env, if not file .env  please create file .env in root project
$dotenv = new Dotenv\Dotenv(__DIR__.'/../');
$dotenv->load();

// set value 
$sendgrid_username = getenv('USER');
$sendgrid_password = getenv('PASS');
$apiKey = getenv('SENDGRID_API_KEY');

/**
 * --------------------------------------------------
 *
 * Process for sent email use SMTP
 *
 */

$transport = \Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);

$transport->setUsername($sendgrid_username);
$transport->setPassword($sendgrid_password);

$mailer = \Swift_Mailer::newInstance($transport);

$message = new \Swift_Message();
$message->setTo(array('22@bizidea.co.th'));
$message->setFrom('i@me.com');
$message->setSubject('Hello');
$message->setBody('Hiii are you doing?');
$header = new Header();
$header->addSubstitution('Hii', array('Owl'));

$message_headers = $message->getHeaders();
$message_headers->addTextHeader(HEADER::NAME, $header->jsonString());

try {
    $response = $mailer->send($message);
    echo '<pre>';
    print_r( $response );
    echo '</pre>';
    die();
} catch(\Swift_TransportException $e) {
    print_r('Bad username / password');
}

/*------------  End of Section comment block  ------------*/



/**
 * --------------------------------------------------
 *
 * Process for save in sendgridDB
 *
 */

// save contact to database sengrid
$sg = new \SendGrid($apiKey);
$request_body = json_decode('[
  {
    "email": "helooworld@example.com", 
    "first_name": "hello", 
    "last_name": "world"
  }
]');

// set for save SendGridDB
$response = $sg->client->contactdb()->recipients()->post($request_body);

// get id recipient for after insert
$recipient_id = json_decode($response->body())->persisted_recipients[0];

// add data recipient in list
$response = $sg->client->contactdb()->lists()->_('420519')->recipients()->_($recipient_id)->post();

//  if _status_code -- 201 is success or is not as 201 , please check document in https://github.com/sendgrid/sendgrid-php/blob/master/USAGE.md 
echo '<pre>';
print_r( $response );
echo '</pre>';
die();

/*------------  End of Section comment block  ------------*/







