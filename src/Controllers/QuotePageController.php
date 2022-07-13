<?php

namespace InsuranceApp\Controllers;

use Slim\Views\PhpRenderer;
use InsuranceApp\Models\CartypeModel;
use InsuranceApp\Models\CovertypeModel;
use InsuranceApp\Models\QuotesModel;
use InsuranceApp\Utilities\UserFormUtilities;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class QuotePageController
{
    private $renderer;
    private $cartypeModel;
    private $covertypeModel;
    private $quotesModel;

    public function __construct(
        PhpRenderer $renderer,
        CartypeModel $cartypeModel,
        CovertypeModel $covertypeModel,
        QuotesModel $quotesModel,
        UserFormUtilities $userFormUtilities
    ) {
        $this->renderer = $renderer;
        $this->cartypeModel = $cartypeModel;
        $this->covertypeModel = $covertypeModel;
        $this->quotesModel = $quotesModel;
        $this->userFormUtilities = $userFormUtilities;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $post = $request->getParsedBody();
        $carTypeValue = $post['cartype'];
        $coverTypeValue = $post['covertype'];

        $args['carType'] = $this->cartypeModel->getCartypes();
        $args['coverType'] = $this->covertypeModel->getCovertypes();

        $carMultiplierArray = $this->cartypeModel->getMultipliers();
        $coverMultiplierArray = $this->covertypeModel->getMultipliers();
        $customerName = $this->userFormUtilities->sanitiseNameInput($post['customerName']);
        $carValue = $this->userFormUtilities->sanitiseValueInput($post['carValue']);
        $carType = array_search($post['cartype'], $args['carType']);
        $coverType = array_search($post['covertype'], $args['coverType']);
        $carMultiplier = $carMultiplierArray[$carTypeValue];
        $coverMultiplier = $coverMultiplierArray[$coverTypeValue];

        function calculatePercentage(float $value, float $percentage)
        {
            return ($value / 100) * $percentage;
        }

        $insuranceCost = calculatePercentage(floatval($carValue), 15) * floatval($carMultiplier) * floatval(
                $coverMultiplier
            );
        $insuranceCost = number_format($insuranceCost, 2, '.', '');

        $this->quotesModel->addNewQuote($customerName, $carType, $coverType, $insuranceCost);
        $quoteId = $this->quotesModel->getLastQuoteId();
        $args['id'] = $quoteId;
        $args['singleQuote'] = $this->quotesModel->getQuoteById($quoteId);
        return $this->renderer->render($response, "quote.phtml", $args);
    }
}
