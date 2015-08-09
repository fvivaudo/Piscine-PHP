#!/usr/bin/php
<?php
echo preg_replace_callback('/<a.*<\/a>/iUs', function($match) {$str = $match[0];$str = preg_replace_callback('/>.*</Uis', function($match) { return strtoupper($match[0]);}, $str);$str = preg_replace_callback('/(?<=title=)".*"/Usi', function($match) { return strtoupper($match[0]); },$str);return $str;}, $str = file_get_contents($argv[1]));
?>