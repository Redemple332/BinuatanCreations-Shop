<div>
    <body class="bg-gradient-primary">
        <div wire:loading wire:target="login">
            <div style="display: flex; justify-content: center; align-items: center; background-color: black; position: fixed; top: 0px; left: 0px; z-index: 9999; width: 100%; height: 100%; opacity: .75;">
                <i class="fas fa-spinner fa-spin fa-2x"></i>
            </div>
        </div>
        <div class="container">
    
            <!-- Outer Row -->
            <div class="row justify-content-center">
    
                <div class="col-xl-10 col-lg-12 col-md-9">
    
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <form class="user" method="POST" wire:submit.prevent="login">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user"
                                                    wire:model="email" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address...">
                                                @error('email') <span class="text-xs  text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                 wire:model="password" placeholder="Password">
                                                @error('password') <span class="text-xs text-danger">{{ $message }}</span> @enderror
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" wire:model="remember" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
             </div>
        </div>
    </body>
</div>
