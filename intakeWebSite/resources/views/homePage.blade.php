<x-layout>
  <div class="container-xxl position-relative bg-white d-flex p-0">
     <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
              <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="" class="">
                            <h3 class="text-primary">metrorez</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
                      @csrf
                    <div class="form-floating mb-3">
                      <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                      <input name="loginpassword"  class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <a href="">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                  </form>
                </div>
            </div>
       </div>
     </div>
  </div>
</x-layout>