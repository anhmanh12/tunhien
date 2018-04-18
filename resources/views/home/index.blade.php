<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/bootstrap/css/bootstrap.min.css">

  <!-- Font Montserrat CSS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700&amp;subset=vietnamese" rel="stylesheet">

  <!-- Font awesome CSS -->
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/font-awesome/css/font-awesome.min.css">

  <!-- Nivo CSS -->
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/nivo/themes/default/default.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/nivo/nivo-slider.css" type="text/css" media="screen" />

  <!-- Wow CSS -->
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/wow/css/animate.css">

  <!-- Slick -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/tunhien')}}/lib/slick/css/slick.css">
  <link rel="stylesheet" type="text/css" href="{{asset('public/tunhien')}}/lib/slick/css/slick-theme.css">

  <!-- SCroll down CSS -->
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/scroll-down/scroll-down.css">

  <!-- My style CSS -->
  <link rel="stylesheet" href="{{asset('public/tunhien')}}/lib/css/myStyle.css">

  <title>TỰ NHIÊN</title>
</head>
<body>
  <!-- Content -->
  <div id="root">
    <div id="Main">
      <!-- Header -->
      <div id="Header">
        <!-- Nav -->
        <div id="Nav">
          <nav class="navbar navbar-expand-lg">
            <!-- Logo -->
            <a href="#" class="navbar-brand">
<?php
$logo    = file_get_contents(storage_path()."/jsonLogo/logo.json");
$logo    = json_decode($logo, true);
$sologan = file_get_contents(storage_path()."/jsonLogo/sologan.json");
$sologan = json_decode($sologan, true);
?>
<img src="@if($logo['Image']!=null) {{asset('public/tunhien/images')."/". $logo['Image']}} @endif" class="logo"/>
              <img src="@if($sologan['Image']!=null) {{asset('public/tunhien')."/". $sologan['Image']}} @endif" class="sologan" />
            </a>
            <!-- End Logo -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <!-- Link -->
<?php
$datamenu = file_get_contents(storage_path()."/jsonmenu/menu.json");
$datamenu = json_decode($datamenu, true);
if (!empty($datamenu)) {
	foreach ($datamenu as $key => $value) {
		?>
		<li class="nav-item">
												                    <a class="nav-link" href="{{$value['LinkMenu']}}" target="_blank">{{$value['NameMenu']}}</a>
												                  </li>
		<?php
	}
}
?><!-- End link -->

              <li class="line"></li>

              <!-- Social -->
<?php
$datasocial = file_get_contents(storage_path()."/jsonSocial/socialheader.json");
$datasocial = json_decode($datasocial, true);
if (!empty($datasocial)) {
	foreach ($datasocial as $key => $value) {
		?>
												                <li class="nav-item">
												                  <a class="nav-link social" href="<?php if ($value['NameSocial'] == 'facebook') {
			echo 'http://www.facebook.com/sharer/sharer.php?u='.$value['LinkSocial'];
		} elseif ($value['NameSocial'] == 'youtube-play') {
			echo $value['LinkSocial'];
		} elseif ($value['NameSocial'] == 'vimeo') {
			echo $value['LinkSocial'];
		} elseif ($value['NameSocial'] == 'twitter') {
			echo $value['LinkSocial'];
		} elseif ($value['NameSocial'] == 'delicious') {
			echo $value['LinkSocial'];
		}?>" target="_blank"><i class="fa fa-{{$value['NameSocial']}}" aria-hidden="true"></i></a>
												               </li>




		<?php }}?>
<!-- End Social -->
             </ul>
           </div>
         </nav>
       </div>
       <!-- End Nav -->

       <!-- Slide -->
       <div id="Slide">
        <div class="container-fluid">
          <div id="ShowSlide">
