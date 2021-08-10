<?php

namespace App\Controller;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/api/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, UserInterface $user, JWTTokenAuthenticator $JWTManager): Response
    {
        if ($this->getUser()) {
            try {
                return new JsonResponse(['token' => $JWTManager->create($user)]);
                // get the login error if there is one
                $error = $authenticationUtils->getLastAuthenticationError();
                // last username entered by the user
                $lastUsername = $authenticationUtils->getLastUsername();

            } catch (Throwable $th) {

                throw $th;
            }
            finally{
                return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);

            }
        }
    }
    
    /**
     * @Route("/logout", name="api_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
