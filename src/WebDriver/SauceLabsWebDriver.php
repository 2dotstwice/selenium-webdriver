<?php

namespace TwoDotsTwice\Selenium\WebDriver;

use Sauce\Sausage\SauceTestCommon;

class SauceLabsWebDriver extends WebDriver
{
    /**
     * Creates a new SauceLabsWebDriver object based on the SauceLabs configuration.
     *
     * See Sauce\Sausage\SauceConfig for more info.
     *
     * @param \DesiredCapabilities $desiredCapabilities
     *   Desired browser, version, platform, ...
     *
     * @return SauceLabsWebDriver
     */
    public static function createFromSauceConfig(\DesiredCapabilities $desiredCapabilities = null)
    {
        // Check that the necessary configuration is available, and load it if it has been written to disk.
        SauceTestCommon::RequireSauceConfig();

        // Create the host string.
        $host = 'http://' . SAUCE_USERNAME . ':' . SAUCE_ACCESS_KEY . '@ondemand.saucelabs.com:80/wd/hub';

        // Create and return a new SauceLabsWebDriver object based on the host string, and the desired capabilities.
        return SauceLabsWebDriver::create($host, $desiredCapabilities);
    }

    /**
     * Quits this driver, closing every associated window.
     *
     * @param \PHPUnit_Framework_TestCase $testCase
     *   Optionally, the test case that used the driver. This can provide some info to store in SauceLabs, such as
     *   the status (passed/failed) of the test.
     */
    public function quit(\PHPUnit_Framework_TestCase $testCase = null)
    {
        if (!is_null($testCase)) {
            $passed = $testCase->getStatus() == \PHPUnit_Runner_BaseTestRunner::STATUS_PASSED;
            SauceTestCommon::ReportBuild($this->getSessionID(), $passed);
        }

        parent::quit();
    }
}
