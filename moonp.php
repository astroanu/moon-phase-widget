<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Moon Phase</title>
<style type="text/css">
<!--
.title {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	text-align: center;
	vertical-align: middle;
	color: #999999;
}
.date {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	text-align: center;
	vertical-align: middle;
	color: #999999;
}
.bak {
	background-image: url(moonbg.jpg);
}
.image {
	text-align: center;
	vertical-align: middle;
}
.poweredby {
	color: #666666;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
	text-align: center;
	vertical-align: middle;
}
a:link {
	color: #666666;
	text-decoration: none;
}
a:visited {
	color: #666666;
	text-decoration: none;
}
a:hover {
	color: #FFFFFF;
	text-decoration: underline;
}
a:active {
	color: #666666;
	text-decoration: none;
}
.pname {
	font-size: 12px;
}
.style1 {font-size: 8px}
-->
</style>
</head>

<body><?
date_default_timezone_set('Asia/Colombo');
//$date = date('Ymd.Hi', time());
if ($_GET['d']<>""){
	if ($_GET['m']<>""){
		if ($_GET['y']<>""){
			$y=$_GET['y'];
			$d=$_GET['d'];
			$m=$_GET['m'];
		}
	}
}else{
	$y= date('Y');
	$d=date('d');
	$m=date('m');
}
		
function MoonAge( $d,  $m,  $y) { 
    $j = JulianDate($d, $m, $y);
    $ip = ($j + 4.867) / 29.53059;
    $ip = $ip - floor($ip); 
    if($ip < 0.5)
        $ag = $ip * 29.53059 + 29.53059 / 2;
    else
        $ag = $ip * 29.53059 - 29.53059 / 2;
    $ag = floor($ag) + 1;
    return $ag;
}

function JulianDate($d,$m,$y) {
    $yy = $y - (int)((12 - $m) / 10);
    $mm = $m + 9;
    if ($mm >= 12)
    {
        $mm = $mm - 12;
    }
    $k1 = (int)(365.25 * ($yy + 4712));
    $k2 = (int)(30.6001 * $mm + 0.5);
    $k3 = (int)((int)(($yy / 100) + 49) * 0.75) - 38;
    $j = $k1 + $k2 + $d + 59;
    if ($j > 2299160)
    {
        $j = $j - $k3; 
    }
    return $j;
}

?>
<table width="160" border="0" cellpadding="0" cellspacing="0" class="bak">
  <tr>
    <td width="160" height="33" valign="top" class="title">Moon Phase</td>
  </tr>
  
  <tr>
    <td height="119" valign="top" class="image"><a href="http://moon-phase-widget.herokuapp.com" target="_blank"><img src="phases/<? echo MoonAge($d,$m,$y);?>.jpg" border="0"/></a></td>
  </tr>
  <tr>
    <td height="55" valign="top" class="date"><? echo "Date : " . $y ."-" . $m ."-" .  $d; ?><br />      <p class="pname">
  <?
$MoonAge=MoonAge($d,$m,$y);
//echo $MoonAge;
if ($MoonAge==1){
	$pname="New Moon";
}
if ($MoonAge>=2){
	if ($MoonAge<=8){
	$pname="Waxing Crescent";
	}
}
if ($MoonAge==9){
	$pname="First Quarter Moon";
}
if ($MoonAge>=10){
	if ($MoonAge<=14){
	$pname="Waxing Gibbous";
	}
}
if ($MoonAge==15){
	$pname="Full Moon";
}
if ($MoonAge>=16){
	if ($MoonAge<=22){
	$pname="Waning Gibbous";
	}
}
if ($MoonAge==23){
	$pname="Third Quarter Moon";
}
if ($MoonAge>=24){
	if ($MoonAge<=30){
	$pname="Waning Crescent";
	}
}

echo $pname; ?>
    </p></td>
  </tr>
  <tr>
    <td height="43" valign="top" class="poweredby">Powered by <a href="http://www.skylk.com" target="_blank">www.skylk.com</a><br />
      <span class="style1"><a href="http://moon-phase-widget.herokuapp.com" target="_blank">Embed this on to your website/blog</a></span></td>
  </tr>
</table>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6257961-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
