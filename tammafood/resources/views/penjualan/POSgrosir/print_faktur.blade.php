<!DOCTYPE html>
<html>
<head>
	<title>Faktur</title>
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
		}
	</style>
</head>
<body>
	<div class="button-group">
		<button onclick="prints()">Print</button>
	</div>
	<div class="div-width">
		<table class="border-none" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td class="s16 italic bold" width="35%">TAMMA ROBAH INDONESIA</td>
				<td class="s16" width="30%"><p class="underline text-center">FAKTUR</p></td>
				<td class="s16" width="35%">Surabaya, <text class="bold">{{ $sales->s_date }}</text></td>
			</tr>
			<tr>
				<td>Jl. Raya Randu no.74<br>
					Sidotopo Wetan - Surabaya 60123<br>
					Telp. 031-51165528<br>
					Fax. 081331100028-081234561066
				</td>
				<td class="text-center">{{ $sales->s_note }}</td>
				<td>Kepada Yth,<br>
					{{$sales->c_name}}<br>
					{{$sales->c_address}}
				</td>
			</tr>
		</table>
		<table width="100%" cellspacing="0" class="tabel" border="1px">
			<tr class="text-center">
				<td>No</td>
				<td>Kode Barang</td>
				<td>Nama Barang</td>
				<td>Unit</td>
				<td>Harga</td>
				<td>Total</td>
				<td>Discount</td>
			</tr>
			<?php $totalDis = 0 ?>
			@foreach ($data as $index => $item)
			<tr>
				<td class="text-center">{{ $index+1 }}</td>
				<td>{{ $item->i_code }}</td>
            	<td>{{ $item->i_name }}</td>
				<td class="text-center">{{ $item->i_sat1 }}</td>
				<td class="text-right">{{ $item->sd_price }}</td>
				<td class="text-right" width="10%">{{ $item->sd_total }}</td>
				<td class="text-right" width="10%">
				@if ($item->sd_disc_percent == '0')
                  {{ number_format($item->sd_disc_value,2,'.',',')}}
                  <?php $totalDis += $item->sd_disc_value ?>
                @else
                  {{ number_format(($item->sd_qty*$item->sd_price)*($item->sd_disc_percent/100),2,'.',',') }}
                  <?php $totalDis += ($item->sd_qty*$item->sd_price)*($item->sd_disc_percent/100) ?>
                @endif
            	</td>
			</tr>
			@endforeach
			@foreach($array as $a)
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			@endforeach
			<tr>
				<td colspan="2" class="border-none-right">Keterangan :</td>
				<td colspan="3" class="border-none-left border-none-right"></td>
				<td class="border-none-right border-none-left">Jumlah</td>
				<td class="border-none-left text-right">{{ number_format($dataTotal[0]->total,2,'.',',')}}</td>
			</tr>
			<tr>
				<td colspan="5" class="vertical-baseline border-none-right" style="position: relative;">
					<div class="top s16">Terbilang : Satu Juta Enam Ratus Ribu Rupiah</div>
					<div class="float-left" style="width: 40vw;">
						<ul style="padding-left: -15px;">
							<li>Barang yang sudah dibeli tidak bisa dikembalikan lagi kecuali ada perjanjian</li>
							<li>Keterlambatan, kehilangan atau kerusakan barang selama pengiriman tidak menjadi tanggung jawab kami.</li>
							<li>Klaim dilayani 1x24 jam setelah barang diterima</li>
						</ul>
					</div>
					<div class="float-right text-center" style="margin-top: 15px;height: 60px;width: 40%;position: absolute;right: 0;bottom: 20px;">
						<div>Hormat Kami</div>
						<div style="margin:auto;border-bottom: 1px solid black;width: 150px;height: 45px;"></div>
						<div>Accounting</div>
					</div>
				</td>
				<td colspan="2" class="vertical-baseline border-none-left">
					<div class="top">
						<table class="border-none" width="100%" cellspacing="0">
							<tr>
								<td width="50%">Total Diskon</td>
								<td width="50%" class="text-right">{{ $totalDis }}</td>
							</tr>
							<tr>
								<td width="50%">Sub Total</td>
								<td width="50%" class="text-right">{{ number_format($dataTotal[0]->total,2,'.',',')}}</td>
							</tr>
							<tr>
								<td width="50%">PPN</td>
								<td width="50%" class="text-right">0.00</td>
							</tr>
							<tr>
								<td width="50%">Total</td>
								<td width="50%" class="text-right">{{ number_format($dataTotal[0]->total,2,'.',',')}}</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
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