<?php
$data = file_get_contents(storage_path()."/jsonSlideshow/slideshow.json");
$data = json_decode($data, true);
if (!empty($data)) {
	foreach ($data as $key => $value) {
		?>
		<img src="@if($value['NameImage']!=null) {{asset('public/tunhien/images')."/". $value['NameImage']}} @endif " data-thumb="resources/assets/images/{{$value['NameImage']}}" />
		<?php }}?>
</div>
          </div>
        </div>
        <!-- End Slide -->
      </div>
      <!-- End Header -->

      <!--About-->
      <div id="About">

        <section id="section07" class="demo">
          <a href="#About"><span></span><span></span><span></span></a>
        </section>

        <div class="container-fluid">
          <div class="row">
<?php $dataabout = file_get_contents(storage_path()."/jsonabout/about.json");
$dataabout       = json_decode($dataabout, true);
if (!empty($dataabout)) {
	foreach ($dataabout as $key => $value) {

		?>
		<div class="col-sm-6 col-md-6 col-lg-3 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
												                  <div class="itemAbout">

												                    <div class="front">
												                      <div class="IconAbout">
												                        <i class="fa fa-{{$value['NameIcon']}}"></i>
												                      </div>
												                      <div class="title">
												                        <h1>{{$value['TitleTop']}}</h1>
												                        <p>{{$value['TitleBot']}}</p>
												                      </div>
												                    </div>
												                    <div class="back">
												                      <div class="title">
												                        <h1>{{$value['TitleTop']}}</h1>
												                        <p>{{$value['TitleBot']}}</p>
												                      </div>
												                      <p class="text">{{$value['Text']}}</p>
												                      <a href="{{$value['Link']}}" target="_blank">XEM THÊM <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
												                    </div>
												                  </div>
												                </div>
		<?php }}?>
