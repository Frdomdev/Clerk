<?php namespace Maatwebsite\Clerk\Adapters\PHPExcel;

use Closure;
use PHPExcel;
use Maatwebsite\Clerk\Adapters\Workbook as AbstractWorkbook;
use Maatwebsite\Clerk\Traits\CallableTrait;
use Maatwebsite\Clerk\Workbook as WorkbookInterface;

/**
 * Class Workbook
 * @package Maatwebsite\Clerk\Adapters\PHPExcel
 */
class Workbook extends AbstractWorkbook implements WorkbookInterface {

    /**
     * Traits
     */
    use CallableTrait;

    /**
     * @var PHPExcel
     */
    protected $driver;

    /**
     * @var string
     */
    protected $lineEnding;

    /**
     * @var string
     */

    protected $delimiter;

    /**
     * @var string
     */
    protected $enclosure;

    /**
     * @var string
     */
    protected $encoding;

    /**
     * @param          $title
     * @param callable $callback
     * @param PHPExcel $driver
     */
    public function __construct($title, Closure $callback = null, PHPExcel $driver = null)
    {
        // Set PHPExcel instance
        $this->driver = $driver ?: new PHPExcel();
        $this->driver->disconnectWorksheets();

        // Set defaults
        $this->setDefaults();

        // Set workbook title
        $this->setTitle($title);

        // Make a callback on the workbook
        $this->call($callback);
    }

    /**
     * Get the workbook title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->driver->getProperties()->getTitle();
    }

    /**
     * Set the workbook title
     * @param mixed $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->driver->getProperties()->setTitle($title);

        return $this;
    }


    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->driver->getProperties()->setDescription($description);

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->driver->getProperties()->getDescription();
    }

    /**
     * @param $company
     * @return $this
     */
    public function setCompany($company)
    {
        $this->driver->getProperties()->setCompany($company);

        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->driver->getProperties()->getCompany();
    }

    /**
     * @param $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->driver->getProperties()->setSubject($subject);

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->driver->getProperties()->getSubject();
    }

    /**
     * Set the delimiter
     * @param $delimiter
     * @return $this
     */
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    /**
     * Get the delimiter
     * @return mixed
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }

    /**
     * Set line ending
     * @param $lineEnding
     * @return $this
     */
    public function setLineEnding($lineEnding)
    {
        $this->lineEnding = $lineEnding;

        return $this;
    }

    /**
     * Set enclosure
     * @param $enclosure
     * @return $this
     */
    public function setEnclosure($enclosure)
    {
        $this->enclosure = $enclosure;

        return $this;
    }

    /**
     * Set encoding
     * @param $encoding
     * @return $this
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLineEnding()
    {
        return $this->lineEnding;
    }

    /**
     * @return mixed
     */
    public function getEnclosure()
    {
        return $this->enclosure;
    }

    /**
     * Init a new sheet
     * @param          $title
     * @param callable $callback
     * @return Sheet
     */
    public function sheet($title, Closure $callback = null)
    {
        // Init a new sheet
        $sheet = new Sheet(
            $this,
            $title
        );

        // Preform callback on the sheet
        $sheet->call($callback);

        // Add the sheet to the collection
        $this->addSheet($sheet);

        return $sheet;
    }
}