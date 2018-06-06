<table class="table tabelan table-hover table-bordered" id="tableNotaPlan">
	<thead>
	  <tr>
	  	<th>No</th>
	    <th>No Nota</th>
	    <th>Nama</th>
	    <th>Tanggal</th>
	    <th style="width:13%;">Jumlah Order</th>
	  </tr>
	</thead>
	<tbody>

	</tbody>
</table>

<script type="text/javascript">
	@foreach ($data as $id)
		var id = {{ $id->sd_item }}
	@endforeach;

var tableNotaPlan = $('#tableNotaPlan').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : baseUrl + "/produksi/monitoringprogress/nota/tabel/"+id,
        },
        columns: [
        {data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false},
        {data: 's_note', name: 's_note'},
        {data: 'c_name', name: 'c_name', orderable: false},
        {data: 's_date', name: 's_date', orderable: false},
        {data: 'sd_qty', name: 'sd_qty', orderable: false, searchable: false},
    ],
    });
</script>