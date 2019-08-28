<?php

namespace Mooc\Presenters;

use Mooc\Transformers\RegistrationCourseTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RegistrationCoursePresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class RegistrationCoursePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RegistrationCourseTransformer();
    }
}
