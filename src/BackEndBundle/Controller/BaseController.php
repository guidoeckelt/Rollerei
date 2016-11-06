<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 06.11.2016
 * Time: 21:18
 */

namespace BackEndBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseController extends Controller
{
    protected abstract function handlePostRequest(Request $request);

}