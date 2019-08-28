<?php

namespace Mooc\Presenters;

use Mooc\Transformers\CourseTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CoursePresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class CoursePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CourseTransformer();
    }
}
