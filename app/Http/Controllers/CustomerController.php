<?php

namespace App\Http\Controllers;

use Crm\Customer\Requests\CreateCustomerRequest;
use Crm\Customer\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        return $this->customerService->index($request);
    }

    public function show($id)
    {
        return $this->customerService->show($id);
    }

    public function create(CreateCustomerRequest $request)
    {
        return $this->customerService->create($request);
    }

    public function update(Request $request, $id)
    {
        return $this->customerService->update($request, $id);
    }

    public function delete(Request $request, $id)
    {
        return $this->customerService->delete($request, $id);
    }


}
