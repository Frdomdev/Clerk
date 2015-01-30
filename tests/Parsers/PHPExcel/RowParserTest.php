<?php namespace Maatwebsite\Clerk\Tests\Parsers\PHPExcel;

use Maatwebsite\Clerk\Adapters\ParserSettings;
use Maatwebsite\Clerk\Adapters\PHPExcel\Parsers\RowParser;

class RowParserTest extends \PHPUnit_Framework_TestCase {


    public function test_parse()
    {
        $settings = new ParserSettings();
        $parser = new RowParser($settings);

        $parsed = $parser->parse($this->mockRow());

        $this->assertInstanceOf('Maatwebsite\Clerk\Collections\CellCollection', $parsed);
        $this->assertInstanceOf('Maatwebsite\Clerk\Adapters\PHPExcel\Cell', $parsed->first());
        $this->assertCount(3, $parsed);
    }


    /**
     * @return \PHPExcel
     */
    protected function mockRow()
    {
        $workbook = new \PHPExcel();
        $workbook->disconnectWorksheets();
        $sheet = new \PHPExcel_Worksheet($workbook);
        $sheet->fromArray([
            ['a1', 'b1', 'c1']
        ]);

        $row = new \PHPExcel_Worksheet_Row($sheet, 1);

        return $row;
    }
}