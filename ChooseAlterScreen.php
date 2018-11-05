<?php 
/* Designed by Zeliha Yıldırım, and Semra Erpolat Taşabat in 2018*/
/* To contact us : zlhyldrm@gmail.com
/*Search CHANGE: to find the changes that you have to make. Note: "is" means a job in Turkish.*/
include('mlwebdb.inc.php');
if (isset($_GET['subject'])) {$subject=$_GET['subject'];}
 else {$subject="anonymous";}
if (isset($_GET['condnum'])) {$condnum=$_GET['condnum'];}
	else {$condnum=-1;}
if (isset($_GET['to_email'])) {$to_email=$_GET['to_email'];}
	else {$to_email="";}	
if (isset($_GET['expname'])) {$expname=$_GET['expname'];}
	else {$expname="";}	
?><HTML>
<HEAD>
<TITLE>Dynamic MouselabWEB Research</TITLE>
<script language=javascript src="mlweb2.js"></SCRIPT> 
<link rel="stylesheet" href="mlweb.css" type="text/css">
<style>
.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    opacity: 0.9;
    filter: alpha(opacity=90); /* For IE8 and earlier */	
    visibility: hidden;
    width: 140px;
	left:50px;
	top:20px;	
    background-color:#000;
    color: #fff;
    text-align: left;
    border-radius: 4px;
    padding: 6px 10px;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body onLoad="timefunction('onload','body','body')">
<!--BEGIN set vars--><script language="javascript">
//override defaults
mlweb_outtype="CSV";
mlweb_fname="mlwebform";
chkFrm=true;
warningTxt="Some questions have not been answered. Please answer all questions before continuing!";
//CHANGE: you should change this number according to the number of alternatives on the task. In this study, there is 4 alternatives in the task.
var toplamSecilmesiGerekenIsAdedi = 4;

function isSecimiToggle()
{
	var secim = document.getElementById('is_toggle').checked;
	if(secim)
	{
		document.getElementById('divIsler').style.display="none";
		var hoverInv = document.querySelectorAll('[id^="is_ID_"]');

		var selectedCount = 0;
		for (var i=0; i<hoverInv.length; i++)
		{
			hoverInv[i].checked = false;
		}	
		
//CHANGE: If the subject does not want to select any alternatives, the program will bring the default alternatives from the database. 
//CHANGE: You should change these ids according to their ids: 
		document.getElementById('is_ID_12').checked = true;
		document.getElementById('is_ID_19').checked = true;
		document.getElementById('is_ID_6').checked = true;
		document.getElementById('is_ID_5').checked = true;								
	}
	else
	{
		document.getElementById('divIsler').style.display="block";		
	}
}

function formKontrol()
{
	bIsler = kontrolIsler();
	
	return (bIsler);
}

function kontrolIsler()
{
	var secim = document.getElementById('is_toggle').checked;

	if(secim)
	{ 
		return true;
	}
	else
	{
		var hoverInv = document.querySelectorAll('[id^="is_ID_"]');

		var selectedCount = 0;
		for (var i=0; i<hoverInv.length; i++)
		{
			if(hoverInv[i].checked)
			{
				selectedCount++;
			}
		}
		if(selectedCount!=toplamSecilmesiGerekenIsAdedi)
		{

			alert("Please select "+toplamSecilmesiGerekenIsAdedi+" alternatives! (You have selected "+selectedCount+" 		  alternatives.)");


			return false;
		}
	}
	
	return true;
}

</SCRIPT>
<!--END set vars-->

<?php
	$expname = "ChooseAlterScreen";
	$nextURL = "ChooseAttriScreen.php";
?>

<FORM name="mlwebform" method="POST" onSubmit="return (checkForm(this) && formKontrol());" action="save.php">
<INPUT type=hidden name="procdata" value="">
<INPUT type=hidden name="is_secim" value="1">
<!-- set all variables here -->
<input type=hidden name="subject" value="<?=$subject?>">
<input type=hidden name="expname" value="<?=$expname?>">
<input type=hidden name="nextURL" value="<?=$nextURL?>">
<input type=hidden name="choice" value="">
<input type=hidden name="condnum" value="<?=$condnum?>">
<input type=hidden name="to_email" value="<?=$to_email?>">

<div class="bodyDiv">
<?php $tableWidth=1100; ?>
<div align="center" style="width:1088px; padding:5px 5px; border:1px solid #333333; background-color:#0FC; color:#000000; font-weight:bold;">Please select 4 jobs in total. If you want to inform about a job, move the cursor over the job.</div>
<div id="divIsler">
<table border="0" cellpadding="5" width="<?=$tableWidth?>">
    <tr style="background-color:#CCC;">
    <?php
        mysqli_query($conn, "SET NAMES 'utf8'");
/*CHANGE: If there is a group name for each alternative, you may want to change "group" in this code, such as sector or type */
        $sqlQuery = "SELECT DISTINCT cAlt AS group FROM Talternatives ORDER BY RAND()";
        $result = mysqli_query($conn, $sqlQuery) or die("Error: System error!"); 
        
        # Check whether NULL records found 
        if(!mysqli_num_rows($result)) 
            die("Error: There is no such an alternative/attributes in the database!"); 
    
        $i=0;	
		$resCountGroup = mysqli_num_rows($result);
        $arrGroup = array();
        while($row=mysqli_fetch_assoc($result)) 
        {
             array_push($arrGroup, $row["group"]);
			 ?><td width="<?=$tableWidth/$resCountGroup?>"><?=$row["group"]?></td><?php
        }
		?></tr><tr><?php
        foreach($arrGroup as $group)
        {
            $sqlQuery = "SELECT id, cAlt, cAltExpl FROM Talternatives WHERE cGrpAlt='".$group."' ORDER BY RAND()";
            $result = mysqli_query($conn, $sqlQuery) or die("Error: System error!");	
            ?><td valign="top"><?php
            while($row=mysqli_fetch_assoc($result)) 
            {
                ?>
                    <div style="margin-top:10px; display:block; line-height:22px; font-size:16px;">
						<div class="tooltip"><INPUT type="checkbox" name='is_ID_<?=$row['id']?>' id="is_ID_<?=$row['id']?>" value='true'> <?=$row['cAlt']?><span class="tooltiptext"><?=$row['cAltExpl']?></span></div>
                    </div>
                <?php
            }
            ?></td>
            <?php 
        }	
        //mysqli_close();
    ?>
</tr>
</table>
</div>

<div style="border:none; background:#FF9;	">
    <div style="float:left;line-height:20px; height:20px;"><input onChange="isSecimiToggle();" type="checkbox" style="width:20px; height:20px; display:block;" name="is_toggle" id="is_toggle"></div>
    <div style="float:left; font-size:18px; line-height:28px; height:28px; color:#000000;">Do not want to choose</div>
    <div style="float:none; clear:both;"></div>    
</div>

<div align="left">
<INPUT style="margin-top:3px;" type="submit" value=">> Next >>" class="nextBUT">
</div>

</div>
</FORM>
</body></html>
