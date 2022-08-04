<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\SeriesRepositoryInterface;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    protected $serie;

    public function __construct(SeriesRepositoryInterface $serie)
    {
        $this->serie = $serie;
    }

    public function index(SeriesRepositoryInterface $serie)
    {
        $seasons = $serie->seasons()->with('episodes')->get();

        return view('seasons.index')
            ->with('seasons', $seasons)
            ->with('series', $serie);
    }

    public function findAllSeasonsBySerie()
    {
        return $this->serie->seasons;
    }
}
