<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Senarai Pengguna</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>
</head>
<body>
	<div class="container">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">Tambah Pengguna</div>
				<div class="card-body">
					<form action="/users" method="post">
						@csrf
						@if(session()->has('message_ins'))
						    <div class="alert alert-success small">
						        {{ session()->get('message_ins') }}
						    </div>
						@elseif(session()->has('message_dup'))
							<div class="alert alert-warning small">
							    {{ session()->get('message_dup') }}
							</div>
						@elseif(session()->has('message_del'))
							<div class="alert alert-danger small">
							    {{ session()->get('message_del') }}
							</div>
						@endif
						<div class="form-row">
							<div class="col-sm-3">
								<label class="col-form-label">Nama Penuh</label>
							</div>
							<div class="col-sm-9">
								<input type="text" name="name" class="form-control form-control-sm">
							</div>
						</div>
						<div class="form-row form-group">
							<div class="col-sm-3">
								<label class="col-form-label">No. Matriks / No. Staf</label>
							</div>
							<div class="col-sm-3">
								<input type="text" name="noMatriks" class="form-control form-control-sm">
							</div>
							<div class="col-sm-3">
								<label class="col-form-label">No. KP / No. Passport</label>
							</div>
							<div class="col-sm-3">
								<input type="text" name="noKP" class="form-control form-control-sm">
							</div>
						</div>
						<div class="text-center">
							<button class="btn btn-sm btn-primary" type="submit">Daftar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<table id="myTable" class="table table-striped table-sm small text-center">
			<thead>
				<tr>
					<th colspan="5">Senarai Pengguna</th>
				</tr>
				<tr>
					<th>#</th>
					<th>Nama Pengguna</th>
					<th>No. Matriks / No. Staf</th>
					<th>Status</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $data)
				<tr>
					<td>{{ $loop->iteration }}.</td>
					<td>{{ $data->name }}</td>
					<td>{{ $data->noMatriks }}</td>
					<td>{{ $data->status }}</td>
					<td><a href='users/{{ $data->noMatriks}}' class="btn btn-sm btn-danger">Delete</td>
				</tr>
		 		@endforeach
			</tbody>
		</table>		
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
	<script>
		$(document).ready( function () {
		    $('#myTable').DataTable();
		} );
	</script>
</body>
</html>