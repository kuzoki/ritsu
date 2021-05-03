<div class="search">
	<i class="ion-search" onclick="showSearchbar()" style="cursor: pointer;"></i>
	<div id="search-bar" class="search-bar">
		
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>" >
			<input class="text" type="text" name="s" id="s" placeholder="Search here..." required />

			<label for="mySubmit" class="search-icon"><i class="ion-search"></i></label>
    		<input id="mySubmit" type="submit" name="submit" value="" class="hidden" />

			<!-- <input type="submit" class="submit button search-icon" id="navsearch" name="submit" value="<?php _e('Search');?>" >
			<i class="ion-search"></i> -->
			<i class="ion-close close-icon" onclick="hideSearchbar()"></i>
		</form>

		
	</div>
		
</div>