<?php

namespace App\Models\SecreteQuetions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Answers extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'user_id',
        'questions_id',
        'answer'
    ];

    public function question()
    {
      return $this->belongsTo(Question::class);
    }

    public function comments(): HasMany
    {
      return $this->hasMany(Comments::class);
    }
}
