<?php
namespace Gelblau\GelblauAusgabe\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class PreviewTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Gelblau\GelblauAusgabe\Domain\Model\Preview
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Gelblau\GelblauAusgabe\Domain\Model\Preview();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }
}
