<?php

namespace Mooc\Presenters;

use Mooc\Transformers\UtilityClassTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UtilityClassPresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class UtilityClassPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UtilityClassTransformer();
    }
}
