<?php

namespace Mooc\Transformers;

use League\Fractal\TransformerAbstract;
use Mooc\Entities\UtilityClass;

/**
 * Class UtilityClassTransformer.
 *
 * @package namespace Mooc\Transformers;
 */
class UtilityClassTransformer extends TransformerAbstract
{
    /**
     * Transform the UtilityClass entity.
     *
     * @param \Mooc\Entities\UtilityClass $model
     *
     * @return array
     */
    public function transform(UtilityClass $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
