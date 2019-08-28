<?php

namespace Mooc\Http\Controllers;

use Illuminate\Http\Request;

use Mooc\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Mooc\Http\Requests\UtilityClassCreateRequest;
use Mooc\Http\Requests\UtilityClassUpdateRequest;
use Mooc\Repositories\UtilityClassRepository;
use Mooc\Validators\UtilityClassValidator;

/**
 * Class UtilityClassesController.
 *
 * @package namespace Mooc\Http\Controllers;
 */
class UtilityClassesController extends Controller
{
    /**
     * @var UtilityClassRepository
     */
    protected $repository;

    /**
     * @var UtilityClassValidator
     */
    protected $validator;

    /**
     * UtilityClassesController constructor.
     *
     * @param UtilityClassRepository $repository
     * @param UtilityClassValidator $validator
     */
    public function __construct(UtilityClassRepository $repository, UtilityClassValidator $validator)
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
        $utilityClasses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $utilityClasses,
            ]);
        }

        return view('utilityClasses.index', compact('utilityClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UtilityClassCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UtilityClassCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $utilityClass = $this->repository->create($request->all());

            $response = [
                'message' => 'UtilityClass created.',
                'data'    => $utilityClass->toArray(),
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
        $utilityClass = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $utilityClass,
            ]);
        }

        return view('utilityClasses.show', compact('utilityClass'));
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
        $utilityClass = $this->repository->find($id);

        return view('utilityClasses.edit', compact('utilityClass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UtilityClassUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UtilityClassUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $utilityClass = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UtilityClass updated.',
                'data'    => $utilityClass->toArray(),
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
                'message' => 'UtilityClass deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UtilityClass deleted.');
    }
}
