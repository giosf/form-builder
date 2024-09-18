@extends('layouts.app')

@section('content')

	<p class="h4">{{ $formTitle }}</p>

	@if(isset($formHeader))
		@if(is_array($formHeader))
			@foreach ($formHeader as $component)
				{!! $component !!}
			@endforeach
		@else
			{!! $formHeader !!}
		@endif
	@endif

	<br>
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	@if (isset($mensagem) && $mensagem == 'updated')
		<div class="alert alert-success" id="div-confirmacao" role="alert">
			Atualizado com sucesso
		</div>
	@endif
	<form id="form-builder" action="{{ $route }}" method="POST" enctype="multipart/form-data">

		@csrf

		@if ($method == 'store')
			@method('POST')
		@elseif ($method == 'update')
			@method('PATCH')
		@elseif ($method == 'destroy')
			@method('DELETE')
		@elseif($method == 'restore')
			@method('POST')
		@endif

		<div class="input-group">
			@foreach($fields as $field)
				{!! $field->render() !!}
			@endforeach
		</div>

		<button class="btn btn-success form" type="submit" name="submit">Enviar</button>
	</form>

@endsection
