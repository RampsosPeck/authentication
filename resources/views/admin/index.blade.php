@extends('layouts.app')

@section('content')
@if (session()->has('flash'))
   <div class="alert alert-success">{{ session('flash') }} </div>
@endif
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
					     		<td>
					     			<!--(auth()->user()->canImpersonate() && auth()->id() !== $user->id )-->
					     			
					     			<!-- (auth()->user()->canImpersonate($user->id))-->
					     			
					     			@canImpersonate($user->id)
					     				<form method="POST" action="{{ route('impersonations.store') }}" >
					     					{{ csrf_field() }}
					     					<input type="hidden" name="user_id" value="{{ $user->id }}" >
					     					<button class="btn btn-info btn-xs">Personificar</button>
					     				</form>
					     			@endcanImpersonate
					     		</td>
					     	</tr>
					     @endforeach
					</tbody>
				</table>
			</div>
		</div>		
	</div>
</div>


@stop