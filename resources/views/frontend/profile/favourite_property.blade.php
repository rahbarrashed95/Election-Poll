
@extends('frontend.app')
@section('content')

<section class="buy-detailview">
    <div class="container">
        <h3>Favourite Property</h3>
    <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped align-middle">
      <thead class="">
        <tr>
          <th>#</th>
          <th>Name</th>          
          <th>Price</th>          
        </tr>
      </thead>
      <tbody>
        @php $count = 1; @endphp
            @foreach($favourites as $key => $fav)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>
                        <a style="color: #000;" href="{{ route('front.rent_details',[$fav->property->id]) }}" target="_blank">
                            {{ $fav->property->title }}
                        </a>
                    </td>           
                    <td>{{ $fav->property->price }}</td>           
                </tr>   
            @endforeach    
      </tbody>
    </table>
  </div>
    </div>
</section>


@endsection