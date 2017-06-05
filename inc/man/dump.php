<?php
//Exibe erros PHP
@ini_set('display_errors', '1');
error_reporting(E_ALL); 

$DBUSER1="iap_hawk";
$DATABASE1="iap_hawk";
$DBUSER2="iap_wp";
$DATABASE2="iap_wp";
$DBPASSWD="caio56iap";



$filename1 = "backup-$DATABASE1" . date("YmdHis") . ".sql.gz";
$filename2 = "backup-$DATABASE2" . date("YmdHis") . ".sql.gz";
$mime = "application/x-gzip";

//header( "Content-Type: " . $mime );
//header( 'Content-Disposition: attachment; filename="' . $filename1 . '"' );

$cmd1 = "mysqldump -u $DBUSER1 --password=$DBPASSWD -h iap_hawk.mysql.dbaas.com.br $DATABASE1 | gzip --best > /var/www/html/bkp_iap/$filename1";
system($cmd1);   

//passthru( $cmd1 );

//header( "Content-Type: " . $mime );
//header( 'Content-Disposition: attachment; filename="' . $filename2 . '"' );

$cmd2 = "mysqldump -u $DBUSER2 --password=$DBPASSWD -h iap_wp.mysql.dbaas.com.br $DATABASE2 | gzip --best > /var/www/html/bkp_iap/$filename2";   
system($cmd2);

//passthru( $cmd2 );




exit(0);
?>