<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\SimpleExcel\Adapter;

class ArrayAdapter extends AbstractAdapter
{
    public function getMethods()
    {
        return array(

        );
    }

    /**
     * Loads the data.
     *
     * @param array $data
     *
     * @return $this
     */
    public function read(array $data = array())
    {
        $this->excel->setSheets($data);

        return $this;
    }

    /**
     * Writes the data.
     *
     * @return array
     */
    public function write()
    {
        return $this->excel->getSheets();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'array';
    }
}
