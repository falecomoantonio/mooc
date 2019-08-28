<?php

namespace Mooc\Http\Controllers;

use Illuminate\Http\Request;

use Mooc\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Mooc\Http\Requests\RegistrationCourseCreateRequest;
use Mooc\Http\Requests\RegistrationCourseUpdateRequest;
use Mooc\Repositories\RegistrationCourseRepository;
use Mooc\Validators\RegistrationCourseValidator;

/**
 * Class RegistrationCoursesController.
 *
 * @package namespace Mooc\Http\Controllers;
 */
class RegistrationCoursesController extends Controller
{
    /**
     * @var RegistrationCourseRepository
     */
    protected $repository;

    /**
     * @var RegistrationCourseValidator
     */
    protected $validator;

    /**
     * RegistrationCoursesController constructor.
     *
     * @param RegistrationCourseRepository $repository
     * @param RegistrationCourseValidator $validator
     */
    public function __construct(RegistrationCourseRepository $repository, RegistrationCourseValidator $validator)
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
        $registrationCourses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $registrationCourses,
            ]);
        }

        return view('registrationCourses.index', compact('registrationCourses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegistrationCourseCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RegistrationCourseCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $registrationCourse = $this->repository->create($request->all());

            $response = [
                'message' => 'RegistrationCourse created.',
                'data'    => $registrationCourse->toArray(),
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
        $registrationCourse = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $registrationCourse,
            ]);
        }

        return view('registrationCourses.show', compact('registrationCourse'));
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
        $registrationCourse = $this->repository->find($id);

        return view('registrationCourses.edit', compact('registrationCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RegistrationCourseUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RegistrationCourseUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $registrationCourse = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'RegistrationCourse updated.',
                'data'    => $registrationCourse->toArray(),
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
                'message' => 'RegistrationCourse deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RegistrationCourse deleted.');
    }
}
