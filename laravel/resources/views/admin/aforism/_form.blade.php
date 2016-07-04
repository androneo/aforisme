<div class="col-md-8">
	<div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
		<label for="content" class="col-md-2 control-label">Conținut</label>
		<div class="col-md-10">
			<textarea class="form-control" name="content" rows="7" id="content" style="resize:none;">{{ $content }}</textarea>
			@if ($errors->has('content'))
				<span class="help-block">
					<strong>{{ $errors->first('content') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group {{ $errors->has('răspuns') ? ' has-error' : '' }}">
		<div class="col-md-5 col-md-offset-2">
			<input class="form-control hided" type="text" name="răspuns" placeholder="Adaugă răspunsul (pentru Ghicitori)" value="{{ $răspuns }}">
			@if ($errors->has('răspuns'))
				<span class="help-block">
					<strong>{{ $errors->first('răspuns') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label for="tags" class="col-md-3 control-label">Etichete</label>
		<div class="col-md-8">
			<select name="tags" id="tags" class="form-control">
				@foreach ($allTags as $key=>$tag)
					<option @if ($key == $tags) selected @endif value="{{ $key }}"> {{ $tag }} </option>
				@endforeach
			</select>
		</div>
	</div>
</div>