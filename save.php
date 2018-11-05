<?php
error_reporting(E_ALL);

// 		save.php: saves MouselabWEB data in database
//
//       v 1.00betav2 , 14 Aug 2008    
//		updated version v2 using real_escape_string functions to escape quotes 
//		before loading into the database
//
//     (c) 2003-2008 Martijn C. Willemsen and Eric J. Johnson 
//
//    This program is free software; you can redistribute it and/or modify
//    it under the terms of the GNU General Public License as published by
//    the Free Software Foundation; either version 2 of the License, or
//    (at your option) any later version.
//
//    This program is distributed in the hope that it will be useful,
//    but WITHOUT ANY WARRANTY; without even the implied warranty of
//    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//    GNU General Public License for more details.
//
//    You should have received a copy of the GNU General Public License
//    along with this program; if not, write to the Free Software
//    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

include('mlwebdb.inc.php');

$expname = "";
$subject = "";
$condnum = "";
$choice = "";
$procdata = "";
$nextURL = "";
$addvar = "";
$adddata = "";
$txtDataISLER = "";
$txtDataKRITERLER = "";
//var_dump($_POST); exit;

foreach ($_POST as $key => $value) { 
     switch ($key) {
			case "expname":
				$expname = $value;
				break;
			case "subject":
				$subject = $value;
				break;
			case "condnum":
				$condnum= $value;
				break;
			case "is":
				$txtDataISLER= $value;
				break;	
			case "kr":
				$txtDataKRITERLER= $value;
				break;						
			case "choice":
				$choice= $value;
				break;
			case "procdata":
				$procdata= mysqli_real_escape_string($conn, $value);
				break;
			case "nextURL":
				$nextURL= $value;
				break;
			case "to_email":
				// ignore emailaddress 
				break;
			default:
			$addvar .= mysqli_real_escape_string($conn, $key).";";
			$adddata .= "\"".mysqli_real_escape_string($conn, $value)."\";" ; 
			}
    }

$ipstr = $_SERVER['REMOTE_ADDR'];

$sqlquery = "select MAX(id) from $table";
//$result = mysql_query($sqlquery);
$result = mysqli_query($conn, $sqlquery);


//$id = mysql_result($result,0);
if($result)
{
	if($row = $result->fetch_row()) {
        $id = $row[0];

    }
}

if (is_null($id)) $id=0; else $id++; 

$sqlquery = "INSERT INTO $table (id, expname, subject, ip, condnum, choice, submitted, procdata, addvar, adddata) VALUES ($id,'$expname','$subject','$ipstr', $condnum,'$choice',NOW(),'$procdata', '$addvar', '$adddata')";
//$result = mysql_query($sqlquery);

$result = mysqli_query($conn, $sqlquery);
mysqli_close();

/* Redirect to a different page in the current directory that was requested */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
if($_POST['is_secim']=="1")
{
	$arrData = explode(";",$addvar);
	$txtDataISLER = "";	
	foreach($arrData as $aData)
	{
		$iIS = strpos($aData, "is_ID_");
		if($iIS!==false)
		{
			//echo substr($aData, $iIS+6, strlen($aData)-$iIS-6);
			$txtDataISLER .= substr($aData, $iIS+6, strlen($aData)-$iIS-6).",";
		}					
	}

	header("Location: http://$host$uri/$nextURL?subject=$subject&condnum=$condnum&is=$txtDataISLER");
}
else if($_POST['kriter_secim']=="1")
{
	$arrData = explode(";",$addvar);
	$txtDataKRITERLER = "";
	$txtDataISLER = $_POST['is'];	
	foreach($arrData as $aData)
	{
		$iKR = strpos($aData, "kr_ID_");
		if($iKR!==false)
		{
			$txtDataKRITERLER .= substr($aData, $iKR+6, strlen($aData)-$iKR-6).",";
		}
	}

	header("Location: http://$host$uri/$nextURL?subject=$subject&condnum=$condnum&is=$txtDataISLER&kr=$txtDataKRITERLER");
}
else if($expname=="isbilgi2" || $expname=="is_teklifi_sec")
{
	header("Location: http://$host$uri/$nextURL?subject=$subject&condnum=$condnum&is=$txtDataISLER&kr=$txtDataKRITERLER");
}
else
{
	//echo $condnum;exit;
	header("Location: http://$host$uri/$nextURL?subject=$subject&condnum=$condnum");
}
exit;
?>