<?php

namespace App\Repositories\Eloquent;

use App\Models\Episode;
use App\Models\Season;
use App\Repositories\Contracts\EpisodeRepositoryInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EpisodeRepository implements EpisodeRepositoryInterface
{
    protected $episode;
    protected $season;

    public function __construct(Episode $episode, Season $season)
    {
        $this->episode = $episode;
        $this->season = $season;
    }

    public function season()
    {
        return $this->episode->belongsTo($this->season);
    }

    // protected function wactched(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($watched) => (bool)$watched,
    //     );
    // }
}
