<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'status'
    ];

    protected $guarded = [];

    protected $primaryKey ='user_id';
    //protected $table = 'customers'; // tablename and file name mismatch

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        //'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //accessor

    // public function getDateOfBirthAttribute($value) { // date_of_birth
    //     return date('d-M-Y',strtotime($value));
    // }

    //append
    public function getDateOfBirthFormattedAttribute() { // date_of_birth_formatted
        return date('d-M-Y',strtotime($this->date_of_birth));
    }

    //mutator
    public function setDateOfBirthAttribute($value) { 
        return $this->attributes['date_of_birth'] = date('Y-m-d',strtotime($value));
    }

    public function getStatusTextAttribute(){
        if($this->status == 1) return "Active";
        else return "Inactive";
    }

    protected $appends = ['date_of_birth_formatted', 'status_text'];

    protected $dates = ['date_of_birth']; //// carbon date object

    public function scopeActive($query) {
        return $query->where('status',1);

    }

    public function address(){
        return $this->hasOne(UserAddress::class,'user_id','user_id');
    }
}
