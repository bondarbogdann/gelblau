<?php
namespace Gelblau\GelblauAusgabe\Controller;

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
 * AusgabeController
 */
class AusgabeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * ausgabeRepository
     *
     * @var \Gelblau\GelblauAusgabe\Domain\Repository\AusgabeRepository
     * @inject
     */
    protected $ausgabeRepository = null;

    /**
     * action list
     *
     * @param bool $downloaded
     * @param bool $ordered
     * @return void
     */
    public function listAction(bool $downloaded = false, bool $ordered = false)
    {
        $ausgabes = $this->ausgabeRepository->findAll();
        $this->view->assign('ausgabes', $ausgabes);
        $this->view->assign('downloaded', $downloaded);
        $this->view->assign('ordered', $ordered);
    }

    /**
     * action show
     *
     * @param \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe
     * @return void
     */
    public function showAction(\Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe)
    {
        $this->view->assign('ausgabe', $ausgabe);
        $this->view->assign('contentList', explode("\n", $ausgabe->getContent()));
    }

    /**
     * action download
     *
     * @param \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe
     * @return void
     */
    public function downloadAction(\Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe)
    {
        $ausgabe->setDownloadCount($ausgabe->getDownloadCount() + 1);
        $this->ausgabeRepository->update($ausgabe);
        
        $money = intval($this->request->getArgument('money'));
        if ($money > 0) {
            $this->redirect('new', 'Order', NULL, ['money' => $money], 7);
        } else {
            $this->redirect('list', NULL, NULL, ['downloaded' => true]);
        }
    }

    /**
     * action latestAusgabe
     *
     * @return void
     */
     public function latestAction()
     {
        $latest = $this->ausgabeRepository->findAll()->getFirst();
        $this->redirect('show', NULL, NULL, ['ausgabe' => $latest]);
     }
}
