<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<style type="text/css">
		*{
			font-size: 12px;
		}
		.s16{
			font-size: 14px !important;
		}
		.div-width{
			margin: auto;
			width: 95vw;
		}
		.underline{
			text-decoration: underline;
		}
		.italic{
			font-style: italic;
		}
		.bold{
			font-weight: bold;
		}
		.text-center{
			text-align: center;
		}
		.text-right{
			text-align: right;
		}
		.border-none-right{
			border-right: none;
		}
		.border-none-left{
			border-left:none;
		}
		.float-left{
			float: left;
		}
		.float-right{
			float: right;
		}
		.top{
			vertical-align: text-top;
		}
		.vertical-baseline{
			vertical-align: baseline;
		}
		.bottom{
			vertical-align: text-bottom;
		}
		.ttd{
			top: 0;
			position: absolute;
		}
		.relative{
			position: relative;
		}
		.absolute{
			position: absolute;
		}
		.empty{
			height: 15px;
		}
		table,td{
			border:1px solid black;
		}
		table{
			border-collapse: collapse;
		}
		table.border-none ,.border-none td{
			border:none !important;
		}
		@media print {
			.button-group{
				display: none;
			}
			@page {
				size: landscape
			}
		}
		@page { 
			margin: 0; 
		}
	</style>
</head>
<body>
	<div class="button-group">
		<button onclick="prints()">Print</button>
	</div>

	<div class="div-width">
		<?php
			$item = [];
	        $note = [];
		    $arr  = [];
		    $cus  = [];
		    $tanggal = [];

	        foreach ($data as $index => $ini_data) {
	        
		        array_push($note, $ini_data->s_note);
		        array_push($item, $ini_data->i_name);
		        array_push($tanggal, $ini_data->s_date);
		        array_push($cus, $ini_data->c_name);

				if (!isset($arr[$ini_data->i_name])) {
	                $arr[$ini_data->i_name]['rowspan'] = 0;
	            }
	            $arr[$ini_data->i_name]['printed'] = 'no';
	            $arr[$ini_data->i_name]['rowspan'] += 1;

	        }
	        
		?>
		<table class="border-none" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td class="s16 bold" width="35%">TAMMA ROBAH INDONESIA</td>
			</tr>
			<tr>
				<td>Jl. Raya Randu no.74<br>
					Sidotopo Wetan - Surabaya 60123<br>
				</td>
			</tr>
			<tr>
				<td class="empty"></td>
			</tr>
			<tr>
				<td class="bold">
					Laporan : Penjualan Per Barang - Detail <br>
					Pembayaran : Kredit PPn : Gabungan <br>
					Periode : {{$tgl1}} s/d {{$tgl2}}
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="0" class="tabel" border="1px">
			<thead>
				<tr class="text-center">
					
					<th>Nama Barang</th>
					<th>No Bukti</th>
					<th>Tanggal</th>
					<th>Jatuh Tempo</th>
					<th>Customer</th>
					<th>Kurs</th>
					<th>Sat</th>
					<th>Qnt</th>
					<th>Harga</th>
					<th>Diskon</th>
					<th>DPP</th>
					<th>PPN</th>
					<th>Total</th>
					
				</tr>
			</thead>

			<tbody>


		<?php 


			for($i=0; $i < sizeof($note); $i++) {
            	$empName = $item[$i];
            echo "<tr>";



            # If this row is not printed then print.
            # and make the printed value to "yes", so that
            # next time it will not printed.
            	if ($arr[$empName]['printed'] == 'no') {
	                echo "<td rowspan='".$arr[$empName]['rowspan']."'>".$empName."</td>";
	                $arr[$empName]['printed'] = 'yes';
            	}
            echo "<td>".$note[$i]."</td>".
            "<td>".$tanggal[$i]."</td>".
            "<td></td>".
            "<td>".$cus[$i]."</td>"
            ;
            echo "</tr>";
        	}
        	echo "</table>";
        ?>

				<tr>
					<td class="empty"></td>
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
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		function prints()
		{
			window.print();
		}
	</script>
</body>
</html>