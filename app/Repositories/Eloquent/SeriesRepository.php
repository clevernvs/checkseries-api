<?php

namespace App\Repositories\Eloquent;

use App\Http\Requests\SeriesRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use App\Repositories\Contracts\SeriesRepositoryInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SeriesRepository implements SeriesRepositoryInterface
{
    protected $serie;
    protected $season;
    protected $episode;

    public function __construct(Series $serie, Season $season, Episode $episode)
    {
        $this->serie = $serie;
        $this->season = $season;
        $this->episode = $episode;
    }

    public function getAll()
    {
        return $this->serie->all();
    }

    public function add(Request $request)
    {
        return DB::transaction(function () use ($request, &$serie) {

            $serie = $this->serie->create([
                'nome' => $request->nome,
                'cover' => $request->coverPath,
            ]);

            $seasons = [];
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i
                ];
            }
            // Season::insert($seasons);
            $this->season->insert($seasons);


            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j
                    ];
                }
            }
            // Episode::insert($episodes);
            $this->episode->insert($episodes);

            return $serie;
        });
    }

    public function removeById($serieId)
    {
        $serie = $this->serie->find($serieId);
        $serie->delete();

        // return $this->serie->delete();
    }

    public function updateById($serieId, $request)
    {
        $serie = $this->serie->find($serieId);
        $serie->fill($request->all());
        $serie->save();

        // return $this->serie->create();
    }

    public function seasons()
    {
        return $this->serie->hasMany($this->season, 'series_id');
        // return $this->hasMany(Season::class, 'series_id');
    }

    public function findWithSeasonsAndEpisodesById($serieId)
    {
        // return Series::with('seasons.episodes')->find($id);
        return $this->serie->with('seasons.episodes')->find($serieId);
    }

    public function findAllEpisodes()
    {
        return $this->serie->hasManyThrough($this->episodes, $this->season);
    }

    // protected static function booted()
    // {
    //     self::addGlobalScope('ordered', function (Builder $queryBuilder) {
    //         $queryBuilder->orderBy('nome');
    //     });
    // }

    public function links(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "api/series/{$this->id}",
                ],
                [
                    'rel' => 'seasons',
                    'url' => "api/series/{$this->id}/seasons",
                ],
                [
                    'rel' => 'episodes',
                    'url' => "api/series/{$this->id}/episodes",
                ],
            ],
        );
    }

}
