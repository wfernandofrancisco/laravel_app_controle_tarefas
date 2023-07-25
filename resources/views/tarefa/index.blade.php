@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de tarefas</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12" align="right"><a href="{{route('tarefa.create')}}" class="btn btn-success"> Nova tarefa</a></div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data Limite Conclusão</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tarefas as $tarefa)
                                <tr>
                                    <th>{{$tarefa->id}}</th>
                                    <td>{{$tarefa->tarefa}}</td>
                                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                    <td><a href="{{route('tarefa.edit', $tarefa->id)}}" class="text-primary"> Editar</a></td>
                                    <td>
                                        <form id="form_{{$tarefa->id}}" method="post" action="{{route('tarefa.destroy', $tarefa->id)}}">
                                            @method("DELETE")
                                            @csrf
                                            <a href="#" onclick="document.getElementById('form_{{$tarefa->id}}').submit()" class="text-danger"> Excluir</a>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{$tarefas->previousPageUrl()}}">Voltar</a></li>
                            @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}} "><a class="page-link" href="{{$tarefas->url($i)}}"> {{$i}} </a></li>    
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Avançar</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
