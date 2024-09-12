<div class="w-{{ $width }} input-group p-3">
  <span class="input-group-text">{{ $attributes['label'] }}</span>
  <textarea class="form-control" name="{{ $fieldName }}" id="{{ $fieldName }}"cols="30" rows="2" aria-label="{{ $attributes['label'] }}">{{ $value }}</textarea>
</div>
@vite(['vendor/giosf/form-builder/src/controllers/textareaController'])

