@extends("admin.layout.base")
@php $module_name= $module_title . " جدید "@endphp
@section("title")
    {{$module_name}}
@endsection
@section("content")
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{$module_name}}</h4>
                        </div>
                        <div class="card-body">
                            @component($prefix_component.".form",['action'=>route('admin.product.store'),'method'=>'post','upload_file'=>true])
                                @slot("content")
                                    @component($prefix_component."navtab",['number'=>2,'titles'=>['موارد سئو','اطلاعات کلی']])
                                        @slot("tabContent0")
                                            @include("admin.layout.common.seo")
                                        @endslot
                                        @slot("tabContent1")
                                            @component($prefix_component."input",['name'=>'title','title'=>'عنوان','value'=>old('title'),'class'=>'w-50'])@endcomponent
                                            @component($prefix_component."select",['name'=>'status','title'=>'وضعیت','class'=>'w-50','items'=>$status,'value_old'=>old('status')])@endcomponent                                            
                                            @component($prefix_component."upload_file",['name'=>'pic','title'=>'تصویر','class'=>'w-50','module'=>$module])@endcomponent
                                            @component($prefix_component."input",['name'=>'alt_pic','title'=>'alt تصویر','value'=>old('alt_pic'),'class'=>'w-50'])@endcomponent
                                            @component($prefix_component."upload_file",['name'=>'pic_banner','title'=>'تصویر بنر ','value'=>old('pic_banner'),'class'=>'w-50','module'=>$module])@endcomponent
                                            @component($prefix_component."input",['name'=>'alt_pic_banner','title'=>'alt تصویر بنر','value'=>old('alt_pic_banner'),'class'=>'w-50'])@endcomponent
                                            @component($prefix_component."select_recursive",['name'=>'catid','options'=>$product_cats,'label'=>'موضوع', 'sub_method'=>'sub_cats','value'=>old('catid'),'choose'=>true])@endcomponent
                                            @component($prefix_component."input",['name'=>'price','title'=>'قیمت','value'=>old('price'),'class'=>'w-50 price'])@endcomponent
                                            @component($prefix_component."advance_note",['name'=>'note','class'=>'my-2 ','title'=>'ویژگی','value'=>old('note')])@endcomponent
                                            @component($prefix_component."advance_note",['name'=>'note_more','class'=>'my-2 ','title'=>'توضیحات بلند','value'=>old('note_more')])@endcomponent
                                        @endslot
                                    @endcomponent
                                    @component($prefix_component."button",['title'=>'ارسال'])@endcomponent
                                @endslot
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section("footer")
<script>
    $('.price').on('keyup',function (event) {
        $(this).val(function (index, value) { return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","); });
    });
</script>

{{-- <script>
    $('.price-input').on('keyup',function (event) {
        if (event.which >= 37 && event.which <= 40) return;
        var row = $(this).closest('tr');
        $('.result-span').text('');
        $(this).val(function (index, value) { return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ""); });
        var discount = parseFloat($('.discount-input').val());
        var price = parseInt($(this).val());
        var discountedPrice = price;
        if(discount > 0 && discount < 100){
            var discountedPrice = price - ((discount*price)/ 100);
        }
        if(discount == 100){
            var discountedPrice = 0;
        }
        if(price <= discount){
            var discountedPrice = 0;
        }
        if(price > 0){
            $('.result-span').text('قیمت نهایی : '+putComma_(Math.round(discountedPrice)) + ' تومان ');
        }
        $(this).val(function (index, value) { return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","); });
    });
</script>
<script>
    $('.discount-input').on('keyup',function (event) {
        var row = $(this).closest('tr');
        var price = parseInt(putUnComma_($('.price-input').val()));
        var discount = parseFloat($(this).val());
        var discountedPrice = price;
        if(discount > 0 && discount < 100){
            var discountedPrice = price - ((discount*price)/ 100);
        }
        if(discount == 100){
            var discountedPrice = 0;
        }
        if(price > 0){
            $('.result-span').text('قیمت نهایی : '+putComma_(Math.round(discountedPrice)) + ' تومان ');
        }
    });
</script>
<script>
    persian_ = {0: '۰', 1: '۱', 2: '۲', 3: '۳', 4: '۴', 5: '۵', 6: '۶', 7: '۷', 8: '۸', 9: '۹', ',': ','}
    function putComma_(price) {
        arr_ = price.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
        out_ = '';
        for (x_ in arr_.split("")) {
            out_ += persian_[arr_[x_]];
        }
        return  out_;
    }
    function putUnComma_(price) {
        return price.replace(/\D/g, "").replace(/\B(?=(?:\d{3})+(?!\d))/g, "");
    }
</script> --}}

@endsection