<div class="card-body ">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name"  class="bmd-label-floating">Role Name</label>
        {!! Form::text('name', null, ['id'=>'exampleInput11','class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
        @if ($errors->has('name'))
        <span class="help-block">
             <strong class="text-danger text-center">{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
        <label for="permission"  class="bmd-label-floating">Choose Permission</label>
        {!! Form::select('permission[]', $permissions, old('permission') ? old('permission') : $role->permissions()->pluck('name', 'name'), ['class' => 'form-control selectpicker', 'multiple' => 'multiple', 'data-style' => "btn btn-info btn-round"]) !!}
        @if ($errors->has('permission'))
        <span class="help-block">
             <strong class="text-danger text-center">{{ $errors->first('permission') }}</strong>
        </span>
        @endif
    </div>
</div>
