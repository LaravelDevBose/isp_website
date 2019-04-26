@extends('layouts.app')

@section('title','Service List')

@section('content')

    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Slider Information</h5>
                <div class="heading-elements">
                    <a href="{{ route('service.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Service</a>
                </div>
            </div>

            <table class="table datatable-show-all table-responsive table-hover table-bordered table-striped">
                <thead>
                <tr style="background-color: #16d1d5">
                    <th>#</th>
                    <th>Service Logo</th>
                    <th>Service Title</th>
                    <th>Service Heading</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($services) && $services)
                    @foreach($services as $service)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ $service->service_logo }}" alt="" style="width: 50px; height: 50px;"></td>
                            <td>{{ $service->service_title }}</td>
                            <td>{{ $service->service_heading }}</td>
                            <td>
                                @if($service->service_status == 'A')
                                    <span class="label label-success">Active</span>
                                @elseif($service->service_status == 'I')
                                    <span class="label label-warning">In Active</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="text-info-400"><a  href="{{ route('service.view',$service->service_id) }}"  ><i class="icon-eye"></i></a></li>
                                    <li class="text-primary-600"><a  href="{{ route('service.edit',$service->service_id) }}"  ><i class="icon-pencil7"></i></a></li>
                                    <li class="text-danger-600"><a href="{{ route('service.delete', $service->service_id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- /content area -->

@endsection

@section('custom_script')



@endsection
