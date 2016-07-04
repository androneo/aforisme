@extends('admin.layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Aforisme <small>&raquo; Adaugă aforism nou</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('admin.aforisme.store') }}">
						{{ csrf_field() }}
						@include('admin.aforism._form')
						<div class="col-md-8">
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type="submit" class="btn btn-success" data-toggle="modal">
										<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Salvează
									</button>
								</div>
							</div>
						</div>
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