@extends('layouts.app')

@section('content')
<h1 class="mb-10 text-2x1">Most Popular Documents</h1>

<form method="GET" action="{{ route('forms.index') }}" class="mb-4 flex items-center space-x-2">
  <input type="text" name="name" placeholder="Search by form"
    value="{{ request('name') }}" class="input h-10" />
  <input type="hidden" name="filter" value="{{ request('filter') }}" />
  <button type="submit" class="btn h-10">Search</button>
  <a href="{{ route('forms.index') }}" class="btn h-10">Clear</a>
</form>

<div class="filter-container mb-4 flex">
  @php
    $filters = [
    '' => 'Latest',
    'popular_last_month' => 'Popular Now',
    'popular_last_6months' => 'Most Downloaded',
    'highest_rated_last_month' => 'Highest Rated ',
    'highest_rated_last_6months' => 'Most Comments'
    ];
  @endphp

  @foreach ($filters as $key => $label)
    <a href="{{ route('forms.index', [...request()->query(), 'filter' => $key]) }}" 
    class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">
      {{ $label }}
    </a>
  @endforeach

</div>

<ul>
  @forelse ($forms as $form)
  <li class="mb-4">
  <div class="form-item">
    <div
      class="flex flex-wrap items-center justify-between">
      <div class="w-full flex-grow sm:w-auto">
        <a href="{{ route('forms.show', $form)}}" class="form-name">{{ $form->name }}</a>
        <span class="form-author">Stars: (#) | Ratings: (#) | Downloads: (#) </span>
      </div>
      <div>
        <div class="form-rating">
          {{ number_format($form->reviews_avg_rating, 1) }}
        </div>
        <div class="form-review-count">
          out of {{ $form->reviews_count }} {{ Str::plural('review', $form->reviews_count )}}
        </div>
      </div>
    </div>
  </div>
</li>
  @empty
    <li class="mb-4">
      <div class="empty-form-item">
        <p class="empty-text">No forms found</p>
        <a href="{{ route('forms.index') }}" class="reset-link">Reset criteria</a>
      </div>
    </li>
  @endforelse
</ul>
@endsection