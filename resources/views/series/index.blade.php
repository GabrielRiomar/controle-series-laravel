<x-layout title="Series">
  <a href="{{ route('series.create') }}" class="btn btn-success mb-2">
    Add
  </a>

  @isset($deleteMessage)
  <div class="alert alert-danger">
    {{$deleteMessage}}
  </div>
  @endisset

  @isset($addMessage)
  <div class="alert alert-success">
    {{$addMessage}}
  </div>
  @endisset

  <ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-content-center">
      {{ $serie->name }}

      <span class='d-flex'>
        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-dark btn-sm">Edit</a>
        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">Delete</button>
        </form>
      </span>
    </li>
    @endforeach
  </ul>
</x-layout>