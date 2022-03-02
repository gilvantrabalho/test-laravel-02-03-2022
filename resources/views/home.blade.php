@extends('layouts.app')

@section('content')
    <container-body-component>
        <template slot="body">
            <card-component>
                <template slot="header">
                    <h4>Dashboard</h4>
                </template>
                <template slot="body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </template>
            </card-component>
        </template>
    </container-body-component>
@endsection
