<?php
$Data = new App\Helpers\Data();
$prefectures = $Data->prefectures;
// dd($sorts);
?>

<select class="form-control required prefectures" id="prefectures" name="prefectures" onclick="removealert('prefecture_error')">
	<option value="">選択</option>
	<?php foreach($prefectures as $p){?>
		<option value="{{$p['value']}}" {{ isset($user->profile->prefectures) && $user->profile->prefectures == $p['value'] ? 'selected' : '' }}>{{$p['name']}}</option>
	<?php }?>
</select>
<span class="error_font" id="prefecture_error" style="color:red;"></span>


@section('sort_js')

@stop
