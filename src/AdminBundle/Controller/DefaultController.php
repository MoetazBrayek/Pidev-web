<?php

namespace AdminBundle\Controller;

use BlogBundle\Entity\Blog;
use BlogBundle\Entity\Categories;
use ShopBundle\Entity\Category;
use ShopBundle\Entity\Produit;
use ShopBundle\Entity\Region;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;


class DefaultController extends Controller
{

    public function indexAction()
    {
        return $this->render('AdminBundle:Default:index.html.twig');
    }
    public function newAction(Request $request)
    {
        $blog = new Blog();
        $form = $this->createForm('BlogBundle\Form\BlogType', $blog);
        $form->handleRequest($request);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $blog->setAuthor($user);
            $blog->setRepliesnumber(0);
            $blog->setAccept(1);
            $blog->setDateCreation(new \DateTime());

            $em->persist($blog);

            $em->flush();

            return $this->redirectToRoute('blog_show', array('id' => $blog->getId()));
        }

        return $this->render('AdminBundle:Default:addnewblog.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing blog entity.
     *
     */
    public function editBlogAction(Request $request, Blog $blog)
    {
        $editForm = $this->createForm('BlogBundle\Form\BlogType', $blog);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_edit', array('id' => $blog->getId()));
        }

        return $this->render('AdminBundle:Default:editBlog.html.twig', array(
            'blog' => $blog,
            'form' => $editForm->createView(),
        ));
    }



    public function AfficherUserAction(Request $request){

        $todos = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $todos,
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render('AdminBundle:Default:users.html.twig', array(

            'users'=>$pagination,

        ));

    }
    public function AfficherblogsAction(Request $request){

        $allblogs = $this->getDoctrine()
            ->getRepository('BlogBundle:Blog')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allblogs,
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('AdminBundle:Default:blogs.html.twig', array(

            'blogs'=>$pagination
        ));

    }

