<?php 
if (isset($_GET['subject'])) {$subject=$_GET['subject'];}
 else {$subject="anonymous";}
if (isset($_GET['condnum'])) {$condnum=$_GET['condnum'];}
	else {$condnum=-1;}?><HTML>
<HEAD>
<TITLE>MSGSU Yüksek Lisans Tez Çalışması</TITLE>
<script language=javascript src="mlweb.js"></SCRIPT>
<link rel="stylesheet" href="mlweb.css" type="text/css">
</head>

<body onLoad="timefunction('onload','body','body')">
<script language="javascript">
ref_cur_hit = <?php echo($condnum);?>;
subject = "<?php echo($subject);?>";
</script>

<!--BEGIN TABLE STRUCTURE-->
<SCRIPT language="javascript">
//override defaults
mlweb_outtype="XML";
mlweb_fname="mlwebform";
tag = "a0^Yaz_G^Akt_U^Sube_B^Malz_P`"
 + "b0^IO_A^IO_B^IO_C^IO_D`"
 + "c0^IZ_A^IZ_B^IZ_C^IZ_D`"
 + "d0^Maas_A^Maas_B^Maas_C^Maas_D`"
 + "e0^IBKolay_A^IBKolay_B^IBKolay_C^IBKolay_D`"
 + "f0^Kariyer_A^Kariyer_B^Kariyer_C^Kariyer_D";

txt = "^Yazılım Geliştirme Uzman Yardımcısı^Aktüerya Uzmanı Yardımcısı^Şube Bütçe Planlama ve Kontrol Uzmanı^Malzeme Planlama Uzman Yardımcısı`"
 + "İş-özel hayat dengesi^En düşük^Düşük^Ortalama^Yüksek`"
 + "İşin zorluk derecesi^Yüksek^En yüksek^Düşük^Ortalama`"
 + "Maaş^En yüksek^Yüksek^Ortalama^Düşük`"
 + "İş bulma kolaylığı^Kötü^Ortalama^En iyi^İyi`"
 + "Kariyerde ilerleme fırsatı^Ortalama^Zayıf^En zayıf^İyi";

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
W_Col = "165^100^100^100^100";
H_Row = "75^60^60^60^60^60";

chkchoice = false;
btnFlg = 1;
btnType = "button";
btntxt = "Seçiminizi yapınız^Yazılım G.U.Y.^Aktüerya U.Y.^Şube B.P.K.U.^Malzeme P.U.Y.";
btnstate = "0^1^1^1^1";
btntag = "Seçiminizi yapınız^is_Yaz_G^is_Akt_U^is_Sube_B^is_Malz_P";
to_email = "zlhyldrm@gmail.com";
colFix = false;
rowFix = false;
CBpreset = true;
evtOpen = 0;
evtClose = 0;
CBord = "0^1^2^3^4^0^1^2^3^4^5`"
+ "0^2^1^4^3^0^3^1^2^4^5`"
+ "0^3^4^2^1^0^4^3^1^5^2`"
+ "0^4^3^1^2^0^2^5^1^4^3`"
+ "0^1^2^4^3^0^5^3^4^2^1`"
+ "0^3^2^1^4^0^2^1^5^3^4`"
+ "0^1^3^2^4^0^2^4^3^1^5";

chkFrm=true;
warningTxt = "Seçiminizi yapmadınız.";
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

//Delay: IO_A IO_B IO_C IO_D IZ_A IZ_B IZ_C IZ_D Maas_A Maas_B Maas_C Maas_D IBKolay_A IBKolay_B IBKolay_C IBKolay_D Kariyer_A Kariyer_B Kariyer_C Kariyer_D
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
nextURL = "thanks.html";
expname = "default_table";
randomOrder = true;
recOpenCells = false;
masterCond = 1;
loadMatrices();
</SCRIPT>
<!--END TABLE STRUCTURE-->

<FORM name="mlwebform" onSubmit="return checkForm(this)" method="POST" action="save.php"><INPUT type=hidden name="procdata" value="">
<input type=hidden name="subject" value="">
<input type=hidden name="expname" value="">
<input type=hidden name="nextURL" value="">
<input type=hidden name="choice" value="">
<input type=hidden name="condnum" value="">
<input type=hidden name="to_email" value="">
<!--BEGIN preHTML-->



