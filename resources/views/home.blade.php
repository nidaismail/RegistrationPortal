<!DOCTYPE html>
<html lang="en">
<head>
    <title>IMDC Pre Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="asset/images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="asset/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="asset/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="asset/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="asset/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="asset/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="asset/css/util.css">
    <link rel="stylesheet" type="text/css" href="asset/css/main.css">
    <style>
        body {
            font-size: 0.8rem;
        }
        h1 {
            font-size: 1.8rem;
        }
        .filter-input {
            width: 100%;
            box-sizing: border-box;
        }
        .filter-input {
            display: none;
        }
        .filter-row {
            display: none;
        }
        .show-filter .header-row {
            display: none;
        }
        .show-filter .filter-row {
            display: table-row;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'IMDCOLLEGE') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-4 p-lg-2 bg-light rounded-3 text-center">
        <h1 class="display-5 fw-bold">Welcome {{ $user->name }}</h1>
        <p class="lead fw-bold">You are logged in as a 
            @foreach ($user->roles as $role) {{ $role->name }} @endforeach
        </p>
        <div class="panel-heading">
            <div class="col pull-right text-right">
                <button id="filterButton" class="btn btn-secondary btn-sm">
                    <span class="glyphicon glyphicon-filter"></span> Filter
                </button>
            </div>
            <h3 class="mb-10 panel-title"></h3>
        </div>

        <h2 class="mt-5">Pre-Registration Responses</h2>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="header-row">
                        <th>Date</th>
                        <th>Programs</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>WhatsApp</th>
                        <th>Mailing Address</th>
                        <th>City</th>
                        <th>SSC Marks</th>
                        <th>HSSC Marks</th>
                        <th>SZABMU Marks</th>
                        <th>Message</th>
                    </tr>
                    <tr class="filter-row">
                        <th><input type="text" class="form-control filter-input" placeholder="Search Date"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Programs"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Name"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Father Name"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Email"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Phone"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search WhatsApp"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Address"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search City"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search SSC Marks"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search HSSC Marks"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search SZABMU Marks"></th>
                        <th><input type="text" class="form-control filter-input" placeholder="Search Message"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($preRegistrations as $registration)
                        <tr>
                            <td>{{ $registration->created_at->format('d F Y') }}</td>
                            <td>{{ $registration->programs }}</td>
                            <td>{{ $registration->first_name }} {{ $registration->last_name }}</td>
                            <td>{{ $registration->father_name }}</td>
                            <td>{{ $registration->email }}</td>
                            <td>{{ $registration->phone }}</td>
                            <td>{{ $registration->whatsapp_phone }}</td>
                            <td>{{ $registration->mailing_address }}</td>
                            <td>{{ $registration->city }}</td>
                            <td>
                                @if($registration->ssc_total_marks && $registration->ssc_obtained_marks)
                                    {{ $registration->ssc_total_marks }}-{{ $registration->ssc_obtained_marks }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($registration->hssc_total_marks && $registration->hssc_obtained_marks)
                                    {{ $registration->hssc_total_marks }}-{{ $registration->hssc_obtained_marks }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $registration->szabmu_marks }}</td>
                            <td>{{ $registration->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="asset/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filterButton').click(function() {
            // Toggle the class to show/hide filter inputs
            $('table').toggleClass('show-filter');
        });

        // Function to filter the table based on input
        $('.filter-input').on('keyup', function() {
            var index = $(this).parent().index();
            var value = $(this).val().toLowerCase();
            $('tbody tr').each(function() {
                var cell = $(this).find('td').eq(index).text().toLowerCase();
                $(this).toggle(cell.indexOf(value) > -1);
            });
        });
    });
</script>
</body>
</html>
