<?php

namespace Mooc\Presenters;

use Mooc\Transformers\SkuTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SkuPresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class SkuPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SkuTransformer();
    }
}
