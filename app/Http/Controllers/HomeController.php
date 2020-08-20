<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\CommandRepository;
use App\Repositories\ProductRepository;
use App\Repositories\StockReceptionRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productRepository;
    private $commandRepository;
    private $receptionRepository;
    private $supplierRepository;
    private $categoryRepository;
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param ProductRepository $productRepository
     * @param CommandRepository $commandRepository
     * @param StockReceptionRepository $receptionRepository
     * @param SupplierRepository $supplierRepository
     * @param CategoryRepository $categoryRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        CommandRepository $commandRepository,
        StockReceptionRepository $receptionRepository,
        SupplierRepository $supplierRepository,
        CategoryRepository $categoryRepository,
        UserRepository $userRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->commandRepository = $commandRepository;
        $this->receptionRepository = $receptionRepository;
        $this->supplierRepository = $supplierRepository;
        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $nbProducts = $this->productRepository->count();
        $nbCommands = $this->commandRepository->count();
        $nbReceptions = $this->receptionRepository->count();
        $nbSuppliers = $this->supplierRepository->count();
        $nbCategories = $this->categoryRepository->count();
        $nbUsers = $this->userRepository->count();

        $products = $this->productRepository->getNb(2);
        $commands = $this->commandRepository->getNb(2);
        $receptions = $this->receptionRepository->getNb(2);
        $suppliers = $this->supplierRepository->getNb(2);
        $categories = $this->categoryRepository->getNb(2);
        $users = $this->userRepository->getNb(2);

        return response()->json([
            'nbProducts' => $nbProducts->original,
            'nbCommands' => $nbCommands->original,
            'nbReceptions' => $nbReceptions->original,
            'nbSuppliers' => $nbSuppliers->original,
            'nbCategories' => $nbCategories->original,
            'nbUsers' => $nbUsers->original,
            'products' => $products->original,
            'commands' => $commands->original,
            'receptions' => $receptions->original,
            'suppliers' => $suppliers->original,
            'categories' => $categories->original,
            'users' => $users->original,
        ], 200);
    }
}
