
@if(isset($pages) && is_object($pages))

@foreach($pages as $k=>$page)

    @if($page->isMain())
		<section id="{{$page->alias}}" class="top_cont_outer">
		  <div class="hero_wrapper">
		    <div class="container">
		      <div class="hero_section">
		        <div class="row">
		          <div class="col-lg-5 col-sm-7">
		            <div class="top_left_cont"> <!-- zoomIn wow animated-->
		              {!! $page->text !!}
		             <a href="{{ asset('assets/xls/Price.xls')}}" class="read_more2" download>Прайс-лист</a>
		            </div>
		          </div>
		          <div class="col-lg-7 col-sm-5">
                      {!! Html::image($page->images) !!}
				  </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
		<!--Hero_Section-->
	@else
	<section id="{{$page->alias}}"><!--Aboutus-->
		<div class="inner_wrapper">
		  <div class="container">
		    <h2>{{ $page->name}}</h2>
		    <div class="inner_section">
			<div class="row">
		     <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
		     	<div class=" delay-01s animated fadeInDown wow animated">
                    {!! Html::image($page->images) !!}
		     		<div >
                     <div >
                        <h4>Наш адрес:</h4>
                        <p></p>
                     </div>
                     <div class="detail">
                        <h4>Телефон для связи</h4>
                        <p>+7 903 000-00-00</p>
                     </div>
                     <div class="detail">
                        <h4>Email для связи</h4>
                        <p>mail@mail.ru</p>
                     </div> 
          			</div>
		     	</div>
		     </div>
		     <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
		     	<div class=" delay-01s animated fadeInDown wow animated">
					{!! $page->text !!}
				</div>
			 </div>
		    </div>
		    </div>
		  </div> 
		</div>
	</section>
		<!--/Aboutus--> 
	@endif

@endforeach
@endif

@if(isset($portfolios) && is_object($portfolios))

	<!-- Portfolio -->
<section id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Каталог</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  <div class="portfolio-top"></div>
  <!-- Portfolio Filters -->
  <div class="portfolio">
        
    @if(isset($tags))
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>Все</h5></a></li>
          
          @foreach($tags as $tag)
              <li><a class="" href="#" data-filter=".category{{$tag->id}}">
                      <h5>{{$tag->name}}</h5>
          </a></li>
          @endforeach
      </ul>
    </div>
    <!--/Portfolio Filters --> 
    @endif
    
    <!-- Portfolio Wrapper -->
    <div class="" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper"> <!--isotope fadeInLeft animated wow-->

      @foreach($portfolios as $item)
     
      <!-- Portfolio Item -->
          <div style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); max-width: 200px; opacity: 1;"
               class="portfolio-item one-four category{{ $item->category_id }} isotope-item">
              <div class="img-thumbnail"><img src="{{ $item->images }}" alt=""/></div>
        <div class="item_overlay">
          <div class="item_info">
            <h4 class="project_name">{{ $item->name }}</h4>
   			<h4 class="project_name">опт. цена: {{ $item->price }} руб.</h4>
				{{--  кнопка в КОРЗИНУ находится тут --}}
				{{-- <a href="" class="cart-buy-button" >В корзину</a> --}}
 
    	  </div>
         </div>
        </div>
      <!--/Portfolio Item --> 

      @endforeach
      
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
  
</section>
<!--/Portfolio --> 

@endif
<!-- Basket -->
<section id="basket" class="content">

<!-- {{-- тут товар в корзине --}} -->

<!--/Basket --> 

<!--Footer-->
</section>
<footer class="top_cont_outer" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">

     </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><!-- <span>A.Filippov. Copyright© 2017</span> --></div>
  </div>
</footer>