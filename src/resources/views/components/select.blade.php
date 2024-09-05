<div class="w-{{ $width }} input-group p-3">
	<span class="input-group-text" id="basic-addon1">{{ $attributes['label'] }}</span>
	<select
		class="form-select @if(isset($disableIf)) conditional @endif"
		disableif="@if(isset($disableIf)) {{ json_encode($disableIf) }} @endif"
		name="{{ $fieldName }}" id="{{ $fieldName }}">
		@foreach($options as $key => $label)
			@if ($value == $key)
				<option selected value="{{ $key }}">{{ $label }}</option>
			@else
				<option value="{{ $key }}">{{ $label }}</option>
			@endif
		@endforeach
	</select> 
</div>

@vite(['resources/js/controllers/selectController.js'])
