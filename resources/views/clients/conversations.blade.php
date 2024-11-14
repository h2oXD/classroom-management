<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/assets/js/config.js') }}"></script>

    <!-- Vendor css -->
    <link href="{{ asset('assets/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('assets/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-3">
        <div class="card">
            <div class="chat d-flex">
                <div class="offcanvas-xxl offcanvas-start" tabindex="-1" id="chatUserList"
                    aria-labelledby="chatUserListLabel">
                    <div id="chat-user-list" class="collapse collapse-horizontal show">
                        <div class="chat-user-list border-end">
                            <div class="card-body py-2 px-3 border-bottom">
                                <div class="d-flex align-items-center gap-2 py-1">
                                    <div class="chat-users">
                                        <div class="avatar-lg chat-avatar-online">
                                            <img src="{{ Storage::url(Auth::user()->avatar) ? Storage::url('images/default-avatar.jpg') : null }}"
                                                class="img-fluid rounded-circle" alt="Chris Keller">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="mb-0">
                                            <a href="#!" class="text-reset lh-base">{{ Auth::user()->name }}</a>
                                        </h5>

                                        <p class="mb-0 text-muted">
                                            <small class="ti ti-circle-filled text-success"></small> Hoạt động
                                        </p>

                                    </div>
                                    <div class="dropdown lh-1">
                                        <a href="#" class="dropdown-toggle drop-arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <iconify-icon icon="solar:settings-outline"
                                                class="align-middle"></iconify-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact list -->
                            <div class="d-flex flex-column">
                                <div class="users-list position-relative list-scroll simplebar-scrollable-y"
                                    data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden scroll;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <div
                                                            class="d-flex align-items-center px-3 py-2 bg-body-secondary position-sticky top-0 z-1">
                                                        </div><!-- end chat-title -->
                                                        <div id="user-online">

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 339px; height: 1041px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                        <div class="simplebar-scrollbar"
                                            style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Contact list -->
                        </div>
                    </div>
                </div>

                <div class="chat-content card rounded-0 shadow-none mb-0">
                    <div class="card-header py-2 px-3 border-bottom">
                        <div class="d-flex align-items-center justify-content-between py-1">
                            <div class="d-flex align-items-center gap-2">

                                <a href="#" class="btn btn-sm btn-icon btn-soft-primary d-none d-xl-flex me-2"
                                    data-bs-toggle="collapse" data-bs-target="#chat-user-list" aria-expanded="true">
                                    <i class="ti ti-chevrons-left fs-20"></i>
                                </a>

                                <button class="btn btn-sm btn-icon btn-ghost-light text-dark d-xl-none d-flex"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#chatUserList"
                                    aria-controls="chatUserList">
                                    <i class="ti ti-menu-2 fs-20"></i>
                                </button>

                                <div>
                                    <h5 class="my-0 lh-base">
                                        <a href="#" class="text-reset">Nhóm chat lớp</a>
                                    </h5>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript: void(0);"
                                    class="btn btn-sm btn-icon btn-ghost-light d-none d-xl-flex"
                                    data-bs-toggle="modal" data-bs-target="#userCall" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Voice Call">
                                    <i class="ti ti-phone-call fs-20"></i>
                                </a>
                                <a href="javascript: void(0);"
                                    class="btn btn-sm btn-icon btn-ghost-light d-none d-xl-flex"
                                    data-bs-toggle="modal" data-bs-target="#userVideoCall" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Video Call">
                                    <i class="ti ti-video fs-20"></i>
                                </a>

                                <a href="javascript: void(0);" class="btn btn-sm btn-icon btn-ghost-light d-xl-flex">
                                    <i class="ti ti-info-circle fs-20"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="chat-scroll p-3" data-simplebar>
                            <ul class="chat-list" id="chat-list" data-apps-chat="messages-list">
                                @foreach ($listMessage as $item)
                                    @if ($item->user_id == Auth::user()->id)
                                        <li class="chat-group odd">
                                            <div class="chat-body">
                                                <div>
                                                    <h6 class="d-inline-flex">User {{ $item->user_id }}</h6>
                                                </div>

                                                <div class="chat-message">
                                                    <p>{{ $item->content }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li class="chat-group">
                                            <div class="chat-body">
                                                <div>
                                                    <h6 class="d-inline-flex">User {{ $item->user_id }}</h6>
                                                </div>

                                                <div class="chat-message">
                                                    <p>{{ $item->content }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                                <div id="even-4"></div>
                                {{-- <li class="chat-group odd" id="odd-4">
                                    <div class="chat-body">
                                        <div>
                                            <h6 class="d-inline-flex">You.</h6>
                                            <h6 class="d-inline-flex text-muted">10:19pm</h6>
                                        </div>

                                        <div class="chat-message">
                                            <p>3pm works for me 👍. Absolutely, let's dive into the presentation format.
                                                It'd be fantastic to wrap that up today. I'm attaching last year's
                                                format
                                                and assets here for reference.</p>

                                            <div class="chat-actions dropdown">
                                                <button class="btn btn-sm btn-link" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="ti ti-copy fs-14 align-text-top me-1"></i> Copy
                                                        Message</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="ti ti-edit-circle fs-14 align-text-top me-1"></i>
                                                        Edit</a>
                                                    <a class="dropdown-item" href="#"
                                                        data-dismissible="#odd-4"><i
                                                            class="ti ti-trash fs-14 align-text-top me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="p-3 border-top position-sticky bottom-0 w-100 mb-0">
                            <div class="row align-items-center g-2" name="chat-form" id="chat-form">

                                <div class="col-auto">
                                    <button type="button" class="btn btn-icon btn-soft-warning">
                                        <iconify-icon icon="solar:smile-circle-outline" class="fs-20"></iconify-icon>
                                    </button>
                                </div>

                                <div class="col">
                                    <input type="text" id="inputMessage" name="content" class="form-control"
                                        placeholder="Type Message...">
                                </div>

                                <div class="col-sm-auto">
                                    <div class="d-flex align-items-center gap-1">
                                        <button type="submit" id="btnSendMessage"
                                            class="btn btn-icon btn-success"><i class='ti ti-send'></i></button>

                                        <a href="#" class="btn btn-icon btn-soft-primary"><i
                                                class="ti ti-microphone"></i> </a>
                                        <a href="#" class="btn btn-icon btn-soft-primary"><i
                                                class="ti ti-paperclip"></i></a>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/assets/js/app.js') }}"></script>

    @vite('resources/js/chat.js')
    <script>
        var userID = {{ auth()->user()->id }};
        var conversationID = {{ $conversationID }};
        let route = "{{ route('post.chat', $conversationID) }}";
        // console.log(route);

        let btnSendMessage = document.querySelector('#btnSendMessage')
        let inputMessage = document.querySelector('#inputMessage')
        btnSendMessage.addEventListener('click', function() {
            event.preventDefault()
            let message = inputMessage.value
            axios.post('http://classroom-management.test/conversations/' + conversationID, {
                    content: message
                })
                .then((res) => {
                    console.log(res.data);
                })
            inputMessage.value = '';
        })
    </script>
</body>

</html>
