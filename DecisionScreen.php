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
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<TITLE>Dynamic MouselabWEB Research</TITLE>
<script language=javascript src="mlweb.js"></SCRIPT>
<link rel="stylesheet" href="mlweb.css" type="text/css">
</head>

<?php
	class attriItem
	{
		public $id;
		public $cAtt;		
		public $cAttAbbre;				
	}
	
	class alterItem
	{
		public $id;
		public $cGrAlt;		
		public $cAlt;	
		public $cAltAbbre;
	}	

	class valuesItem
	{
		public $AltId;
		public $AttId;
		public $value;
	}
	
	$js_txt_line1 = "";
	$js_txt_line26 = array();
	$is_kisaltmalar = array();
	$kr_kisaltmalar = array();
	
	$arrDegerler = array();
	
	$arrKriterler = array();
	$kriterlerIDs = $_GET['kr'];
	$kriterlerIDs = substr($kriterlerIDs, 0, strlen($kriterlerIDs)-1);
	
	$arrIsler = array();
	$islerIDs = $_GET['is'];
	$islerIDs = substr($islerIDs, 0, strlen($islerIDs)-1);
	

	//Get attributes from the database
	mysqli_query($conn, "SET NAMES 'utf8'");
	$sqlQuery = "SELECT * FROM Tattributes WHERE id IN (".$kriterlerIDs.") ORDER BY RAND()";
	$result = mysqli_query($conn, $sqlQuery) or die("Error: System error!"); 
	while($row=mysqli_fetch_assoc($result)) 
    {
		 $tmpattriItem = new attriItem;
		 $tmpattriItem->id = $row["id"];
		 $tmpattriItem->cAtt = $row["cAtt"];
		 $tmpattriItem->cAttAbbre = $row["cAttAbbre"];	
		 array_push($js_txt_line26, $tmpattriItem->cAtt);
		 array_push($kr_kisaltmalar, $tmpattriItem->cAttAbbre);
		 array_push($arrKriterler, $tmpattriItem);
    }
	
	// Get alternatives from the database
	mysqli_query($conn, "SET NAMES 'utf8'");
	$sqlQuery = "SELECT * FROM Talternatives WHERE id IN (".$islerIDs.") ORDER BY RAND()";
	$result = mysqli_query($conn, $sqlQuery) or die("Error: System error!"); 
	while($row=mysqli_fetch_assoc($result)) 
    {
		 $tmpalterItem = new alterItem;
		 $tmpalterItem->id = $row["id"];
		 $tmpalterItem->cGrAlt = $row["cGrAlt"];
		 $tmpalterItem->cAlt = $row["cAlt"];
		 $tmpalterItem->cAltAbbre = $row["cAltAbbre"];		 		 
		 
		 array_push($is_kisaltmalar, $tmpalterItem->cAltAbbre);
		 $js_txt_line1 .= "^".$tmpalterItem->cAlt;
		 array_push($arrIsler, $tmpalterItem);
    }
	
	// Get values from the database
	mysqli_query($conn, "SET NAMES 'utf8'");
	$sqlQuery = "SELECT * FROM Tvalues WHERE AltId IN (".$islerIDs.") AND AttId IN (".$kriterlerIDs.")";
	$result = mysqli_query($conn, $sqlQuery) or die("Error: System error!"); 
	$cnnt = 0;
	$matriceDegerler = "";
	while($row=mysqli_fetch_assoc($result)) 
    {
		 $tmpvaluesItem = new valuesItem;
		 $tmpvaluesItem->id = $row["id"];
		 $tmpvaluesItem->AltId = $row["AltId"];
		 $tmpvaluesItem->AttId = $row["AttId"];
		 $tmpvaluesItem->value = $row["value"];
		 
		 //array_push($is_kisaltmalar, $tmpalterItem->cAltAbbre);
		 //$js_txt_line1 .= "^".$tmpalterItem->cAlt;
		 array_push($arrDegerler, $tmpvaluesItem);
		 $matriceDegerler[$row["AltId"]][$row["AttId"]]=$row["value"];
		 $cnnt++;
    }
	if($cnnt!=20)
	{
		echo "<span style='color:#F00;'>There is a missing value!!! Total number of items that recalled from the database is: ".$cnnt."/20</span><br>";
	}
	//var_dump($arrDegerler); exit;
	//var_dump($matriceDegerler);	
