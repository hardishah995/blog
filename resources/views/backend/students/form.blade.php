<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('first_name', trans('labels.backend.students.firstname'), ['class' => 'col-lg-2 control-label required']) }} 
        
        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.students.firstname'), 'required' => 'required']) }} 
             
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
        {{ Form::label('last_name', trans('labels.backend.students.lastname'), ['class' => 'col-lg-2 control-label required']) }} 
        
        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
        {{ Form::text('last_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.students.lastname'), 'required' => 'required']) }} 
        </div><!--col-lg-10-->
    </div><!--form-group-->
    <div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.students.is_active'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            <div class="control-group">
                <label class="control control--checkbox">
            @if(isset($students->status) && !empty ($students->status))
                {{ Form::checkbox('status', 1, true) }}
            @else
                {{ Form::checkbox('status', 1, false) }}
            @endif
            <div class="control__indicator"></div>
                </label>
        </div><!--col-lg-3-->
    </div><!--form control-->
</div><!--box-body-->

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
