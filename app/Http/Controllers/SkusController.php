<?php

namespace Mooc\Http\Controllers;

use Illuminate\Http\Request;

use Mooc\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Mooc\Http\Requests\SkuCreateRequest;
use Mooc\Http\Requests\SkuUpdateRequest;
use Mooc\Repositories\SkuRepository;
use Mooc\Validators\SkuValidator;

/**
 * Class SkusController.
 *
 * @package namespace Mooc\Http\Controllers;
 */
class SkusController extends Controller
{
    /**
     * @var SkuRepository
     */
    protected $repository;

    /**
     * @var SkuValidator
     */
    protected $validator;

    /**
     * SkusController constructor.
     *
     * @param SkuRepository $repository
     * @param SkuValidator $validator
     */
    public function __construct(SkuRepository $repository, SkuValidator $validator)
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
        $skus = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $skus,
            ]);
        }

        return view('skus.index', compact('skus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SkuCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SkuCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $sku = $this->repository->create($request->all());

            $response = [
                'message' => 'Sku created.',
                'data'    => $sku->toArray(),
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
        $sku = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $sku,
            ]);
        }

        return view('skus.show', compact('sku'));
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
        $sku = $this->repository->find($id);

        return view('skus.edit', compact('sku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SkuUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SkuUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $sku = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Sku updated.',
                'data'    => $sku->toArray(),
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
                'message' => 'Sku deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Sku deleted.');
    }
}