<!-- <div class="col-sm-6 col-md-6 col-lg-3 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
            <div class="itemAbout">
              <div class="front">
                <div class="IconAbout">
                  <i class="fa fa-users"></i>
                </div>
                <div class="title">
                  <h1>quản lý</h1>
                  <p>chuyên nghiệp</p>
                </div>
              </div>

              <div class="back">
                <div class="title">
                  <h1>quản lý</h1>
                  <p>chuyên nghiệp</p>
                </div>
                <p class="text">Đội ngũ lãnh đạo, quản lý được đào tạo đúng chuyên ngành và công nhân lành nghề. Công Ty chúng Tôi luôn làm hài lòng khách hàng và đáp ứng mọi đơn hàng của Quý khách.</p>
                <a href="http://tunhienvn.com/dodungkhachsan.php" target="_blank">XEM THÊM <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
        -->
     <!--    <div class="col-sm-6 col-md-6 col-lg-3 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
          <div class="itemAbout">
            <div class="front">
              <div class="IconAbout">
                <i class="fa fa-paper-plane-o"></i>
              </div>
              <div class="title">
                <h1>chiến lược</h1>
                <p>phát triển</p>
              </div>
            </div>

            <div class="back">
              <div class="title">
                <h1>chiến lược</h1>
                <p>phát triển</p>
              </div>
              <p class="text">CHIẾN LƯỢC PHÁT TRIỂN: Ngay từ những ngày đầu thành lập và trong suốt quá trình phát triển, Công Ty Cổ Phần Hóa Mỹ Tự Nhiên luôn đặt tiêu chí chất lượng hàng hóa...</p>
              <a href="http://tunhienvn.com/dodungkhachsan.php" target="_blank">XEM THÊM <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-6 col-lg-3 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
          <div class="itemAbout">
            <div class="front">
              <div class="IconAbout">
                <i class="fa fa-archive"></i>
              </div>
              <div class="title">
                <h1>sản phẩm</h1>
                <p>chất lượng</p>
              </div>
            </div>

            <div class="back">
              <div class="title">
                <h1>sản phẩm</h1>
                <p>chất lượng</p>
              </div>
              <p class="text">Công Ty chúng Tôi thành lập từ năm 2000, sản xuất và nhập khẩu 3 ngành nghề chính: Thiết bị khách sạn - In ấn bao bì giá rẻ - Đồ dùng khách sạn</p>
              <a href="http://tunhienvn.com/products.php" target="_blank">XEM THÊM <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div> -->

      </div>
    </div>

    <section id="section05" class="demo demoAbout2">
      <a href="#"><span></span></a>
    </section>

  </div>
  <!--End About-->

  <!-- Product -->
  <div id="Product">
    <div class="container-fluid">
      <div class="title">
        <span class="text1">SẢN PHẨM</span> <span class="text2">NỔI BẬT</span>
      </div>
      <div class="row">

        <div class="col-sm-6 col-md-4 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <a href="#">
              <img src="{{asset('public/tunhien')}}/images/memoire-lavender.png" class="w-100"/>
              <h5>Sữa rửa mặt Dabo</h5>
            </a>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <a href="#">
              <img src="{{asset('public/tunhien')}}/images/memoire-olive.png" class="w-100"/>
              <h5>Set Whoo Mini đỏ</h5>
            </a>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <a href="#">
              <img src="{{asset('public/tunhien')}}/images/memoire-oliveS.png" class="w-100"/>
              <h5>mặt nạ cherry</h5>
            </a>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <a href="#">
              <img src="{{asset('public/tunhien')}}/images/mp-2.jpg" class="w-100"/>
              <h5>phấn nền chanel</h5>
            </a>
          </div>
        </div>

      </div>
    </div>

    <section id="section05" class="demo">
      <a href="#"><span></span></a>
    </section>

  </div>
  <!-- End Product -->

  <!-- Why choose -->
  <div id="Why">
    <div class="title">
      <span class="text1">tại SAO</span> <span class="text2">NÊN CHỌN CHÚNG TÔI</span>
    </div>
    <div class="container-fluid">
      <div class="row">

        <!-- Chú ý phần 'data-wow-delay' trong mỗi phần tử sẽ tăng dần -->

        <div class="col-sm-6 col-md-4 wow flipInY" data-wow-delay="0s" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <i class="fa fa-truck"></i>
            <h1>Giao hàng nhanh</h1>
            <p class="text">Đội ngũ giao hàng của Tự Nhiên đảm bảo giao hàng đến tận kho hàng của Quý khách, nhanh chóng và đúng hẹn.</p>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 wow flipInY" data-wow-delay="1s" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <i class="fa fa-cogs"></i>
            <h1>Sản xuất - Cung Cấp</h1>
            <p class="text">Công ty chúng tôi nhận sản xuất và cung cấp hàng theo yêu cầu của khách hàng, đảm bảo sản phẩm theo đúng quy cách, mẫu mã, chất lượng và số lượng.</p>
          </div>
        </div>

        <div class="col-sm-6 col-md-4 wow flipInY" data-wow-delay="2s" data-wow-duration="2s" data-wow-offset="180">
          <div class="item">
            <i class="fa fa-users"></i>
            <h1>Tư vấn miễn phí</h1>
            <p class="text">Với đội ngũ chăm sóc khách hàng chuyên nghiệp, sẵn sàng tư vấn mọi thông tin theo yêu cầu Quý khách cam kết sẽ đem lại cho Quý khách sự hài lòng.</p>
          </div>
        </div>

      </div>
    </div>

    <section id="section05" class="demo">
      <a href="#"><span></span></a>
    </section>

  </div>
  <!-- End Why choose -->

  <!-- Statistical -->
  <div id="Statistical">
    <div class="bg">
      <div class="container-fluid">
        <div class="title">
          <h1>MỘT SỐ THÔNG KÊ</h1>
          <p>BẠN CẦN BIẾT</p>
        </div>

        <div class="row">

          <!-- Chú ý phần 'data-wow-delay' trong mỗi phần tử sẽ tăng dần -->

          <div class="col-sm-12 col-md-4">
            <div class="item">
              <div class="row NumBer">
                <div class="col-6">
                  <div class="num counter wow bounceIn" data-wow-delay="0s" data-wow-duration="2s" data-wow-offset="180">3310</div>
                </div>
                <div class="col-6">
                  <div class="title">
                    <p>MÁY MÓC</p>
                    <h1>THIẾT BỊ</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-4">
            <div class="item">
              <div class="row NumBer">
                <div class="col-6">
                  <div class="num counter wow bounceIn" data-wow-delay="1s" data-wow-duration="2s" data-wow-offset="180">1500</div>
                </div>
                <div class="col-6">
                  <div class="title">
                    <p>DIỆN TÍCH</p>
                    <h1>MẶT BẰNG</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-4">
            <div class="item">
              <div class="row NumBer">
                <div class="col-6">
                  <div class="num counter wow bounceIn" data-wow-delay="2s" data-wow-duration="2s" data-wow-offset="180">4120</div>
                </div>
                <div class="col-6">
                  <div class="title">
                    <p>ĐỘI NGŨ</p>
                    <h1>LAO ĐỘNG</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- End Statistical -->

  <!-- Testimonial -->
  <div id="Testimonial" class="wow flipInX" data-wow-duration="2s" data-wow-offset="180">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img src="{{asset('public/tunhien')}}/images/ba-thuy-le.jpg" class="avatar animated slideInDown"/>
          <div class="txt1">Các thiết bị khách sạn đang được sử dụng tại resort của
            chống tôi thật sự tạo ấn tượng tốt với khách lưu trú nhờ vào chất lượng và mẫu
          mã rất sang trọng. Các sản phẩm do công ty Tự Nhiên cung cấp luôn làm cho tôi hài lòng và yên tâm.</div>
          <div class="txt2">Bà Lê Thi Thu Thủy</div>
          <div class="txt3">Purchasing Manager, Vinpearl Phú Quốc</div>
        </div>

        <div class="carousel-item">
          <img src="{{asset('public/tunhien')}}/images/ong-le-tong.jpg" class="avatar animated slideInDown"/>
          <div class="txt1">Tôi rất an tâm với các sản phẩm đồ dùng phòng khách
            sạn do Công ty Tự Nhiên sản xuất. Các bộ đồ dùng trong phòng khách sạn
            với mẫu mã đẹp và chất lượng tốt đã góp phần tôn lên giá trị của khách
          sạn cũng như thể hiện sự trân trọng với khách lưu trú.</div>
          <div class="txt2">Ông Tống Thành Lễ </div>
          <div class="txt3">Giám Đốc Điều Hành, Diamond Bay Resort</div>
        </div>

        <div class="carousel-item">
          <img src="{{asset('public/tunhien')}}/images/ong-hung-nguyen.jpg" class="avatar animated slideInDown"/>
          <div class="txt1">Khi nghĩ về thiết bị và đồ dùng phòng khách sạn thì tôi
            luôn nghĩ ngay đến Công ty Tự Nhiên bởi sự tận tình tư vấn, giá cả phải chăng
            và chất lượng tuyệt vời. Tôi sẽ giới thiệu với những đồng nghiệp của mình trong
          ngành khách sạn để tiếp tục chọn Công ty Tự Nhiên.</div>
          <div class="txt2">Ông Nguyên Quốc Hùng</div>
          <div class="txt3">Giám Đốc Điều Hành, Novotel Hotel</div>
        </div>

      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- End Testimonial -->

  <!-- Slide partner -->
  <div id="LogoSlide" class="wow fadeIn" data-wow-duration="4s" data-wow-offset="180">
    <div class="titleItem">
      <span class="text1">ĐỐI TÁC</span> <span class="text2">CỦA CHÚNG TÔI</span>
    </div>
    <div id="ShowSlide">

      <a href="http://tunhienvn.com/dodungkhachsan.php" target="_blank">
        <p class="avatar" style="background-image: url({{asset('public/tunhien')}}/images/icon1.png)"></p>
        <h4 class="title">Đồ dùng khách sạn</h4>
        <p class="description">Nhà cung cấp đồ dùng phòng khách sạn hàng đầu tại Việt Nam</p>
      </a>

      <a href="http://thietbikhachsan.org/" target="_blank">
        <p class="avatar" style="background-image: url({{asset('public/tunhien')}}/images/icon2.png)"></p>
        <h4 class="title">Thiết bị khách sạn</h4>
        <p class="description">Nhà cung cấp thiết bị phòng khách sạn, máy vệ sinh công nghiệp lớn nhất Việt Nam</p>
      </a>

      <a href="http://dorco.vn/" target="_blank">
        <p class="avatar" style="background-image: url({{asset('public/tunhien')}}/images/icon3.png)"></p>
        <h4 class="title">Công nghiệp phụ trợ</h4>
        <p class="description">Chuyên gia công các lĩnh vực: đồ dùng khách sạn, thiết bị khách sạn, in ấn,...</p>
      </a>

      <a href="http://thietbikhachsan.org/" target="_blank">
        <p class="avatar" style="background-image: url({{asset('public/tunhien')}}/images/icon4.png)"></p>
        <h4 class="title">Tinh chất thiên nhiên</h4>
        <p class="description">Chuyên cung cấp các sản phẩm chiết xuất từ thiên nhiên, thân thiện môi trường</p>
      </a>

    </div>
  </div>
  <!-- End Slide partner -->

  <!-- Contact -->
  <div id="Contact">
    <div class="bg">
      <div class="title">
        <span class="text2">BẠN MUỐN</span> <span class="text1">LIÊN HỆ</span> <span class="text2">VỚI CHÚNG TÔI?</span>
      </div>

      <form name="frm" id="frmContact" method="post" action="/mail">
        <div class="form-row">
          <div class="form-group col-md-6 wow slideInRight" data-wow-duration="2s" data-wow-offset="180">
            <label htmlFor="inputName">Họ và tên</label>
            <input type="text" class="form-control mb-3" name="inputName" placeholder="Nhập họ và tên" required/>

            <label htmlFor="inputEmail">Email</label>
            <input type="email" class="form-control mb-3" name="inputEmail" placeholder="Nhập Email" required/>

            <label htmlFor="inputPhone">Số điện thoại</label>
            <input type="phone" class="form-control" name="inputPhone" placeholder="Nhập số điện thoại" required/>
          </div>

          <div class="form-group col-md-6 wow slideInLeft" data-wow-duration="2s" data-wow-offset="180">
            <label htmlFor="inputContent">Nội dung</label>
            <textarea class="form-control" name="inputContent" rows="8" placeholder="Nhập nội dung" required></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-danger">GỬI NGAY</button>
      </form>
    </div>
  </div>
  <!-- End Contact -->

  <!-- Footer -->
  <div id="Footer">
    <div class="bg">
      <div class="container-fluid">
        <!-- Info Address -->
        <div class="row showFooter infoAddress">

          <!-- Chú ý phần 'data-wow-delay' trong mỗi phần tử sẽ tăng dần -->

          <div class="col-md-4 wow bounceIn" data-wow-delay="0s" data-wow-duration="2s" data-wow-offset="180">
            <a href="https://www.google.com/maps/place/718+L%C6%B0%C6%A1ng+%C4%90%E1%BB%8Bnh+C%E1%BB%A7a,+V%C4%A9nh+Th%E1%BA%A1nh,+Th%C3%A0nh+ph%E1%BB%91+Nha+Trang,+Kh%C3%A1nh+H%C3%B2a/@12.2669783,109.1476582,17z/data=!3m1!4b1!4m5!3m4!1s0x31705d197187ea85:0xea6ab6a67b46b398!8m2!3d12.2669783!4d109.1498469">
              <div class="item">
                <div class="row">
                  <div class="col-3">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                  </div>
                  <div class="col-9">
                    <div class="text">
                      <p>địa chỉ:<br/>718 Lương Định Của, xã Vĩnh Thạnh, Tp. Nha Trang, tỉnh Khánh Hòa</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-md-4 wow bounceIn" data-wow-delay="1s" data-wow-duration="2s" data-wow-offset="180">
            <div class="item">
              <div class="row">
                <div class="col-3">
                  <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                </div>
                <div class="col-9">
                  <div class="text">
                    <p>đIỆN THOẠI:<br/>
                      <a href="tel:+8402583815577">(+84.0258) 3815 577</a> -
                      <a href="tel:+841900636914">1900 636 914</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 wow bounceIn" data-wow-delay="2s" data-wow-duration="2s" data-wow-offset="180">
              <a href="mailto:info@tunhienvn.com">
                <div class="item">
                  <div class="row">
                    <div class="col-3">
                      <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    </div>
                    <div class="col-9">
                      <div class="text">
                        <p>email:<br/>INFO@TUNHIENVN.COM</p>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>

          </div>
          <!--End Info Address -->
        </div>
      </div>

      <!-- Map -->
      <div id="map" class="wow fadeIn" data-wow-duration="4s" data-wow-offset="180"></div>
      <!-- End Map -->

      <div id="textAuthor">
        <div class="container-fluid">
          <div class="row">
            <div class="col-6">
              <div class="designBy">
                <p>Thiết kế bởi <a href="http://sweetsoft.net" target="_blank">Sweetsoft</a></p>
              </div>
            </div>

            <div class="col-6">
              <div class="social">
                <ul class="nav justify-content-end">

                  <li class="nav-item">
                    <a class="nav-link social" href="http://www.facebook.com/sharer/sharer.php?u=http://tunhienvn.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link social" href="https://vimeo.com/200306662" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link social" href="https://www.youtube.com/watch?v=BEQ4jMGP1fs" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link social" href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link social" href="" target="_blank"><i class="fa fa-delicious" aria-hidden="true"></i></a>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer -->
  </div>
