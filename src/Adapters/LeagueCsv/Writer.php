<?php namespace Maatwebsite\Clerk\Adapters\LeagueCsv;

use Maatwebsite\Clerk\Writer as WriterInterface;
use Maatwebsite\Clerk\Workbook as WorkbookInterface;
use Maatwebsite\Clerk\Adapters\Writer as AbstractWriter;

/**
 * Class Writer
 * @package Maatwebsite\Clerk\Adapters\LeagueCsv
 */
class Writer extends AbstractWriter implements WriterInterface {

    /**
     * @var string
     */
    protected $extension;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var WorkbookInterface
     */
    protected $workbook;

    /**
     * @param                   $type
     * @param                   $extension
     * @param WorkbookInterface $workbook
     */
    public function __construct($type, $extension, WorkbookInterface $workbook)
    {
        $this->extension = $extension;
        $this->type = $type;
        $this->workbook = $workbook;
    }

    /**
     * @param null $filename
     * @return mixed
     * @throws \Exception
     */
    public function export($filename = null)
    {
        $filename = $this->getFilename($filename);

        $workbook = $this->workbook->getDriver();

        $workbook->output($filename . '.' . $this->extension);

        exit;
    }
}