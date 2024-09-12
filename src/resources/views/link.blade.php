@if($postLink)
    <a @if($postLink) class="postlink" @endif href="{{ $route }}" target="_blank">{{ $label }}</a>
    @vite(['resources/js/postlink.js'])
    @else
    <a href="{{ $route }}" target="_blank">{{ $label }}</a>
@endif