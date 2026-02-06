 @foreach($amenity_options as $key => $amenity)
    @if($key == 3)
        <div class="col-md-4">
            <div class="review-form">
                <label class="custom_check mb-0">
                    <input type="checkbox" name="amenities[]" value="{{ $amenity }}" {{ in_array($amenity, $amenity_options) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <img width="20" height="20" src="https://img.icons8.com/windows/20/air-conditioner.png" alt="air-conditioner"/>
                    <span style="margin-left: 7px;color: #000;">{{ $amenity }}</span>  
                </label>
            </div>
            
            <!--<div class="review-form">-->
            <!--    <label class="custom_check mb-0">-->
            <!--        <input type="checkbox" name="amenities[]" value="Lawn" checked>-->
            <!--        <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/20/external-lawn-camping-vitaliy-gorbachev-lineal-vitaly-gorbachev.png" alt="external-lawn-camping-vitaliy-gorbachev-lineal-vitaly-gorbachev"/> <span style="margin-left: 7px;color: #000;"> Lawn </span>-->
            <!--    </label>-->
            <!--</div>-->
            <!--<div class="review-form">-->
            <!--    <label class="custom_check mb-0">-->
            <!--        <input type="checkbox" name="amenities[]" value="Swimming Pool">-->
            <!--        <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/swimming-pool.png" alt="swimming-pool"/> <span style="margin-left: 7px;color: #000;"> Swimming Pool </span>-->
            <!--    </label>-->
            <!--</div>-->
            <!--<div class="review-form">-->
            <!--    <label class="custom_check mb-0">-->
            <!--        <input type="checkbox" name="amenities[]" value="Barbeque">-->
            <!--        <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/barbeque.png" alt="barbeque"/> <span style="margin-left: 7px;color: #000;"> Barbeque </span>-->
            <!--    </label>-->
            <!--</div>-->
            <!--<div class="review-form">-->
            <!--    <label class="custom_check mb-0">-->
            <!--        <input type="checkbox" name="amenities[]" value="Microwave" checked>-->
            <!--        <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/microwave.png" alt="microwave"/> <span style="margin-left: 7px;color: #000;"> Microwave </span>-->
            <!--    </label>-->
            <!--</div>-->
        </div>
    @elseif($key == 4 && $key == 7)
        <div class="col-md-4">
            <div class="review-form">
                <label class="custom_check mb-0">
                    <input type="checkbox" name="amenities[]" value="{{ $amenity }}" {{ in_array($amenity, $amenity_options) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <img width="20" height="20" src="https://img.icons8.com/windows/20/air-conditioner.png" alt="air-conditioner"/>
                    <span style="margin-left: 7px;color: #000;">{{ $amenity }}</span>  
                </label>
            </div>
        </div>
    @else
        <div class="col-md-4">
            <div class="review-form">
                <label class="custom_check mb-0">
                    <input type="checkbox" name="amenities[]" value="{{ $amenity }}" {{ in_array($amenity, $amenity_options) ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                    <img width="20" height="20" src="https://img.icons8.com/windows/20/air-conditioner.png" alt="air-conditioner"/>
                    <span style="margin-left: 7px;color: #000;">{{ $amenity }}</span>  
                </label>
            </div>
        </div>
    @endif
@endforeach