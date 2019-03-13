<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Student\CreateStudentRequest;
use App\Http\Requests\Backend\Student\DeleteStudentRequest;
use App\Http\Requests\Backend\Student\EditStudentRequest;
use App\Http\Requests\Backend\Student\ManageStudentRequest;
use App\Http\Requests\Backend\Student\StoreStudentRequest;
use App\Http\Requests\Backend\Student\UpdateStudentRequest;
use App\Http\Responses\Backend\BlogTag\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Student\Student;
use App\Repositories\Backend\Student\StudentRepository;

/**
 * Class BlogTagsController.
 */
class StudentsController extends Controller
{
    /**
     * @var \App\Repositories\Backend\Student\StudentRepository
     */
    protected $student;

    /**
     * @param \App\Repositories\Backend\Student\StudentRepository $student
     */
    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    /**
     * @param \App\Http\Requests\Backend\Student\ManageStudentRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageStudentRequest $request)
    {
        return new ViewResponse('backend.students.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Student\CreateStudentRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreateStudentRequest $request)
    {
        return new ViewResponse('backend.students.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Student\StoreStudentRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreStudentRequest $request)
    {
        $this->student->create($request->except('token'));

        return new RedirectResponse(route('admin.students.index'), ['flash_success' => trans('alerts.backend.students.created')]);
    }

    /**
     * @param \App\Models\BlogTags\Student                           $student
     * @param \App\Http\Requests\Backend\Student\EditStudentRequest $request
     *
     * @return \App\Http\Responses\Backend\Student\EditResponse
     */
    public function edit(Student $student, EditStudentRequest $request)
    {
        return new EditResponse($student);
    }

    /**
     * @param \App\Models\Student\Student                              $student
     * @param \App\Http\Requests\Backend\Student\UpdateStudentRequest  $request
     *
     * @return mixed
     */
    public function update(Student $student, UpdateStudentRequest $request)
    {
        $this->student->update($student, $request->except(['_method', '_token']));

        return new RedirectResponse(route('admin.students.index'), ['flash_success' => trans('alerts.backend.students.updated')]);
    }

    /**
     * @param \App\Models\Student\Student                              $student
     * @param \App\Http\Requests\Backend\Student\DeleteStudentRequest $request
     *
     * @return mixed
     */
    public function destroy(Student $student, DeleteStudentRequest $request)
    {
        $this->student->delete($student);

        return new RedirectResponse(route('admin.students.index'), ['flash_success' => trans('alerts.backend.students.deleted')]);
    }
}
