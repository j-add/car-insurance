<?php

namespace InsuranceApp\Controllers;

use Slim\Views\PhpRenderer;
use InsuranceApp\Models\QuotesModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AllQuotesController
{
    private $renderer;
    private $quotesModel;

    public function __construct(PhpRenderer $renderer, QuotesModel $quotesModel)
    {
        $this->renderer = $renderer;
        $this->quotesModel = $quotesModel;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $args['unaccepted'] = $this->quotesModel->getUnacceptedQuotes();
        $args['accepted'] = $this->quotesModel->getAcceptedQuotes();

        return $this->renderer->render($response, "allQuotes.phtml", $args);
    }
}