?>

<body onLoad="timefunction('onload','body','body')">
<script language="javascript">
ref_cur_hit = "<?=$condnum?>";
subject = "<?=$subject?>";
</script>

<!--BEGIN TABLE STRUCTURE-->
<SCRIPT language="javascript">
//override defaults
mlweb_outtype="XML";
mlweb_fname="mlwebform";
tag = "a0^<?=$is_kisaltmalar[0]?>^<?=$is_kisaltmalar[1]?>^<?=$is_kisaltmalar[2]?>^<?=$is_kisaltmalar[3]?>`"
 + "b0^[<?=$kr_kisaltmalar[0]?>]-[<?=$is_kisaltmalar[0]?>]^[<?=$kr_kisaltmalar[0]?>]-[<?=$is_kisaltmalar[1]?>]^[<?=$kr_kisaltmalar[0]?>]-[<?=$is_kisaltmalar[2]?>]^[<?=$kr_kisaltmalar[0]?>]-[<?=$is_kisaltmalar[3]?>]`"
 + "c0^[<?=$kr_kisaltmalar[1]?>]-[<?=$is_kisaltmalar[0]?>]^[<?=$kr_kisaltmalar[1]?>]-[<?=$is_kisaltmalar[1]?>]^[<?=$kr_kisaltmalar[1]?>]-[<?=$is_kisaltmalar[2]?>]^[<?=$kr_kisaltmalar[1]?>]-[<?=$is_kisaltmalar[3]?>]`"
 + "d0^[<?=$kr_kisaltmalar[2]?>]-[<?=$is_kisaltmalar[0]?>]^[<?=$kr_kisaltmalar[2]?>]-[<?=$is_kisaltmalar[1]?>]^[<?=$kr_kisaltmalar[2]?>]-[<?=$is_kisaltmalar[2]?>]^[<?=$kr_kisaltmalar[2]?>]-[<?=$is_kisaltmalar[3]?>]`"
 + "e0^[<?=$kr_kisaltmalar[3]?>]-[<?=$is_kisaltmalar[0]?>]^[<?=$kr_kisaltmalar[3]?>]-[<?=$is_kisaltmalar[1]?>]^[<?=$kr_kisaltmalar[3]?>]-[<?=$is_kisaltmalar[2]?>]^[<?=$kr_kisaltmalar[3]?>]-[<?=$is_kisaltmalar[3]?>]`"
 + "f0^[<?=$kr_kisaltmalar[4]?>]-[<?=$is_kisaltmalar[0]?>]^[<?=$kr_kisaltmalar[4]?>]-[<?=$is_kisaltmalar[1]?>]^[<?=$kr_kisaltmalar[4]?>]-[<?=$is_kisaltmalar[2]?>]^[<?=$kr_kisaltmalar[4]?>]-[<?=$is_kisaltmalar[3]?>]";

txt = "<?=$js_txt_line1?>`"
 + "<?=$js_txt_line26[0]?>^<?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[0]->id]?>^<?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[0]->id]?>^<?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[0]->id]?>^<?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[0]->id]?>`"
 + "<?=$js_txt_line26[1]?>^<?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[1]->id]?>^<?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[1]->id]?>^<?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[1]->id]?>^<?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[1]->id]?>`"
 + "<?=$js_txt_line26[2]?>^<?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[2]->id]?>^<?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[2]->id]?>^<?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[2]->id]?>^<?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[2]->id]?>`"
 + "<?=$js_txt_line26[3]?>^<?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[3]->id]?>^<?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[3]->id]?>^<?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[3]->id]?>^<?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[3]->id]?>`"
 + "<?=$js_txt_line26[4]?>^<?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[4]->id]?>^<?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[4]->id]?>^<?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[4]->id]?>^<?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[4]->id]?>";

state = "0^0^0^0^0`"
 + "0^1^1^1^1`"
 + "0^1^1^1^1`"
 + "0^1^1^1^1`"
 + "0^1^1^1^1`"
 + "0^1^1^1^1";

box = "^^^^`"
 + "^^^^`"
 + "^^^^`"
 + "^^^^`"
 + "^^^^`"
 + "^^^^";

CBCol = "0^0^0^0^0";
CBRow = "0^0^0^0^0^0";
W_Col = "165^120^120^120^120";
H_Row = "75^80^80^80^80^80";

