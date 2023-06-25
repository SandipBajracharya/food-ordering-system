<!-- Footer -->
<footer class="page-footer font-small indigo bg-grey">
    <!-- Footer Links -->
    <div class="container text-md-left py-5">
      <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
                <!-- Links -->
                <img src="{{ asset('image/food-logo-2.png') }}" alt="logo">
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
            <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Quick Links</h5>
        
                <ul class="list-unstyled">
                    <li>
                        <a href="#!">About Us</a>
                    </li>
                    <li>
                        <a href="{{route('restaurant')}}">Restaurants</a>
                    </li>
                    <li>
                        <a href="#!">Contact Us</a>
                    </li>
                </ul>
            </div>
            <!-- Grid column -->
    
            <hr class="clearfix w-100 d-md-none">
            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
    
                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Contact</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Email: email@email.com</a>
                    </li>
                    <li>
                        <a href="#!">Phone: +977-98008000000</a>
                    </li>
                    <li>
                        <a href="#!">Address: Kathmandu, Nepal</a>
                    </li>
                </ul>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 mx-auto">
                <!-- Links -->
                <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Connect With US!</h5>
                <div class="d-flex mx-auto justify-content-between">
                    <i class="fab fa-facebook-square fs-3"></i>
                    <i class="fab fa-instagram fs-3"></i>
                    <i class="fab fa-twitter fs-3"></i>
                </div>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    <!-- Footer Links -->
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 bg-dark text-white">© {{date('Y')}} Copyright:
      <a href="{{config('app.url')}}" class="text-white"> {{config('app.name')}} </a>
    </div>
    <!-- Copyright -->
  
</footer>
<!-- Footer -->