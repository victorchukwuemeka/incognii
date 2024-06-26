<?php

namespace App\Models\SecreteQuetions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SecreteQuetions\Answers;
use App\Models\User;



class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'user_id',
        'your_question',
    ];

    public function answers(): HasMany
    {
      return $this->hasMany(Answers::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
