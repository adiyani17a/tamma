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
	</style>
</head>
<body>
	<div class="div-width">
		<table class="border-none" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td class="s16 italic bold" width="35%">TAMMA ROBAH INDONESIA</td>
				<td class="s16" width="30%"><p class="underline text-center">FAKTUR</p></td>
				<td class="s16" width="35%">Surabaya, <text class="bold">{{date('d/m/Y')}}</text></td>
			</tr>
			<tr>
				<td>Jl. Raya Randu no.74<br>
					Sidotopo Wetan - Surabaya 60123<br>
					Telp. 031-51165528<br>
					Fax. 081331100028-081234561066
				</td>
				<td class="text-center">01180525040-PJ</td>
				<td>Kepada Yth,<br>
					Fitrah Kebab<br>
					Jl. Wonosari km.8 sekarsuli no.23 RT 04 RW Sendangtirto Berbah Sleman Yogyakarta
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
			<tr>
				<td class="text-center">1</td>
				<td>005000018</td>
				<td>Tortilla Catering</td>
				<td class="text-right">100,00 PAK</td>
				<td class="text-right">16,000.00</td>
				<td class="text-right" width="10%">1,600,000.00</td>
				<td class="text-right" width="10%">0.00</td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td class="text-center empty"></td>
				<td></td>
				<td></td>
				<td class="text-right"></td>
				<td class="text-right"></td>
				<td class="text-right" width="10%"></td>
				<td class="text-right" width="10%"></td>
			</tr>
			<tr>
				<td colspan="2" class="border-none-right">Keterangan :</td>
				<td colspan="3" class="border-none-left border-none-right"></td>
				<td class="border-none-right border-none-left">Jumlah</td>
				<td class="border-none-left text-right">1,600,000.00</td>
			</tr>
			<tr>
				<td colspan="5" class="vertical-baseline border-none-right" style="position: relative;">
					<div class="top s16">Terbilang : Satu Juta Enam Ratus Ribu Rupiah</div>
					<div class="float-left" style="width: 40vw;">
						<ul style="padding-left: -15px;">
							<li>Barang yang sudah dibeli tidak bisa dikemblikan lagi kecuali ada perjanjian</li>
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
								<td width="50%" class="text-right">0.00</td>
							</tr>
							<tr>
								<td width="50%">Sub Total</td>
								<td width="50%" class="text-right">1,600,000.00</td>
							</tr>
							<tr>
								<td width="50%">PPN</td>
								<td width="50%" class="text-right">0.00</td>
							</tr>
							<tr>
								<td width="50%">Total</td>
								<td width="50%" class="text-right">1,600,000.00</td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>