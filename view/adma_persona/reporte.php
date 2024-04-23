<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_controller.php");
    $obj= new adma_persona_controller();
    $date = $obj->show($_GET['id']);
    $ruta="/proyecto/view/adma_persona/";
    ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0016)http://localhost -->
<html>
<head>
	<title>Mail Merge</title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"/>
	<style type="text/css">
		.cs4E98F8E2 {background-image:url(data:image/png;base64,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);background-repeat:no-repeat;}
		.cs2D7A67CC {background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwwAADsMBx2+oZAAAAeVJREFUSEutVStQAzEUPIlE1iUSWYlEIpHISiSyLlwNEomsrEQiKysrK5EnbwZaKsvb183Nu6TXXpnuTIbOJu+32RzFKWyD8+vgRr8T/7Yp/RxrPfHvm+CevoO74bH/QRKP16XfStJd55r4111wVwzpB+269AuTaIZiP8HdcT0LNzXFV7I/ZPhxoBsJWDKwEiluuZUBEplGqjq4a251Y1O6FwRI4FevAIGcx92gyJTUYbCj/dim8/1UWlgvGbrb4pRU4yAh6RzUttVJIpldleg+4LFmcriNVA45MNVgsSCpgvaMCUfSxKP8jgVnPAbH3ZObk8oRA60jIidFH0gh2VC50tekCkiWchlwsThkH1DkbFH5PVBOdCfVFLBcBtn8wCHcBSlMMAMna47LRCJ9yeR4rMCE5JakcphL/iTVcki6rGNi0aOXTMdUmsDYFJIJF70OGRa4VG6rZLEJNET6MIxrukdNIGfVfZCYVDfsFLAk6U5ER2GC3l9XvAMEoRDGJ52h9QjldZPuB+jMzjrHjq9X1grFSPeD/S7JFCPSDWCCuG8NcRaibVN99S3wAZ4tTQpIpImMDJGTv4uzpUnR6lbt2Ohen/R8X8CKUqT9ms3H7yJAwphcCo5JXxZILAWO/1tsoSj+AA9PA+f6xERPAAAAAElFTkSuQmCC);background-repeat:no-repeat;}
		.cs4F685D3D {background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwwAADsMBx2+oZAAAALBJREFUSEtjGAVkga+NCvOB+D+JeD9UO2EAVAy1QL6BOKzwniwLoFyC4Eujwn2yLPhSLy8B0ogPA9UYkG3B93p5BRCND3+ul3egggXyDVApOAC6PGHUglELcANMCxTmgwxCxl+bFNpBctSyACemyIL/9fIcyK7Ght/XywuQbQGUCwffmhT6geLLoVw4GLwWYAsSbBio9jlZFpCIibfgU728BjaX4sPAfGEA1T6sAAMDAI7W4jvNMahTAAAAAElFTkSuQmCC);background-repeat:no-repeat;}
		.cs9F3549A9 {background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABGdBTUEAALGPC/xhBQAAAAlwSFlzAAAOwwAADsMBx2+oZAAAAMdJREFUSEtjGAUjCLyvlxf42ijfQA38vV5eAWosAoAEvzYq/KcG/lwv7wA1FgEQFsg3QIVIBl/q5RMIWvClUeE7UGEFVJhoANTjAdT/nAgfQBQBLToO1CQBlcYJIHGnMB9ZL8EgQnLNe5C3oUowALo6EAaZQVQcoLlsO1Az3De45EiyAAaAmtBdidN3ZFkAAmguxvARDJBtAQyAXI/uamRAsQWEwOCwAJj+7wPp/WTi60CM3QKg7RJoisnGQLMMoMaOguEPGBgAmrmRLW+RRc4AAAAASUVORK5CYII=);background-repeat:no-repeat;}
		.cs4287138C {background-image:url(data:image/png;base64,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);background-repeat:no-repeat;}
		.cs3683BDA8 {background-image:url(data:image/png;base64,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);background-repeat:no-repeat;}
		.csA15A91F9 {color:#000000;background-color:#F4F4F4;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:'Times New Roman'; font-size:13px; font-weight:normal; font-style:normal; }
		.csA8DCAC4A {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:'Times New Roman'; font-size:13px; font-weight:normal; font-style:normal; }
		.cs5669B984 {color:#000000;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:'Times New Roman'; font-size:13px; font-weight:normal; font-style:normal; padding-left:2px;}
		.csCC709693 {color:#2E3449;background-color:transparent;border-left-style: none;border-top:#000000 2px solid;border-right-style: none;border-bottom-style: none;font-family:Arial; font-size:15px; font-weight:bold; font-style:normal; padding-left:2px;padding-bottom:8px;}
		.cs509763C5 {color:#2E3449;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Arial; font-size:15px; font-weight:normal; font-style:normal; padding-top:16px;padding-left:5px;}
		.csAE4DACF {color:#2E3449;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Arial; font-size:15px; font-weight:normal; font-style:normal; padding-top:18px;padding-left:5px;}
		.csA6DB3936 {color:#2E3449;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:Tahoma; font-size:13px; font-weight:normal; font-style:normal; }
		.cs5BD1DEB3 {color:#2E3449;background-color:transparent;border-left-style: none;border-top-style: none;border-right-style: none;border-bottom-style: none;font-family:'Times New Roman'; font-size:13px; font-weight:normal; font-style:normal; padding-left:2px;}
		.cs82C8A4CF {color:#2E3449;background-color:transparent;font-family:Arial;font-size:14px;font-weight:bold;font-style:normal;}
		.csDAA03865 {color:#2E3449;background-color:transparent;font-family:Arial;font-size:14px;font-weight:normal;font-style:normal;}
		.cs714EB164 {color:#2E3449;background-color:transparent;font-family:Arial;font-size:15px;font-weight:normal;font-style:normal;}
		.csFB02205 {color:#2E3449;background-color:transparent;font-family:'Times New Roman';font-size:16px;font-weight:normal;font-style:normal;}
		.csAC6A4475 {height:0px;width:0px;overflow:hidden;font-size:0px;line-height:0px;}
		.cs7B4E399A {text-align:left;text-indent:0pt;margin:0pt 0pt 0pt 0pt;line-height:1.145833}
		.csDFA850B2 {text-align:left;text-indent:0pt;margin:0pt 0pt 0pt 0pt;line-height:1.2}
		.cs5B143645 {text-align:left;text-indent:0pt;margin:0pt 0pt 0pt 0pt;line-height:2}
		.cs29781CB7 {text-align:left;text-indent:0pt;margin:0pt 0pt 1pt 0pt;line-height:1.2}
	</style>
</head>
<body leftMargin=10 topMargin=10 rightMargin=10 bottomMargin=10 style="background-color:#FFFFFF">
<table cellpadding="0" cellspacing="0" border="0" style="border-width:0px;empty-cells:show;width:816px;height:5673px;position:relative;background-color:#FFFFFF;">
	<tr>
		<td style="width:0px;height:0px;"></td>
		<td style="height:0px;width:76px;"></td>
		<td style="height:0px;width:1px;"></td>
		<td style="height:0px;width:23px;"></td>
		<td style="height:0px;width:1px;"></td>
		<td style="height:0px;width:194px;"></td>
		<td style="height:0px;width:2px;"></td>
		<td style="height:0px;width:7px;"></td>
		<td style="height:0px;width:5px;"></td>
		<td style="height:0px;width:12px;"></td>
		<td style="height:0px;width:5px;"></td>
		<td style="height:0px;width:186px;"></td>
		<td style="height:0px;width:19px;"></td>
		<td style="height:0px;width:205px;"></td>
		<td style="height:0px;width:80px;"></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:54px;"></td>
		<td class="csA15A91F9" colspan="7" style="width:304px;height:54px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA15A91F9" colspan="4" style="width:208px;height:54px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA15A91F9" colspan="3" style="width:304px;height:54px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:192px;"></td>
		<td class="csA15A91F9" colspan="7" style="width:304px;height:192px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA15A91F9" colspan="4" style="width:208px;height:192px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:208px;height:192px;">
			<div class="cs3683BDA8" style="width:208px;height:192px;">
			</div>
		</div>
		</td>
		<td class="csA15A91F9" colspan="3" style="width:304px;height:192px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:54px;"></td>
		<td class="csA15A91F9" colspan="7" style="width:304px;height:54px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA15A91F9" colspan="4" style="width:208px;height:54px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA15A91F9" colspan="3" style="width:304px;height:54px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:76px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Nancy Davolio</span></p><p class="cs29781CB7"><span class="csDAA03865">507 - 20th Ave. E.<br/>Apt. 2A</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Nancy!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:82px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:82px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:82px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:82px;">
			<div class="cs4E98F8E2" style="width:427px;height:82px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Andrew Fuller</span></p><p class="cs29781CB7"><span class="csDAA03865">908 W. Capital Way</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Andrew!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:82px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:82px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:82px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:82px;">
			<div class="cs4E98F8E2" style="width:427px;height:82px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Janet Leverling</span></p><p class="cs29781CB7"><span class="csDAA03865">722 Moss Bay Blvd.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Janet!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:81px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:81px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:81px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:81px;">
			<img alt="" src="data:image/png;base64,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" style="width:427px;height:81px;" /></div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Margaret Peacock</span></p><p class="cs29781CB7"><span class="csDAA03865">4110 Old Redmond Rd.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Margaret!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:82px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:82px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:82px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:82px;">
			<div class="cs4E98F8E2" style="width:427px;height:82px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Steven Buchanan</span></p><p class="cs29781CB7"><span class="csDAA03865">14 Garrett Hill</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Steven!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:81px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:81px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:81px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:81px;">
			<img alt="" src="data:image/png;base64,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" style="width:427px;height:81px;" /></div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Michael Suyama</span></p><p class="cs29781CB7"><span class="csDAA03865">Coventry House<br/>Miner Rd.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Michael!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:82px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:82px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:82px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:82px;">
			<div class="cs4E98F8E2" style="width:427px;height:82px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Robert King</span></p><p class="cs29781CB7"><span class="csDAA03865">Edgeham Hollow<br/>Winchester Way</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Robert!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:82px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:82px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:82px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:82px;">
			<div class="cs4E98F8E2" style="width:427px;height:82px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Laura Callahan</span></p><p class="cs29781CB7"><span class="csDAA03865">4726 - 11th Ave. N.E.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Laura!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:81px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:81px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:81px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:81px;">
			<img alt="" src="data:image/png;base64,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" style="width:427px;height:81px;" /></div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:154px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:343px;"></td>
		<td></td>
		<td></td>
		<td class="cs5BD1DEB3" colspan="6" style="width:230px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:230px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">To:</span></p><p class="cs29781CB7"><span class="cs82C8A4CF">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Anne Dodsworth</span></p><p class="cs29781CB7"><span class="csDAA03865">7 Houndstooth Rd.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="cs714EB164">3/15/2024</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p></div>
		</div>
		</td>
		<td class="csA6DB3936" colspan="5" style="width:427px;height:343px;text-decoration:none;"><div style="overflow:hidden;width:427px;height:343px;">
			<div>
				<p class="cs29781CB7"><span class="cs82C8A4CF">Dear Anne!</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Congratulations! We are happy to offer you admission to DevExpress University as a member of the class of  2028. Your application was quite impressive.&nbsp; We were particularly impressed by your G.P.A. and your community involvement. Well done.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">As you will soon discover, DevExpress University is an amazing institution. We&rsquo;re consistently ranked in the top 10 and two of our professors were recently awarded the Nobel Prize. Should you have any questions about registration or would like to speak to a school counselor, feel free to reply to this email at your convenience.</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">&nbsp;</span></p><p class="cs29781CB7"><span class="csDAA03865">Yours truly</span></p><p class="csDFA850B2"><span class="csDAA03865">&nbsp;</span></p><p class="csDFA850B2"><span class="cs82C8A4CF">James Hoffs</span><span class="csDAA03865">, Ph.D.</span></p><p class="csDFA850B2"><span class="csDAA03865">Dean, DevExpress University</span></p><p class="csDFA850B2"><span class="csFB02205">&nbsp;</span></p></div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:82px;"></td>
		<td></td>
		<td></td>
		<td class="cs5669B984" colspan="6" style="width:230px;height:82px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="5" style="width:427px;height:82px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:427px;height:82px;">
			<div class="cs4E98F8E2" style="width:427px;height:82px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:77px;"></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:49px;"></td>
		<td></td>
		<td class="csCC709693" colspan="12" style="width:658px;height:39px;line-height:17px;text-align:left;vertical-align:bottom;"><nobr>Contact&nbsp;us:</nobr></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:13px;"></td>
		<td></td>
		<td class="csA8DCAC4A" colspan="2" style="width:24px;height:13px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" style="width:1px;height:13px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csAE4DACF" rowspan="5" style="width:189px;height:99px;text-decoration:none;"><div style="overflow:hidden;width:189px;height:99px;">
			<div>
				<p class="cs7B4E399A"><span class="cs714EB164">DevExpress University</span></p><p class="csDFA850B2"><a name="_dx_frag_StartFragment"></a><span class="cs714EB164">505 N. Brand Blvd Suite 1450<br/>Glendale CA 91203 USA</span><a name="_dx_frag_EndFragment"></a></p></div>
		</div>
		</td>
		<td class="csA8DCAC4A" style="width:2px;height:13px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="3" style="width:24px;height:13px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" style="width:5px;height:13px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="cs509763C5" colspan="2" rowspan="5" style="width:200px;height:101px;text-decoration:none;"><div style="overflow:hidden;width:200px;height:101px;">
			<div>
				<p class="cs5B143645"><span class="cs714EB164">(111) 222-3333</span></p><p class="cs5B143645"><a name="_dx_frag_StartFragment"></a><a name="_dx_frag_EndFragment"></a><span class="cs714EB164">university@devexpress.com</span></p></div>
		</div>
		</td>
		<td class="csA8DCAC4A" rowspan="5" style="width:205px;height:117px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:205px;height:117px;">
			<div class="cs4287138C" style="width:205px;height:117px;">
			</div>
		</div>
		</td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:24px;"></td>
		<td></td>
		<td class="csA8DCAC4A" colspan="2" style="width:24px;height:24px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:24px;height:24px;">
			<div class="cs2D7A67CC" style="width:24px;height:24px;">
			</div>
		</div>
		</td>
		<td class="csA8DCAC4A" style="width:1px;height:24px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" style="width:2px;height:24px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="3" style="width:24px;height:24px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:24px;height:24px;">
			<div class="cs4F685D3D" style="width:24px;height:24px;">
			</div>
		</div>
		</td>
		<td class="csA8DCAC4A" style="width:5px;height:24px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:10px;"></td>
		<td></td>
		<td class="csA8DCAC4A" colspan="2" rowspan="3" style="width:24px;height:80px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" rowspan="3" style="width:1px;height:80px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" style="width:2px;height:10px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="3" style="width:24px;height:10px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" style="width:5px;height:10px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:24px;"></td>
		<td></td>
		<td class="csA8DCAC4A" style="width:2px;height:24px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="3" style="width:24px;height:24px;text-align:left;vertical-align:top;"><div style="overflow:hidden;width:24px;height:24px;">
			<div class="cs9F3549A9" style="width:24px;height:24px;">
			</div>
		</div>
		</td>
		<td class="csA8DCAC4A" style="width:5px;height:24px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td></td>
	</tr>
	<tr style="vertical-align:top;">
		<td style="width:0px;height:46px;"></td>
		<td></td>
		<td class="csA8DCAC4A" style="width:2px;height:46px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" colspan="3" style="width:24px;height:46px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td class="csA8DCAC4A" style="width:5px;height:46px;"><!--[if lte IE 7]><div class="csAC6A4475"></div><![endif]--></td>
		<td></td>
	</tr>
</table>
</body>
</html>
<?php
    $html=ob_get_clean();
    //echo $html;
    require_once ($_SERVER['DOCUMENT_ROOT']."/proyecto/reporte_administrador/dompdf/vendor/autoload.php");
    use Dompdf\Dompdf;
    $dompdf= new Dompdf();
    $options= $dompdf->getOptions();
    $options->set(array('isRemoteEnabled' => true));
    $dompdf ->setOptions($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4');
    $dompdf->render(); 
    $dompdf ->stream("archivo.pdf", array("Attachment" => false));    
?>