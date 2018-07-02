<html>
<!-- License:  LGPL 2.1 or QZ INDUSTRIES SOURCE CODE LICENSE -->
<head><title>QZ Print Plugin</title>
<script type="text/javascript" src="{{asset('assets/js/deployJava.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/preparejzebra.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/html2canvas.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/jquery.plugin.html2canvas.js')}}"></script>
	</head>
	<body id="content" bgcolor="#FFF380">
	<div style="position:absolute;top:0;left:5;"><h1 id="title">QZ Print Plugin</h1></div><br /><br /><br />
	<table border="1px" cellpadding="5px" cellspacing="0px"><tr>

	<td valign="top"><h2>All Printers</h2>
	<input type="button" onClick="findPrinter()" value="Detect Printer"><br />
	<input id="printer" type="text" value="zebra" size="15"><br />
	<input type="button" onClick="findPrinters()" value="List All Printers"><br />
	<input type="button" onClick="useDefaultPrinter()" value="Use Default Printer"><br /><br />
	<!-- NEW QZ APPLET TAG USAGE -- RECOMMENDED -->
	<!--
	<applet id="qz" archive="./qz-print.jar" name="QZ Print Plugin" code="qz.PrintApplet.class" width="55" height="55">
	<param name="jnlp_href" value="qz-print_jnlp.jnlp">
	<param name="cache_option" value="plugin">
	<param name="disable_logging" value="false">
	<param name="initial_focus" value="false">
	</applet><br />
	-->

	<!-- OLD JZEBRA TAG USAGE -- FOR UPGRADES -->
    <!--
	<applet name="jzebra" archive="./qz-print.jar" code="qz.PrintApplet.class" width="55" height="55">
	<param name="jnlp_href" value="qz-print_jnlp.jnlp">
	<param name="cache_option" value="plugin">
	<param name="disable_logging" value="false">
	<param name="initial_focus" value="false">
	<param name="printer" value="zebra">
	</applet><br />
	-->

	</td><td valign="top"><h2>Raw Printers Only</h2>
	<a href="http://qzindustries.com/WhatIsRawPrinting" target="new">What is Raw Printing?</a><br /><br />
	<input type="button" onClick="printEPL()" value="Print EPL" /><br />
	<input type="button" onClick="printZPL()" value="Print ZPL" /><br /><br />
	<input type="button" onClick="printESCP()" value="Print ESCP" /><br />
		<a href="javascript:findPrinter('Epson');">Epson</a>&nbsp;
		<a href="javascript:findPrinter('Citizen');">Citizen</a>&nbsp;
		<a href="javascript:findPrinter('Star');">Star</a> <br /><br />
	<input type="button" onClick="printEPCL()" value="Print EPCL" /><br />
		(Zebra Card Printer)<br /><br />
	<input type="button" onClick="print64()" value="Print Base64" /><br />
	<input type="button" onClick="printPages()" value="Print Spooling Every 2" /><br />
	<input type="button" onClick="printXML()" value="Print XML" /><br />
	<input type="button" onClick="printHex()" value="Print Hex" /><br /><br />
	<input type="button" onClick="printFile('zpl_sample.txt')" value="zpl_sample.txt" /><br />
	<input type="button" onClick="printFile('fgl_sample.txt')" value="fgl_sample.txt" /><br />
	<input type="button" onClick="printFile('epl_sample.txt')" value="epl_sample.txt" /><br /><br />

	<input type="button" onClick="printToFile()" value="Print To File" /><br />
	<input type="button" onClick="printToHost()" value="Print To Host" /><br />
	<input type="button" onClick="useAlternatePrinting()" value="Use Alternate Printing" /><br />

	</td><td valign="top"><h2>PostScript Printers Only</h2>
	<a href="http://qzindustries.com/WhatIsPostScriptPrinting" target="new">What is PostScript Printing?</a><br />
	<p>First find <a href="javascript:findPrinter('XPS');">Microsoft XPS</a> or <a href="javascript:findPrinter('PDF');">PDF</a> printer</p>
	<input type="button" onClick="printHTML()" value="Print HTML" /><br />
	<input type="button" onClick="printPDF()" value="Print PDF" /><br />
	<input type="button" onClick="printImage(false)" value="Print PostScript Image" /><br />
	<input type="button" onClick="printImage(true)" value="Print Scaled PostScript Image" /><br />
	<input type="button" onClick="printHTML5Page()" value="Print Current Page" /><br />
	<input type="button" onClick="logFeatures()" value="Log Printer Features on Print" /><br />

	</td><td valign="top"><h2>Serial</h2>
	<input type="button" id="list_ports" onClick="listSerialPorts()" value="List Serial Ports" /><br />
	<input type=text id="port_name" size="8" />
	<input type="button" id="open_port"  onClick="openSerialPort()" value="Open Port" /><br />
	<input type="button" id="send_data" onClick="sendSerialData()" value="Send Port Cmd" /><br />
	<input type="button" id="close_port"  onClick="closeSerialPort()" value="Close Port" /><br />
	<hr /><h2>Misc</h2>
	<input type="button" onClick="listNetworkInfo()" value="List Network Info" /><br />
	<input type="button" onClick="allowMultiple()" value="Allow Multiple Applets" /><br /></td></tr></table>
	</body><canvas id="hidden_screenshot" style="display:none;"></canvas>
</html>
