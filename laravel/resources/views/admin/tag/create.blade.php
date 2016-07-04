@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Etichete <small>&raquo; Adaugă O Etichetă Nouă</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					
					<form class="form-horizontal" role="form" method="POST" action="{{route('admin.etichete.store')}}">
						{{ csrf_field() }}
						
						@include('admin.tag._form')
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp; Salvează
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-md-offset-5">
		<a class="btn btn-info" href="{{ route('admin.etichete.index') }}" role="button">Înapoi</a>
	</div>
</div>
@stop