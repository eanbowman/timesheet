<?php
$q_show = null;
$q_docket = null;
$q_employee = null;
if( array_key_exists( 'show', $_REQUEST ) ) $q_show = $_REQUEST['show'];
if( array_key_exists( 'docket', $_REQUEST ) ) $q_docket = $_REQUEST['docket'];
if( array_key_exists( 'employee', $_REQUEST ) ) $q_employee = $_REQUEST['employee'];
?>
<!-- BEGIN NAVIGATION -->
<ul id="navigation">
	<li id="home"<?php if( $q_show == "home" ) echo " class=\"selected\""; ?>><a class="nav-link" href="?show=home"><span>home</span></a></li>
	<li id="docket"<?php if( $q_show == "docket" ) echo " class=\"selected\""; ?>><a class="nav-link" href="?show=docket&amp;docket=<?php echo $q_docket; ?>"><span>dockets</span></a></li>
	<li id="timesheet"<?php if( $q_show == "timesheet" ) echo " class=\"selected\""; ?>><a class="nav-link" href="?show=timesheet&amp;docket=<?php echo $q_docket; ?>"><span>timesheets</span></a></li>
	<li id="employee"<?php if( $q_show == "employee" ) echo " class=\"selected\""; ?>><a class="nav-link" href="?show=employee&amp;employee=<?php echo $q_employee; ?>"><span>employees</span></a></li>
	<li id="logout"><a class="nav-link" href="?show=logout"><span>logout</span></a></li>
</ul>
<!-- END NAVIGATION -->
