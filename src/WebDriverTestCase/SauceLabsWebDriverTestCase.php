<?php

namespace TwoDotsTwice\Selenium\WebDriverTestCase;

use TwoDotsTwice\Selenium\WebDriver\SauceLabsWebDriver;

abstract class SauceLabsWebDriverTestCase extends WebDriverTestCase
{
    /**
     * {@inheritdoc}
     */
    public function getWebDriver()
    {
        $capabilities = $this->getDesiredCapabilities();
        return SauceLabsWebDriver::createFromSauceConfig($capabilities);
    }

    /**
     * {@inheritdoc}
     */
    public function getDesiredCapabilities()
    {
        $capabilities = \DesiredCapabilities::firefox();
        $capabilities->setPlatform(\WebDriverPlatform::ANY);
        return $capabilities;
    }
}
