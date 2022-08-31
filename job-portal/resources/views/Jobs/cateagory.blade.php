@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
   

    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light border-bottom" style="padding: 20px" >
        <div class="container">
          <a href="#" class="navbar-brand" style="color: black" ><i class="bi bi-briefcase-fill"></i>Job Portal</a>
        <ul class="nav" style="display: flex" >
          {{--<a href="#" class="nav-link" style="color: black">Job Post</a>  --}}
          <li class="nav-item dropdown">
            
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
              {{ auth()->user()?->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              
              <li><a class="dropdown-item" href="{{ route('home') }}">Logout</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('companies.index') }}">Back to the previous page</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ route('jobs.list') }}">All Info</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
      <div class="row">
        <div class="col-md-12" id="with">
          <div id="success_meassage"></div>
          <div class="card">
            <div class="card-header"><i class="bi bi-send"></i>Job Post</div>
              <div class="card-body">
                <form action="{{ route('Jobs.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                      <label for="company_id" style="margin-bottom: 5px">Select Companies</label>
                      <br />
                      <select
                      class="form-select form-control "
                      aria-label="Default select example"
                      name="company_id"
                      >
                      <option value=""> My Companies</option>
                        @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option> 
                        @endforeach
                     
                      </select>
                      <br>
                        </div>
                        <div class="form-group">
                            <label for="title" style="margin-bottom: 5px">Job Title</label>

                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required />
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="descriptio" style="margin-bottom: 5px">Description</label>
                           <textarea
                            name="description"
                            id=""
                            cols="30"
                            rows="3"
                            class="form-control"
                            value="{{ old('description') }}"
                            required
                            ></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="job_position" style="margin-bottom: 5px"
                            >Postition</label
                            >
                            <br />
                            <input type="text" name="job_position" class="form-control" value="{{ old('job_position') }}" required />
                        </div>
                        <br />
                        <div class="form-group row">
                          <div class="col">
                            <label for="category" style="margin-bottom: 5px">Category</label>
                            <br />
                            <select
                            class="form-select form-control "
                            aria-label="Default select example"
                            name="category"
                            value="{{ old('category') }}"
                            required
                            >
                            <option value=""> Select Categories</option>
                              @foreach ($categories as $category)
                              <option value="{{ $category->category_id }}">{{ $category->name }}</option> 
                              @endforeach
                               
                           
                            </select>
                          </div>
                       
                          <div class="col" style="margin-top: 27px"> 
                            <a href="" class="btn btn-primary form-control  "style="padding: 6px 0px" data-bs-toggle="modal" data-bs-target="#addcategoriesModal" onClick="create()" >Add New</a>
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="" style="margin-bottom: 5px">Address</label>
                            <br />
                            <textarea
                            name="address"
                            id=""
                            cols="30"
                            rows="3"
                            class="form-control"
                            value="{{ old('address') }}"
                            required
                            ></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="" style="margin-bottom: 5px">Job Type</label>
                            <select
                            class="form-select form-control"
                            aria-label="Disabled select example"
                            name="type"
                            value="{{ old('type') }}"
                            required
                            >
                            <option value=""></option>
                            <option value="fulltime">Full Time</option>
                            <option value="parttime">Part Time</option>
                            </select>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="" style="margin-bottom: 5px">Status</label>
                            <select
                            class="form-select form-control"
                            aria-label="Disabled select example"
                            name="status"
                            value="{{ old('status') }}"
                            required
                            >
                            <option value=""></option>
                            <option value="live">Live</option>
                            <option value="else">else</option>
                            </select>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="last_date">Apply Deadline</label>
                            <input type="date" class="form-control" name="last_date" value="{{ old('last_date') }}" required/>
                        </div>

                        
                        </div>


                        <div class="form-group">
                            <button type="submit" value="save" class="btn btn-primary form-control" style="margin-top: 15px">
                            Post Job
                            </button>
                            
                        </div>
                        
                      </div>
                    </form>
                    
                    <!-- Modal -->
                      <div class="modal fade" id="addcategoriesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                             {{--  <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5> --}}
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" name="category_id">
                              <div class="form-group">
                                <label for="">New Category</label>
                                <input type="text" class="form-control input-sm" name="name">
                              </div>
                              <a href="" type="submit" value="save" class="btn btn-primary btnSave form-control mt-3" onClick="store()">Save</a>
                              <button type="submit" value="save" class="btn btn-primary btnUpdate form-control" onClick="update()">Update</button>

                              <table class="table table-bordered table-striped table-condensed mt-3">
                                <thead>
                                  <tr>
                                    <td>Sl</td>
                                    <td>Name</td>
                                    <td>Action</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!-- data listing table--->
                                  @foreach ($categories as $category)
                                  <tr>
                                    <td>{{ $category->category_id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                      <button type="button" class="btn btn-xs btn-primary btnEdit " title="Edit Record" >Edit</button>
                                      <button type="button" class="btn btn-xs btn-danger btnDelete " data-id="'+ $category.category_id +'" title="Delete Record">Delete</button>
                                    </td> 
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                     {{--Modal End --}}
                        
                      </div>
                    </div>
                  </div> 
            </div>
            
          </div>
        </div>
      </div>
    </div>

  
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script>
            
        var _modal = $('#Modal');
        var btnSave = $('.btnSave');
        var btnUpdate = $('.btnUpdate');
      $.ajaxSetup({
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        function getRecords() {
            $.get('categories')
                .success(function (data) {
                    var html='';
                    data.forEach(function($category){
                        html += '<tr>'
                        html += '<td>' + $category.category_id + '</td>'
                        html += '<td>' + $category.name + '</td>'
                        html += '<td>'
                        html += '<button type="button" class="btn btn-xs btn-warning btnEdit" title="Edit Record" >Edit</button>'
                        html += '<button type="button" class="btn btn-xs btn-danger btnDelete" data-id="' + $category.category_id + '" title="Delete Record">Delete</button>'
                        html += '</td> </tr>';
                    })
                    $('table tbody').html(html)
                })
        }
        getRecords()

        function reset() {
            _modal.find('input').each(function () {
                $(this).val(null)
            })
        }

        function getInputs() {
            var id = $('input[name="category_id"]').val()
            var name = $('input[name="name"]').val()
            
            return {id: id, name: name}
        }

        function create() {
            _modal.find('.modal-title').text('New Categories');
            reset();
            _modal.modal('show')
            btnSave.show()
            btnUpdate.hide()
        }

        function store(){
            if(!confirm('Are you sure?')) return;
            $.ajax({
                method: 'POST',
                url:'categories/category',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    console.log('inserted')
                    reset()
                    _modal.modal('hide')
                    getRecords();
                }
            })
        }
        
        $('table').on('click', '.btnEdit', function () {
            _modal.find('.modal-title').text('Edit Categories')
            _modal.modal('show')
            btnSave.hide()
            btnUpdate.show()
            var id= $(this).parent().parent().find('td').eq(0).text()
            var name = $(this).parent().parent().find('td').eq(1).text()
            $('input[name="category_id"]').val(category_id)
            $('input[name="name"]').val(name)
        })
        function update(){
            if(!confirm('Are you sure?')) return;
            $.ajax({
                method: 'POST',
                url: 'categories/update',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    console.log('updated')
                    reset()
                    _modal.modal('hide')
                    getRecords();
                }
            })
        }
        $('table').on('click', '.btnDelete', function () {
            if(!confirm('Are you sure?')) return;
            var id = $(this).data('category_id');
            var data={id:id}
            $.ajax({
                method: 'DELETE',
                url: 'categories/delete',
                data:data,
                dataType: 'JSON',
                success: function () {
                    console.log('deleted');
                    getRecords();
                }
            })
        })
   
    </script>
  

  </body>
</html>



