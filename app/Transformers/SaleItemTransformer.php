<?php

namespace Mooc\Transformers;

use League\Fractal\TransformerAbstract;
use Mooc\Entities\SaleItem;

/**
 * Class SaleItemTransformer.
 *
 * @package namespace Mooc\Transformers;
 */
class SaleItemTransformer extends TransformerAbstract
{
    /**
     * Transform the SaleItem entity.
     *
     * @param \Mooc\Entities\SaleItem $model
     *
     * @return array
     */
    public function transform(SaleItem $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
