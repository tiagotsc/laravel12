<?php

namespace App\Models;

use App\Observers\ProposedSaleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

#[ObservedBy([ProposedSaleObserver::class])]
class ProposedSale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'item_sold',
        'price',
        'end_date',
        'status_id',
        'user_id_create',
        'obs'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $casts = [
        'end_date' => 'date'
    ];

    /**
     * Events
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function($model){ // Insert
            $model->user_id_create = User::first()->id; #Auth::id(); # Para usuário autenticado
            $model->price = str_replace(',','.',str_replace('.','',$model->price));
            $model->status_id = Status::where([['name','Aberto'],['status','A']])->first()->id;
            return $model;
        });

        self::updating(function($model){
            return $model;
        });

        self::retrieved(function($model){ // Select
            return $model;
        });

    }

    public function status(): HasOne
    {
        return $this->hasOne(Status::class,'id','status_id');
    }
}
