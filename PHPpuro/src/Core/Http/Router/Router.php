<?php

namespace MentesBrilhantes\Core\Http\Router;

use MentesBrilhantes\Core\Container;
use MentesBrilhantes\Core\Http\Request;

class Router
{

    private $methods = ['GET', 'POST'];
    private $routes = [];

    public function __call($name, $args)
    {
        if (in_array(strtoupper($name), $this->methods)) {
            list($uri, $callable) = $args;
            $this->routes[strtoupper($name)][$uri] = $callable;
        }
    }

    public function run(Container $di)
    {
        $found = false;
        $uriServer = $_SERVER['REQUEST_URI'];
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        foreach ($this->routes[$method] as $uri => $callable) {
            $ex1 = explode('/', $uriServer);
            $ex2 = explode('/', $uri);
            if (count($this->clear($ex1)) == count($this->clear($ex2))) {
                $params = array_combine($ex2, $ex1);

                $req = new Request($params != false ? $this->clear($params) : []);
                $di->add(Request::class, $req);
                $pattern = '/(:\w*)/';
                $replace = array_filter(explode('/', $uriServer), function ($item) {
                    return !empty($item);
                });

                $variables = preg_grep($pattern, explode('/', $uri));

                $result = array_map(function ($item) {
                    return str_replace('/', '', $item);
                }, array_filter(preg_split($pattern, $uri), function ($item) {
                    return !empty($item);
                }));

                $arrayKeys = array_keys($variables);

                foreach ($arrayKeys as $key => $indice) {
                    unset($replace[$indice]);
                }
                $found = !array_diff($replace, $result);
                if ($found) {
                    if (gettype($callable) == 'string') {
                        if (strpos($callable, '@') === false) {
                            $callable($req);
                        } else {
                            list($class, $action) = explode('@', $callable);
                            $ex = new Executor();
                            $ex->setDi($di);
                            $ex->setRc(new \ReflectionClass($class));
                            $ex->execute($action);
                        }
                    } else {
                        $callable($req);
                        echo '<br>';
                    }
                    return;
                }
            }
        }
        if (!$found) {
            echo 'not found';
        }
    }

    public function clear(array $array)
    {
        return array_filter($array, function ($el) {
            return !empty($el);
        });
    }
}
