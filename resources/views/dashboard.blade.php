@extends('layouts.app')

@section('content')
    @include('layouts.header')
    <div class="container py-4 mb-4 bt bm" id="app">
        <passport-authorized-clients></passport-authorized-clients>
    </div>

    <div class="alert text-sm" style="font-size: 12px; background-color: #F8F3F0; border: 1px solid #0197B0; color: #07262C;" role="alert">
        <i class="fas fa-info-circle"></i>&nbsp;To delete your personal data contact the <a href="mailto:{{ Config::get('app.dpo_mail') }}">Data Protection Officer</a>.
    </div>

    <div class="d-flex flex-column justify-content-center align-items-center gap-3">
        <a href="{{route('logout')}}" class="btn btn btn-primary">Logout</a>

        @can('viewAny', \App\Models\Group::class)
            <a href="{{ route('groups.index') }}" class="btn btn-outline-secondary" style="font-size: 14px;">
                <i class="fas fa-users-cog"></i>&nbsp;Manage groups
            </a>
        @endcan
    </div>
@endsection

@section('js')
    <script>
        var apiUri = "{{ url('/api') }}";
        var csrf = "{{ csrf_token() }}";
    </script>
@endsection
