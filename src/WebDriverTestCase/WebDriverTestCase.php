<?php

namespace TwoDotsTwice\Selenium\WebDriverTestCase;

use TwoDotsTwice\Selenium\WebDriver\WebDriver;

abstract class WebDriverTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * The WebDriver object that interacts with the Selenium server.
     *
     * @var WebDriver
     */
    protected $driver;

    /**
     * Sets up a new WebDriverTestCase test.
     */
    public function setUp()
    {
        parent::setUp();
        $this->driver = $this->getWebDriver();
    }

    /**
     * Returns a new WebDriver object to interact with the Selenium server.
     *
     * @return WebDriver $driver
     */
    public abstract function getWebDriver();

    /**
     * Returns a new DesiredCapabilities object to use when creating the WebDriver object.
     *
     * @return \DesiredCapabilities
     */
    public abstract function getDesiredCapabilities();

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        if (!empty($this->driver)) {
            $this->driver->quit();
        }
        parent::tearDown();
    }
}
