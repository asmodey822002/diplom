<div class="box box-solid box-success kartridj">
            <div class="box-header with-border">
                
            </div>
            <div class="box-body">
                @if(isset($acts_kartridjes->id))
                    <div class="form-group {!! !empty($errors->first('id'))?'has-error':'' !!}">
                        {!!Form::label('id', 'Акт №')!!}
                        {!!Form::text('id[]', $acts_kartridjes->id, ['class'=>'form-control'])!!}
                    </div>
                @endif
                <div class="form-group {!! !empty($errors->first('models_kartridjes_id'))?'has-error':'' !!}">
                    {!!Form::label('models_kartridjes_id', 'Модель картриджа')!!}
                    {!!Form::select('models_kartridjes_id[]', $models_kartridjes, null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group {!! !empty($errors->first('serial_number'))?'has-error':'' !!}">
                    {!! Form::label('serial_number', 'Серийный номер')!!}
                    {!! Form::text('serial_number[]', null, ['class'=>'form-control'])!!}
                </div>
                <div class="form-group  {!! !empty($errors->first('complaint'))?'has-error':'' !!}">
                    {!! Form::label('complaint', 'Жалоба (Со слов клиента)')!!}
                    {!! Form::text('complaint[]', null, ['class'=>'form-control'])!!}
                </div>
            </div>
        </div>