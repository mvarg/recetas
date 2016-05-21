<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user_list
            if ($pathinfo === '/user') {
                return array (  '_controller' => 'UserBundle\\Controller\\UserController::getAllAction',  '_route' => 'user_list',);
            }

            // user_add
            if ($pathinfo === '/user/add') {
                return array (  '_controller' => 'UserBundle\\Controller\\UserController::addAction',  '_route' => 'user_add',);
            }

            if (0 === strpos($pathinfo, '/user/inset')) {
                // user_insert
                if ($pathinfo === '/user/inset') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_user_insert;
                    }

                    return array (  '_controller' => 'UserBundle\\Controller\\UserController::insertAction',  '_route' => 'user_insert',);
                }
                not_user_insert:

                // user_insert_redirect
                if ($pathinfo === '/user/inset') {
                    return array (  '_controller' => 'UserBundle\\Controller\\UserController::addAction',  'path' => 'user/add',  'permanent' => true,  '_route' => 'user_insert_redirect',);
                }

            }

            // user_mod
            if (0 === strpos($pathinfo, '/user/mod') && preg_match('#^/user/mod/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_mod')), array (  '_controller' => 'UserBundle\\Controller\\UserController::modAction',));
            }

            // user_del
            if (0 === strpos($pathinfo, '/user/del') && preg_match('#^/user/del/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_del')), array (  '_controller' => 'UserBundle\\Controller\\UserController::delAction',));
            }

            // user_get
            if (preg_match('#^/user/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_get')), array (  '_controller' => 'UserBundle\\Controller\\UserController::getByIdAction',));
            }

        }

        if (0 === strpos($pathinfo, '/recipe')) {
            // recipe_list
            if ($pathinfo === '/recipe') {
                return array (  '_controller' => 'RecipeBundle\\Controller\\RecipeController::getAllAction',  '_route' => 'recipe_list',);
            }

            // recipe_add
            if ($pathinfo === '/recipe/add') {
                return array (  '_controller' => 'RecipeBundle\\Controller\\RecipeController::addAction',  '_route' => 'recipe_add',);
            }

            // recipe_mod
            if (0 === strpos($pathinfo, '/recipe/mod') && preg_match('#^/recipe/mod/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'recipe_mod')), array (  '_controller' => 'RecipeBundle\\Controller\\RecipeController::modAction',));
            }

            // recipe_del
            if (0 === strpos($pathinfo, '/recipe/del') && preg_match('#^/recipe/del/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'recipe_del')), array (  '_controller' => 'RecipeBundle\\Controller\\RecipeController::delAction',));
            }

            // recipe_get
            if (preg_match('#^/recipe/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'recipe_get')), array (  '_controller' => 'RecipeBundle\\Controller\\RecipeController::getByIdAction',));
            }

            // recipe_get_slug
            if (0 === strpos($pathinfo, '/recipe-slug') && preg_match('#^/recipe\\-slug/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'recipe_get_slug')), array (  '_controller' => 'RecipeBundle\\Controller\\RecipeController::getBySlugAction',));
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
