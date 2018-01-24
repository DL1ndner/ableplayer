<?php
/**
 * VideoTest
 */

namespace BZGA\Ableplayer\Tests\Unit\Domain\Model;

use BZGA\Ableplayer\Domain\Model\Video;

/**
 * VideoTest
 */
class VideoTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Video
     */
    protected $fileDomainModelInstance;

    /**
     * Setup
     *
     * @return void
     */
    protected function setUp()
    {
        $this->fileDomainModelInstance = new Video();
    }

    /**
     * @test
     */
    public function titleCanBeSet()
    {
        $title = 'This is the title';
        $this->fileDomainModelInstance->setTitle($title);
        $this->assertEquals($title, $this->fileDomainModelInstance->getTitle());
    }
}
