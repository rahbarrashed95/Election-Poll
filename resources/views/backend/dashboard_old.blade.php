@extends('backend.partials.app')
@push('css')

@endpush
@section('content')

<style>
.number_div {
    border-radius: 50%;
    height: 160px;
    width: 160px;
}
.bottom_number {
    margin-top: 62px;
}
.top_text {
    font-weight: 700;
    margin-bottom: 20px;
}
</style>

<h3 class="text-dark mb-4 text-center top_text">Dashboard</h3>
<div class="row g-6 mb-6 dashboard-cards text-center" style="margin-top: 45px;">
<h2 style="font-weight: 700;">Welcome To NUK Bd</h2>
    
</div>
<!--<div class="row mt-3">-->
<!--    <div class="col-lg-5 col-md-6 col-12 mb-3">-->
<!--        <div class="card rounded-3 p-3 shadow">-->
<!--            <h3>Monthly Presences</h3>-->
<!--            <div id="chartContainer" style="height: 370px; width: 100%;"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-lg-7 col-md-12 col-12 mb-3">-->
<!--        <div class="card rounded-3 p-3 shadow">-->
<!--            <h3>Monthly Revenue</h3>-->
<!--            <div id="growth" style="height: 370px; width: 100%;"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection

@push('js')
<script type="text/javascript">
    
    $(document).ready(function(){

        let url='{{ route("admin.dashboard")}}';
        $.ajax({
           type:'GET',
           url:url,
           data:{},
           success:function(res){
                $('span#total_sell').text(res.total_sell);
                $('span#total_member').text(res.total_member);
                $('span#membership_payment').text(res.membership_payment);
                $('span#total_expense').text(res.total_expense);
           }
        });


    })
</script>
@endpush
