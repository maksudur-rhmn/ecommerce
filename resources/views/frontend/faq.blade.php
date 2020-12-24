@extends('layouts.frontend')


@section('content')
     <!--breadcrumbs area start-->
     <div class="breadcrumbs_area breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li>Frequently Questions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--faq area start-->
    <div class="faq_content_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="faq_content_wrapper">
                        <h4>Below are frequently asked questions, you may find the answer for yourself</h4>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
     <!--Accordion area-->
    <div class="accordion_area">
        <div class="container">
            <div class="row">
            <div class="col-12"> 
                <div id="accordion" class="card__accordion">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($faqs as $item)
                    <div class="card card_dipult">
                        <div class="card-header card_accor" id="headingOne{{ $i }}">
                            <button class="btn btn-link {{ ($i == 1) ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapseOne{{ $item->id }}" aria-expanded="true" aria-controls="collapseOne{{ $item->id }}">
                              {{ $item->question }}
                              <i class="fa fa-plus"></i>
                              <i class="fa fa-minus"></i>
    
                            </button>
    
                        </div>
    
                        <div id="collapseOne{{ $item->id }}" class="collapse {{ ($i == 1) ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">
                               <p>{{ $item->answer }}</p>
                          </div>
                        </div>
                      </div>
                      @php
                          $i++;
                      @endphp
                    @endforeach
                  {{-- <div class="card card_dipult">
                    <div class="card-header card_accor" id="headingOne">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Mauris congue euismod purus at semper. Morbi et vulputate massa?

                          <i class="fa fa-plus"></i>
                          <i class="fa fa-minus"></i>

                        </button>

                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                           <p>Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies, elit lorem eleifend lorem</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingTwo">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Donec mattis finibus elit ut tristique?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>

                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <p>Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies, elit lorem eleifend lorem</p>
                      </div>
                    </div>
                  </div> --}}
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--Accordion area end-->
    <!--faq area end-->
@endsection