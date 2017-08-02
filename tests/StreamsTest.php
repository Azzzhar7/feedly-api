s<?php

require dirname(__FILE__) . "/../vendor/autoload.php";

use feedly\Models\Streams;
use feedly\Mode\SandBoxMode;
use feedly\AccessTokenStorage\AccessTokenBlackholeStorage;

class StreamsTest extends PHPUnit_Framework_TestCase
{

    public function testInitialization()
    {
        $model = new Streams(new SandBoxMode(), new AccessTokenBlackholeStorage('SOMETOKEN'));

        $this->assertNotEmpty($model->getEndpoint());
    }

    public function testGetByIds()
    {

        $response = array(
            'email' => 'john@doe.com'
        );

        $feedly = $this->getMock('Streams', array('get'));

        $feedly->expects($this->any())
               ->method('get')
               ->will($this->returnValue($response));

        $this->assertEquals($response, $feedly->get('ids'));
    }

    public function testGetContentByIdsWithQuery()
    {

        $response = array(
            'email' => 'john@doe.com'
        );

        $feedly = $this->getMock('Streams', array('get'));

        $feedly->expects($this->any())
            ->method('get')
            ->will($this->returnValue($response));

        $this->assertEquals($response, $feedly->get('ids', 'contents', ['count' => 100, 'unreadOnly' => 'true' ]));
    }

}
