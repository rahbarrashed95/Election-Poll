@foreach($sub_cat as $s_type)
    <li style="display: block;float: left;margin-right: 5px;">
        <label class="custom_check">
            <input id="sub_type_id" class="sub_type_id" type="checkbox" name="username" value="{{ $s_type->id }}">
            <span class="checkmark"></span>  {{ $s_type->name }}
        </label>
    </li>
@endforeach