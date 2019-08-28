<?php

namespace Mooc\Transformers;

use League\Fractal\TransformerAbstract;
use Mooc\Entities\RegistrationCourse;

/**
 * Class RegistrationCourseTransformer.
 *
 * @package namespace Mooc\Transformers;
 */
class RegistrationCourseTransformer extends TransformerAbstract
{
    /**
     * Transform the RegistrationCourse entity.
     *
     * @param \Mooc\Entities\RegistrationCourse $model
     *
     * @return array
     */
    public function transform(RegistrationCourse $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
