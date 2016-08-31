<a href="{{ isset($editUrl) ? $editUrl : 'javascript:void(0)' }}" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></a>

@if(isset($deleteUrl))
    {!!
        Form::open([
            'url' => $deleteUrl,
            'method' => 'DELETE',
            'class' => 'inline',
            'style' => 'display:inline;'
        ])
    !!}
        <button type="submit" id="sa-params" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
    {!! Form::close() !!}
@endif
