@foreach($areas as $area)
    <option value="{{ $area->id }}">{{ $area->area_name }}</option>
@endforeach