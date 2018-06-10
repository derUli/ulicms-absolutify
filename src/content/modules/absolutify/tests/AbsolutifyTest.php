<?php
use PHPUnit\Framework\TestCase;

class AbsolutifyTest extends TestCase
{

    public function testAbsolutify()
    {
        $inputHtml = trim(file_get_contents(ModuleHelper::buildModuleRessourcePath("absolutify", "tests/fixtures/input.html")));
        $expectedHtml = trim(file_get_contents(ModuleHelper::buildModuleRessourcePath("absolutify", "tests/fixtures/expected.html")));
        
        // file_put_contents(ModuleHelper::buildModuleRessourcePath("absolutify", "tests/fixtures/expected.html"), absolutify($inputHtml, "https://www.ulicms.de"));
        
        $outputHtml = \absolutify($inputHtml, "https://www.ulicms.de");
        $this->assertEquals($expectedHtml, $outputHtml);
    }
}
?>