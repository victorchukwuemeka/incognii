<?php

namespace App\Models\SecreteQuetions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'parent_id',
        'user_id',
        'answers_id',
        'content'
    ];

    public function answer()
    {
      return $this->belongsTo(Answer::class);
    }

    public function replies()
    {
      return $this->hasMany(Comments::class, 'parent_id');
    }

    public function parentComment()
    {
      return $this->belongsTo(Comments::class, 'parent_id');
    }
}
