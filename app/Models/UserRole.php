<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\Activitylog\Models\Concerns\HasActivity;


class UserRole extends Model
{
    use HasFactory,HasApiTokens, HasActivity;
    protected $fillable = ['name', 'description'];
   
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Define the activity log options for this module
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()              // Logs all fillable attributes automatically
            ->logOnlyDirty()        // For updates, only save fields that actually changed
            ->useLogName('User Role Management'); // This acts as your 'module' field
    }

}
