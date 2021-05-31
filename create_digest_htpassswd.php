#!/usr/bin/php
<?php
/*
 * This script is create Digest Authentication files.
 */
 
// ".htdigest"'s path
$path = "/path/to/.htdigest";
 
// Common realms
$realm = array(
    0 => "This contents can join at Administrators only.",
    1 => "Members only.",
);
  
// Login users setting
$users = array(
    0=>array(
        "name"     => "admin",
        "realm"    => $realm[0],
        "password" => "adminpassword",
    ),
    1=>array(
        "name" => "member",
        "realm" => $realm[1],
        "password" => "memberpassword",
    ),
);
 // Create Crypted password
foreach ($users as $val)
{
    $put[] = sprintf('%s:%s:%s',$val["name"],$val["realm"],md5(sprintf('%s:%s:%s',$val["name"],$val["realm"],$val["password"])));
}
 
// Create .htdigest
$fp = @fopen($path,"w");
@($fp,implode("\n",$put)."\n");
@fclose($fp);

