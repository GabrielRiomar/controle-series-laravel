<x-layout title="Series">
  <a href="/series/new">Add</a>
  <ul>
    @foreach ($series as $serie)
    <li>{{ $serie }} </li>
    @endforeach
  </ul>
</x-layout>