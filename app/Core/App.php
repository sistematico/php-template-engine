<?php

namespace Templates\Core;

class App
{
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    public function __construct()
    {
        $this->splitUrl();

        if (!$this->url_controller) {
            $page = new \Templates\Controller\TemplatesController();
            $page->index();
        } else if (file_exists(APP . 'Controller/' . ucfirst($this->url_controller) . 'Controller.php')) {
            $controller = "\\App\\Controller\\" . ucfirst($this->url_controller) . 'Controller';
            $this->url_controller = new $controller();

            if (method_exists($this->url_controller, $this->url_action) &&
                is_callable(array($this->url_controller, $this->url_action))) {
                
                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                } else {
                    $pagina = new \Templates\Controller\TemplatesController();
                    $pagina->erro();
                }
            }
        } else {
            $pagina = new \Templates\Controller\TemplatesController();
            $pagina->erro();
        }
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;
            unset($url[0], $url[1]);
            $this->url_params = array_values($url);
        }
    }
}
