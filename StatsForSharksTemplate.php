<?php
/**
 * StatsForSharksTemplate - The Stats For Sharks official MediaWiki theme.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Skins
 */

/**
 * QuickTemplate class for Vector skin
 * @ingroup Skins
 */
class StatsForSharksTemplate extends BaseTemplate {
	/* Functions */

	/**
	 * Outputs the entire contents of the (X)HTML page
	 */
	public function execute() {
		header('X-XSS-Protection:0');
		$nav = $this->data['content_navigation'];

		$this->data['pageLanguage'] = $this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();
		$this->html('headelement');
		?>
	<header class="header">
		<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Archivo+Black|Hind+Madurai:300" rel="stylesheet">
		<!-- <h1 class="headline"></h1> -->
		<div class="banner-container">
			<img src="/skins/StatsForSharks/images/shark-banner3.png">
		</div>
	</header>
	<body>
	<div data-sticky-container>
		<div class="title-bar sticky" data-sticky data-options="marginTop:0;" style="width:100%">
			<div class="title-bar-left"><a href="/">Stats For Sharks</a></div>
			<div class="title-bar-right">
					<ul class="menu float-right show-for-large">
						<li>
						<form action="/index.php" id="searchform">
						<input type="search" name="search" placeholder="Search" style="display: inline-block; width: 150px;">
						<button type="button" class="button" name="go" value="go"  style="display: inline-block;">Go</button>
						<input type="hidden" value="Special:Search" name="title">
						</li>
						</form>
					</ul>
				<ul class="dropdown menu float-right" data-dropdown-menu>
					<li class="main-menu-item">
						<a href="/entry/Category:Sharks">Sharks</a>
						<ul class="menu">
							<li><a href="/entry/Category:Barbara_Corcoran">Barbara Corcoran</a></li>
							<li><a href="/entry/Category:Mark_Cuban">Mark Cuban</a></li>
							<li><a href="/entry/Category:Lori_Greiner">Lori Greiner</a></li>
							<li><a href="/entry/Category:Robert_Herjavec">Robert Herjavec</a></li>
							<li><a href="/entry/Category:Daymond_John">Daymond John</a></li>
							<li><a href="/entry/Category:Kevin_O%27Leary">Kevin O'Leary</a></li>
						</ul>
					</li>
					<li class="main-menu-item">
						<a>Deals</a>
						<ul class="menu">
							<li><a href="/entry/Category:Season_One">Season One</a></li>
							<li><a href="/entry/Category:Season_Two">Season Two</a></li>
							<li><a href="/entry/Category:Season_Three">Season Three</a></li>
							<li><a href="/entry/Category:Season_Four">Season Four</a></li>
							<li><a href="/entry/Category:Season_Five">Season Five</a></li>
							<li><a href="/entry/Category:Season_Six">Season Six</a></li>
							<li><a href="/entry/Category:Season_Seven">Season Seven</a></li>
							<li><a href="/entry/Category:Season_Eight">Season Eight</a></li>
							<li><a href="/entry/Category:Season_Nine">Season Nine</a></li>
							<li><a href="/entry/Category:Season_Ten">Season Ten</a></li>
						</ul>
					</li>
					<li class="main-menu-item hide-for-small-only"><a href="https://blog.statsforsharks.com">Blog</a></li>
					<li class="main-menu-item hide-for-small-only"><a href="/entry/About_Stats_For_Sharks">About</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
		if (strpos($this->data['title'], 'Category:') === FALSE) {
			echo '<div class="grid-x">';
			echo '<div class="cell small-12">';
			echo '<div id="stats-location-map"></div>';
			echo '</div>';
			echo '</div>';
		}
	?>
	<div class="grid-container">
		<div class="grid-x grid-padding-x main-content-well">
			<div class="cell medium-10">
				<?php
					if ($this->data['title'] == 'Category:Mark Cuban') {
						echo '<img src="/skins/StatsForSharks/images/banner-mark-cuban2.jpg" alt="Mark Cuban" class="feat-banner-img">';
						echo '<h1 class="page-header page-shark">Mark Cuban</h1>';
						
					} else if ($this->data['title'] == 'Category:Kevin O\'Leary') {
						echo '<img src="/skins/StatsForSharks/images/banner-kevin-oleary2.jpg" alt="Kevin O\'Leary" class="feat-banner-img">';
						echo '<h1 class="page-header page-shark">Kevin O\'Leary</h1>';

					} else if ($this->data['title'] == 'Category:Barbara Corcoran') {
						echo '<img src="/skins/StatsForSharks/images/banner-barbara-corcoran2.jpg" alt="Barbara Corcoran" class="feat-banner-img">';
						echo '<h1 class="page-header page-shark">Barbara Corcoran</h1>';

					} else if ($this->data['title'] == 'Category:Daymond John') {
						echo '<img src="/skins/StatsForSharks/images/banner-daymond-john2.jpg" alt="Daymond John" class="feat-banner-img">';
						echo '<h1 class="page-header page-shark">Daymond John</h1>';

					} else if ($this->data['title'] == 'Category:Robert Herjavec') {
						echo '<img src="/skins/StatsForSharks/images/banner-robert-herjavec2.jpg" alt="Robert Herjavec" class="feat-banner-img">';
						echo '<h1 class="page-header page-shark">Robert Herjavec</h1>';

					} else if ($this->data['title'] == 'Category:Lori Greiner') {
						echo '<img src="/skins/StatsForSharks/images/banner-lori-grenier2.jpg" alt="Lori Greiner">';
						echo '<h1 class="page-header page-shark">Lori Greiner</h1>';

					} else if ($this->data['title'] == 'Category:Sharks' || $this->data['title'] == 'Main Page') {
						echo '<img src="/skins/StatsForSharks/images/banner-sharks.jpg" alt="The Sharks of Shark Tank" class="feat-banner-img">';
						if ($this->data['title'] == 'Category:Sharks') {
							echo '<h1 class="page-header page-shark">The Sharks of Shark Tank</h1>';
						} else {
							echo '<br/><br/>';
						}
					} else if (strlen($this->getSkin()->bannerImage)) {
						echo '<img src="'.$this->getSkin()->bannerImage.'" alt="The Sharks of Shark Tank" class="feat-banner-img">';
					} else {
						echo '<h1 class="page-header">';
						echo str_replace('Category:', '', $this->data['title']);
						echo '</h1>';
					}
				?>
				<?php $this->html( 'bodytext' ); ?>
				
				<?php $this->html( 'catlinks' ); ?>
				
				<?php //print_r($this->data); ?>
			</div>
			<div class="cell medium-2 hide-for-small-only editcolumn">
				<?php foreach($nav['views'] as $action): ?>
					<?php if ($action['class'] == 'selected') continue; ?>
					<a href="<?php echo $action['href']; ?>" class="<?php echo $action['class']; ?>"><?php echo $action['text']; ?></a>
				<?php endforeach; ?>
				<?php foreach($nav['actions'] as $action): ?>
					<a href="<?php echo $action['href']; ?>" class="<?php echo $action['class']; ?>"><?php echo $action['text']; ?></a>
				<?php endforeach; ?>
				<br/><br/><?php echo $this->data['lastmod']; ?>
			</div>
		</div>
	</div>
	<section id="footer" class="large-centered footer-container">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell large-4 medium-4">
					<h3>About</h3>
					<p>Shark Stats is a project that attempts to follow Shark Tank through the numbers and follow up on the stories of the companies that appear on the show.</p>
				</div>
				<div class="cell large-4 medium-4">
					<h3>Latest</h3>
					<ul id="newestPages">
					</ul>
				</div>
				<div class="cell large-4 medium-4">
					<h3>Meta</h3>
					<ul>
						<?php $tools = $this->data['personal_urls']; ?>
						<?php foreach($tools as $key => $tool): ?>
							<?php if ($key == 'userpage' || $key == 'mytalk' || $key == 'mycontris') continue; ?>
							<li><a href="<?php echo $tool['href']; ?>" class="<?php echo $key; ?>"><?php echo $tool['text']; ?></a></li>
						<?php endforeach; ?>
						<?php $specials = $this->getToolbox(); ?>
						<li><a href="<?php echo $specials['specialpages']['href']; ?>">Admin</a></li>
						<li><a href="https://blog.statsforsharks.com">Blog</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		(window.RLQ=window.RLQ||[]).push(function() {
			var $ = jQuery;
			$.getJSON('/api.php?action=query&format=json&list=recentchanges&rctype=new&rclimit=5&rcnamespace=0&rcshow=!redirect', function(data) {
				var container = $('#newestPages');
				container.empty();

				var results = data['query']['recentchanges'];
				var resultlen = results.length;
				for (i = 0; i < resultlen; i++) {
					var result = results[i];
					var timestamp = result['timestamp'];
					var title = result["title"];
					var encodedTitle = title.replace(/ /g,'_');
					encodedTitle = encodedTitle.replace(/'/g,'%27');
					var year = timestamp.substring(2,4);
					var month = timestamp.substring(5,7);
					var day = timestamp.substring(8,10);

					var formatdate = month + "." + day + "." + year;
					//alert(result['title']);
					container.append('<li>' + formatdate + ' - <a href="/entry/' + encodedTitle + '">' + title + '</a></li>');
				}
			});
		});
	</script>
	<?php $this->printTrail(); ?>
	<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_bgIyqfDPPcCMn-wAKxtXS9xkBMAbkIw" type="text/javascript"></script> -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-93006673-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}

		(window.RLQ=window.RLQ||[]).push(function() {
			gtag('js', new Date());
			var user = mw.config.get('wgUserName');
			if (user) {
				gtag('config', 'UA-93006673-1', {
				  'user_id': user
				});
			} else {
				gtag('config', 'UA-93006673-1');
			}
		});
	</script>
	</body>
</html>
<?php
	}
}
