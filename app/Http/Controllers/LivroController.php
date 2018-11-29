<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return view('welcome',['livro' => Livro::all()]);
        }

        return redirect('/login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $novolivro = new Livro();

        $novolivro->titulo = $request->titulo;
        $novolivro->autor = $request->autor;
        $novolivro->resumo = $request->resumo;

        $novolivro->save();

        return route('livro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);
        return view('edit', compact('livro', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $livro = Livro::find($id);

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->resumo = $request->resumo;

        $livro->update();

        return route('livro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::find($id);

        $livro->delete();

        return route('livro.index');
    }
}
