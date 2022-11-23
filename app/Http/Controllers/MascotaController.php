<?php

namespace App\Http\Controllers;

use App\Mascota;
use Illuminate\Http\Request;
use PDF;


/**
 * Class MascotaController
 * @package App\Http\Controllers
 */
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {       
        $this->middleware(['role:admin'])
        ->only('index', 'create', 'show', 'edit', 'update', 'destroy');
    }
    
    
    public function index()
    {
        $mascotas = Mascota::paginate();

        return view('mascota.index', compact('mascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $mascotas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascota = new Mascota();
        return view('mascota.create', compact('mascota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('foto')->store(
            'animales',
            'public'
        );

        request()->validate(Mascota::$rules);

        $mascota = Mascota::create([
            "nombre" => $request->nombre,
            "sexo" => $request->sexo,
            "especie" => $request->especie,
            "raza" => $request->raza,
            "descripcion" => $request->descripcion,
            "tamanio" => $request->tamanio,
            "estado" => $request->estado,
            "foto" => $path
        ]);

        return redirect()->route('mascotas.index')
            ->with('success', '¡Publicación creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);

        return view('mascota.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $mascota = Mascota::find($id);

        return view('mascota.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mascota $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {

        request()->validate(Mascota::$rules);

        if (!empty($request->file('foto'))) {
            $path = $request->file('foto')->store(
                'animales',
                'public'
            );
        }

        request()->validate(Mascota::$rules);

        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->descripcion = $request->descripcion;
        $mascota->tamanio = $request->tamanio;
        $mascota->estado = $request->estado;
        $mascota->foto = !empty($path) ? $path : $mascota->foto;

        $mascota->save();

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mascota = Mascota::find($id)->delete();

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota deleted successfully');
    }

    public function filtro(Request $request)
    {
        if ($request->especie == 'Especie') {
            $request->especie = '';
        }
        if ($request->sexo == 'Sexo') {
            $request->sexo = '';
        }
        if ($request->tamanio == 'Tamaño') {
            $request->tamanio = '';
        }

        $filtro = Mascota::where('especie', 'like', '%' . $request->especie . '%')
            ->where('sexo', 'like', '%' . $request->sexo . '%')
            ->where('tamanio', 'like', '%' . $request->tamanio . '%')
            ->get();

        return response($filtro, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function getAnimales()
    {
        $mascotas = Mascota::all();
        return response(json_encode($mascotas), 200)
            ->header('Content-Type', 'application/json');
    }

    public function pdfAllMascotas()
    {
        $mascotas = Mascota::all();
		$pdf = PDF::loadView('mascota.pdf', compact('mascotas'));
        $pdf->setPaper('A4', 'portrait');
		return $pdf->stream('documento.pdf');
    }

    public function pdfMascota($id)
    {
        $mascota = Mascota::find($id);
		$pdf = PDF::loadView('mascota.u-pdf', compact('mascota'));
        $pdf->setPaper('A4', 'portrait');
		return $pdf->stream('documento.pdf');
    }
}
