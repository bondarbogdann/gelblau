<?php
namespace Gelblau\GelblauAusgabe\Tests\Unit\Controller;

/**
 * Test case.
 */
class AusgabeControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Gelblau\GelblauAusgabe\Controller\AusgabeController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Gelblau\GelblauAusgabe\Controller\AusgabeController::class)
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
    public function listActionFetchesAllAusgabesFromRepositoryAndAssignsThemToView()
    {

        $allAusgabes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ausgabeRepository = $this->getMockBuilder(\Gelblau\GelblauAusgabe\Domain\Repository\AusgabeRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ausgabeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAusgabes));
        $this->inject($this->subject, 'ausgabeRepository', $ausgabeRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('ausgabes', $allAusgabes);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAusgabeToView()
    {
        $ausgabe = new \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ausgabe', $ausgabe);

        $this->subject->showAction($ausgabe);
    }
}
