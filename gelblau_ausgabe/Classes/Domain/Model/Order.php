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
 * Order
 */
class Order extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * money
     *
     * @var int
     */
    protected $money = 0;

    /**
     * invoice
     *
     * @var bool
     */
    protected $invoice = false;

    /**
     * ausgabeAmount
     *
     * @var int
     */
    protected $ausgabeAmount = 0;

    /**
     * Ausgabe
     *
     * @var \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe
     */
    protected $ausgabe = null;

    /**
     * clientName
     *
     * @var string
     */
    protected $clientName = '';

    /**
     * clientEmail
     *
     * @var string
     */
    protected $clientEmail = '';

    /**
     * clientAddress
     *
     * @var string
     */
    protected $clientAddress = '';

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
     * Returns the money
     *
     * @return int $money
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Sets the money
     *
     * @param int $money
     * @return void
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }

    /**
     * Returns the invoice
     *
     * @return bool $invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Sets the invoice
     *
     * @param bool $invoice
     * @return void
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Returns the boolean state of invoice
     *
     * @return bool
     */
    public function isInvoice()
    {
        return $this->invoice;
    }

    /**
     * Returns the ausgabeAmount
     *
     * @return int $ausgabeAmount
     */
    public function getAusgabeAmount()
    {
        return $this->ausgabeAmount;
    }

    /**
     * Sets the ausgabeAmount
     *
     * @param int $ausgabeAmount
     * @return void
     */
    public function setAusgabeAmount($ausgabeAmount)
    {
        $this->ausgabeAmount = $ausgabeAmount;
    }

    /**
     * Returns the ausgabe
     *
     * @return \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe
     */
    public function getAusgabe()
    {
        return $this->ausgabe;
    }

    /**
     * Sets the ausgabe
     *
     * @param \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe
     * @return void
     */
    public function setAusgabe(\Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe)
    {
        $this->ausgabe = $ausgabe;
    }

    /**
     * Returns the clientName
     *
     * @return string $clientName
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Sets the clientName
     *
     * @param string $clientName
     * @return void
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    /**
     * Returns the clientEmail
     *
     * @return string $clientEmail
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    /**
     * Sets the clientEmail
     *
     * @param string $clientEmail
     * @return void
     */
    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;
    }

    /**
     * Returns the clientAddress
     *
     * @return string $clientAddress
     */
    public function getClientAddress()
    {
        return $this->clientAddress;
    }

    /**
     * Sets the clientAddress
     *
     * @param string $clientAddress
     * @return void
     */
    public function setClientAddress($clientAddress)
    {
        $this->clientAddress = $clientAddress;
    }
}
