@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
        <vue-livros-list create="{{route('livro.create')}}" edit="{{route('livro.edit','%id')}}" destroy="{{route('livro.destroy','%id')}}" livros="{{$livro}}"></vue-livros-list>
    </div> 
</div>
@endsection