<?php namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model {
    use SoftDeletes, HasFactory;
    // 1:n protected $fillable = ['title', 'year', 'description', 'category_id'];
    protected $fillable = ['name', 'email', 'job_title', 'country_id', 'city_id'];



    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
