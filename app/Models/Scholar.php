<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Scholar extends Authenticatable
{
    use HasFactory;

      protected $guarded = ['scholarId'];
      protected $primaryKey = 'scholarId';
	  protected $hidden = ['scholarPassword','remember_token'];

     public function applications()
    {
        return $this->hasMany(Application::class);
    }

}

