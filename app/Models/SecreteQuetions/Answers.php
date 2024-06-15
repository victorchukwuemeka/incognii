<?php

namespace App\Models\SecreteQuetions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SecreteQuetions\Questions;
use App\Models\User;

class Answers extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = [
        'user_id',
        'questions_id',
        'answer'
    ];

    public function question(): BelongsTo
    {
      return $this->belongsTo(Questions::class, 'questions_id');
    }

    /**public function comments(): HasMany
    {
      return $this->hasMany(Comments::class);
    }*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
