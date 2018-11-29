@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <vue-livros-list edit="{{route('livro.edit','%id')}}" destroy="{{route('livro.destroy','%id')}}" livros="{{$livro}}"></vue-livros-list>
    </div>   
    <a href="{{route('livro.create')}}">Criar um livro!</a>   
</div>
@endsection