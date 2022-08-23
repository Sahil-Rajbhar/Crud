@component('layouts.app')
    <center><h1 class="edit-title">Updating Employee Data</h1></center>
    <div class="edit-container">
    {{ Form::open(array('route' => array('employees.update', $employee->id), 'method'=>'put'))}}
        {{ Form::token() }}
        <table>
            <tr>
                <td>{{ Form::label('name','name') }}</td>
                <td>{{ Form::text('name', $employee->name) }}<br><br>
                    @if ($errors->has('name'))
                        <ul>
                            <li><span>{{ $errors->first('name') }}</span></li>
                        </ul>
                    @endif
                </td>
            </tr>
            <tr>
                <td>{{ Form::label('email','email') }}</td>
                <td>{{ Form::text('email', $employee->email) }}<br><br>
                    @if ($errors->has('email'))
                        <ul>
                            <li><span class="text-danger">{{ $errors->first('email') }}</span></li>
                        </ul>
                    @endif
                </td>
            </tr>
            <tr>
                <td><a href="/employees" class="cancel-edit">Cancel</a></td>
                <td>
                    {{ Form::submit('Update', ['class' => 'bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded']) }}
                </td>
            </tr>
        </table>    
    {{Form::close()}}
    </div>
@endcomponent