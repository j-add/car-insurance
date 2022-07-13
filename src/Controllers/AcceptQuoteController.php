<?php

namespace InsuranceApp\Controllers;

use Slim\Views\PhpRenderer;
use InsuranceApp\Models\QuotesModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AcceptQuoteController
{
    private $renderer;
    private $quotesModel;

    public function __construct(PhpRenderer $renderer, QuotesModel $quotesModel)
    {
        $this->renderer = $renderer;
        $this->quotesModel = $quotesModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $post = $request->getParsedBody();
        $this->quotesModel->acceptQuote($post['id']);
        $response = $response->withStatus(200);

        return $response->withHeader('Location', "./quotes");
    }
}

