<?php

namespace Mooc\Http\Controllers;

use Illuminate\Http\Request;

use Mooc\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Mooc\Http\Requests\SaleItemCreateRequest;
use Mooc\Http\Requests\SaleItemUpdateRequest;
use Mooc\Repositories\SaleItemRepository;
use Mooc\Validators\SaleItemValidator;

/**
 * Class SaleItemsController.
 *
 * @package namespace Mooc\Http\Controllers;
 */
class SaleItemsController extends Controller
{
    /**
     * @var SaleItemRepository
     */
    protected $repository;

    /**
     * @var SaleItemValidator
     */
    protected $validator;

    /**
     * SaleItemsController constructor.
     *
     * @param SaleItemRepository $repository
     * @param SaleItemValidator $validator
     */
    public function __construct(SaleItemRepository $repository, SaleItemValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $saleItems = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $saleItems,
            ]);
        }

        return view('saleItems.index', compact('saleItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaleItemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SaleItemCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $saleItem = $this->repository->create($request->all());

            $response = [
                'message' => 'SaleItem created.',
                'data'    => $saleItem->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saleItem = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $saleItem,
            ]);
        }

        return view('saleItems.show', compact('saleItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $saleItem = $this->repository->find($id);

        return view('saleItems.edit', compact('saleItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SaleItemUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SaleItemUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $saleItem = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'SaleItem updated.',
                'data'    => $saleItem->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'SaleItem deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SaleItem deleted.');
    }
}
