@extends('layouts.frontend')

@section('content')
     <!--breadcrumbs area start-->
     <div class="breadcrumbs_area  breadcrumbs_bg">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>contact</h3>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
<!--    contact map start-->
    <div class="contact_map">
       <div class="map-area">
          <div id="googleMap">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14606.682884318001!2d90.4161213!3d23.7591188!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b87825cbaca1%3A0x812f17f208b987fc!2sEast%20Rampura%20High%20School!5e0!3m2!1sen!2sbd!4v1592786351431!5m2!1sen!2sbd"  allowfullscreen></iframe>
          </div>
       </div>
    </div>
    <!--contact map end-->
    
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="contact_message content">
                        <h3>contact us</h3>    
                         <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Address : No 49 rampura 
                            Dahaka City</li>
                            <li><i class="fa fa-phone"></i> <a href="#">Darcheni@Ecommarce.com</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="tel:0167776236">0167776236</a>  </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6">
                   <div class="contact_message form">
                        <h3>Tell us your project</h3>   
                        <form method="POST"  action="{{ route('frontend.contactpost') }}">
                            @csrf
                            <p>  
                               <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text"> 
                            </p>
                            <p>       
                               <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email">
                            </p>
                            <p>          
                               <label>  Phone</label>
                                <input name="phone" placeholder="Phone *" type="text">
                            </p>    
                            <div class="contact_textarea">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" name="message"  class="form-control2" ></textarea>     
                            </div>   
                            <button type="submit"> Send</button>  
                            <p class="form-messege"></p>
                        </form> 

                    </div> 
                </div>
            </div>
        </div>    
    </div>
    <!--contact area end-->
    
@endsection