@extends('dashboard.main')


@section('container')

<fieldset disabled>
    <legend class="mt-3">View Account Information</legend>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Name</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ auth()->user()->name }}">
    </div>
    <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Email</label>
        <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" value="{{ auth()->user()->email }}">
      </div>
</fieldset>

@endsection
