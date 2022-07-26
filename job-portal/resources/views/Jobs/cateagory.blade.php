<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List of Category</title>
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

     <div class="card-header row">Posted-Job Categories</div>
       <div class="col">
          <a href="{{ route('Jobs.jobs')}}" class="btn btn-warning" style="margin:5px 95%">Back</a>
        </div>
                <div class="card-body">
                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Category</th>
                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_category as $job_category )                                                     
                        <tr>
                            <td>{{ $job_category  ->category_id }}</td>
                            <td>{{ $job_category ->name }}</td>
                            
                            <td>                          
                              <form method="DELETE" action="{{ url('/jobs/delete' . '/' . $job_category->category_id) }}" accept-charset="UTF-8" style="display:inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                            </td>     
                        </tr>                     
                        @endforeach
                    </tbody>                
                  </table>
                </div>
              </div>

</body>
</html>