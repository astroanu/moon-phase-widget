<?php // no direct accessdefined('_JEXEC') or die('Restricted access');
if ($params->get('Year')==""){
?><iframe src="http://moon-phase-widget.herokuapp.com/moonp.php" height="255" width="165" scrolling="no" frameborder="0" ></iframe>
<? }else{?><iframe src="http://moon-phase-widget.herokuapp.com/moonp.php?y=<? echo $params->get('Year') ?>&m=<? echo $params->get('Month')?>&d=<? echo $params->get('Day')?>" height="255" width="165" scrolling="no" frameborder="0" ></iframe>
<?} ?>


