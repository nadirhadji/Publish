<?php

namespace FOS\MessageBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\MessageBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * @Route("/inbox", name="inbox")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function inboxAction()
    {
        return $this->render('@FOSMessageBundle/Message/inbox.html.twig');
    }

}
