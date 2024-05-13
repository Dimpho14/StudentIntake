<x-layout>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="/main-modal.css">
  
  <!-- jQuery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> 
  
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 
  
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> 
  
  
  </head>
  <body>
  
  <div class="container">
  <div class="table-wrapper">
    <div class="table-title">
    <div class="row">
    <div class="col-sm-6">
    <h2>Manage <b>Users</b></h2>
    </div>
    <div class="col-sm-6">
    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
    </div>
    </div>
    </div>
  <table id="tableID" class="display nowrap table  table-hover"> 
    <thead> 
      <tr> 
        <th>User name</th> 
        <th>Email</th> 
        <th>Role</th>  
        <th>Actions</th>
      </tr> 
    </thead> 
    <tbody> 
        @foreach ($users as $user)
        <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td value={{ $user->role_id }}>{{ $user->role }}</td>
        <td>
          <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
          <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          </td>
        </tr> 
    @endforeach
       
        
      
     
    </tbody> 
  </table> 
    </div>
  </div>
  
  
  <!-- Add Modal HTML -->
  <div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
    <form action="/register-user" method="POST" id="registration-form">
      @csrf
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
      <div class="form-group">
        <label for="username-register" >Username</label>
        <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
        @error('username')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="email-register">Email</label>
        <input value="{{old('email')}}" name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
        @error('email')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="role-register" class="text-muted mb-1"><small>Role</small></label>
            <select name="role_id" id="role-register" class="form-control">
                <option value="">-- Select Role --</option>
                @foreach ($roles as $role)
                    <option value={{ $role->id }}>{{ $role->role }}</option>
                @endforeach
            </select>
        </label>
      </div>
  
      <div class="form-group">
        <label for="password-register">Password</label>
        <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
        @error('password')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
  
      <div class="form-group">
        <label for="password-register-confirm">Confirm Password</label>
        <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
        @error('password_confirmation')
        <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
      </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" class="btn btn-success" value="Register">
      </div>
    </form>
  </div>
  </div>
  </div>
  <!-- Edit Modal HTML -->
  <div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <form>
  <div class="modal-header">
  <h4 class="modal-title">Edit User</h4>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  </div>
  <div class="modal-body">
  <div class="form-group">
  <label>Name</label>
  <input type="text" class="form-control" required>
  </div>
  <div class="form-group">
  <label>Email</label>
  <input type="email" class="form-control" required>
  </div>
  <div class="form-group">
  <label>Address</label>
  <textarea class="form-control" required></textarea>
  </div>
  <div class="form-group">
  <label>Phone</label>
  <input type="text" class="form-control" required>
  </div>
  </div>
  <div class="modal-footer">
  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
  <input type="submit" class="btn btn-info" value="Save">
  </div>
  </form>
  </div>
  </div>
  </div>
  <!-- Delete Modal HTML -->
  <div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
  <div class="modal-content">
  <form>
  <div class="modal-header">
  <h4 class="modal-title">Delete User</h4>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  </div>
  <div class="modal-body">
  <p>Are you sure you want to delete these Records?</p>
  <p class="text-warning"><small>This action cannot be undone.</small></p>
  </div>
  <div class="modal-footer">
  <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
  <input type="submit" class="btn btn-danger" value="Delete">
  </div>
  </form>
  </div>
  </div>
  </div>
  
  <script> 
    
    // Initialize the DataTable 
    $(document).ready(function () { 
      $('#tableID').DataTable({ 
  
        // Set the number of rows to be  
        // displayed per page on the DataTable 
        pageLength: 6 
      }); 
    });  
  </script> 
  </body>
  </html> 
  </x-layout>
  