
@foreach($amenity_options as $amenity)
    <div class="col-md-4">
        <div class="review-form">
            <label class="custom_check mb-0">
                <input type="checkbox" name="amenities[]" value="{{ $amenity->amenity }}">
                <span class="checkmark"></span>
                <img width="20" height="20" src="{{ asset('backend/amenity/'.$amenity->image) }}" alt="{{ $amenity->amenity }}"/>
                <span style="margin-left: 7px;color: #000;">{{ $amenity->amenity }}</span>  
            </label>
        </div>
    </div>
@endforeach