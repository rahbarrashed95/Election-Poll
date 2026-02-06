@foreach($sub_cat as $s_cat)
    <option value="{{ $s_cat->id }}">{{ $s_cat->name }}</option>
@endforeach