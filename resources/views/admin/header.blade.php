<div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>{{$title}}</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
<div class="portfolio">

  <div id="filters" class="sixteen columns">
      <ul style="padding:0px 0px 0px 0px">
          <li><a href="{{route('admin.pages.index')}}">
          <h5>Страницы</h5>
          </a>
		</li>

          <li><a href="{{route('admin.products.index')}}">
                  <h5>Список товаров</h5>
          </a>
		</li>
		
		<li><a href="{{route('services')}}">
          <h5>Прайс</h5>
          </a>
		</li>
      </ul>
    </div>
</div>