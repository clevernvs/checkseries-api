<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\SeriesRequest;
// use App\Models\Series;
// use App\Models\Season;
// use App\Models\Episode;
use Illuminate\Http\Request;

interface SeriesRepositoryInterface
{
    // public function __construct(Series $serie, Season $season, Episode $episode);
    public function getAll();
    public function add(Request $request);
    public function removeById($serieId);
    public function updateById($serieId, $request);
    public function seasons();
    public function findWithSeasonsAndEpisodesById($serieId);
    public function findAllEpisodes();
}
