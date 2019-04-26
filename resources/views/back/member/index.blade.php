@extends('layouts.app')

@section('title','Team Member List')

@section('content')

    <!-- Content area -->
    <div class="content">
        <div class="panel panel-info panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Team Member Information List</h5>
                <div class="heading-elements">
                    <a href="{{ route('teamMember.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Member</a>
                </div>
            </div>

            <table class="table datatable-show-all table-responsive table-hover table-bordered table-striped">
                <thead>
                <tr style="background-color: #16d1d5">
                    <th>#</th>
                    <th>Member Image</th>
                    <th>Member Name</th>
                    <th>Member Designation</th>
                    <th>View Position</th>
                    <th>Social Links</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($teamMembers) && $teamMembers)
                    @foreach($teamMembers as $teamMember)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($teamMember->member_image) }}" alt="{{ $teamMember->member_name }}" class="img-circle img-lg "></td>
                            <td>{{ $teamMember->member_name }}</td>
                            <td>{{ $teamMember->member_degi }}</td>
                            <td>{{ $teamMember->member_position}}</td>

                            <td>
                                <ul class="icons-list">
                                    @if($teamMember->social_link->facebook)
                                    <li class="text-info-400"><a target="__blank" href="{{ $teamMember->social_link->facebook }}"  ><i class="icon-facebook2"></i></a></li>
                                    @endif

                                    @if($teamMember->social_link->twitter)
                                    <li class="text-primary-600"><a target="__blank" href="{{ $teamMember->social_link->twitter }}"  ><i class="icon-twitter2"></i></a></li>
                                    @endif

                                    @if($teamMember->social_link->google)
                                    <li class="text-warning-600"><a target="__blank" href="{{ $teamMember->social_link->google }}" ><i class="icon-google-plus2"></i></a></li>
                                    @endif

                                    @if($teamMember->social_link->linkedin)
                                    <li class="text-info-600"><a target="__blank" href="{{ $teamMember->social_link->linkedin }}" ><i class="icon-linkedin2"></i></a></li>
                                    @endif
                                </ul>
                            </td>
                            <td>
                                @if($teamMember->member_status == 'A')
                                    <span class="label label-success">Active</span>
                                @elseif($teamMember->member_status == 'I')
                                    <span class="label label-warning">In Active</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="text-primary-600"><a  href="{{ route('teamMember.edit',$teamMember->member_id) }}"  ><i class="icon-pencil7"></i></a></li>
                                    <li class="text-danger-600"><a href="{{ route('teamMember.delete',$teamMember->member_id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
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
