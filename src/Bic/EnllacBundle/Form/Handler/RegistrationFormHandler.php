<?php

namespace Bic\EnllacBundle\Form\Handler;

use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as FosRegistrationFormHandler;

class RegistrationFormHandler extends FosRegistrationFormHandler
{

    /*protected $request;
    protected $userManager;
    protected $form;
    protected $mailer;
    protected $tokenGenerator;

    public function __construct(FormInterface $form, Request $request, UserManagerInterface $userManager, MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator)
    {
        $this->form = $form;
        $this->request = $request;
        $this->userManager = $userManager;
        $this->mailer = $mailer;
        $this->tokenGenerator = $tokenGenerator;
    }*/

    /*public function __construct(){
        parent::__construct();
    }*/

    /**
     * @param boolean $confirmation
     */
    public function process($confirmation = false)
    {
        $user = $this->createUser();
        $this->form->setData($user);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bind($this->request);
            
            //upload img
            $files=$this->request->files->get($this->form->getName());
            $uploadedFile = $files['image'];            
            if (isset($uploadedFile)){
                $file_name = $user->getUsername().'.'.$uploadedFile->guessExtension();
                $this->form['image']->getData()->move($user->getImageUploadRootDir(), $file_name);
                $user->setImage($file_name);
            }


            if ($this->form->isValid()) {
                $this->onSuccess($user, $confirmation);

                return true;
            }
        }

        return false;
    }

    /**
     * @param boolean $confirmation
     */
    /*protected function onSuccess(UserInterface $user, $confirmation)
    {
        if ($confirmation) {
            $user->setEnabled(false);
            if (null === $user->getConfirmationToken()) {
                $user->setConfirmationToken($this->tokenGenerator->generateToken());
            }

            $this->mailer->sendConfirmationEmailMessage($user);
        } else {
            $user->setEnabled(true);
        }

        $this->userManager->updateUser($user);
    }*/

    /**
     * @return UserInterface
     */
    /*protected function createUser()
    {
        return $this->userManager->createUser();
    }*/
}
