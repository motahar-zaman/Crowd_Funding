@extends('layouts.email')
@section('content')

<!-- <p>株式会社{{$data['name']}}</p> -->
<p>{{$data['name']}} 様</p><br>

<p>Crofun運営局です。</p><br>

<p>いつも大変お世話になっております。</p><br>

<p>今月分の商品発送件数と代金は下記のとおりです。</p><br>

<p>----------------------------------------------------------</p>
<p>商品名　：{{$data['product_name']}}</p>
<p>発送件数：　{{$data['number_of_shipments']}}　　件</p><br>

<p>合計　　：{{$data['total']}}　　　円</p><br>

<p>お振込み先 {{$data['transfer_destination']}}</p>
<p>金融機関名　：{{$data['financial_institution_name']}}</p>
<p>口座名義人　：{{$data['account_holder']}}</p>
<p>金額　　　　：　　{{$data['amount']}}　　　　　円</p>
<p>振込予定日　：{{$data['scheduled_transfer_date']}}</p>
<p>---------------------------------------------------------</p><br>

<p>誤りがある場合は、お手数ですが弊社までご連絡ください。</p>
<p>今後ともよろしくお願い申し上げます。</p>

@endsection    