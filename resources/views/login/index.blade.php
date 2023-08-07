<x-layout title="Login">
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>

    <button class="btn btn-primary mt-3">
      Sign In
    </button>
    <a href="{{ route('users.create') }}" class="btn btn-success mt-3">
      Register
    </a>
  </form>
</x-layout>