<?php
namespace MyApp\UserBundle\Redirection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * Created by PhpStorm.
 * User: asmaa
 * Date: 20/11/2016
 * Time: 20:27
 */
class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{

    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // Get list of roles for current user
        $roles = $token->getRoles();
        // Tranform this list in array
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // If is a admin or super admin we redirect to the backoffice area
        if (in_array('ROLE_CLIENT', $rolesTab, true) )
            $redirection = new RedirectResponse($this->router->generate('my_app_user_Client'));
        // otherwise, if is a commercial user we redirect to the crm area
        elseif (in_array('ROLE_RESPONSABLE', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('my_app_user_Agent'));
        // otherwise we redirect user to the member area
        elseif (in_array('ROLE_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('my_app_user_Admin'));
        // otherwise we redirect user to the member area
        else
            $redirection = new RedirectResponse($this->router->generate('my_app_esprit_homepage'));

        return $redirection;
    }


}