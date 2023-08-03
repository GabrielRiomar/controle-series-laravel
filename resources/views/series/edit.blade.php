<x-layout title="Edit Series {{ $series->name }}">
  <x-series.form :action="route('series.update', $series->id)" :name="$series->name" :seasonsQty="$seasons->number" :episodesPerSeason="$episodes->number" :update="true" />
</x-layout>