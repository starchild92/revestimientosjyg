<?php
namespace JYG\RevestimientosBundle\Entity;
use Doctrine\ORM\EntityRepository;
/**
 * LoginRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LoginRepository extends EntityRepository
{
	public function validarCuenta($l, $p){
		$query = $this->getEntityManager()
				->createQuery('SELECT u 
				FROM JYGRevestimientosBundle:Usuario u 
				WHERE u.login = :login AND u.contrasena = :pass');
		$query->setParameter('login', $l);
		$query->setParameter('pass', $p);
		$user = $query->getResult();
        
        return $user;
	}
}