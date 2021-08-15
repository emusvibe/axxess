<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
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
                            All Invoices
                        </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">INVOICE No</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col">AMOUNT</th>
                                        <th scope="col">CREATED</th>                                                                                                
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($invoices as $invoice )                                         
                                      <tr>                       
                                        <td>{{$invoice->id}}</td>
                                        <td>{{$invoice->invoice_id}}</td>
                                        <td>{{$invoice->description}}</td> 
                                        <td>{{$invoice->amount}}</td>
                                        <td>{{$invoice->created_at}}</td>                                                                          
                                      </tr>
                                      @endforeach
                                     
                                    </tbody>
                                  </table>
                            </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                       <div class="card-header">
                           Create Invoice
                       </div>
                       <div class="card-body">
                        <form action="{{route('invoice-store')}}" method="POST">
                            @csrf
                            <div class="form-group">                              
                              <input type="text" name="invoice_id" class="form-control" id="invoice_id" placeholder="INVOICE No">
                              @error('invoice_id')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror                                                          
                            </div>

                            <div class="form-group">                              
                                <input type="text" name="description" class="form-control" id="description" placeholder="Desciption">
                                @error('description')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror                                                          
                            </div>

                            <div class="form-group">                              
                                <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                                @error('amount')
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
