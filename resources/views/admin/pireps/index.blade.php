@extends('admin.app')

@section('title', 'Pilot Reports')
@section('actions')
  <li><a href="{{ route('admin.pirepfields.index') }}"><i class="ti-menu-alt"></i>PIREP Fields</a></li>
  <li><a href="{{ route('admin.pireps.index') }}?search=state:{{ \App\Models\Enums\PirepState::PENDING }}"><i class="ti-plus"></i>Pending</a></li>
  <li><a href="{{ route('admin.pireps.index') }}?search=state:{{ \App\Models\Enums\PirepState::REJECTED }}"><i class="ti-plus"></i>Rejected</a></li>
  <li><a href="{{ route('admin.pireps.index') }}?search=state:{{ \App\Models\Enums\PirepState::ACCEPTED }}"><i class="ti-plus"></i>Accepted</a></li>
  <li><a href="{{ route('admin.pireps.index') }}"><i class="ti-plus"></i>View All</a></li>
@endsection
@section('content')
  <div class="card border-blue-bottom">
    <div class="content">
      @include('admin.pireps.table')
    </div>
  </div>
  <div class="row">
    <div class="col-12 text-center">
      {{ $pireps->withQueryString()->links('admin.pagination.default') }}
    </div>
  </div>
@endsection
@include('admin.pireps.scripts')
