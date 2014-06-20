<?php get_header(); ?>

<!-- Row for main content area -->
	<article class="small-12 large-12 columns" role="main">
		<h1 class="entry-title">Equipment Shop</h1>
		
		<hr>

		<p>The rain has settled in for the night, so much so that it's begun to soak through your good, heavy 
			synth boots. The rain here is slick, almost oily, and you sprint down the road and duck through a 
			nearby open door. To your surprise, you nearly trip face first crossing the threshold of the shop. 
			Before you can hit the ground, a short, fat, eldery old man puts his hand up into the air. You hear 
			the hum of energy as a greyish-blue hologram is projected from his hand. You have just enough time 
			midfall to think the hologram looks a bit bird-like before it hits you square in the chest, stopping 
			your fall. As the man looks you over, the hologram decays into oblivion. A large grin spreads across 
			his face as he gestures to the racks and racks of assorted goods. "Welcome traveler! Sorry, sorry, 
			I've been meaning to fix that silly hump. My name is Palterjok, I'm an old Jack from way back, and I 
			<em>love</em> to tinker! What's your pleasure?"</p>
		
		<h2>Weapons</h2>
		<table class="equipmentTable">
		  <thead>
		    <tr>
		      <th>Item Name</th>
		      <th width="100">Price</th>
		      <th width="100">Rarity</th>
		      <th>Notes</th>
		    </tr>
		  </thead>
		  <tbody>	
<?php 
	tnw_list_equipment( "Light Weapons" ); 
    tnw_list_equipment( "Medium Weapons" );
    tnw_list_equipment( "Heavy Weapons" );
?>
		  </tbody>
		</table>

		<h2>Armor</h2>
		<table class="equipmentTable">
		  <thead>
		    <tr>
		      <th>Item Name</th>
		      <th width="100">Price</th>
		      <th width="100">Rarity</th>
		      <th>Notes</th>
		    </tr>
		  </thead>
		  <tbody>
<?php tnw_list_equipment( "Light Armor" ); ?>
<?php tnw_list_equipment( "Medium Armor" ); ?>
<?php tnw_list_equipment( "Special Medium Armor" ); ?>
<?php tnw_list_equipment( "Heavy Armor" ); ?>
		  </tbody>
		</table>

		<h2><a id="special" name="special"></a>Special Items</h2>
		<table class="equipmentTable">
		  <thead>
		    <tr>
		      <th>Item Name</th>
		      <th width="100">Price</th>
		      <th width="100">Rarity</th>
		      <th>Notes</th>
		    </tr>
		  </thead>
		  <tbody>	
<?php tnw_list_equipment( "Special" ); ?>
		  </tbody>
		</table>

		<h2>Other Items</h2>
		<table class="equipmentTable">
		  <thead>
		    <tr>
		      <th>Item Name</th>
		      <th width="100">Price</th>
		      <th width="100">Rarity</th>
		      <th>Notes</th>
		    </tr>
		  </thead>
		  <tbody>	
<?php tnw_list_equipment( "Adventuring Items" ); ?>
<?php tnw_list_equipment( "Food and Consumables" ); ?>
<?php tnw_list_equipment( "Transportation" ); ?>
		  </tbody>
		</table>

		<p><em>NOTE: As Monte Cook Games releases expansions, it's highly likely they'll include additions to many common item 
			listings. Should we have fan submissions that end up overlapping, we will remove said items in favor of whatever 
			is released as official.</em></p>
	</article>  <!-- .small-12.large-12.columns -->
		
<?php get_footer(); ?>