<div class="w-full max-w-xs">
    @csrf
    <div class="mb-4">
        {{ Form::label('name', 'Name' , ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}    
        {{ Form::text('name', null ,['class'=>'shadow appearance-none border border-blue-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline']) }}<br><br>
        <p class="name-error"></p>
        @if ($errors->has('name'))
            <ul>
                <li>
                    <span class="text-danger" id="error_name">
                        {{ $errors->first('name') }} 
                    </span>
                </li>
            </ul>
        @endif
    </div>
    <div class="mb-6">
        {{ Form::label('email', 'Email', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}  
        {{ Form::email('email', null, ['class'=>'shadow appearance-none border border-blue-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline' ,'id'=>'email']) }}<br><br>
        <p class="text-danger email-error"></p>    
        @if ($errors->has('email'))
            <ul>
                <li>
                    <span class="text-danger" id="error_email">
                        {{ $errors->first('email') }}
                    </span>
                </li>
            </ul>
        @endif
    </div>        
    <div class="flex items-center justify-between">    
        <a href="/employees" class="bg-white hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Cancel</a>
        {{ Form::submit('Submit', ['class' => 'bg-blue-500 hover:bg-white text-white hover:text-blue-500 font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded' ,'id'=>'submit-button']) }}
    </div>
    <br>
    <p class="text-center text-gray-500 text-xs">
        &copy;2022 Canvas Craft Media. All rights reserved.
    </p>            
</div> 