    public function AfficherMsgAction(){

        $todos = $this->getDoctrine()
            ->getRepository('ContacusBundle:Contact')
            ->findAll();
        return $this->render('AdminBundle:Default:inbox.html.twig', array(

            'msgs'=>$todos
        ));

    }
    public function AfficherContractAction(Request $request){

        $allcontract = $this->getDoctrine()
            ->getRepository('LocationBundle:Contract')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allcontract,
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );
        return $this->render('AdminBundle:Default:Contract.html.twig', array(

            'blogs'=>$pagination
        ));

    }

    public function ConfirmContractAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $todos = $this->getDoctrine()
            ->getRepository('LocationBundle:Contract')
            ->find($id);
        $todos2 = $this->getDoctrine()
            ->getRepository('LocationBundle:Location')
            ->find($id);
        $todos->setAcceptcontract('1');
        $em->persist($todos);
        $em->flush();



        $account_sid = 'AC7c27b5ff7f1814c0e28ba26a431b376d';
        $auth_token = '2fb29e88f4b292b2d4308928cf316aab';
        $twilio_number = "+16084722458";
        $client = new Client($account_sid, $auth_token);
        try {
            $client->messages->create(
            // Where to send a text message (your cell phone?)
                '+21658804719',
                array(
                    'from' => $twilio_number,
                    'body' => 'Your Contract Id : '.$todos->getId().'Confirmed Matricule :'.$todos2->getMatricule())
            );
        } catch (TwilioException $e) {
            echo ('error');
        }

        return $this->redirectToRoute('affichecontract');

    }
        public function StatusAction($id){
        $em = $this->getDoctrine()->getManager();

        $todos = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($id);

        if ($todos->isEnabled()==0){
            $todos->setEnabled(1);
            $em->persist($todos);
            $em->flush();
        }
        else {
            $todos->setEnabled(0);
            $em->persist($todos);
            $em->flush();
        }
          return  $this->redirectToRoute('admin_users');
    }


    public function MsgDetaisAction($id, Request $request){

        $subscription_key = "7b565b621d7a47bdb1fcf4cf2389b4fb";
        $endpoint = "https://centralus.api.cognitive.microsoft.com/text/analytics/v2.1/sentiment";

        $msg = $this->getDoctrine()
            ->getRepository('ContacusBundle:Contact')
            ->find($id);

        $data = array (

            'documents' => array (
                array ( 'id' => '1', 'language' => 'en', 'text' => $msg->getMessage()),
            )
        );

        $result = $this->GetSentiment($endpoint, $subscription_key, $data);
            $x = json_decode($result, true);
        return $this->render('AdminBundle:Default:inboxdetais.html.twig', array(

            'msgdtais'=>$msg,
            'score' =>  $x["documents"][0]["score"]
        ));

    }

    function GetSentiment ($host, $key, $data) {
        // Make sure all text is UTF-8 encoded.
        foreach ($data as &$item) {
            foreach ($item as $ignore => &$value) {
                $value['text'] = utf8_encode($value['text']);
            }
        }
        $data = json_encode ($data);
        $headers = "Content-type: text/json\r\n" .
            "Content-Length: " . strlen($data) . "\r\n" .
            "Ocp-Apim-Subscription-Key: $key\r\n";
        $options = array (
            'http' => array (
                'header' => $headers,
                'method' => 'POST',
                'content' => $data
            )
        );
        $context  = stream_context_create ($options);
        $result = file_get_contents ($host , false, $context);
        return $result;
    }





    public function edit_profileAction(){
        return $this->render('AdminBundle:Default:edit_profile.html.twig');

    }


    public function newCatgoriesAction(Request $request)
    {
        $catg = new Categories();
        $form = $this->createForm('BlogBundle\Form\CategoriesType', $catg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($catg);

            $em->flush();

        }

            return $this->render('AdminBundle:Default:Catgories.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    public function newCatgoriesShopAction(Request $request)
    {
        $catg = new Category();
        $form = $this->createForm('ShopBundle\Form\CategoryType', $catg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($catg);

            $em->flush();

        }

        return $this->render('AdminBundle:Default:CatgoriesShop.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function RemoveAction($id, Request $request){
        $sn = $this->getDoctrine()->getManager();
        $todo = $sn->getRepository('BlogBundle:Blog')->find($id);
        $sn->remove($todo);
        $sn->flush();

        return $this->redirectToRoute('all_blog');

    }



    ///////this is Product , Panel Admin ///////


    public function RemoveProdAction($id, Request $request){
        $sn = $this->getDoctrine()->getManager();
        $todo = $sn->getRepository('ShopBundle:Produit')->find($id);
        $sn->remove($todo);
        $sn->flush();

        return $this->redirectToRoute('all_produits');

    }

    public function acceptorderAction($id){

        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $sn = $this->getDoctrine()->getManager();
            $order = $sn->getRepository('ShopBundle:Order')->find($id);
            $order->setEtat('Confirmed');
            $sn->persist($order);
            $sn->flush();
            $account_sid = 'AC7c27b5ff7f1814c0e28ba26a431b376d';
            $auth_token = '2fb29e88f4b292b2d4308928cf316aab';
            $twilio_number = "+16084722458";
            $client = new Client($account_sid, $auth_token);
            try {
                $client->messages->create(
                // Where to send a text message (your cell phone?)
                    '+21658804719',
                    array(
                        'from' => $twilio_number,
                        'body' => 'Your Order Id : '.$order->getId().' Has Been SHipped '
                ));
            } catch (TwilioException $e) {
                echo ('error');
            }
        }
        else{
            return $this->redirectToRoute('fos_user_security_login');
        }
        return $this->redirectToRoute('afficheorders');

    }
    public function declinedorderAction($id){

        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $sn = $this->getDoctrine()->getManager();
            $order = $sn->getRepository('ShopBundle:Order')->find($id);
            $order->setEtat('Declined');
            $sn->persist($order);
            $sn->flush();

            return $this->redirectToRoute('afficheorders');
        }
        else{
            return $this->redirectToRoute('fos_user_security_login');
        }


    }

    public function AfficherProductsAction(Request $request){

        $allprod = $this->getDoctrine()
            ->getRepository('ShopBundle:Produit')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allprod,
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('AdminBundle:Default:produits.html.twig', array(

            'prod'=>$pagination
        ));

    }
    public function AfficherOrdersAction(Request $request){

        $allprod = $this->getDoctrine()
            ->getRepository('ShopBundle:Order')
            ->findAll();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $allprod,
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('AdminBundle:Default:Orders.html.twig', array(

            'ordoers'=>$pagination
        ));

    }

    public function addProdctAction(Request $request)
    {
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $produit = new Produit();
        $form = $this->createFormBuilder($produit)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('quantity', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('prix', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('imageId', FileType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('category', EntityType::class, [
                // looks for choices from this entity
                'class' => Category::class,
                'choice_label' => 'category',])

            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $produit->getImageId();

            $fileName = md5(uniqid()) . '.' . $file->guessExtension();

            // Move the file to the directory where brochures are stored

            $file->move(
                $this->getParameter('images_shop'),
                $fileName
            );


            $produit->setImageId($fileName);

            $nom = $form['nom']->getData();
            $description = $form['description']->getData();
            $stock = $form['quantity']->getData();
            $prix = $form['prix']->getData();
            $cat = $form['category']->getData();
            $now = new\DateTime('now');

            $produit->setNom($nom);
            $produit->setDescription($description);
            $produit->setQuantity($stock);
            $produit->setPrix($prix);
            $produit->setUtilisateur($user);
            $produit->setCategory($cat);
            $produit->setStars(0);
            $produit->setDate($now);

            $sn = $this->getDoctrine()->getManager();
            $sn->persist($produit);
            $sn->flush();

            $this->addFlash(
                'notice',
                'todo added'
            );

        }

        $panierlist = $this->getDoctrine()->getRepository('ShopBundle:Panier')->findByUser($user);
        $cat = $this->getDoctrine()->getRepository('ShopBundle:Category')->findAll();

        $count = count($panierlist);
        $total = 0;
        foreach ($panierlist as $prix) {

            $total = $total + $prix->getPrix();
        }



        return $this->render('AdminBundle:Default:addprod.html.twig', array(

            'cat' => $cat,
            'form' => $form->createView(),'nbrp' => $count, 'panier' => $panierlist, 'total' => $total

        ));
    }

    public function editProdctAction($id, Request $request)
    {
        $produit = $this->getDoctrine()
            ->getRepository('ShopBundle:Produit')
            ->find($id);
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $produit->setNom($produit->getNom());
        $produit->setDescription($produit->getDescription());
        $produit->setQuantity($produit->getQuantity());
        $produit->setPrix($produit->getPrix());
        $produit->setCategory($produit->getCategory());


        $form = $this->createFormBuilder($produit)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('quantity', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))

            ->add('prix', NumberType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('category', EntityType::class, [
                // looks for choices from this entity
                'class' => Category::class,
                'choice_label' => 'category',])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $nom = $form['nom']->getData();
            $description = $form['description']->getData();
            $quantity = $form['quantity']->getData();
            $prix = $form['prix']->getData();
            $cat = $form['category']->getData();

            $produit->setNom($nom);
            $produit->setDescription($description);
            $produit->setQuantity($quantity);
            $produit->setPrix($prix);
            $produit->setUser($user);
            $produit->setCategory($cat);

            $sn = $this->getDoctrine()->getManager();
            $sn->persist($produit);
            $sn->flush();
            return $this->redirectToRoute('location_homepage');

        }
        return $this->render('AdminBundle:Default:editprod.html.twig', array(

            'produits'=>$produit,
            'form'=>$form->createView()
        ));

    }

    public function acceptblogAction($id){

        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $sn = $this->getDoctrine()->getManager();
            $location = $sn->getRepository('BlogBundle:Blog')->find($id);
            $location->setAccept(1);
            $sn->persist($location);
            $sn->flush();

            return $this->redirectToRoute('all_blog');
        }
        else{
            return $this->redirectToRoute('fos_user_security_login');
        }


    }
}
