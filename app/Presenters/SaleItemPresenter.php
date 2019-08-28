<?php

namespace Mooc\Presenters;

use Mooc\Transformers\SaleItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SaleItemPresenter.
 *
 * @package namespace Mooc\Presenters;
 */
class SaleItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SaleItemTransformer();
    }
}
