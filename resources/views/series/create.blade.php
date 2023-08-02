<x-layout title="New Series">
  <x-series.form :action="route('series.store')" />
  <!-- <form action="{{ route('series.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <button type="button" class="btn btn-danger" onclick="history.back()">Back</button>
  </form> -->
</x-layout>