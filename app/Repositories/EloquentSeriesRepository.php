<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFromRequest;
use App\Models\Episodes;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
  public function add(SeriesFromRequest $request): Series
  {
    return DB::transaction(function () use ($request) {
      $series = Series::create($request->all());

      $seasons = [];

      for ($i = 1; $i <= $request->seasonsQty; $i++) {
        $seasons[] = [
          'series_id' => $series->id,
          'number' => $i,
        ];
      }
      Season::insert($seasons);

      $episodes = [];
      foreach ($series->seasons as $season) {
        for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
          $episodes[] = [
            'seasons_id' => $season->id,
            'number' => $j,
          ];
        }
      }
      Episodes::insert($episodes);

      return $series;
    });
  }
}
