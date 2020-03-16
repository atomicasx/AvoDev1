<?php
//error_reporting(E_ALL);
//error_reporting(E_ALL);
///@ini_set('display_errors',1);
$src = "upload/*";  // source folder or file
$dest = "qrboximages/";   // destination folder or file        

$rm="qrboximages/*";
shell_exec("rm -rf $rm");
shell_exec("cp -r $src $dest");

echo "<H2>Copy files completed!</H2>"; //output when done

$directory = 'qrboximages/';
if ($handle = opendir($directory)) { 
    while (false !== ($fileName = readdir($handle))) {     
        echo $newName = $fileName.'.png';

		$newName = strstr($newName, '.png', true);
		$newName.='.png';
        rename($directory . $fileName, $directory . $newName);
    }
    closedir($handle);
}
?>