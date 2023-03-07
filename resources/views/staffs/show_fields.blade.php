<div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
    <div class="card mb-5 mb-xl-8">
        <div class="card-body pt-0 pt-lg-1">
            <div class="card">
                <div class="card-body d-flex flex-center flex-column pt-12 p-9 px-0">
                    <div class="symbol symbol-100px symbol-circle mb-7">
                        <img src="{{$staff->profile_image}}" alt="image"/>
                    </div>
                    <a href="#"
                       class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{$staff->full_name}}</a>
                </div>
            </div>
            <div class="d-flex flex-stack fs-4 py-3">
                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                     role="button" aria-expanded="false"
                     aria-controls="kt_user_view_details">{{__('messages.common.details')}}
                </div>
                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit Staff">
					<a href="{{route('staff.edit', $staff->id)}}"
                       class="btn btn-sm btn-light-primary">{{__('messages.common.edit')}}</a>
				</span>
            </div>
            <div class="separator"></div>
            <div id="kt_user_view_details" class="collapse show">
                <div class="pb-5 fs-6">
                    <div class="fw-bolder mt-5">{{__('messages.user.email')}}</div>
                    <div class="text-gray-600">{{$staff->email}}</div>
                    <div class="fw-bolder mt-5">{{__('messages.user.contact_number')}}</div>
                    <div class="text-gray-600">{{$staff->contact}}</div>
                    <div class="fw-bolder mt-5">{{__('messages.user.gender')}}</div>
                    <div class="text-gray-600">Male</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flex-lg-row-fluid ms-lg-15">
    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
               href="#kt_user_view_overview_security">Security</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
               href="#kt_user_view_overview_events_and_logs_tab">Events &amp; Logs</a>
        </li>
        <li class="nav-item ms-auto">
            <a href="{{route('staff.index')}}" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
               data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
               data-kt-menu-flip="bottom">{{__('messages.common.back')}}</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
            <div class="card card-flush mb-6 mb-xl-9">
                <div class="card-body p-9 pt-4">
                    <div class="tab-content">
                        <div class="d-flex flex-stack position-relative mt-6">
                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                            <div class="fw-bold ms-5">
                                <a href="#"
                                   class="fs-5 fw-bolder text-dark text-hover-primary mb-2">{{$staff->roles->first()->display_name}}</a>
                                <div class="fs-7 text-gray-400">Registered Date :
                                    <a href="#">{{\Carbon\Carbon::parse($staff->created_at)->format('jS \of F Y')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
