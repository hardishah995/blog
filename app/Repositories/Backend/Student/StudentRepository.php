<?php

namespace App\Repositories\Backend\Student;

use DB;
//use Carbon\Carbon;
use App\Models\Student\Student;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentRepository.
 */
class StudentRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Student::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
        ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.students.table').'.created_by')
        ->select([
                config('module.students.table').'.id',
                config('module.students.table').'.first_name',
                config('module.students.table').'.last_name',
                config('module.students.table').'.status',
                config('module.students.table').'.created_at',
                config('module.students.table').'.created_by',
                config('access.users_table').'.first_name as created_by',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Student::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.students.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Student $student
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Student $student, array $input)
    {
        if ($this->query()->where('first_name', $input['first_name'])->where('id', '!=', $student->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.students.already_exists'));
        }

        DB::transaction(function () use ($student, $input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['updated_by'] = access()->user()->id;

    	if ($student->update($input))
            return true;

        throw new GeneralException(
                trans('exceptions.backend.students.update_error')
            );
        });
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Student $student
     * @throws GeneralException
     * @return bool
     */
    public function delete(Student $student)
    {
        if ($student->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.students.delete_error'));
    }
}
