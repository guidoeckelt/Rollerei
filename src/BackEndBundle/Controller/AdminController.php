<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 28.07.2016
 * Time: 22:32
 */

namespace BackEndBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/admin/login", name="admin.login")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function loginAction(Request $request)
    {
        $name = $request->request->get('name');
        $password = $request->request->get('password');

        $adminService = $this->get('backend.admin');
        $result = $adminService->checkLoginData($name,$password);
        switch ($result)
        {
            case 'super': $status = 200; break;
            case 'admin': $status = 200; break;
            case 'unknown': $status = 401; break;
            case 'fehler': $status = 422; break;
            default: $status = 200;
        }
        return $this->json($result,$status,array(),array());
    }
}