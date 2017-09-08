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

    //  /**
    //  * action downloadPdf
    //  *
    //  * @param \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe
    //  * @return void
    //  */
    //  public function downloadPdfAction(\Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe)
    //  {
    //     $file = $ausgabe->getPdf()->getOriginalResource()->getOriginalFile()->getPublicUrl();
    //     $filename = $ausgabe->getPdf()->getOriginalResource()->getOriginalFile()->getName();
    //     $fileLen = filesize($file);          
    //     $cType = 'application/pdf'; 
    //     $headers = array(
    //         'Pragma'                    => 'public', 
    //         'Expires'                   => 0, 
    //         'Cache-Control'             => 'must-revalidate, post-check=0, pre-check=0',
    //         'Cache-Control'             => 'public',
    //         'Content-Description'       => 'File Transfer',
    //         'Content-Type'              => 'application/pdf',
    //         'Content-Disposition'       => 'attachment; filename="'. $filename .'"',
    //         'Content-Transfer-Encoding' => 'binary', 
    //         'Content-Length'            => $fileLen         
    //                 );
        
    //     foreach($headers as $header => $data)
    //         $this->response->setHeader($header, $data); 
        
    //     $this->response->sendHeaders();                 
    //     @readfile($file);   
         
    //     exit();   
    //  }

    /**
     * action download
     *
     * @param \Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe
     * @return void
     */
    public function downloadAction(\Gelblau\GelblauAusgabe\Domain\Model\Ausgabe $ausgabe)
    {
        $action = $this->request->getArgument('selected_action');
        $money = intval($this->request->getArgument('money'));
        if ($action === 'download'){
            $ausgabe->setDownloadCount($ausgabe->getDownloadCount() + 1);
            $this->ausgabeRepository->update($ausgabe);
            
            if ($money > 0) {
                $this->redirect('new', 'Order', NULL, ['money' => $money], 7);
            } else {
                $this->redirect('list', NULL, NULL, ['downloaded' => true]);
            }
        } elseif ($action === 'order'){
            if ($money > 0) {
                $this->redirect('new', 'Order', NULL, ['ausgabe' => $ausgabe, 'money' => $money]);
            } else {
                $this->redirect('new', 'Order', NULL, ['ausgabe' => $ausgabe]);
            }
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
