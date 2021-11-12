<?php

namespace App\Models\Task;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
