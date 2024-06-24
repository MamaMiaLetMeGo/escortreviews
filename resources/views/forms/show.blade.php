@extends('layouts.app')

@section('content')
  <div class="mb-4">
    <h1 class="mb-2 text-2xl">{{ $form->name }}</h1>

    <div class="form-info">
      <div class="form-author mb-4 text-lg font-semibold">by {{ $form->author }}</div>
      <div class="form-rating flex items-center">
        <div class="mr-2 text-sm font-medium text-slate-700">
          {{ number_format($form->reviews_avg_rating, 1) }}
        </div>
        <span class="form-review-count text-sm text-gray-500">
          {{ $form->reviews_count }} {{ Str::plural('review', $form->reviews_count) }}
        </span>
      </div>
    </div>
  </div>

  <div>
    <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
    <ul>
      @forelse ($form->reviews as $review)
        <li class="form-item mb-4">
          <div>
            <div class="mb-2 flex items-center justify-between">
              <div class="font-semibold">{{ $review->rating }}</div>
              <div class="form-review-count">
                {{ $review->created_at->format('M j, Y') }}</div>
            </div>
            <p class="text-gray-700">{{ $review->review }}</p>
          </div>
        </li>
      @empty
        <li class="mb-4">
          <div class="empty-form-item">
            <p class="empty-text text-lg font-semibold">No reviews yet</p>
          </div>
        </li>
      @endforelse
    </ul>
  </div>
@endsection