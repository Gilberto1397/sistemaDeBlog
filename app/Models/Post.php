<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 * @property integer $id
 * @property integer $users_id
 * @property string $title
 * @property string $postContent
 * @property string $imagePath
 * @property DateTime $createdDate
 * @property DateTime $createdTime
 */
class Post extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function comments()
    {
        return $this->hasMany(Comment::class, 'postId', 'id');
    }
}
