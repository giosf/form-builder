<a href="{{ $url }}">
    <button
        class="btn {{ $buttonClass }}"
        type="button"
        @if($isHidden) hidden @endif>
            {{ $label }}
    </button>
</a>