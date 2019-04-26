@extends('layouts.app')

@section('title','Contact Information List')

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Contact Information List</h5>
                <div class="heading-elements">
                    <a href="{{ route('contactUs.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Package</a>
                </div>
            </div>

            <table class="table datatable-show-all table-responsive table-hover table-bordered table-striped">
                <thead>
                <tr style="background-color: #16d1d5">
                    <th>#</th>
                    <th>Title</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Cover Image</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($contactUs) && $contactUs)
                    @foreach($contactUs as $contact)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{!! 'No 1: '.$contact->phone_no->no1.'<br> No 2: '.$contact->phone_no->no2 !!}</td>
                            <td>{!! $contact->address !!}</td>
                            <td><img src="{{ asset($contact->image_path) }}" alt="cover Image" class="img-fluid img-md img-lg"></td>
                            <td>
                                @if($contact->status == 'A')
                                    <span class="label label-success">Active</span>
                                @elseif($contact->status == 'I')
                                    <span class="label label-warning">In Active</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="text-info-400"><a  href="{{ route('contactUs.show',$contact->id) }}"  ><i class="icon-eye"></i></a></li>
                                    <li class="text-primary-600"><a  href="{{ route('contactUs.edit',$contact->id) }}"  ><i class="icon-pencil7"></i></a></li>
                                    <li class="text-danger-600"><a href="{{ route('contactUs.delete', $contact->id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
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

@section('script')



@endsection
