<div class="w-{{ $width }} input-group mb-3">
    @if($hasLabel)
		<span class="input-group-text" id="basic-addon1">{{ $label }}</span>
	@endif
    <input
        class="form-control"
        type="text"
        id="visible-{{ $fieldName }}"
        value="{{ $value }}"
        @if(isset($hideId))
            hideid="{{ $hideId }}"
        @endif>
</div>
    <input type="hidden" id="hidden-{{ $fieldName }}" name="{{ $fieldName }}" value="{{ $value }}">

<script>
    var visibleInput  = document.getElementById('visible-{{ $fieldName }}');
    var hiddenInput = document.getElementById('hidden-{{ $fieldName }}');
    var integer = visibleInput.value.slice(0, -2).toString(); 
    var cents = visibleInput.value.slice(-2).toString(); 
    var finalValue = integer + ',' + cents;

    if (integer == '' && cents == '')
    {
        finalValue = '';
    }
    if (integer == '')
    {
        integer = '0';
    }
        
    visibleInput.value = finalValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

    visibleInput.addEventListener('input', function(e) {
        var value = this.value.replace(/[^0-9]/g, '');
        var hiddenInput = document.getElementById('hidden-{{ $fieldName }}');
        hiddenInput.value = parseFloat(value);

        let integer = value.slice(0, -2).toString(); 
        let cents = value.slice(-2).toString(); 
        let finalValue = integer + ',' + cents;

        if (integer == '' && cents == '')
        {
            finalValue = '';
        }
        if (integer == '')
        {
            integer = '0';
        }
        
        this.value = finalValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    });
</script>
