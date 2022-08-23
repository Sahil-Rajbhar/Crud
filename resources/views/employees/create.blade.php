@component('layouts.app')
    <div class="create-container">
        <center><h1 class="heading">Adding new Employee</h1></center>
        <br>            
        {{ Form::open(array('route'=>'employees.store')) }}
            {{ Form::token() }}
            <div class="form-group">    
                {{ Form::label('name', 'name') }} &nbsp; 
                {{ Form::text('name') }}
                @if ($errors->has('name'))
                    <ul>
                        <li><span>{{ $errors->first('name') }}</span></li>
                    </ul>
                @endif
                <br>
                <br>
                {{ Form::label('email', 'email') }} &nbsp;
                {{ Form::email('email') }}
                @if ($errors->has('email'))
                    <ul>
                        <li><span>{{ $errors->first('email') }}</span></li>
                    </ul>
                @endif 
                <br> 
                <br>
                <a href="/employees" class="create-link">Cancel</a> &nbsp;
                {{ Form::submit('Add', ['class' => 'bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded']) }}
            </div>  
        {{ Form::close() }}
    </div>
@endcomponent