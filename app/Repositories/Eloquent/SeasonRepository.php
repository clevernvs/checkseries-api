<?php

namespace App\Repositories\Eloquent;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\Contracts\SeasonRepositoryInterface;

class SeasonRepository implements SeasonRepositoryInterface
{
    protected $season;
    protected $episode;
    protected $serie;

    public function __construct(Season $season, Episode $episode, Series $serie)
    {
        $this->season = $season;
        $this->episode = $episode;
        $this->serie = $serie;
    }

    public function series()
    {
        return $this->season->belongsTo($this->serie);
    }

    public function episodes()
    {
        return $this->season->hasMany($this->episode);
        // return $this->hasMany(Episode::class);
    }

    public function numberOfWatchedEpisodes(): int
    {
        return $this->episodes
            ->filter(fn ($episode) => $episode->watched)
            ->count();
    }
}
