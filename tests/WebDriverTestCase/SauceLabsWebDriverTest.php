<?php

namespace TwoDotsTwice\Selenium\Tests\WebDriverTestCase;

use TwoDotsTwice\Selenium\WebDriverTestCase\SauceLabsWebDriverTestCase;

class SauceLabsWebDriverTest extends SauceLabsWebDriverTestCase
{
    /**
     * Tests whether or not the WebDriver object is functional.
     */
    public function testWebDriver()
    {
        $this->driver->get('http://google.com');
    }
}
