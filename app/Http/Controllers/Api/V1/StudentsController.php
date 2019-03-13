<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\StudentResource;
use App\Models\Student\Student;
use App\Repositories\Backend\Student\StudentRepository;
use Illuminate\Http\Request;
use Validator;

class StudentsController extends APIController
{
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the Students.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : 'created_at';

        return StudentResource::collection(
            $this->repository->getForDataTable()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the specified resource.
     *
     * @param Student $student
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Creates the Resource for BlogTag.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = $this->validatingRequest($request);
        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->first());
        }

        $this->repository->create($request->all());

        return new StudentResource(Student::orderBy('created_at', 'desc')->first());
    }

    /**
     * Update Student.
     *
     * @param Student $student
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Student $student)
    {
        $validation = $this->validatingRequest($request, $student->id);

        if ($validation->fails()) {
            return $this->throwValidation($validation);
        }

        $this->repository->update($student, $request->all());

        $student= Student::findOrfail($student->id);

        return new StudentResource($student);
    }

    /**
     * Delete BlogTag.
     *
     * @param Student  $student
     * @param DeleteStudentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Student  $student, Request $request)
    {
        $this->repository->delete($student);

        return ['message'=>'success'];
    }

    /**
     * validate BlogTag.
     *
     * @param $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatingRequest(Request $request, $id = 0)
    {
        $validation = Validator::make($request->all(), [
            'first_name' => 'required|max:191',
            'last_name'  => 'required',
        ]);

        return $validation;
    }
}
