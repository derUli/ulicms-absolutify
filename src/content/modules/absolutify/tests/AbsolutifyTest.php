<?php

use PHPUnit\Framework\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class AbsolutifyTest extends TestCase {
    use MatchesSnapshots;

    public function testAbsolutify() {
        $inputHtml = trim(file_get_contents(ModuleHelper::buildModuleRessourcePath("absolutify", "tests/fixtures/input.html")));

        // file_put_contents(ModuleHelper::buildModuleRessourcePath("absolutify", "tests/fixtures/expected.html"), absolutify($inputHtml, "https://www.ulicms.de"));

        $outputHtml = \absolutify($inputHtml, "https://www.ulicms.de");
        $this->assertMatchesHtmlSnapshot($inputHtml);
    }

}

?>