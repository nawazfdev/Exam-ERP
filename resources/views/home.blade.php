@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      <h1 class="m-0">{{ __('Dashboard') }}</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <!-- Left Column with 8 Columns Width -->
      <div class="col-lg-8">
      <div class="row">
        <!-- Total Exams -->
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box bg-info">
          <div class="inner">
          <h3>{{ $pagesCount }}</h3>
          <p>Total Exams</p>
          </div>
          <div class="icon">
          <i class="ion ion-document-text"></i>
          </div>
          <a href="{{ route('Pages.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>

        <!-- Total Groups -->
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box bg-success">
          <div class="inner">
          <h3>{{ $blogsCount }}</h3>
          <p>Total Groups</p>
          </div>
          <div class="icon">
          <i class="ion ion-paintbrush"></i>
          </div>
          <a href="{{ route('BlogPosts.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>

        <!-- Total Candidates -->
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box bg-danger">
          <div class="inner">
          <h3>{{ $processesCount }}</h3>
          <p>Total Candidates</p>
          </div>
          <div class="icon">
          <i class="ion ion-settings"></i>
          </div>
          <a href="{{ route('ProcessTechnologies.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>

        <!-- Total Questions -->
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box bg-primary">
          <div class="inner">
          <h3>{{ $productsCount }}</h3>
          <p>Total Questions</p>
          </div>
          <div class="icon">
          <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('Products.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>

        <!-- Total Investors -->
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box bg-secondary">
          <div class="inner">
          <h3>{{ $investorsCount }}</h3>
          <p>Total Investors</p>
          </div>
          <div class="icon">
          <i class="ion ion-person"></i>
          </div>
          <a href="{{ route('Investors.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>

        <!-- Total Users -->
        <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="small-box bg-danger">
          <div class="inner">
          <h3>{{ $usersCount }}</h3>
          <p>Total Users</p>
          </div>
          <div class="icon">
          <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
            class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
      </div>
      </div>

      <!-- Right Column with 4 Columns Width -->
      <div class="col-lg-4">
      <div class="card shadow p-3">
        
      <div class="text-center mb-3">
  <div class="dashboard_org_logo mb-2">
    <img src="logo/7f7780c1-c24f-43e4-a6ad-cfd95029c34e.png" id="imglogo" alt="Logo" style="max-width: 150px;">
  </div>

  <!-- Change Logo Button -->
  <span class="change_logo d-block mb-2">
    <button type="button" class="btn btn-sm btn-primary" onclick="showLogoUpload()">Change Logo</button>
  </span>

  <!-- Hidden File Upload Form -->
  <form id="logoUploadForm" action="/upload-logo" method="POST" enctype="multipart/form-data" style="display: none;">
    @csrf <!-- If using Laravel -->
    <input type="file" name="logo" accept="image/*" class="form-control mb-2" onchange="previewLogo(event)">
    <button type="submit" class="btn btn-success btn-sm">Upload</button>
  </form>
</div>

        <div class="dashboard_site_info text-center">
        <h5>Candidate Site</h5>
        <p id="siteaddress" class="small text-muted">https://candidate.speedexam.net/signin.aspx?site=claudiamorto
        </p>
        <a id="sitelink" href="https://candidate.speedexam.net/signin.aspx?site=claudiamorto"
          class="btn btn-outline-primary btn-sm" target="_blank">
          <i class="fa fa-external-link"></i> Visit Site
        </a>
        </div>
      </div>
      </div>
    </div>
</div>
    <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
  function showLogoUpload() {
    document.getElementById("logoUploadForm").style.display = "block";
  }

  function previewLogo(event) {
    const reader = new FileReader();
    reader.onload = function(){
      document.getElementById("imglogo").src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>

  @endsection