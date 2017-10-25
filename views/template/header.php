<?php
error_reporting( E_ALL ^ E_WARNING ); 
include("include/init.php"); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if( array_key_exists( 'show', $_REQUEST ) && $_REQUEST['show'] != "" ) echo ucwords( $_REQUEST['show'] ) . " &bull; "; ?>Docket System</title>
<?php include("meta.php"); ?>
</head>

<body>


