<div class="container ">

    <x-slot:crumb>
        <x-breadcrumb button label="{{ __('customTrans.add new') }}" route="{{ route('support.create') }}"></x-breadcrumb>
    </x-slot:crumb>

    @forelse ($this->allData as $data)
        <div class="card card-custom my-6" data-card="true" id="kt_card_4">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-mail text-primary"></i>
                    </span>
                    <h3 class="card-label">
                        <small>عنوان الطلب</small>

                        {{ $data->statusSubjectName->status_name }} &nbsp; &nbsp; <span
                            style="font-size: 12px; ">{{ $data->created_at }}</span>

                    </h3>



                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                        <i class="ki ki-arrow-down icon-nm"></i>
                    </a>

                    <a href="#" class="btn btn-icon btn-sm btn-light-danger" data-card-tool="remove">
                        <i class="ki ki-close icon-nm"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">


                <small class="font-weight-bolder">نص الطلب :</small>
                {{ $data->issue_description }}

                <div class="separator separator-dashed mt-8 mb-5"></div>

                <small class="font-weight-bolder">نص الرد :</small>
                
                @if (in_array($data->status_id, [63, 64, 65]))
                    {{ $data->statusIdName->status_name ?? '-' }}</br>
                @endif

                {{ $data->issue_description }}

                <div class="col-12 my-9">
                    @if ($data->uploaded_files)
                        @foreach ($data->uploaded_files as $file)
                            <img src="{{ asset('storage/' . $file) }}" alt="Thumbnail" width="100" height="100">
                        @endforeach
                    @endif
                </div>

            </div>



        </div>
    @empty
        <p>not data</p>
    @endforelse

</div>
