<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Chat</title>
    @livewireStyles
    <div class="wrapper">
        @include('components.admin.navbar')
        <div class="main">
            @include('components.admin.header')
            <div class="text-center">
                <!-- Logout Confirmation Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to logout?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                   {{-- Main content --}}
                  
                   {{-- Alert --}}
                    <div class="container justify-content-center">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2 col-md-12 " role="alert"  >
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger  alert-dismissible fade show mt-2 col-md-12" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="container">
                       {{-- chat --}}
                       <div class="chat">

                        <!-- Header -->
                        <div class="top">
                          <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                          <div>
                            <p>Ross Edlin</p>
                            <small>Online</small>
                          </div>
                        </div>
                        <!-- End Header -->
                      
                        <!-- Chat -->
                        <div class="messages">
                          @include('admin.receive', ['message' => "Hey! What's up!  👋"])
                          @include('admin.receive', ['message' => "Ask a friend to open this link and you can chat with them!"])
                        </div>
                        <!-- End Chat -->
                      
                        <!-- Footer -->
                        <div class="bottom">
                          <form>
                            <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                            <button type="submit"></button>
                          </form>
                        </div>
                        <!-- End Footer -->
                      
                      </div>
                    </div>
                                 
            </div>
        </div>
    </div>
    <style>
        .chat {
        margin-top: 5rem;
        margin-bottom: 3rem;
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        color: #161c2d;
        box-sizing: border-box;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-clip: initial;
        border: 0 !important;
        margin-top: 1.5rem !important;
        background-color: #fff;
        box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
        border-radius: 6px !important;
        }
        .chat .top {
        display: block;
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        color: #161c2d;
        word-wrap: break-word;
        box-sizing: border-box;
        border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
        justify-content: space-between !important;
        padding: 1.5rem !important;
        }
        .chat .top img {
        display: inline-block;
        border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
        border-radius: 50% !important;
        box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
        }
        .chat .top div {
        display: inline-block;
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        color: #161c2d;
        word-wrap: break-word;
        box-sizing: border-box;
        overflow: hidden !important;
        margin-left: 1rem !important;
        }
        .chat .top div p {
        display: block;
        text-align: var(--bs-body-text-align);
        word-wrap: break-word;
        box-sizing: border-box;
        text-decoration: none !important;
        transition: all 0.5s ease;
        padding-top: 1rem;
        font-size: 1rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        margin-bottom: 0 !important;
        color: #3c4858 !important;
        font-family: var(--bs-font-sans-serif);
        line-height: 1.4;
        font-weight: 600;
        }
        .chat .top div small, .chat .top div .small {
        display: block;
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        font-family: "Nunito", sans-serif;
        word-wrap: break-word;
        box-sizing: border-box;
        font-size: 0.875em;
        color: #6c757d !important;
        }
        .chat .messages {
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        color: #161c2d;
        word-wrap: break-word;
        box-sizing: border-box;
        list-style: none;
        margin-bottom: 0 !important;
        padding: 1rem !important;
        }
        .chat .messages .left {
        text-align: left;
        }
        .chat .messages .right {
        text-align: right;
        }
        .chat .messages .message {
        margin-bottom: 1rem;
        }
        .chat .messages .message p {
        display: inline-flex;
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        font-family: "Nunito", sans-serif;
        word-wrap: break-word;
        list-style: none;
        box-sizing: border-box;
        font-size: 0.875em;
        margin: 0.25rem;
        padding: 0.5rem 1rem !important;
        color: #6c757d !important;
        background-color: rgba(var(--bs-light-rgb), 1) !important;
        border-radius: var(--bs-border-radius) !important;
        }
        .chat .messages .message img {
        display: inline-flex;
        margin: 0.25rem;
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        color: #161c2d;
        word-wrap: break-word;
        box-sizing: border-box;
        vertical-align: middle;
        border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
        border-radius: 50% !important;
        box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
        height: 45px;
        width: 45px;
        }
        .chat .bottom {
        font-weight: var(--bs-body-font-weight);
        line-height: var(--bs-body-line-height);
        text-align: var(--bs-body-text-align);
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        color: #161c2d;
        word-wrap: break-word;
        box-sizing: border-box;
        padding: 1rem 0 !important;
        border-top: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
        }
        .chat .bottom input {
        float: left;
        display: inline-flex;
        word-wrap: break-word;
        box-sizing: border-box;
        width: 75%;
        padding: 0.375rem 0.75rem;
        font-weight: 400;
        background-color: #fff;
        background-clip: padding-box;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        border: 1px solid #e9ecef;
        font-size: 14px;
        line-height: 26px;
        border-radius: 6px;
        color: #3c4858 !important;
        }
        .chat .bottom button {
        float: right;
        display: inline-flex;
        text-align: center;
        cursor: pointer;
        border: 1px solid #484848;
        border-radius: 5px;
        margin: 3px;
        width: 2.35rem;
        height: 2.35rem;
        background: url("https://assets.edlin.app/icons/font-awesome/paper-plane/paper-plane-regular.svg") center no-repeat;
        }

    </style>
    
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

            ::after,
            ::before {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            a {
                text-decoration: none;
            }

            li {
                list-style: none;
            }

            /* h1 {
                font-weight: 100;
                font-size: 12;
            } */

            body {
                font-family: 'Poppins', sans-serif;
            }

            .wrapper {
                display: flex;
            }

            .main {
                min-height: 100vh;
                width: 100%;
                overflow: hidden;
                transition: all 0.35s ease-in-out;
                background-color: #fafbfe;
            }

            #sidebar {
                width: 70px;
                min-width: 70px;
                z-index: 1000;
                transition: all .25s ease-in-out;
                background-color: #0d4616;
                display: flex;
                flex-direction: column;
            }

            #sidebar.expand {
                width: 260px;
                min-width: 260px;
            }

            .toggle-btn {
                background-color: transparent;
                cursor: pointer;
                border: 0;
                padding: 1rem 1.5rem;
            }

            .toggle-btn i {
                font-size: 1.5rem;
                color: #FFF;
            }

            .sidebar-logo {
                margin: auto 0;
            }

            .sidebar-logo a {
                color: #FFF;
                font-size: 1.15rem;
                font-weight: 600;
            }

            #sidebar:not(.expand) .sidebar-logo,
            #sidebar:not(.expand) a.sidebar-link span {
                display: none;
            }

            .sidebar-nav {
                padding: 2rem 0;
                flex: 1 1 auto;
            }

            a.sidebar-link {
                padding: .625rem 1.625rem;
                color: #FFF;
                display: block;
                font-size: 0.9rem;
                white-space: nowrap;
                border-left: 3px solid transparent;
            }

            .sidebar-link i {
                font-size: 1.1rem;
                margin-right: .75rem;
            }

            a.sidebar-link:hover {
                background-color: rgba(255, 255, 255, .075);
                border-left: 3px solid #3b7ddd;
            }

            .sidebar-item {
                position: relative;
            }

            #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
                position: absolute;
                top: 0;
                left: 70px;
                background-color: #0e2238;
                padding: 0;
                min-width: 15rem;
                display: none;
            }

            #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
                display: block;
                max-height: 15em;
                width: 100%;
                opacity: 1;
            }

            #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
                border: solid;
                border-width: 0 .075rem .075rem 0;
                content: "";
                display: inline-block;
                padding: 2px;
                position: absolute;
                right: 1.5rem;
                top: 1.4rem;
                transform: rotate(-135deg);
                transition: all .2s ease-out;
            }

            #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
                transform: rotate(45deg);
                transition: all .2s ease-out;
            }
                </style>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
                <style>
                    .card:hover {
                    transform: scale(1.05);
                    cursor: pointer;
                }
                .list-group-item {
                transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for effects */
            }

            .list-group-item:hover {
                background-color: #f8f9fa; /* Change background on hover */
                color: #007bff; /* Change text color on hover */
                cursor: pointer; /* Change cursor to pointer */
                transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition for effects */
            }

            .list-group-item i {
                transition: color 0.3s ease; /* Smooth transition for icon color */
            }

            .list-group-item:hover i {
                color: #007bff; /* Change icon color on hover */
                transition: color 0.3s ease; /* Smooth transition for icon color */
            }
    </style>
    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function () {
        document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
    <script>
        const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});
        const channel = pusher.subscribe('public');
      
        //Receive messages
        channel.bind('chat', function (data) {
          $.post("/receive", {
            _token:  '{{csrf_token()}}',
            message: data.message,
          })
           .done(function (res) {
             $(".messages > .message").last().after(res);
             $(document).scrollTop($(document).height());
           });
        });
      
        //Broadcast messages
        $("form").submit(function (event) {
          event.preventDefault();
      
          $.ajax({
            url:     "/admin/broadcast",
            method:  'POST',
            headers: {
              'X-Socket-Id': pusher.connection.socket_id
            },
            data:    {
              _token:  '{{csrf_token()}}',
              message: $("form #message").val(),
            }
          }).done(function (res) {
            $(".messages > .message").last().after(res);
            $("form #message").val('');
            $(document).scrollTop($(document).height());
          });
        });
      
    </script>
</head>
<body>
    
</body>
</html>