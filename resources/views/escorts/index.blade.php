@extends('layouts.app')

@section('content')
<h1 class="mb-10 text-2x1">Escorts</h1>

<form method="GET" action="{{ route('escorts.index') }}" class="mb-4 flex items-center space-x-2">
  <input type="text" name="name" placeholder="Search by name"
    value="{{ request('name') }}" class="input h-10" />
  <button type="submit" class="btn h-10">Search</button>
  <a href="{{ route('escorts.index') }}" class="btn h-10">Clear</a>
</form>

<ul>
  @forelse ($escorts as $escort)
  <li class="mb-4">
  <div class="escort-item">
    <div
      class="flex flex-wrap items-center justify-between">
      <div class="w-full flex-grow sm:w-auto">
        <a href="{{ route('escorts.show', $escort)}}" class="escort-name">{{ $escort->name }}</a>
        <span class="escort-author">latest review by user</span>
      </div>
      <div>
        <div class="escort-rating">
          {{ number_format($escort->reviews_avg_rating, 1) }}
        </div>
        <div class="escort-review-count">
          out of {{ $escort->reviews_count }} {{ Str::plural('review', $escort->reviews_count )}}
        </div>
      </div>
    </div>
  </div>
</li>
  @empty
    <li class="mb-4">
      <div class="empty-escort-item">
        <p class="empty-text">No escorts found</p>
        <a href="{{ route('escorts.index') }}" class="reset-link">Reset criteria</a>
      </div>
    </li>
  @endforelse
</ul>
@endsection