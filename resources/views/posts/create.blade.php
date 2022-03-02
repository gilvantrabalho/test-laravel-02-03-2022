@extends('layouts.app')

@section('content')
    <container-body-component>
        <template slot="body">
            <card-component>
                <template slot="header">
                    <h4>Criar novo poster</h4>
                </template>
                <template slot="body">
                    <form action="{{ url('posts/store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="text-muted">Title</label>
                            <input id="title" type="text" name="title" class="form-control">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="text-muted">Body</label>
                            <textarea id="body" name="body" rows="10" class="form-control"></textarea>
                            @if ($errors->has('body'))
                                <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('body') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="tags" class="text-muted">Tags</label>
                            <select id="tags" type="text" name="tags[]" multiple class="form-control">
                                @foreach(\App\Tag::all() as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tags'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">store</button>
                    </form>
                </template>
            </card-component>
        </template>
    </container-body-component>
@endsection
