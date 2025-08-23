<div class="container">

    {{-- <div class="row">
        <div class="col-lg-12 ">
            <!--begin::Card-->
            <div class="card card-custom  ">
                <div class="card-header bg-dark border-2 my-3">
                    <div class="card-title">
                        <h3 class="card-label"><small>خدمة تسجيل وتحديث البيانات</small></h3>
                    </div>
                </div>
                <div class="card-body">

                    <div class="text-center my-5">
                        <p> لخدمة تسجيل وتحديث البيانات اضغط <span><a href="{{ route('aid.create') }}"
                                    target="_blank">{{ __('customTrans.here') }} </a> </span></p>
                    </div>
                </div>
            </div>
            <!--end::Card-->

            <div class="card card-custom my-5 ">
                <div class="card-header bg-dark border-2 my-3">
                    <div class="card-title">
                        <h3 class="card-label"><small>طلبات الدعم الفني والشكاوى </small></h3>
                    </div>
                </div>
                <div class="card-body">

                    <div class="text-center my-5">
                        <p>   لخدمة طلبات الدعم الفني والشكاوى اضغط  <span><a href="{{ route('support.show') }}"
                                    target="_blank">{{ __('customTrans.here') }} </a> </span></p>
                    </div>
                </div>
            </div>

        </div>

    </div> --}}
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Nav Panel Widget 2-->
            <div class="card card-custom gutter-b">
                <!--begin::Body-->
                <div class="card-body ">
                    <!--begin::Nav Tabs-->
                    <ul class=" dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0" role="tablist">
                        <!--begin::Item-->
                        <li class="  nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center  "
                                 href="{{ route('aid.create') }}">
                                <span class="nav-icon py-2 w-auto">
                                    <span
                                        class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                    fill="#000000"></path>
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                    x="16.3255682" y="2.94551858" width="3" height="18"
                                                    rx="1"></rect>
                                            </g>
                                        </svg><!--end::Svg Icon--></span> </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center text-primary">
                                  خدمة تسجيل وتحديث البيانات
                                </span>
                            </a>
                        </li>
                        <!--end::Item-->

                       

                        <!--begin::Item-->
                        <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
                            <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                 href="{{ route('support.show') }}">
                                <span class="nav-icon py-2 w-auto">
                                    <span
                                        class="svg-icon svg-icon-3x"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg><!--end::Svg Icon--></span> </span>
                                <span class="nav-text font-size-lg py-2 font-weight-bolder text-center text-primary">
                                  الدعم الفني والشكاوى
                                </span>
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav Tabs-->

                  
                </div>
                <!--end::Body-->
            </div>
            <!--begin::Nav Panel Widget 2-->
        </div>
    </div>

</div>
