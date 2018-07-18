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
		.tabel table, .tabel td{
			border:1px solid black;
			

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
		table.tabel th{
			white-space: nowrap;
			width: auto;
		}
		.no-border-head{
			border-top:hidden !important;
			border-left: hidden !important;
			border-right: hidden !important;
		}
		table.tabel tr {
			page-break-inside:avoid; 
			page-break-after:auto;
		}
		table.tabel {
			page-break-inside:auto;
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
					<th>Nama Barang</th>
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
					@for($j=0;$j<count($penjualan[$i]);$j++)
						<tr>
							@if($j == 0)
							<td class="border-none" rowspan="{{count($penjualan[$i]) + 1}}">{{$penjualan[$i][$j]->i_code}} - {{$penjualan[$i][$j]->i_name}}</td>
							@endif
							<td class="text-center">{{$penjualan[$i][$j]->s_note}}</td>
							<td class="text-center">{{$penjualan[$i][$j]->s_date}}</td>
							<td></td>
							<td>{{$penjualan[$i][$j]->c_name}}</td>
							<td class="text-right">{{number_format(1,2,',','.')}}</td>
							<td class="text-center">{{$penjualan[$i][$j]->m_sname}}</td>
							<td class="text-center">{{$penjualan[$i][$j]->sd_qty}}</td>
							<td>
								<div class="float-left">
									Rp. 
								</div>
								<div class="float-right"> 
									{{number_format($penjualan[$i][$j]->sd_price,2,',','.')}}
								</div>
							</td>
							<td class="text-right">{{$penjualan[$i][$j]->sd_disc_percent}}</td>
							<td class="text-right">{{number_format($penjualan[$i][$j]->sd_total,2,',','.')}}</td>
							<td class="text-right">{{number_format(0,2,',','.')}}</td>
							<td class="text-right">{{number_format($penjualan[$i][$j]->sd_total,2,',','.')}}</td>
						</tr>

						@if($j == count($penjualan[$i]) - 1)
							<tr>
								<td class="text-right bold" colspan="4">Total</td>
								<td class="text-right bold">{{number_format(1,2,',','.')}}</td>
								<td colspan="4" class="text-right bold">Total</td>
								<td class="text-right bold">{{number_format($data_sum[$i]->total_penjualan,2,',','.')}}</td>
								<td class="text-right bold">Total</td>
								<td class="text-right bold">{{number_format($data_sum[$i]->total_penjualan,2,',','.')}}</td>
							</tr>
						@endif
						
					@endfor
				@endfor

				

			</tbody>

		</table>
		
		<div class="float-left" style="width: 30vw;">
			<table class="border-none" width="100%">
				<tr>
					<td>Diskon</td>
					<td>:</td>
					<td>{{number_format(0,2,',','.')}}</td>
				</tr>
				<tr>
					<td>DPP</td>
					<td>:</td>
					<td>{{number_format($data_sum_all[0]->total_semua_penjualan,2,',','.')}}</td>
				</tr>
				<tr>
					<td>Diskon</td>
					<td>:</td>
					<td>{{number_format(0,2,',','.')}}</td>
				</tr>
				<tr>
					<td>Grand Total</td>
					<td>:</td>
					<td>{{number_format($data_sum_all[0]->total_semua_penjualan,2,',','.')}}</td>
				</tr>
			</table>
		</div>
		
	</div>
	<script type="text/javascript">
		function prints()
		{
			window.print();
		}

	</script>
</body>
</html>