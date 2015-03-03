<?php

namespace TwoDotsTwice\Selenium\WebDriverTestCase;

use TwoDotsTwice\Selenium\WebDriver\WebDriver;

abstract class LocalWebDriverTestCase extends WebDriverTestCase
{
    /**
     * {@inheritdoc}
     */
    public function getWebDriver()
    {
        return WebDriver::create(WebDriver::DEFAULT_HOST, $this->getDesiredCapabilities());
    }

    /**
     * {@inheritdoc}
     */
    public function getDesiredCapabilities()
    {
        $capabilities = \DesiredCapabilities::firefox();
        return $capabilities;
    }
}