chkchoice = false;
btnFlg = 1;
btnType = "button";
btntxt = "Make your decision^<?=$arrIsler[0]->cAlt?>^<?=$arrIsler[1]->cAlt?>^<?=$arrIsler[2]->cAlt?>^<?=$arrIsler[3]->cAlt?>";
btnstate = "0^1^1^1^1";
btntag = "Make your decision^is_<?=$is_kisaltmalar[0]?>^is_<?=$is_kisaltmalar[1]?>^is_<?=$is_kisaltmalar[2]?>^is_<?=$is_kisaltmalar[3]?>";
to_email = "<?=$to_email?>";
colFix = false;
rowFix = false;
CBpreset = true;
evtOpen = 0;
evtClose = 0;
/*
CBord = "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^2^1^4^3^0^3^1^2^4^5`"
+ "0^3^4^2^1^0^4^3^1^5^2`"
+ "0^4^3^1^2^0^2^5^1^4^3`"
+ "0^1^2^4^3^0^5^3^4^2^1`"
+ "0^3^2^1^4^0^2^1^5^3^4`"
+ "0^1^3^2^4^0^2^4^3^1^5";
*/
CBord = "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^1^2^3^4^0^1^2^3^4^5";

chkFrm=true;
warningTxt = "Please make your decision!";
tmTotalSec = 60;
tmStepSec = 1;
tmWidthPx = 200;
tmFill = true;
tmShowTime = true;
tmCurTime = 0;
tmActive = false;
tmDirectStart = true;
tmMinLabel = "min";
tmSecLabel = "sec";
tmLabel = "Timer: ";


delay = "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0`"
 + "0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0^0";
activeClass = "actTD";
inactiveClass = "inactTD";
boxClass = "boxTD";
cssname = "mlweb.css";
nextURL = "survey.php";
expname = "DecisionScreen";
randomOrder = false;
recOpenCells = false;
masterCond = 1;
loadMatrices();
</SCRIPT>
<!--END TABLE STRUCTURE-->

<?php
	$nextURL = "survey.php";
	$expname = "DecisionScreen";
?>
<div class="bodyDiv">
<FORM name="mlwebform" onSubmit="return checkForm(this)" method="POST" action="save.php"><INPUT type=hidden name="procdata" value="">
<input type=hidden name="subject" value="<?=$subject?>">
<input type=hidden name="expname" value="<?=$expname?>">
<input type=hidden name="nextURL" value="<?=$nextURL?>">
<input type=hidden name="choice" value="">
<input type=hidden name="condnum" value="<?php echo $condnum; ?>">
<input type=hidden name="condnuma" value="<?php echo $condnum; ?>">
<input type=hidden name="to_email" value="<?=$to_email?>">
<input type=hidden name="kr" value="<?=$kriterlerIDs?>">
<input type=hidden name="is" value="<?=$islerIDs?>">



<!--BEGIN preHTML-->



