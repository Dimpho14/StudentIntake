


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
      <h2>Manage <b>Rooms</b></h2>
      </div>
      <div class="col-sm-6">
      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Room</span></a>
      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
      </div>
      </div>
      </div>
    <table id="tableID" class="display nowrap table  table-hover"> 
      <thead> 
        <tr> 
          <th>Room No.</th>
          <th>Type</th>
          <th>Building</th>
          <th>Gender</th>
          <th>Status</th>
          <th>Actions</th>
        </tr> 
      </thead> 
      <tbody>
       @foreach ($rooms as $room)
        <tr>
        <td>{{ $room->number }}</td>
        <td >{{ $room->type_id }}</td>
        <td>{{ $room->building_id }}</td>
        <td>{{ $room->gender_id }}</td>
        <td>{{$room->status}}</td>
        <td>
          <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
          <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          <a href="create-room" class="view" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="View">&#xe8f4;</i></a>
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
      <form action="/create-room" method="POST">
        @csrf
        <div class="modal-header">
          <h4 class="modal-title">Add Room</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="room-number" class="text-muted mb-1"><small>Room No.</small></label>
            <input value="{{old('number')}}" name="number" id="room-number" class="form-control" type="text" placeholder="Type room number" autocomplete="off" />
            @error('number')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>
          
          <div class="form-group">
            <label for="room-type" class="text-muted mb-1"><small>Room Type</small></label>
                <select name="type_id" id="room-type" class="form-control">
                    <option value="">-- Select type --</option>
                    @foreach ($types as  $type)
                        <option value={{ $type->id }}>{{ $type->name }}</option>">
                    @endforeach
                </select>
            </label>
          </div>
  
          <div class="form-group">
            <label for="building-name" class="text-muted mb-1"><small>Building</small></label>
                <select name="building_id" id="building-name" class="form-control">
                    <option value="">-- Select Building --</option>
                    @foreach ($buildings as  $building)
                        <option value={{ $building->id }}>{{ $building->name }}</option>">
                    @endforeach
                </select>
            </label>
          </div>

          <div class="form-group">
            <label for="room-gender" class="text-muted mb-1"><small>Gender</small></label>
                <select name="gender_id" id="room-gender" class="form-control">
                    <option value="">-- Select gender --</option>
                    @foreach ($genders as  $gender)
                        <option value={{ $gender->id }}>{{ $gender->name }}</option>">
                    @endforeach
                </select>
            </label>
          </div>

          <div class="form-group">
            <label for="room-status" class="text-muted mb-1"><small>Room Status</small></label>
                <select name="status" id="room-status" class="form-control">
                    <option value="">-- Select Status --</option>
                    <option value="1">Occupied</option>
                    <option value="2">Not Occupied</option>
                    <option value="3">Blocked</option>
                </select>
            </label>
          </div>

        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
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
    <h4 class="modal-title">Edit Role</h4>
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
    <h4 class="modal-title">Delete Role</h4>
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
  
  </div>
    </x-layout>
  
    
  
  
  
  
  
  
  