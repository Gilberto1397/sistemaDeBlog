<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App\Models
 * @property integer $id
 * @property integer $users_id
 * @property string $content
 * @property string $image
 * @property DateTime $created
 */
class Post extends Model
{
    use HasFactory;
}
