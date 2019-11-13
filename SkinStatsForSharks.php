<?php
class SkinStatsForSharks extends SkinTemplate {
	public $skinname = 'statsforsharks';
	public $stylename = 'StatsForSharks';
	public $template = 'StatsForSharksTemplate';
	public $bodyClasses = array();
	public $bannerImage = "";
	public $bannerTitle = "";
	public $sharksInvolved = "";
	public $no_deal = false;
	public $is_deal = false;
	public $is_shark_category = false;
	public $is_special_title = false;
	public $canonicalURL;

	/**
	 * Initializes output page and sets up skin-specific parameters
	 * @param OutputPage $out Object to initialize
	 */
	public function initPage(OutputPage $out) {
		parent::initPage($out);
		$this->canonicalURL = $out->getContext()->getTitle()->getCanonicalURL();

		$out->addMeta('viewport', 'width=device-width, initial-scale=1');

		//print_r($out);

		$has_mark = false;
		$has_lori = false;
		$has_kevin = false;
		$has_robert = false;
		$has_barb = false;
		$has_guest = false;
		$num_guests = 0;

		$geter = function(OutputPage $output) {
			return $output->mCategories;
		};
		$property_getter = Closure::bind($geter, null, $out);
		$categories = $property_getter($out);

		$titleText = $out->getContext()->getTitle()->mTextform;
		$titleNS =  $out->getContext()->getTitle()->mNamespace;
		$num_sharks = 0;
		$num_shark_names = array();

		//print_r($this);

		$this->is_deal = $this->hasCategory($categories['hidden'], 'Deals');
		$this->no_deal = $this->hasCategory($categories['hidden'], 'No Deal');

		if ($this->is_deal && !$this->no_deal) {
			$has_mark = $this->hasCategory($categories['normal'], 'Mark Cuban');
			$has_lori = $this->hasCategory($categories['normal'], 'Lori Greiner');
			$has_kevin = $this->hasCategory($categories['normal'], "Kevin O'Leary");
			$has_robert = $this->hasCategory($categories['normal'], 'Robert Herjavec');
			$has_barb = $this->hasCategory($categories['normal'], 'Barbara Corcoran');
			$has_daymond = $this->hasCategory($categories['normal'], 'Daymond John');

			if ($this->hasCategory($categories['normal'], 'Chris Sacca')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Ashton Kutcher')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Troy Carter')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Phil Crowley')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Kevin Harrington')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Jeff Foxworthy')) {
				$has_guest = true;
				$num_guests++;
			} 
			if ($this->hasCategory($categories['normal'], 'Steve Tisch')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'John Paul DeJoria')) {
				$has_guest = true;
				$num_guests++;
			} 
			if ($this->hasCategory($categories['normal'], 'Nick Woodman')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Alex Rodriguez')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Rohan Oza')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Sara Blakely')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Sir Richard Branson')) {
				$has_guest = true;
				$num_guests++;
			} 
			if ($this->hasCategory($categories['normal'], 'Jamie Siminoff')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Matt Higgins')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Charles Barkley')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Alli Webb')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Bethenny Frankel')) {
				$has_guest = true;
				$num_guests++;
			}
			if ($this->hasCategory($categories['normal'], 'Daniel Lubetzky')) {
				$has_guest = true;
				$num_guests++;
			}

			$sharks_count = array(
				'Mark Cuban' => $has_mark,
				'Lori Greiner' => $has_lori,
				'Mr. Wonderful' => $has_kevin,
				'Robert Herjavec' => $has_robert,
				'Barbara Corcoran' => $has_barb,
				'Daymond John' => $has_daymond
			);
			foreach($sharks_count as $shark => $indeal) {
				if ($indeal) {
					$num_shark_names[] = $shark;
					$num_sharks++;
				}
			}
			if ($num_guests > 0) $num_sharks += $num_guests;

			if ($has_mark && $has_lori) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-lori.jpg';
				$this->sharksInvolved = "Mark Cuban & Lori Greiner";
			} else if ($has_mark && $has_kevin) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-kevin.jpg';
				$this->sharksInvolved = "Mark Cuban & Kevin O'Leary";
			} else if ($has_mark && $has_robert) {
				$this->bannerImage =  'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-robert.jpg';
				$this->sharksInvolved = "Mark Cuban & Robert Herjavec";
			} else if ($has_mark && $has_barb) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-barbara.jpg';
				$this->sharksInvolved = "Mark Cuban & Barbara Corcoran";
			} else if ($has_mark && $has_daymond) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-daymond.jpg';
				$this->sharksInvolved = "Mark Cuban & Daymond John";
			} else if ($has_mark && $has_guest) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-guest-deal.jpg';
				$this->sharksInvolved = "Mark Cuban & Guest Shark";
			} else if ($has_lori && $has_robert && $has_kevin) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-kevin-robert-lori.jpg';
				$this->sharksInvolved = "Lori Greiner, Kevin O'Leary & Robert Herjavec";
			} else if ($has_lori && $has_robert) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-lori-robert.jpg';
				$this->sharksInvolved = "Lori Greiner & Robert Herjavec";
			} else if ($has_lori && $has_kevin) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-lori-kevin.jpg';
				$this->sharksInvolved = "Lori Greiner & Kevin O'Leary";
			} else if ($has_lori && $has_guest) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-lori-guest-deal.jpg';
				$this->sharksInvolved = "Lori Greiner & Guest Shark";
			} else if ($has_robert && $has_kevin) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-robert-kevin.jpg';
				$this->sharksInvolved = "Robert Herjavec & Kevin O'Leary";
			} else if ($has_robert && $has_daymond) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-robert-daymond.jpg';
				$this->sharksInvolved = "Robert Herjavec & Daymond John";
			} else if ($has_robert && $has_barb) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-robert-barbara.jpg';
				$this->sharksInvolved = "Robert Herjavec & Barbara Corcoran";
			} else if ($has_lori) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-lori-greiner-deal.jpg';
				$this->sharksInvolved = "Lori Greiner";
			} else if ($has_mark) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-mark-cuban-deal.jpg';
				$this->sharksInvolved = "Mark Cuban";
			} else if ($has_kevin) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-kevin-oleary-deal.jpg';
				$this->sharksInvolved = "Kevin O'Leary";
			} else if ($has_robert) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-robert-herjavec-deal.jpg';
				$this->sharksInvolved = "Robert Herjavec";
			} else if ($has_barb) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-barbara-corcoran-deal.jpg';
				$this->sharksInvolved = "Barbara Corcoran";
			} else if ($has_daymond) {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-daymond-john-deal.jpg';
				$this->sharksInvolved = "Daymond John";
			} else {
				$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/guest-shark-deal.jpg';
				$this->sharksInvolved = "Guest Shark";
			}
		} else if ($this->is_deal && $this->no_deal) {
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-no-deal.jpg';

		} else if ($titleText == "Main Page") {
			$title = "Tracking Every Investment Made on Shark Tank";
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-chairs.jpg';
			$out->addMeta('og:description', "Charts and Graphs Visualizing The Deals Aired On Shark Tank");
		}

		//print_r($out->getContext()->getTitle());

		if ($titleNS == 14 && $titleText == 'Mark Cuban') {
			$this->is_shark_category = true;
			$this->bannerImage = 'https://www.statsforsharks.comskins/StatsForSharks/images/banner-mark-cuban2.jpg';
			$this->bannerTitle = 'Mark Cuban';
			
		} else if ($titleNS == 14 && $titleText == 'Kevin O\'Leary') {
			$this->is_shark_category = true;
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-kevin-oleary2.jpg';
			$this->bannerTitle = 'Kevin O\'Leary';

		} else if ($titleNS == 14 && $titleText == 'Barbara Corcoran') {
			$this->is_shark_category = true;
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-barbara-corcoran2.jpg';
			$this->bannerTitle = 'Barbara Corcoran';

		} else if ($titleNS == 14 && $titleText == 'Daymond John') {
			$this->is_shark_category = true;
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-daymond-john2.jpg';
			$this->bannerTitle = 'Daymond John';

		} else if ($titleNS == 14 && $titleText == 'Robert Herjavec') {
			$this->is_shark_category = true;
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-robert-herjavec2.jpg';
			$this->bannerTitle = 'Robert Herjavec';

		} else if ($titleNS == 14 && $titleText == 'Lori Greiner') {
			$this->is_shark_category = true;
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-lori-grenier2.jpg';
			$this->bannerTitle = 'Lori Greiner';

		} else if (($titleNS == 14 && $titleText == 'Sharks') || $titleText == 'Main Page') {
			$this->bannerImage = 'https://www.statsforsharks.com/skins/StatsForSharks/images/banner-sharks.jpg';
			if ($out->getContext()->getTitle()->mTextform == 'Category:Sharks') {
				$this->is_shark_category = true;
				$this->bannerTitle = '<h1 class="page-header page-shark">The Sharks of Shark Tank</h1>';
			} else {
				$this->is_special_title = true;
				$this->bannerTitle = '<br/><br/>';
			}
		}

		if ($this->is_deal) $this->bodyClasses[] = 'deal';
		if ($this->no_deal) $this->bodyClasses[] = 'nodeal';
		if ($this->is_shark_category) $this->bodyClasses[] = 'sharkcategory';

		$title = $titleText;
		if ($this->is_deal && $this->no_deal) {
			$title = $titleText." - Investment Summary & Charts";
			$out->addMeta('og:image', $this->bannerImage);
			$out->addMeta('twitter:image', $this->bannerImage);
			$out->addMeta('twitter:image:alt', $title);

		} else if ($this->is_deal && strlen($this->bannerImage)) {
			$out->addMeta('og:image', $this->bannerImage);
			$out->addMeta('twitter:image', $this->bannerImage);
			$title = $titleText." - A ".$this->sharksInvolved." Deal";
			$out->addMeta('twitter:image:alt', $title);

		} else if (strlen($this->bannerImage)) {
			$out->addMeta('og:image', $this->bannerImage);
			$out->addMeta('twitter:image', $this->bannerImage);

		} else {
			$title = $titleText." - Investment Summary & Charts";
		}
		$out->setHTMLTitle($title);
		$out->addMeta('og:title', $title);
		$out->addMeta('og:url', $out->getContext()->getTitle()->getCanonicalURL());
		$out->addMeta('og:site_name', "Stats For Sharks");
		$out->addMeta('og:type', "article");
		$out->addMeta('fb:app_id', '472792593338098');

		$out->addMeta('twitter:card', 'summary_large_image');
		$out->addMeta('twitter:site', '@StatsForSharks');
		$out->addMeta('twitter:creator', '@StatsForSharks');
		$out->addMeta('twitter:title', $title);

		if ($this->is_deal && !$this->no_deal) {
			$shark_text = "a shark";
			if ($num_sharks > 3 && count($num_shark_names) == 0) {
				$shark_text = $num_sharks." sharks";
			} else if ($num_sharks > 0 && count($num_shark_names) > 0) {
				$diff = 0;
				$shark_text = "";
				//print_r($num_shark_names);
				for ($i = 0; $i < count($num_shark_names); $i++) {
					if (($i == count($num_shark_names) - 1) && count($num_shark_names) > 2) {
						$shark_text .= ", and ";
					} else if ($i > 0) {
						$shark_text .= ", ";
					}
					$shark_text .= $num_shark_names[$i];
					$diff++;
				}
				//echo "Diff: ".$diff." Num sharks: ".$num_sharks." Num guests: ".$num_guests;
				if ($num_guests > 0) {
					if ($num_guests == 1) {
						$shark_text .= " and a guest shark";
					} else {
						$shark_text .= " and ".$num_guests." guest sharks";
					}
				}

			}
			$desc = $titleText." entered the Shark Tank and made a deal with ".$shark_text.".";
			if (strlen($desc) < 245) $desc .= " View our statistics & graphs to see how it holds up.";
			$out->addMeta('og:description', $desc);
		} else if ($this->no_deal) { 
			$desc = $titleText." entered the Shark Tank looking for a deal but ended up leaving without a shark biting.";
			$out->addMeta('og:description', $desc);
		}
		//echo $out->getCanonicalUrl();

		//print_r($categories['normal']);
		//echo "Number of categories: ".sizeof($categories['normal']);
		$out->addHeadItem('appl-icon-57', '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-57.png" />');
		$out->addHeadItem('appl-icon-60', '<link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-60.png" />');
		$out->addHeadItem('appl-icon-72', '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-72.png" />');
		$out->addHeadItem('appl-icon-76', '<link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-76.png" />');
		$out->addHeadItem('appl-icon-114', '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-114.png" />');
		$out->addHeadItem('appl-icon-120', '<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-120.png" />');
		$out->addHeadItem('appl-icon-144', '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-144.png" />');
		$out->addHeadItem('appl-icon-152', '<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-76.png" />');
		$out->addHeadItem('icon-16', '<link rel="icon" type="image/png" sizes="16x16" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-16.png" />');
		$out->addHeadItem('icon-32', '<link rel="icon" type="image/png" sizes="32x32" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-32.png" />');
		$out->addHeadItem('icon-96', '<link rel="icon" type="image/png" sizes="96x96" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-96.png" />');
		$out->addHeadItem('icon-196', '<link rel="icon" type="image/png" sizes="196x196" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-196.png" />');
		$out->addHeadItem('icon-128', '<link rel="icon" type="image/png" sizes="128x128" href="https://www.statsforsharks.com/skins/StatsForSharks/icons/sfs-128.png" />');


		$out->addModules('skins.statsforsharks.js');
	}

	private function hasCategory($categories, $test) {
		for($i = 0; $i < sizeof($categories); $i++) {
			if (strpos($categories[$i], $test) !== false) return true;
		}
		return false;
	}

	/**
	 * Loads skin and user CSS files.
	 * @param OutputPage $out
	 */
	function setupSkinUserCss(OutputPage $out) {
		parent::setupSkinUserCss($out);

		$styles = ['mediawiki.skinning.interface', 'skins.statsforsharks.styles'];
		$out->addModuleStyles($styles);
	}

	function getSpecialClasses() {
		return implode(" ", $this->bodyClasses);
	}
}
