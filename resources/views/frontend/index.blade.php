<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Introcept Nepal</title>
    <style>
      label{
        color:white;
        margin-bottom:10px;
      }
      .btn{
        margin-top:14px;
      }
    </style>

  </head>
  <body style="background-color:black;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">IntroceptNepal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">About</a>

          </div>
        </div>
      </div>
    </nav>

    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Message!</strong> {{Session::get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </button>
    </div>
    @endif


    <div class="container my-5 col-md-6">
        <form method="POST" action="{{route('store')}}">
            @csrf
          <label>Name</label>
          <input type="text" class="form-control" name="name">
          <span class="text-danger">@error('name') {{$message}} @enderror</span><br>
          <label>Email</label>
          <input type="email" class="form-control" name="email">
          <span class="text-danger">@error('email') {{$message}} @enderror</span><br>
          <label>Phone</label>
          <input type="number" class="form-control" name="phone"><br>
          <span class="text-danger">@error('phone') {{$message}} @enderror</span><br>
          <label>Choose your Gender: </label>
          <div >
                <div class="form-check"  >
                    <input class="form-check-input" type="radio"  name="gender" value="1" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Male
                    </label>
                </div>
                <div class="form-check" name="gender" >
                    <input class="form-check-input" type="radio" name="gender" value="2" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                    Female
                    </label>
                </div>
                <div class="form-check" name="gender">
                    <input class="form-check-input" type="radio"  name="gender" value="3" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                    Others
                    </label>
                </div>

          </div>
          <span class="text-danger">@error('gender') {{$message}} @enderror</span><br>
          <label>Choose your Hobbies: </label>
          <div name="hobbies">
                <div class = "form-check">
                    <input class = "form-check-input"
                    type = "checkbox" id = "checkbox1" name = "reading" value = "read" >
                    <label class = "form-check-label"> Reading </label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input"
                    type = "checkbox" id = "checkbox1" name = "travelling" value = "travel" >
                    <label class = "form-check-label"> Travelling </label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input"
                    type = "checkbox" id = "checkbox1" name = "music" value = "music" >
                    <label class = "form-check-label"> Listening to Music </label>
                </div>
           </div>
          <div class="d-grid gap-2">
            <button class="btn btn-success" type="submit">Submit</button>

          </div>
        </form><br><br>

        <table class="table table-hover" style="background-color:black; color:white;">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
            </tr>
            </thead>
            <tbody>
                @forelse($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>@if($data->gender==1)Male @elseif($data->gender==2)Female @else Others @endif</td>
                    </tr>
                @empty
                    <tr >
                    <td colspan="5">No Records Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
