@extends('base')

@section('title', 'Toneelstukken - Toneelstuk toevoegen')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Voorstelling bewerken</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ action("BackendController@ShowPerformanceEdit", $id) }}">
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
                <!-- name -->
                    <div class="form-group{{ $errors->has('datePerformance') ? ' has-error' : '' }}">
                        <label for="datePerformance" class="col-md-4 control-label">Datum voorstelling: </label>

                        <div class="col-md-6" id="datePickerContainer">
                            <div class="input-group date">
                                <input id="datePerformance" type="text" class="form-control" name="datePerformance"
                                       value="{{ old('datePerformance') != null ? old('datePerformance') : $performande_active->date}}"
                                ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>


                            @if ($errors->has('datePerformance'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('datePerformance') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('hourPerformance') ? ' has-error' : '' }}">
                        <label for="hourPerformance" class="col-md-4 control-label">Uur voorstelling: </label>

                        <div class="col-md-6">
                            <div class="input-group clockpicker">
                                <input type="text" class="form-control input-small" name="hourPerformance"
                                       value="{{ old('hourPerformance') != null ? old('hourPerformance') : $performande_active->hour}}">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            </div>
                            @if ($errors->has('hourPerformance'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('hourPerformance') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('seatingType') ? ' has-error' : '' }}">
                        <label for="seatingType" class="col-md-4 control-label">Reservatieplan: </label>

                        <div class="col-md-6">
                            <label class="radio-inline"><input type="radio" value="fixed_seat_choice" name="seatingType" @if ($performande_active->seatingType == "fixed_seat_choice") checked @endif>Vaste zit</label>
                            <label class="radio-inline"><input type="radio" value="free_admission" name="seatingType" @if ($performande_active->seatingType == "free_admission") checked @endif>Vrije toegang</label>

                            @if ($errors->has('seatingType'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('seatingType') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('performanceEnabled') ? ' has-error' : '' }}">
                        <label for="performanceEnabled" class="col-md-4 control-label">Ingeschakeld: </label>

                        <div class="col-md-6">
                            <div class="checkbox-inline">
                                <input id="playEnabled" name="playEnabled" type="checkbox" value="true"
                                       @if (old('performanceEnabled') == "true" OR $performande_active->enabled == "true") checked @endif>
                            </div>

                            @if ($errors->has('performanceEnabled'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('performanceEnabled') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('page_content') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Toneelstuk extra info: </label>
                        <div class="col-md-6">

                            Deze info komt bij het evenement te staan


                            @if ($errors->has('page_content'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('page_content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea name="page_content" id="summernote">{{ old('page_content') != null ? old('page_content') : $performande_active->page_content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary col-md-offset-1"
                                    onclick="this.disabled=true;this.value='Verzenden, even geduld...';this.form.submit();">
                                Bewerk
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