</div>
<!-- End content -->

<!-- Back top -->
<div id="Top">
  <img src="{{asset('public/tunhien')}}/images/top.png">
</div>
<!-- End Back top -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('public/tunhien')}}/lib/jquery/jquery.min.js"></script>
<script src="{{asset('public/tunhien')}}/lib/bootstrap/js/popper.min.js"></script>
<script src="{{asset('public/tunhien')}}/lib/bootstrap/js/bootstrap.min.js"></script>

<!-- Wow JS -->
<script src="{{asset('public/tunhien')}}/lib/wow/js/wow.min.js"></script>

<script type="text/javascript" src="{{asset('public/tunhien')}}/lib/nivo/jquery.nivo.slider.js"></script>

<!-- Slick -->
<script type="text/javascript" src="{{asset('public/tunhien')}}/lib/slick/js/slick.min.js"></script>

<!-- Flip JS -->
<script src="{{asset('public/tunhien')}}/lib/flip/js/jquery.flip.min.js"></script>

<!-- Counter -->
<script src="{{asset('public/tunhien')}}/lib/counter/waypoints.min.js"></script>
<script src="{{asset('public/tunhien')}}/lib/counter/jquery.counterup.min.js"></script>

<!-- Google map apis -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQL-gEE16RcrCTRKO6azak9qrP6I0xKrU&callback=initMap"
async defer></script>

<!-- Scroll down JS -->
<script src="{{asset('public/tunhien')}}/lib/scroll-down/scroll-down.js"></script>

<!-- My script JS -->
<script src="{{asset('public/tunhien')}}/lib/js/myScript.js"></script>
</body>
</html>
