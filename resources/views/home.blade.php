@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{route('tests.store')}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <select class="selectpicker " data-style="select-with-transition" title="Choose color"  data-size="7" name="note_id" required>
                                    @foreach($notes as $note)
                                        <option value="{{$note->id}}">{{$note->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <select class="selectpicker " data-style="select-with-transition" title="Choose color"  data-size="7" name="administrator_id" required>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn-success btn">Post message</button>
                        </div>
                    </form>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
