@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
    <form action="{{action('LivroController@update',$id)}}" method="post">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <vue-livros-edit book="{{$livro}}"></vue-livros-edit>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    </div>   
</div>

@endsection