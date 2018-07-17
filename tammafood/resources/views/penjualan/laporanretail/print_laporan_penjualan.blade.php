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
			page-break-inside: avoid;
		}
		.tabel{
			page-break-inside: avoid;

		}
		@media print {
			.button-group{
				display: none;
				padding: 0;
				margin: 0;
			}
			@page {
				size: landscape
			}
		}
		@page { 
			margin:0; 
		}
		.tabel th{
			white-space: nowrap;
			width: 1%;
		}
		.no-border-head{
			border-top:hidden;
			border-left: hidden;
			border-right: hidden;
		}

	</style>
</head>
<body>
	<div class="button-group">
		<button onclick="prints()">Print</button>
	</div>
	
		<div class="div-width">
		
		

		<table width="100%" cellpadding="2px" class="tabel" border="1px" style="margin-bottom: 10px;">
			<thead>
				<tr>
					<td colspan="13" class="no-border-head">
						<div class="s16 bold">
							TAMMA ROBAH INDONESIA
						</div>
						<div>
							Jl. Raya Randu no.74<br>
							Sidotopo Wetan - Surabaya 60123<br>
						</div>
						<div class="bold" style="margin-top: 15px;">
							Laporan : Penjualan Per Barang - Detail <br>
							Pembayaran : Kredit PPn : Gabungan <br>
							Periode : {{$tgl1}} s/d {{$tgl2}}
						</div>
					</td>
				</tr>
				<tr>
					<th width="150px">Nama Barang</th>
					<th>No Bukti</th>
					<th>Tanggal</th>
					<th>Jatuh Tempo</th>
					<th>Customer</th>
					<th>Kurs</th>
					<th>Sat</th>
					<th>Qty</th>
					<th>Harga</th>
					<th>Diskon</th>
					<th>DPP</th>
					<th>PPN</th>
					<th>Total</th>
					
				</tr>
			</thead>
			<tbody>

				@for($i=0;$i<count($penjualan);$i++)
					@for($a=0;$a<count($penjualan[$i]);$a++)
						<tr>
							@if($a == 0)
							<td rowspan="{{count($penjualan[$i])}}">{{$penjualan[$i][$a]->i_code}} - {{$penjualan[$i][$a]->i_name}}</td>
							@endif
							<td>{{$penjualan[$i][$a]->s_note}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
							<td>{{$penjualan[$i][$a]->i_code}}</td>
						</tr>
					@endfor
				@endfor


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