<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Blog Post</h3>
                <hr>
                <br>
                <div class="ms-auto text-right">
                    <div class="btn-group">
                        <a href="{{route('add.post')}}"  class="btn btn-primary" >Add Blog Post</a>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Blog Post Title</th>
                                        <th>Blog Post Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->post_title }}</td>
                                        <td>{{ $item->post_content }}</td>

                                        <td>
                                            <a href="{{route('edit.post',$item->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('view.post',$item->id)}}" class="btn btn-info">View</a>
                                            <a href="{{route('delete.post',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
