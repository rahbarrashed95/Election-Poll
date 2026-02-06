<option value="">Select Area</option>
@foreach($areas as $area)
    <option value="{{ $area->id }}" data-name="{{ $area->area_name }}">{{ $area->area_name }}</option>
@endforeach