<?php

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\SimpleExcel\Adapter;

use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Exception;

class FileAdapter extends AbstractAdapter
{
    /**
     * Loads the data.
     *
     * @param $filename
     *
     * @throws Exception
     * @throws \Box\Spout\Common\Exception\UnsupportedTypeException
     */
    public function load($filename)
    {
        $type = $this->getType($filename);
        $reader = ReaderFactory::create($type);
        $reader->open($filename);

//        $sheets = array();
//
//        die('f');
//
//        /** @var Sheet $sheet */
//        foreach ($reader->getSheetIterator() as $sheet) {
//            dump($sheet);
//            die;
//            $columnNames = array();
//            $sheets[$sheet->getName()] = array();
//            foreach ($sheet->getRowIterator() as $rowNumber => $row) {
//                if (count($columnNames) == 0) {
//                    if ($row[0] == '') {
//                        continue;
//                    } else {
//                        $columnNames = $row;
//                    }
//                } else {
//                    foreach ($row as $key => $value) {
//                        $this->sheets[$sheet->getName()][] = array_combine($columnNames, $row);
//                    }
//                }
//            }
//        }
//
//        var_dump($this->sheets);
//        die;
//
//        die;
//
//        parent::load($data, $sheetNames);
    }

    /**
     * {@inheritdoc}
     */
    public function save($filename)
    {
        $type = $this->getType($filename);
        $writer = WriterFactory::create($type);
        $writer->openToFile($filename);
    }

    /**
     * Returns the file type.
     *
     * @param $filename
     *
     * @return mixed
     *
     * @throws Exception
     */
    protected function getType($filename)
    {
        $types = $this->getAvailableTypes();
        $extension = strtolower(substr(strrchr($filename, '.'), 1));

        if (!isset($types[$extension])) {
            throw new Exception(sprintf('No writer defined for file extension "%s"', $extension));
        }

        return $types[$extension];
    }

    /**
     * Returns the available types.
     *
     * @return array
     */
    protected function getAvailableTypes()
    {
        return array(
            'csv' => Type::CSV,
            'xls' => Type::XLSX,
            'xlsx' => Type::XLSX,
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'file';
    }
}
