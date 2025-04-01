<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class ProposedSaleLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'proposed_sale_id',
        'user_id_create',
        'user_id_edit',
        'obs'
    ];

    /**
     * Events
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){ // Insert
            $model->user_id_edit = User::first()->id; #Auth::id(); # Para usuário autenticado
            return $model;
        });

    }

    public function userCreate(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id_create');
    }

    public function userEdit(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id_edit');
    }

    public function proposedSale(): HasOne
    {
        return $this->hasOne(Status::class,'id','proposed_sale_id');
    }
}
