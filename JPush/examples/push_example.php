<?php
/**
 * 该示例主要为JPush Push API的调用示例
 * HTTP API文档:http://docs.jpush.io/server/rest_api_v3_push/
 * PHP API文档:https://github.com/jpush/jpush-api-php-client/blob/master/doc/api.md#push-api--构建推送pushpayload
 */
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
require_once("../JPush.php");

$br = '<br/>';
$app_key = 'baab624c137bc39fb2e60c14';
$master_secret = 'e866411ec63c9c3b486a6618';

// 初始化
$client = new JPush($app_key, $master_secret);

// 简单推送示例
// $result = $client->push()
//     ->setPlatform('all')
//     ->addAllAudience()
//     ->setNotificationAlert('Hi, JPush')
//     ->send();

// echo 'Result=' . json_encode($result) . $br;

// 完整的推送示例,包含指定Platform,指定Alias,Tag,指定iOS,Android notification,指定Message等
$result = $client->push()
    ->setPlatform(array('ios', 'android'))
    ->addAllAudience()
    //->addAlias('alias1')
    //->addTag(array('tag1', 'tag2'))
    //->setNotificationAlert('Hi, JPush')
    //->addAndroidNotification('Hi, android notification', 'notification title', 1, array("key1"=>"value1", "key2"=>"value2"))
    //->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
    ->setMessage('{"type":"special","data":"aaaa","content":"\u63a8\u9001\u4e00\u4e2a\u6d88\u606f\u8bd5\u8bd5"}', '龍柒', 'type', array("第一个key"=>"第一个值", "第二个key"=>"第二个值"))
    ->setOptions(100000, 3600, null, false)
    ->send();

echo 'Result=' . json_encode($result) . $br;


// 完整的推送示例,包含指定Platform,指定Alias,Tag,指定iOS,Android notification,指定Message等
// $result = $client->push()
// ->setPlatform(array('ios', 'android'))
// ->addAlias('alias1')
// ->addTag(array('tag1', 'tag2'))
// ->setNotificationAlert('Hi, JPush')
// ->addAndroidNotification('Hi, android notification', 'notification title', 1, array("key1"=>"value1", "key2"=>"value2"))
// ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
// ->setMessage("内容内容", '标题标题标题', 'type', array("第一个key"=>"第一个值", "第二个key"=>"第二个值"))
// ->setOptions(100000, 3600, null, false)
// ->send();

// echo 'Result=' . json_encode($result) . $br;

// 指定推送短信示例(推送未送达的情况下进行短信送达, 该功能需预付短信费用, 并调用Device API绑定设备与手机号)
/* $result = $client->push()
    ->setPlatform('all')
    ->addTag('tag1')
    ->setNotificationAlert("Hi, JPush SMS")
    ->setSmsMessage('Hi, JPush SMS', 60)
    ->send(); */

// echo 'Result=' . json_encode($result) . $br;