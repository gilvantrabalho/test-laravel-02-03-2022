@extends('layouts.app')

@section('content')
    <container-body-component>
        <template slot="body">
            <card-component>
                <template slot="header">
                    <div class="d-flex justify-content-between">
                        <h3>Post</h3>
                        <div>
                            <a href="{{ url('posts/create') }}" class="btn btn-success" type="button">
                                <i class="bi bi-plus"></i> Novo Post
                            </a>
                        </div>
                    </div>
                </template>
                <template slot="body">
                    <table-component
                        :header="[
                                {name: 'Título'},
                                {name: 'Ações'}
                            ]"
                    >
                        <template slot="body">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ url('posts/edit/' . $post->id) }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a class="btn btn-outline-danger" href="{{ url('posts/destroy/' . $post->id) }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </template>
                    </table-component>
                </template>
            </card-component>
        </template>
    </container-body-component>
@endsection
