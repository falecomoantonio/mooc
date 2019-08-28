<?php

namespace Mooc\Transformers;

use League\Fractal\TransformerAbstract;
use Mooc\Entities\Pay;

/**
 * Class PayTransformer.
 *
 * @package namespace Mooc\Transformers;
 */
class PayTransformer extends TransformerAbstract
{
    /**
     * Transform the Pay entity.
     *
     * @param \Mooc\Entities\Pay $model
     *
     * @return array
     */
    public function transform(Pay $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
