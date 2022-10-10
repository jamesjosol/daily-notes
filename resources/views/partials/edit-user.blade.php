
  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog mt-5" role="document">
        <div class="modal-content bg-dark text-white">
        <div class="modal-header">
            <h5 class="modal-title" id="edit-modal-label"><i class="fas fa-edit"></i> Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            {!! Form::open(['route' => ['admin.updateUser', $user->id], 'method'=>'patch', 'id' => 'edit-form']) !!}
                    <div class="form-group dark-input-form-g _auth @error('name') is-invalid @enderror">
                        {!! Form::label('name','<i class="far fa-user"></i> Full Name',[],false) !!}
                        {!! Form::text('name', $user->name, ['class'=>'form-control dark-input-form ' .  ($errors->has('name') ? ' is-invalid' : null), 'id'=>'modal-input-name']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('username') is-invalid @enderror">
                        {!! Form::label('username','<i class="fa fa-user"></i> Username',[],false) !!}
                        {!! Form::text('username', $user->username, ['class'=>'form-control dark-input-form username' .  ($errors->has('username') ? ' is-invalid' : null), 'id'=>'modal-input-username']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('new_password') is-invalid @enderror">
                        {!! Form::label('new_password', '<i class="fas fa-key"></i> New Password',[],false) !!}
                        {!! Form::password('new_password', ['class'=>'form-control dark-input-form' .  ($errors->has('new_password') ? ' is-invalid' : null), 'placeholder'=>'leave blank if doesn\'t want to change password.']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('new_password') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('password_confirmation') is-invalid @enderror">
                        {!! Form::label('password_confirmation', '<i class="fas fa-key"></i> Confirm New Password',[],false) !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control dark-input-form' .  ($errors->has('password_confirmation') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                    <div class="mb-3 form-group dark-input-form-g @error('role') has-error @enderror">
                        {!! Form::label('role','Role',[],false) !!}
                        
                        @if (auth()->user()->id == $user->id)
                            {{Form::select('role', [
                                2 => 'Normal',
                                1 => 'Administrator',
                            ], $user->role, ['class'=>'form-control form-select dark-input-form not-allowed', 'id'=>'modal-input-role', 'disabled' => 'disabled'])}}
                        @else
                            {{Form::select('role', [
                                2 => 'Normal',
                                1 => 'Administrator',
                            ], $user->role, ['class'=>'form-control form-select dark-input-form', 'id'=>'modal-input-role'])}}
                        @endif 
                        <span class="errspan" id="errspan">{{ $errors->first('role') }}</span>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary px-4" onclick="btnload('Saving...')" id="actionBtn" type="submit"><i class="fas fa-save"></i> Save</button>
                    </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $(document).on('click', "#edit-user", function() {
            $(this).addClass('edit-user-trigger-clicked');

            var options = {
            'backdrop': 'static'
            };
            $('#edit-modal').modal(options)
        }) 
    })
</script>
