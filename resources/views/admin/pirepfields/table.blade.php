<div class="content table-responsive table-full-width">
  <div class="header">
    @component('admin.components.info')
      By default PIREP fields are shown for Acars and Manual PIREPs.
    @endcomponent
  </div>
  <table class="table table-hover table-responsive" id="pirepFields-table">
    <thead>
      <th>Name</th>
      <th>Description</th>
      <th style="text-align: center;">Required</th>
      <th style="text-align: center;">Pirep Source</th>
      <th></th>
    </thead>
    <tbody>
      @foreach($fields as $field)
        <tr>
          <td>
            {{ $field->name }}
          </td>
          <td>
            {{ $field->description }}
          </td>
          <td style="text-align: center;">
            @if($field->required === true)
              <span class="label label-success">Required</span>
            @endif
          </td>
          <td style="text-align: center;">
            {{ \App\Models\Enums\PirepFieldSource::label($field->pirep_source) }}
          </td>
          <td class="text-right">
            {{ Form::open(['route' => ['admin.pirepfields.destroy', $field->id], 'method' => 'delete']) }}
            <a href="{{ route('admin.pirepfields.edit', [$field->id]) }}" class='btn btn-sm btn-success btn-icon'><i class="fas fa-pencil-alt"></i></a>
            {{ Form::button('<i class="fa fa-times"></i>', [ 'type' => 'submit', 'class' => 'btn btn-sm btn-danger btn-icon', 'onclick' => "return confirm('Are you sure?')"]) }}
            {{ Form::close() }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
