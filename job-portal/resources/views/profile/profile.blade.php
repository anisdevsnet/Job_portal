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
    <link rel="stylesheet" href="dropify/css/dropify.min.css" />
  </head>
  <body>
    <div class="container" >
      <nav class="navbar navbar-expand-lg bg-light border-bottom" style="padding: 20px" >
        <div class="container">
          <a href="#" class="navbar-brand" style="color: black"><i class="bi bi-briefcase-fill"></i>Job Portal</a>
        <ul class="nav"  >
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">
              test1
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Logout</a></li>
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Back to previoues page</a></li>
            </ul>
          </li>
        </ul>
      </div>
      </nav>
      <div class="row" style="margin-top: 50px" >
        <div class="col-md-4" style="border-radius: 50px">
          <form action="" enctype="multipart/form-data" >
          <div class="card">
            <img src="" alt="" id="selectedImage"  />
            <div class="card-body">
              <!-- Button trigger modal -->
              <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
              >
                Change Your Photo
              </button>
              
            </div>
          </div>
        </div>
      </form>
        <!-- Modal -->
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Choose your photo
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                
                <input type="file" id="file" name="file" class="dropify" onchange="changeImage(this)" data-hieght="100"/>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="ImageUpdate">Update</button>
                <p class="text-success mt-2 success_message float right">Successfully Uploaded</p>
                <p class="text-danger mt-2 error_message float right">Try Again</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" id="with">
          <div class="card">
            <div class="card-header">Update Your Information</div>
            <div class="card-body">
              <div class="form-group">
                <label for="" style="margin-bottom: 5px">Date of birth</label>

                <input type="date" name="dob" class="form-control" />
              </div>
              <br />

              <div class="checks" id="xd" style="display: flex">
                <h6 style="margin-right: 15px">Gender:</h6>
                <div class="group">
                  <input type="checkbox" />
                  <label for="" style="margin-right: 5px">Male</label>
                </div>
                <div class="group">
                  <input type="checkbox" />
                  <label for="">Female</label>
                </div>
              </div>
              <br />
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
                <label for="" style="margin-bottom: 5px">Phone Number</label>
                <br />
                <input type="text" name="phonenumber" class="form-control" />
              </div>
              <br />
              <div class="form-group">
                <label for="" style="margin-bottom: 5px">Objective</label>
                <br />
                <textarea
                  name="address"
                  id=""
                  cols="30"
                  rows="3"
                  class="form-control"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="" style="margin-bottom: 5px">Experience</label>
                <br />
                <input
                  type="text"
                  name="experience"
                  placeholder="Fresher or years of experience?"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <button class="btn btn-primary" style="margin-top: 15px">
                  Submit
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Applicant Description</div>
            <div class="card-body">Applicant Details</div>
          </div>
          <br />
          <div class="card">
            <div class="card-header">Update your cover letter</div>
            <div class="card-body">
              <input type="file" name="cover_letter" class="form-control" />
              <br />
              <button class="btn btn-primary">Update</button>
            </div>
          </div>
          <br />
          <div class="card">
            <div class="card-header">Update your Resume</div>
            <div class="card-body">
              <input type="file" name="resume" class="form-control" />
              <br />
              <button class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script type="text/javascript">
      //start of messages
      $(".success_message").hide();
      $(".error_message").hide();
      //end of messages

      $(document).ready(function (e) {
        $("ImageUpdate").on('click',(function(e){
          e.preventDefault();
          var image_file = $('#selectedImage').attr('src');
          if(image_file != ''){

            $.ajax({
              url: "upload.php",
              type:"POST",
              data:{file:image_file},
              success: function(data){
                console.log(data);
                if(data=='error'){
                  console.log('error');
                }else{
                  $(".success_message").fadein('1000');
                  $(".error_message").hide();
                }
              }
            })
          }
        }))
      })

      //Start Dropify
      $(document).ready(function(){
        $('.dropify').dropify();
      });
      //end of Dopifys

      function changeImage(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#selectedImage').attr('src',e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
        }
      }
    </script>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="dropify/js/dopify.min.js"></script>
  </body>
</html>
