
 @section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Implementing datatables tutorial using yajra package</title>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>

<body>


<div class="container">
  <table id="rooms" class="table table-hover table-condensed" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>type</th>
            <th>facilities</th>
            <th>price</th>
        </tr>
    </thead>
  </table>
</div>


<script type="text/javascript">
$(document).ready(function() {
    oTable = $('#rooms').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('datatable.getposts') }}",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'type', name: 'type'},
            {data: 'facilities', name: 'facilities'},
            {data: 'price', name: 'price'}
        ]
    });
});
</script>
</body>
</html>
