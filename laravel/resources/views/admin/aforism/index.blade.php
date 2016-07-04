@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
	<h1>
		Aforisme &nbsp;
		<a href="{{ route('admin.aforisme.create') }}" class="btn btn-success">
			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Adaugă</a>
		</h1>
		<div class="row"><div class="col-md-4">
			@if (Session::has('status'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<span class="glyphicon glyphicon glyphicon-check" aria-hidden="true"></span>
				{{ Session::get('status') }}
			</div>
			@endif
		</div></div>
		{!! $aforisms->render() !!}

		<div class="table-responsive">

			<table class="table table-striped table-bordered table-hover table-nonfluid">
				<thead>
					<tr>
						<th>Publicat</th>
						<th>Conținut</th>
						<th>Etichetă</th>
						<th>Acțiuni</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($aforisms as $aforism)
					<tr>
						<td>{{ $aforism->updated_at->format('j-M-y g:ia') }}</td>
						<td>{{ strip_tags($aforism->content) }}</td>
						<td>{{ join(', ', $aforism->tagNames()) }}</td>
						<td>
							<a href="{{ route('admin.aforisme.edit', [ 'id' => $aforism->id ]) }}" class="btn btn-xs btn-info">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editează </a>
						</td>
					</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@stop