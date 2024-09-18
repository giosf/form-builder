<div class="w-75 textareajs">
    <span class="input-group-text">{{ $attributes['label'] }}</span>
    <div id="editor">
    </div>
    <textarea name="{{ $fieldName }}" id="hiddenArea" hidden>{{ $value }}</textarea>
</div>
@vite(['vendor/giosf/form-builder/src/controllers/textareaController'])

