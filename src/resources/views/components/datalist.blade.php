<div class="w-{{ $width }} input-group p-3 input-sm">
    <span class="input-group-text" id="basic-addon1">{{ $attributes['label'] }}</span>
    <input
		class="form-control rounded-1"
		list="{{ $fieldName }}-id"
		value="{{ $value }}"
		id="{{ $fieldName }}-visible"
		placeholder="Escreva para pesquisar..."
		autocomplete="off">
    <datalist id="{{ $fieldName }}-id">
        @foreach($options as $key => $label)
			@if ($value == $key)
				<option selected value="{{ $key }}" label="{{ $label }}"></option>
			@else
				<option value="{{ $key }}" label="{{ $label }}">{{ $label }}</option>
			@endif
		@endforeach
    </datalist>
	<input type="hidden" name="{{ $fieldName }}" id="{{ $fieldName }}-hidden" value="">
</div>

<script>

	// Initialization

	var dataList = document.getElementById('{{ $fieldName }}-id');
	var enabledInput = document.getElementById('{{ $fieldName }}-visible');
	for (var i = 0; i < dataList.options.length; i++)
	{
		if (dataList.options[i].value === enabledInput.value)
		{
			enabledInput.value = dataList.options[i].label;
			document.getElementById("{{ $fieldName }}-hidden").value = dataList.options[i].value;
			break;
		}
	}

	// On selecting new value

	document.getElementById("{{ $fieldName }}-visible").addEventListener("input", function()
	{
		var dataList = document.getElementById('{{ $fieldName }}-id');

		for (var i = 0; i < dataList.options.length; i++)
		{
			if (dataList.options[i].value === this.value)
			{
				this.value = dataList.options[i].label;
				document.getElementById("{{ $fieldName }}-hidden").value = dataList.options[i].value;
				break;
			}
		}
	});


</script>
