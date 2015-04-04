<?php

class IndexController extends BaseController {

	public function showIndex()
	{
		$urls = array(
						// 'adyminoz.eklablog.com',
						// 'agrumex.tumblr.com',
						// 'http://ajia-team.soforums.com/rss.php?t=1&f=45',
						// 'akbgirls48.com',
						// 'asiaever.com',
						// 'http://asiaddictfansub.eklablog.fr/rss/21134714-accueil/',
						// 'basha-fansub.tk',
						// 'chan-mokona.livejournal.com',
						// 'http://www.drama-jinso-fansub.com/rss-articles.xml',
						// 'http://dubufansub.fr/category/sorties/feed/',
						// 'dukbokki-fansub.eklablog.com',
						// 'elphame.eklablog.com',
						// 'http://emi-fansub.eklablog.com/rss/24447919-/',
						// 'http://e-sarangfansub.eklablog.com/rss/23708685-news/',
						// 'eunheefansub.eklablog.com',
						// 'http://gaijin-otaku-no-fansub.over-blog.fr/rss-articles.xml',
						// 'http://hajimero-fansub.eklablog.com/rss/19086261-accueil/',
						// 'http://hak-kyo-fansub.eklablog.fr/rss/23041523-accueil/',
						// 'http://haneulsora.eklablog.com/rss/19169435-accueil/',
						// 'haromoni-world.com',
						// 'hnd.tokusatsu.org',
						// 'http://www.heroshock.com/?feed=rss2&cat=4',
						// 'kaze-no-toki-fansub.eklablog.com',
						// 'http://kichigai-fansub.blogspot.com/feeds/posts/default?alt=rss',
						// 'maknae.eklablog.com',
						// 'meda-fansub.com',
						// 'http://pandariafansub.wordpress.com/feed/',
						// 'petalfansub.eklablog.fr',
						// 'http://qwentyfansub.eklablog.com/rss/22224517-accueil/',
						// 'http://runningman0france.wordpress.com/category/fansub-2/feed/',
						// 'http://sakuradu92i-fansub.eklablog.fr/rss/18942853-accueil/',
						// 'http://sakura-kiss.fansubs.over-blog.com/rss-articles.xml',
						// 'http://sixsensesfansub.livejournal.com/data/rss',
						// 'http://sleeplessnight.eklablog.com/rss/23558173-accueil/',
						// 'http://sunasiateam.blogspot.com/feeds/posts/default?alt=rss',
						// 'takaramono-fansub.ek.la',
						// 'tdfansub.com',
						'tokusatsu-fansub.fr',
						'univers-asia-alma.eklablog.com',
						'yankeesfansub.wordpress.com',
					);

		$feed = new SimplePie();
		$feed->set_feed_url($urls);
		$feed->set_cache_location(storage_path().'/cache');
		
		$feed->set_cache_duration(100);
		$feed->set_output_encoding('utf-8');
		$feed->init();
		
		$sorties = DB::table('sorties')
		->orderBy('created_at', 'desc')
		->paginate(6);
		
		$image = Image::join('sorties', 'sorties.id', '=', 'images.sortie_id')->first();

		return View::make('index', compact('feed', 'sorties', 'image'));
	}


	public function showAdmin()
	{
		$users = User::all();
		$sorties = Sortie::all();
		$users = User::orderBy('created_at', 'DESC')->paginate(10);
		$sorties = Sortie::orderBy('created_at', 'DESC')->paginate(10);

		return View::make('admin', compact('users', 'sorties'));
	}

}