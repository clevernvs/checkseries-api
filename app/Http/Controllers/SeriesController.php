<?php

namespace App\Http\Controllers;

// use App\Http\Middleware\Autenticador;

use App\Events\SeriesCreated;
// use App\Http\Requests\SeriesRequest;
use App\Repositories\Contracts\SeriesRepositoryInterface;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    private $serieRepo;
    private $userAuth;

    public function __construct(SeriesRepositoryInterface $serieRepo, Authenticatable $userAuth)
    {
        $this->serieRepo = $serieRepo;
        $this->userAuth = $userAuth;
    }


    public function index(Request $request)
    {
        // $query = Series::query();
        // if ($request->has('nome')) {
        //     $query->where('nome', $request->nome);
        // }

        // return $query->paginate(5);

        // ===============================================

        // if (!$request->has('nome')) {
        //     return $this->serieRepo->getAll();
        // }

        // // return Series::where('nome', $request->nome)->get();
        // // return Series::whereNome($request->nome)->get();
    }

    // public function store(SeriesRequest $request)
    public function store(Request $request)
    {
        // return response()->json($this->serie->add->($request->all()), 201 );
        dd($request->all());
    }


    // public function show(Series $series)
    public function show(int $serieId)
    {
        // $seriesModel = Series::find($serieId);
        // $seriesModel = Series::with('seasons.episodes')->find($serieId);
        $serie = $this->serieRepo->findWithSeasonsAndEpisodesById($serieId);
        if (is_null($serie)) {
            return response()->json(['message' => 'Serie não encontrada.'], 404);
        }

        return $serie;
    }

    // public function update(SerieRepositoryInterface $serie, SerieRequest $request)
    // public function update(Serie $serie, Request $request)
    public function update()
    {
        // $serie->fill($request->all());
        // $serie->save();

        // return $serie;
    }

    // public function destroy(SerieRepositoryInterface $serie)
    // public function destroy()
    public function destroy(int $serieId, Request $request)
    {
        $this->user->TokenCan('series:delete');
        // Series::destroy($serieId);
        // return response()->noContent();
    }
}
