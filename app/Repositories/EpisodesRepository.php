<?php

namespace App\Repositories;

use App\Models\Episodes;
use App\Models\Season;

interface EpisodesRepository
{
  public function watchUpdate(Season $season, array $watchedEpisodes);
}
