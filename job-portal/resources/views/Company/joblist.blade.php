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
    <link rel="stylesheet" href="{{ asset('style')}}/css/joblist.css" />
   
    
  </head>
  <body>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <div class="container" >
      <nav class="navbar navbar-expand-lg bg-light border-bottom" style="padding: 20px" >
        <div class="container">
          <a href="#" class="navbar-brand" style="color: black" ><i class="bi bi-briefcase-fill"></i>Job Portal</a>
        <ul class="nav" style="display: flex" >
          <a href="{{ route('Jobs.jobs') }}" class="nav-link" style="color: black">Job Post</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
                {{ auth()->user()?->name }}
              </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              
              <li><a class="dropdown-item" href="{{ route('home') }}">Logout</a></li>                    
            </ul>
          </li>
        </ul>
      </div>
      </nav>
      <div class="card-footer"></div>
    </div>
      
    <div class="profile-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
             
              <div class="logo"> 
                @if (empty(Auth::user()->company->logo))

                <p>Please Upload Your Photo</p>
      
                @else
                  <img  src="{{ asset('uploads/image') }}/{{ Auth::user()->company->logo }}" alt="" >
              
               @endif</div>
              <div class="coverphoto"> 
                @if (empty(Auth::user()->company->cover_photo))

                <p>Please Upload Your Photo</p>
      
                @else
                  <img  src="{{ asset('uploads/image') }}/{{ Auth::user()->company->cover_photo }}" alt="">
              
               @endif
            </div>
              <div class="card-header">Company Details</div>
                <div class="card-body">
                  <p class="name" ><b>Company Name:</b>{{ Auth::user()?->company->company_name }}</p>
                  <p><b>Description:</b>{{ Auth::user()?->company->description }}</p>
                  <p><b>Address:</b>{{ Auth::user()?->company->address }}</p>
                  <p><b>Phone Number:</b>{{ Auth::user()?->company->phone }}</p>
                  <p><b>Website:</b>{{ Auth::user()?->company->website }}</p>
                  
                </div>  
                <div class="card-header">Posted-Job List</div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Title</th>
                        
                        <th scope="col">Status</th>
                        <th scope="col">Category</th>
                        <th scope="col">Position</th>
                        <th scope="col">Address</th>
                        <th scope="col">Type</th>
                        <th scope="col">Deadline</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job )                                                     
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->title}}</td>
                            
                            
                            <td>{{ $job->status }}</td>
                            <td>{{ $job->category }}</td>
                            <td>{{ $job->job_position }}</td>
                            <td>{{ $job->address}}</td>
                            <td>{{ $job->type }}</td>
                            <td>{{ $job->last_date }}</td>
                            <td>                          
                            <button class="btn btn-primary">Apply</button>  
                            </td>     
                        </tr>                     
                        @endforeach
                    </tbody>                
                  </table>
                </div>
              </div>
            </div>                 
          </div>
          <br/>
        </div>
      </div>
    </div>
  </body>
</html>
