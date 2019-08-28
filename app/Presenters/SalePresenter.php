<?php

namespace Mooc\Presenters;

use Mooc\Transformers\SaleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SalePresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class SalePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SaleTransformer();
    }
}
