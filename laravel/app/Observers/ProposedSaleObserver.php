<?php

namespace App\Observers;

use App\Models\ProposedSale;
use App\Models\ProposedSaleLog;

/**
 * Registra o log
 */
class ProposedSaleObserver
{
    /**
     * Handle the ProposedSale "created" event.
     */
    public function created(ProposedSale $proposedSale): void
    {
        //
    }

    /**
     * Handle the ProposedSale "updated" event.
     */
    public function updated(ProposedSale $proposedSale): void
    {
        ProposedSaleLog::create([
            'proposed_sale_id' => $proposedSale->id,
            'user_id_create' => $proposedSale->user_id_create,
            'obs' => $proposedSale->obs
        ]);
    }

    /**
     * Handle the ProposedSale "deleted" event.
     */
    public function deleted(ProposedSale $proposedSale): void
    {
        //
    }

    /**
     * Handle the ProposedSale "restored" event.
     */
    public function restored(ProposedSale $proposedSale): void
    {
        //
    }

    /**
     * Handle the ProposedSale "force deleted" event.
     */
    public function forceDeleted(ProposedSale $proposedSale): void
    {
        //
    }
}
