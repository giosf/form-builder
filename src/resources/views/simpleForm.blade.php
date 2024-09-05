<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    {!! $content !!}
    <br>
    <button class="btn @if(isset($buttonClass)) {{ $buttonClass }} @endif" type="submit">{{ $buttonLabel }}</button>

</form>

