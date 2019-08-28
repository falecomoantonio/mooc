<?php

namespace Mooc\Transformers;

use League\Fractal\TransformerAbstract;
use Mooc\Entities\Course;

/**
 * Class CourseTransformer.
 *
 * @package namespace Mooc\Transformers;
 */
class CourseTransformer extends TransformerAbstract
{
    /**
     * Transform the Course entity.
     *
     * @param \Mooc\Entities\Course $model
     *
     * @return array
     */
    public function transform(Course $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