<!--END preHTML-->
<!-- MOUSELAB TABLE -->
<TABLE border=0>
<TR>
<!--cell a0(tag:a0)-->
<TD align=center valign=middle><DIV ID="a0_cont" style="position: relative; height: 75px; width: 165px;"><DIV ID="a0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 165px; clip: rect(0px 165px 75px 0px); z-index: 1;"><TABLE><TD ID="a0_td" align=center valign=center width=160 height=70 class="inactTD"></TD></TABLE></DIV><DIV ID="a0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 165px; clip: rect(0px 165px 75px 0px); z-index: 2;"><TABLE><TD ID="a0_tdbox" align=center valign=center width=160 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a0" onMouseOver="ShowCont('a0',event)" onMouseOut="HideCont('a0',event)"><IMG NAME="a0" SRC="transp.gif" border=0 width=165 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a1(tag:Yaz_G)-->
<TD align=center valign=middle><DIV ID="a1_cont" style="position: relative; height: 75px; width: 100px;"><DIV ID="a1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 1;"><TABLE><TD ID="a1_td" align=center valign=center width=95 height=70 class="inactTD">Yazılım Geliştirme Uzman Yardımcısı</TD></TABLE></DIV><DIV ID="a1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 2;"><TABLE><TD ID="a1_tdbox" align=center valign=center width=95 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a1" onMouseOver="ShowCont('a1',event)" onMouseOut="HideCont('a1',event)"><IMG NAME="a1" SRC="transp.gif" border=0 width=100 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a2(tag:Akt_U)-->
<TD align=center valign=middle><DIV ID="a2_cont" style="position: relative; height: 75px; width: 100px;"><DIV ID="a2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 1;"><TABLE><TD ID="a2_td" align=center valign=center width=95 height=70 class="inactTD">Aktüerya Uzmanı Yardımcısı</TD></TABLE></DIV><DIV ID="a2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 2;"><TABLE><TD ID="a2_tdbox" align=center valign=center width=95 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a2" onMouseOver="ShowCont('a2',event)" onMouseOut="HideCont('a2',event)"><IMG NAME="a2" SRC="transp.gif" border=0 width=100 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a3(tag:Sube_B)-->
<TD align=center valign=middle><DIV ID="a3_cont" style="position: relative; height: 75px; width: 100px;"><DIV ID="a3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 1;"><TABLE><TD ID="a3_td" align=center valign=center width=95 height=70 class="inactTD">Şube Bütçe Planlama ve Kontrol Uzmanı</TD></TABLE></DIV><DIV ID="a3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 2;"><TABLE><TD ID="a3_tdbox" align=center valign=center width=95 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a3" onMouseOver="ShowCont('a3',event)" onMouseOut="HideCont('a3',event)"><IMG NAME="a3" SRC="transp.gif" border=0 width=100 height=75></A></DIV></DIV></TD>
<!--end cell-->
<!--cell a4(tag:Malz_P)-->
<TD align=center valign=middle><DIV ID="a4_cont" style="position: relative; height: 75px; width: 100px;"><DIV ID="a4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 1;"><TABLE><TD ID="a4_td" align=center valign=center width=95 height=70 class="inactTD">Malzeme Planlama Uzman Yardımcısı</TD></TABLE></DIV><DIV ID="a4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; clip: rect(0px 100px 75px 0px); z-index: 2;"><TABLE><TD ID="a4_tdbox" align=center valign=center width=95 height=70 class="boxTD"></TD></TABLE></DIV><DIV ID="a4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 75px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="a4" onMouseOver="ShowCont('a4',event)" onMouseOut="HideCont('a4',event)"><IMG NAME="a4" SRC="transp.gif" border=0 width=100 height=75></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell b0(tag:b0)-->
<TD align=center valign=middle><DIV ID="b0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="b0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="b0_td" align=left valign=center width=160 height=55 class="inactTD">İş-özel hayat dengesi</TD></TABLE></DIV><DIV ID="b0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="b0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b0" onMouseOver="ShowCont('b0',event)" onMouseOut="HideCont('b0',event)"><IMG NAME="b0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b1(tag:IO_A)-->
<TD align=center valign=middle><DIV ID="b1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b1_td" align=center valign=center width=95 height=55 class="actTD">En düşük</TD></TABLE></DIV><DIV ID="b1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b1" onMouseOver="ShowCont('b1',event)" onMouseOut="HideCont('b1',event)"><IMG NAME="b1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b2(tag:IO_B)-->
<TD align=center valign=middle><DIV ID="b2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b2_td" align=center valign=center width=95 height=55 class="actTD">Düşük</TD></TABLE></DIV><DIV ID="b2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b2" onMouseOver="ShowCont('b2',event)" onMouseOut="HideCont('b2',event)"><IMG NAME="b2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b3(tag:IO_C)-->
<TD align=center valign=middle><DIV ID="b3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b3_td" align=center valign=center width=95 height=55 class="actTD">Ortalama</TD></TABLE></DIV><DIV ID="b3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b3" onMouseOver="ShowCont('b3',event)" onMouseOut="HideCont('b3',event)"><IMG NAME="b3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell b4(tag:IO_D)-->
<TD align=center valign=middle><DIV ID="b4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="b4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="b4_td" align=center valign=center width=95 height=55 class="actTD">Yüksek</TD></TABLE></DIV><DIV ID="b4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="b4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="b4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="b4" onMouseOver="ShowCont('b4',event)" onMouseOut="HideCont('b4',event)"><IMG NAME="b4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell c0(tag:c0)-->
<TD align=center valign=middle><DIV ID="c0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="c0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="c0_td" align=left valign=center width=160 height=55 class="inactTD">İşin zorluk derecesi</TD></TABLE></DIV><DIV ID="c0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="c0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c0" onMouseOver="ShowCont('c0',event)" onMouseOut="HideCont('c0',event)"><IMG NAME="c0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c1(tag:IZ_A)-->
<TD align=center valign=middle><DIV ID="c1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c1_td" align=center valign=center width=95 height=55 class="actTD">Yüksek</TD></TABLE></DIV><DIV ID="c1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c1" onMouseOver="ShowCont('c1',event)" onMouseOut="HideCont('c1',event)"><IMG NAME="c1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c2(tag:IZ_B)-->
<TD align=center valign=middle><DIV ID="c2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c2_td" align=center valign=center width=95 height=55 class="actTD">En yüksek</TD></TABLE></DIV><DIV ID="c2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c2" onMouseOver="ShowCont('c2',event)" onMouseOut="HideCont('c2',event)"><IMG NAME="c2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c3(tag:IZ_C)-->
<TD align=center valign=middle><DIV ID="c3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c3_td" align=center valign=center width=95 height=55 class="actTD">Düşük</TD></TABLE></DIV><DIV ID="c3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c3" onMouseOver="ShowCont('c3',event)" onMouseOut="HideCont('c3',event)"><IMG NAME="c3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell c4(tag:IZ_D)-->
<TD align=center valign=middle><DIV ID="c4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="c4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="c4_td" align=center valign=center width=95 height=55 class="actTD">Ortalama</TD></TABLE></DIV><DIV ID="c4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="c4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="c4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="c4" onMouseOver="ShowCont('c4',event)" onMouseOut="HideCont('c4',event)"><IMG NAME="c4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell d0(tag:d0)-->
<TD align=center valign=middle><DIV ID="d0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="d0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="d0_td" align=left valign=center width=160 height=55 class="inactTD">Maaş</TD></TABLE></DIV><DIV ID="d0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="d0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d0" onMouseOver="ShowCont('d0',event)" onMouseOut="HideCont('d0',event)"><IMG NAME="d0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d1(tag:Maas_A)-->
<TD align=center valign=middle><DIV ID="d1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d1_td" align=center valign=center width=95 height=55 class="actTD">En yüksek</TD></TABLE></DIV><DIV ID="d1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d1" onMouseOver="ShowCont('d1',event)" onMouseOut="HideCont('d1',event)"><IMG NAME="d1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d2(tag:Maas_B)-->
<TD align=center valign=middle><DIV ID="d2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d2_td" align=center valign=center width=95 height=55 class="actTD">Yüksek</TD></TABLE></DIV><DIV ID="d2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d2" onMouseOver="ShowCont('d2',event)" onMouseOut="HideCont('d2',event)"><IMG NAME="d2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d3(tag:Maas_C)-->
<TD align=center valign=middle><DIV ID="d3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d3_td" align=center valign=center width=95 height=55 class="actTD">Ortalama</TD></TABLE></DIV><DIV ID="d3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d3" onMouseOver="ShowCont('d3',event)" onMouseOut="HideCont('d3',event)"><IMG NAME="d3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell d4(tag:Maas_D)-->
<TD align=center valign=middle><DIV ID="d4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="d4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="d4_td" align=center valign=center width=95 height=55 class="actTD">Düşük</TD></TABLE></DIV><DIV ID="d4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="d4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="d4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="d4" onMouseOver="ShowCont('d4',event)" onMouseOut="HideCont('d4',event)"><IMG NAME="d4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell e0(tag:e0)-->
<TD align=center valign=middle><DIV ID="e0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="e0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="e0_td" align=left valign=center width=160 height=55 class="inactTD">İş bulma kolaylığı</TD></TABLE></DIV><DIV ID="e0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="e0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e0" onMouseOver="ShowCont('e0',event)" onMouseOut="HideCont('e0',event)"><IMG NAME="e0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e1(tag:IBKolay_A)-->
<TD align=center valign=middle><DIV ID="e1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e1_td" align=center valign=center width=95 height=55 class="actTD">Kötü</TD></TABLE></DIV><DIV ID="e1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e1" onMouseOver="ShowCont('e1',event)" onMouseOut="HideCont('e1',event)"><IMG NAME="e1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e2(tag:IBKolay_B)-->
<TD align=center valign=middle><DIV ID="e2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e2_td" align=center valign=center width=95 height=55 class="actTD">Ortalama</TD></TABLE></DIV><DIV ID="e2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e2" onMouseOver="ShowCont('e2',event)" onMouseOut="HideCont('e2',event)"><IMG NAME="e2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e3(tag:IBKolay_C)-->
<TD align=center valign=middle><DIV ID="e3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e3_td" align=center valign=center width=95 height=55 class="actTD">En iyi</TD></TABLE></DIV><DIV ID="e3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e3" onMouseOver="ShowCont('e3',event)" onMouseOut="HideCont('e3',event)"><IMG NAME="e3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell e4(tag:IBKolay_D)-->
<TD align=center valign=middle><DIV ID="e4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="e4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="e4_td" align=center valign=center width=95 height=55 class="actTD">İyi</TD></TABLE></DIV><DIV ID="e4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="e4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="e4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="e4" onMouseOver="ShowCont('e4',event)" onMouseOut="HideCont('e4',event)"><IMG NAME="e4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR>
<!--cell f0(tag:f0)-->
<TD align=center valign=middle><DIV ID="f0_cont" style="position: relative; height: 60px; width: 165px;"><DIV ID="f0_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 1;"><TABLE><TD ID="f0_td" align=left valign=center width=160 height=55 class="inactTD">Kariyerde ilerleme fırsatı</TD></TABLE></DIV><DIV ID="f0_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; clip: rect(0px 165px 60px 0px); z-index: 2;"><TABLE><TD ID="f0_tdbox" align=center valign=center width=160 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f0_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 165px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f0" onMouseOver="ShowCont('f0',event)" onMouseOut="HideCont('f0',event)"><IMG NAME="f0" SRC="transp.gif" border=0 width=165 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f1(tag:Kariyer_A)-->
<TD align=center valign=middle><DIV ID="f1_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f1_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f1_td" align=center valign=center width=95 height=55 class="actTD">Ortalama</TD></TABLE></DIV><DIV ID="f1_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f1_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f1_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f1" onMouseOver="ShowCont('f1',event)" onMouseOut="HideCont('f1',event)"><IMG NAME="f1" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f2(tag:Kariyer_B)-->
<TD align=center valign=middle><DIV ID="f2_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f2_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f2_td" align=center valign=center width=95 height=55 class="actTD">Zayıf</TD></TABLE></DIV><DIV ID="f2_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f2_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f2_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f2" onMouseOver="ShowCont('f2',event)" onMouseOut="HideCont('f2',event)"><IMG NAME="f2" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f3(tag:Kariyer_C)-->
<TD align=center valign=middle><DIV ID="f3_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f3_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f3_td" align=center valign=center width=95 height=55 class="actTD">En zayıf</TD></TABLE></DIV><DIV ID="f3_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f3_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f3_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f3" onMouseOver="ShowCont('f3',event)" onMouseOut="HideCont('f3',event)"><IMG NAME="f3" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell-->
<!--cell f4(tag:Kariyer_D)-->
<TD align=center valign=middle><DIV ID="f4_cont" style="position: relative; height: 60px; width: 100px;"><DIV ID="f4_txt" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 1;"><TABLE><TD ID="f4_td" align=center valign=center width=95 height=55 class="actTD">İyi</TD></TABLE></DIV><DIV ID="f4_box" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; clip: rect(0px 100px 60px 0px); z-index: 2;"><TABLE><TD ID="f4_tdbox" align=center valign=center width=95 height=55 class="boxTD"></TD></TABLE></DIV><DIV ID="f4_img" STYLE="position: absolute; left: 0px; top: 0px; height: 60px; width: 100px; z-index: 5;"><A HREF="javascript:void(0);" NAME="f4" onMouseOver="ShowCont('f4',event)" onMouseOut="HideCont('f4',event)"><IMG NAME="f4" SRC="transp.gif" border=0 width=100 height=60></A></DIV></DIV></TD>
<!--end cell--></TR><TR><TD ID="btn_0" style="border-left-style: none; border-right-style: none; border-bottom-style: none;"> </TD><TD ID="btn_1" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT type="button" name="is_Yaz_G" value="Yazılım Geliştirme" onMouseOver="timefunction('mouseover','is_Yaz_G','Yazılım Geliştirme')" onClick="recChoice('onclick','is_Yaz_G','Yazılım Geliştirme')" onMouseOut="timefunction('mouseout','is_Yaz_G','Yazılım Geliştirme')"></TD>
<TD ID="btn_2" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT type="button" name="is_Akt_U" value="Aktüerya" onMouseOver="timefunction('mouseover','is_Akt_U','Aktüerya')" onClick="recChoice('onclick','is_Akt_U','Aktüerya')" onMouseOut="timefunction('mouseout','is_Akt_U','Aktüerya')"></TD>
<TD ID="btn_3" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT type="button" name="is_Sube_B" value="Şube Bütçe Planlama" onMouseOver="timefunction('mouseover','is_Sube_B','Şube Bütçe Planlama')" onClick="recChoice('onclick','is_Sube_B','Şube Bütçe Planlama')" onMouseOut="timefunction('mouseout','is_Sube_B','Şube Bütçe Planlama')"></TD>
<TD ID="btn_4" style="border-left-style: none; border-right-style: none; border-bottom-style: none;" align=center valign=middle><INPUT type="button" name="is_Malz_P" value="Malzeme Planlama" onMouseOver="timefunction('mouseover','is_Malz_P','Malzeme Planlama')" onClick="recChoice('onclick','is_Malz_P','Malzeme Planlama')" onMouseOut="timefunction('mouseout','is_Malz_P','Malzeme Planlama')"></TD>
</TR></TABLE>
<!-- END MOUSELAB TABLE -->
<!--BEGIN postHTML-->
<P>
Seçiminizi yaptıktan sonra aşağıdaki "ONAYLA" butonuna basınız.
</P>
<P></P>




<!--END postHTML--><INPUT type="submit" value="ONAYLA" onClick=timefunction('submit','submit','submit')></FORM></body></html>

