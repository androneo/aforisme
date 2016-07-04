<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-3 control-label">Denumire</label>
	<div class="col-md-3">
		<input type="text" class="form-control" name="name" id="tag" value="{{ $name }}" autofocus>
	</div>
	<div class="col-md-8 col-md-offset-3">
		@if ($errors->has('name'))
		<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	<label for="description" class="col-md-3 control-label">
		Descriere
	</label>
	<div class="col-md-8">
		<textarea class="form-control" id="description" name="description" rows="4">{{ $description }}</textarea>
		@if ($errors->has('description'))
		<span class="help-block">
			<strong>{{ $errors->first('description') }}</strong>
		</span>
		@endif
	</div>
</div>
