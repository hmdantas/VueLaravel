@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
    <form action="/livro" method="post">
        {{ csrf_field() }}
        <vue-livros-create book="{{$livro}}"></vue-livros-create>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    </div>   
</div>

@endsection