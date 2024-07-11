#!/usr/bin/php
<?php
/*
 * This script is create Digest Authentication files.
 */
 
// ".htdigest"'s path
$path = "/path/to/.htdigest";
 
// Common realms
$realm = [
    "This contents can join at Administrators only.",
    "Members only."
];
  
// Login users setting
$users = [
    [
        "name"     => "admin",
        "realm"    => $realm[0],
        "password" => "adminpassword",
    ],
    [
        "name" => "member",
        "realm" => $realm[1],
        "password" => "memberpassword",
    ]
];
 // Create Crypted password
foreach ($users as $val)
{
    $put[] = sprintf('%s:%s:%s',$val["name"],$val["realm"],md5(sprintf('%s:%s:%s',$val["name"],$val["realm"],$val["password"])));
}
 
// Create .htdigest
$fp = @fopen($path,"w");
@($fp,implode("\n",$put)."\n");
@fclose($fp);
