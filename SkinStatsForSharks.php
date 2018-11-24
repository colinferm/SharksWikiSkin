<?php
class SkinStatsForSharks extends SkinTemplate {
	public $skinname = 'statsforsharks';
	public $stylename = 'StatsForSharks';
	public $template = 'StatsForSharksTemplate';

	/**
	 * Initializes output page and sets up skin-specific parameters
	 * @param OutputPage $out Object to initialize
	 */
	public function initPage(OutputPage $out) {
		parent::initPage($out);
		$out->addMeta('viewport', 'width=device-width, initial-scale=1');
		$out->addModules( 'skins.statsforsharks.js' );
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
}
