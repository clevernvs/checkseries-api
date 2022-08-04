<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\EpisodeRepositoryInterface;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    protected $episode;

    public function __construct(EpisodeRepositoryInterface $episode)
    {
        $this->episode = $episode;
    }

    public function findAllEpisodesBySerie()
    {
    }

    public function watched(Request $request)
    {
        // $this->episode->watched = $request->watched;
        // $episode->save();
        // return $episode;
    }
}
