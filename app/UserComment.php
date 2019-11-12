<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;
class UserComment extends Model
{
	protected $fillable = [
        'user_id', 'comment'
    ];
}