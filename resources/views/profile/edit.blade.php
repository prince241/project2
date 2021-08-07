
   @extends('users.layouts.app')
   @section('content') 
                <section id="basic-horizontal-layouts">
             <div class="row match-height">
                        
                 <div class="col-md-6 col-8" style =
                        " margin: left;
                         width: 60%;
                         border: 3px 
                         padding: 10px;">
                       <div class="card" style="height: 500.75px;">
                           <div class="card-header">
                               <h4 class="card-title">Profile Edit </h4>
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
                                   @endif
                           </div>
                           <div class="card-content">
                               <div class="card-body">
                                   <form action="{{ route('profile.update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                       @csrf
                                       <div class="form-body">
                                           <div class="row">
                                               <div class="col-12">
                                                   <div class="form-group row">
                                                       <div class="col-md-4">
                                                           <span>Name</span>
                                                       </div>
                                                       <div class="col-md-8">
                                                           <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}"
                                                               placeholder="name">
                                                                @error('name')
                                                               <i style="color: red; font-size:small">{{ $message }}</i>
                                                           @enderror 
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group row">
                                                       <div class="col-md-4">
                                                           <span>Address</span>
                                                       </div>
                                                       <div class="col-md-8">
                                                           <input type="text" id="address" class="form-control" name="address" value="{{ $user->address }}"
                                                               placeholder="address"/>
                                                                @error('address')
                                                               <i style="color: red; font-size:small">{{ $message }}</i>
                                                           @enderror 
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group row">
                                                       <div class="col-md-4">
                                                           <span>City</span>
                                                       </div>
                                                       <div class="col-md-8">
                                                           <input type="text" id="city" class="form-control" name="city" value="{{ $user->city }}"
                                                               placeholder="city" >
                                                                @error('city')
                                                               <i style="color: red; font-size:small">{{ $message }}</i>
                                                           @enderror 
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-12" >
                                                   <div class="form-group row">
                                                       <div class="col-md-4">
                                                           <span>State</span>
                                                       </div>
                                                       <div class="col-md-8">
                                                           <input type="text" id="text" class="form-control" name="state" value="{{ $user->state }}"
                                                               placeholder="state">
                                                                @error('state')
                                                               <i style="color: red; font-size:small">{{ $message }}</i>
                                                           @enderror 
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-12">
                                                   <div class="form-group row">
                                                       <div class="col-md-4">
                                                           <span>profile image</span>
                                                       </div>
                                                       <div class="col-md-8">
                                                       <input type="file"  name="image" class="form-control"/>
                                                        @error('profile image')
                                                       <i style="color: red; font-size:small">{{ $message }}</i>
                                                   @enderror 
                                                   </div>
                                           
                                               </div>
                                               <div class="col-md-8 offset-md-4">
                                                   <button type="submit"
                                                       class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                               </div>
                                           
                                            </div>
                                         </div>
                                      </div>
                                   </form>  
                                    </div>
                                
                                </div>
                             </div>
                       </div>
                   

                 <div class="col-md-4 col-8">
                     <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">password change form</h4>

                                    {{-- @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        <span class="closebtn float-right" onclick="this.parentElement.style.display='none';">&times;</span>
                                        <b>Success update:</b>
                                        @if (is_array(session('success')))
                                        <ul class='m-0'>
                                            @foreach(session('success') as $message)
                                                <li>{{ $message }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                        {{ session('success') }}
                                        @endif
                                        @endif --}}
                            
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('update.password') }}" method="POST"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span> Old Password</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="password" id="first-name " class="form-control" name="oldpassword" placeholder="Old Password" >
                                                                    @error('oldpassword')
                                                                    <i style="color: red; font-size:small">{{ $message }}</i>
                                                                @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span>New Password</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="password" id="asdasd" class="form-control" name="newpassword" placeholder="New Password" >
                                                                    @error('newpassword')
                                                                    <i style="color: red; font-size:small">{{ $message }}</i>
                                                                @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group row">
                                                            <div class="col-md-4">
                                                                <span> Confirm Password</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="position-relative has-icon-left">
                                                                    <input type="password" id="pass-icon" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                                                                    @error('confirmpassword')
                                                                    <i style="color: red; font-size:small">{{ $message }}</i>
                                                                @enderror
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-lock"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 offset-md-4">
                                                  <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>                                                   
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
                @endsection