@extends('layouts.home')
@section('sidebar')
    @parent	
@stop

@section('content')
    <div class="container">
    	<div class="row">
    		<h1>Contacts <button class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus"></span> Add</button></h1>
    		<hr>
    	</div>
    	<div class="row">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <?php $i = 1;?>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->mobile}}</td>
                        <td><button class="btn btn-default btn-border-less"><span class="glyphicon glyphicon-edit text-info"></span></button></td>
                        <td><button class="btn btn-default btn-border-less"><span class="glyphicon glyphicon-trash text-danger"></span></button></td>
                    </tr>
                    @endforeach
                </tbody>                
            </table>    		
    	</div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="addModalLabel">Add Contact</h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
@stop