<!--END preHTML-->
<!-- MOUSELAB TABLE -->
<TABLE border=0>
<TR>
<!--cell a0(tag:a0)-->
<TD align=center valign=middle><DIV ID="a0_cont" style="position: relative; height: 75px; width: 165px;"><DIV ID="a0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 165px; clip: rect(0px 165px 75px 0px); z-index: 1;"><TABLE><TD ID="a0_td" align=center valign=center width=160 height=70 class="inactTD"></TD></TABLE></DIV><DIV ID="a0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 165px; clip: rect(0px 165px 75px 0px); z-index: 2;"><TABLE><TD ID="a0_tdbox" align=center valign=center width=160 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a0" onMouseOver="ShowCont('a0',event)" onMouseOut="HideCont('a0',event)"><IMG NAME="a0" SRC="transp.gif" border=0 width=165 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a1(tag:<?=$is_kisaltmalar[0]?>)-->
<TD align=center valign=middle><DIV ID="a1_cont" style="position: relative; height: 75px; width: 150px;"><DIV ID="a1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 1;"><TABLE><TD ID="a1_td" align=center valign=center width=145 height=70 class="inactTD"><?=$arrIsler[0]->cAlt?></TD></TABLE></DIV><DIV ID="a1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 2;"><TABLE><TD ID="a1_tdbox" align=center valign=center width=145 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a1" onMouseOver="ShowCont('a1',event)" onMouseOut="HideCont('a1',event)"><IMG NAME="a1" SRC="transp.gif" border=0 width=150 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a2(tag:<?=$is_kisaltmalar[1]?>)-->
<TD align=center valign=middle><DIV ID="a2_cont" style="position: relative; height: 75px; width: 150px;"><DIV ID="a2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 1;"><TABLE><TD ID="a2_td" align=center valign=center width=145 height=70 class="inactTD"><?=$arrIsler[1]->cAlt?></TD></TABLE></DIV><DIV ID="a2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 2;"><TABLE><TD ID="a2_tdbox" align=center valign=center width=145 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a2" onMouseOver="ShowCont('a2',event)" onMouseOut="HideCont('a2',event)"><IMG NAME="a2" SRC="transp.gif" border=0 width=150 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a3(tag:<?=$is_kisaltmalar[2]?>)-->
<TD align=center valign=middle><DIV ID="a3_cont" style="position: relative; height: 75px; width: 150px;"><DIV ID="a3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 1;"><TABLE><TD ID="a3_td" align=center valign=center width=145 height=70 class="inactTD"><?=$arrIsler[2]->cAlt?></TD></TABLE></DIV><DIV ID="a3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 2;"><TABLE><TD ID="a3_tdbox" align=center valign=center width=145 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a3" onMouseOver="ShowCont('a3',event)" onMouseOut="HideCont('a3',event)"><IMG NAME="a3" SRC="transp.gif" border=0 width=150 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a4(tag:<?=$is_kisaltmalar[3]?>)-->
<TD align=center valign=middle><DIV ID="a4_cont" style="position: relative; height: 75px; width: 150px;"><DIV ID="a4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 1;"><TABLE><TD ID="a4_td" align=center valign=center width=145 height=70 class="inactTD"><?=$arrIsler[3]->cAlt?></TD></TABLE></DIV><DIV ID="a4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; clip: rect(0px 150px 75px 0px); z-index: 2;"><TABLE><TD ID="a4_tdbox" align=center valign=center width=145 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 150px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a4" onMouseOver="ShowCont('a4',event)" onMouseOut="HideCont('a4',event)"><IMG NAME="a4" SRC="transp.gif" border=0 width=150 height=75></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell b0(tag:b0)-->
<TD align=center valign=middle><DIV ID="b0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="b0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="b0_td" align=left valign=center width=160 height=55 class="inactTD"><?=$arrKriterler[0]->cAtt?></TD></TABLE></DIV><DIV ID="b0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="b0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b0" onMouseOver="ShowCont('b0',event)" onMouseOut="HideCont('b0',event)"><IMG NAME="b0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b1-->
<TD align=center valign=middle><DIV ID="b1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b1_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[0]->id]?></TD></TABLE></DIV><DIV ID="b1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b1" onMouseOver="ShowCont('b1',event)" onMouseOut="HideCont('b1',event)"><IMG NAME="b1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b2-->
<TD align=center valign=middle><DIV ID="b2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b2_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[0]->id]?></TD></TABLE></DIV><DIV ID="b2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b2" onMouseOver="ShowCont('b2',event)" onMouseOut="HideCont('b2',event)"><IMG NAME="b2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b3-->
<TD align=center valign=middle><DIV ID="b3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b3_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[0]->id]?></TD></TABLE></DIV><DIV ID="b3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b3" onMouseOver="ShowCont('b3',event)" onMouseOut="HideCont('b3',event)"><IMG NAME="b3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b4-->
<TD align=center valign=middle><DIV ID="b4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b4_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[0]->id]?></TD></TABLE></DIV><DIV ID="b4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b4" onMouseOver="ShowCont('b4',event)" onMouseOut="HideCont('b4',event)"><IMG NAME="b4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell c0-->
<TD align=center valign=middle><DIV ID="c0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="c0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="c0_td" align=left valign=center width=160 height=55 class="inactTD"><?=$arrKriterler[1]->cAtt?></TD></TABLE></DIV><DIV ID="c0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="c0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c0" onMouseOver="ShowCont('c0',event)" onMouseOut="HideCont('c0',event)"><IMG NAME="c0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c1-->
<TD align=center valign=middle><DIV ID="c1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c1_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[1]->id]?></TD></TABLE></DIV><DIV ID="c1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c1" onMouseOver="ShowCont('c1',event)" onMouseOut="HideCont('c1',event)"><IMG NAME="c1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c2-->
<TD align=center valign=middle><DIV ID="c2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c2_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[1]->id]?></TD></TABLE></DIV><DIV ID="c2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c2" onMouseOver="ShowCont('c2',event)" onMouseOut="HideCont('c2',event)"><IMG NAME="c2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c3-->
<TD align=center valign=middle><DIV ID="c3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c3_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[1]->id]?></TD></TABLE></DIV><DIV ID="c3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c3" onMouseOver="ShowCont('c3',event)" onMouseOut="HideCont('c3',event)"><IMG NAME="c3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c4-->
<TD align=center valign=middle><DIV ID="c4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c4_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[1]->id]?></TD></TABLE></DIV><DIV ID="c4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c4" onMouseOver="ShowCont('c4',event)" onMouseOut="HideCont('c4',event)"><IMG NAME="c4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell d0-->
<TD align=center valign=middle><DIV ID="d0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="d0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="d0_td" align=left valign=center width=160 height=55 class="inactTD"><?=$arrKriterler[2]->cAtt?></TD></TABLE></DIV><DIV ID="d0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="d0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d0" onMouseOver="ShowCont('d0',event)" onMouseOut="HideCont('d0',event)"><IMG NAME="d0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d1-->
<TD align=center valign=middle><DIV ID="d1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d1_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[2]->id]?></TD></TABLE></DIV><DIV ID="d1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d1" onMouseOver="ShowCont('d1',event)" onMouseOut="HideCont('d1',event)"><IMG NAME="d1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d2-->
<TD align=center valign=middle><DIV ID="d2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d2_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[2]->id]?></TD></TABLE></DIV><DIV ID="d2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d2" onMouseOver="ShowCont('d2',event)" onMouseOut="HideCont('d2',event)"><IMG NAME="d2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d3-->
<TD align=center valign=middle><DIV ID="d3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d3_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[2]->id]?></TD></TABLE></DIV><DIV ID="d3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d3" onMouseOver="ShowCont('d3',event)" onMouseOut="HideCont('d3',event)"><IMG NAME="d3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d4-->
<TD align=center valign=middle><DIV ID="d4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d4_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[2]->id]?></TD></TABLE></DIV><DIV ID="d4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d4" onMouseOver="ShowCont('d4',event)" onMouseOut="HideCont('d4',event)"><IMG NAME="d4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell e0-->
<TD align=center valign=middle><DIV ID="e0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="e0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="e0_td" align=left valign=center width=160 height=55 class="inactTD"><?=$arrKriterler[3]->cAtt?></TD></TABLE></DIV><DIV ID="e0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="e0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e0" onMouseOver="ShowCont('e0',event)" onMouseOut="HideCont('e0',event)"><IMG NAME="e0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e1-->
<TD align=center valign=middle><DIV ID="e1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e1_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[3]->id]?></TD></TABLE></DIV><DIV ID="e1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e1" onMouseOver="ShowCont('e1',event)" onMouseOut="HideCont('e1',event)"><IMG NAME="e1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e2-->
<TD align=center valign=middle><DIV ID="e2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e2_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[3]->id]?></TD></TABLE></DIV><DIV ID="e2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e2" onMouseOver="ShowCont('e2',event)" onMouseOut="HideCont('e2',event)"><IMG NAME="e2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e3-->
<TD align=center valign=middle><DIV ID="e3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e3_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[3]->id]?></TD></TABLE></DIV><DIV ID="e3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e3" onMouseOver="ShowCont('e3',event)" onMouseOut="HideCont('e3',event)"><IMG NAME="e3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e4-->
<TD align=center valign=middle><DIV ID="e4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e4_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[3]->id]?></TD></TABLE></DIV><DIV ID="e4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e4" onMouseOver="ShowCont('e4',event)" onMouseOut="HideCont('e4',event)"><IMG NAME="e4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell f0-->
<TD align=center valign=middle><DIV ID="f0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="f0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="f0_td" align=left valign=center width=160 height=55 class="inactTD"><?=$arrKriterler[4]->cAtt?></TD></TABLE></DIV><DIV ID="f0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="f0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f0" onMouseOver="ShowCont('f0',event)" onMouseOut="HideCont('f0',event)"><IMG NAME="f0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f1-->
<TD align=center valign=middle><DIV ID="f1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f1_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[0]->id][$arrKriterler[4]->id]?></TD></TABLE></DIV><DIV ID="f1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f1" onMouseOver="ShowCont('f1',event)" onMouseOut="HideCont('f1',event)"><IMG NAME="f1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f2-->
<TD align=center valign=middle><DIV ID="f2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f2_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[1]->id][$arrKriterler[4]->id]?></TD></TABLE></DIV><DIV ID="f2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f2" onMouseOver="ShowCont('f2',event)" onMouseOut="HideCont('f2',event)"><IMG NAME="f2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f3-->
<TD align=center valign=middle><DIV ID="f3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f3_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[2]->id][$arrKriterler[4]->id]?></TD></TABLE></DIV><DIV ID="f3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f3" onMouseOver="ShowCont('f3',event)" onMouseOut="HideCont('f3',event)"><IMG NAME="f3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f4-->
<TD align=center valign=middle><DIV ID="f4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f4_td" align=center valign=center width=95 height=55 class="actTD"><?=$matriceDegerler[$arrIsler[3]->id][$arrKriterler[4]->id]?></TD></TABLE></DIV><DIV ID="f4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f4" onMouseOver="ShowCont('f4',event)" onMouseOut="HideCont('f4',event)"><IMG NAME="f4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR><TD ID="btn_0" style="border-left-style: none; border-right-style: none; border-bottom-style: none;"> </TD><TD ID="btn_1" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT type="button" name="is_<?=$is_kisaltmalar[0]?>" value="<?=$arrIsler[0]->cAlt?>" onMouseOver="timefunction('mouseover','is_<?=$is_kisaltmalar[0]?>','<?=$arrIsler[0]->cAlt?>')" onClick="recChoice('onclick','is_<?=$is_kisaltmalar[0]?>','<?=$arrIsler[0]->cAlt?>')" onMouseOut="timefunction('mouseout','is_<?=$is_kisaltmalar[0]?>','<?=$arrIsler[0]->cAlt?>')"></TD>
<TD ID="btn_2" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT style="display:block; width:100px;" type="button" name="is_<?=$is_kisaltmalar[1]?>" value="<?=$arrIsler[1]->cAlt?>" onMouseOver="timefunction('mouseover','is_<?=$is_kisaltmalar[1]?>','<?=$arrIsler[1]->cAlt?>')" onClick="recChoice('onclick','is_<?=$is_kisaltmalar[1]?>','<?=$arrIsler[1]->cAlt?>')" onMouseOut="timefunction('mouseout','is_<?=$is_kisaltmalar[1]?>','<?=$arrIsler[1]->cAlt?>')"></TD>
<TD ID="btn_3" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT style="display:block; width:120px;" type="button" name="is_<?=$is_kisaltmalar[2]?>" value="<?=$arrIsler[2]->cAlt?>" onMouseOver="timefunction('mouseover','is_<?=$is_kisaltmalar[2]?>','<?=$arrIsler[2]->cAlt?>')" onClick="recChoice('onclick','is_<?=$is_kisaltmalar[2]?>','<?=$arrIsler[2]->cAlt?>')" onMouseOut="timefunction('mouseout','is_<?=$is_kisaltmalar[2]?>','<?=$arrIsler[2]->cAlt?>')"></TD>
<TD ID="btn_4" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT style="display:block; width:140px;" type="button" name="is_<?=$is_kisaltmalar[3]?>" value="<?=$arrIsler[3]->cAlt?>" onMouseOver="timefunction('mouseover','is_<?=$is_kisaltmalar[3]?>','<?=$arrIsler[3]->cAlt?>')" onClick="recChoice('onclick','is_<?=$is_kisaltmalar[3]?>','<?=$arrIsler[3]->cAlt?>')" onMouseOut="timefunction('mouseout','is_<?=$is_kisaltmalar[3]?>','<?=$arrIsler[3]->cAlt?>')"></TD>
</TR></TABLE>
<!-- END MOUSELAB TABLE -->
<!--BEGIN postHTML-->
<P>
Please press the "Submit" button after you choose a job.
</P>
<P></P>

<div align="left">
<INPUT style="margin-top:3px;" type="submit" value=">> Submit >>" class="nextBUT" onClick=timefunction('submit','submit','submit')>
</div>

</FORM>
</div>
</body></html>
