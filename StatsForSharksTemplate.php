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
 * QuickTemplate class for Stats For Sharks skin
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
		//print_r($this->getSkin()->getUser());
		//print_r($this->getUserLinks());
		//print_r($this);
		$skin = $this->getSkin();

		$this->data['pageLanguage'] = $this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();
		$this->html('headelement');
		?>
	<link rel="dns-prefetch" href="https://www.google-analytics.com">
	<style>
		div.title-bar {
			max-height: 56px;
		}
		div.title-bar-left {
			line-height: 40px;
		}
		ul.menu.float-right,
		ul.dropdown.menu.float-right {
			float: right;
		}
		ul.dropdown.menu.float-right {
			height: 36px;
			width: 258px;
			overflow: hidden;
		}
		@media only screen and (max-width: 40em) {
			ul.dropdown.menu.float-right {
				width: 185px;
			}
		}
		ul.menu.submenu.is-dropdown-submenu.first-sub.vertical {
			display: none;
		}
		ul.menu.submenu.is-dropdown-submenu.first-sub.vertical.js-dropdown-active {
			display: block;
		}
	</style>
	<?php
		$bodySemantic = 'itemtype="https://schema.org/WebPage"';
		if ($skin->is_deal) {
			$bodySemantic = 'itemtype="https://schema.org/ItemPage"';
		}
	?>
	<body itemscope <?php echo $bodySemantic; ?>>
		<header class="header" item itemscope itemtype="https://schema.org/WPHeader">
			<!-- <h1 class="headline"></h1> -->
			<div class="banner-container">
				<img src="/skins/StatsForSharks/images/shark-banner3.png" alt="Stats For Sharks - Banner Representing Abstract Chart">
			</div>
		</header>
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
							<a href="/entry/Category:Sharks" item itemscope itemtype="https://schema.org/SiteNavigationElement">Sharks</a>
							<ul class="menu">
								<li><a href="/entry/Category:Barbara_Corcoran" item itemscope itemtype="https://schema.org/SiteNavigationElement">Barbara Corcoran</a></li>
								<li><a href="/entry/Category:Mark_Cuban" item itemscope itemtype="https://schema.org/SiteNavigationElement">Mark Cuban</a></li>
								<li><a href="/entry/Category:Lori_Greiner" item itemscope itemtype="https://schema.org/SiteNavigationElement">Lori Greiner</a></li>
								<li><a href="/entry/Category:Robert_Herjavec" item itemscope itemtype="https://schema.org/SiteNavigationElement">Robert Herjavec</a></li>
								<li><a href="/entry/Category:Daymond_John" item itemscope itemtype="https://schema.org/SiteNavigationElement">Daymond John</a></li>
								<li><a href="/entry/Category:Kevin_O%27Leary" item itemscope itemtype="https://schema.org/SiteNavigationElement">Kevin O'Leary</a></li>
							</ul>
						</li>
						<li class="main-menu-item">
							<a>Deals</a>
							<ul class="menu">
								<li><a href="/entry/Category:Season_Twelve" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Twelve</a></li>
								<li><a href="/entry/Category:Season_Eleven" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Eleven</a></li>
								<li><a href="/entry/Category:Season_Ten" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Ten</a></li>
								<li><a href="/entry/Category:Season_Nine" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Nine</a></li>
								<li><a href="/entry/Category:Season_Eight" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Eight</a></li>
								<li><a href="/entry/Category:Season_Seven" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Seven</a></li>
								<li><a href="/entry/Category:Season_Six" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Six</a></li>
								<li><a href="/entry/Category:Season_Five" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Five</a></li>
								<li><a href="/entry/Category:Season_Four" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Four</a></li>
								<li><a href="/entry/Category:Season_Three" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Three</a></li>
								<li><a href="/entry/Category:Season_Two" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season Two</a></li>
								<li><a href="/entry/Category:Season_One" item itemscope itemtype="https://schema.org/SiteNavigationElement">Season One</a></li>
							</ul>
						</li>
						<li class="main-menu-item hide-for-small-only"><a href="/entry/About_Stats_For_Sharks" item itemscope itemtype="https://schema.org/SiteNavigationElement">About</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="fb-root"></div>
		<?php
			if (strpos($this->data['title'], 'Category:') === FALSE) {
				echo '<div class="grid-x">';
				echo '<div class="cell small-12">';
				echo '<div id="stats-location-map"></div>';
				echo '</div>';
				echo '</div>';
			}
		?>
		<div class="grid-container <?php echo $skin->getSpecialClasses(); ?>">
			<div class="grid-x grid-padding-x main-content-well">
				<div class="cell medium-10">
					<?php
						if ($skin->is_shark_category) {
							echo '<div class="feat-banner-container"><img itemprop="image" src="'.$skin->bannerImage.'" alt="'.$skin->bannerTitle.'" class="feat-banner-img"></div>';
							echo '<h1 itemprop="headline" class="page-header page-shark">'.$skin->bannerTitle.'</h1>';
						} else if ($skin->is_special_title) {
							if (strlen($skin->bannerImage)) {
								echo '<div class="feat-banner-container"><img itemprop="image" src="'.$skin->bannerImage.'" alt="'.$skin->bannerTitle.'" class="feat-banner-img"></div>';
							}
							echo $skin->bannerTitle;
						} else if ($skin->is_deal && strlen($skin->bannerImage)) {
							echo '<div class="feat-banner-container">';
							if ($skin->no_deal) {
								echo '<img itemprop="image" src="'.$skin->bannerImage.'" alt="'.$skin->sharksInvolved.'" class="feat-banner-img">';
							} else {
								echo '<img itemprop="image" src="'.$skin->bannerImage.'" alt="No Deal" class="feat-banner-img">';
							}
							/*
							echo '<div class="featured-tidbit-container">';
							echo '<div><div class="tidbit-box"></div><span class="tidbit-text">This is Barbara\'s 17th Service Deal.</span></div>';
							echo '<div><div class="tidbit-box"></div><span class="tidbit-text">This is Barbara\'s 23rd Time Mentioning Cousins Maine Lobster.</span></div>';
							echo '</div>';
							*/
							echo '</div>';
							echo '<h1 itemprop="headline" class="page-header">';
							echo str_replace('Category:', '', $this->data['title']);
							echo '</h1>';
						} else {
							echo '<h1 itemprop="headline" class="page-header">';
							echo str_replace('Category:', '', $this->data['title']);
							echo '</h1>';
						}
					?>
					<div itemprop="text">
					<?php $this->html( 'bodytext' ); ?>
					</div>

					<?php if ($skin->is_deal) : ?>
						<br/><br/>
						<div id="disqus_thread"></div>              
					<?php endif; ?>
					
					<?php $this->html( 'catlinks' ); ?>
					
					<?php //print_r($this->data); ?>
				</div>
				<div class="cell medium-2 hide-for-small-only editcolumn" item itemscope itemtype="https://schema.org/WPSideBar">
					<?php foreach($nav['views'] as $action): ?>
						<?php if ($action['class'] == 'selected') continue; ?>
						<a href="<?php echo $action['href']; ?>" class="<?php echo $action['class']; ?>"><?php echo $action['text']; ?></a>
					<?php endforeach; ?>
					<?php foreach($nav['actions'] as $action): ?>
						<a href="<?php echo $action['href']; ?>" class="<?php echo $action['class']; ?>"><?php echo $action['text']; ?></a>
					<?php endforeach; ?>
					<?php if (isset($this->data['nav_urls']['whatlinkshere']) && is_array($this->data['nav_urls']['whatlinkshere'])): ?>
						<a href="<?php echo $this->data['nav_urls']['whatlinkshere']['href']; ?>" class="">What links here</a>
					<?php endif; ?>
					<br/><br/><?php echo $this->data['lastmod']; ?>
					<br/><br/>
					<?php if ($skin->is_deal) : ?>
					<div class="fb-share-button" data-href="<?php echo $skin->canonicalURL; ?>" data-layout="button_count" data-size="large"><a target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($skin->canonicalURL); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
					<br/><br/>
					<a class="twitter-share-button"
						href="https://twitter.com/intent/tweet"
						data-size="large"
						data-text="<?php echo $this->data['title']; ?> deal in the tank"
						data-url="<?php echo $skin->canonicalURL; ?>"
						data-hashtags="sharktank"
						data-via="statsforsharks">
						Tweet
						</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<section id="footer" class="large-centered footer-container" item itemscope itemtype="https://schema.org/WPFooter">
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="cell large-4 medium-4">
					<h3>Recently Added</h3>
						<ul id="newestPages">
						</ul>
					</div>
					<div class="cell large-4 medium-4">
						<h3>Recently Updated</h3>
						<ul id="updatePages">
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
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Archivo+Black|Hind+Madurai:300&display=swap" rel="stylesheet">
	<script type="text/javascript">
		(window.RLQ=window.RLQ||[]).push(function() {
			mw.loader.using(["ext.statsforsharks.statswidget.js"]).done(function() {
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
				$.getJSON('/api.php?action=query&format=json&list=recentchanges&rctype=edit&rclimit=5&rcnamespace=0&rcshow=!redirect|!minor&rcdir=older', function(data) {
					var container = $('#updatePages');
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
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=472792593338098&autoLogAppEvents=1"></script>
	<script>
		window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
			t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
		}(document, "script", "twitter-wjs"));
	</script>
	<?php if ($skin->is_deal) : ?>
	<script>
	/**
	*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
	*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
	(window.RLQ=window.RLQ||[]).push(function() {
		var disqus_config = function () {
			this.page.url = "<?php echo $skin->canonicalURL; ?>";  // Replace PAGE_URL with your page's canonical URL variable
			this.page.title = mw.config.get('wgPageName');
			this.page.identifier = mw.config.get('wgArticleId'); // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			this.callbacks.onNewComment = [function() { 
				if (gtag) {
					gtag('event', 'new_comment', {
						'event_category': 'comments',
						'event_label': mw.config.get('wgPageName')
					});
            	}
			}];
		};
		(function() { // DON'T EDIT BELOW THIS LINE
		var d = document, s = d.createElement('script');
		s.src = 'https://statsforsharks.disqus.com/embed.js';
		s.setAttribute('data-timestamp', +new Date());
		(d.head || d.body).appendChild(s);
		})();
	});
	</script>
	<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	<?php endif; ?>		
</html>
<?php
	}
}
