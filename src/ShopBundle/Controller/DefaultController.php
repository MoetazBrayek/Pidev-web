<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Category;
use ShopBundle\Entity\Produit;
use ShopBundle\Entity\Region;
use ShopBundle\Entity\Reviews;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
//        clear code after

        $products = $this->getDoctrine()->getRepository('ShopBundle:Produit')->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $products,
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );
        return $this->render('ShopBundle:Default:index.html.twig',['products' => $pagination]);
    }
    public function detailsAction(Request $request, $id)
    {

        $produits = $this->getDoctrine()
            ->getRepository('ShopBundle:Produit')
            ->find($id);


        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();


        $reviews = $this->getDoctrine()->getRepository('ShopBundle:Reviews')->findByProduitP($produits);
        $now = new\DateTime('now');
        if ($request->isMethod('POST')) {

            $listReviews = $produits->getReview();
            $mawjoud = false;
            foreach ($listReviews as $re)
            {
                if ($re->getUser() == $user){
                    $mawjoud = true;
                    $re->setTitle(($request->get('title')));
                    $re->setDate($now);
                    $re->setDescription(($request->get('description')));
                    $re->setStars(($request->get('stars')));
                    $re->setProduitP($produits);
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($re);
                    $em->flush();
                }
            }

            if ($mawjoud){

                return $this->redirectToRoute("shop_details", array('id' => $produits->getId()));
            }
            else{
                $review = new Reviews();
                $review->setTitle(($request->get('title')));
                $review->setDescription(($request->get('description')));
                $review->setStars(($request->get('stars')));
                $review->setProduitP($produits);
                $review->setUser($user);
                $review->setDate($now);
                $produits->setReview([$review]);
                $em = $this->getDoctrine()->getManager();
                $em->persist($review);
                $em->persist($produits);
                $em->flush();

                return $this->redirectToRoute("shop_details", array('id' => $produits->getId()));
            }



        }

        $panierlist = $this->getDoctrine()->getRepository('ShopBundle:Panier')->findByUser($user);
        $last = $this->getDoctrine()->getRepository('ShopBundle:Produit')->findBy(array(), array('date' => 'DESC'), 3, 1);
        $count = count($panierlist);
        $nbrrev = count($reviews);
        $total = 0;

        $totlanbrR = 0;
        foreach ($reviews as $rating) {

            $totlanbrR = $totlanbrR + $rating->getStars();
        }
        if ($nbrrev == 0) {
            $res = 0;
        } else
            $res = $totlanbrR / $nbrrev;
        $produits->setStars($res);
        $em = $this->getDoctrine()->getManager();
        $em->persist($produits);
        $em->flush();
        return $this->render('ShopBundle:Default:details.html.twig',['product' => $produits,
        'nbrp' => $count, 'panier' => $panierlist,
            'total' => $total,
            'reviews' => $reviews,
            'rev' => $nbrrev,
            'rating' => $res,
            'lastprod' => $last,
        ]);
        }
        else{
            return $this->redirectToRoute('fos_user_security_login');
        }
    }

    public function myorderAction()
    {
        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
            $panelist = $this->getDoctrine()->getRepository('ShopBundle:Order')->findByUser($user);
            return $this->render('@Shop/Default/orders.html.twig', array('orders' => $panelist,'total'=>0));
        }
        return $this->redirectToRoute('home');
    }


}
