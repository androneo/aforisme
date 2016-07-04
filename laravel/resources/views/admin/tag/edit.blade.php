@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Etichete <small>&raquo; Editare</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.etichete.update', ['slug' => $slug ]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="slug" value="{{ $slug }}">

						@include('admin.tag._form')

						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> &nbsp; Salvează Modificările
								</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
									<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Șterge Eticheta
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-md-offset-5">
			<a class="btn btn-info" href="{{ route('admin.etichete.index') }}" role="button">Înapoi</a>
		</div>
	</div>
</div>

{{-- Confirm Delete Modal--}}
<div class="modal fade" id="modal-delete" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel"> 
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Șterge Eticheta</h4>
			</div>
			<div class="modal-body">
				<p>
					<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> &nbsp;
					Confirmă Ștergerea Etichetei <strong>{{$name}}</strong>
				</p>
			</div>
			<div class="modal-footer">
				<form method="POST" action="{{ route('admin.etichete.destroy', ['slug' => $slug]) }}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<button type="button" class="btn btn-default" data-dismiss="modal">Închide</button>
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Șterge </button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection



