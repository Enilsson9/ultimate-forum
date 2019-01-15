<?php

namespace Edward\Home;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleJsonController.
 */
class HomeControllerTest extends TestCase
{

    // Create the di container.
    //global $di;
    //protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new HomeController();
        $this->controller->setDI($this->di);
        //$this->requester = $this->di->get("requester");
        //$this->controller->initialize();
    }


    /**
     * Test the route "index".
     */
    public function testIndexAction()
    {
        $res = $this->controller->catchAll();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        $body = $res->getBody();
        $exp = "| ramverk1</title>";
        $this->assertContains($exp, $body);
    }
}
