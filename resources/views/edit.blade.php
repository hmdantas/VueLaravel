@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app">
    	<input name="_method" type="hidden" value="PATCH">
        <vue-livros-edit rota="{{route('livro.update','%id')}}" book="{{$livro}}"></vue-livros-edit>
    </form>

    </div>   
</div>

@endsection