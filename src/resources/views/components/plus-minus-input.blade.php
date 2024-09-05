<div
	@if(!isset($label)) style="width:120px" @else style="width:200px" @endif
	class="input-group d-flex justify-content-center"
	id="minus-plus-container">
	@if(isset($label))
		<span class="input-group-text" id="basic-addon1">
			{{ $label }}
		</span>
	@endif
	<span
		class="input-group-text minus-button"
		id="minus-button"
		componentId="{{ $id }}">-</span>
		<input
			class="form-control"
			name="{{ $name }}"
			id="minus-plus-input"
			size="1"
			range="{{ $range }}"
			value ="{{ $value }}">
	<span
		class="input-group-text plus-button"
		id="plus-button"
		componentId="{{ $id }}">+</span>
</div>

@vite(['resources/js/controllers/minusPlusInputController.js'])
