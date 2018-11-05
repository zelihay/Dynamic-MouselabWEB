<?php 
/* Designed by Zeliha Yıldırım, and Semra Erpolat Taşabat in 2018*/
/* To contact us : zlhyldrm@gmail.com
/* Search CHANGE to find the place that you need to change. Note: "kriter" means an attribute in Turkish.*/
include('mlwebdb.inc.php');
if (isset($_GET['subject'])) {$subject=$_GET['subject'];}
 else {$subject="anonymous";}
if (isset($_GET['condnum'])) {$condnum=$_GET['condnum'];}
	else {$condnum=-1;}
if (isset($_GET['to_email'])) {$to_email=$_GET['to_email'];}
	else {$to_email="";}	
if (isset($_GET['expname'])) {$expname=$_GET['expname'];}
	else {$expname="";}	
if (isset($_GET['is'])) {$is_sec=$_GET['is'];}
	else {$is_sec="";}	
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body onLoad="timefunction('onload','body','body')">
<!--BEGIN set vars--><script language="javascript">
//override defaults
mlweb_outtype="CSV";
mlweb_fname="mlwebform";
chkFrm=true;
warningTxt="Some questions have not been answered. Please answer all questions before continuing!";
//CHANGE: Change the number of attributes in the decision task. 
var toplamSecilmesiGerekenKriterAdedi = 5;

function kriterSecimiToggle()
{
	var secim = document.getElementById('kriter_toggle').checked;
	if(secim)
	{
		document.getElementById('divKriterler').style.display="none";
		var hoverInv = document.querySelectorAll('[id^="kr_ID_"]');

		var selectedCount = 0;
		for (var i=0; i<hoverInv.length; i++)
		{
			hoverInv[i].checked = false;
		}		
		
//CHANGE: If the subject does not want to select any attributes, the program will bring the default alternatives from the database. 
//CHANGE: You should change these ids according to your default attributes: 
		document.getElementById('kr_ID_82').checked = true;
		document.getElementById('kr_ID_97').checked = true;
		document.getElementById('kr_ID_81').checked = true;
		document.getElementById('kr_ID_99').checked = true;	
		document.getElementById('kr_ID_83').checked = true;			
	}
	else
	{
		document.getElementById('divKriterler').style.display="block";		
	}	
}

function formKontrol()
{
	bKriterler = kontrolKriterler();	

	return (bKriterler);
}

function kontrolKriterler()
{
	var secim = document.getElementById('kriter_toggle').checked;

	if(secim)
	{ 
		return true;
	}
	else
	{
		var hoverInv = document.querySelectorAll('[id^="kr_ID_"]');

		var selectedCount = 0;
		for (var i=0; i<hoverInv.length; i++)
		{
			if(hoverInv[i].checked)
			{
				selectedCount++;
			}
		}
		if(selectedCount!=toplamSecilmesiGerekenKriterAdedi)
		{
			alert("Please select "+toplamSecilmesiGerekenKriterAdedi+" attributes! ( You have selected "+selectedCount+" attributes.)");
			return false;
		}
	}
	
	return true;
}

</SCRIPT>
<!--END set vars-->

<?php
	$expname = "ChooseAttriScreen";
	$nextURL = "DecisionScreen.php";
?>

<FORM name="mlwebform" method="POST" onSubmit="return (checkForm(this) && formKontrol());" action="save.php">
<INPUT type=hidden name="procdata" value="">
<INPUT type=hidden name="kriter_secim" value="1">
<!-- set all variables here -->
<input type=hidden name="subject" value="<?=$subject?>">
<input type=hidden name="expname" value="<?=$expname?>">
<input type=hidden name="is" value="<?=$is_sec?>">
<input type=hidden name="nextURL" value="<?=$nextURL?>">
<input type=hidden name="choice" value="">
<input type=hidden name="condnum" value="<?=$condnum?>">
<input type=hidden name="to_email" value="<?=$to_email?>">

<div class="bodyDiv">
<?php $tableWidth=1100; ?>
<div align="center" style="margin-top:5px;width:1088px; padding:5px 5px; border:1px solid #333333; background-color:#0FC; color:#000000; font-weight:bold;">Please select 5 criteria that are important for you when you choose a job</div>
<div id="divKriterler">
<table border="0" cellpadding="5" width="<?=$tableWidth+10?>">
    <?php
        mysqli_query($conn, "SET NAMES 'utf8'");
        $sqlQuery = "SELECT * FROM Tattributes ORDER BY RAND()";
        $result = mysqli_query($conn, $sqlQuery) or die("Error: System error!"); 
        
        # Check whether NULL records found 
        if(!mysqli_num_rows($result)) 
            die("Error: There is no such an alternative/attributes in the database!"); 
    
        $i=0;	

		$resCount = mysqli_num_rows($result);
		$kriterPerColumn = 5;
		$colWidth = ($tableWidth*$kriterPerColumn/$resCount)-18;
		?><tr><td valign="top" width="<?=$colWidth?>"><?php
        while($row=mysqli_fetch_assoc($result)) 
        {
			if(($i%$kriterPerColumn==0) && ($i>0))
			{
				?>
                </td>
                <td valign="top" width="<?=$colWidth?>">
                <?php
			}
			?>
				<div style="margin-top:12px; line-height:20px; font-size:16px; display:block; width:<?=$colWidth?>px;">
                   	<INPUT type="checkbox" name='kr_ID_<?=$row['id']?>' id='kr_ID_<?=$row['id']?>' value='true'> <?=$row['s_kriter']?>
                </div>            
            <?php
			$i++;
        }	
		?></td><?php
        //mysqli_close();
    ?>
</tr></table>
</div>

<div style="border:none; background:#FF9;margin-top:10px;">
    <div style="float:left;line-height:20px; height:20px;"><input onChange="kriterSecimiToggle();" type="checkbox" style="width:20px; height:20px; display:block;" name="kriter_toggle" id="kriter_toggle"></div>
    <div style="float:left; font-size:18px; line-height:28px; height:28px; color:#000000;">Do not want to choose</div>
    <div style="float:none; clear:both;"></div>    
</div>

<div align="left">
<INPUT style="margin-top:3px;" type="submit" value=">> Next >>" class="nextBUT">
</div>

</div>
</FORM>
</body></html>
