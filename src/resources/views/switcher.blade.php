    <div class="form-check form-switch">
        <input
            class="form-check-input"
            name="{{ $name }}"
            @if($hideFields)
            hideFields="{{ $hideFields }}"
            @endif
            type="checkbox"
            id="switcher-{{ $name }}"
            @if($value) checked @endif>
        <label
            class="form-check-label"
            for="switcher-{{ $name }}">
            {{ $label }}
        </label>
    </div>
@if($hideFields)
    <script>
        document.addEventListener('DOMContentLoaded', function(e) {
            var visibleInput = document.getElementById('switcher-{{ $name }}');
            var fieldsCollection = visibleInput.attributes.hidefields.value;
            var row = visibleInput.closest('tr');
            var children = [...row.children];
            children.map((x) => {
                fieldsCollection.split(',').map((field) => {
                    const element = row.querySelectorAll(field);
                    if(visibleInput.checked)
                    {
                        element[0].disabled = false;
                    }
                    else
                    {
                        element[0].disabled = true;
                    }
                })
            })
        });

        var visibleInput = document.getElementById('switcher-{{ $name }}');
        visibleInput.addEventListener('input', function(e) {
            var fieldsCollection = this.attributes.hidefields.value;
            var row = this.closest('tr');
            var children = [...row.children];
            children.map((x) => {
                fieldsCollection.split(',').map((field) => {
                    const element = row.querySelectorAll(field);
                    element[0].disabled = !this.checked
                })
            })
        });

    </script>
@endif
