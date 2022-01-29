<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $incidentCategory->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mnemonic_name') }}
            {{ Form::text('mnemonic_name', $incidentCategory->mnemonic_name, ['class' => 'form-control' . ($errors->has('mnemonic_name') ? ' is-invalid' : ''), 'placeholder' => 'Mnemonic Name']) }}
            {!! $errors->first('mnemonic_name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('icon') }}
            {{ Form::text('icon', $incidentCategory->icon, ['class' => 'form-control' . ($errors->has('icon') ? ' is-invalid' : ''), 'placeholder' => 'Icon']) }}
            {!! $errors->first('icon', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rating') }}
            {{ Form::text('rating', $incidentCategory->rating, ['class' => 'form-control' . ($errors->has('rating') ? ' is-invalid' : ''), 'placeholder' => 'Rating']) }}
            {!! $errors->first('rating', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::select('status', [1 => 'Активна', 0 => 'Не активна'], $incidentCategory->status,
                ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : '')])
            }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </div>
</div>
