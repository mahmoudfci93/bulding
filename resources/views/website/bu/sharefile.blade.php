@if(count($bus)>0)

<!--foreach( array_chunk($bus,3) as $buus )-->

  <div class="row">
    @foreach( $bus as $key=>$bu )
        @if($key % 3== 0 && $key !=0)
            <div class="clearfix"></div>
        @endif
        <div class="col-md-4 pull-right">
            <div class="productbox">
                @if($bu->photo == '')
                    <img src="{{asset('/main/img/item-1.jpg')}}" style="width: 200px;height: 200px;">
                @else
                    <img src="{{url('uploads',$bu->photo->name)}}" style="width: 200px;height: 200px;">
                @endif

                <div class="producttitle">{{$bu->name}}</div>

                <div class="productprice">
                  <span class="pull-right">
                      المساحة
                      :
                      {{$bu->square}}
                  </span>
                        <span class="pull-left">
                      نوع العملية
                      :
                            {{bu_rent()[$bu->rent]}}
                  </span>
                        <div class="clearfix"></div>
                    <span class="pull-right">
                      نوع العقار
                      :
                        {{bu_type()[$bu->type]}}
                  </span>
                    <span class="pull-left">
المكان
                      :
                        {{bu_place()[$bu->place]}}
                  </span>
                    <div class="clearfix"></div>
                        <hr>

                    <div class="pull-left">
                        @if($bu->status == 0)
                            <a href="{{url('/singleBuilding/'.$bu->id)}}" class="btn btn-danger btm-sm" role="button">فى انتظار التفعيل <span class="glyphicon glyphicon-shopping-cart"></span></a>
                        @else
                            <a href="{{url('/singleBuilding/'.$bu->id)}}" class="btn btn-primary btm-sm" role="button">أظهر التفاصيل <span class="glyphicon glyphicon-shopping-cart"></span></a>
                        @endif
                    </div>

                    <div class="pricetext">{{$bu->price}} €</div>
                </div>

            </div>

        </div>
    @endforeach
     </div>

    <div class="clearfix"></div>
    <br>
@else
    <div class="alert alert-danger">
        لا يوجد اى عقارات حالياً
    </div>
@endif