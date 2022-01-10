<div class="aa-search-box">
	<form action="{!! route('getTimkiem') !!}" method="POST">
    	<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
	  	<input type="text" name="txtSeach" id="txtseach" placeholder="Tìm kiếm...">
	  	<button type="submit"><span class="fa fa-search"></span></button>
	</form>
</div>