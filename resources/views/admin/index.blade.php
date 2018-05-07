@extends('main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

 <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	@foreach ($users as $u)
      <tr>
        <td>{{ $u->id }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td><a href="{{ route('admin.edit', ['id'=>$u->id]) }}"><i class="fa fa-edit"></i></a></td>
      </tr>
	@endforeach
    </tbody>
  </table>

<hr>

@if(isset($user))
	<h3 class="text-center">Редактировать пользователя {{ $user->name }}</h3>
	{!! Form::model($user, ['route' => ['admin.update', $user->id], 'class'=>'form-horizontal']) !!}
@else
	<h3 class="text-center">Создать пользователя</h3>
	{!! Form::open(['route' => 'admin.store', 'class'=>'form-horizontal']) !!}
@endif



	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Имя</label>

                            <div class="col-md-6">
                            	{{ Form::text('name', old('name'), ['class' => 'form-control', 'required', 'autofocus']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail адрес</label>

                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), ['class'=>'form-control', 'required']) }}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                            	{{ Form::text('password', '', ['class' => 'form-control', 'required']) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Пароль еще раз</label>

                            <div class="col-md-6">
                            	{{ Form::text('password_confirmation', '', ['class' => 'form-control', 'id'=>'password-confirm', 'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

{{ Form::submit('Сохранить данные') }}

@if(isset($user))
	<a class="btn" href="{{ route('admin.index') }}">Новый пользователь (очистить форму)</a>
@endif
                            </div>
                        </div>


	{!! Form::close() !!}


        </div>
	</div>
</div>

@endsection