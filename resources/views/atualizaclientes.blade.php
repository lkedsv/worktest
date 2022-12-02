@extends('main')

@section('content')

	<script>
		const handlePhone = (event) => {
		let input = event.target
		input.value = phoneMask(input.value)
		}

		const phoneMask = (value) => {
		if (!value) return ""
		value = value.replace(/\D/g,'')
		value = value.replace(/(\d{2})(\d)/,"($1) $2")
		value = value.replace(/(\d)(\d{4})$/,"$1-$2")
		return value
		}
	</script>

    <!-- Current Tasks -->
    <div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Atualize os dados do cliente:</div>
			<div class="card-body">
                <form action="{{ route('update', $Cliente->id) }}" method="post">
					@csrf
                    <div class="form-group mb-3">
						<input type="text" name="nome" class="form-control" value="{{$Cliente->nome}}" placeholder="NOME"/>
                        @if($errors->has('nome'))
							<span class="text-danger">{{ $errors->first('nome') }}</span>
						@endif
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="cpf" class="form-control" value="{{$Cliente->cpf}}" placeholder="CPF"/>
                        @if($errors->has('cpf'))
							<span class="text-danger">{{ $errors->first('cpf') }}</span>
						@endif
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="categoria" class="form-control" value="{{$Cliente->categoria}}" placeholder="CATEGORIA"/>
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="cep" class="form-control" value="{{$Cliente->cep}}" placeholder="CEP"/>
                        @if($errors->has('cep'))
							<span class="text-danger">{{ $errors->first('cep') }}</span>
						@endif
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="rua" class="form-control" value="{{$Cliente->rua}}" placeholder="RUA"  />
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="bairro" class="form-control" value="{{$Cliente->bairro}}" placeholder="BAIRRO"/>
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="uf" class="form-control" value="{{$Cliente->uf}}" placeholder="UF"/>
					</div>
                    <div class="form-group mb-3">
						<input type="text" name="complemento" class="form-control" value="{{$Cliente->complemento}}" placeholder="COMPLEMENTO"/>
					</div>
                    <div class="form-group mb-3">
						<input type="tel" name="telefone" class="form-control" value="{{$Cliente->telefone}}" placeholder="TELEFONE"  maxlength="15"  onkeyup="handlePhone(event)"/>
					</div>
					<div class="d-grid mx-auto">
						<button type="subit" class="btn btn-dark btn-block">Atualizar</button>
					</div>
				</form>
			</div>
			<form action="{{ route('delete', $Cliente->id) }}" method="post">
					@csrf
					<div class="d-grid mx-auto">
							<button type="subit" class="btn btn-dark btn-block">Remover</button>
					</div>
			</form>
		</div>
	</div>
</div>


@endsection('content')