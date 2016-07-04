@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
	<h1>
		Etichete &nbsp;
		@if ($admin = (Auth::check() && Auth::user()->is_admin))
		<a href="{{ route('admin.etichete.create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Adaugă</a>
		@endif
	</h1>
	<div class="row"><div class="col-md-4">
	 @if (Session::has('status'))
	    <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="glyphicon glyphicon glyphicon-check" aria-hidden="true"></span> Succes. &nbsp;
            {{ Session::get('status') }}
        </div>
	@endif
	</div></div>

	<div class="table-responsive">

		<table class="table table-striped table-bordered table-hover table-nonfluid">
			<thead>
				<tr>
					<th>Etichetă</th>
					<th class="hidden-md">Descriere</th>
					@if ($admin)
					<th>Acțiuni</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach ($tags as $tag)
				<tr>
					<td>{{ $tag->name }}</td>
					<td>{{ $tag->description }}</td>
					@if ($admin)
					<td>
						<a href="{{ route('admin.etichete.edit', ['slug' => $tag->slug ]) }}" class="btn btn-xs btn-info">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editează</a>
					</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>
@endsection