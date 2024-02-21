<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\MetaController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\TermsController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PolicyController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\PrivacyController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\MagazineController;
use App\Http\Controllers\Backend\JournalistController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\GeneralInfoController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\PlayerDataController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Http\Controllers\Redirect\PageRedirectController;
use App\Http\Controllers\Redirect\SeriesRedirectController;
use App\Http\Controllers\Redirect\RankingRedirectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/logout', 'authLogout_user')->name('authLogout_user');
    // search
    Route::get('/search', 'search')->name('search');


    Route::get('/api/test', 'api_test')->name('api_test');
});
Route::controller(PageRedirectController::class)->group(
    function () {
        Route::post('/headerCricketScoreData', 'headerCricketScoreData')->name('headerCricketScoreData');
        Route::post('/international/schedule', 'international_schedule')->name('international.schedule');
        Route::post('/league/schedule', 'league_schedule')->name('league.schedule');
        Route::post('/domestic/schedule', 'domestic_schedule')->name('domestic.schedule');
        Route::post('/women/schedule', 'women_schedule')->name('women.schedule');
        Route::post('/player/profile/cricket', 'cricketer_bio')->name('cricketer_bio');
        Route::post('/cricketPlayerData', 'cricketPlayerData')->name('cricketPlayerData');
        Route::post('/recentSeriesData', 'recentSeriesData')->name('recentSeriesData');
        Route::post('/iccTeamRankT20Data', 'iccTeamRankT20Data')->name('iccTeamRankT20Data');
        Route::post('/iccTeamRankOdiData', 'iccTeamRankOdiData')->name('iccTeamRankOdiData');
        Route::post('/iccTeamRankTestData', 'iccTeamRankTestData')->name('iccTeamRankTestData');
        Route::post('/miniscore_area', 'miniscore_area')->name('miniscore_area');
        Route::post('/scorecard_value', 'scorecard_value')->name('scorecard_value');
        Route::post('/squadData', 'squadData')->name('squadData');
        Route::post('/matchInfo', 'matchInfo')->name('matchInfo');
        Route::post('/cricketPlayerinfoBatting', 'cricketPlayerinfoBatting')->name('cricketPlayerinfoBatting');
        Route::post('/cricketPlayerinfoBowling', 'cricketPlayerinfoBowling')->name('cricketPlayerinfoBowling');


        /* image customization */
        Route::post('/api/get/image', 'api_image')->name('api.get.image');
    }
);
Route::controller(SeriesRedirectController::class)->prefix('/series')->group(
    function () {
        Route::post('series_stat_data_full', 'series_stat_data_full')->name('series_stat_data_full');
        Route::post('/series_most_runs_short', 'series_most_runs_short')->name('series_most_runs_short');
        Route::post('/series_most_wickets_short', 'series_most_wickets_short')->name('series_most_wickets_short');
        Route::post('/series_most_sixes_short', 'series_most_sixes_short')->name('series_most_sixes_short');
        Route::post('/series_most_fours_short', 'series_most_fours_short')->name('series_most_fours_short');
        Route::post('/series_highest_score_short', 'series_highest_score_short')->name('series_highest_score_short');
        Route::post('/series_best_figure_short', 'series_best_figure_short')->name('series_best_figure_short');
        Route::post('/seriesSquadData', 'seriesSquadData')->name('seriesSquadData');
    }
);
Route::controller(RankingRedirectController::class)->prefix('/rating')->group(
    function () {
        Route::post('/icc-test-team-short', 'icc_test_team_rank_short')->name('icc_test_team_rank_short');
        Route::post('/icc-odi-team-short', 'icc_odi_team_rank_short')->name('icc_odi_team_rank_short');
        Route::post('/icc-t20-team-short', 'icc_t20_team_rank_short')->name('icc_t20_team_rank_short');

        Route::post('/icc-test-team-full', 'icc_test_team_rank_full')->name('icc_test_team_rank_full');
        Route::post('/icc-odi-team-full', 'icc_odi_team_rank_full')->name('icc_odi_team_rank_full');
        Route::post('/icc-t20-team-full', 'icc_t20_team_rank_full')->name('icc_t20_team_rank_full');


        Route::post('/icc-test-batter-rank-short', 'icc_test_batter_rank_short')->name('icc_test_batter_rank_short');
        Route::post('/icc-odi-batter-rank-short', 'icc_odi_batter_rank_short')->name('icc_odi_batter_rank_short');
        Route::post('/icc-t20-batter-rank-short', 'icc_t20_batter_rank_short')->name('icc_t20_batter_rank_short');

        Route::post('/icc-test-bowler-rank-short', 'icc_test_bowler_rank_short')->name('icc_test_bowler_rank_short');
        Route::post('/icc-odi-bowler-rank-short', 'icc_odi_bowler_rank_short')->name('icc_odi_bowler_rank_short');
        Route::post('/icc-t20-bowler-rank-short', 'icc_t20_bowler_rank_short')->name('icc_t20_bowler_rank_short');

        Route::post('/icc-test-ar-rank-short', 'icc_test_ar_rank_short')->name('icc_test_ar_rank_short');
        Route::post('/icc-odi-ar-rank-short', 'icc_odi_ar_rank_short')->name('icc_odi_ar_rank_short');
        Route::post('/icc-t20-ar-rank-short', 'icc_t20_ar_rank_short')->name('icc_t20_ar_rank_short');
    }
);
Route::controller(PagesController::class)->group(function () {
    Route::get('/category/{slug}', 'category')->name('category');
    Route::get('/journalist/{slug}', 'journalist')->name('journalist');
    Route::get('/profile/journalist/{slug}', 'journalist_profile')->name('journalist_profile');
    Route::get('/profile/player/cricket/{id}/{slug}', 'cricket_player_profile')->name('cricket_player_profile');
    Route::get('/profile/player/football', 'football_player_profile')->name('football_player_profile');

    Route::get('/all-articles', 'all_article')->name('all_article');
    Route::get('/article/{slug}', 'blog_details')->name('blog_details');

    Route::get('/all-news',  'all_news')->name('all_news');
    Route::get('/news/{slug}',  'news_details')->name('news_details');


    Route::get('/about-us', 'about_us')->name('about_us');
    Route::get('/journal', 'journal')->name('journal');
    Route::get('/journal_details/{slug}', 'journal_details')->name('journal_details');
    Route::get('/contact-us', 'contact_us')->name('contact_us');

    /* icc team/player rank route start */

    Route::get('/icc-ranking', 'icc_ranking')->name('icc_ranking');
    Route::get('/icc-ranking/team/test', 'icc_ranking_test')->name('icc_ranking_test');
    Route::get('/icc-ranking/team/odi', 'icc_ranking_odi')->name('icc_ranking_odi');
    Route::get('/icc-ranking/team/t20', 'icc_ranking_t20')->name('icc_ranking_t20');


    Route::get('/icc-ranking/batting/test', 'icc_batter_ranking_test')->name('icc_batter_ranking_test');
    Route::get('/icc-ranking/batting/odi', 'icc_batter_ranking_odi')->name('icc_batter_ranking_odi');
    Route::get('/icc-ranking/batting/t20', 'icc_batter_ranking_t20')->name('icc_batter_ranking_t20');


    Route::get('/icc-ranking/bowling/test', 'icc_bowler_ranking_test')->name('icc_bowler_ranking_test');
    Route::get('/icc-ranking/bowling/odi', 'icc_bowler_ranking_odi')->name('icc_bowler_ranking_odi');
    Route::get('/icc-ranking/bowling/t20', 'icc_bowler_ranking_t20')->name('icc_bowler_ranking_t20');

    Route::get('/icc-ranking/all-rounder/test', 'icc_ar_ranking_test')->name('icc_ar_ranking_test');
    Route::get('/icc-ranking/all-rounder/odi', 'icc_ar_ranking_odi')->name('icc_ar_ranking_odi');
    Route::get('/icc-ranking/all-rounder/t20', 'icc_ar_ranking_t20')->name('icc_ar_ranking_t20');
    /* icc team/player rank route end */

    /* fifa team/player rank route start */
    Route::get('/fifa-ranking', 'fifa_ranking')->name('fifa_ranking');
    Route::get('/fifa-ranking/team', 'fifa_ranking_team')->name('fifa_ranking_team');
    Route::get('/fifa-ranking/striker', 'fifa_ranking_striker')->name('fifa_ranking_striker');
    Route::get('/fifa-ranking/mid-fielder', 'fifa_ranking_mid_fielder')->name('fifa_ranking_mid_fielder');
    Route::get('/fifa-ranking/goal-keeper', 'fifa_ranking_goal_keeper')->name('fifa_ranking_goal_keeper');
    /* fifa team/player rank route end */

    /* series route start */
    Route::get('/series/{seriesId}/{seo_title}', 'recent_series')->name('recent_series');
    Route::get('/series/{seriesId}/{seo_title}/{category}', 'series_details')->name('series_details');
    /* series route end */



    Route::get('/privacy-policy', 'privacy')->name('privacy');
    Route::get('/desclaimer', 'desclaimer')->name('desclaimer');
    Route::get('/terms-condition', 'terms_condition')->name('terms_condition');
    Route::get('/dmca', 'dmca')->name('dmca');

    Route::get('/all-videos',  'all_video_gallery')->name('all_video_gallery');
    Route::get('/videos/{slug}',  'single_video')->name('single_video');
    Route::get('/all-photos',  'all_photo_gallery')->name('all_photo_gallery');
    Route::get('/photo-gallery/{slug}',  'photo_gallery')->name('photo_gallery');

    Route::get('/match/{leagueID}/{matchID}/{slug}',  'match')->name('match');
    Route::get('/match/{leagueID}/{matchID}/{slug}/{type}',  'match_type')->name('match_type');
    Route::post('/match-commentry',  'match_commentry')->name('match_commentry');



    Route::get('/match/football',  'match_football')->name('match_football');
    Route::get('/match-upcoming',  'match_upcoming')->name('match_upcoming');


    Route::get('/fixture/cicket',  'fixture_cricket')->name('fixture_cricket');
    Route::get('/fixture/football',  'fixture_football')->name('fixture_football');

    Route::get('/icc-cricket-world-cup', 'icc_cricket_world_cup')->name('icc_cricket_world_cup');
    Route::get('/ipl', 'ipl')->name('ipl');
    Route::get('/bpl', 'bpl')->name('bpl');
    Route::get('/psl', 'psl')->name('psl');
    Route::get('/bbl', 'bbl')->name('bbl');
    Route::get('/cpl', 'cpl')->name('cpl');
    Route::get('/lpl', 'cpl')->name('lpl');
    Route::get('/uefa', 'uefa')->name('uefa');
    Route::get('/epl', 'epl')->name('epl');
    Route::get('/la-liga', 'la_liga')->name('la_liga');
    Route::get('/seria-a', 'serie_a')->name('serie_a');
    Route::get('/bundes-liga', 'b_liga')->name('b_liga');
    Route::get('/league-1', 'leg_1')->name('leg_1');
    Route::get('/major-league', 'm_leg')->name('m_leg');
    Route::get('/saudi-pro', 's_pro')->name('s_pro');
});
Route::controller(SubscriberController::class)->prefix('/subscriber')->name('subscriber.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});



Route::middleware(['auth'])->group(
    function () {

        Route::get('/admin',  [BackendController::class, 'admin'])->name('admin');
        Route::get('/admin_logout', [BackendController::class, 'authLogout'])->name('authLogout');

        /* editor controller start */

        Route::controller(CategoryController::class)->prefix('/admin/category')->name('backend.category.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::post('/update/{category}', 'update')->name('update');
            Route::get('/destroy/{category}', 'destroy')->name('trash');
            Route::get('/status/{category}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });


        Route::controller(BlogController::class)->prefix('/admin/blog')->name('backend.blog.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{blog}', 'edit')->name('edit');
            Route::post('/update/{blog}', 'update')->name('update');
            Route::get('/destroy/{blog}', 'destroy')->name('trash');
            Route::get('/status/{blog}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(NewsController::class)->prefix('/admin/news')->name('backend.news.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{news}', 'edit')->name('edit');
            Route::post('/update/{news}', 'update')->name('update');
            Route::get('/destroy/{news}', 'destroy')->name('trash');
            Route::get('/status/{news}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(PhotoGalleryController::class)->prefix('/admin/photoGallery')->name('backend.photoGallery.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{photoGallery}', 'edit')->name('edit');
            Route::post('/update/{photoGallery}', 'update')->name('update');
            Route::get('/destroy/{photoGallery}', 'destroy')->name('trash');
            Route::get('/status/{photoGallery}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(VideoGalleryController::class)->prefix('/admin/videoGallery')->name('backend.videoGallery.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{videoGallery}', 'edit')->name('edit');
            Route::post('/update/{videoGallery}', 'update')->name('update');
            Route::get('/destroy/{videoGallery}', 'destroy')->name('trash');
            Route::get('/status/{videoGallery}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        Route::controller(JournalistController::class)->prefix('/admin/journalist')->name('backend.journalist.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{journalist}', 'edit')->name('edit');
            Route::post('/update/{journalist}', 'update')->name('update');
            Route::get('/destroy/{journalist}', 'destroy')->name('trash');
            Route::get('/status/{journalist}', 'status')->name('status');
            Route::get('/reStore/{id}', 'reStore')->name('reStore');
            Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        });
        /* editor controller end */


        Route::middleware(['admin'])->group(
            function () {
                Route::controller(UserController::class)->prefix('/admin/user')->name('backend.user.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{user}', 'edit')->name('edit');
                    Route::post('/update/{user}', 'update')->name('update');
                    Route::get('/destroy/{user}', 'destroy')->name('trash');
                    Route::get('/status/{user}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                    Route::get('/profile', 'profile')->name('profile');
                });

                Route::controller(GeneralInfoController::class)->prefix('/admin/general_info')->name('backend.general_info.')->group(function () {

                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{generalInfo}', 'edit')->name('edit');
                    Route::post('/update/{generalInfo}', 'update')->name('update');
                });

                /* Route::controller(SectionContentController::class)->prefix('/admin/sectionContent')->name('backend.sectionContent.')->group(function () {
                    Route::get('/index', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{sectionContent}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                }); */

                Route::controller(BannerController::class)->prefix('/admin/banner')->name('backend.banner.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{banner}', 'edit')->name('edit');
                    Route::post('/update', 'update')->name('update');
                    Route::get('/destroy/{banner}', 'destroy')->name('trash');
                    Route::get('/status/{banner}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                });




                Route::controller(MetaController::class)->prefix('/admin/meta')->name('backend.meta.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{meta}', 'edit')->name('edit');
                    Route::post('/update/{meta}', 'update')->name('update');
                    Route::delete('/destroy/{meta}', 'destroy')->name('delete');
                });
                Route::controller(AboutController::class)->prefix('/admin/about')->name('backend.about.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{about}', 'edit')->name('edit');
                    Route::post('/update/{about}', 'update')->name('update');
                    Route::get('/destroy/{about}', 'destroy')->name('trash');
                    Route::get('/status/{about}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                });
                Route::controller(PrivacyController::class)->prefix('/admin/privacy')->name('backend.privacy.')->group(function () {

                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{privacy}', 'edit')->name('edit');
                    Route::post('/update/{privacy}', 'update')->name('update');
                });
                Route::controller(TestimonialController::class)->prefix('/admin/testimonial')->name('backend.testimonial.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{testimonial}', 'edit')->name('edit');
                    Route::post('/update/{testimonial}', 'update')->name('update');
                    Route::get('/destroy/{testimonial}', 'destroy')->name('trash');
                    Route::get('/status/{testimonial}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                });

                Route::controller(SubscriberController::class)->prefix('/admin/subscriber')->name('backend.subscriber.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::delete('/destroy/{subscriber}', 'destroy')->name('delete');
                });
                Route::controller(PartnerController::class)->prefix('/admin/partner')->name('backend.partner.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{partner}', 'edit')->name('edit');
                    Route::post('/update/{partner}', 'update')->name('update');
                    Route::get('/destroy/{partner}', 'destroy')->name('trash');
                    Route::get('/status/{partner}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                });


                Route::controller(MagazineController::class)->prefix('/admin/magazine')->name('backend.magazine.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{magazine}', 'edit')->name('edit');
                    Route::post('/update/{magazine}', 'update')->name('update');
                    Route::delete('/destroy/{magazine}', 'destroy')->name('delete');
                });
                Route::controller(TeamController::class)->prefix('/admin/team')->name('backend.team.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('founder', 'founder')->name('founder');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{team}', 'edit')->name('edit');
                    Route::post('/update/{team}', 'update')->name('update');
                    Route::get('/destroy/{team}', 'destroy')->name('trash');
                    Route::get('/status/{team}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                });
                Route::controller(PlayerDataController::class)->prefix('/admin/playerData')->name('backend.playerData.')->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{playerData}', 'edit')->name('edit');
                    Route::post('/update/{playerData}', 'update')->name('update');
                    Route::get('/destroy/{playerData}', 'destroy')->name('trash');
                    Route::get('/status/{playerData}', 'status')->name('status');
                    Route::get('/reStore/{id}', 'reStore')->name('reStore');
                    Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
                });

                Route::controller(PrivacyController::class)->prefix('/admin/privacy')->name('backend.privacy.')->group(function () {

                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{privacy}', 'edit')->name('edit');
                    Route::post('/update/{privacy}', 'update')->name('update');
                });

                Route::controller(TermsController::class)->prefix('/admin/terms')->name('backend.terms.')->group(function () {

                    Route::get('/create', 'create')->name('create');
                    Route::post('/store', 'store')->name('store');
                    Route::get('/edit/{terms}', 'edit')->name('edit');
                    Route::post('/update/{terms}', 'update')->name('update');
                });
                Route::controller(PolicyController::class)->prefix('/admin/policy')->name('backend.policy.')->group(function () {

                    Route::get('/desclaimer/edit/{desclaimer}', 'desclaimer_edit')->name('desclaimer_edit');
                    Route::post('/desclaimer/update/{desclaimer}', 'desclaimer_update')->name('desclaimer_update');
                    Route::get('/dmca/edit/{desclaimer}', 'dmca_edit')->name('dmca_edit');
                    Route::post('/dmca/update/{desclaimer}', 'dmca_update')->name('dmca_update');
                });
            }
        );
    }
);
