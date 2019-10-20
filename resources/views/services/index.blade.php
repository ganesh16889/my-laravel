@extends('layouts.app')

@section('content')

<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Service</th>
			<th>Created On</th>
		</tr>
	</thead>
	<tbody>
		@foreach($services as $service)
			<tr>
				<td>{{ $service->service_type_id }}</td>
				<td>{{ $service->service_type }}</td>
				<td>{{ $service->created_at }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection