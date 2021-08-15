<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                           </div>
                        @endif
                        <div class="card-header">
                            All Customers
                        </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Modify</th>                                                         
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($customers as $customer )                                         
                                      <tr>                       
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->username}}</td> 
                                        <td>{{$customer->address}}</td>
                                        <td>{{$customer->balance}}</td>   
                                        <td><a href="{{url('customer/edit/'.$customer->id)}}" class="btn btn-success">Edit</a></td> 
                                        <td><a href="{{url('customer/delete/'.$customer->id)}}" class="btn btn-danger">Delete</a></td>                                   
                                      </tr>
                                      @endforeach
                                     
                                    </tbody>
                                  </table>
                            </div>
                    </div>
                </div> --}}

                <div class="col-md-6">
                    <div class="card">
                       <div class="card-header">
                           Edit Customer
                       </div>
                       <div class="card-body">
                        <form action="{{url('customer/update/'.$customer->id)}}" method="POST">
                            @csrf
                            <div class="form-group">                              
                              <input type="text" name="name" class="form-control" id="name" value="{{$customer->name}}">
                              @error('name')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror                                                          
                            </div>

                            <div class="form-group">                              
                                <input type="text" name="userName" class="form-control" id="userName" value="{{$customer->username}}">
                                @error('userName')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror                                                          
                            </div>

                            <div class="form-group">                              
                                <input type="text" name="address" class="form-control" id="address" value="{{$customer->address}}">
                                @error('address')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror                                                          
                            </div>

                            <div class="form-group">                              
                                <input type="password" name="password" class="form-control" id="password" value="{{$customer->password}}">
                                @error('password')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror                                                          
                            </div>
                            
                            <div class="form-group">                              
                                <input type="text" name="balance" class="form-control" id="balance" value="{{$customer->balance}}">
                                @error('balance')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror                                                          
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                       </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
</x-app-layout>
