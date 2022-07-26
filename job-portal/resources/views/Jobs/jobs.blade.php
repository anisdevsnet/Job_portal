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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

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
          <div class="card">
            <div class="card-header"><i class="bi bi-send"></i>Job Post</div>
              <div class="card-body">
                <form action="{{ route('Jobs.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                        <div class="form-group">
                            <label for="title" style="margin-bottom: 5px">Job Title</label>

                            <input type="text" name="title" class="form-control" />
                        </div>
                        <br />

                        <div class="form-group">
                            <label for="descriptio" style="margin-bottom: 5px"
                            >Description</label
                            >

                            <textarea
                            name="description"
                            id=""
                            cols="30"
                            rows="3"
                            class="form-control"
                            ></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="job_position" style="margin-bottom: 5px"
                            >Postition</label
                            >
                            <br />
                            <input type="text" name="job_position" class="form-control" />
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
                            >
                            <option value="">
                              

                            </select>
                          </div>
                       
                          <div class="col" style="margin-top: 27px"> 
                            <a href="{{ route('job.category') }}"   class="btn btn-primary form-control " style="padding: 6px 0px" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New Category</a>
                            
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
                            ></textarea>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="" style="margin-bottom: 5px">Job Type</label>
                            <select
                            class="form-select form-control"
                            aria-label="Disabled select example"
                            name="type"
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
                            >
                            <option value=""></option>
                            <option value="live">Live</option>
                            <option value="else">else</option>
                            </select>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="last_date">Apply Deadline</label>
                            <input type="date" class="form-control" name="last_date" />
                        </div>
                        <div class="form-group">
                            <button type="submit" value="save" class="btn btn-primary form-control" style="margin-top: 15px">
                            Post Job
                            </button>
                            
                        </div>
                        
                      </div>
                    </form>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add-Categories</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                      <div class="col">
                                        <label for="category" >New-Category:</label>
                                      </div>
                                      <div class="col">
                                            <form action="{{ route('job.category') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                              <input type="text" class="form-control" name="name">
                                              
                                              <button class="btn btn-primary form-control" style="margin-top:15px">Submit</button>
                                          </form>      
                                      </div>
                                  </div>

                                  <div>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th>Sl</th>
                                          <th>Name</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($job_category as $item)
                                            
                                        @endforeach
                                        <tr>
                                          <td>{{  $item->category_id}}</td>
                                          <td>{{ $item->name }}</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    
                                  </div>
                                    {{--   <a href="{{ route('Jobs.index') }}" class="btn btn-primary form-control" >List</a>--}}                             
                             </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary ">Save</button>
                          </div>

                          
                          
                        
                      </div>
                    </div>
                  </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
