<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 * @property integer $id
 * @property integer $userId
 * @property integer $postId
 * @property string $comment
 */
class Comment extends Model
{
    use HasFactory;
    public $timestamps = false;
}
