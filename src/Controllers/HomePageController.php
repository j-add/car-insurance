<?php

namespace InsuranceApp\Controllers;

use Slim\Views\PhpRenderer;
use InsuranceApp\Models\CartypeModel;
use InsuranceApp\Models\CovertypeModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomePageController
{
    private $renderer;
    private $cartypeModel;
    private $covertypeModel;

    public function __construct(PhpRenderer $renderer, CartypeModel $cartypeModel, CovertypeModel $covertypeModel)
    {
        $this->renderer = $renderer;
        $this->cartypeModel = $cartypeModel;
        $this->covertypeModel = $covertypeModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['cartypes'] = $this->cartypeModel->getCartypes();
        $args['covertypes'] = $this->covertypeModel->getCovertypes();

        return $this->renderer->render($response, "index.phtml", $args);
    }
}

