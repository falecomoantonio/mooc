<?php

namespace Mooc\Transformers;

use League\Fractal\TransformerAbstract;
use Mooc\Entities\Sku;

/**
 * Class SkuTransformer.
 *
 * @package namespace Mooc\Transformers;
 */
class SkuTransformer extends TransformerAbstract
{
    /**
     * Transform the Sku entity.
     *
     * @param \Mooc\Entities\Sku $model
     *
     * @return array
     */
    public function transform(Sku $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
