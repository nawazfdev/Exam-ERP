@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Website Settings') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
    @can('show-dashboard')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('SiteSettings.update', ['SiteSetting' => 1]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating -->
                            <div class="card-body">
                            <!-- Site Name Section -->
                            <div class="section">
                                <h3>Site Name</h3>
                                <div class="form-group">
                                    <label for="site_name">Site Name:</label>
                                    <input type="text" name="site_name" class="form-control" value="{{ $siteSettings ? $siteSettings->site_name : '' }}">
                                </div>
                                <div class="section">
                                <div class="form-group">
                                    <label for="site_primary_logo">Current Logo:</label>
                                    @if ($siteSettings)
                                    <img style="max-width: 205px;max-height: 60px;padding-left: 20px;" src="{{ asset($siteSettings->site_primary_logo) }}" alt="Current Logo">
                                @else
                                    <p>No logo found.</p>
                                @endif    
                                </div>
                                <div class="form-group">
                                    <label for="new_primary_logo">New Logo (optional):</label>
                                    <input type="file" name="new_primary_logo" class="form-control-file">
                                </div>
                            </div>
                                <!-- Site Favicon Section -->
                            <div class="section">
                                <div class="form-group">
                                    <label for="site_favicon">Current Favicon:</label>
                                     @if ($siteSettings)
                                    <img style="max-width: 205px;max-height: 60px;" src="{{ asset($siteSettings->site_favicon) }}" alt="Current Logo" class="img-thumbnail">
                                @else
                                    <p>No Favicon found.</p>
                                @endif
                                
                                </div>
                                <div class="form-group">
                                    <label for="new_favicon">New Favicon (optional):</label>
                                    <input type="file" name="new_favicon" class="form-control-file">
                                </div>
                            </div>
                                <!-- Timezone Section -->
                            <div class="section">
                                <h3>Timezone</h3>
                                <div class="form-group">
                                    <label for="timezone">Timezone:</label>
                                    <select name="timezone" class="form-control">
                                @foreach(timezone_identifiers_list() as $tz)
                                    <option value="{{ $tz }}" {{ optional($siteSettings)->timezone == $tz ? 'selected' : '' }}>
                                        {{ $tz }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            </div>

                            </div>
                            <!-- Social Media Section -->
                            <div class="section">
                                <h3>Social Media</h3>
                                <div class="form-group">
                                    <label for="facebook_link">Facebook Link:</label>
                                    <input type="text" name="facebook_link" class="form-control" value="{{ $siteSettings ? $siteSettings->facebook_link : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter_link">Twitter Link:</label>
                                    <input type="text" name="twitter_link" class="form-control" value="{{ $siteSettings ? $siteSettings->twitter_link :'' }}">
                                </div>
                                <!-- WhatsApp Link -->
                                <div class="form-group">
                                    <label for="whatsapp_link">WhatsApp Link:</label>
                                    <input type="text" name="whatsapp_link" class="form-control" value="{{ $siteSettings ? $siteSettings->whatsapp_link : '' }}">
                                </div>
                                <!-- YouTube Link -->
                                <div class="form-group">
                                    <label for="youtube_link">YouTube Link:</label>
                                    <input type="text" name="youtube_link" class="form-control" value="{{ $siteSettings ? $siteSettings->youtube_link : ''}}">
                                </div>

                                <!-- LinkedIn Link -->
                                <div "class="form-group">
                                    <label for="linkedin_link">LinkedIn Link:</label>
                                    <input type="text" name="linkedin_link" class="form-control" value="{{ $siteSettings ? $siteSettings->linkedin_link : '' }}">
                                </div>

                                <!-- Skype Link -->
                                <div class="form-group">
                                    <label for="skype_link">Skype Link:</label>
                                    <input type="text" name="skype_link" class="form-control" value="{{ $siteSettings ? $siteSettings->skype_link : '' }}">
                                </div>
                             </div>
                            
                            <!-- Contact Info Section -->
                            <div class="section">
                                <h2>Contact Info</h2>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" value="{{ $siteSettings ? $siteSettings->email : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax:</label>
                                    <input type="text" name="fax" class="form-control" value="{{ $siteSettings ? $siteSettings->fax : '' }}">
                                </div>
                                <!-- Phone -->
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $siteSettings ? $siteSettings->phone : '' }}">
                                </div>

                                <!-- Phone 2 -->
                                <div class="form-group">
                                    <label for="phone_2">Phone 2:</label>
                                    <input type="text" name="phone_2" class="form-control" value="{{ $siteSettings ? $siteSettings->phone_2 : '' }}">
                                </div>

                                 <!-- Address -->
                                 <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" class="form-control" value="{{ $siteSettings ? $siteSettings->address : '' }}">
                                </div>
                            </div>
                            
                            <!-- Meta Tags Section -->
                            <div class="section">
                                <h2>Meta Tags</h2>
                                <div class="form-group">
                                    <label for="meta_title">Meta Title:</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ $siteSettings ? $siteSettings->meta_title : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description:</label>
                                    <input type="text" name="meta_description" class="form-control" value="{{ $siteSettings ? $siteSettings->meta_description : '' }}">
                                </div>
                                <!-- META KEYWORDS -->
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords:</label>
                                    <input type="text" name="meta_keywords" class="form-control" value="{{ $siteSettings ? $siteSettings->meta_keywords : '' }}">
                                </div>

                                <!-- META COPYRIGHT -->
                                <div class="form-group">
                                    <label for="meta_copyright">Meta Copyright:</label>
                                    <input type="text" name="meta_copyright" class="form-control" value="{{ $siteSettings ? $siteSettings->meta_copyright : '' }}">
                                </div>

                                <!-- META AUTHOR -->
                                <div class="form-group">
                                    <label for="meta_author">Meta Author:</label>
                                    <input type="text" name="meta_author" class="form-control" value="{{ $siteSettings ? $siteSettings->meta_author : '' }}">
                                </div>
                             </div>
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                     </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        @endcan
    </div>
    <!-- /.content -->
</div>
@endsection


