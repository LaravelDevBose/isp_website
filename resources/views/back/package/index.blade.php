@extends('layouts.app')

@section('title','Package List')

@section('content')

    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Package Information List</h5>
                <div class="heading-elements">
                    <a href="{{ route('package.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Package</a>
                </div>
            </div>

            <table class="table datatable-show-all table-responsive table-hover table-bordered table-striped">
                <thead>
                <tr style="background-color: #16d1d5">
                    <th>#</th>
                    <th>Package Name</th>
                    <th>Package Heading</th>
                    <th>Package Tag</th>
                    <th>Package Price</th>
                    <th>Package time</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($packages) && $packages)
                    @foreach($packages as $package)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $package->package_name }}</td>
                            <td>{{ $package->package_heading }}</td>
                            <td>{{ $package->package_tag }}</td>
                            <td>{{ $package->package_price }}</td>
                            <td>{{ $package->package_time }}</td>
                            <td>
                                @if($package->package_status == 'A')
                                    <span class="label label-success">Active</span>
                                @elseif($package->package_status == 'I')
                                    <span class="label label-warning">In Active</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="text-info-400"><a  href="{{ route('package.show',$package->package_id) }}"  ><i class="icon-eye"></i></a></li>
                                    <li class="text-primary-600"><a  href="{{ route('package.edit',$package->package_id) }}"  ><i class="icon-pencil7"></i></a></li>
                                    <li class="text-danger-600"><a href="{{ route('package.delete', $package->package_id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
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
