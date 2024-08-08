<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Pre Registration</title>
    <style>
        .program-checkboxes {
    display: flex;
    flex-wrap: wrap; /* Allows checkboxes to wrap to the next line if necessary */
}

.program-checkbox-label {
    display: inline-flex;
    align-items: center;
    margin-right: 1rem; /* Adjust spacing between checkboxes */
}

        .form-label,
        .program-checkbox-label {
            color: #6c757d; /* Placeholder color */
            font-weight: 500;
        }
        .success-message {
            display: none;
            color: green;
            margin-bottom: 20px;
        }
        .show-message .success-message {
            display: block;
        }
      .dropdown-menu {
          max-height: 200px;
          overflow-y: auto;
        }
      .dropdown-checkbox-list .form-check {
         margin-left: 20px;
        }
      .user-search {
          margin-left: 20px; 
          margin-right: 10px; 
          max-width: calc(100% - 30px);
          box-sizing: border-box;
        }
      .logo-image {
        width: 500px;
        height: auto;
       }
       .form-control.custom-textarea {
    border: 1px solid #ced4da; /* Default border color for form elements */
    padding: 1rem; /* Padding inside the textarea */
    box-sizing: border-box; /* Include padding in the height */
    resize: none; /* Disable resizing for consistent design */
    overflow: hidden; /* Hide scrollbar */
    height: auto; /* Adjust height automatically */
    position: relative; /* Ensure positioning is relative for child elements */
  }
  .form-control.custom-textarea:focus {
    box-shadow: none;
    border-color: #80bdff; /* Highlight border color on focus */
  }
  .word-limit {
    position: absolute;
    bottom: 0.5rem; /* Space from the bottom */
    right: 1rem; /* Space from the right */
    font-size: 0.875rem; /* Make the text a bit smaller */
    color: #6c757d; /* Muted text color */
    pointer-events: none; /* Ensures text is not selectable */
    opacity: 0.7; /* Slightly transparent */
    transition: opacity 0.2s; /* Smooth transition */
  }
  .form-control.custom-textarea:not(:placeholder-shown) + .word-limit {
    opacity: 0; /* Hide text when textarea is not empty */
  }
       
       @media screen and (max-width: 1150px) {
            .logo-image {
                width: 400px !important; 
            }
            h2 {
                font-size: 1.8rem !important;
            }
        }

        /* For mobile devices with width less than 768px */
        @media screen and (max-width: 768px) {
            .logo-image {
                width: 200px !important;
            }
            h2 {
                font-size: 1.3rem !important; /* Adjusted size for medium screens */
            }
        }

    </style>
  </head>
  <body>

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if(session('success'))
                        <div class="alert alert-success mt-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="text-center mb-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-image d-block mx-auto">
                    </div>
                    <h2 class="mb-5 text-center">Pre Registration</h2>
                        <div class="row align-items-center">
                            <div class="col-lg-7 mb-5 mb-lg-0">
                                
                                <form action="{{ route('pre-registration.store') }}" method="POST" class="border-right pr-5 mb-5" id="contactForm" name="contactForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="programs" class="form-label">Select Program <span class="text-danger">*</span></label>
                                            <div class="program-checkboxes">
                                                {{-- <label class="program-checkbox-label d-inline-block mr-3">
                                                    <input type="checkbox" name="programs[]" value="MBBS" class="mr-2"> MBBS
                                                </label>
                                                <label class="program-checkbox-label d-inline-block mr-3">
                                                    <input type="checkbox" name="programs[]" value="BDS" class="mr-2"> BDS
                                                </label> --}}
                                                <label class="program-checkbox-label d-inline-block mr-3">
                                                    <input type="checkbox" name="programs[]" value="DPT" class="mr-2"> DPT
                                                </label>
                                                <label class="program-checkbox-label d-inline-block mr-3">
                                                    <input type="checkbox" name="programs[]" value="BS MLT" class="mr-2"> BS MLT
                                                </label>
                                                <label class="program-checkbox-label d-inline-block mr-3">
                                                    <input type="checkbox" name="programs[]" value="BSN" class="mr-2"> BSN
                                                </label>
                                                <label class="program-checkbox-label d-inline-block mr-3">
                                                    <input type="checkbox" name="programs[]" value="POST RN-BSN" class="mr-2"> POST RN-BSN
                                                </label>
                                            </div>
                                            @error('programs')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First name *" value="{{ old('fname') }}" required>
                                            @error('fname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name *" value="{{ old('lname') }}" required>
                                            @error('lname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="fatherName" id="fatherName" placeholder="Father Name *" value="{{ old('fatherName') }}" required>
                                            @error('fatherName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email *" value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" autocomplete="off" class="form-control" name="phone" id="txt_signup_mobile_number" placeholder="Phone Number 03XX-XXXXXXX *" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="W_phone" id="W_phone" placeholder="WhatsApp 03XX-XXXXXXX *" value="{{ old('W_phone') }}" required>
                                            @error('W_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                          <input type="text" class="form-control" name="mailing_address" id="mailing_address" placeholder="Mailing Address *" value="{{ old('mailing_address') }}" required>
                                          @error('mailing_address')
                                            <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12 form-group">
                                          <input type="text" class="form-control" name="city" id="city" placeholder="City *" value="{{ old('city') }}" required>
                                          @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                        </div>
                                      </div>
                    
                                      
                                
                                
                                    <div id="form-message-warning mt-4"></div>
                                    <div id="form-message-success">
                                        Your message was sent, thank you!
                                    </div>
                                
                                
                                
                            </div>
                            <div class="col-lg-4 ml-auto">
                                
                                
                                <!-- SSC Total - Obtained Marks -->
                                <div class="row">
                                    <div class="col-md-12 form-group" style="margin-bottom: 0px; margin-top: 0.5rem">
                                        <label for="ssc_total_marks" class="form-label">SSC/Matric Marks <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="ssc_total_marks" id="ssc_total_marks" placeholder="Total" value="{{ old('ssc_total_marks') }}" required>
                                        @error('ssc_total_marks')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="ssc_obtained_marks" id="ssc_obtained_marks" placeholder="Obtained" value="{{ old('ssc_obtained_marks') }}" required>
                                        @error('ssc_obtained_marks')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                

                                <!-- HSSC Total - Obtained Marks -->
                                <div class="row">
                                    <div class="col-md-12 form-group" style="margin-bottom: 0px; margin-top: 0.5rem; font-weight:800;">
                                        <label for="hssc_total_marks" class="form-label">HSSC/FSc Marks</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="hssc_total_marks" id="hssc_total_marks" placeholder="Total" value="{{ old('hssc_total_marks') }}" max="99999" min="0">
                                        @error('hssc_total_marks')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="hssc_obtained_marks" id="hssc_obtained_marks" placeholder="Obtained" value="{{ old('hssc_obtained_marks') }}" max="99999" min="0">
                                        @error('hssc_obtained_marks')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- SZABMU Marks -->
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="szabmu_marks" id="szabmu_marks" placeholder="SZABMU Entry Test Marks" value="{{ old('szabmu_marks') }}" max="99999" min="0">
                                        @error('szabmu_marks')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <h3 class="mb-4">Ask A Question!</h3> --}}
                                <div class="row">
                                    <div class="col-md-12 form-group" style="margin-top: 1rem">
                                      <label for="message" class="form-label">
                                        Ask A Question!
                                      </label>
                                      <div class="textarea-container">
                                        <textarea class="form-control custom-textarea" name="message" id="message" cols="31" rows="2" placeholder="">{{ old('message') }}</textarea>
                                        <small class="text-muted word-limit">3000 charaters limit</small>
                                      </div>
                                      @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                    </div>
                                  </div>
                                  
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Submit" class="btn btn-secondary rounded-2 py-2 px-4" style="margin-top: 24px;">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
     
    <!-- Correctly order your scripts: jQuery, Popper.js, Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const textarea = document.getElementById('message');
        const wordLimit = document.querySelector('.word-limit');

        textarea.addEventListener('input', function () {
            if (textarea.value.trim() !== '') {
            wordLimit.style.opacity = 0;
            } else {
            wordLimit.style.opacity = 0.7;
            }
        });
    });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('txt_signup_mobile_number');
            
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove non-digit characters
                if (value.length > 4) {
                    value = value.slice(0, 4) + '-' + value.slice(4, 11);
                }
                e.target.value = value;
            });
        });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const whatsappInput = document.getElementById('W_phone');
                
                whatsappInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, ''); // Remove non-digit characters
                    if (value.length > 4) {
                        value = value.slice(0, 4) + '-' + value.slice(4, 11);
                    }
                    e.target.value = value;
                });
            });
            </script>
            
        
   
  </body>
</html>
