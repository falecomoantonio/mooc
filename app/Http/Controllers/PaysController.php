<?php

namespace Mooc\Http\Controllers;

use Illuminate\Http\Request;

use Mooc\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Mooc\Http\Requests\PayCreateRequest;
use Mooc\Http\Requests\PayUpdateRequest;
use Mooc\Repositories\PayRepository;
use Mooc\Validators\PayValidator;

/**
 * Class PaysController.
 *
 * @package namespace Mooc\Http\Controllers;
 */
class PaysController extends Controller
{
    /**
     * @var PayRepository
     */
    protected $repository;

    /**
     * @var PayValidator
     */
    protected $validator;

    /**
     * PaysController constructor.
     *
     * @param PayRepository $repository
     * @param PayValidator $validator
     */
    public function __construct(PayRepository $repository, PayValidator $validator)
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
        $pays = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pays,
            ]);
        }

        return view('pays.index', compact('pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PayCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PayCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $pay = $this->repository->create($request->all());

            $response = [
                'message' => 'Pay created.',
                'data'    => $pay->toArray(),
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
        $pay = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $pay,
            ]);
        }

        return view('pays.show', compact('pay'));
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
        $pay = $this->repository->find($id);

        return view('pays.edit', compact('pay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PayUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PayUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $pay = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Pay updated.',
                'data'    => $pay->toArray(),
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
                'message' => 'Pay deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Pay deleted.');
    }
}
