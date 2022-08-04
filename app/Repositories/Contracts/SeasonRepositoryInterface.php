<?php

namespace App\Repositories\Contracts;

interface SeasonRepositoryInterface
{
    // public function series();
    public function episodes();
    public function numberOfWatchedEpisodes(): int;
}
