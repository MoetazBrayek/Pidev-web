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

        if (0 === strpos($pathinfo, '/_')) {
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
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/contact')) {
            // contacus_homepage
            if ('/contact' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'ContacusBundle\\Controller\\DefaultController::indexAction',  '_route' => 'contacus_homepage',);
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
            if ('/contact/aboutus' === $pathinfo) {
                return array (  '_controller' => 'ContacusBundle\\Controller\\DefaultController::indexAction',  '_route' => 'aboutus',);
            }

            // contact
            if ('/contact' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::contactAction',  '_route' => 'contact',);
            }

        }

        elseif (0 === strpos($pathinfo, '/Admin')) {
            // admin_homepage
            if ('/Admin' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::indexAction',  '_route' => 'admin_homepage',);
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
            if ('/Admin/blog/new' === $pathinfo) {
                return array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::newAction',  '_route' => 'blog_new',);
            }

            // all_blog
            if ('/Admin/blogs' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherblogsAction',  '_route' => 'all_blog',);
            }

            // blog_delete
            if (0 === strpos($pathinfo, '/Admin/Delete') && preg_match('#^/Admin/Delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_delete']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::deleteAction',));
            }

            // admin_users
            if ('/Admin/users' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherUserAction',  '_route' => 'admin_users',);
            }

            // status
            if (0 === strpos($pathinfo, '/Admin/status') && preg_match('#^/Admin/status/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'status']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::StatusAction',));
            }

            // affiche_msg
            if ('/Admin/messages' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherMsgAction',  '_route' => 'affiche_msg',);
            }

            // msg_detais
            if (0 === strpos($pathinfo, '/Admin/msg_detais') && preg_match('#^/Admin/msg_detais/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'msg_detais']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::MsgDetaisAction',));
            }

            // all_produits
            if ('/Admin/produits' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherProductsAction',  '_route' => 'all_produits',);
            }

            // delete_prod
            if (0 === strpos($pathinfo, '/Admin/removeprod') && preg_match('#^/Admin/removeprod/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'delete_prod']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::RemoveProdAction',));
            }

            // delete_blog
            if (0 === strpos($pathinfo, '/Admin/removeblog') && preg_match('#^/Admin/removeblog/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'delete_blog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::RemoveAction',));
            }

            // edit_profile
            if ('/Admin/edit_profile' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::edit_profileAction',  '_route' => 'edit_profile',);
            }

            // new_blog
            if ('/Admin/newblog' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::newAction',  '_route' => 'new_blog',);
            }

            // blog_edit
            if (preg_match('#^/Admin/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_edit']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::editBlogAction',));
            }

            // newCatgoriesBlog
            if ('/Admin/newcatblog' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::newCatgoriesAction',  '_route' => 'newCatgoriesBlog',);
            }

            // newCatgoriesShop
            if ('/Admin/newcatshop' === $pathinfo) {
                return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::newCatgoriesShopAction',  '_route' => 'newCatgoriesShop',);
            }

            if (0 === strpos($pathinfo, '/Admin/a')) {
                // addproduct
                if ('/Admin/addproduct' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::addProdctAction',  '_route' => 'addproduct',);
                }

                // add_location_products
                if ('/Admin/add_location_products' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\LocationController::addAction',  '_route' => 'add_location_products',);
                }

                // all_location_products
                if ('/Admin/all_location_products' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\LocationController::AfficherLocationAction',  '_route' => 'all_location_products',);
                }

                // acceptblog
                if (0 === strpos($pathinfo, '/Admin/acceptblog') && preg_match('#^/Admin/acceptblog/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => 'acceptblog']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::acceptblogAction',));
                }

                // affichecontract
                if ('/Admin/affichecontract' === $pathinfo) {
                    return array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::AfficherContractAction',  '_route' => 'affichecontract',);
                }

            }

            // editProdct
            if (0 === strpos($pathinfo, '/Admin/editProdct') && preg_match('#^/Admin/editProdct/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editProdct']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::editProdctAction',));
            }

            // editlocation
            if (0 === strpos($pathinfo, '/Admin/editlocation') && preg_match('#^/Admin/editlocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'editlocation']), array (  '_controller' => 'AdminBundle\\Controller\\LocationController::editlocationAction',));
            }

            // deletelocation
            if (0 === strpos($pathinfo, '/Admin/deletelocation') && preg_match('#^/Admin/deletelocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deletelocation']), array (  '_controller' => 'AdminBundle\\Controller\\LocationController::deletelocationAction',));
            }

            // reply
            if (0 === strpos($pathinfo, '/Admin/reply') && preg_match('#^/Admin/reply/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'reply']), array (  '_controller' => 'AdminBundle\\Controller\\SendController::createAction',));
            }

            // sentiments
            if (0 === strpos($pathinfo, '/Admin/sentiments') && preg_match('#^/Admin/sentiments/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'sentiments']), array (  '_controller' => 'AdminBundle\\Controller\\SentimentController::SentimentAction',));
            }

            // confirmcontrat
            if (0 === strpos($pathinfo, '/Admin/confirmcontrat') && preg_match('#^/Admin/confirmcontrat/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'confirmcontrat']), array (  '_controller' => 'AdminBundle\\Controller\\DefaultController::ConfirmContractAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/Shop')) {
            // shop_homepage
            if ('/Shop' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::indexAction',  '_route' => 'shop_homepage',);
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
            if (0 === strpos($pathinfo, '/Shop/details') && preg_match('#^/Shop/details/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'shop_details']), array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::detailsAction',));
            }

            // deletech
            if (0 === strpos($pathinfo, '/Shop/delete') && preg_match('#^/Shop/delete/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deletech']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::deletechAction',));
            }

            // shop_addtopanier
            if (0 === strpos($pathinfo, '/Shop/panier') && preg_match('#^/Shop/panier/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'shop_addtopanier']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::addToPanierAction',));
            }

            // myproduct
            if ('/Shop/myproduct' === $pathinfo) {
                return array (  '_controller' => 'ShopBundle\\Controller\\DefaultController::myproductAction',  '_route' => 'myproduct',);
            }

            // checkout
            if ('/Shop/checkout' === $pathinfo) {
                return array (  '_controller' => 'ShopBundle\\Controller\\PanierController::checkoutAction',  '_route' => 'checkout',);
            }

            // orders
            if (0 === strpos($pathinfo, '/Shop/orders') && preg_match('#^/Shop/orders/(?P<total>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'orders']), array (  '_controller' => 'ShopBundle\\Controller\\PanierController::orderAction',));
            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/lo')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ('/login' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.security.controller:loginAction',  '_route' => 'fos_user_security_login',);
                    if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                        $allow = array_merge($allow, ['GET', 'POST']);
                        goto not_fos_user_security_login;
                    }

                    return $ret;
                }
                not_fos_user_security_login:

                // fos_user_security_check
                if ('/login_check' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.security.controller:checkAction',  '_route' => 'fos_user_security_check',);
                    if (!in_array($requestMethod, ['POST'])) {
                        $allow = array_merge($allow, ['POST']);
                        goto not_fos_user_security_check;
                    }

                    return $ret;
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ('/logout' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.security.controller:logoutAction',  '_route' => 'fos_user_security_logout',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_security_logout;
                }

                return $ret;
            }
            not_fos_user_security_logout:

            if (0 === strpos($pathinfo, '/location')) {
                // location_homepage
                if ('/location' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::indexAction',  '_route' => 'location_homepage',);
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

                if (0 === strpos($pathinfo, '/location/add')) {
                    // location_add
                    if ('/location/add' === $pathinfo) {
                        return array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::addAction',  '_route' => 'location_add',);
                    }

                    // createContract
                    if (0 === strpos($pathinfo, '/location/addContract') && preg_match('#^/location/addContract/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, ['_route' => 'createContract']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::louerAction',));
                    }

                }

                // deleteLocation
                if (0 === strpos($pathinfo, '/location/deleteLocation') && preg_match('#^/location/deleteLocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteLocation']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::deleteAction',));
                }

                // editLocation
                if (0 === strpos($pathinfo, '/location/editLocation') && preg_match('#^/location/editLocation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => 'editLocation']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::editAction',));
                }

                // localate
                if (0 === strpos($pathinfo, '/location/localate') && preg_match('#^/location/localate/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => 'localate']), array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::louerAction',));
                }

                // mylocation
                if ('/location/mylocation' === $pathinfo) {
                    return array (  '_controller' => 'LocationBundle\\Controller\\DefaultController::checkoutAction',  '_route' => 'mylocation',);
                }

            }

        }

        elseif (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if ('/profile' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'fos_user.profile.controller:showAction',  '_route' => 'fos_user_profile_show',);
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
            if ('/profile/edit' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.profile.controller:editAction',  '_route' => 'fos_user_profile_edit',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_profile_edit;
                }

                return $ret;
            }
            not_fos_user_profile_edit:

            // fos_user_change_password
            if ('/profile/change-password' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.change_password.controller:changePasswordAction',  '_route' => 'fos_user_change_password',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_change_password;
                }

                return $ret;
            }
            not_fos_user_change_password:

        }

        elseif (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if ('/register' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'fos_user.registration.controller:registerAction',  '_route' => 'fos_user_registration_register',);
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
            if ('/register/check-email' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.registration.controller:checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_fos_user_registration_check_email;
                }

                return $ret;
            }
            not_fos_user_registration_check_email:

            if (0 === strpos($pathinfo, '/register/confirm')) {
                // fos_user_registration_confirm
                if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_registration_confirm']), array (  '_controller' => 'fos_user.registration.controller:confirmAction',));
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_fos_user_registration_confirm;
                    }

                    return $ret;
                }
                not_fos_user_registration_confirm:

                // fos_user_registration_confirmed
                if ('/register/confirmed' === $pathinfo) {
                    $ret = array (  '_controller' => 'fos_user.registration.controller:confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                    if (!in_array($canonicalMethod, ['GET'])) {
                        $allow = array_merge($allow, ['GET']);
                        goto not_fos_user_registration_confirmed;
                    }

                    return $ret;
                }
                not_fos_user_registration_confirmed:

            }

        }

        elseif (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ('/resetting/request' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.resetting.controller:requestAction',  '_route' => 'fos_user_resetting_request',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_fos_user_resetting_request;
                }

                return $ret;
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_user_resetting_reset']), array (  '_controller' => 'fos_user.resetting.controller:resetAction',));
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_fos_user_resetting_reset;
                }

                return $ret;
            }
            not_fos_user_resetting_reset:

            // fos_user_resetting_send_email
            if ('/resetting/send-email' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.resetting.controller:sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                if (!in_array($requestMethod, ['POST'])) {
                    $allow = array_merge($allow, ['POST']);
                    goto not_fos_user_resetting_send_email;
                }

                return $ret;
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ('/resetting/check-email' === $pathinfo) {
                $ret = array (  '_controller' => 'fos_user.resetting.controller:checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_fos_user_resetting_check_email;
                }

                return $ret;
            }
            not_fos_user_resetting_check_email:

        }

        elseif (0 === strpos($pathinfo, '/Blog')) {
            // blog_homepage
            if ('/Blog' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::indexAction',  '_route' => 'blog_homepage',);
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
            if (0 === strpos($pathinfo, '/Blog/Details') && preg_match('#^/Blog/Details/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'blog_show']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::showAction',));
            }

            // recherche_blog
            if ('/Blog/searchblog' === $pathinfo) {
                return array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::RechercheBlogAction',  '_route' => 'recherche_blog',);
            }

            // ByCategorie
            if (0 === strpos($pathinfo, '/Blog/categorie') && preg_match('#^/Blog/categorie/(?P<cat>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'ByCategorie']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::ByCategorieAction',));
            }

            // like_blog
            if (0 === strpos($pathinfo, '/Blog/like') && preg_match('#^/Blog/like/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'like_blog']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::likeBlogAction',));
            }

            // dislikeblog
            if (0 === strpos($pathinfo, '/Blog/dislikeblog') && preg_match('#^/Blog/dislikeblog/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'dislikeblog']), array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::dislikeblogAction',));
            }

            // addblog
            if ('/Blog/addblog' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'BlogBundle\\Controller\\DefaultController::newAction',  '_route' => 'addblog',);
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

        }

        elseif (0 === strpos($pathinfo, '/qrcode')) {
            // endroid_qrcode_generate
            if (preg_match('#^/qrcode/(?P<text>[\\w\\W]+)\\.(?P<extension>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'endroid_qrcode_generate']), array (  '_controller' => 'Endroid\\QrCode\\Bundle\\QrCodeBundle\\Controller\\QrCodeController::generateAction',));
            }

            // endroid_qrcode_twig_functions
            if ('/qrcode/twig' === $pathinfo) {
                return array (  '_controller' => 'Endroid\\QrCode\\Bundle\\QrCodeBundle\\Controller\\QrCodeController::twigFunctionsAction',  '_route' => 'endroid_qrcode_twig_functions',);
            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#sD', $pathinfo, $matches)) {
            $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'fos_js_routing_js']), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
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
