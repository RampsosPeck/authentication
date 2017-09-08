@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-body">
				<table class="table table-bordered">
					<caption>Personificación de usuarios</caption>
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					     @foreach ($users as $user)
					     	<tr>
					     		<td>{{ $user->id }}</td>
					     		<td>{{ $user->name }}</td>
					     		<td>{{ $user->email }}</td>
					     		<td>Acciones</td>
					     	</tr>
					     @endforeach
					</tbody>
				</table>
			</div>
		</div>		
	</div>
</div>


@stop