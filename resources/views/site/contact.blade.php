@extends("site.layout.base")
@section('head')
<link rel="stylesheet" href="{{asset('site/assets/css/__libs.css')}}">
    <link rel="stylesheet" href="{{asset('site/assets/css/__pages.css')}}">
@endsection
@section('content')
<!-- bread crumb -->
<div class="container-fluid container-bread-crumb" style="background-image: url('http://www.kavehbgc.com/template/default/fa/assets/image/bc/bg-bread-crumb-contact.jpg')">
    <div class="container-custom">
        <div class="row">
            <div class="col">
                <h1 class="page-title">تماس با ما</h1>
                <ul class="bread-crumb">
                    <li>
                        <a href="">صفحه اصلی</a>
                    </li>
                    <li><a href="javascript:void(0);">تماس با ما</a></li>
                </ul>     
            </div>
        </div>
    </div>
</div>
<!--/ bread crumb -->
<div class="container-fluid container-contact">
    <div class="container-custom">
        <div class="row">
            <div class="col-12">
                <div class="contact-data">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="contact-data-box">
                                <img src="http://www.kavehbgc.com/template/default/fa/assets/image/icon-phone.png" alt="">
                                <div class="des">
                                    <a href="" class="strClear" style="color: #fff;">021-22050301</a>
                                 </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="contact-data-box">
                                <img src="http://www.kavehbgc.com/template/default/fa/assets/image/icon-marker.png">
                                <div class="des">تهران ، خیابان ولیعصر- بالاتر از نیایش - خیابان شهید عاطفی- پلاک 106-ساختمان کیمیا- طبقه 4</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="contact-data-box last">
                                <img src="http://www.kavehbgc.com/template/default/fa/assets/image/icon-envelope.png">
                                <div class="des">
                                    <a href="mailto:info@Kavehbgc.com" style="color: #fff;">
                                    info@Kavehbgc.com\
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div id="map" style="height: 100% !important; position: relative;"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <form action="http://www.kavehbgc.com/ajax.php?contact&amp;action=new" noscroll="yes" method="post" class="form" id="contactForm">
                    <div class="row">
                        <div class="col">
                            <div class="title">فرم تماس با ما</div>
                            <div class="des">کاربران گرامی، شما می توانید از طریق فرم زیر تمامی نقطه نظرات انتقادات و پیشنهادات خود را برای ما ارسال کنید</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="input-box">
                                <input type="text" name="name" id="cf1" error="نام و نام خانوادگی..." class="form-input" placeholder="نام و نام خانوادگی">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="input-box">
                                <input type="text" id="cf3" name="tell" error="لطفا تلفن خود را وارد کنید" check="tell" check_error="تلفن را صحیح وارد کنید" placeholder="شماره تماس" class="form-input">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="input-box">
                                <input type="text" name="email" id="cf2" check="email" check_error="ایمیل اشتباه است!" error="ایمیل..." class="form-input" placeholder="ایمیل">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="input-box">
                            <select name="catid" id="catid" class="form-select form-contact-unit select2-hidden-accessible" data-select2-id="select2-data-catid" tabindex="-1" aria-hidden="true">
                                <option value="0">واحد مربوطه</option>
                             </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="input-box">
                                <textarea name="note" error="پیام شما..." id="cf4" class="form-textarea" placeholder="متن پیام"></textarea> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="sec__code">  
                                <div class="g-recaptcha form-field" data-sitekey="6Lc8yNAkAAAAANeVRlelwJ9iztmu_AqSYo-a6ND_"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-mef43pr39kam" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lc8yNAkAAAAANeVRlelwJ9iztmu_AqSYo-a6ND_&amp;co=aHR0cDovL3d3dy5rYXZlaGJnYy5jb206ODA.&amp;hl=fa&amp;v=TqxSU0dsOd2Q9IbI7CpFnJLD&amp;size=normal&amp;cb=ffdgii21753g"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-btn">
                            <button type="submit" class="btn-custom">ارسال پیام</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    function location_map($lat='',$lng='',$text='',$zoom='19'){
        var map = L.map('map').setView([$lat,$lng],$zoom);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([$lat,$lng]).addTo(map);
        if($text!=''){
            marker.bindPopup($text).openPopup();
        }
    }
    location_map("{{$qgmap}}","{{$lgmap}}",'{!!$cgmap!!}',"{{$zgmap}}");
</script>
@endsection