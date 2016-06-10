<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\SimpleExcel;

use Endroid\SimpleExcel\Adapter\AbstractAdapter;
use Endroid\SimpleExcel\Adapter\ArrayAdapter;
use Endroid\SimpleExcel\Adapter\FileAdapter;

class SimpleExcel
{
    /**
     * @var array
     */
    protected $sheets;

    /**
     * @var AbstractAdapter[]
     */
    protected $adapters;

    /**
     * Creates a new instance.
     */
    public function __construct()
    {
        $this->sheets = array();
        $this->adapters = array();

        $this->createDefaultAdapters();
    }

    /**
     * Creates the default adapters.
     */
    protected function createDefaultAdapters()
    {
        new ArrayAdapter($this);
        new FileAdapter($this);
    }

    /**
     * Adds an adapter.
     *
     * @param AbstractAdapter $adapter
     *
     * @return $this
     */
    public function setAdapter(AbstractAdapter $adapter)
    {
        $this->adapters[$adapter->getName()] = $adapter;

        return $this;
    }

    /**
     * Returns the adapter with the given name.
     *
     * @param $name
     *
     * @return AbstractAdapter
     */
    public function getAdapter($name)
    {
        return $this->adapters[$name];
    }

    /**
     * Sets the sheets.
     *
     * @param array $sheets
     *
     * @return $this
     */
    public function setSheets(array $sheets = array())
    {
        foreach ($sheets as $sheetName => $sheetData) {
            $this->setSheet($sheetName, $sheetData);
        }

        return $this;
    }

    /**
     * Creates or updates a sheet.
     *
     * @param $sheetName
     * @param array $sheetData
     *
     * @return $this
     */
    public function setSheet($sheetName, array $sheetData = array())
    {
        $this->sheets[$sheetName] = $sheetData;

        return $this;
    }

    /**
     * Returns all sheets.
     *
     * @return array
     */
    public function getSheets()
    {
        return $this->sheets;
    }
}
