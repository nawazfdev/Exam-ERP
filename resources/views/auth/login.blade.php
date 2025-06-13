 @extends('layouts.guest')
@section('content')
    <div class="card-body">
        <!-- User Type Selection Tabs -->
        <div class="login-user-type mb-3">
            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                <label class="btn btn-outline-primary active user-type-btn" data-type="admin">
                    <input type="radio" name="user_type_radio" value="admin" checked> Admin Portal
                </label>
                <label class="btn btn-outline-success user-type-btn" data-type="candidate">
                    <input type="radio" name="user_type_radio" value="candidate"> Candidate Portal
                </label>
            </div>
        </div>

        <!-- Login Message -->
        <p class="login-box-msg" id="login-message">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post" id="login-form">
            @csrf
            <input type="hidden" name="user_type" id="user_type" value="admin">
            
            <div class="input-group mb-3">
                <input type="text" name="email" id="email_input" class="form-control @error('email') is-invalid @enderror" 
                       placeholder="Email" value="{{ old('email') }}" required autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                       placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block" id="login-btn">{{ __('Login') }}</button>
                </div>
            </div>
        </form>

        <!-- Demo Credentials -->
        <div class="demo-credentials mt-3">
            <div class="alert alert-info" id="admin-credentials">
                <small>
                    <strong>Demo Admin Credentials:</strong><br>
                    Super Admin: <code>superadmin@erp.com</code> / <code>hadi@912</code><br>
                    System Admin: <code>admin@erp.com</code> / <code>admin123</code><br>
                    Org Admin: <code>admin@uscs.edu</code> / <code>password123</code>
                </small>
            </div>
            <div class="alert alert-success" id="candidate-credentials" style="display: none;">
                <small>
                    <strong>Demo Candidate Credentials:</strong><br>
                    Email: <code>candidate1@uscsuniversity.com</code> / <code>candidate123</code><br>
                    Username: <code>johndoe1</code> / <code>candidate123</code>
                </small>
            </div>
        </div>

        <div class="social-auth-links text-center mt-2 mb-3">
            <!-- Social auth links if needed -->
        </div>
        
        @if (Route::has('password.request'))
            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
            </p>
        @endif
    </div>

    <style>
        .user-type-btn {
            font-size: 14px;
            padding: 8px 12px;
        }
        .demo-credentials .alert {
            padding: 10px;
            margin-bottom: 10px;
        }
        .demo-credentials code {
            background: rgba(255,255,255,0.2);
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userTypeBtns = document.querySelectorAll('.user-type-btn');
            const userTypeInput = document.getElementById('user_type');
            const emailInput = document.getElementById('email_input');
            const loginMessage = document.getElementById('login-message');
            const loginBtn = document.getElementById('login-btn');
            const adminCredentials = document.getElementById('admin-credentials');
            const candidateCredentials = document.getElementById('candidate-credentials');

            userTypeBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const type = this.dataset.type;
                    userTypeInput.value = type;

                    // Update UI based on selected type
                    if (type === 'candidate') {
                        emailInput.placeholder = 'Email or Username';
                        loginMessage.textContent = 'Sign in to Candidate Portal';
                        loginBtn.textContent = 'Login as Candidate';
                        loginBtn.className = 'btn btn-success btn-block';
                        
                        // Show candidate credentials
                        adminCredentials.style.display = 'none';
                        candidateCredentials.style.display = 'block';
                    } else {
                        emailInput.placeholder = 'Email';
                        loginMessage.textContent = 'Sign in to Admin Portal';
                        loginBtn.textContent = 'Login';
                        loginBtn.className = 'btn btn-primary btn-block';
                        
                        // Show admin credentials
                        adminCredentials.style.display = 'block';
                        candidateCredentials.style.display = 'none';
                    }
                });
            });

            // Check URL parameters for type
            const urlParams = new URLSearchParams(window.location.search);
            const userType = urlParams.get('type');
            if (userType === 'candidate') {
                document.querySelector('[data-type="candidate"]').click();
            }

            // Handle form errors - if there are validation errors, maintain the selected user type
            @if(old('user_type') === 'candidate')
                document.querySelector('[data-type="candidate"]').click();
            @endif
        });
    </script>
@endsection