<?php

namespace App\Http\Controllers;

use App\Adopcione;
use Illuminate\Http\Request;
use PDF;


/**
 * Class AdopcioneController
 * @package App\Http\Controllers
 */
class AdopcioneController extends Controller
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
        $adopciones = Adopcione::paginate();

        return view('adopcione.index', compact('adopciones'))
            ->with('i', (request()->input('page', 1) - 1) * $adopciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adopcione = new Adopcione();
        return view('adopcione.create', compact('adopcione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Adopcione::$rules);

        $adopcione = Adopcione::create($request->all());

        return response('Agregado correctamente', 200)
                  ->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adopcione = Adopcione::find($id);

        return view('adopcione.show', compact('adopcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adopcione = Adopcione::find($id);

        return view('adopcione.edit', compact('adopcione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Adopcione $adopcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adopcione $adopcione)
    {
        request()->validate(Adopcione::$rules);

        $adopcione->update($request->all());

        return redirect()->route('adopciones.index')
            ->with('success', 'Adopción Exitosa');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $adopcione = Adopcione::find($id)->delete();

        return redirect()->route('adopciones.index')
            ->with('success', 'Adopcione deleted successfully');
    }

    public function pdfAllAdopciones()
    {
        $adopciones = Adopcione::all();
		$pdf = PDF::loadView('adopcione.pdf', compact('adopciones'));
        $pdf->setPaper('A4', 'portrait');
		return $pdf->stream('documento.pdf');
    }

    public function pdfAdopcion($id)
    {
        $adopcione = Adopcione::find($id);
		$pdf = PDF::loadView('adopcione.u-pdf', compact('adopcione'));
        $pdf->setPaper('A4', 'portrait');
		return $pdf->stream('documento.pdf');
    }
}
