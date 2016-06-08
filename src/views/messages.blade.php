@if($errors->all())
    <ul class="list-unstyled">
        @foreach($errors->all() as $error)
            <li class="alert alert-warning"><button type="button" class="close pull-right" data-dismiss="alert">&times;</button>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@if(Session::get('success') || Session::get('error') || Session::get('status'))
    <ul class="list-unstyled">
        @if(Session::get('success'))
            <li class="alert alert-success">{{ Session::get('success') }} <button type="button" class="close" data-dismiss="alert">&times;</button></li>
        @elseif(Session::get('error'))
            <li class="alert alert-danger">{{ Session::get('error') }} <button type="button" class="close" data-dismiss="alert">&times;</button></li>
        @elseif(Session::get('status'))
            <li class="alert alert-info">{{ Session::get('status') }} <button type="button" class="close" data-dismiss="alert">&times;</button></li>
        @endif
    </ul>
@endif