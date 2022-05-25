<html>

<head>
    <title>Form Submission</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <form  action="{{ route('user')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="firstName" class="form-control form-control-lg" name="name" />
                                            <label class="form-label" for="firstName"> Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <input type="text" id="lastName" class="form-control form-control-lg" name="father_name" />
                                            <label class="form-label" for="lastName">Father Name</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="email" id="emailAddress" class="form-control form-control-lg" name="email" />
                                            <label class="form-label" for="emailAddress">Email</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">

                                        <div class="form-outline">
                                            <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="phone" />
                                            <label class="form-label" for="phoneNumber">Phone Number</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">

                                    <h6 class="mb-2 pb-1">Gender: </h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="option1" checked />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="option2" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="otherGender" value="option3" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>

                                </div>
                        </div>
                        <div class="row d-flex  justify-content-center">
                            <div class="col-md-6 mb-4 d-flex align-items-center">

                                <div class="form-outline datepicker w-100">
                                    <input type="file" class="form-control form-control-lg" id="birthdayDate" name="image" />
                                    <label for="birthdayDate" class="form-label">Image</label>
                                </div>

                            </div>
                            <div></div>


                            <div class="row d-flex  justify-content-center">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit"  />
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
   <div class="container">
       <div class="row">
           <table border="2px">
               <tr>
           <th>Name</th>
           <th>Father Name</th>
           <th>Email</th>
           <th>Phone</th>
           <th>Image</th>
               </tr>
               @foreach($users as $user)
             <tr>
                 <td>{{$user->name}}</td>
                 <td>{{$user->father_name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->phone}}</td>
                 <td><img src="public/images/{{$user->image}}" style="height:100px"></td>
             </tr> 
           
@endforeach

           </table>
       </div>
   </div>
</body>
</html>