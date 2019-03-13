<?php

namespace Tests\Unit\Models;

use App\Models\Access\User\User;
use App\Models\Student\Student;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /** @test */
    public function it_has_a_creator()
    {
        $this->actingAs($this->admin);

        $stu = create(Student::class, ['created_by' => access()->id()]);

        $this->assertInstanceOf(User::class, $stu->creator);

        $this->assertEquals($stu->creator->id, access()->id());
    }
}
