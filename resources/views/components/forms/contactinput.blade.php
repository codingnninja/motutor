
      <form class="form-contact" method="POST" action="{{route('register.process')}}">
        @csrf
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal text-center">{{$action}}</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPhoneNumber" class="sr-only">Phone Number</label>
        <input type="text" id="inputPhoneNumber" name="phone" class="form-control"  placeholder="Phone number" required>
        <label for="inputFullName" class="sr-only">Full name</label>
        <input type="text" id="inputFullName" name="fullname" class="form-control" placeholder="Full name" required>
        <div class="checkbox mb-3">
          <label>
            <small>A you agree with terms and polices by clicking submit.</small>
          </label>
        </div>
        <input type="hidden" name="slug" value="{{$slug}}">
        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
      </form>

