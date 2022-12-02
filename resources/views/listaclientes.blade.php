@extends('main')

@section('content')

<form action="{{ route('create') }}" method="get">
    <div class="panel panel-default">
			<button type="subit" class="btn btn-dark btn-block">Adicionar cliente</button>
	</div>
</form>    

    <br/>
    <br/>

    @if (count($Cliente) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Clientes atuais:
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    
                    <thead>
                        <th>Nome</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        @foreach ($Cliente as $cl)
                            <tr>
                                    <td class="table-text">
                                    <a href="{{route('read',$cl->id)}}">
                                        <div>{{ $cl->nome }}</div>
                                    </a>
                                    </td>
                        
                                <td>
    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection('content')