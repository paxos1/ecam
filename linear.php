<!--main menu for navigation at the top-->
<style>
	#linearDiagram {
		background:#f5f5f5;
		background:linear-gradient(#f5f5f5,#ddd);
		border-bottom:1px solid #e5e5e5;
		padding:0.4em 0 0.2em 0;
		display:flex;
		flex-wrap:wrap;
		justify-content:center;
	}
	#linearDiagram > div {
		margin:0 5px;
		font-size:12px;
		vertical-align:middle;
		padding:0.2em;
		border-radius:0.5em;
		color:rgba(0,0,0,0.55);
	}
	#linearDiagram > div:hover {
		/*background:#e6e6e6;*/
		color:black;
	}
	#linearDiagram > div:not(.detailed_img):hover img{
		border:4px solid #89c23f;
	}
	#linearDiagram img {position:relative;z-index:2;vertical-align:middle;padding:0;} /*icons inside buttons to navigate to Level2*/
	#linearDiagram img.l1 {width:42px;} 
	#linearDiagram img.l2 {width:42px;}
	#linearDiagram img{border-radius:90%;border:4px solid transparent;}
	#linearDiagram img.selected{border:4px solid #89c23f;}
	#linearDiagram img.inactive {pointer-events:none;}
	#linearDiagram img:not(.inactive) {cursor:pointer;}
	#linearDiagram a:hover {text-decoration:none;}
</style>

<div id=linearDiagram>
	<!--general info-->
	<div 
		style=cursor:pointer
		onclick=window.location="getStarted.php">
		<div><a href=getStarted.php style="color:inherit"><?php write('#getStarted_general_info')?></a></div>
		<img class=l1 stage=gets src=img/getStarted.png caption="<?php write('#getStarted_general_info')?>">
	</div>

	<!--configuration-->
	<div 
		style=cursor:pointer
		onclick=window.location="configuration.php">
		<div><a href=configuration.php style="color:inherit"><?php write('#configuration')?></a></div>
		<img class=l1 stage=conf src=img/dashboard.png caption="<?php write('#configuration')?>">
	</div>

	<!--population-->
	<div 
		style=cursor:pointer
		onclick=window.location="inhabitants.php">
		<div><a href=inhabitants.php style="color:inherit">Population</a></div>
		<img class=l1 stage=inha src=img/inhabitants.png caption="Population">
	</div>

	<!--GLOBAL-->
	<div
		style=cursor:pointer
		onclick=window.location="birds.php">
		<div><a href=birds.php style="color:inherit">Tier A &mdash; Initial GHG assessment</a></div>
		<img class=l1 stage=birds src=img/birds.png caption="<?php write('#quick_assessment')?>">
	</div>

	<!--DETAILED-->
	<div class="detailed_img">
		<div><span style="color:inherit">Tier B &mdash; Detailed GHG assessment</span></div>
		<img class=l2 stage=waterAbs src=img/waterAbs.png onclick=window.location="edit.php?level=Water&sublevel=Abstraction"  caption="<?php write('#Abstraction')?>" >
		<img class=l2 stage=waterTre src=img/waterTre.png onclick=window.location="edit.php?level=Water&sublevel=Treatment"    caption="<?php write('#Treatment')?>">
		<img class=l2 stage=waterDis src=img/waterDis.png onclick=window.location="edit.php?level=Water&sublevel=Distribution" caption="<?php write('#Distribution')?>">
		<img class=l2 stage=wasteCol src=img/wasteCol.png onclick=window.location="edit.php?level=Waste&sublevel=Collection"   caption="<?php write('#Collection')?>">
		<img class=l2 stage=wasteTre src=img/wasteTre.png onclick=window.location="edit.php?level=Waste&sublevel=Treatment"    caption="<?php write('#Treatment')?>">
		<img class=l2 stage=wasteDis src=img/wasteDis.png onclick=window.location="edit.php?level=Waste&sublevel=Discharge"    caption="<?php write('#Discharge')?>">
	</div>

	<!--Summaries-->
	<div>
		<div><span style="color:inherit">Summaries</span></div>
		<img class=l1 stage=sources src=img/sources.png onclick=window.location="sources.php"            caption="GHG Summary">
		<img class=l1 stage=energy  src=img/energy.png  onclick=window.location="energy_summary.php"     caption="Energy Summary"> 
	</div>

	<div>
		<div>
		<a href=opps.php style="color:inherit">Opportunities</a>
		</div>
		<img class=l1 stage=opps src=img/opps.png caption="Opportunities" onclick=window.location="opps.php">
	</div>
</div>

<script>
	<?php
		//highlight current stage
		//only if currently we are in edit.php or level3.php
		if(strpos($_SERVER['PHP_SELF'],"edit.php") || strpos($_SERVER['PHP_SELF'],"level3.php"))
		{ ?>
			(function() {
				//we need to find level and sublevel to create a stage name i.e. "waterAbs"
				var level    = '<?php echo $level?>';
				var sublevel = '<?php echo $sublevel?>';
				var stage=false;
				switch(level) {
					case "Water":
						switch(sublevel) {
							case "Abstraction":stage="waterAbs";break;
							case "Treatment":stage="waterTre";break;
							case "Distribution":stage="waterDis";break;
						}
						break;

					case "Waste":
						switch(sublevel) {
							case "Collection":stage="wasteCol";break;
							case "Treatment":stage="wasteTre";break;
							case "Discharge":stage="wasteDis";break;
						}
						break;
				}
				if(stage) { document.querySelector('img[stage='+stage+']').classList.add('selected') }
			})();
			<?php 
		}
		//hl birds if we are in birds eye view
		if(strpos($_SERVER['PHP_SELF'],"birds.php"))
		{ ?>document.querySelector('img[stage=birds]').classList.add('selected');<?php }
		//hl configuration if we are in configuration
		else if(strpos($_SERVER['PHP_SELF'],"configuration.php"))
		{ ?>document.querySelector('img[stage=conf]').classList.add('selected');<?php }
		//hl sources if we are in sources.php
		else if(strpos($_SERVER['PHP_SELF'],"sources.php"))
		{ ?>document.querySelector('img[stage=sources]').classList.add('selected');<?php }
		//hl energy_summary if we are in energy_summary.php
		else if(strpos($_SERVER['PHP_SELF'],"energy_summary.php"))
		{ ?>document.querySelector('img[stage=energy]').classList.add('selected');<?php }
		//hl inhabitants
		else if(strpos($_SERVER['PHP_SELF'],"inhabitants.php"))
		{ ?>document.querySelector('img[stage=inha]').classList.add('selected');<?php }
		//hl Opportunities
		else if(strpos($_SERVER['PHP_SELF'],"opps.php"))
		{ ?>document.querySelector('img[stage=opps]').classList.add('selected');<?php }
	?>

	//go over icon images to deactivate inactives --> do in PHP better?
	<?php
		//try it here
	?>
	//go over icon images to deactivate inactives --> do in PHP better?
	(function()
	{
		var collection=document.querySelectorAll("#linearDiagram img[stage]");
		for(var i=0;i<collection.length;i++)
		{
			var stage = collection[i].getAttribute('stage');
			if(["birds","energy","conf",'sources','gets','inha','opps'].indexOf(stage)>=0) continue;
			var isActive = Global.Configuration.ActiveStages[stage];
			if(!isActive)
			{
				collection[i].src="img/"+stage+"-off.png";
				collection[i].classList.add('inactive');
			}
		}
	})();
</script>
