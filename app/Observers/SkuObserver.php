<?php

namespace Mooc\Observers;

use Illuminate\Support\Facades\DB;
use Mooc\Entities\Sku;
use Mooc\Enums\SkuStatus;

class SkuObserver
{
    /**
     * Handle the sku "created" event.
     *
     * @param  \Mooc\Mooc\Entities\Sku  $sku
     * @return void
     */
    public function created(Sku $sku)
    {
        try {
            DB::table('skus')->where('id','<>',$sku->id)->update(['status'=>SkuStatus::INACTIVE]);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }

    /**
     * Handle the sku "updated" event.
     *
     * @param  \Mooc\Mooc\Entities\Sku  $sku
     * @return void
     */
    public function updated(Sku $sku)
    {
        //
    }

    /**
     * Handle the sku "deleted" event.
     *
     * @param  \Mooc\Mooc\Entities\Sku  $sku
     * @return void
     */
    public function deleted(Sku $sku)
    {
        //
    }

    /**
     * Handle the sku "restored" event.
     *
     * @param  \Mooc\Mooc\Entities\Sku  $sku
     * @return void
     */
    public function restored(Sku $sku)
    {
        //
    }

    /**
     * Handle the sku "force deleted" event.
     *
     * @param  \Mooc\Mooc\Entities\Sku  $sku
     * @return void
     */
    public function forceDeleted(Sku $sku)
    {
        //
    }
}
