<div class="w-{{ $width }} input-group input-sm p-3 ">
	@if($hasLabel)
		<span class="input-group-text" id="basic-addon1">{{ $label }}</span>
	@endif
	<input
		class="form-control"
		name="{{ $fieldName }}"
		id="{{ $fieldName }}"
		value ="{{ $value }}"
		@if($disabled) disabled @endif>
</div>
