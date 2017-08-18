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
 * OrderController
 */
class OrderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * orderRepository
     *
     * @var \Gelblau\GelblauAusgabe\Domain\Repository\OrderRepository
     * @inject
     */
    protected $orderRepository = null;

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $hasMoney = $this->request->hasArgument('money');
        $hasAusgabe = $this->request->hasArgument('ausgabe');

        if ($hasMoney || $hasAusgabe) {
            $newOrder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Gelblau\GelblauAusgabe\Domain\Model\Order::class);
            
            if ($hasMoney) {
                $newOrder->setMoney($this->request->getArgument('money'));
            }
            
            if ($hasAusgabe) {
                $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
                $ausgabeRepository = $objectManager->get(\Gelblau\GelblauAusgabe\Domain\Repository\AusgabeRepository::class);
                $ausgabe = $ausgabeRepository->findByUid($this->request->getArgument('ausgabe'));
                
                $newOrder->setMoney($ausgabe->getPrice());
                $newOrder->setAusgabe($ausgabe);
                $newOrder->setAusgabeAmount(1);

                $this->view->setTemplatePathAndFilename('typo3conf/ext/gelblau_ausgabe/Resources/Private/Templates/Order/NewAusgabe.html');
            }
            
            $this->view->assign('newOrder', $newOrder);
        }

        $intro = $this->settings['intro'];
        $this->view->assign('intro', explode("\n", $intro));
        $this->view->assign('invoiceNotice', $this->settings['invoiceNotice']);
    }

    /**
     * action create
     *
     * @param \Gelblau\GelblauAusgabe\Domain\Model\Order $newOrder
     * @return void
     */
    public function createAction(\Gelblau\GelblauAusgabe\Domain\Model\Order $newOrder)
    {
        $newOrder->setDate(new \DateTime());
        $this->orderRepository->add($newOrder);

        $this->sendEmail($newOrder);

        $this->redirect('list', 'Ausgabe', NULL, ['ordered' => true], 2);
    }

    private function sendEmail($order){
        $mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
        $mail->setSubject('Gelblau Order/Donation on '.$order->getDate()->format('d/m/Y H:i'));
        $mail->setFrom(array('red@gelblau.net' => 'Gelblau'));
        $mail->setTo(array('red@gelblau.net' => 'Gelblau', $order->getClientEmail() => $order->getClientName()));
        
        $body = "Thank you for your donation!\n";
        $body .= "Orders Data:\n";
        $body .= " Money €: ".$order->getMoney()."\n";
        $body .= " Receive Invoice: ".($order->getInvoice() === false ? "no" : "yes")."\n";
        $body .= " Customer Email: ".$order->getClientEmail()."\n";
        $body .= " Customer Name: ".$order->getClientName()."\n";
        $body .= " Customer Address: ".$order->getClientAddress()."\n";
        if ($order->getAusgabe() !== null){
            $body .= " Magazine: ".$order->getAusgabe()->getName()."\n";
            $body .= " Amount: ".$order->getAmount()."\n";
        }
        $mail->setBody($body);
        // $mail->addPart('<q>Here is the message itself</q>', 'text/html');
        // $mail->attach(Swift_Attachment::fromPath('my-document.pdf'));
        $mail->send();
    }
}
