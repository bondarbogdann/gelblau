<?php
namespace Gelblau\GelblauAusgabe\Tests\Unit\Controller;

/**
 * Test case.
 */
class OrderControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Gelblau\GelblauAusgabe\Controller\OrderController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Gelblau\GelblauAusgabe\Controller\OrderController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenOrderToOrderRepository()
    {
        $order = new \Gelblau\GelblauAusgabe\Domain\Model\Order();

        $orderRepository = $this->getMockBuilder(\Gelblau\GelblauAusgabe\Domain\Repository\OrderRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderRepository->expects(self::once())->method('add')->with($order);
        $this->inject($this->subject, 'orderRepository', $orderRepository);

        $this->subject->createAction($order);
    }
}
