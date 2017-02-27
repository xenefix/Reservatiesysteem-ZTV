@extends('base')

@section('title', 'Toneelstukken - Toneelstuk toevoegen')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Voorstelling "{{$performance->date . " " . $performance->hour}}" verwijderen</h4>
            </div>
            <div class="panel-body">
                WAARSCHUWING! Deze actie is permanent. Bij het verwijderen van een toneelstuk worden ook alle onderliggende reservaties en voorstellingen verwijderd! <hr>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ action("BackendController@ShowPerformanceDelete", $performance->id) }}">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
                    <div class="form-group{{ $errors->has('confirmDelete') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Bevestig verwijderen: </label>

                        <div class="col-md-6">
                            <div class="checkbox">
                                <input id="playEnabled" name="confirmDelete" type="checkbox" value="true">
                            </div>

                            @if ($errors->has('confirmDelete'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('confirmDelete') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-danger "
                                    onclick="this.disabled=true;this.value='Verzenden, even geduld...';this.form.submit();">
                                VERWIJDER!
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!--/panel-body-->
        </div>
        <!--/panel-->
    </div>
    @include('backend.bottom')
@endsection