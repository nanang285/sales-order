<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LatestProject;
use App\Models\FooterSection;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\PaymentEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $this->deleteExpiredEvents();
        $breadcrumbTitle = 'Acara';
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();
        $events = Event::All();

        return view('admin.events.list', compact('latestProject', 'footerSection', 'breadcrumbTitle', 'events'));
    }

    public function ticket()
    {
        $breadcrumbTitle = 'Acara';
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();
        $tickets = Ticket::All();

        return view('admin.events.ticket', compact('latestProject', 'footerSection', 'breadcrumbTitle', 'tickets'));
    }

    public function ShowTicket($kode)
    {
        $ticketData = Ticket::where('kode_invoice', $kode)->first();

        if (!$ticketData) {
            if (request()->route('kode') !== $kode) {
                return redirect()
                    ->route('event.ticket', ['kode' => $kode])
                    ->with('error', 'Kode tiket tidak ditemukan atau berbeda.');
            }
        }

        return view('events.ticket', compact('ticketData'));
    }

    public function payments()
    {
        $paymentEvent = paymentEvent::all();

        $breadcrumbTitle = 'Pembayaran';
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('admin.events.payments', compact('latestProject', 'footerSection', 'breadcrumbTitle', 'paymentEvent'));
    }

    public function invoice($kode)
    {
        $paymentEvent = paymentEvent::all();

        $breadcrumbTitle = 'Pembayaran';
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        $data = session('data');

        return view('events.invoice', compact('latestProject', 'footerSection', 'breadcrumbTitle', 'paymentEvent', 'data', 'kode'));
    }

    public function add()
    {
        $breadcrumbTitle = 'Pembayaran';

        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('admin.events.add', compact('latestProject', 'footerSection', 'breadcrumbTitle'));
    }

    public function edit($slug)
    {
        $breadcrumbTitle = 'Edit';

        $latestProject = LatestProject::all();
        $footerSection = FooterSection::first();

        $event = Event::where('slug', $slug)->firstOrFail();

        return view('admin.events.edit', compact('latestProject', 'footerSection', 'event', 'breadcrumbTitle'));
    }

    public function detail($slug)
    {   
        $this->deleteExpiredEvents();
        $latestProject = LatestProject::all();
        $footerSection = FooterSection::first();

        $event = Event::where('slug', $slug)->firstOrFail();

        return view('events.detail-event', compact('latestProject', 'footerSection', 'event'));
    }

    public function list()
    {
        $this->deleteExpiredEvents();
        $events = Event::All();
        $latestProject = LatestProject::All();
        $footerSection = footerSection::first();

        return view('events.list-event', compact('latestProject', 'footerSection', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|max:4096',
            'waktu' => 'required|date',
            'type' => 'required|in:gratis,berbayar',
            'harga' => 'nullable|numeric',
            'pilihan_sesi' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'status_quota' => 'required|in:unlimited,limited',
            'quota' => 'nullable|integer',
        ]);

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '.webp';
            $imagePath = public_path('storage/uploads/event');

            $image->move($imagePath, $imageName);

            $imgPath = $imagePath . '/' . $imageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            $newWidth = $width * 0.5;
            $newHeight = $height * 0.5;
            $compressionQuality = 60;

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefill($resizedImg, 0, 0, $transparent);

            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            imagewebp($resizedImg, $imgPath);
            imagedestroy($img);
            imagedestroy($resizedImg);
        }

        $harga = 0;
        if ($request->input('type') === 'berbayar') {
            $harga = str_replace(['Rp ', '.', ','], ['', '', '.'], $request->input('harga'));

            $harga = is_numeric($harga) ? (float) $harga : 0;
        }

        $slug = Str::slug($request->input('judul'));

        Event::create([
            'judul' => $request->input('judul'),
            'slug' => $slug,
            'lokasi' => $request->input('lokasi'),
            'description' => $request->input('description'),
            'image_path' => $imageName ?? null,
            'waktu' => $request->input('waktu'),
            'type' => $request->input('type'),
            'harga' => $harga,
            'pilihan_sesi' => $request->input('pilihan_sesi'),
            'kategori' => $request->input('kategori'),
            'status_quota' => $request->input('status_quota'),
            'quota' => $request->input('quota'),
        ]);

        return redirect()->route('admin.events.index')->with('success', true)->with('toast', 'add');
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|max:4096',
            'waktu' => 'required|date',
            'type' => 'required|in:gratis,berbayar',
            'harga' => 'nullable|numeric',
            'pilihan_sesi' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'status_quota' => 'required|in:unlimited,limited',
            'quota' => 'nullable|integer',
        ]);

        $event = Event::where('slug', $slug)->firstOrFail();

        if ($request->hasFile('image_path')) {
            if ($event->image_path) {
                $oldImagePath = public_path('storage/uploads/event/' . $event->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image_path');
            $imageName = time() . '.webp';
            $imagePath = public_path('storage/uploads/event');

            $image->move($imagePath, $imageName);

            $imgPath = $imagePath . '/' . $imageName;
            $img = imagecreatefromstring(file_get_contents($imgPath));
            $width = imagesx($img);
            $height = imagesy($img);

            $newWidth = $width * 0.5;
            $newHeight = $height * 0.5;
            $compressionQuality = 60;

            $resizedImg = imagecreatetruecolor($newWidth, $newHeight);
            imagesavealpha($resizedImg, true);
            $transparent = imagecolorallocatealpha($resizedImg, 0, 0, 0, 127);
            imagefill($resizedImg, 0, 0, $transparent);

            imagecopyresampled($resizedImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagewebp($resizedImg, $imgPath);
            imagedestroy($img);
            imagedestroy($resizedImg);
        } else {
            $imageName = $event->image_path;
        }

        $harga = 0;
        if ($request->input('type') === 'berbayar') {
            $harga = str_replace(['Rp ', '.', ','], ['', '', '.'], $request->input('harga'));
            $harga = is_numeric($harga) ? (float) $harga : 0;
        }

        $newSlug = Str::slug($request->input('judul'));
        
        $event->update([
            'judul' => $request->input('judul'),
             'slug' => $newSlug,
            'lokasi' => $request->input('lokasi'),
            'description' => $request->input('description'),
            'image_path' => $imageName,
            'waktu' => $request->input('waktu'),
            'type' => $request->input('type'),
            'harga' => $harga,
            'pilihan_sesi' => $request->input('pilihan_sesi'),
            'kategori' => $request->input('kategori'),
            'status_quota' => $request->input('status_quota'),
            'quota' => $request->input('quota'),
        ]);

        return redirect()->route('admin.events.index')->with('success', true)->with('toast', 'edit');
    }

    public function delete($slug)
    {
        $breadcrumbTitle = 'Hapus';

        $latestProject = LatestProject::all();
        $footerSection = FooterSection::first();

        $event = Event::where('slug', $slug)->firstOrFail();

        return view('admin.events.delete', compact('latestProject', 'footerSection', 'event', 'breadcrumbTitle'));
    }

    public function destroy($slug)
    {
        $event = Event::where('slug', $slug)->first();

        if (!$event) {
            return redirect()->route('admin.events.index')->with('error', 'Event not found.');
        }

        // Periksa apakah waktu event sudah terlewati
        $currentTime = now(); // Waktu saat ini
        $eventTime = $event->waktu; // Pastikan kolom waktu ada dalam model Event

        if ($currentTime->greaterThan($eventTime)) {
            // Hapus gambar jika ada
            if ($event->image_path) {
                Storage::disk('public')->delete('uploads/event/' . $event->image_path);
            }

            // Hapus event
            $event->delete();
            return redirect()->route('admin.events.index')->with('success', true)->with('toast', 'Event deleted successfully.');
        } else {
            return redirect()->route('admin.events.index')->with('error', 'Event cannot be deleted because it has not yet passed the specified time.');
        }
    }

    private function deleteExpiredEvents()
    {
        // Ambil waktu saat ini
        $currentTime = now();

        // Cari semua event yang waktunya sudah terlewati
        $expiredEvents = Event::where('waktu', '<', $currentTime)->get();

        foreach ($expiredEvents as $event) {
            // Hapus gambar jika ada
            if ($event->image_path) {
                Storage::disk('public')->delete('uploads/event/' . $event->image_path);
            }

            // Hapus event dari database
            $event->delete();
        }

        // Optional: Tambahkan notifikasi atau log jika perlu
        if ($expiredEvents->isNotEmpty()) {
            // Misalnya, bisa menambahkan flash message
            session()->flash('success', 'Expired events deleted successfully.');
        }
    }
}
