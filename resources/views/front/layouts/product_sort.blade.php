<?php
$Data = new App\Helpers\Data();
$sorts = $Data->productSortCategories;
//  dd($sorts);
?>

<select class="form-control sort" name="s">
	<!-- <option value="0">選択</option> -->
	<?php foreach($sorts as $s){?>
	    @if ($s['name'] == 'お気に入り順')
		<option value="{{$s['value']}}" {{Request::get('s') == $s['value']? 'selected' : ''}}>お気に入り数順</option>
		@else
		<option value="{{$s['value']}}" {{Request::get('s') == $s['value']? 'selected' : ''}}>{{$s['name']}}</option>
		@endif
	<?php }?>
</select>


@section('sort_js')
	<script type="text/javascript">
		$(function(){
			$('.sort').on('change', function(){
				var url = new URL(window.location.href);
	            var searchParams = new URLSearchParams(url.search.slice(1));

				searchParams.delete('s');
				searchParams.append('s', $(this).val());1
				// alert(searchParams.toString());
				document.location.replace('?'+searchParams.toString());
			})
		})
	</script>
@stop
