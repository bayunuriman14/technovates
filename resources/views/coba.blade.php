<!DOCTYPE html>
<html>
<head>
	<title>coba</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
</head>
<body>
<h2>Coba Template</h2>
	<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>class</th>
                <th>function</th>
                <th>alias</th>
                <th>method</th>
                <th>aksi</th>
            </tr>
        </thead>
    </table>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable( {
	        "processing": true,
	        "serverSide": true,
	        "aaSorting": [[1,'asc']],
	        "ajax": {
	            "url": "{!! url('datatable/data') !!}",
	            "type": "POST"
	        }
	    } );
	} );
</script>	
</body>
</html>