<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\SimpleExcel\Adapter;

use Endroid\SimpleExcel\SimpleExcel;

abstract class AbstractAdapter
{
    /**
     * @var SimpleExcel
     */
    protected $excel;

    /**
     * Creates a new instance.
     *
     * @param SimpleExcel $excel
     */
    public function __construct(SimpleExcel $excel)
    {
        $this->excel = $excel;
        $this->excel->setAdapter($this);
    }

    /**
     * Returns the name of this adapter.
     *
     * @return string
     */
    abstract public function getName();
}
