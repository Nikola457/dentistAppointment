<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	use HasFactory;

	protected $fillable = [
		'title', 'start', 'end', 'schedule_id', 'description', 'user_id', 'cover_image'
	];

	public function schedules(){
		return $this->hasOne('App\Models\Schedule');
	}
}

?>