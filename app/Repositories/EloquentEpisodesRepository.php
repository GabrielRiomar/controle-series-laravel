<?php

namespace App\Repositories;

use App\Models\Season;
use App\Models\Episodes;
use Illuminate\Support\Facades\DB;

class EloquentEpisodesRepository implements EpisodesRepository
{
  public function watchUpdate(Season $season, array $watchedEpisodes)
  {
    $episodeIds = $season->episodes->pluck('id')->toArray();

    $unwatchedEpisodeIds = array_diff($episodeIds, $watchedEpisodes);

    DB::transaction(function () use ($watchedEpisodes, $unwatchedEpisodeIds) {
      DB::table('episodes')->whereIn('id', $watchedEpisodes)->update(['watched' => true]);
      DB::table('episodes')->whereIn('id', $unwatchedEpisodeIds)->update(['watched' => false]);
    });
  }
}
