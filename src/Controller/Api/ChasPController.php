<?php

namespace App\Controller\Api;

use App\Entity\ChasP;
use App\Entity\Customer;
use App\Entity\MedicalPackage;
use App\Repository\ChasPRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ChasPController extends AbstractController
{
	/**
	* Returns an array of Customers and their MedicalPackages
	*
	* @Route("/api/show", name="api_customer_and_medpackages_get_all", methods={"GET"})
	*/
	public function getAllCMP()
	{
		$em = $this->getDoctrine()->getManager();
		
		$cmp = $em->getRepository(ChasP::class)->createQueryBuilder('h')
			->select('c.id, c.firstname, c.lastname, p.name, h.date_start, h.date_end')
			->from('App\Entity\Customer', 'c' )
			->join('App\Entity\MedicalPackage', 'p')
            ->where('c.id = h.id_customer AND p.id = h.id_med_package')
			->orderBy('c.lastname')
            ->getQuery()
			->getResult();
			
		$data = [];
		$data_in= [];

		foreach($cmp as $cp => $v)
		{
			if($cp > 0 && $id != $v['id']) $data_in = [];
			
			array_push($data_in, $v['name']." (od ".$v['date_start']->format('Y-m-d')." do ".$v['date_end']->format('Y-m-d').")");
			
			$data[$v['id']] = [
				'firstname' => $v['firstname'],
				'lastname' => $v['lastname'],
				'packages' => $data_in 
				];

				$id = $v['id'];
		}	
		
		return $this->json($data);
	}
	
	/**
	* Returns an Customer and his MedicalPackages
	*
	* @Route("/api/show/{id}", name="api_customer_and_medpackages_get", methods={"GET"})
    * @ParamConverter("customer")
	*
    * @param Customer $customer
    * @return \Symfony\Component\HttpFoundation\JsonResponse
	*/
	public function getOneCMP(Customer $customer)
	{
		$em = $this->getDoctrine()->getManager();
		$id_customer = $customer->getId();

		$cmp = $em->getRepository(ChasP::class)->createQueryBuilder('h')
			->select('c.id, c.firstname, c.lastname, p.name, h.date_start, h.date_end')
			->from('App\Entity\Customer', 'c' )
			->join('App\Entity\MedicalPackage', 'p')
            ->where('c.id = h.id_customer AND p.id = h.id_med_package')
			->andWhere('h.id_customer = :id_c')
			->setParameter('id_c', $id_customer)
            ->getQuery()
			->getResult();

		$data = [];
		$data_in= [];

		foreach($cmp as $cp)
		{
			array_push($data_in, $cp['name']." (od ".$cp['date_start']->format('Y-m-d')." do ".$cp['date_end']->format('Y-m-d').")");
			
			$data[$cp['id']] = [
				'id' => $cp['id'],
				'firstname' => $cp['firstname'],
				'lastname' => $cp['lastname'],
				'packages' => $data_in 
				];
		}
		
		return $this->json($data);
	}
}

?>