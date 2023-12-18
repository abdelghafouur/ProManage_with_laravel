<!-- resources/views/clients/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('users.index') }}" style="color:#a1acb8 !important">Gestion Comptes/</a></span> Ajouter Comptes</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic with Icons -->
      <div class="col-xxl">
        <div class="card mb-4">
          <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img
                    src="{{ asset('/assets/img/image/admin1.png') }}"
                    alt="user-avatar"
                    class="d-block rounded"
                    style="margin-left: 30px"
                    height="100"
                    width="100"
                    id="uploadedAvatar"
                />
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                            type="file"
                            id="upload"
                            name="profile_photo"
                            class="account-file-input"
                            hidden
                            accept="image/png, image/jpeg"
                            onchange="displayImage(this)"
                        />
                    </label>
                    <p class="text-muted mb-0">Allowed JPG, JPEG, or PNG.</p>
                </div>
              </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nom Complete</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-fullname2" class="input-group-text"
                        ><i class="bx bx-user"></i
                      ></span>
                      <input
                        type="text"
                        id="basic-icon-default-fullname"
                        class="form-control"
                        name="name" required

                        aria-describedby="basic-icon-default-fullname2" />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        name="email" required
                        class="form-control"
                        
                        aria-describedby="basic-icon-default-email2" />
                      <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="defaultSelect" class="col-sm-2 form-label">Role</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-message2" class="input-group-text"
                      ><i class='bx bx-spreadsheet' ></i></span>
                    <select id="defaultSelect"  class="form-select" name="roles" required>
                      <option value="superadmin">Super Admin</option>
                      <option value="admin">Admin</option>
                      <option value="comptable">Comptable</option>
                    </select>
                  </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-message">Password</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-message2" class="input-group-text"
                        ><i class="bx bx-comment"></i
                      ></span>
                        <input
                        type="password"
                        class="form-control"
                        id="basic-icon-default-message"
                        name="password"
                        required
                        aria-describedby="basic-icon-default-message2" />
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ajouter Compte</button>
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<script>
  function displayImage(input) {
      var uploadedAvatar = document.getElementById('uploadedAvatar');
      
      // Check if a file is selected
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              uploadedAvatar.src = e.target.result;
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection