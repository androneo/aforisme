@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Aforisme <small>&raquo; Editare</small></h3>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.aforisme.update', $id) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">

						@include('admin.aforism._form')

						<div class="col-md-8">
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type="submit" class="btn btn-success" data-toggle="modal">
										<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Salvează modificările
									</button>
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
										<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Șterge
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-2 col-md-offset-5">
			<a class="btn btn-info" href="{{ route('admin.aforisme.index') }}" role="button">Înapoi</a>
		</div>
	</div>

	{{-- Confirm Delete --}}
	<div class="modal fade" id="modal-delete" tabIndex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">Șterge Aforismul</h4>
				</div>
				<div class="modal-body">
					<p>
						<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> &nbsp;
						Confirmă Ștergerea
					</p>
				</div>
				<div class="modal-footer">
					<form method="POST" action="{{ route('admin.aforisme.destroy', $id) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<button type="button" class="btn btn-default" data-dismiss="modal">Închide</button>
						<button type="submit" class="btn btn-danger">
							<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Șterge
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">

	function myFunction(){ 
		if($("#tags option[value='Ghicitori']:selected").length>0) {
			$(".hided").prop('disabled', false);
		} else {
			$(".hided").prop('disabled', true);
		}
	}

	$( document ).ready(function() {
		myFunction();
	});

	$(function() {
		$('#tags').change(function(){
			myFunction();
		});
	});
</script>
@endsection

