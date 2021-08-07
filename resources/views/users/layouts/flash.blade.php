@if (isset($errors) && count($errors))
                <div class="alert alert-danger">
                    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <b>Sorry, but there was an error:</b>
                    <ul class='m-0'>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <b>Success:</b>
                    @if (is_array(session('success')))
                    <ul class='m-0'>
                        @foreach(session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @else
                    {{ session('success') }}
                    @endif
                </div>
            @endif

            @if(session('flash'))
            <div class="alert alert-{{session('level')}} alert-flash col-md-4"
                role="alert" id="alert_box">
            <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>{{{(session('level')=='success')?'Success':'Error'}}}!</strong>
                    {{ session('flash') }}
                </div>
            @endif







{{-- @if (isset($errors) && count($errors))
                <div class="alert alert-danger">
                    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <b>Sorry, but there was an error:</b>
                    <ul class='m-0'>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <b>Success:</b>
                    @if (is_array(session('success')))
                    <ul class='m-0'>
                        @foreach(session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @else
                    {{ session('success') }}
                    @endif
                </div>
            @endif

            @if(session('flash'))
            <div class="alert alert-{{session('level')}} alert-flash col-md-4"
                role="alert" id="alert_box">
            <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>{{{(session('level')=='success')?'Success':'Error'}}}!</strong>
                    {{ session('flash') }}
                </div>
            @endif --}}
