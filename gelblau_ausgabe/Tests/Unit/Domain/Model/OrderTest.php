<?php
namespace Gelblau\GelblauAusgabe\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class OrderTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Gelblau\GelblauAusgabe\Domain\Model\Order
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Gelblau\GelblauAusgabe\Domain\Model\Order();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
    public function getMoneyReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getMoney()
        );
    }

    /**
     * @test
     */
    public function setMoneyForIntSetsMoney()
    {
        $this->subject->setMoney(12);

        self::assertAttributeEquals(
            12,
            'money',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getInvoiceReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getInvoice()
        );
    }

    /**
     * @test
     */
    public function setInvoiceForBoolSetsInvoice()
    {
        $this->subject->setInvoice(true);

        self::assertAttributeEquals(
            true,
            'invoice',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAusgabeAmountReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAusgabeAmount()
        );
    }

    /**
     * @test
     */
    public function setAusgabeAmountForIntSetsAusgabeAmount()
    {
        $this->subject->setAusgabeAmount(12);

        self::assertAttributeEquals(
            12,
            'ausgabeAmount',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getClientNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClientName()
        );
    }

    /**
     * @test
     */
    public function setClientNameForStringSetsClientName()
    {
        $this->subject->setClientName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clientName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getClientEmailReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClientEmail()
        );
    }

    /**
     * @test
     */
    public function setClientEmailForStringSetsClientEmail()
    {
        $this->subject->setClientEmail('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clientEmail',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getClientAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getClientAddress()
        );
    }

    /**
     * @test
     */
    public function setClientAddressForStringSetsClientAddress()
    {
        $this->subject->setClientAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'clientAddress',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAusgabeReturnsInitialValueForAusgabe()
    {
        self::assertEquals(
            null,
            $this->subject->getAusgabe()
        );
    }

    /**
     * @test
     */
    public function setAusgabeForAusgabeSetsAusgabe()
    {
        $ausgabeFixture = new \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe();
        $this->subject->setAusgabe($ausgabeFixture);

        self::assertAttributeEquals(
            $ausgabeFixture,
            'ausgabe',
            $this->subject
        );
    }
}
