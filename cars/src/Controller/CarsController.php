<?php

namespace App\Controller;

use App\Entity\Brand;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType ;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CarsController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function showAction()
   {
       $cars = $this->getDoctrine()->getRepository( 'App:Brand')->findAll();
       return $this ->render('cars/index.html.twig', array('cars'=>$cars));
   }
   /**
     * @Route("/details/{id}", name="details")
     */
    public function  detailsAction($id)
   {
       $cars = $this->getDoctrine()->getRepository( 'App:Brand')->find($id);
       return $this->render( 'cars/details.html.twig', array('cars' => $cars));
   }
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public  function editAction( $id, Request $request){
        $car = $this->getDoctrine()->getRepository('App:Brand')->find($id);
        $car->setBrand($car->getBrand());
        $car->setPrice($car->getPrice());
        $car->setImage($car->getImage());

        $form = $this->createFormBuilder($car)->add( 'brand', TextType::class, array ('attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
        ->add( 'price', IntegerType::class, array ('attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
        ->add( 'model', TextType::class, array( 'attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
        ->add( 'image' , TextType::class, array ( 'attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
        ->add( 'save' , SubmitType::class, array ( 'label' => 'Edit car' , 'attr'  => array ( 'class' => 'btn-primary' , 'style' => 'margin-bottom:15px' ))) 
        ->getForm();
        $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()){
                    //fetching data
                    $brand = $form[ 'brand' ]->getData();
                    $price = $form[ 'price' ]->getData();
                    $model = $form[ 'model' ]->getData();
                    $image = $form[ 'image' ]->getData();
                    $car->setBrand($brand);
                    $car->setPrice($price);
                    $car->setModel($model);
                    $car->setImage($image);
                    $em = $this ->getDoctrine()->getManager();
                    $em->persist($car);
                    $em->flush();
                     $this ->addFlash(
                             'notice' ,
                             'Car Added'
                            );
                    return $this ->redirectToRoute('home');
               }
               return  $this->render( 'cars/edit.html.twig', array( 'car' => $car, 'form' => $form->createView()));
           }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository('App:Brand')->find($id);
        $em->remove($car);
            $em->flush();
            $this->addFlash(
                'notice',
                    'Car Removed'
                );
    return  $this->redirectToRoute('home');
}
    /**
     * @Route("/create", name="create")
     */
    public function  createAction(Request $request)
   {
       $car = new Brand;
       $form = $this->createFormBuilder($car)->add( 'brand', TextType::class, array ('attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
       ->add( 'price', IntegerType::class, array ('attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
       ->add( 'model', TextType::class, array( 'attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
       ->add( 'image' , TextType::class, array ( 'attr' => array ('class'=> 'form-control' , 'style'=> 'margin-bottom:15px')))
       ->add( 'save' , SubmitType::class, array ( 'label' => 'Create Brand' , 'attr'  => array ( 'class' => 'btn-primary' , 'style' => 'margin-bottom:15px' ))) 
       ->getForm();
       $form->handleRequest($request);
       

        if ($form->isSubmitted() && $form->isValid()){

          
           $brand = $form[ 'brand' ]->getData();
           $price = $form[ 'price' ]->getData();
           $model = $form[ 'model' ]->getData();
           $image = $form[ 'image' ]->getData();


           $car->setBrand($brand);
           $car->setPrice($price);
           $car->setModel($model);
           $car->setImage($image);
           $em = $this ->getDoctrine()->getManager();
           $em->persist($car);
           $em->flush();
            $this ->addFlash(
                    'notice' ,
                    'Car Added'
                   );
            return   $this ->redirectToRoute( 'home' );
       }

        return   $this ->render( 'cars/create.html.twig' , array ( 'form'  => $form->createView()));
   }
}
