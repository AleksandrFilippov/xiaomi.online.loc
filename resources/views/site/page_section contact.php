<!-- секция контакт, которую отключили
      <div class="contact_section">
        <h2>обратная связь</h2>
        <div class="row">
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-4">
           
          </div>
          <div class="col-lg-4">
          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 wow fadeInLeft">	
		 <div class="contact_info">
                            <div class="detail">
                                <h4>Наш адрес:</h4>
                                <p>Москва, Москва, ул. Сущевский Вал, 5 стр. 20, ТЦ Савеловский, павильон L20 </p>
                            </div>
                            <div class="detail">
                                <h4>Телефон для связи</h4>
                                <p>+7 903 509-78-77</p>
                            </div>
                            <div class="detail">
                                <h4>Email для связи</h4>
                                <p>5051744@mail.ru</p>
                            </div> 
         </div>
           
          <ul class="social_links">
            <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
            <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
            <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
            <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li> 
          </ul>
        </div>
        <div class="col-lg-8 wow fadeInLeft delay-06s">
          <div class="form">
          
          <form action="{{ route('home')}}" method="post">
            <input class="input-text" type="text" name="name" value="Ваше имя *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <input class="input-text" type="text" name="email" value="Ваш E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <textarea name="text" class="input-text text-area" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">Ваше сообщение *</textarea>
            <input class="input-btn" type="submit" value="отправить">
           
            {{ csrf_field() }}
          
          </form>
          
          </div>
        </div>
      </div>-->