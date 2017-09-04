<?php
namespace Gelblau\GelblauAusgabe\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AusgabeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFrontImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getFrontImage()
        );
    }

    /**
     * @test
     */
    public function setFrontImageForFileReferenceSetsFrontImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setFrontImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'frontImage',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'date',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPdfReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getPdf()
        );
    }

    /**
     * @test
     */
    public function setPdfForFileReferenceSetsPdf()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setPdf($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'pdf',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getContentReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getContent()
        );
    }

    /**
     * @test
     */
    public function setContentForStringSetsContent()
    {
        $this->subject->setContent('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'content',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDownloadCountReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getDownloadCount()
        );
    }

    /**
     * @test
     */
    public function setDownloadCountForIntSetsDownloadCount()
    {
        $this->subject->setDownloadCount(12);

        self::assertAttributeEquals(
            12,
            'downloadCount',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAmountLeftReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAmountLeft()
        );
    }

    /**
     * @test
     */
    public function setAmountLeftForIntSetsAmountLeft()
    {
        $this->subject->setAmountLeft(12);

        self::assertAttributeEquals(
            12,
            'amountLeft',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPreviewImagesReturnsInitialValueForFileReference()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getPreviewImages()
        );
    }

    /**
     * @test
     */
    public function setPreviewImagesForFileReferenceSetsPreviewImages()
    {
        $previewImage = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $objectStorageHoldingExactlyOnePreviewImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOnePreviewImages->attach($previewImage);
        $this->subject->setPreviewImages($objectStorageHoldingExactlyOnePreviewImages);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOnePreviewImages,
            'previewImages',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addPreviewImageToObjectStorageHoldingPreviewImages()
    {
        $previewImage = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $previewImagesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $previewImagesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($previewImage));
        $this->inject($this->subject, 'previewImages', $previewImagesObjectStorageMock);

        $this->subject->addPreviewImage($previewImage);
    }

    /**
     * @test
     */
    public function removePreviewImageFromObjectStorageHoldingPreviewImages()
    {
        $previewImage = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $previewImagesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $previewImagesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($previewImage));
        $this->inject($this->subject, 'previewImages', $previewImagesObjectStorageMock);

        $this->subject->removePreviewImage($previewImage);
    }

    /**
     * @test
     */
    public function getPriceReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPrice()
        );
    }

    /**
     * @test
     */
    public function setPriceForIntSetsPrice()
    {
        $this->subject->setPrice(12);

        self::assertAttributeEquals(
            12,
            'price',
            $this->subject
        );
    }
}
