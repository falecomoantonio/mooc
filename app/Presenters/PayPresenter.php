<?php

namespace Mooc\Presenters;

use Mooc\Transformers\PayTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PayPresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class PayPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PayTransformer();
    }
}
