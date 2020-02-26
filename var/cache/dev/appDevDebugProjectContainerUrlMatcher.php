<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // _wdt
        if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_home
            if ('/_profiler' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not__profiler_home;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                }

                return $ret;
            }
            not__profiler_home:

            if (0 === strpos($pathinfo, '/_profiler/search')) {
                // _profiler_search
                if ('/_profiler/search' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                }

                // _profiler_search_bar
                if ('/_profiler/search_bar' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                }

            }

            // _profiler_phpinfo
            if ('/_profiler/phpinfo' === $pathinfo) {
                return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
            }

            // _profiler_open_file
            if ('/_profiler/open' === $pathinfo) {
                return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
            }

            // _profiler_router
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
            }

            // _profiler_exception
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
            }

            // _profiler_exception_css
            if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
            }

        }

        // _twig_error_test
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',  '_locale' => 'en',  '_S' => '/',));
        }

        // contacus_homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)contact/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'contacus_homepage']), array (  '_controller' => 'ContacusBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_contacus_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'contacus_homepage'));
            }

            return $ret;
        }
        not_contacus_homepage:

        // aboutus
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)contact/aboutus$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'aboutus']), array (  '_controller' => 'ContacusBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // admin_homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_homepage']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_admin_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'admin_homepage'));
            }

            return $ret;
        }
        not_admin_homepage:

        // blog_new
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/blog/new$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_new']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::newAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // blog_delete
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/Delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_delete']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::deleteAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // admin_users
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/users$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'admin_users']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherUserAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // status
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/status/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'status']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::StatusAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // affiche_msg
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/messages$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'affiche_msg']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherMsgAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // all_blog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/blogs$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'all_blog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherblogsAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // all_produits
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/produits$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'all_produits']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherProductsAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // delete_prod
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/removeprod/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'delete_prod']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::RemoveProdAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // delete_blog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/removeblog/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'delete_blog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::RemoveAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // msg_detais
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/msg_detais/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'msg_detais']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::MsgDetaisAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // edit_profile
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/edit_profile$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'edit_profile']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::edit_profileAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // new_blog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/newblog$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'new_blog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::newAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // blog_edit
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_edit']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::editBlogAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // newCatgoriesBlog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/newcatblog$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'newCatgoriesBlog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::newCatgoriesAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // newCatgoriesShop
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/newcatshop$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'newCatgoriesShop']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::newCatgoriesShopAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // addproduct
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/addproduct$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'addproduct']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::addProdctAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // editProdct
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/editProdct/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'editProdct']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::editProdctAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // add_location_products
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/add_location_products$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'add_location_products']), array (  '_controller' => 'AdminBundle\\Controller\\LocationController::addAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // all_location_products
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/all_location_products$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'all_location_products']), array (  '_controller' => 'AdminBundle\\Controller\\LocationController::AfficherLocationAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // deletelocation
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/deletelocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'deletelocation']), array (  '_controller' => 'AdminBundle\\Controller\\LocationController::deletelocationAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // editlocation
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/editlocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'editlocation']), array (  '_controller' => 'AdminBundle\\Controller\\LocationController::editlocationAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // reply
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/reply/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'reply']), array (  '_controller' => 'AdminBundle\\Controller\\SendController::createAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // acceptblog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/acceptblog/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'acceptblog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::acceptblogAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // sentiments
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/sentiments/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'sentiments']), array (  '_controller' => 'AdminBundle\\Controller\\SentimentController::SentimentAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // confirmcontrat
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/confirmcontrat/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'confirmcontrat']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::ConfirmContractAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // affichecontract
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/affichecontract$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'affichecontract']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherContractAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // afficheorders
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/afficheorders$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'afficheorders']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherOrdersAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // acceptorder
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/acceptorder/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'acceptorder']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::acceptorderAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // declinedorder
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Admin/declinedorder/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'declinedorder']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::declinedorderAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // shop_homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'shop_homepage']), array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_shop_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'shop_homepage'));
            }

            return $ret;
        }
        not_shop_homepage:

        // shop_details
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/details/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'shop_details']), array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::detailsAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // shop_addtopanier
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/panier/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'shop_addtopanier']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::addToPanierAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // myproduct
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/myproduct$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'myproduct']), array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::myproductAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // checkout
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/checkout$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'checkout']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::checkoutAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // deletech
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'deletech']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::deletechAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // orders
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/orders/(?P<total>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'orders']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::orderAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // myorder
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Shop/myorder/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'myorder']), array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::myorderAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_myorder;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'myorder'));
            }

            return $ret;
        }
        not_myorder:

        // homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)?(?:(?P<_S>/?))?$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'homepage']), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // contact
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)contact$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'contact']), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::contactAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // fos_user_security_login
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)login$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_security_login']), array (  '_controller' => 'fos_user.security.controller:loginAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_security_login;
            }

            return $ret;
        }
        not_fos_user_security_login:

        // fos_user_security_check
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)login_check$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_security_check']), array (  '_controller' => 'fos_user.security.controller:checkAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($requestMethod, ['POST'])) {
                $allow = array_merge($allow, ['POST']);
                goto not_fos_user_security_check;
            }

            return $ret;
        }
        not_fos_user_security_check:

        // fos_user_security_logout
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)logout$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_security_logout']), array (  '_controller' => 'fos_user.security.controller:logoutAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_security_logout;
            }

            return $ret;
        }
        not_fos_user_security_logout:

        // fos_user_profile_show
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)profile/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_profile_show']), array (  '_controller' => 'fos_user.profile.controller:showAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_fos_user_profile_show;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fos_user_profile_show'));
            }

            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_user_profile_show;
            }

            return $ret;
        }
        not_fos_user_profile_show:

        // fos_user_profile_edit
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)profile/edit$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_profile_edit']), array (  '_controller' => 'fos_user.profile.controller:editAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_profile_edit;
            }

            return $ret;
        }
        not_fos_user_profile_edit:

        // fos_user_registration_register
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)register/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_registration_register']), array (  '_controller' => 'fos_user.registration.controller:registerAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_fos_user_registration_register;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fos_user_registration_register'));
            }

            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_registration_register;
            }

            return $ret;
        }
        not_fos_user_registration_register:

        // fos_user_registration_check_email
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)register/check\\-email$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_registration_check_email']), array (  '_controller' => 'fos_user.registration.controller:checkEmailAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_user_registration_check_email;
            }

            return $ret;
        }
        not_fos_user_registration_check_email:

        // fos_user_registration_confirm
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)register/confirm/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_registration_confirm']), array (  '_controller' => 'fos_user.registration.controller:confirmAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_user_registration_confirm;
            }

            return $ret;
        }
        not_fos_user_registration_confirm:

        // fos_user_registration_confirmed
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)register/confirmed$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_registration_confirmed']), array (  '_controller' => 'fos_user.registration.controller:confirmedAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_user_registration_confirmed;
            }

            return $ret;
        }
        not_fos_user_registration_confirmed:

        // fos_user_resetting_request
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)resetting/request$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_resetting_request']), array (  '_controller' => 'fos_user.resetting.controller:requestAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_user_resetting_request;
            }

            return $ret;
        }
        not_fos_user_resetting_request:

        // fos_user_resetting_send_email
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)resetting/send\\-email$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_resetting_send_email']), array (  '_controller' => 'fos_user.resetting.controller:sendEmailAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($requestMethod, ['POST'])) {
                $allow = array_merge($allow, ['POST']);
                goto not_fos_user_resetting_send_email;
            }

            return $ret;
        }
        not_fos_user_resetting_send_email:

        // fos_user_resetting_check_email
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)resetting/check\\-email$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_resetting_check_email']), array (  '_controller' => 'fos_user.resetting.controller:checkEmailAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_user_resetting_check_email;
            }

            return $ret;
        }
        not_fos_user_resetting_check_email:

        // fos_user_resetting_reset
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)resetting/reset/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_resetting_reset']), array (  '_controller' => 'fos_user.resetting.controller:resetAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_resetting_reset;
            }

            return $ret;
        }
        not_fos_user_resetting_reset:

        // fos_user_change_password
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)profile/change\\-password$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_change_password']), array (  '_controller' => 'fos_user.change_password.controller:changePasswordAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_fos_user_change_password;
            }

            return $ret;
        }
        not_fos_user_change_password:

        // blog_homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_homepage']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_blog_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'blog_homepage'));
            }

            return $ret;
        }
        not_blog_homepage:

        // blog_show
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/Details/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_show']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::showAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // recherche_blog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/searchblog$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'recherche_blog']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::RechercheBlogAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // ByCategorie
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/categorie/(?P<cat>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'ByCategorie']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::ByCategorieAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // like_blog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/like/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'like_blog']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::likeBlogAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // dislikeblog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/dislikeblog/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'dislikeblog']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::dislikeblogAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // addblog
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)Blog/addblog/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'addblog']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::newAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_addblog;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'addblog'));
            }

            return $ret;
        }
        not_addblog:

        // evenement_index
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/all$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_index']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_evenement_index;
            }

            return $ret;
        }
        not_evenement_index:

        // evenement_show
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_show']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::showAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_evenement_show;
            }

            return $ret;
        }
        not_evenement_show:

        // evenement_new
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/new$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_new']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::newAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_evenement_new;
            }

            return $ret;
        }
        not_evenement_new:

        // evenement_edit
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_edit']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::editAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_evenement_edit;
            }

            return $ret;
        }
        not_evenement_edit:

        // evenement_delete
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_delete']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::deleteAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($requestMethod, ['DELETE'])) {
                $allow = array_merge($allow, ['DELETE']);
                goto not_evenement_delete;
            }

            return $ret;
        }
        not_evenement_delete:

        // evenement_indexclient
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/allc$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_indexclient']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::indexclientAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_evenement_indexclient;
            }

            return $ret;
        }
        not_evenement_indexclient:

        // evenement_showclient
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/(?P<id>[^/]++)/showc$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_showclient']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::showclientAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_evenement_showclient;
            }

            return $ret;
        }
        not_evenement_showclient:

        // evenement_indexb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/admin/allb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_indexb']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::indexAdminAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_evenement_indexb;
            }

            return $ret;
        }
        not_evenement_indexb:

        // evenement_showb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/admin/(?P<id>[^/]++)/showb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_showb']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::showAdminAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_evenement_showb;
            }

            return $ret;
        }
        not_evenement_showb:

        // evenement_newb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/admin/newb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_newb']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::newAdminAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_evenement_newb;
            }

            return $ret;
        }
        not_evenement_newb:

        // evenement_editb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/admin/(?P<id>[^/]++)/editb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_editb']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::editAdminAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_evenement_editb;
            }

            return $ret;
        }
        not_evenement_editb:

        // evenement_deleteb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/admin/(?P<id>[^/]++)/deleteb$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_deleteb']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::deleteAdminAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // evenement_search
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/search$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_search']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::SearchAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // evenement_participer
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/e/(?P<id>[^/]++)/participer$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_participer']), array (  '_controller' => 'EvenementBundle\\Controller\\EvenementController::ParticiperAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // guide_index
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/all$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_index']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_guide_index;
            }

            return $ret;
        }
        not_guide_index:

        // guide_show
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_show']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::showAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_guide_show;
            }

            return $ret;
        }
        not_guide_show:

        // guide_new
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/new$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_new']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::newAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_guide_new;
            }

            return $ret;
        }
        not_guide_new:

        // guide_edit
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_edit']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::editAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_guide_edit;
            }

            return $ret;
        }
        not_guide_edit:

        // guide_delete
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_delete']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::deleteAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($requestMethod, ['DELETE'])) {
                $allow = array_merge($allow, ['DELETE']);
                goto not_guide_delete;
            }

            return $ret;
        }
        not_guide_delete:

        // guide_indexb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/allb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_indexb']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::indexbAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_guide_indexb;
            }

            return $ret;
        }
        not_guide_indexb:

        // guide_showb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/showb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_showb']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::showbAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_guide_showb;
            }

            return $ret;
        }
        not_guide_showb:

        // guide_showclient
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/showclient$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_showclient']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::showclientAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_guide_showclient;
            }

            return $ret;
        }
        not_guide_showclient:

        // guide_newb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/newb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_newb']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::newbAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_guide_newb;
            }

            return $ret;
        }
        not_guide_newb:

        // guide_editb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/editb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_editb']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::editbAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_guide_editb;
            }

            return $ret;
        }
        not_guide_editb:

        // guide_deleteb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/g/(?P<id>[^/]++)/deleteb$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'guide_deleteb']), array (  '_controller' => 'EvenementBundle\\Controller\\GuideController::deletebAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($requestMethod, ['DELETE'])) {
                $allow = array_merge($allow, ['DELETE']);
                goto not_guide_deleteb;
            }

            return $ret;
        }
        not_guide_deleteb:

        // participation_index
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/all$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_index']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_participation_index;
            }

            return $ret;
        }
        not_participation_index:

        // participation_indexb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/admin/all$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_indexb']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::indexbAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_participation_indexb;
            }

            return $ret;
        }
        not_participation_indexb:

        // participation_deleteb
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/(?P<id>[^/]++)/deleteb$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_deleteb']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::deletebAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // participation_show
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/(?P<id>[^/]++)/show$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_show']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::showAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_participation_show;
            }

            return $ret;
        }
        not_participation_show:

        // participation_new
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/new$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_new']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::newAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_participation_new;
            }

            return $ret;
        }
        not_participation_new:

        // participation_edit
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_edit']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::editAction',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                $allow = array_merge($allow, ['GET', 'POST']);
                goto not_participation_edit;
            }

            return $ret;
        }
        not_participation_edit:

        // participation_delete
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/(?P<id>[^/]++)/delete$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_delete']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::deleteAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // participation_approuver
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/pa/(?P<id>[^/]++)/approuver$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'participation_approuver']), array (  '_controller' => 'EvenementBundle\\Controller\\ParticipationController::ApprouverAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // evenement_homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_homepage']), array (  '_controller' => 'EvenementBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_evenement_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'evenement_homepage'));
            }

            return $ret;
        }
        not_evenement_homepage:

        // evenement_backhomepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/b$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'evenement_backhomepage']), array (  '_controller' => 'EvenementBundle\\Controller\\DefaultController::indexBAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // Stat
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)eventment/Stat$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'Stat']), array (  '_controller' => 'EvenementBundle\\Controller\\StatController::statAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // location_homepage
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'location_homepage']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::indexAction',  '_locale' => 'en',  '_S' => '/',));
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_location_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'location_homepage'));
            }

            return $ret;
        }
        not_location_homepage:

        // location_add
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/add$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'location_add']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::addAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // createContract
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/addContract/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'createContract']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::louerAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // deleteLocation
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/deleteLocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteLocation']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::deleteAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // editLocation
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/editLocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'editLocation']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::editAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // localate
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/localate/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'localate']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::louerAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // mylocation
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)location/mylocation$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'mylocation']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::checkoutAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // endroid_qrcode_generate
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)qrcode/(?P<text>[\\w\\W]+)\\.(?P<extension>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'endroid_qrcode_generate']), array (  '_controller' => 'Endroid\\QrCode\\Bundle\\QrCodeBundle\\Controller\\QrCodeController::generateAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // endroid_qrcode_twig_functions
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)qrcode/twig$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'endroid_qrcode_twig_functions']), array (  '_controller' => 'Endroid\\QrCode\\Bundle\\QrCodeBundle\\Controller\\QrCodeController::twigFunctionsAction',  '_locale' => 'en',  '_S' => '/',));
        }

        // fos_js_routing_js
        if (preg_match('#^/(?P<_locale>|fr||ch)(?P<_S>/?)js/routing(?:\\.(?P<_format>js|json))?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_js_routing_js']), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',  '_locale' => 'en',  '_S' => '/',));
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_fos_js_routing_js;
            }

            return $ret;
        }
        not_fos_js_routing_js:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
