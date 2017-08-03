<?php
namespace Gelblau\GelblauAusgabe\Domain\Model;

/***
 *
 * This file is part of the "Gelblau Ausgabe" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017
 *
 ***/

/**
 * Ausgabe
 */
class Ausgabe extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * frontImage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $frontImage = null;

    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * pdf
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $pdf = null;

    /**
     * content
     *
     * @var string
     */
    protected $content = '';

    /**
     * downloadCount
     *
     * @var int
     */
    protected $downloadCount = 0;

    /**
     * amountLeft
     *
     * @var int
     */
    protected $amountLeft = 0;

    /**
     * previewImages
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @cascade remove
     */
    protected $previewImages = null;

    /**
     * price
     *
     * @var int
     */
    protected $price = 0;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->previewImages = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the frontImage
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $frontImage
     */
    public function getFrontImage()
    {
        return $this->frontImage;
    }

    /**
     * Sets the frontImage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $frontImage
     * @return void
     */
    public function setFrontImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $frontImage)
    {
        $this->frontImage = $frontImage;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the pdf
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Sets the pdf
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf
     * @return void
     */
    public function setPdf(\TYPO3\CMS\Extbase\Domain\Model\FileReference $pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * Returns the content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content
     *
     * @param string $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Returns the downloadCount
     *
     * @return int $downloadCount
     */
    public function getDownloadCount()
    {
        return $this->downloadCount;
    }

    /**
     * Sets the downloadCount
     *
     * @param int $downloadCount
     * @return void
     */
    public function setDownloadCount($downloadCount)
    {
        $this->downloadCount = $downloadCount;
    }

    /**
     * Returns the amountLeft
     *
     * @return int $amountLeft
     */
    public function getAmountLeft()
    {
        return $this->amountLeft;
    }

    /**
     * Sets the amountLeft
     *
     * @param int $amountLeft
     * @return void
     */
    public function setAmountLeft($amountLeft)
    {
        $this->amountLeft = $amountLeft;
    }

    /**
     * Adds a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $previewImage
     * @return void
     */
    public function addPreviewImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $previewImage)
    {
        $this->previewImages->attach($previewImage);
    }

    /**
     * Removes a FileReference
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $previewImageToRemove The FileReference to be removed
     * @return void
     */
    public function removePreviewImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $previewImageToRemove)
    {
        $this->previewImages->detach($previewImageToRemove);
    }

    /**
     * Returns the previewImages
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $previewImages
     */
    public function getPreviewImages()
    {
        return $this->previewImages;
    }

    /**
     * Sets the previewImages
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $previewImages
     * @return void
     */
    public function setPreviewImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $previewImages)
    {
        $this->previewImages = $previewImages;
    }

    /**
     * Returns the price
     *
     * @return int $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     *
     * @param int $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
