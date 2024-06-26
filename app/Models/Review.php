<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    public function form()
    {
        return $this->belongsTo(form::class);
    }

    protected static function booted()
    {
        static::updated(fn(Review $review) => cache()->forget('form:' . $review->form_id));
        static::deleted(fn(Review $review) => cache()->forget('form:' . $review->form_id));
    }
}
