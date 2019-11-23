<div class="ap-header-wrapper">
	<div class="ap-header theme dropshadow">	
		<div class="toolbar">
			<div class="pull-right">
				<i class="icon action aside-panel-close mdi mdi-close"></i>
				<div class="dropdown pull-right">
					<i id="dropdown6" class="icon action mdi mdi-dots-vertical dropdown-toggle" data-toggle="dropdown"></i>
					<ul class="dropdown-menu top-right" role="menu" aria-labelledby="dropdown6">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#:;">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="#:;">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="#:;">Something else here</a></li>
				    </ul>
				</div><!-- /.dropdown -->
			</div>
			<div class="title large">Settings</div>
		</div><!-- /.toolbar -->
	</div><!-- /.ap-header -->
</div><!-- /.ap-header-wrapper -->
<div class="ap-body">	
	<ul class="list-group no-border pt20">
		<li id="menuPositioner" class="list-group-item pb0">
			<p class="item-title mb10">Menu Position:</p>
			<div id="menuSet" class="switch-toggle">	
			    <input id="menuHorizontal" name="menuPosition" type="radio" value="horizontal">
			    <label for="menuHorizontal">Horizontal</label>
			    
			    <input id="menuVertical" name="menuPosition" type="radio" value="vertical">
			    <label for="menuVertical">Vertical</label>
			    
			    <a class="btn theme"></a>
			</div>		
		</li>

		<li class="divider pt20 pb20"></li>
		<li class="list-group-item pb0">
			<p class="item-title mb10">Page Layout:</p>
			<div class="switch-toggle">	
			    <input id="elevated" name="pageLayout" type="radio" value="elevated">
			    <label for="elevated">Elevated</label>
			    
			    <input id="classic" name="pageLayout" type="radio" value="classic">
			    <label for="classic">Classic</label>
			    
			    <a class="btn theme"></a>
			</div>		
		</li>
		
		<li class="divider pt20 pb20"></li>
		<li class="list-group-item">
			<p class="item-title mb10">Skin Type:</p>
			<div class="switch-toggle">	
			    <input id="lightSkin" name="skin" type="radio" value="light">
			    <label for="lightSkin">Light</label>
			    
			    <input id="darkSkin" name="skin" type="radio" value="dark">
			    <label for="darkSkin">Dark</label>
			    
			    <a class="btn theme"></a>
			</div>		
		</li>
		
		<li class="divider pt20 pb20"></li>
		<li class="list-group-item item-icon pb20">
			<div class="switch icon">
			    <label>
					<input id="switchStyleSheet" type="checkbox">
					<span class="lever"></span>
			    </label>
				<span class="item-title pl12">RTL</span>
			</div>
		</li>

		<li class="divider pt20 pb20"></li>
		<li class="list-group-item"><span class="item-title">Theme:</span></li>

		<li class="list-group-item">			
			<select id="themePicker" class="selectpicker color-picker"  data-title="Select a theme">
				<option class="text-mda" value="mda">MDA</option>
				<option class="text-deep-purple" value="deep-purple">Deep purple</option>
				<option class="text-cyan-dark" value="cyan-dark">Cyan dark</option>
				<option class="text-blue-dark" value="blue-dark">Blue dark</option>
				<option class="text-dark" value="dark">Dark</option>
				<option class="text-lavendar" value="lavendar">Lavendar</option>
				<option class="text-blue-grey" value="blue-grey">Blue Grey</option>
				<option class="text-indigo" value="indigo">Indigo</option>
				<option class="text-red" value="red">Red</option>
			</select>			
		</li>

		<li class="divider pt20 pb20"></li>		
		<li class="list-group-item">
			<span class="item-title">Menu style:</span>
		</li>

		<li class="list-group-item item-icon">
			<input name="menuStyle" type="radio" id="menuTheme" value="theme" class="theme">
			<label for="menuTheme" class="icon"></label>
			<span class="item-title">Theme</span>
		</li>

		<li class="list-group-item item-icon">
			<input name="menuStyle" type="radio" id="menuLight" value="light" class="theme">
			<label for="menuLight" class="icon"></label>
			<span class="item-title">Light</span>
		</li>

		<li class="list-group-item item-icon">
			<input name="menuStyle" type="radio" id="menuDark" value="dark" class="theme">
			<label for="menuDark" class="icon"></label>
			<span class="item-title">Dark</span>
		</li>

		<li class="divider pt20 pb20"></li>		
		<li class="list-group-item">
			<span class="item-title">Navbar style:</span>
		</li>

		<li class="list-group-item item-icon">
			<input name="navbarTheme" type="radio" id="navTheme" value="theme" class="theme">
			<label for="navTheme" class="icon"></label>
			<span class="item-title">Theme</span>
		</li>

		<li class="list-group-item item-icon">
			<input name="navbarTheme" type="radio" id="navThemeInverse" value="themeInverse" class="theme">
			<label for="navThemeInverse" class="icon"></label>
			<span class="item-title">Theme inverse</span>
		</li>
		
		<li class="divider pt10 pb10"></li>
		<li class="list-group-item">
			<button id="clearStorage" class="btn btn-block theme waves-effect waves-light">Clear localstorage</button>
		</li>
	</ul>
			 		
</div><!-- /.ap-body -->

<script>	
	var pageurl = "{{ asset('public/assets/dist/js/menu-settings.js') }}";
	$.getScript(pageurl);

</script>



