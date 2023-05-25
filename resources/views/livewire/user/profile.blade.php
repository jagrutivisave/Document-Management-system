<div>
           <x-slot name="title">
           User - Profile
        </x-slot>
</div>
<div class="container-fluid">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<style>
    .page-title 
    {
        text-decoration: underline;
        font-size: 2.5rem;
        font-weight: bold;
        margin-top: 2rem;
        text-align: left;
    }
   /* Style for the profile image */
.profile img {
  float: left;
  margin-right: 20px;
  width: 150px;
  height: 150px;
  border-radius: 100%;
  object-fit: cover;
}

/* Style for the profile card */
.profile .card {
  margin-top: 20px;
  padding: 20px;
  background-color: #f5f5f5;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

/* Style for the profile card labels */
.profile .card label {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

/* Style for the profile card rows */
.profile .card .row {
  margin-bottom: 20px;
}
</style>

<h1 class="page-title">User Profile</h1>
     <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-2">
                    <div class="row"></div>
                    <div class="profile">
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="Profile Picture">
                         <div class="col-md-8 card">
                            <div class="row">
                                <div class='col-md-4'>
                                 <label>Username</label>
                                </div>
                                <div class='col-md-4'>
                                    <label>{{ $user->name }}</label>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class='col-md-4'>
                                  <label>Email Address</label>
                                </div>
                                <div class='col-md-4'>
                                    <label>{{ $user->email }}</label>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class='col-md-4'>
                                  <label>Mobile Number</label>
                                </div>
                                <div class='col-md-4'>
                                   <label>{{ $user->mobno }}</label>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class='col-md-4'>
                                 <label>Birth-Date</label>
                                </div>
                                <div class='col-md-4'>
                                   <label>{{ $user->bdate }}</label>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </main>
            
            
        </div>
    </div>
</div>
</form>
</div>