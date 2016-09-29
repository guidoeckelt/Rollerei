<?php
/**
 * Created by PhpStorm.
 * User: Guido
 * Date: 24.07.2016
 * Time: 18:44
 */

namespace BackEndBundle\Service;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\NonUniqueResultException;

class AdminService
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * VideoService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $name
     * @param string $password
     *
     * @return string
     */
    public function checkLoginData($name,$password)
    {
        $role = null;
        $criteria = array('name'=>$name,'password'=>$password);
        try{
            $user = $this->em->getRepository('BackEndBundle:Admin')->findOneBy($criteria);
            if($user != null){
                if($user->isSuper()){
                    return 'super';
                }
                return 'admin';
            }
        }catch (NonUniqueResultException $e){
            return 'fehler';
        }
        return 'unknown';
    }
}