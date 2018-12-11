{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.scrollex.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/jquery.scrolly.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/skel.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/util.js') }}"></script>
<!--[if lte IE 8]><script src="{{ URL::asset('assets/js/ie/respond.min.js') }}"></script><![endif]-->
<script src="{{ URL::asset('assets/js/main.js') }}"></script>

@if(Route::current()->getName() === 'client.ordered')
    <script src="{{ URL::asset('assets/js/checkstatus.js') }}"></script>
@endif

@if(Route::current()->getName() === 'admin.feedbacks')
    <script src="{{ URL::asset('assets/js/ajax.js') }}"></script>
@endif