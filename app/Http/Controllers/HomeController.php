<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Avis;
use App\Models\Competence;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\HomeText;
use App\Models\Menu;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\SiteInfo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class HomeController extends Controller
{

    public function index()
    {
        $siteinfos = SiteInfo::all();
        $competences = Competence::all();
        $services = Service::all();
        $about = About::all();
        $portfolios = Portfolio::orderBy('date', 'desc')->get();
        $tags = Tag::all();
        $faqs = Faq::take(5)->get();
        $home_content = HomeText::all();
        $avis = Avis::inRandomOrder()->take(15)->get();

        $time_worked = 0;
        foreach ($portfolios as $item) {
            $time_worked += $item->time_worked;
        }
        if ($time_worked >= 1000 ) {
            $time_worked_day = $time_worked/24;
        }

        $menus = Menu::where('group_id', NULL)->orderBy('ordre')->get();

        foreach($menus as $menu) {
            if($menu->is_group) {
                $menu->subMenus = Menu::where('group_id', $menu->id)->orderBy('ordre')->get();
                foreach($menu->subMenus as $subMenu) {
                    $subMenu->subMenus = Menu::where('group_id', $subMenu->id)->orderBy('ordre')->get();
                }
            }
        }

        return view('home', [
            'siteinfo' => $siteinfos[0],
            'competences' => $competences,
            'services' => $services,
            'about' => $about[0],
            'portfolios' => $portfolios,
            'time_worked' => $time_worked,
            'time_worked_day' => $time_worked_day,
            'menus' => $menus,
            'tags' => $tags,
            'faqs' => $faqs,
            'home_content' => $home_content[0],
            'avis' => $avis
        ]);
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendContact(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $discordLinkContact = Contact::where('name', 'Contact')->first();
        $message = htmlentities($request->message);
        $html = "**Sujet:**\n" . $request->subject . "\n\n**Message:**\n" . $message;
        DiscordAlert::to($discordLinkContact->link)->message("<@543420061764026378>.\nVous avez reçu un nouveau message", [
            [
                'title' => $request->name,
                'description' => $html,
                'color' => $discordLinkContact->color,
                'author' => [
                    'name' => $request->email
                ]
            ]
        ]);
        return redirect(route('home'));

    }
}