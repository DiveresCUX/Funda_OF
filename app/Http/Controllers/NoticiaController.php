<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

/**
 * Class NoticiaController
 * @package App\Http\Controllers
 */
class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {        
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $noticias = Noticia::paginate();

        return view('noticia.index', compact('noticias'))
            ->with('i', (request()->input('page', 1) - 1) * $noticias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noticia = new Noticia();
        return view('noticia.create', compact('noticia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Noticia::$rules);

        $path = $request->file('imagen')->store(
            'noticias', 'public'
        );

        $noticia = Noticia::create([
            "titulo" => $request->titulo,
            "subtitulo" => $request->subtitulo,
            "contenido" => $request->contenido,
            "imagen" => $path
        ]);

        return redirect()->route('noticias.index')
            ->with('success', '¡Noticia creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);

        return view('noticia.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticia::find($id);

        return view('noticia.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Noticia $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {        
        request()->validate(Noticia::$rules);

        if(!empty($request->file('imagen')))
        {
            $path = $request->file('imagen')->store(
                'noticias', 'public'
            );
        }    

        
            $noticia->titulo = $request->titulo;
            $noticia->subtitulo = $request->subtitulo;
            $noticia->contenido = $request->contenido;           
    
        
        $noticia->imagen = !empty($path) ? $path : $noticia->imagen;

        $noticia->save();

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $noticia = Noticia::find($id)->delete();

        return redirect()->route('noticias.index')
            ->with('success', 'Noticia deleted successfully');
    }
}
