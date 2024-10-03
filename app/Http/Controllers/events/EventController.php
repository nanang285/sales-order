<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LatestProject;
use App\Models\FooterSection;

class EventController extends Controller
{
    public function index()
    {
        $breadcrumbTitle = 'Acara';
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('admin.events.list', compact('latestProject', 'footerSection', 'breadcrumbTitle'));
    }

    public function payments()
    {
        $breadcrumbTitle = 'Pembayaran';
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('admin.events.payments', compact('latestProject', 'footerSection', 'breadcrumbTitle'));
    }

    public function add()
    {
        $breadcrumbTitle = 'Pembayaran';

        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('admin.events.add', compact('latestProject', 'footerSection', 'breadcrumbTitle'));
    }

    public function detail()
    {
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('events.detail-event', compact('latestProject', 'footerSection'));
    }

    public function list()
    {
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('events.list-event', compact('latestProject', 'footerSection'));
    }
}
