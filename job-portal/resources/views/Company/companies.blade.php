<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    
 <link rel="stylesheet" href="{{ asset('dropify')}}/css/dropify.min.css">
 
  </head>
  <body>
    <div class="container" >
      <nav class="navbar navbar-expand-lg bg-light border-bottom" style="padding: 20px" >
        <div class="container">
          <a href="#" class="navbar-brand" style="color: black" ><i class="bi bi-briefcase-fill"></i>Job Portal</a>
        <ul class="nav"   >
          <li class="nav-item dropdown" style="display: flex">
            <a href="" style="color: black">Job Post</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
                {{ auth()->user()?->name }} 
              
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              
              <li><a class="dropdown-item" href="/">Logout</a></li>
          
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Back to previoues page</a></li>
            </ul>
          </li>
        </ul>
      </div>
      </nav>
      <div class="row" style="margin-top: 50px" >
        <div class="col-md-12" style="border-radius: 50px">
         @if (empty(Auth::user()->company->avatar))

          <p>Please Upload Your Photo</p>

          @else
            <img style="width: 100%" src="{{ asset('uploads/image') }}/{{ Auth::user()->profile->avatar }}" alt="" width="100" height="400">
        
         @endif
         
          
            <div class="card">
              <div class="card-header">Chnage Your Avatar</div>
              <div class="card-body">
                {{--  <input type="file" name="avatar" class="form-control" />
                <br />--}}
                <button type="submit" value="Save" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Change Your Photo</button>
              </div>
            </div>
          
          
        </div>
      
        <!-- Modal -->
       <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Choose Your Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="modal-body">
                              <input type="file" name="avatar" class="dropify " data-height="200" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" value="save" class="btn btn-primary">Update</button>
                            </div>
                      </form>
                    </div>
                  </div>

        </div>
        
        
        <div class="col-md-12" id="with">
          <div class="card">
            <div class="card-header">Update Your Information</div>

              <form action="{{ route('profile.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  
                        <div class="form-group">
                        <label for="slug" style="margin-bottom: 5px">Slug</label>
                        <input type="text" name="slug" class="form-control" />
                        
                      </div>
                      <br />

                      <div class="form-group">
                        <label for="address" style="margin-bottom: 5px">Address</label>
                        <br />
                        <input
                          name="address"
                          id="address"
                          cols="30"
                          rows="3"
                          class="form-control"
                        />   
                      </div>
                      <br />
                      <div class="form-group">
                        <label for="phone" style="margin-bottom: 5px">Phone Number</label>
                        <br />
                        <input type="text" name="phone" class="form-control" />
                      </div>
                      <br />
                      <div class="form-group">
                        <label for="Website" style="margin-bottom: 5px">Website</label>
                        <br />
                        <input
                        type="text"
                          name="objective"
                          class="form-control"
                        />
                      </div>
                      <div class="form-group">
                        <label for="slogan" style="margin-bottom: 5px">slogan</label>
                        <br />
                        <input
                          type="text"
                          name="slogan"
                          class="form-control"
                        />
                      </div>
                      <div class="form-group">
                        <label for="description" style="margin-bottom: 5px">Description</label>
                        <br />
                        <input
                          type="text"
                          name="description"
                          class="form-control"
                        />
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" value="Save" style="margin-top: 15px">
                          Update
                        </button>
                      </div>
                      @if (Session::has('message'))
                          <div class="alert alert-success">
                            {{ Session::get('message') }}
                          </div>
                      @endif
                  
                </div>
             </form>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Applicant Description</div>
            <div class="card-body">
              <p><b>Name:</b>{{ Auth::user()?->name }}</p>
              <p><b>Email:</b>{{ Auth::user()?->email}}</p>
              <p><b>Date of Birth:</b>{{ Auth::user()?->company->slug }}</p>
              <p><b>Address:</b>{{ Auth::user()?->company->address }}</p>
              <p><b>Phone Number:</b>{{ Auth::user()?->company->phone }}</p>
              <p><b>Objective:</b>{{ Auth::user()?->company->website }}</p>
              <p><b>Experience:</b>{{ Auth::user()?->company->slogan }}</p>
              <p><b>Bio:</b>{{ Auth::user()?->company->Description }}</p>
              <p><b>Member Since:</b>{{ Auth::user()?->company->created_at->diffForHumans() }}</p>
              @if(!empty(Auth::user()->company->cover_letter))
                <p>
                  <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">
                  Cover Letter
                  </a>
                </p>
              @else
              <p>Please Upload your Cover Letter</p>
              @endif

              @if(!empty(Auth::user()->profile->resume))
                <p>
                  <a href="{{ Storage::url(Auth::user()->profile->resume) }}">
                  Resume
                  </a>
                </p>
              @else
                <p>Please Upload your Resume</p>
              @endif
            </div>  
          </div>
          <br />
       {{--   <form action="{{ route('companies.logo') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header">Update your cover letter</div>
            <div class="card-body">
              <input type="file" name="cover_letter" class="form-control" />
              <br />
              <button type="submit" value="Save" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form >
          <br />

        <form action="{{ route('profile.resume') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card">
            <div class="card-header">Update your Resume</div>
            <div class="card-body">
              <input type="file" name="resume" class="form-control" />
              <br />
              <button type="submit" value="Save" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>

    --}}
        </div>
      </div>
    </div>
    
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="{{ ('dropify') }}/js/dopify.min.js"></script>
  <script type="text/javascript">
    

    //Start Dropify
    $(document).ready(function(){
      $('.dropify').dropify();
   });
    //end of Dopifys

    
  </script>
  
  </body>
</html>
