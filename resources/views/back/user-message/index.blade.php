@extends('layouts.app')

@section('title','User Message List')

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Users Message Information List</h5>
            </div>

            <table class="table datatable-show-all table-responsive table-hover table-bordered table-striped">
                <thead>
                <tr style="background-color: #16d1d5">
                    <th>#</th>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Phone No</th>
                    <th>Email Address</th>
                    <th>Read at</th>
                    <th>Replied</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($messages) && $messages)
                    @foreach($messages as $message)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>{{ $message->phone_NO }}</td>
                            <td>{{ $message->email }}</td>
                            <td>
                                @if($message->reading == '1')
                                    <span class="label label-success">Yes</span>
                                @else
                                    <span class="label label-warning">No</span>
                                @endif
                            </td>
                            <td>
                                @if($message->replied == '1')
                                    <span class="label label-success">Yes</span>
                                @else
                                    <span class="label label-warning">No</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="btn btn-xs btn-info"><a  href="{{ route('message.read_at',$message->id) }}"  ><i class="icon-reading"></i></a></li>
                                    <li class="btn btn-xs btn-primary"><a  href="{{ route('message.replied',$message->id) }}"  ><i class="icon-reply"></i></a></li>
                                    <li class="btn btn-xs btn-danger"><a href="{{ route('message.delete', $message->id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
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
